@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('admin.manage-users')}}</h1>
          </div>
          <div class="col-sm-6">
            <div class="float-sm-right">
                {{config('app.name')}} {{__('admin.manage-users')}}
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      
    </section>
    <!-- /.content -->
@endsection