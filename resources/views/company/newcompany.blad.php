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
                  New Role</a>
           </li>

           <li class="nav-item">
              <a class="nav-link active" href="{{ url('roles') }}">
             <i class="fas fa-list"></i>
                All Role</a>
           </li>






        </ul>
     </div>
    </div>
    <div class="row">
<div class="col-12">

  <!-- general form elements -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Add New Role</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

          <form role="form" method="post" action="{{action('AdministratorController@saverole')}}">
              <div class="card-body">

                <div class="row">
                   <div class="col-sm-6">
                      <div class="form-group">
                         <label for="exampleInputEmail1">Role Name</label>
                         <input type="text" class="form-control" name="role_name" id="branch_name"  placeholder="Enter Branch Name">
                      </div>
                   </div>
                   <div class="col-sm-6">

                      <div class="form-group">
                           <label>Role Type</label>
                           <select name="role_type" class="form-control select2" style="width: 100%;">
                            <option value="" selected="selected" >--Select Role--</option>
                             <option  value="Client">Client</option>
                             <option  value="User">User</option>
                             <option  value="Administrator">Administrator</option>
                             <option  value="Special">Special</option>

                           </select>
               </div>


                   </div>
                </div>

                <div class="row">
                   <div class="col-sm-6">

                      <div class="form-group">
                           <label>Access Level</label>
                           <select  name="access_level" class="form-control select2" style="width: 100%;">
                            <option value="" selected="selected" >--Select Access Level--</option>
                             <option  value="1">Admin Permission</option>
                             <option  value="2">View Permission</option>
                             <option  value="3">Create/Update </option>
                             <option  value="4">Cerate/Update/ Delete </option>


                           </select>
               </div>



                   </div>
                   <div class="col-sm-6">

                      <div class="form-group">
                           <label>Status</label>
                           <select  name="status" class="form-control select2" style="width: 100%;">
                            <option value="1" selected="selected" >Status</option>
                             <option  value="0">Inactive</option>


                           </select>
               </div>

                   </div>
                </div>





              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                   <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
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
@endsection
