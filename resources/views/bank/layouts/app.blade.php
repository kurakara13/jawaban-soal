<!DOCTYPE html>
<html lang="en">

<head>
    <title>Able Pro Responsive Bootstrap 4 Admin Template by Phoenixcoded</title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')}}"></script>
     <![endif]-->

     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
     <!-- Favicon icon -->
     <link rel="shortcut icon" href="{{asset('vendor/ablepro-lite/assets/images/favicon.png')}}" type="image/x-icon">
     <link rel="icon" href="{{asset('vendor/ablepro-lite/assets/images/favicon.ico')}}" type="image/x-icon">

     <!-- Google font-->
     <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

     <!-- iconfont -->
     <link rel="stylesheet" type="text/css" href="{{asset('vendor/ablepro-lite/assets/icon/icofont/css/icofont.css')}}">

     <!-- simple line icon -->
     <link rel="stylesheet" type="text/css" href="{{asset('vendor/ablepro-lite/assets/icon/simple-line-icons/css/simple-line-icons.css')}}">

     <!-- Required Fremwork -->
     <link rel="stylesheet" type="text/css" href="{{asset('vendor/ablepro-lite/assets/plugins/bootstrap/css/bootstrap.min.css')}}">

     <!-- Weather css -->
     <link href="{{asset('vendor/ablepro-lite/assets/css/svg-weather.css')}}" rel="stylesheet">

     <!-- Echart js -->
     <script src="{{asset('vendor/ablepro-lite/assets/plugins/charts/echarts/js/echarts-all.js')}}"></script>

     @yield('extraCss')

     <!-- Style.css')}}" -->
     <link rel="stylesheet" type="text/css" href="{{asset('vendor/ablepro-lite/assets/css/main.css')}}">

     <!-- Responsive.css')}}"-->
     <link rel="stylesheet" type="text/css" href="{{asset('vendor/ablepro-lite/assets/css/responsive.css')}}">

     <!--color css-->
     <link rel="stylesheet" type="text/css" href="{{asset('vendor/ablepro-lite/assets/css/color/color-1.min.css')}}" id="color"/>

 </head>
 <body class="sidebar-mini fixed">
    <div class="loader-bg">
        <div class="loader-bar">
        </div>
    </div>
    <div class="wrapper">
      <!-- <div class="loader-bg">
        <div class="loader-bar">
        </div>
      </div> -->
      <!-- Navbar-->
      <header class="main-header-top hidden-print">
        <a href="index.html" class="logo"><img class="img-fluid able-logo" src="{{asset('vendor/ablepro-lite/assets/images/logo.png')}}" alt="Theme-logo"></a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button--><a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu f-right">
            <ul class="top-nav">
                <!-- window screen -->
                <li class="pc-rheader-submenu">
                    <a href="#!" class="drop icon-circle" onclick="javascript:toggleFullScreen()">
                        <i class="icon-size-fullscreen"></i>
                    </a>

                </li>
                <!-- User Menu-->
                <li class="dropdown">
                    <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                        <span><img class="img-circle " src="{{asset('vendor/ablepro-lite/assets/images/avatar-1.png')}}" style="width:40px;" alt="User Image"></span>
                        <span>{{ Auth::user()->firstname }} <b>{{ Auth::user()->lastname }}</b> <i class=" icofont icofont-simple-down"></i></span>

                    </a>
                    <ul class="dropdown-menu settings-menu">
                        <li>
                          <a class="dropdown-item" href="{{ route('bank.logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              <i class="icon-logout"></i> Logout
                          </a>

                          <form id="logout-form" action="{{ route('bank.logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                        </li>

                    </ul>
                </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print " >
          <section class="sidebar" id="sidebar-scroll">

              <div class="user-panel">
                  <div class="f-left image"><img src="{{asset('vendor/ablepro-lite/assets/images/avatar-1.png')}}" alt="User Image" class="img-circle"></div>
                  <div class="f-left info">
                      <p>{{ Auth::user()->firstname.' '. Auth::user()->lastname }}</p>
                      <p class="designation">Member <i class="icofont icofont-caret-down m-l-5"></i></p>
                  </div>
              </div>
              <!-- sidebar profile Menu-->
              <ul class="nav sidebar-menu extra-profile-list">
                  <li>
                      <a class="waves-effect waves-dark" href="javascript:void(0)">
                          <i class="icon-logout"></i>
                          <span class="menu-text">Logout</span>
                          <span class="selected"></span>
                      </a>
                  </li>
              </ul>
              <!-- Sidebar Menu-->
              <ul class="sidebar-menu">
                  <li class="nav-level">Navigation</li>
                  <li class="{{ (\Request::route()->getName() == 'bank.home') ? 'active' : '' }} treeview">
                      <a class="waves-effect waves-dark" href="{{url('bank')}}">
                          <i class="icon-speedometer"></i><span> Dashboard</span>
                      </a>
                  </li>
                  <li class="{{ (\Request::route()->getName() == 'topup.index') ? 'active' : '' }} treeview">
                      <a class="waves-effect waves-dark" href="{{url('bank/topup')}}">
                          <i class="icon-book-open"></i><span> Topup</span>
                      </a>
                  </li>
                  <li class="treeview">
                      <a class="waves-effect waves-dark" href="{{url('bank/withdraw')}}">
                          <i class="feather icon-credit-card"></i><span> Withdraw</span>
                      </a>
                  </li>
                  <li class="treeview">
                      <a class="waves-effect waves-dark" href="{{url('bank/transfer')}}">
                          <i class="icon-list"></i><span> Transfer</span>
                      </a>
                  </li>
                  <li class="treeview">
                      <a class="waves-effect waves-dark" href="{{url('bank/mutasi')}}">
                          <i class="icon-docs"></i><span> laporan mutasi</span>
                      </a>
                  </li>
                  <li class="nav-level">Account</li>
                  <li class="{{ (\Request::route()->getName() == 'profile.index') ? 'active' : '' }} treeview">
                      <a class="waves-effect waves-dark" href="{{url('bank/profile')}}">
                          <i class="icon-user"></i><span> Profile</span>
                      </a>
                  </li>
                  <li class="{{ (\Request::route()->getName() == 'bank.setting') ? 'active' : '' }} treeview">
                      <a class="waves-effect waves-dark" href="{{url('bank/bank-account')}}">
                          <i class="icon-settings"></i><span> Bank Account</span>
                      </a>
                  </li>
              </ul>
          </section>
      </aside>
      <div class="content-wrapper">
        @yield('content')
      </div>
    </div>

    <!-- Required Jqurey -->
    <script src="{{asset('vendor/ablepro-lite/assets/plugins/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/ablepro-lite/assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('vendor/ablepro-lite/assets/plugins/tether/dist/js/tether.min.js')}}"></script>

    <!-- Required Fremwork -->
    <script src="{{asset('vendor/ablepro-lite/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- waves effects.js -->
    <script src="{{asset('vendor/ablepro-lite/assets/plugins/Waves/waves.min.js')}}"></script>

    <!-- Scrollbar JS-->
    <script src="{{asset('vendor/ablepro-lite/assets/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('vendor/ablepro-lite/assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js')}}"></script>

    <!--classic JS-->
    <script src="{{asset('vendor/ablepro-lite/assets/plugins/classie/classie.js')}}"></script>

    <!-- notification -->
    <script src="{{asset('vendor/ablepro-lite/assets/plugins/notification/js/bootstrap-growl.min.js')}}"></script>

    @yield('extraScript')

    <!-- custom js -->
    <script type="text/javascript" src="{{asset('vendor/ablepro-lite/assets/js/main.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/ablepro-lite/assets/pages/elements.js')}}"></script>
    <script src="{{asset('vendor/ablepro-lite/assets/js/menu.min.js')}}"></script>
</body>

</html>
