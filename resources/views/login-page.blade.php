@extends('.navigation')

@section('content')
    <div class="container py-5">
      @include('sweetalert::alert')
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <h2 class="mb-5"><b>Log-in</b></h2>
              @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    {{$errors->first()}}
                </div>
              @endif
              <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-outline mb-4">
                    <input type="email" id="typeEmailX-2" name="email" class="form-control form-control" placeholder="Email" value="{{ old('email') }}"/>
                    <label class="form-label h6 mt-1" for="typeEmailX-2"><b>Email</b></label>
                  </div>
                  <div class="form-outline mb-2">
                    <input type="password" id="typePasswordX-2" name="password" class="form-control form-control password" placeholder="Password"/>
                    <label class="form-label h6 mt-1" for="typePasswordX-2"><b>Password</b></label>
                  </div>
                  <div class="text-right">
                    <a href="" data-toggle="modal" 
                    data-target="#forgot-password" style="margin-left: auto" class="h6">Forgot password?</a>

                  </div>
                  <div style="display: flex">
                    <input type='checkbox' onclick="myFunction()" id='show-password'/>
                    <p style="margin-bottom: -1px; "class="p-1"> Show password</p>
                </div> <br>
                  <button class="btn btn-success btn-lg btn-block" type="submit">Login</button>
              </form><br>
              <a href="{{ route('register.page') }}" class="h6 mt-4">Dont have an account? Register</a>  
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="forgot-password">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Forgot your password</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <form action="{{ route('forgot.password') }}" method="POST">
              @csrf
              <div class="modal-body">
                  <div class="row">
                      <div class="col lg-12">
                          <label class="title-detail" >Enter your Email :</label>
                          <input type="email" class="form-control" name="email" placeholder="Enter your email address" required>
                      </div>
                  </div>   
                  <div class="row mt-3">
                    <div class="col text-right pr-3">
                      <button type="submit" class="btn btn-success" style="width: 120px;">Confirm</button>
                    </div>
                  </div>                     
              </div>
          </form>
        </div>
      </div>
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