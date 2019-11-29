@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('admin.manage-roles')}}</h1>
          </div>
          <div class="col-sm-6">
            <div class="float-sm-right">
                {{config('app.name')}} {{__('admin.manage-roles')}}
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    {!! $dataTable->table() !!}
    </section>

@endsection

@push('scripts')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('/vendor/datatables/buttons.server-side.js')}}"></script>

{!! $dataTable->scripts() !!}
@endpush