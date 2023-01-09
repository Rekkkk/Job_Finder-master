@extends('authpages.sidebar')

@section('content')
@include('sweetalert::alert')
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-6">
                <h1><b>{{$job->job_title}}</b></h1>
            </div>
            <div class="col-lg-6 text-right">
                @if($status == "Unsubmit")
                    <input type="button" value="Submit Requirements" class="btn btn-success" data-toggle="modal" data-target="#submit-documents">
                    <button class="btn btn-danger" data-toggle="modal" data-target="#report"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Report</button>
                @else
                    @if($status == "Pending")
                        <h5> <b>Your Application is Pending ...</b></h5>
                    @elseif($status == "Decline")    
                    <h5 class="text-danger"> <b>Your Application is Decline</b></h5>

                    @else
                        <h5 class="text-success">Your Application is Accepted</h5>
                    @endif
                @endif
                
            </div>
        </div><br>

        <div class="row">
            <div class="col-12">
                <p class="h4"><b>Company Name :</b>{{" ".$job->company_name}}</p>
            </div>
        </div><br>
        <div class="row">
            <div class="col-12">
                <p class="h4"><b>Company Address :</b>{{" ".$job->company_address}}</p>
            </div>
        </div><br>
        <div class="row">
            <div class="col-12">
                <h6 style="overflow: auto; font-size: 15px; height: 200px;" >{{$job->job_description}}</h6>
            </div>
        </div>
        
        <div class="modal fade" id="submit-documents">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Submit your Requirement</h4>
                        <button type="button" class="close" data-dismiss="modal" >&times;</button>
                    </div>          
                    <div class="modal-body">
                        <div class="row">
                            <div class="col text-right">
                                <span class="text-danger ">Note : PDF form document only</span>

                            </div>
                        </div>
                        <div class="w-75 m-auto">
                            <form action="{{ route('submit', $job) }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row mt-2">
                                    <div class="col-lg-12">
                                        <label for="confirm-password" class="modal-text">Upload your Resume</label>  
                                    </div>
                                </div>  
                                <div class="row">
                                    <div class="col-lg-12">
                                        
                                        <div class="custom-file mb-3">
                                            
                                            <input type="file" class="custom-file-input " id="customFile" name="resume" accept="application/pdf" required>
                                            
                                            <label class="custom-file-label" for="customFile">Select Document </label>
                                           
                                        </div>
                                    </div>
                                </div>   
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="confirm-password" class="modal-text">Upload your Requirements</label>  
                                    </div>
                                </div>  
                                <div class="row">
                                    <div class="col-lg-12">
                                        
                                        <div class="custom-file mb-3" style="height: 100px;">
                                            
                                            <input type="file" style="height: 100px;"  class="custom-file-input " id="customFile" name="requirements[]" accept="application/pdf" required multiple>
                                            
                                            <label class="custom-file-label" for="customFile" style="height: 100px;">Drop your requirements here</label>
                                           
                                        </div>
                                    </div>
                                </div>  

                    </div>
                        
                    </div>
                    <div class="modal-footer">
                            <input type="submit" value="Submit" class="btn btn-success w-25">
                        </form>
                    </div>
                </div>
            </div>
        </div> 
        <div class="modal fade" id="report">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Report Job</h4>
                        <button type="button" class="close" data-dismiss="modal" >&times;</button>
                    </div>          
                    <div class="modal-body">
                        <div class="m-auto">
                            <form action="{{ route('report', $job) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label class="title-detail"><b>Report Comment:</b></label>
                                        <textarea name="comment" class="form-control"  cols="10" rows="7"></textarea>
                                    </div>
                                </div>      
                        </div>
                    </div>
                    <div class="modal-footer">
                            <input type="submit" value="Report" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
        </div> 



    </div>

    <script>

        $(".custom-file-input").on("change", function() {
          var files = Array.from(this.files)
          var fileName = files.map(f =>{return f.name}).join(", ")
          $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        
        </script>

@endsection