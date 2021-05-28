<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('backend')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('backend')}}/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('backend')}}/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend')}}/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('backend')}}/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('backend')}}/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('backend')}}/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('backend')}}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('backend')}}/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('backend')}}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" id="app">

  <header class="main-header">
    <!-- Logo -->
    <router-link to="/dashboard" class="logo">
      <span class="logo-lg"><b>Admin </b>Panel</span>
    </router-link>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            

                            <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"  class="user-image">
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>

                        @else
                            
                                <span class="hidden-xs">{{ Auth::user()->name }}</span><span class="pull-right-container">
              <i class="fa fa-sort-desc pull-right"></i> </span>

                                
                              
                            
                        @endif
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ Auth::user()->profile_photo_url }}" class="img-circle" alt="{{ Auth::user()->name }}">

                <p>
                  {{ Auth::user()->name }}
                  {{--  <small>Member since Nov. 2012</small>  --}}
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('profile.show') }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  
                  <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="{{ route('logout') }}" class="btn btn-default btn-flat"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
     
     
      
      <ul class="sidebar-menu" data-widget="tree">
        
        <li class="active treeview">
          <router-link to="/dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </router-link>
          
        </li>


               
              
          <li class="treeview">
          <router-link to="/home-page">
            <i class="fa fa-home"></i> <span>Home</span>
          </router-link>
          </li>

          

         <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>About Me</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><router-link to="/personal-info"><i class="fa fa-circle-o"></i> Personal Info</router-link></li>
            <li><router-link to="/get-count"><i class="fa fa-circle-o"></i> Get Count</router-link></li>
            {{--  <li><router-link to="/resume"><i class="fa fa-circle-o"></i> Resume</router-link></li>  --}}
            
          </ul>
        </li>

          <li class="treeview">
          <router-link to="/services-page">
            <i class="fa fa-life-ring"></i> <span>Services</span>
          </router-link>
          </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-image-o"></i>
            <span>Portfolios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><router-link to="/portfolio-category"><i class="fa fa-circle-o"></i> Category</router-link></li>
            <li><router-link to="/portfolio-list"><i class="fa fa-circle-o"></i> Protfolios</router-link></li>
            
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope-o"></i>
            <span>Contact Me</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            {{--  <li><router-link to="/contact-info"><i class="fa fa-circle-o"></i> Contact Info</router-link></li>  --}}
            <li><router-link to="/contact-inbox"><i class="fa fa-circle-o"></i> Inbox</router-link></li>
            
          </ul>
        </li>

       <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i>
            <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><router-link to="/logo-setting"><i class="fa fa-circle-o"></i> Logo</router-link></li>
            <li><router-link to="/menu-setting"><i class="fa fa-circle-o"></i> Menu</router-link></li>
            {{--  <li><router-link to="/footer-info-setting"><i class="fa fa-circle-o"></i> Footer Info</router-link></li>
            <li><router-link to="/others-setting"><i class="fa fa-circle-o"></i> Others</router-link></li>  --}}
            
          </ul>
        </li>


         




       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <master-component/>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy;  2020-2021 <a href="https://green.edu.bd/">GUB</a>.</strong> All rights
    reserved.
  </footer>


</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('backend')}}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('backend')}}/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('backend')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="{{asset('backend')}}/bower_components/raphael/raphael.min.js"></script>
<script src="{{asset('backend')}}/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('backend')}}/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="{{asset('backend')}}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{asset('backend')}}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('backend')}}/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('backend')}}/bower_components/moment/min/moment.min.js"></script>
<script src="{{asset('backend')}}/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="{{asset('backend')}}/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('backend')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="{{asset('backend')}}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{asset('backend')}}/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->


<!-- AdminLTE for demo purposes -->
<script src="{{asset('backend')}}/dist/js/demo.js"></script>

<!-- DataTables -->
<script src="{{asset('backend')}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('backend')}}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>


<script src="{{asset('js/app.js')}}"></script>

</body>

</html>
