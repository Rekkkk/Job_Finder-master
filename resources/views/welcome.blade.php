@extends('.navigation')

@section('content')
    <style>
        #logo{
            border-radius: 500%; 
            
        }
        .container{
            max-width: 100%;
        }
        .main-content{
            margin-top: 100px 
        }
    </style>
    <div class="container">
        <div class="row pt-5 pb-5 main-content">
            <div class="col-xl-3">
                <div class="m-auto">
                    <img id="logo" src="{{ asset('/BRGY MAMATID LOGO.png') }}" width="100%" alt="">
                </div>
            </div>
            <div class="col-xl-6">
                <div class="text-center" style="margin-top: 100px; margin-bottom: 100px;">
                    <h1 style="font-size: 60px"><b>Welcome to Job Finder !</b></h1><br><br>
                    <h5>Search for jobs using the Job Finder in any location across the Philippines.</h5><br><br>
                    <a href="{{ route('login.page.reuired') }}" class="btn btn-success" style="width: 200px;" >Find/Post a Job Offering </a>
                </div>  
            </div>
            <div class="col-xl-3">
                <div class="m-auto">
                    <img id="logo" src="{{ asset('/BSIT LOGO.png') }}" width="100%" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection