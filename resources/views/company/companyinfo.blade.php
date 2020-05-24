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
@if ($message = Session::pull('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif
<div class="card-body">
  <table id="datatable" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>No #</th>
      <th>Company Name</th>
      <th>Company Email</th>
      <th>Company Website</th>
      <th>Company Logo</th>
      <th>Action</th>
    </tr>
    </thead>
    <tbody>
      @foreach($userdata as $data)
      <tr>
      <td>{{++$i}}</td>
      <td>{{ $data->company_name }}</td>
      <td>{{ $data->company_email }}</td>
      <td>{{ $data->company_website}}</td>
      <td>
        <img src="{{ asset('storage/'.$data->company_logo) }}" width="100px" height="100px" alt="Company Logo">
      </td>
        <td>
            <form action="{{ route('company.destroy', $data->id) }}" method="post">
              <a class="btn btn-sm btn-success" href="{{route('company.show',$data->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('company.edit',$data->id)}}">Edit</a>
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
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

@endsection
