@extends('layout.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<link rel="stylesheet" type="text/css" href="{{asset('css/form.css')}}">
     <div class="container-fluid">
   
    <div class="row">
  <div class="col-12">

    <!-- general form elements -->
            <div class="col-md-12 py-2">
                <a href="{{route('company.index')}}" class="btn btn-sm btn-success">Back</a>
            </div>
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add New Company</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            <form role="form" method="post" action="{{route('company.update',$data->id)}}" enctype="multipart/form-data">
              <input type="hidden" name="id" value="{{$data->id}}">
              <input type="hidden" id="url" name="url" value="{{ url('/') }}" />
              @csrf
              @method('PUT')
                <div class="card-body">
            </div>

                  <div class="row">
                     <div class="col-sm-6">

                        <div class="form-group">
                           <label for="exampleInputEmail1">Company Name</label>
                          <input type="text" class="form-control" name="company_name" id="firstname"  placeholder="Enter Company Name." value="{{old('company_name', $data->company_name)}}">
                        </div>
                        @if ($errors->has('company_name'))
                            <div class="parsley-errors-list">{{ $errors->first('company_name') }}</div>
                        @endif
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Email address</label>
                           <input type="email" class="form-control"  name="company_email" id="useremail" placeholder="Enter email" value="{{old('company_email', $data->company_email)}}">
                        </div>
                         @if ($errors->has('company_email'))
                            <div class="parsley-errors-list">{{ $errors->first('company_email') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="row">
                     
                     <div class="col-sm-6">
                      
                        <div class="form-group">
                           <label for="exampleInputEmail1">Website</label>
                           <input type="text" class="form-control" name="company_website" id="lastname" placeholder="Enter Company Website." value="{{old('company_website', $data->company_website)}}">
                        </div>
                        @if ($errors->has('company_website'))
                            <div class="parsley-errors-list">{{ $errors->first('company_website') }}</div>
                        @endif
                     </div>

                     <div class="col-lg-3 col-md-3 col-xs-12">
                            <div class="form-group">
                                <p>@lang('common.label.your_logo')<span class="text-danger">*</span></p>
                                <figure class="brng-lgimg dflt-brand-logo">
                                  @if(!empty($data->company_logo) && Storage::disk('public')->exists($data->company_logo))
                                        <img id="company-logo" src="{{asset('storage/').'/'.$data->company_logo}}"
                                             width="90"
                                             height="90" alt="">
                                    @else
                                        <img id="company-logo" src="{{asset('images/image-icon.png')}}" width="90"
                                             height="90" alt="">
                                    @endif
                                </figure>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-xs-12">
                            <div class="form-group">
                                <p>@lang('common.label.rec_logo_size')</p>
                                <p>@lang('common.label.logo_less_than')</p>

                                <div class="custom-file-control disp-inline">
                                    <input type="file" id="logo" accept='image/*' name="logo">
                                    <label for="file-1">@lang('common.label.upload_logo')</label>

                                </div>
                              @if ($errors->has('logo'))
                            <div class="parsley-errors-list">{{ $errors->first('logo') }}</div>
                             @endif
                                <span id="logo-name"></span>
                                <div id="logo-error"></div>
                                <a href="javascript:void(0)" id="remove-logo"
                                   class="custom-file-control disp-inline">@lang('common.label.remove_logo')</a>
                            </div>                           
                        </div> 
                  </div> 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update Company</button>
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

<script src="{{asset('js/toastr.min.js')}}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
@endsection

