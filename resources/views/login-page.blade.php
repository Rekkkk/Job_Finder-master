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
                  <div class="form-outline mb-4">
                    <input type="password" id="typePasswordX-2" name="password" class="form-control form-control password" placeholder="Password"/>
                    <label class="form-label h6 mt-1" for="typePasswordX-2"><b>Password</b></label>
                  </div>
                  <div style="display: flex">
                    <input type='checkbox' onclick="myFunction()" id='show-password'/>
                    <p style="margin-bottom: -1px; "class="p-1"> Show password</p>
                </div> <br>
                  <button class="btn btn-success btn-lg btn-block" type="submit">Login</button>
                
              </form>
  

            </div>
          </div>
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