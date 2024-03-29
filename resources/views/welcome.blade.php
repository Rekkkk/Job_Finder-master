@extends('.navigation')

@section('content')
<style>
    .container{
        max-width: 100%;
    }
</style>
    <div class="container main-content">
        <div class="div-logo">
            <img id="logo" src="{{ asset('/BRGY MAMATID LOGO.png') }}" class="side-logo">
            <img id="logo" src="{{ asset('/Logo.jpg') }}" class="side-logo bsit" >
        </div>
        <div class="row pt-5 pb-5 ">
            <div class="col-xl-12">
                <div class="text-center" style="margin-bottom: 0px;">
                    <h1 style="font-size: 65px; font-weight: 800;"><b>Welcome to BESU Mamatid</b></h1><br><br>
                    <h5>Search for jobs using the Job Finder in any location across the Philippines.</h5><br><br>
                    <a href="{{ route('login.page.reuired') }}" class="btn btn-success p-2" style="width: 100%; max-width: 250px;" >Find/Post a Job Offering </a>
                </div>  
            </div>
        </div>
        <div class="row job-items">
            <div class="col mt-4">
                <div class="text-center">
                    <img src="{{ asset('/images/1.png') }}" class="text-center shadow-lg" width="500" height="210">
                </div>
            </div>
            <div class="col mt-4">
                <div class="text-center ">
                    <img src="{{ asset('/images/2.png') }}" class="text-center shadow-lg" width="300" height="210">
                </div>
            </div>
            <div class="col mt-4">
                <div class="text-center">
                    <img src="{{ asset('/images/3.png') }}" class="text-center shadow-lg" width="300" height="210">
                </div>
            </div>
            <div class="col mt-4">
                <div class="text-center">
                    <img src="{{ asset('/images/4.png') }}" class="text-center shadow-lg" width="300" height="210">
                </div>
            </div>
        </div>
    </div>
@endsection