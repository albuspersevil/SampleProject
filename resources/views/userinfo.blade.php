@extends('layout.admin')

@section('content')


<!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
    <div class="row">
    <div class="col-12">
      <div class="card">
<div class="card-header">
  <h3 class="card-title"></h3>
</div>
<!-- /.card-header -->
<div class="card-body">
  <table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>No #</th>
      <th>Name</th>
      <th>Email</th>
      <th>Role</th>
    </tr>
    </thead>
    <tbody>
      @foreach($userdata as $data)
      <th>{{ $data->id }}</th>
      <th>{{ $data->name }}</th>
      <th>{{ $data->email }}</th>
      <th>{{ $data->role }}</th>
    @endforeach

     </tbody>

  </table>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>

      </div>




     </div><!-- /.container-fluid -->
   </section>
<!-- Content Header (Page header) -->

<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">

    </div>
  </div>
</div>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script  src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script  src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>

<script>

$( document ).ready(function() {

  $("#example1").DataTable();
})
</script>
@endsection
