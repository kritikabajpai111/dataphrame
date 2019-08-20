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
        <li class="active">{{ __('constants.Edit_User') }}</li>
      </ol>
    </section>
        
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <!--<div class="pull-left">
                    <h2>Edit New User</h2>
                </div>-->
                <div class="pull-left">
                    <a class="btn btn-primary" href="{{ route('users.index') }}"> {{ __('constants.Back') }}</a>
                </div>
            </div>
        </div>


        @if (count($errors) > 0)
          <div class="alert alert-danger">
            <strong>Whoops!</strong>{{ __('constants.errormessage') }}<br><br>
            <ul>
               @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
               @endforeach
            </ul>
          </div>
        @endif
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{ __('constants.Edit_User') }}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id],'files'=>"true"]) !!}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">{{ __('constants.Name') }}</label>
                  {!! Form::text('name', null, array('placeholder' => __('constants.Name'),'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">{{ __('constants.Email') }}</label>
                  {!! Form::text('email', null, array('placeholder' =>  __('constants.Email') ,'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">{{ __('constants.Password') }}</label>
                  {!! Form::password('password', array('placeholder' =>  __('constants.Password') ,'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">{{ __('constants.Confirm_Password') }}</label>
                  {!! Form::password('confirm-password', array('placeholder' =>  __('constants.Confirm_Password') ,'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label >Profile Image:</label>
                  {!! Form::file('profile_image', null, array('class' => 'form-control' )) !!}
                  @if($user->profile_image)
                  <img src="{!! asset('/storage/profile_image/'.$user->profile_image) !!}" class="" ... />
                  @endif
                </div>
                 <div class="form-group">
                  <label>{{ __('constants.Dob') }}</label>
                    {!! Form::date('dob', null, array('placeholder' =>  __('constants.Dob') ,'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>{{ __('constants.Employee_Number') }}</label>
                    {!! Form::text('employee_number', null, array('placeholder' => __('constants.Employee_Number'),'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>{{ __('constants.Department') }}</label>
                    {!! Form::select('departments[]', $departments,$selectedDepartments, array('class' => 'form-control','multiple')) !!}
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">{{ __('constants.Role') }}</label>
                  {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">{{ __('constants.Submit') }}</button>
              </div>
            {!! Form::close() !!}
          </div>
<!--
        {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Confirm Password:</strong>
                    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Role:</strong>
                    {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        {!! Form::close() !!} -->
    </section>
    </div>

@endsection