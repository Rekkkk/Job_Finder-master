@extends('.navigation')

@section('content')
@include('sweetalert::alert')
<div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100 mt-5">
        <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            @if($page == 1)
                                <a class="nav-link active h6" data-toggle="tab" href="#applicant">Applicant</a>
                            @else
                                <a class="nav-link  h6" data-toggle="tab" href="#applicant">Applicant</a>
                            @endif
                        </li>
                        <li class="nav-item">
                            @if($page == 2)
                                <a class="nav-link active h6" data-toggle="tab" href="#employer">Employer</a>
                            @else
                                <a class="nav-link h6" data-toggle="tab" href="#employer">Employer</a>
                            @endif
                        </li>
                    </ul>
                    <div class="tab-content">
                        @if($page == 1)
                            <div id="applicant" class="container tab-pane active"><br>
                        @else
                            <div id="applicant" class="tab-pane container fade"><br>
                        @endif
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4"><b>Applicant Registration</b></p>
                                    @if($errors->any())
                                        <div class="alert alert-danger" role="alert">
                                            {{$errors->first()}}
                                        </div>
                                    @endif
                                    <form action="{{ route('register') }}" id="applicant_form" method="POST" class="mx-1 mx-md-4">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example1c" name="name" class="form-control" value="{{ $name1 }}" placeholder="Enter your Name" required>
                                                <label class="form-label h6" for="form3Example1c"><b>Your Name</b> </label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="form3Example3c" name="email" class="form-control" placeholder="Enter your Email" required >
                                                <label class="form-label h6" for="form3Example3c"><b>Your Email</b></label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4c" name="password" class="form-control password-applicant" placeholder="Enter your password" minlength="8" required>
                                                <label class="form-label h6" for="form3Example4c"><b>Password</b></label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4cd" name="confirm_password" class="form-control password-applicant" placeholder="Enter confirm password" minlength="8" required>
                                                <label class="form-label h6" for="form3Example4cd"><b>Confirm your password</b></label>
                                            </div>
                                        </div>
                                        <div style="display: flex">
                                            <input type='checkbox' onclick="myFunction()" id='show-password-applicant'/>
                                            <p style="margin-bottom: -1px; "class="p-1"> Show password</p>
                                        </div> <br>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="sumbit" class="btn btn-success w-50 btn-lg">Register</button>
                                        </div>
                                        <a href="{{ route('login.page') }}" class="h6 ">Already have an account? Login</a>  
                                    </form>
                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 order-1 order-lg-2" style="text-align: center;">
                                    <img src="{{ asset('/BRGY MAMATID LOGO.png') }}" width="200" height="180" alt=""><br>
                                    <img src="{{ asset('/warning.png') }}" width="450" height="350" alt=""><br>
                                </div>
                            </div>
                        </div>
 
                        @if($page == 2)
                            <div id="employer" class="container tab-pane active"><br>
                        @else
                            <div id="employer" class="tab-pane container fade"><br>
                        @endif
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4"><b>Employer Registration</b></p>
                                    @if($errors->any())
                                        <div class="alert alert-danger" role="alert">
                                            {{$errors->first()}}
                                        </div>
                                    @endif
                                    <form action="{{ route('register') }}" id="employers_form"enctype="multipart/form-data" method="POST"  class="mx-1 mx-md-4">
                                        @csrf
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input " id="customFile" name="employer_id[]" accept="image/*" multiple required>
                                                <label class="custom-file-label" for="customFile">Upload your ID</label>
                                            </div>
                                        <label class="form-label h6 mb-3"><b>Your Company ID/ Company Profile</b></label>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example1c" name="name" class="form-control" value="{{ $name2 }}" placeholder="Enter your Name" required>
                                                <label class="form-label h6" for="form3Example1c"><b>Your Name</b> </label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="form3Example3c" name="email" class="form-control" placeholder="Enter your Email" required>
                                                <label class="form-label h6" for="form3Example3c"><b>Your Email</b></label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="employer_password" name="password" class="form-control password" placeholder="Enter your password" minlength="8" required>
                                                <label class="form-label h6" for="employer_password"><b>Password</b></label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="employer_confirm_password" name="confirm_password" class="form-control password" placeholder="Enter confirm password" minlength="8" required>
                                                <label class="form-label h6" for="employer_confirm_password"><b>Confirm your password</b></label>
                                            </div>
                                        </div>
                                        <div style="display: flex">
                                            <input type='checkbox' onclick="myFunction()" class="show-password" id='show-password'/>
                                            <p style="margin-bottom: -1px; "class="p-1"> Show password</p>
                                        </div> <br>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="sumbit" class="btn btn-success w-50 btn-lg">Register</button>
                                        </div>
                                        <a href="{{ route('login.page') }}" class="h6 ">Already have an account? Login</a>  
                                    </form>
                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 order-1 order-lg-2" style="text-align: center;">
                                    <img src="{{ asset('/BRGY MAMATID LOGO.png') }}" width="200" height="180" alt=""><br>
                                    <img src="{{ asset('/warning.png') }}" width="450" height="350" alt=""><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <script>
    $(document).ready(function(){
        $(".show-password").click(function(){
            if("password"== $(".password").attr("type")){
                $(".password").prop("type", "text");
            }else{
                $(".password").prop("type", "password");
            }
        });

        $("#show-password-applicant").click(function(){
            if("password"== $(".password").attr("type")){
                $(".password-applicant").prop("type", "text");
            }else{
                $(".password-applicant").prop("type", "password");
            }
        });

        $("#employers_form").submit(function( event ) {

            var password = $("#employer_password").val(); 
            var confirm_password = $("#employer_confirm_password").val();
            
            if(password != confirm_password){
                alert("Password and Confirm Password not match");
                event.preventDefault();
            }else{
                return;
            }
        }); 

        $("#applicant_form").submit(function( event ) {

            var password = $("#form3Example4c").val(); 
            var confirm_password = $("#form3Example4cd").val();

            if(password != confirm_password){
                alert("Password and Confirm Password not match");
                event.preventDefault();
            }else{
                return;
            }
        }); 

        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    });
</script>

@endsection