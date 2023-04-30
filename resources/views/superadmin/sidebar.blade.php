<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JOB FINDER</title>
    <link rel="icon" href="{{ asset('/Logo.jpg') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <script src="{{ asset('/js/jquery/jquery_3.6.0.js') }}"></script>
    <script src="{{ asset('/js/jquery/bootstrap.bundle.min.js') }}"></script>
    <link href=" {{ asset('/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style-responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/dataTables.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">
</head>
<body>
    <section id="container">
        <header class="header black-bg">
            <div class="row align-items-center">
                <div class="col-4">
                    <div class="d-flex align-items-center hover-effect" onclick="window.location='{{ route('dashboard') }}';">
                        <img src="{{ asset('/Logo.jpg') }}" style="width: 35px;" class="rounded-pill mr-2"> 
                        <p class="text-white font-weight-bold h5" style="margin: 0px;">Barangay Employement Service Unit</p>
                    </div>
                   
                </div>
                <div class="col-6 m-auto">
                    <ul class="nav" >
                        <li class="nav-item text-center mr-1" style=" border: 2px solid #ffffff; border-radius: 10px; width: 165px; " >
                            <a class="nav-link" href="{{ route('dashboard') }}" style="color: white"><span><b>DASHBOARD</b></span></a>
                        </li>
                        <li class="nav-item text-center mr-1" style=" border: 2px solid #ffffff; border-radius: 10px; width: 165px;">
                            <a class="nav-link" href="{{ route('report.post.management') }}" style="color: white"><span><b>REPORTED POST</b></span></a>
                        </li>
                        <li class="nav-item text-center" style=" border: 2px solid #ffffff; border-radius: 10px; width: 165px;">
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" style="color: white "><span><b>ACCOUNTS</b> </span></a>
                                <div class="dropdown-menu text-center">
                                    @if(Auth::user()->user_role === 3)
                                    <a class="dropdown-item" href="{{ route('admin.accounts') }}">ADMINS</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('employer.account') }}">EMPLOYERS</a>
                                    <a class="dropdown-item" href="{{ route('applicant.accounts') }}">APPLICANTS</a>
                                  </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-2">
                    <ul class="navbar-nav flex-row-reverse m-3 h6">
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="color:white">
                                <i class="fa fa-user"></i>
                                <span class="ml-2">{{Auth::user()->name}}</span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('edit.account.page') }}">
                                    <i class="fa fa-user-circle-o"></i>
                                    <span class="ml-2">My Account</span>
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <i class="fa fa fa-times"></i>
                                    <span class="ml-2">Sign Out</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
          <section class="wrapper site-min-height">
              <div class="row mt">
                  <div class="col-lg-12">
                      @yield('content')
                  </div>
              </div>
          </section>
        <footer class="site-footer">
            <div class="text-center">
                <p> 
                    &copy; <strong>Job Finder</strong>. All Rights Reserved 2022
                </p>
            </div>
        </footer>

    
    <script class="include" type="text/javascript" src="{{ asset('/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('/js/common-scripts.js') }}"></script>
    <script src="{{ asset('/js/jquery/dataTables.js') }}"></script>
</body>

</html>
