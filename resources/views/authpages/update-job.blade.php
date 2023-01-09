@extends('authpages.sidebar')

@section('content')
@include('sweetalert::alert')
    <div class="container-fluid p-4">
        <h1><b>Post a Job</b></h1><br>
        <div>
            <form action="{{ route('update.job',$job) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col">
                        <label class="title-detail">Job Title :  </label>
                        <input name="job_title" class="form-control" type="text" value="{{ $job->job_title }}">
                        @if ($errors->has('job_title'))
                            <span class="text-danger">{{ $errors->first('job_title') }}</span>
                        @endif
                    </div>
                    <div class="col">
                    <label class="title-detail">Company Name :  </label>
                        <input name="company_name" class="form-control" type="text" value="{{ $job->company_name }}">
                        @if ($errors->has('company_name'))
                            <span class="text-danger">{{ $errors->first('company_name') }}</span>
                        @endif
                    </div>
                </div>
                    
                </div><br>
                <div class="row">
                    <div class="col">
                        <label class="title-detail">Company Address :  </label>
                        <input name="company_address" class="form-control" type="text" value={{ $job->company_address }}>
                        @if ($errors->has('company_address'))
                            <span class="text-danger">{{ $errors->first('company_address') }}</span>
                        @endif
                    </div>
                </div><br>
                
                <div class="row">
                    <div class="col">
                        <label class="title-detail">Job Description :</label>
                        <textarea name="job_description" class="form-control" cols="10" rows="7" >{{ $job->job_description }}</textarea>
                        @if ($errors->has('job_description'))
                        <span class="text-danger">{{ $errors->first('job_description') }}</span>
                        @endif
                    </div>
                </div><br><br>
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-success w-25">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection