@extends('authpages.sidebar')

@section('content')
@include('sweetalert::alert')
    <div class="container-fluid p-4">
        <h1><b>LIST OF JOBS AVAILABLES</b></h1><br>
        <div class="row">
            <div class="col">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                    <a class="nav-link text-black font-weight-bold active" data-toggle="tab" href="#all-jobs">ALL JOBS</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-black font-weight-bold" data-toggle="tab" href="#graduate">GRADUATE JOBS</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-black font-weight-bold" data-toggle="tab" href="#undergraduate">UNDERGRADUATE JOBS</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane container active pt-4" id="all-jobs">
                        <table id="all-list" class="table table-hover" style="width:100%" >
                            <thead>
                                <tr>    
                                    <th>Job Title</th>
                                    <th>Company Name</th> 
                                    <th>Company Address</th> 
                                    <th>Date Posted</th>       
                                </tr>
                            </thead>
                            <tbody id="myTable" style="cursor: pointer">
                                @foreach($allJobs as $job)       
                                <tr onclick="window.location='{{ route('view.job', $job) }}';">                           
                                        <td style="font-size: 18px;">{{ $job->job_title }}</td>
                                        <td style="font-size: 18px;">{{ $job->company_name }}</td>
                                        <td style="font-size: 18px;">{{ $job->company_address }}</td>    
                                        <td style="font-size: 18px;">{{date('F d, Y', strtotime($job->created_at))}}</td>                                             
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane container fade pt-4" id="graduate">
                        <table id="graduate-list" class="table table-hover" style="width:100%" >
                            <thead>
                                <tr>    
                                    <th>Job Title</th>
                                    <th>Company Name</th> 
                                    <th>Company Address</th> 
                                    <th>Date Posted</th>       
                                </tr>
                            </thead>
                            <tbody id="myTable" style="cursor: pointer">
                                @foreach($allJobs as $job)  
                                @if($job->job_type === "Graduate Job")
                                    <tr onclick="window.location='{{ route('view.job', $job) }}';">                           
                                        <td style="font-size: 18px;">{{ $job->job_title }}</td>
                                        <td style="font-size: 18px;">{{ $job->company_name }}</td>
                                        <td style="font-size: 18px;">{{ $job->company_address }}</td>    
                                        <td style="font-size: 18px;">{{date('F d, Y', strtotime($job->created_at))}}</td>                                             
                                    </tr>
                                @endif     
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane container fade pt-4" id="undergraduate">
                        <table id="undergraduate-list" class="table table-hover" style="width:100%" >
                            <thead>
                                <tr>    
                                    <th>Job Title</th>
                                    <th>Company Name</th> 
                                    <th>Company Address</th> 
                                    <th>Date Posted</th>       
                                </tr>
                            </thead>
                            <tbody id="myTable" style="cursor: pointer">
                                @foreach($allJobs as $job)   
                                @if($job->job_type === "Undergraduate Job")    
                                <tr onclick="window.location='{{ route('view.job', $job) }}';">                           
                                        <td style="font-size: 18px;">{{ $job->job_title }}</td>
                                        <td style="font-size: 18px;">{{ $job->company_name }}</td>
                                        <td style="font-size: 18px;">{{ $job->company_address }}</td>    
                                        <td style="font-size: 18px;">{{date('F d, Y', strtotime($job->created_at))}}</td>                                             
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- <table id="jobs-list" class="table table-hover" style="width:100%" >
            <thead>
                <tr>    
                    <th>Job Title</th>
                    <th>Company Name</th> 
                    <th>Company Address</th> 
                    <th>Date Posted</th>       
                </tr>
            </thead>
            <tbody id="myTable" style="cursor: pointer">
                @foreach($allJobs as $job)       
                <tr onclick="window.location='{{ route('view.job', $job) }}';">                           
                        <td style="font-size: 18px;">{{ $job->job_title }}</td>
                        <td style="font-size: 18px;">{{ $job->company_name }}</td>
                        <td style="font-size: 18px;">{{ $job->company_address }}</td>    
                        <td style="font-size: 18px;">{{date('F d, Y', strtotime($job->created_at))}}</td>                                             
                </tr>
                @endforeach
            </tbody>
        </table> --}}
    </div>
<script>
$(document).ready(function () {
    $('#all-list').DataTable();
    $('#graduate-list').DataTable();
    $('#undergraduate-list').DataTable();
});
</script>

@endsection