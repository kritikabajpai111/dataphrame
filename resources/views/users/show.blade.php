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
        <li class="active">Show User</li>
      </ol>
    </section>
        
    <!-- Main content -->
    <section class="content">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('users.index') }}">{{ __('constants.Back') }}</a>
        </div>
    </div>
    <!--<div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show User</h2>
        </div>
        
    </div>-->
</div>


 <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Show User</h3>
    </div>
    <div class="box-header with-border">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $user->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $user->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Roles:</strong>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                @endforeach
            @endif
        </div>
    </div>
</div>
</div>
</div>
</section>
</div>
@endsection