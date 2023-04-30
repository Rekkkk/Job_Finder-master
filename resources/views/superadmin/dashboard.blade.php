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
    <img id="logo" src="{{ asset('/Logo.jpg') }}" class="side-logo bsit" >
</div>

  <div class="row sp-greatings">
    <div class="col text-center">
        <h1 style="font-size: 50px;">Welcome Job Finder Admin !</h1>
    </div>
  </div><br>
    <div class="row">
        <div class="col-lg">
            <div class="dashboard-card card p-3 pt-4 px-4 position-relative" onclick="window.location='{{ route('report.post.management') }}';">
                <div class="d-flex flex-wrap">
                    <i class="fa fa-briefcase f-40"></i>  
                    <h4 class="ml-2 mt-2 text-muted">Reported Jobs</h4> 
                </div>
                <h2 class="text-right pt-2 pb-3">{{$reportedJobs}}</h2>  
                <div class="bg-danger w-100 position-absolute fixed-bottom rounded-bottom" style="height: 30px;"></div>
            </div>  
        </div>
        <div class="col-lg">
            <div class="dashboard-card card p-3 pt-4 px-4 position-relative" onclick="window.location='{{ route('employer.account') }}';" >
                <div class="d-flex flex-wrap">
                    <i class="fa fa-users f-40"></i>  
                    <h4 class="ml-2 mt-2 text-muted">Employer Account</h4> 
                </div>
                <h2 class="text-right pt-2 pb-3">{{$reportedJobs}}</h2>  
                <div class="bg-danger w-100 position-absolute fixed-bottom rounded-bottom" style="height: 30px;"></div>
            </div>  
        </div>
        <div class="col-lg">
            <div class="dashboard-card card p-3 pt-4 px-4 position-relative" onclick="window.location='{{ route('applicant.accounts') }}';" >
                <div class="d-flex flex-wrap">
                    <i class="fa fa-users f-40"></i>
                    <h4 class="ml-2 mt-2 text-muted">Applicant Account</h4> 
                </div>
                <h2 class="text-right pt-2 pb-3">{{$reportedJobs}}</h2>  
                <div class="bg-danger w-100 position-absolute fixed-bottom rounded-bottom" style="height: 30px;"></div>
            </div>  
        </div>
        @if(Auth::user()->user_role === 3)
        <div class="col-lg">
            <div class="dashboard-card card p-3 pt-4 px-4 position-relative" onclick="window.location='{{ route('admin.accounts') }}';" >
                <div class="d-flex flex-wrap">
                    <i class="fa fa-user f-40"></i>  
                    <h4 class="ml-2 mt-2 text-muted">Admin Account</h4> 
                </div>
                <h2 class="text-right pt-2 pb-3">{{$reportedJobs}}</h2>  
                <div class="bg-danger w-100 position-absolute fixed-bottom rounded-bottom" style="height: 30px;"></div>
            </div>  
        </div>
        @endif
    </div>
@endsection