@extends('superadmin.sidebar')

@section('content')
<style>
    .dashboard{
        cursor: pointer;
    }
    .item-details{
        max-height: 175px;
    }
</style>

<div class="container-fluid p-4">
    <div class="row">
        <div class="col">
            <h1><b>Dashboard</b></h1><br>

        </div>
        <div class="col text-right">
            <h6>{{ date('l jS \of F Y') }}</h6>
        </div>
    </div>
  <div class="div-logo">
    <img id="logo" src="{{ asset('/BRGY MAMATID LOGO.png') }}" class="side-logo">
    <img id="logo" src="{{ asset('/BSIT LOGO.png') }}" class="side-logo bsit" >
</div>

  <div class="row sp-greatings">
    <div class="col text-center">
        <h1 style="font-size: 50px;">Welcome Job Finder Admin !</h1>
    </div>
  </div><br>
  <div class="row mt-3">
    <div class="col-lg-4 col-md-4 dashboard" >
        <div class="card m-auto item-details" onclick="window.location='{{ route('report.post.management') }}';">
            <div class="card-block">
                <div class="d-flex p-2">
                    <i class="fa fa-briefcase f-40"></i>  <h4 class="ml-2 mt-2 text-muted">Reported Jobs</h4>          
                </div>
                <div class="row align-items-center">
                    <div class="col-12 text-right " >
                        <h2>{{$reportedJobs}}</h2>
                        
                    </div>
                    
                    
                </div>
            </div>
            <div class="card-footer bg-c-red">
                <div class="row align-items-center">
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 dashboard" >
        <div class="card m-auto item-details" onclick="window.location='{{ route('employer.account') }}';">
            <div class="card-block">
                <div class="d-flex p-2">
                    <i class="fa fa-users f-40"></i>  <h4 class="ml-2 mt-2 text-muted">No. of Employer Account</h4>          
                </div>
                <div class="row align-items-center">
                    <div class="col-12 text-right " >
                        <h2>{{$applicant}}</h2>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-c-red">
                <div class="row align-items-center">
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 dashboard" >
        <div class="card m-auto item-details" onclick="window.location='{{ route('applicant.accounts') }}';">
            <div class="card-block">
                <div class="d-flex p-2">
                    <i class="fa fa-users f-40"></i>  <h4 class="ml-2 mt-2 text-muted">No. of Applicant Account</h4>          
                </div>
                <div class="row align-items-center">
                    <div class="col-12 text-right " >
                        <h2>{{$applicant}}</h2>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-c-red">
                <div class="row align-items-center">
                </div>
            </div>
        </div>
    </div>
    
  </div>


@endsection