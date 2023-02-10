@extends('authpages.sidebar')

@section('content')
@include('sweetalert::alert')
    <div class="container-fluid p-4">
        <h1><b>MY JOBS APPLIED</b></h1><br>
        <table id="jobs-list" class="table table-hover" style="width:100%" >
            <thead>
                <tr>    
                    <th>Job Title</th>
                    <th>Company Name</th> 
                    <th>Company Address</th> 
                    <th>Date Posted</th>       
                </tr>
            </thead>
            <tbody id="myTable" style="cursor: pointer">
                @foreach($myAppliedJobs as $job)       
                <tr onclick="window.location='{{ route('view.job', $job) }}';">                           
                        <td style="font-size: 15px;">{{ $job->job_title }}</td>
                        <td style="font-size: 15px;">{{ $job->company_name }}</td>
                        <td style="font-size: 15px;">{{ $job->company_address }}</td>    
                        <td style="font-size: 15px;">{{date('F d, Y', strtotime($job->created_at))}}</td>                                             
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<script>
$(document).ready(function () {
    $('#jobs-list').DataTable();
});
</script>

@endsection