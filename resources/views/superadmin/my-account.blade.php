@extends('superadmin.sidebar')

@section('content')
@include('sweetalert::alert')
    <div class="container-fluid" style="padding: 65px 80px 20px 80px;">
        <form action="{{ route('edit.name') }}" method="POST">
            @csrf
            <div class="m-auto" style="max-width: 350px">
                <div class="row mt-2">
                    <div class="col-lg-12 text-center">
                        <label class="modal-text h5 ">Edit My Account Details</label>
                    </div>                              
                </div>
                <div class="row mt-2">
                    <div class="col-lg-12">
                        <label class="modal-text">Last Name : </label>
                        <input type="text" name="lname" class="form-control" value="{{ Auth::user()->lname }}" required>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="col-lg-12">
                        <label class="modal-text">First Name : </label>
                        <input type="text" name="fname" class="form-control" value="{{ Auth::user()->fname }}" required>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>         
                    <div class="col-lg-12">
                        <label class="modal-text">Middle Name : </label>
                        <input type="text" name="mname" class="form-control" value="{{ Auth::user()->mname }}">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>         
                    <div class="col-lg-12">
                        <label class="modal-text">Suffix : </label>
                        <input type="text" name="sname" class="form-control" value="{{ Auth::user()->sname }}">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>                               
                </div><br>
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-success">Change Name</button>
                    </div>
                </div>

            </form>    <br>
        <form action="{{ route('change.password') }}" method="POST">
            @csrf
            <h6 class="text-center">Change your Password</h6>
            <div class="row mt-2">
                <div class="col-lg-12">
                    <label class="modal-text">Current Password : </label>
                    <input type="password" name="current_password" class="form-control password" value="{{ old('current_password') }}">
                    @if ($errors->has('current_password'))
                        <span class="text-danger">{{ $errors->first('current_password') }}</span>
                    @endif
                </div>                              
            </div>
            <div class="row mt-2">
                <div class="col-lg-12">
                    <label class="modal-text">New Password : </label>
                    <input type="password" name="new_password" class="form-control password" value="{{ old('new_password') }}">
                    @if ($errors->has('new_password'))
                        <span class="text-danger">{{ $errors->first('new_password') }}</span>
                    @endif
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-12">
                    <label class="modal-text">Confirm Password : </label>
                    <input type="password" name="confirm_password" class="form-control password">
                    @if ($errors->has('confirm_password'))
                        <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                    @endif
                </div>
            </div>
            <div class="d-flex mt-2">
                <input type='checkbox' id='show-password'/>
                <p style="margin-bottom: -1px; "class="p-1"> Show password</p>
            </div>  
            
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-success">Change Password</button>
                </div>
            </div>
        </div>
    </form>    
</div>
<script>
    $(document).ready(function(){
        $("#show-password").click(function(){
            if("password"== $(".password").attr("type")){
                $(".password").prop("type", "text");
            }else{
                $(".password").prop("type", "password");
            }
        });
    });
</script>


@endsection