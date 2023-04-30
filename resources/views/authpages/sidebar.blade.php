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

</head>
<body>
    <section id="container">
        <header class="header black-bg d-flex justify-content-between">
            <div class="d-flex align-items-center hover-effect" >
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
                </div>
                <div class="d-flex align-items-center" onclick="window.location='{{ route('home') }}';">
                    <img src="{{ asset('/Logo.jpg') }}" style="width: 35px;" class="rounded-pill mr-2"> 
                    <p class="text-white font-weight-bold h5" style="margin: 0px;">Barangay Employement Service Unit</p>
                </div>
                
            </div>
            <ul class="navbar-nav flex-row-reverse m-3 ml-5 h6">
                <li class="nav-item dropdown ">
                    @if(Auth::user()->user_role == 1)
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop-employer" data-toggle="dropdown" style="color:white">
                    @else
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop-applicant" data-toggle="dropdown" style="color:white">
                    @endif
                         <i class="fa fa-user"></i>
                         <span class="ml-2">{{Auth::user()->name}}</span>
                    </a>
                    <div class="dropdown-menu text-center">
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
        </header>
      <aside>
          <div id="sidebar" class="nav-collapse ">
            @if(Auth::user()->profile == null)
                <img src="/profile/default.jpg" id="logo" class="sidenav-img" style="border-style: solid; border-color: #FFFFFF;">>
            @else
                <img src="/profile/{{Auth::user()->profile}}" id="logo" class="sidenav-img" style="border-style: solid; border-color: #FFFFFF;">
            @endif
            <p class="h5 text-white text-center mt-2" style="text-transform: uppercase;">{{ Auth::user()->name }}</p>
            <img id="logo" src="{{ asset('/BRGY MAMATID LOGO.png') }}"  class="sidenav-img" style=" margin-top: 0px;">
            <!-- sidebar menu start-->
              <ul class="sidebar-menu list-unstyled" id="nav-accordion">
                @if(Auth::user()->user_role == 1)
                    <li style=" border: 2px solid #ffffff; border-radius: 10px;">
                        <a href="{{ route('my.job.posted') }}">
                            <i class="fa fa-newspaper-o"></i>
                            <span>MY POSTED JOBS</span>
                        </a>
                    </li>
                    <li style=" border: 2px solid #ffffff; border-radius: 10px;">
                        <a href="{{ route('create.job.page') }}">
                            <i class="fa fa-clipboard" aria-hidden="true"></i>
                            <span>POST A JOB</span>
                        </a>
                    </li>
                @else
                    <li style=" border: 2px solid #ffffff; border-radius: 10px;">
                        <a href="{{ route('job.list') }}">
                            <i class="fa fa-list"></i>
                            <span>JOBS AVAILABLES</span>
                        </a>
                    </li>
                    <li style=" border: 2px solid #ffffff; border-radius: 10px;">
                        <a href="{{ route('job.applied') }}">
                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                            <span>JOBS APPLIED</span>
                        </a>
                    </li>
                @endif
              </ul>
          </div>
      </aside>
      <section id="main-content">
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
    </section>
    
    <script class="include" type="text/javascript" src="{{ asset('/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('/js/common-scripts.js') }}"></script>
    <script src="{{ asset('/js/jquery/dataTables.js') }}"></script>
</body>

</html>
