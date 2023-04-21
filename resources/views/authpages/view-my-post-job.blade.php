@extends('authpages.sidebar')

@section('content')
@include('sweetalert::alert')
    <div class="container-fluid p-4">
        @if($job->unlisted == 1)
        <div class="alert alert-danger text-center" role="alert">
           This Job post is Unlisted due to reporting 
          </div>
        @endif
        <div class="row">
            <div class="col-lg-6">
                <h1><b>{{$job->job_title}}</b></h1>
            </div>
            <div class="col-lg-6 text-right">
                <a href="{{ route('update.job.page', $job) }}" class="btn btn-info" style="width: 30%"><i class="fa fa-pencil" aria-hidden="true"></i>
                     Edit Job</a>
                <a onclick="return confirm('Are you sure to delete this job ?')" href="{{ route('delete.job', $job) }}" class="btn btn-danger" style="width: 30%"><i class="fa fa-trash" aria-hidden="true"></i>
                    Delete Job</a>
            </div>
        </div><br>
        <div class="row">
            <div class="col-12">
                <h6 style="overflow: auto; font-size: 19px; height: 200px;" >{!! nl2br(e($job->job_description))!!}</h6>
            </div>
        </div><br><br>
        <div class="row">
            <div class="col text-right" >
                <button class="btn btn-primary"  data-toggle="modal" data-target="#accepted"> <i class="fa fa-list ml-2"></i> Accepted Applicant</button>
            </div>
        </div>
        <h1 class="text-center"><b>Applicant List</b></h1>
        <table id="applicant-list" class="table table-bordered" style="width:100%" >
            <thead>
                <tr>    
                    <th>Applicant Name</th>
                    <th>Action</th>      
                    <th>Files</th>    
                </tr>
            </thead>
            <tbody id="myTable" style="cursor: pointer">
                @foreach($job->user as $applicant)    
                    @if($applicant->pivot->is_accepted == 0 && $applicant->pivot->is_decline == 0)
                        <tr>                           
                            <td style="font-size: 17px; text-transform: capitalize;" >{{ $applicant->name}}</td>
                            <td>                               
                                <a href=""
                                    data-applicant="{{$applicant->user_id}}"  
                                    data-toggle="modal" 
                                    data-target="#set-schedule"
                                    class="btn btn-success" 
                                    style="height: 30px; font-size:12px">
                                    Accept
                                </a>
                                <a href="{{ route('decline.applicant', ['user' => $applicant->user_id, 'job' => $job] ) }}" class="btn btn-danger" style="height: 30px; font-size:12px">Decline</a>
                            </td>   
                            <td>
                                <a href="{{ route('view.applicant', ['user' => $applicant->user_id, 'job' => $job]) }}" class="btn btn-info" style="height: 30px; font-size:12px">View Requirements</a></td>
                                                            
                        </tr>
                    @endif   
                @endforeach
              
            </tbody>
        </table>
        <div class="modal fade" id="accepted">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">List Of Accepted Applicant</h4>
                        <button type="button" class="close" data-dismiss="modal" >&times;</button>
                    </div>          
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <table id="accepted-applicant" class="table table-bordered" style="width:100%" >
                                    <thead>
                                        <tr> 
                                            <th width="4%;" ></th>   
                                            <th>Applicant Name</th>      
                                            <th>Interview Schedule</th>      
                                            <th width="10%" >Requirements</th>                     
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        @foreach($job->user as $applicant) 
                                            @if($applicant->pivot->is_accepted == 1)      
                                                <tr>
                                                    <td width="4%;">
                                                        @if($applicant->pivot->is_reported == 1)
                                                            <span style="font-size: 13px;"class="text-danger"><b>Reported</b></span>
                                                        @else
                                                        <a onclick="return confirm('Applicant did not attend the interview ?')" href="{{route('applicant.report', ['user' => $applicant->user_id, 'job' => $job])}}" title="Report" class="btn btn-danger" style="height: 30px; font-size:12px;">Report</a>

                                                        @endif
                                                    </td>                           
                                                    <td style="font-size: 17px;">{{ $applicant->name}}</td>      
                                                    <td style="font-size: 17px;">{{ date('l jS \of F Y h:i:s A', strtotime($applicant->pivot->schedule))}}</td>       
                                                    <td width="10%">
                                                        <a href="{{ route('view.applicant', ['user' => $applicant->user_id, 'job' => $job]) }}" class="btn btn-info ml-4" style="height: 30px; font-size:12px">View</a>
                                                    </td>                          
                                                </tr>
                                            @endif
                                        @endforeach
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                  
                </div>
            </div>
        </div> 
        <div class="modal fade" id="set-schedule" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Set Schedule Interview</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{ route('accept.applicant', ['job' => $job])}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="number" id="user" name="user" style="display: none;">
                        <div class="row">
                            <div class="col lg-12">
                                <label class="title-detail" >Select Interview Schedule : </label>
                                <input type="datetime-local" class="form-control" name="schedule" required>
                            </div>
                        </div>                        
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success" style="width: 120px;">Confirm</button>
                    </div>
                </form>
              </div>
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function () {
            $('#applicant-list').DataTable();
            $('#accepted-applicant').DataTable();

            $('#set-schedule').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) 
                var applicant = button.data('applicant') 
                var modal = $(this)
            
                modal.find('.modal-body #user').val(applicant);

            
            })
        });
    </script>

@endsection