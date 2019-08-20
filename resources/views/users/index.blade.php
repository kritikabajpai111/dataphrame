@extends('layouts.common')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        {{ __('constants.User_Management') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>{{ __('constants.Home') }}</a></li>
        <li class="active">{{ __('constants.User_Management') }}</li>
      </ol>
    </section>
		
    <!-- Main content -->
    <section class="content">
<div class="row">
    <div class="col-lg-12 margin-tb">
       <!-- <div class="pull-left">
            <h2>Users Management</h2>
        </div>-->
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.create') }}">{{ __('constants.Create_New_User') }}</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

 <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">{{ __('constants.User_Management') }}</h3>
    </div>
<table class="table table-bordered">
 <tr>
   <th>{{ __('constants.No') }}</th>
   <th>{{ __('constants.Name') }}</th>
   <th>{{ __('constants.Profile_Image') }}</th>
   <th>{{ __('constants.Employee_Number') }}</th>
   <th>{{ __('constants.Roles') }}</th>
   <th>{{ __('constants.Departments') }}</th>
   <th width="280px">{{ __('constants.Action') }}</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>@if(!empty($user->profile_image))<img src="storage/profile_image/{{ $user->profile_image }}" width="100px" heigth="100px" >@endif</td>
    <td>{{ $user->employee_number }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    
    <td>
      @if(!empty($user->getDepartmentNames()))
        @foreach($user->getDepartmentNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>
</div>


{!! $data->render() !!}

</section>
</div>
@endsection