<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">  
    <link rel="icon" href="{{ asset('/Logo.jpg') }}">
    <script src="{{ asset('/js/jquery/jquery_3.6.0.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <title>BESU</title>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
        <div class="d-flex align-items-center hover-effect" onclick="window.location='{{ route('home') }}';">
            <img src="{{ asset('/Logo.jpg') }}" style="width: 35px;" class="rounded-pill mr-2"> 
            <p class="text-white font-weight-bold h5" style="margin: 0px;">Barangay Employement Service Unit</p>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-row-reverse mt-2" id="collapsibleNavbar">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link h6" href="{{ route('aboutus.page') }}">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link h6" href="{{ route('home') }}">Home</a>
                </li>
          
                <li class="nav-item">
                    <a class="nav-link h6" href="{{ route('register.page') }}">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link h6" href="{{ route('login.page') }}">Login</a>
                </li>
            </ul>
        </div>  
    </nav>
    <section class="wrapper site-min-height"  >    
      
          
                @yield('content')

    
    </section>

    <footer class="text-white text-center text-lg-start mt-2" style="background-color: #23242a;">
    <div class="container p-4">
        <div class="row mt-4">
            <div class="col-lg-12 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-4">BESU Mamatid</h5>
            </div>
        </div>
    </div>
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2022 Copyright :
        <a>BESU Mamatid</a>
      </div>
    </footer>
    <script src="{{ asset('/js/jquery/bootstrap.bundle.min.js') }}"></script>
</body>
</html>