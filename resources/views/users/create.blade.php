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
        <li >{{ __('constants.User_Management') }}</li>        
        <li class="active">{{ __('constants.Create_New_User') }}</li>
      </ol>
    </section>
        
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <!--<div class="pull-left">
                    <h2>Create New User</h2>
                </div> -->
                <div class="pull-left">
                    <a class="btn btn-primary" href="{{ route('users.index') }}">{{ __('constants.Back') }} </a>
                </div>
            </div>
        </div>


        @if (count($errors) > 0)
          <div class="alert alert-danger">
            <strong>Whoops!</strong> {{ __('constants.errormessage') }} <br><br>           
            <ul>
               @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
               @endforeach
            </ul>
          </div>
        @endif

 <div class="box box-primary" >
            <div class="box-header with-border ">
              <h3 class="box-title">{{ __('constants.Create_New_User') }}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             {!! Form::open(array('route' => 'users.store','method'=>'POST','files'=>"true")) !!}
              <div class="box-body">
                <div class="form-group">
                  <label> {{ __('constants.Name') }}</label>
                    {!! Form::text('name', null, array('placeholder' => __('constants.Name'),'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label> {{ __('constants.Email') }}</label>
                  {!! Form::text('email', null, array('placeholder' => __('constants.Email'),'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label> {{ __('constants.Dob') }}</label>
                    {!! Form::date('dob', null, array('placeholder' => __('constants.Dob'),'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label> {{ __('constants.Employee_Number') }}</label>
                    {!! Form::text('employee_number', null, array('placeholder' => __('constants.Employee_Number'),'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label> {{ __('constants.Department') }}</label>
                    {!! Form::select('departments[]', $departments,[], array('class' => 'form-control','multiple')) !!}
                </div>
                <div class="form-group">
                  <label > {{ __('constants.Password') }}</label>
                  {!! Form::password('password', array('placeholder' => __('constants.Password'),'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label > {{ __('constants.Confirm_Password') }}</label>
                  {!! Form::password('confirm-password', array('placeholder' => __('constants.Confirm_Password'),'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label >{{ __('constants.Profile_Image') }}</label>
                  {!! Form::file('profile_image', array('placeholder' => __('constants.Profile_Image'),'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label >{{ __('constants.Role') }}</label>
                  {!! Form::select('roles[]', $roles,[], array('placeholder' => __('constants.Role'),'class' => 'form-control','multiple')) !!}
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">{{ __('constants.Submit') }}</button>
              </div>
            {!! Form::close() !!}
          </div>
    <section>
</div>
@endsection