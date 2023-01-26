<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JOB FINDER</title>
    <link rel="icon" href="{{ asset('/logo.png') }}">
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
        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <a href="{{ route('job.list') }}" class="logo"> <img src="{{ asset('/logo.png') }}" style="width: 35px;" class="rounded-pill"> <b> Job Finder</b></a>
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
        </header>
      <aside>
          <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                <li style=" border: 2px solid #ffffff; border-radius: 10px;">
                    <a href="{{ route('job.list') }}">
                        <i class="fa fa-list"></i>
                        <span>JOBS AVAILABLES</span>
                    </a>
                </li>
                <li style=" border: 2px solid #ffffff; border-radius: 10px;">
                    <a href="{{ route('create.job.page') }}">
                        <i class="fa fa-briefcase"></i>
                        <span>POST A JOB</span>
                    </a>
                </li>
                <li style=" border: 2px solid #ffffff; border-radius: 10px;">
                    <a href="{{ route('my.job.posted') }}">
                        <i class="fa fa-newspaper-o"></i>
                        <span>MY POSTED JOBS</span>
                    </a>
                </li>
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
