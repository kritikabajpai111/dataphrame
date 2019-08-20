@extends('layouts.common')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       {{ __('constants.Client_Management') }} 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>{{ __('constants.Home') }}</a></li>
        <li >{{ __('constants.Client_Management') }} </li>
        <li class="active">{{ __('constants.Create_New_Client') }} </li>
      </ol>
    </section>
        
    <!-- Main content -->
    <section class="content">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <!--<div class="pull-left">
            <h2>Create New Role</h2>
        </div>-->
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('roles.index') }}">{{ __('constants.Back') }}</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> {{ __('constants.errormessage') }}<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{ __('constants.Create_New_Client' ) }}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
              <div class="box-body">
                <div class="form-group">
                  <label>{{ __('constants.Name') }}</label>
                  {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>{{ __('constants.Permission') }}</label></br>
                    @foreach($permission as $value)
                    <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                    {{ $value->name }}</label>
                    <br/>
                    @endforeach
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">{{ __('constants.Submit') }}</button>
              </div>
            {!! Form::close() !!}
          </div>
<!--{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permission:</strong>
            <br/>
            @foreach($permission as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            <br/>
            @endforeach
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}-->
</section>
</div>

@endsection