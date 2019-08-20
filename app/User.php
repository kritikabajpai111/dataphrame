<?php

namespace BPMS;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use BPMS\UserHasDepartment;
use BPMS\Department;
class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','profile_image','dob','employee_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     public function getDepartmentNames()
    {     
        $department_ids = UserHasDepartment::select('department_id')->where('user_id',$this->id)->get();
        foreach($department_ids as $departmentId){          
            $department =  Department::select('name')->where('id',$departmentId->department_id)->get(); 
            $department_names[] = $department[0]->name;       
        } 
        return isset($department_names)?$department_names:null;
    }
}
