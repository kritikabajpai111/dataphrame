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
        <li class="active">{{ __('constants.Client_Management') }}</li>
      </ol>
    </section>
        
    <!-- Main content -->
    <section class="content">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <!--<div class="pull-left">
            <h2>Role Management</h2>
        </div>-->
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('clients.create') }}"> {{ __('constants.Create_New_Role') }}</a>
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
              <h3 class="box-title">{{ __('constants.Role_Management') }}</h3>
            </div>
<table class="table table-bordered">
  <tr>
     <th>{{ __('constants.No') }}</th>
     <th>{{ __('constants.Name') }}</th>
     <th width="280px">{{ __('constants.Action') }}</th>
  </tr>
    @foreach ($clients as $key => $client)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $client->name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('roles.show',$client->id) }}">Show</a>
            @can('client-edit')
                <a class="btn btn-primary" href="{{ route('roles.edit',$client->id) }}">Edit</a>
            @endcan
            @can('client-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $client->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table>

</div>

{!! $clients->render() !!}
 </section>
</div>

@endsection