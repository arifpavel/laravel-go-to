@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('admin.edit-role')}}</h1>
          </div>
          <div class="col-sm-6">
            <div class="float-sm-right">
                {{config('app.name')}} {{__('admin.edit-role')}}
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <permission-edit-component v-bind:permissionid="{{$id}}"></permission-edit-component>
    </section>

@endsection