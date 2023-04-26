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
            <div class="row">
                <div class="col-2">
                    <a href="{{ route('dashboard') }}" class="logo mt-3"> <img src="{{ asset('/Logo.jpg') }}" style="width: 35px;" class="rounded-pill"> <b> Job Finder</b></a>
                </div>
                <div class="col-8 m-auto">
                    <ul class="nav justify-content-center" >
                        <li class="nav-item text-center mr-1" style=" border: 2px solid #ffffff; border-radius: 10px; width: 165px; " >
                            <a class="nav-link" href="{{ route('dashboard') }}" style="color: white"><span><b>DASHBOARD</b></span></a>
                        </li>
                        <li class="nav-item text-center mr-1" style=" border: 2px solid #ffffff; border-radius: 10px; width: 165px;">
                            <a class="nav-link" href="{{ route('report.post.management') }}" style="color: white"><span><b>REPORTED POST</b></span></a>
                        </li>
                        <li class="nav-item text-center mr-1" style=" border: 2px solid #ffffff; border-radius: 10px; width: 165px;">
                            <a class="nav-link" href="{{ route('employer.account') }}" style="color: white "><span><b>EMPLOYER ACCOUNTS</b> </span></a>
                        </li>
                        <li class="nav-item text-center" style=" border: 2px solid #ffffff; border-radius: 10px; width: 165px;">
                            <a class="nav-link" href="{{ route('applicant.accounts') }}" style="color: white "><span><b>APPLICANT ACCOUNTS</b> </span></a>
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
