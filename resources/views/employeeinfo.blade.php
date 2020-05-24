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
@if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif
<div class="card-body">
  <table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>No #</th>
      <th>Employee FirstName</th>
      <th>Employee LastName</th>
      <th>Email</th>
      <th>Mobile Number</th>
      <th>Company Name</th>
      <th>Action</th>
    </tr>
    </thead>
    <tbody>
      @foreach($empdata as $data)
      <tr>
      <td>{{++$i}}</td>
      <td>{{ $data->firstname }}</td>
      <td>{{ $data->lastname }}</td>
      <td>{{ $data->email  }}</td>
      <td>{{ $data->phone  }}</td>
      <td>{{ $data->company_name  }}</td>

        <td>
            <form action="{{ route('employee.destroy', $data->id) }}" method="post">
              <a class="btn btn-sm btn-warning" href="{{route('employee.edit',$data->id)}}">Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
    

      </tr>
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
});

  $(document).ready(function(){
        $(".alert-success").delay(1000).slideUp(300);
    });
  $(document).ready(function(){
        $(".alert-danger").delay(1000).slideUp(300);
    });

</script>
@endsection
