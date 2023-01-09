@extends('authpages.sidebar')

@section('content')
@include('sweetalert::alert')

    <div class="container-fluid p-4">
        <h1 class="mt-4"><b>MY POSTED JOBS</b></h1><br>
        <table id="jobs-list" class="table table-hover" style="width:100%" >
            <thead>
                <tr>    
                    <th>Job Title</th>
                    <th>Date Posted</th>       
                </tr>
            </thead>
            <tbody id="myTable" style="cursor: pointer">
                @foreach($myJobs as $job)       
                    
                <tr onclick="window.location='{{ route('view.my.post', $job) }}';">                           
                        <td>{{ $job->job_title }}</td>
                        <td>{{date('F d, Y', strtotime($job->created_at))}}</td>                                                       
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