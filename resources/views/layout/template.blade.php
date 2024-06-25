<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pajak Pemerintah Kota Ambon</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="icon" type="image/x-icon" href="{{ asset('uploads/logo.png') }}" />

    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}

        <!-- Tambahkan jQuery dan jQuery UI -->
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  

    {{-- Notif Mengembang --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini {{ 
    request()->segment(1) == 'pws_hotel' && !request()->segment(2) == 'cek' ||
    request()->segment(1) == 'pws_hiburan' && !request()->segment(2) == 'cek' ||
    request()->segment(1) == 'pws_restoran' && !request()->segment(2) == 'cek' ||

    request()->segment(1) == 'prs_hiburan' && request()->segment(2) == 'cek' ||
    request()->segment(1) == 'prs_hotel' && request()->segment(2) == 'cek' ||
    request()->segment(1) == 'prs_restoran' && request()->segment(2) == 'cek' ||
    
    request()->segment(1) == 'pgh_hotel' && request()->segment(2) == 'cek' ||
    request()->segment(1) == 'pgh_restoran' && request()->segment(2) == 'cek' ||
    request()->segment(1) == 'pgh_hiburan' && request()->segment(2) == 'cek'
    ? 'sidebar-collapse' : null }}">

    <div class="wrapper">
        <!-- =============================================== -->
        <header class="main-header">
            <a href="{{ url('/dashboard') }}" class="logo">
                <span class="logo-mini"><b>SM</b></span>
                <span class="logo-lg"> Sistem <b> Monitoring </b></span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- =============================================== -->

        <!-- =============================================== -->
        {{-- @if($this->fungsi->user_login()->level == 1) --}}
        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset('uploads/logo.png') }}" class="light-logo" alt="logo" width="50%">
                    </div>
                    <div class="pull-left info">
                        <p>Badan Pengelolaan Pajak</p>
                        <p>Pemerintah Kota Ambon</p>
                    </div>
                </div>


                <!-- sidebar menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MONITORING</li>
                    <li>
                        <a href="{{ url('dashboard') }}">
                            <i class="fa fa-home"></i> <span>Beranda</span>
                        </a>
                    </li>
                    <li class="treeview {{ request()->segment(1) == 'wp' || request()->segment(1) == 'wp_tipe' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-users"></i> <span>Wajib Pajak</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li {{ request()->segment(1) == 'wp' ? 'class="active"' : '' }}><a href="{{ url('wp') }}"><i class="fa fa-dot-circle-o"></i> Data Wajib Pajak</a></li>da
                            <li {{ request()->segment(1) == 'wp_tipe' ? 'class="active"' : '' }}><a href="{{ url('tipe_data') }}"><i class="fa fa-dot-circle-o"></i> Jenis Wajib Pajak</a></li>
                        </ul>
                    </li>

                    {{-- PENGAWASAN --}}
                    <li class="treeview {{ request()->segment(1) == 'pws_hotel' || request()->segment(1) == 'pws_hiburan' || request()->segment(1) == 'pws_restoran' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-searc"></i> <span>Pengawasan</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li {{ request()->segment(1) == 'pws_hiburan' ? 'class="active"' : '' }}><a href="{{ url('pws_hiburan') }}"><i class="fa fa-dot-circle-o"></i> Pajak Hiburan</a></li>
                            <li {{ request()->segment(1) == 'pws_hotel' ? 'class="active"' : '' }}><a href="{{ url('pws_hotel') }}"><i class="fa fa-dot-circle-o"></i> Pajak Hotel</a></li>
                            <li {{ request()->segment(1) == 'pws_restoran' ? 'class="active"' : '' }}><a href="{{ url('pws_restoran') }}"><i class="fa fa-dot-circle-o"></i> Pajak Restoran</a></li>
                        </ul>
                    </li>

                    {{-- PEMERIKSAAN --}}
                    <li class="treeview {{ request()->segment(1) == 'prs_hotel' || request()->segment(1) == 'prs_hiburan' || request()->segment(1) == 'prs_restoran' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-pencil-square-o"></i> <span>Pemeriksaan</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li {{ request()->segment(1) == 'prs_hiburan' ? 'class="active"' : '' }}><a href="{{ url('prs_hiburan') }}"><i class="fa fa-dot-circle-o"></i> Pajak Hiburan</a></li>
                            <li {{ request()->segment(1) == 'prs_hotel' ? 'class="active"' : '' }}><a href="{{ url('prs_hotel') }}"><i class="fa fa-dot-circle-o"></i> Pajak Hotel</a></li>
                            <li {{ request()->segment(1) == 'prs_restoran' ? 'class="active"' : '' }}><a href="{{ url('prs_restoran') }}"><i class="fa fa-dot-circle-o"></i> Pajak Restoran</a></li>
                        </ul>
                    </li>

                    {{-- PENAGIHAN --}}
                    <li class="treeview {{ request()->segment(1) == 'pgh_hotel' || request()->segment(1) == 'pgh_hiburan' || request()->segment(1) == 'pgh_restoran' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-pencil-square-o"></i> <span>Penagihan</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li {{ request()->segment(1) == 'pgh_hiburan' ? 'class="active"' : '' }}><a href="{{ url('pgh_hiburan') }}"><i class="fa fa-dot-circle-o"></i> Pajak Hiburan</a></li>
                            <li {{ request()->segment(1) == 'pgh_hotel' ? 'class="active"' : '' }}><a href="{{ url('pgh_hotel') }}"><i class="fa fa-dot-circle-o"></i> Penagihan Hotel</a></li>
                            <li {{ request()->segment(1) == 'pgh_restoran' ? 'class="active"' : '' }}><a href="{{ url('pgh_restoran') }}"><i class="fa fa-dot-circle-o"></i> Pajak Restoran</a></li>
                        </ul>
                    </li>
                    {{-- <li class="header">{{ strtoupper($this->fungsi->user_login()->username) }}</li> --}}
                    <li>
                        <a href="{{ url('profile') }}">
                            <i class="fa fa-user"></i> <span>Profil</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/') }}">
                            <i class="fa fa-power-off"></i> <span>Keluar</span>
                        </a>
                    </li>
                    <li class="header">PENGATURAN</li>
                    <li>
                        <a href="{{ url('user') }}">
                            <i class="fa fa-user-plus"></i> <span>Pengguna</span>
                        </a>
                    </li>
                </ul>
            </section>
        </aside>
        <!-- =============================================== -->
        {{-- @else --}}
        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset('uploads/logo.png') }}" class="light-logo" alt="logo" width="50%">
                    </div>
                    <div class="pull-left info">
                        <p align="left">Pajak Pendapatan Daerah</p>
                        <p align="left">Pemerintah Kota Ambon</p>
                    </div>
                </div>

                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MONITORING</li>
                    <li>
                        <a href="{{ url('dashboard') }}">
                            <i class="fa fa-home"></i> <span>Beranda</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('wp') }}">
                            <i class="fa fa-users"></i> <span>Wajib Pajak</span>
                        </a>
                    </li>

                    {{-- <li class="treeview {{ request()->segment(1) == 'wp_data' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-users"></i> <span>Wajib Pajak</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li {{ request()->segment(2) == 'data' ? 'class="active"' : '' }}><a href="{{ url('wp') }}"><i class="fa fa-dot-circle-o"></i>Data</a></li>
                            <!--<li {{ request()->segment(2) == 'pemeriksaan' ? 'class="active"' : '' }}><a href="{{ url('wp_tipe') }}"><i class="fa fa-dot-circle-o"></i>Jenis</a></li>-->
                        </ul>
                    </li> --}}

                    {{-- PENGAWASAN --}}
                    <li class="treeview {{ request()->segment(1) == 'wp_data' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-search"></i> <span>Pengawasan</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li {{ request()->segment(2) == 'pengawasan' ? 'class="active"' : '' }}><a href="{{ url('pws_hiburan') }}"><i class="fa fa-dot-circle-o"></i>Hiburan</a></li>
                            <li {{ request()->segment(2) == 'pemeriksaan' ? 'class="active"' : '' }}><a href="{{ url('pws_hotel') }}"><i class="fa fa-dot-circle-o"></i>Hotel</a></li>
                            <li {{ request()->segment(2) == 'pemeriksaan' ? 'class="active"' : '' }}><a href="{{ url('pws_restoran') }}"><i class="fa fa-dot-circle-o"></i>Restoran</a></li>
                        </ul>
                    </li>

                    {{-- PEMERIKSAAN --}}
                    <li class="treeview {{ request()->segment(1) == 'wp_data' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-pencil-square-o"></i> <span>Pemeriksaan</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li {{ request()->segment(2) == 'pengawasan' ? 'class="active"' : '' }}><a href="{{ url('prs_hiburan') }}"><i class="fa fa-dot-circle-o"></i>Hiburan</a></li>
                            <li {{ request()->segment(2) == 'pemeriksaan' ? 'class="active"' : '' }}><a href="{{ url('prs_hotel') }}"><i class="fa fa-dot-circle-o"></i>Hotel</a></li>
                            <li {{ request()->segment(2) == 'pemeriksaan' ? 'class="active"' : '' }}><a href="{{ url('prs_restoran') }}"><i class="fa fa-dot-circle-o"></i>Restoran</a></li>
                        </ul>
                    </li>

                    <li class="treeview {{ request()->segment(1) == 'wp_data' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-dollar"></i> <span>Penagihan</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li {{ request()->segment(2) == 'pengawasan' ? 'class="active"' : '' }}><a href="{{ url('pgh_hiburan') }}"><i class="fa fa-dot-circle-o"></i>Hiburan</a></li>
                            <li {{ request()->segment(2) == 'pemeriksaan' ? 'class="active"' : '' }}><a href="{{ url('pgh_hotel') }}"><i class="fa fa-dot-circle-o"></i>Hotel</a></li>
                            <li {{ request()->segment(2) == 'pemeriksaan' ? 'class="active"' : '' }}><a href="{{ url('pgh_restoran') }}"><i class="fa fa-dot-circle-o"></i>Restoran</a></li>
                        </ul>
                    </li>

                    {{-- MENU PROFIL --}}
                    {{-- <li>
                        <a href="{{ url('profile') }}">
                            <i class="fa fa-user"></i>
                            <span>{{ ucfirst($this->fungsi->user_login()->username) }}</span>
                        </a>
                    </li> --}}
                    <li class="header">PENGATURAN</li>
                    <li>
                        <a href="{{ url('profile') }}">
                            <i class="fa fa-user"></i> <span>Profil</span>
                        </a>
                    </li>

                    {{-- <li>
                        <a href="{{ url('user') }}">
                            <i class="fa fa-user-plus"></i> <span>Pengguna</span>
                        </a>
                    </li> --}}

                    {{-- <li>
                        <a href="{{ url('wp_lapor') }}">
                            <i class="fa fa-pencil-square-o"></i> <span>Lapor Pengawasan Pajak</span>
                        </a>
                    </li> --}}

                    {{-- <li class="treeview {{ request()->segment(1) == 'wp_data' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-search"></i> <span>Lihat Pajak</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li {{ request()->segment(2) == 'pengawasan' ? 'class="active"' : '' }}><a href="{{ url('wp_data/pengawasan') }}"><i class="fa fa-dot-circle-o"></i>Pengawasan Pajak</a></li>
                            <li {{ request()->segment(2) == 'pemeriksaan' ? 'class="active"' : '' }}><a href="{{ url('wp_data/pemeriksaan') }}"><i class="fa fa-dot-circle-o"></i>Pemeriksaan Pajak</a></li>
                        </ul>
                    </li> --}}

                    <li>
                        <a href="{{ url('/') }}" onclick="return confirm('Apakah Anda yakin ingin Keluar?')">
                            <i class="fa fa-power-off"></i> <span>Keluar</span>
                        </a>
                    </li>
                </ul>
            </section>
        </aside>
        {{-- @endif --}}
        <!-- =============================================== -->

        <!-- =============================================== -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- =============================================== -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Versi</b> 1.0
            </div>
            <strong><a href="https://alakasemesta.com" target="blank">CV Alaka Semesta</a> 2023</strong>
        </footer>
    </div>

    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>

    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#table1').DataTable()
        })
    </script>
</body>
</html>