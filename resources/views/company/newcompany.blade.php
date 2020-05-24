@extends('layout.admin')

@section('content')


<!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
   <div class="row mb-2">
     <div class="col-sm-12 card">
        <ul class="nav">
           <li class="nav-item">
              <a class="nav-link active" href="{{ url('role/new') }}">
            <i class="fa fa-plus" aria-hidden="true"></i>
                 Add New Role</a>
           </li>

           <li class="nav-item">
              <a class="nav-link active" href="{{ url('permission') }}">
            <i class="fa fa-lock" aria-hidden="true"></i>
                 Permission</a>
           </li>

           <li class="nav-item">
              <a class="nav-link active" href="{{ url('role/delete') }}">

            <i class="far fa-trash-alt"></i>  Delete </a>
           </li>






        </ul>
     </div>
    </div>
    <div class="row">
           <div class="col-12">
  <div class="card">
  <div class="card-header">
     <h3 class="card-title">All Roles</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body p-0">
     <table class="table table-condensed">
        <thead>
           <tr>
              <th style="width: 10px">#</th>
              <th>Role Name</th>
              <th>Role Type</th>
              <th>Access Level</th>
              <th>Status</th>
           </tr>
        </thead>
        <tbody>
          <?php $number = 1; ?>
           @foreach($userroles as $role)

             <tr>
              <td>{{$number}}</td>
              <td>{{$role->name}}</td>
              <td>{{$role->role_type}}</td>
               <td>{{$role->access_level}}</td>
              <td> <span class="badge {{ $role->status ? 'bg-success' : 'bg-danger' }}">{{$role->status ? 'Active': 'Inactive'}}</td>

            </tr>
            <?php $number++ ?>
           @endforeach




        </tbody>
     </table>
  </div>
  <!-- /.card-body -->
  <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
              </ul>
            </div>
</div>

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
@endsection
