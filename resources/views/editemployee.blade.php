@extends('layout.admin')

@section('content')


<!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
   
    <div class="row">
  <div class="col-12">

    <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add New Employee</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            <form role="form" method="post" action="{{route('employee.update',$employee->id)}}">
              
              @csrf
              @method('PUT')
              <input type="hidden" name="id" value="{{$employee->id}}">
                <div class="card-body">
            </div>

                  <div class="row">
                     <div class="col-sm-6">

                        <div class="form-group">
                           <label for="exampleInputEmail1">First name</label>
                          <input type="text" class="form-control" name="firstname" id="firstname"  placeholder="Enter Firstname" value="{{old('firstname',$employee->firstname)}}">
                        </div>
                        @if ($errors->has('firstname'))
                            <div class="parsley-errors-list">{{ $errors->first('firstname') }}</div>
                        @endif
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Last name</label>
                           <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter Lastname" value="{{old('lastname',$employee->lasstname)}}">
                        </div>
                        @if ($errors->has('lastname'))
                            <div class="parsley-errors-list">{{ $errors->first('lastname') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                      <div class="form-group">
                           <label for="exampleInputEmail1">Company</label>
                              <select class="form-control" name="company" id="department">
                              <option value="">--Select Company--</option>
                        
                               @foreach($company as $value)
                               <option value="{{$value->id .' '. $value->company_name}}" >{{$value->company_name}}</option>
                                @endforeach
                       </select>
                        </div>
                        @if ($errors->has('company'))
                            <div class="parsley-errors-list">{{ $errors->first('company') }}</div>
                        @endif
                     </div>
                     <div class="col-sm-6">
                      <div class="form-group">
                           <label for="exampleInputEmail1">Email address</label>
                           <input type="email" class="form-control"  name="email" id="useremail" placeholder="Enter email" value="{{old('email',$employee->email)}}">
                        </div>
                        @if ($errors->has('email'))
                            <div class="parsley-errors-list">{{ $errors->first('email') }}</div>
                        @endif

                     </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                           <label for="exampleInputEmail1">Mobile No.</label>
                           <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter mobile" value="{{old('mobile',$employee->phone)}}">
                        </div>
                        @if ($errors->has('mobile'))
                            <div class="parsley-errors-list">{{ $errors->first('mobile') }}</div>
                        @endif
                    </div>
                  </div>  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update Employee</button>
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
