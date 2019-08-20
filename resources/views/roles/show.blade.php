@extends('layouts.common')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Role Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li >Role Management</li>
        <li class="active">Show Role</li>
      </ol>
    </section>
        
    <!-- Main content -->
    <section class="content">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                   <!--<div class="pull-left">
                        <h2> Show Role</h2>
                    </div>-->
                    <div class="pull-left">
                        <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
                    </div>
                </div>
            </div>


<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Show Role</h3>
            </div>
    <div class="box-header with-border">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $role->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Permissions:</strong>
                        @if(!empty($rolePermissions))
                            @foreach($rolePermissions as $v)
                                <label class="label label-success">{{ $v->name }},</label>
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