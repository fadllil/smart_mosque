<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('assets/img/basic/favicon.ico')}}" type="image/x-icon">
    <title>Paper</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/panel.css')}}">

    <!-- AdminLte3 -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/adminlte3/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/adminlte3/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">

    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #F5F8FA;
            z-index: 9998;
            text-align: center;
        }
        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }
    </style>
</head>
<body>
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="l-s-2 blink">LOADING</div>
    </div>
</div>
<div id="app" class="paper-loading">

    <!--Sidebar Toggle Button-->
    <a href="#" data-toggle="offcanvas" class="paper-nav-toggle fixed left"><i></i></a>

    <!--Sidebar Start-->
    <aside class="main-sidebar fixed offcanvas shadow">
        <section class="sidebar">
            <div class="user-panel">
                <div class="image float-left">
                    <img class="user_avatar" src="{{asset('/assets/img/dummy/u2.png')}}" alt="User Image">
                </div>
                <div class="info">
                    <h6 class="p-t-10">{{Auth::User()->nama}}</h6>
                    <a href="#"><i class="icon-circle text-primary blink"></i> Online</a>
                </div>
            </div>
            <ul class="sidebar-menu">
                <li class="treeview
                @if(Request::is('/')) active @endif
                    "><a href="/">
                        <i class="icon-sailing-boat-water purple-text"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="treeview
                @if(Request::is('admin_masjid/profil_masjid')) active @endif
                    "><a href="/admin_masjid/profil_masjid">
                        <i class="icon-sailing-boat-water purple-text"></i> <span>Profil Masjid</span>
                    </a>
                </li>
                <li class="treeview
                @if(Request::is('admin_masjid/pengurus_masjid')) active @endif
                    "><a href="/admin_masjid/pengurus_masjid">
                        <i class="icon-sailing-boat-water purple-text"></i> <span>Pengurus Masjid</span>
                    </a>
                </li>
                <li class="treeview
                @if(Request::is('admin_masjid/jamaah')) active @endif
                    "><a href="/admin_masjid/jamaah">
                        <i class="icon-sailing-boat-water purple-text"></i> <span>Jamaah Masjid</span>
                    </a>
                </li>
                <li class="treeview
                @if(Request::is('admin_masjid/jadwal_imam')) active @endif
                    "><a href="/admin_masjid/jadwal_imam">
                        <i class="icon-sailing-boat-water purple-text"></i> <span>Jadwal Imam Masjid</span>
                    </a>
                </li>
                <li class="treeview
                @if(Request::is('admin_masjid/kegiatan')) active @endif
                    "><a href="/admin_masjid/kegiatan">
                        <i class="icon-sailing-boat-water purple-text"></i> <span>Kegiatan Masjid</span>
                    </a>
                </li>
                <li class="treeview
                @if(Request::is('admin_masjid/informasi')) active @endif
                    "><a href="/admin_masjid/informasi">
                        <i class="icon-sailing-boat-water purple-text"></i> <span>Informasi</span>
                    </a>
                </li>
                <li class="treeview
                @if(Request::is('admin_masjid/inventaris')) active @endif
                    "><a href="/admin_masjid/inventaris">
                        <i class="icon-sailing-boat-water purple-text"></i> <span>Inventaris</span>
                    </a>
                </li>
                <li class="treeview
                @if(Request::is('admin_masjid/pemasukan')) active @endif
                @if(Request::is('admin_masjid/pengeluaran')) active @endif
                    "><a href="#">
                        <i class="icon-sailing-boat-water purple-text"></i> <span>Keuangan</span> <i
                            class="icon icon-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin_masjid/keuangan"><i class="icon icon-circle-o"></i>Keuangan Masjid</a>
                        </li>
                        <li><a href="/admin_masjid/pemasukan"><i class="icon icon-circle-o"></i>Pemasukan</a>
                        </li>
                        <li><a href="/admin_masjid/pengeluaran"><i class="icon icon-circle-o"></i>Pengeluaran</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
    </aside>
    <!--Sidebar End-->

    <div class="page light offcanvas-page">
        <div class="pos-f-t">
            <div class="collapse" id="navbarToggleExternalContent">
                <div class="bg-dark p-4">
                    <div class="search-bar">
                        <input class="transparent s-24 text-white b-0 font-weight-lighter w-128 height-50" type="text"
                               placeholder="start typing...">
                    </div>
                    <a href="#" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-expanded="false"
                       aria-label="Toggle navigation" class="paper-nav-toggle paper-nav-white active "><i></i></a>
                </div>
            </div>
        </div>
        <div>
            <header class="blue accent-3 relative">
                <div class="navbar navbar-expand navbar-dark d-flex justify-content-end bd-navbar">
                    <ul class="navbar-nav p-t-10">
                        <!-- Messages Dropdown-->
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false">
                                <i class="icon-message s-18"></i>
                                <span class="badge badge-success badge-mini rounded-circle">4</span>
                            </a>
                            <ul class="dropdown-menu width-250 p-0 dropdown-menu-right b-0 shadow1">
                                <li class="p-2 b-b"><span class="s-12" ><i class="icon-message"></i> You have 4 messages </span></li>
                                <li>
                                    <div class="slimScroll" data-height="225">
                                        <ul class="list-unstyled p-3">
                                            <li class="media">
                                                <img class="mr-3 w-15" src="assets/img/dummy/u1.png" alt="">
                                                <div class="media-body">
                                                    <h6 class="mt-0 mb-0 font-weight-normal s-14">Doe Joe</h6>
                                                    <small class="s-12"> 7 minutes ago</small>
                                                </div>
                                            </li>
                                            <li class="media my-4">
                                                <img class="mr-3 w-15" src="assets/img/dummy/u2.png" alt="">
                                                <div class="media-body">
                                                    <h6 class="mt-0 mb-0 font-weight-normal s-14">Doe Joe</h6>
                                                    <small class="s-12"> 7 minutes ago</small>
                                                </div>
                                            </li>
                                            <li class="media my-4">
                                                <img class="mr-3 w-15" src="assets/img/dummy/u3.png" alt="">
                                                <div class="media-body">
                                                    <h6 class="mt-0 mb-0 font-weight-normal s-14">Doe Joe</h6>
                                                    <small class="s-12"> 7 minutes ago</small>
                                                </div>
                                            </li>
                                            <li class="media my-4">
                                                <img class="mr-3 w-15" src="assets/img/dummy/u4.png" alt="">
                                                <div class="media-body">
                                                    <h6 class="mt-0 mb-0 font-weight-normal s-14">Doe Joe</h6>
                                                    <small class="s-12"> 7 minutes ago</small>
                                                </div>
                                            </li>
                                            <li class="media my-4">
                                                <img class="mr-3 w-15" src="assets/img/dummy/u5.png" alt="">
                                                <div class="media-body">
                                                    <h6 class="mt-0 mb-0 font-weight-normal s-14">Doe Joe</h6>
                                                    <small class="s-12"> 7 minutes ago</small>
                                                </div>
                                            </li>
                                            <li class="media my-4">
                                                <img class="mr-3 w-15" src="assets/img/dummy/u6.png" alt="">
                                                <div class="media-body">
                                                    <h6 class="mt-0 mb-0 font-weight-normal s-14">Doe Joe</h6>
                                                    <small class="s-12"> 7 minutes ago</small>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="p-1 b-t text-center"><a class="s-12" href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <!-- Notification Dropdown-->
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false">
                                <i class="icon-notifications s-18"></i>
                                <span class="badge badge-danger badge-mini rounded-circle">4</span>
                            </a>
                            <ul class="dropdown-menu width-250 p-0 dropdown-menu-right b-0 shadow1">
                                <li class="p-2 b-b"><span class="s-12" ><i class="icon-notifications text-danger"></i>You have 5 notifications </span></li>
                                <li >
                                    <div class="slimScroll" data-height="225">
                                        <ul class="list-unstyled list-group list-group-striped">
                                            <li class="p-2">
                                                <a href="#" class="s-12">
                                                    <i class="icon-data_usage text-blue"></i> 5 new members joined today
                                                </a>
                                            </li>
                                            <li class="p-2">
                                                <a href="#" class="s-12">
                                                    <i class="icon-data_usage text-success"></i> 5 new members joined today
                                                </a>
                                            </li>
                                            <li class="p-2">
                                                <a href="#" class="s-12">
                                                    <i class="icon-data_usage text-danger"></i> 5 new members joined today
                                                </a>
                                            </li>
                                            <li class="p-2">
                                                <a href="#" class="s-12">
                                                    <i class="icon-data_usage text-yellow"></i> 5 new members joined today
                                                </a>
                                            </li>


                                        </ul>
                                    </div>
                                </li>
                                <li class="p-1 b-t text-center"><a class="s-12" href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" data-target="#navbarToggleExternalContent"
                               aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation"><i
                                    class=" icon-search3 s-18"></i> </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/"><i class="icon-tasks s-18"></i> </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-item nav-link  mr-md-2" href="#" id="bd-versions" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="icon-more_vert s-18"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right b-0 shadow1">
                                <a class="dropdown-item" href="#"><i class="icon-profile"></i> View Profile </a>
                                <a class="dropdown-item" href="#"><i class="icon-cog"></i> Account Settings </a>
                                <a class="dropdown-item" href="#"><i class="icon-money"></i> Earning Reports </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout"><i class="icon-money"></i> Logout </a>
                            </div>
                        </li>
                    </ul>
                </div>
                @yield('judul')
            </header>
            @if ($message = Session::get('succes'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            @if ($message = Session::get('alert'))
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            @if ($message = Session::get('warning'))
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            @if ($message = Session::get('info'))
                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Please check the form below for errors
                </div>
            @endif
            @yield('content')
        </div>
    </div>

</div>
<!--End Page page_wrrapper -->
<script src="{{asset('assets/js/panel.js')}}"></script>

<!-- adminlte 3 -->
<!-- Bootstrap 4 -->
<script src="{{asset('assets/adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('assets/adminlte3/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/adminlte3/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/adminlte3/dist/js/adminlte.min.js')}}"></script>
<!-- page script -->
@yield('script')
<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>

</body>
</html>
