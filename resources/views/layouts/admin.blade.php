<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <title>@yield('title')</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{asset('assets/css/colors/blue.css')}}" id="theme" rel="stylesheet">
    <link href="{{asset('assets/plugins/morrisjs/morris.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{url('/home')}}">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            {{-- <img src="{{asset('assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" /> --}}
                            <!-- Light Logo icon -->
                            {{-- <img src="{{asset('assets/images/logo-light-icon.png')}}" alt="homepage" class="light-logo" /> --}}
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span style="font-weight: bold">
                         <!-- dark Logo text -->
                         {{-- <img src="{{asset('assets/images/logo-text.png')}}" alt="homepage" class="dark-logo" /> --}}
                         <!-- Light Logo text -->    
                         <img src="{{asset('assets/images/logo-light-text.png')}}" class="light-logo" alt="homepage" />
                         DISPORA</span> </a>
                         
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <p class="mt-3 ml-3 text-white">Selamat Datang, Di Halaman {{Auth::user()->role}}</p>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="/foto_pegawai/{{Auth::user()->pegawai->foto ?? '../assets/images/users/5.jpg'}}" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="/foto_pegawai/{{Auth::user()->pegawai->foto ?? '../assets/images/users/5.jpg'}}" alt="user"></div>
                                            <div class="u-text">
                                                <h4>{{Auth::user()->name}}</h4>
                                                <p class="text-muted">{{Auth::user()->email}}</p>
                                        </div>
                                    </li>
                                    <li>
                                        @if (Auth::user()->role == 'Admin')
                                            <a href="{{url('akun', Auth::user()->id)}}"><i class="ti-user"></i> My Profile</a>
                                        @else
                                            <a href="{{url('akun', Auth::user()->pegawai->id)}}"><i class="ti-user"></i> My Profile</a>
                                        @endif
                                    </li>
                                    <li>
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST">@csrf
                                            </form>
                                            <i class="fa fa-power-off"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile" style="background: url({{asset('assets/images/background/user-info.jpg')}}) no-repeat;">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="/foto_pegawai/{{Auth::user()->pegawai->foto ?? '../assets/images/users/5.jpg'}}" alt="user" /> </div>
                    <!-- User profile text-->
                    <div class="profile-text"> 
                        <a href="#" class="dropdown-toggle link u-dropdown text-white" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">{{Auth::user()->name}} <span class="caret"></span>
                        </a>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">PERSONAL</li>
                        <li>
                            <a href="{{url('/home')}}" aria-expanded="false"><i class="fa fa-home"></i><span class="hide-menu">Dashboard</span></a>
                        </li>    
                        @php
                            $null = Auth::user()->pegawai->ttl == null || Auth::user()->pegawai->tempatlahir == null || Auth::user()->pegawai->kelamin == null || Auth::user()->pegawai->agama == null || Auth::user()->pegawai->nonpwp == null || Auth::user()->pegawai->nik == null || Auth::user()->pegawai->alamat == null || Auth::user()->pegawai->foto == null || Auth::user()->status == 'Pensiun'
                        @endphp
                        @if (Auth::user()->role == 'Admin')
                            @if ($null)
                            @else
                                <li>
                                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-user-circle-o"></i><span class="hide-menu">Data Users</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{route('pegawai.index')}}">Pegawai</a></li>
                                        <li><a href="{{url('index-kadis')}}">Kadis</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-bookmark"></i><span class="hide-menu">Data Master</span></a>
                                    <ul>
                                        <li><a href="{{route('pangkat.index')}}">Pangkat</a></li>
                                        <li><a href="{{route('cuti.index')}}">Cuti</a></li>
                                        <li><a href="{{route('absen.index')}}">Absen</a></li>
                                        <li><a href="{{route('mutasi.index')}}">Mutasi</a></li>
                                        <li><a href="{{route('pensiun.index')}}">Pensiun</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-download"></i><span class="hide-menu">Laporan</span></a>
                                    <ul>
                                        <li><a href="{{url('laporan-pegawai')}}">Pegawai</a></li>
                                    </ul>
                                </li>
                            @endif
                        @elseif(Auth::user()->role == 'Kadis')
                            @if ($null)
                                
                            @else
                                <li>
                                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-bookmark"></i><span class="hide-menu">Verifikasi</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{route('verifikasi-cuti.index')}}">Cuti</a></li>
                                        <li><a href="{{url('verifikasi-mutasi')}}">Mutasi</a></li>
                                    </ul>
                                </li>
                            @endif
                        @elseif(Auth::user()->role == 'Pegawai')
                            @if ($null)
                            @else
                                <li>
                                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-bookmark"></i><span class="hide-menu">Master Data</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{route('cuti-pegawai.index')}}">Cuti</a></li>
                                        <li><a href="{{route('absensi.index')}}">Absen</a></li>
                                        <li><a href="{{route('mutasi-pegawai.index')}}">Mutasi</a></li>
                                        <li><a href="{{route('pensiun-pegawai.index')}}">Pensiun</a></li>
                                    </ul>
                                </li>
                            @endif
                        @endif
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
        </aside>

        <div class="page-wrapper">
             <br>

            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    @yield('content')
                </div>

            </div>

            <footer class="footer">
                {{-- © 2017 Admin Press Admin by themedesigner.in --}}
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>

    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>

    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('assets/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('assets/js/sidebarmenu.js')}}"></script>
    <!--stickey kit -->
    <script src="{{asset('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{asset('assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('assets/js/custom.min.js')}}"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{asset('assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
    <!-- This is data table -->
    <script src="{{asset('assets/plugins/moment/moment.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
    <script src="{{asset('assets/plugins/raphael/raphael-min.js')}}"></script>
    <script src="{{asset('assets/plugins/morrisjs/morris.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/js/sweetalert.min.js')}}"></script>
    <!-- sparkline chart -->
    <script src="{{asset('assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('assets/js/dashboard4.js')}}"></script>    
    <script type="text/javascript">
        $('#myTable').DataTable();
        $(".select2").select2();
    </script>
    @yield('scripts')
</body>

</html>
