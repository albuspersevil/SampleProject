@extends('layout.admin')

@section('content')

    @if(!empty($company))
  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3>Company Info</h3>
          <hr>
        </div>
      </div>
      <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <strong>Company Name: </strong> {{$company->company_name}}
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <strong>Company Email: </strong> {{$company->company_email}}
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <strong>Company Website: </strong> {{$company->company_website}}
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <strong>Company Logo: </strong> 
              <figure class="brng-lgimg dflt-brand-logo">
                                    @if(!empty($company->company_logo) && Storage::disk('public')->exists($company->company_logo))

                                          <img id="company-logo" src="{{asset('storage/').'/'.$company->company_logo}}"
                                               width="200"
                                               height="200" alt="">
                                    @endif
              </figure>                        
            </div>
          </div>
      </div>    
        <div class="col-md-12">
          <a href="{{route('company.index')}}" class="btn btn-sm btn-success">Back</a>
        </div>
  </div>
    @endif
    @if(!empty($employee))
  <div class="container">
       <div class="row">
        <div class="col-md-12">
          <h3>Employee Info</h3>
          <hr>
        </div>
      </div>

      <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <strong>First Name: </strong> {{$employee->firstname}}
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <strong>Last Name: </strong> {{$employee->lastname}}
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <strong>Email: </strong> {{$employee->email}}
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <strong>Mobile No.: </strong> {{$employee->phone}}
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <strong>Company Name: </strong> {{$employee->company_name}}
            </div>
          </div>
          
      </div>    
      <div class="col-md-12">
          <a href="{{route('employee.index')}}" class="btn btn-sm btn-success">Back</a>
        </div>
</div> 
    @endif

@endsection


