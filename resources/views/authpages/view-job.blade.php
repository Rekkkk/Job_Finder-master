@extends('authpages.sidebar')

@section('content')
@include('sweetalert::alert')
    <div class="container-fluid" style="padding: 65px 80px 20px 80px;">
        <div class="row">
            <div class="col-lg-6">
                <h1>{{$job->job_title}}</h1>
            </div>
            <div class="col-lg-6 text-right">
                <input type="button" value="Submit CV/Resume" class="btn btn-success" data-toggle="modal" data-target="#submit-resume">
                <input type="button" value="Report" class="btn btn-danger" data-toggle="modal" data-target="#report">
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
                <p>{{$job->job_description}}</p>
            </div>
        </div>
        
        <div class="modal fade" id="submit-resume">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Submit CV/Resume</h4>
                        <button type="button" class="close" data-dismiss="modal" >&times;</button>
                    </div>          
                    <div class="modal-body">
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
                                            <input type="file" class="custom-file-input " id="customFile" name="pdf_file" accept="application/pdf" required>
                                            <label class="custom-file-label" for="customFile">Select Pictures</label>
                                        </div>
                                    </div>
                                </div>      
                    </div>
                        
                    </div>
                    <div class="modal-footer">
                            <input type="submit" value="Submit" class="btn btn-success">
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
                                        <label><b>Report Comment:</b></label>
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