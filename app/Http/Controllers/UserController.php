<?php


namespace BPMS\Http\Controllers;


use Illuminate\Http\Request;
use BPMS\Http\Controllers\Controller;
use BPMS\User;
use Spatie\Permission\Models\Role;
use BPMS\Department;
use BPMS\UserHasDepartment;
use DB;
use Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        $departments = Department::pluck('name','id')->all();
        return view('users.create',compact('roles','departments'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'dob' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'departments' => 'required',
            'roles' => 'required',
            'employee_number' => 'required' 
        ]);
        $docs = $request->file('profile_image');
        $fileContent = $docs->get();
        $extension = $docs->getClientOriginalExtension();
        $filename  = 'user-image-' . time() .  '-' . rand() . '.' . $extension; 
        $imageLocation = 'profile_image/'.$filename;

        // Store the encrypted Content
        \Storage::put($imageLocation, $fileContent);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['profile_image'] = $filename;


        //dd($input['departments']);
        $user = User::create($input);
        $useerId = $user->id;
        
        foreach($input['departments'] as $depart){ 
        $department =  new UserHasDepartment;
        $department->user_id = $useerId;
        $department->department_id = $depart;
        $department->save();
        }        
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
     }
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $departments = Department::pluck('name','id')->all();
        $selectedDepartment = UserHasDepartment::select('department_id')->where('user_id',$id)->get();
        foreach($selectedDepartment as $sdepartment){ 
             $selectedDepartments[] = $sdepartment->department_id;
        }
        $selectedDepartments = (!empty($selectedDepartments))?$selectedDepartments:0;
        return view('users.edit',compact('user','roles','userRole','departments','selectedDepartments'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'dob' => 'required',
            'departments' => 'required',
            'roles' => 'required',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'employee_number' => 'required' 
        ]);
        
         $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }


        $docs = $request->file('profile_image'); echo ($docs); 
        if(!empty($docs)){
        $fileContent = $docs->get();
        $extension = $docs->getClientOriginalExtension();
        $filename  = 'user-image-' . time() .  '-' . rand() . '.' . $extension;
        $imageLocation = 'profile_image/'.$filename;        
        // Store the encrypted Content
        \Storage::put($imageLocation, $fileContent);
        $input['profile_image'] = $filename;
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        if(!empty($input['departments'])){
            DB::table('user_has_departments')->where('user_id', '=', $id)->delete();
            foreach($input['departments'] as $depart){ 
                $department =  new UserHasDepartment;
                $department->user_id = $id;
                $department->department_id = $depart;
                $department->save();
            } 
        }

        $user->assignRole($request->input('roles'));


        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        UserHasDepartment::where('user_id',$id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}