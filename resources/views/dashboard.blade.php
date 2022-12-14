<!DOCTYPE html>
<html lang="en">

<meta name="csrf-token" content={{ csrf_token() }}>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>E-pro | Dashboard</title>
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<!-- iCheck -->
<link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<!-- JQVMap -->
<link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
<!-- summernote -->
<link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
<link href="{{asset('app.css')}}" rel="stylesheet">



<head>
    @stack('styles')
    @livewireStyles
    </body>
</head>
@vite('resources/js/app.js')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">



        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                
                    <div class="info">
                        <a href="#" class="d-block">{{auth()->user()->email}}</a>
                    </div>
                </div>

            

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Actions
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                            @if(auth()->user()->is_provider)
                                <li class="nav-item">
                                    <a href="{{route('serviceprovider.add.profile')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add profile</p>
                                    </a>
                                </li>
                                @endif
                                <li class="nav-item">
                                    <a href="{{route('serviceprovider.chat.view')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View chats</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('serviceprovider.jobs.view')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View jobs</p>
                                    </a>
                                </li>
                                @if(auth()->user()->is_provider)
                                <li class="nav-item">
                                    <a href="{{route('serviceprovider.about.view')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Settings</p>
                                    </a>
                                </li>
                                @endif

                                <li class="nav-item">
                                    <a href="{{route('settings.view')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Security settings</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">


            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">

                        <!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="container connectedSortable">
                            <br>

                            @if(auth()->user()->is_provider)

                            <div class="row">
                               

                                <div class="col-lg-3 col-xs-6">

                                    <div class="small-box bg-green">
                                        <div class="inner">
                                            <h3>{{\App\Models\Project::where('provider_id',auth()->id())->where('status','complete')->count()}}</h3>
                                            <p>Completed jobs</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-xs-6">

                                    <div class="small-box bg-yellow">
                                        <div class="inner">
                                        <h3>{{\App\Models\Project::where('provider_id',auth()->id())->where('status','pending')->count()}}</h3>
                                            <p>Pending jobs</p>
                                        </div>
                                        <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-xs-6">

                                    <div class="small-box bg-red">
                                        <div class="inner">
                                        <h3>{{\App\Models\Project::where('provider_id',auth()->id())->whereNotNull('rejected_at')->count()}}</h3>
                                            <p>Rejected Jobs</p>
                                        </div>
                                        <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            @endif

                           <div style="padding: 30px" >

                           @yield('content')
                           </div>

                        

                        </section>
                        <!-- right col -->
                    </div>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    {{--<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>--}}
    <!-- JQVMap -->
    <script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.js')}}"></script>

    @stack('scripts')

    @livewireScripts

</body>

</html>