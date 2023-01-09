@extends('.navigation')

@section('content')
    <div class="container">
        <br><br><div class="row" >
            <div class="col">
                <div class="text-center" style="margin-top: 100px;">
                    <h1 style="font-size: 60px"><b>Welcome to Job Finder !</b></h1><br><br>
                    <h5>Search for jobs using the Job Finder in any location across the Philippines.</h5><br><br>
                    <a href="{{ route('login.page.reuired') }}" class="btn btn-success w-25" >Find/Post a Job Offering </a>
                </div>  
            </div>
        </div>
    </div>
@endsection