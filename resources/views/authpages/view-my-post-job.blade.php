@extends('authpages.sidebar')

@section('content')
@include('sweetalert::alert')
    <div class="container-fluid" style="padding: 60px 50px 20px 50px;">
        @if($job->unlisted == 1)
        <div class="alert alert-danger text-center" role="alert">
           This Job post is Unlisted due to reporting 
          </div>
        @endif
        <div class="row">
            <div class="col-lg-6">
                <h1>{{$job->job_title}}</h1>
            </div>
            <div class="col-lg-6 text-right">
                <a href="{{ route('update.job.page', $job) }}" class="btn btn-info" style="width: 30%">Edit Job</a>
                <a onclick="return confirm('Are you sure to delete this job ?')" href="{{ route('delete.job', $job) }}" class="btn btn-danger" style="width: 30%">Delete Job</a>
            </div>
        </div><br>
        <div class="row">
            <div class="col-12">
                <p>{{$job->job_description}}</p>
            </div>
        </div><br><br>

        <h1 class="text-center">Applicant List</h1>
        <table id="applicant-list" class="table table-bordered" style="width:100%" >
            <thead>
                <tr>    
                    <th>Applicant Name</th>
                    <th>Resume/CV</th>         
                </tr>
            </thead>
            <tbody id="myTable" style="cursor: pointer">
                @foreach($job->user as $job)       
                <tr>                           
                    <td>{{ $job->name}}</td>
                    <td><a href="{{ asset('pdf/'.$job->pivot->pdf) }}" target="_blank" class="btn btn-info" style="height: 30px; font-size:10px">Open the pdf!</a></td>                                                       
                </tr>
                @endforeach
              
            </tbody>
        </table>

    </div>

    <script>
        $(document).ready(function () {
            $('#applicant-list').DataTable();
        });
        </script>

@endsection