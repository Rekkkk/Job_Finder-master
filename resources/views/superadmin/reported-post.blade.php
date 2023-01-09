@extends('superadmin.sidebar')

@section('content')
@include('sweetalert::alert')
    <div class="container-fluid p-4">
        <h1><b>LIST OF JOBS REPORTED</b></h1><br>
        <table id="jobs-list" class="table table-hover" style="width:100%" >
            <thead>
                <tr>    
                    <th>User ID</th>
                    <th>Job Title</th>
                    <th>Company Name</th> 
                    <th>Company Address</th> 
                    <th>Date Posted</th>       
                    <th>No. of Reported</th>     
                </tr>
            </thead>
            <tbody id="myTable" style="cursor: pointer">
                @foreach($reportedJobs as $reportedJob)       

                <tr onclick="window.location='{{ route('view.reported', $reportedJob) }}';">      
                        <td>{{ $reportedJob->user_id }}</td>                 
                        <td>{{ $reportedJob->job_title }}</td>
                        <td>{{ $reportedJob->company_name }}</td>
                        <td>{{ $reportedJob->company_address }}</td>    
                        <td>{{date('F d, Y', strtotime($reportedJob->created_at))}}</td>                 
                        <td class="text-danger">{{ $reportedJob->num_reports }}</td>                                   
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