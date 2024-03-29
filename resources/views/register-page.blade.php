@extends('.navigation')

@section('content')
@include('sweetalert::alert')
<div class="container-fluid h-100">
    <div class="row d-flex justify-content-center align-items-center h-100 mt-5">
        <div class="col-lg-12 col-xl-10">
            <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-4">
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
                        <li class="nav-item">
                            @if($page == 3)
                                <a class="nav-link active h6" data-toggle="tab" href="#admin">Admin</a>
                            @else
                                <a class="nav-link  h6" data-toggle="tab" href="#admin">Admin</a>
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
                                            <div class="form-outline mr-1 flex-fill mb-0">
                                                <input type="text" id="form3Example1c" name="lname" class="form-control" value="{{ $lname1 }}" placeholder="Enter Last Name" required>
                                                <label class="form-label h6" for="form3Example1c"><b>Last Name</b> </label>
                                            </div>
                                            <div class="form-outline ml-1 flex-fill mb-0">
                                                <input type="text" id="form3Example1c" name="fname" class="form-control" value="{{ $fname1 }}" placeholder="Enter First Name" required>
                                                <label class="form-label h6" for="form3Example1c"><b>First Name</b> </label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <div class="form-outline mr-1 flex-fill mb-0">
                                                <input type="text" id="form3Example1c" name="mname" class="form-control" value="{{ $mname1 }}" placeholder="Enter Middle Name" required>
                                                <label class="form-label h6" for="form3Example1c"><b>Middle Name</b> </label>
                                            </div>
                                            <div class="form-outline ml-1 flex-fill mb-0">
                                                <input type="text" id="form3Example1c" name="sname" class="form-control" value="{{ $sname1 }}" placeholder="Enter Suffix">
                                                <label class="form-label h6" for="form3Example1c"><b>Suffix <span class="text-danger">(Optional)</span></b> </label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="form3Example3c" name="email" class="form-control" placeholder="Enter your Email" required >
                                                <label class="form-label h6" for="form3Example3c"><b>Your Email</b></label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4c" name="password" class="form-control password-applicant" placeholder="Enter your password" minlength="8" required>
                                                <label class="form-label h6" for="form3Example4c"><b>Password</b></label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4cd" name="confirm_password" class="form-control password-applicant" placeholder="Enter confirm password" minlength="8" required>
                                                <label class="form-label h6" for="form3Example4cd"><b>Confirm password</b></label>
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
                                <div class="col-md-10 col-lg-6 col-xl-7 order-1 order-lg-2" >
                                    <div class="text-center">
                                        <img src="{{ asset('/BRGY MAMATID LOGO.png') }}" width="200" height="180" alt="">
                                    </div>
                                    <div class="text-left mt-5" style="list-style-position: inside; font-size: 22px;">
                                        <ul>
                                            <li>
                                                An administrator monitored all of the information.
                                            </li>
                                            <li>
                                                Posting false or fake information may result in a banned or disabled account
                                            </li>
                                        </ul>  
                                    </div>
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
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input " id="customFile" name="employer_id[]" accept="image/*" multiple required>
                                                <label class="custom-file-label" for="customFile">Upload your ID</label>
                                            </div>
                                        <label class="form-label h6 mb-3"><b>Your Company ID/ Company Profile</b></label>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <div class="form-outline mr-1 flex-fill mb-0">
                                                <input type="text" id="form3Example1c" name="lname" class="form-control" value="{{ $lname2 }}" placeholder="Enter Last Name" required>
                                                <label class="form-label h6" for="form3Example1c"><b>Last Name</b> </label>
                                            </div>
                                            <div class="form-outline ml-1 flex-fill mb-0">
                                                <input type="text" id="form3Example1c" name="fname" class="form-control" value="{{ $fname2 }}" placeholder="Enter First Name" required>
                                                <label class="form-label h6" for="form3Example1c"><b>First Name</b> </label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <div class="form-outline mr-1 flex-fill mb-0">
                                                <input type="text" id="form3Example1c" name="mname" class="form-control" value="{{ $mname2 }}" placeholder="Enter Middle Name" required>
                                                <label class="form-label h6" for="form3Example1c"><b>Middle Name</b> </label>
                                            </div>
                                            <div class="form-outline ml-1 flex-fill mb-0">
                                                <input type="text" id="form3Example1c" name="sname" class="form-control" value="{{ $sname2 }}" placeholder="Enter Suffix">
                                                <label class="form-label h6" for="form3Example1c"><b>Suffix <span class="text-danger">(Optional)</span></b> </label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="form3Example3c" name="email" class="form-control" placeholder="Enter your Email" required>
                                                <label class="form-label h6" for="form3Example3c"><b>Your Email</b></label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="employer_password" name="password" class="form-control password" placeholder="Enter your password" minlength="8" required>
                                                <label class="form-label h6" for="employer_password"><b>Password</b></label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="employer_confirm_password" name="confirm_password" class="form-control password" placeholder="Enter confirm password" minlength="8" required>
                                                <label class="form-label h6" for="employer_confirm_password"><b>Confirm password</b></label>
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
                                <div class="col-md-10 col-lg-6 col-xl-7 order-1 order-lg-2" >
                                    <div class="text-center">
                                        <img src="{{ asset('/BRGY MAMATID LOGO.png') }}" width="200" height="180" alt="">
                                    </div>
                                    <div class="text-left mt-5" style="list-style-position: inside; font-size: 22px;">
                                        <ul>
                                            <li>
                                                An administrator monitored all of the information.
                                            </li>
                                            <li>
                                                Posting false or fake information may result in a banned or disabled account
                                            </li>
                                        </ul>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($page == 3)
                            <div id="admin" class="container tab-pane active"><br>
                        @else
                            <div id="admin" class="tab-pane container fade"><br>
                        @endif
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-7 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4"><b>Admin Registration</b></p>
                                    @if($errors->any())
                                        <div class="alert alert-danger" role="alert">
                                            {{$errors->first()}}
                                        </div>
                                    @endif
                                    <form action="{{ route('register') }}" id="employers_form"enctype="multipart/form-data" method="POST"  class="mx-1 mx-md-4">
                                        @csrf
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input " id="customFile" name="admin_id[]" accept="image/*" multiple required>
                                                <label class="custom-file-label" for="customFile">Upload your ID</label>
                                            </div>
                                        <label class="form-label h6 mb-3"><b>Your Barangay ID</b></label>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <div class="form-outline mr-1 flex-fill mb-0">
                                                <input type="text" id="form3Example1c" name="lname" class="form-control" value="{{ $lname3 }}" placeholder="Enter Last Name" required>
                                                <label class="form-label h6" for="form3Example1c"><b>Last Name</b> </label>
                                            </div>
                                            <div class="form-outline ml-1 flex-fill mb-0">
                                                <input type="text" id="form3Example1c" name="fname" class="form-control" value="{{ $fname3 }}" placeholder="Enter First Name" required>
                                                <label class="form-label h6" for="form3Example1c"><b>First Name</b> </label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <div class="form-outline mr-1 flex-fill mb-0">
                                                <input type="text" id="form3Example1c" name="mname" class="form-control" value="{{ $mname3 }}" placeholder="Enter Middle Name" required>
                                                <label class="form-label h6" for="form3Example1c"><b>Middle Name</b> </label>
                                            </div>
                                            <div class="form-outline ml-1 flex-fill mb-0">
                                                <input type="text" id="form3Example1c" name="sname" class="form-control" value="{{ $sname3 }}" placeholder="Enter Suffix Name">
                                                <label class="form-label h6" for="form3Example1c"><b>Suffix <span class="text-danger">(Optional)</span></b> </label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="form3Example3c" name="email" class="form-control" placeholder="Enter your Email" required>
                                                <label class="form-label h6" for="form3Example3c"><b>Your Email</b></label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <div class="form-outline flex-fill mb-0 mr-1">
                                                <input type="password" id="admin-password" name="password" class="form-control password" placeholder="Enter your password" minlength="8" required>
                                                <label class="form-label h6" for="admin-password"><b>Password</b></label>
                                            </div>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="admin-confirm_password" name="confirm_password" class="form-control password" placeholder="Enter confirm password" minlength="8" required>
                                                <label class="form-label h6" for="admin-confirm_password"><b>Confirm password</b></label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="admin-barangay" name="barangay" class="form-control" placeholder="Enter barangay name" required>
                                                <label class="form-label h6" for="admin-barangay"><b>Barangay Name</b></label>
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
                                <div class="col-md-10 col-lg-6 col-xl-5 order-1 order-lg-2" >
                                    <div class="text-center">
                                        <img src="{{ asset('/BRGY MAMATID LOGO.png') }}" width="200" height="180" alt="">
                                    </div>
                                    <div class="text-left mt-5" style="list-style-position: inside; font-size: 22px;">
                                        <ul>
                                            <li>
                                                Kindly coordinate with BESU Mamatid Cabuyao City.
                                            </li>
                                            <li>
                                                Administrator account is for employer's admin department only.
                                            </li>
                                        </ul>  
                                    </div>
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