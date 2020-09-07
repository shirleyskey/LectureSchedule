<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lịch Giảng Tuần| </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Ứng dụng quản lý khoa, lịch trình giảng dạy" name="description" />
        <meta content="" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('/images/logo.png') }}" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{ asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/global/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/global/plugins/jqvmap/jqvmap/jqvmap.css') }}" rel="stylesheet" type="text/css" />
        <!-- <link href="{{ asset('assets/global/plugins/pace/themes/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" /> -->
        <link href="{{ asset('css/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" />

        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{ asset('assets/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ asset('assets/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <link href="{{ asset('assets/pages/css/login.min.css') }}" rel="stylesheet" type="text/css" />


        <!-- STYLE FOR CALENDAR -->
        {{-- <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> --}}
        <link href="{{ asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>

        <script src="{{ asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/moment.min.js') }}" type="text/javascript"></script>
        {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script> --}}
        {{-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/> --}}
        <script src="{{ asset('assets/global/plugins/fullcalendar/lib/main.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/fullcalendar/lib/locales-all.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/fullcalendar/lib/lang-all.js') }}" type="text/javascript"></script>
        <link href="{{ asset('assets/global/plugins/fullcalendar/lib/main.min.css') }}" rel="stylesheet" type="text/css" />
          <!--END  STYLE FOR CALENDAR -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{ asset('assets/layouts/layout/css/layout.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/layouts/layout/css/themes/blue.min.css') }}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{ asset('assets/layouts/layout/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/layouts/layout/css/custom-calendar.css') }}" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <style>
            body{
                font-family: "Open Sans",sans-serif;
            }
        </style>

    </head>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner" style="width: 100%;">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="{{ route('dashboard') }}">
                            <img src="{{ asset('/images/logo_name.png') }}" alt="logo" class="logo-default" width="140" />
                            <!-- <h5 style="padding:7px; color: #fff;">THỊNH PHONG HRM</h5> -->
                        </a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <div class='time-frame hidden-xs' style="float:left; font-size: 12px; color: #fff; padding: 16px; display: -webkit-box;">
                        <i class="fa fa-clock-o" style="margin-right: 5px;"></i>
                        <div id='datetime-part'></div>
                    </div>
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">

                        <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="{{ asset('uploads/avatars/default-avatar.jpg')}}" />
                                    <span class="username username-hide-on-mobile"> {{ (Auth::user())?(Auth::user()->giangviens->ten):'' }} </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="{{route('profile.edit.get', Auth::user()->id_giangvien)}}">
                                            <i class="fa fa-user"></i> Thông Tin Cá Nhân
                                        </a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="{{route('profile.thongbao.get', Auth::user()->id_giangvien)}}">
                                            <i class="fa fa-calendar-minus-o"></i>Lịch Trình Cá Nhân
                                        </a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li >
                                        <a href="{{ route('logout.get') }}" style="color: #CC0000">
                                            <i class="fa fa-sign-out" style="color: #CC0000"></i>
                                            Đăng Xuất
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>
            <!-- END HEADER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">

                <div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <div class="page-sidebar navbar-collapse collapse">
                        <!-- BEGIN SIDEBAR MENU -->
                        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                            <li class="nav-item start ">
                                <a href="{{ route('dashboard') }}" class="nav-link">
                                    <i class="fa fa-dashboard"></i>
                                    <span class="title"> <strong>BẢNG ĐIỀU KHIỂN</strong></span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            <li class="heading">
                                <h3 class="uppercase">QUẢN LÝ</h3>
                            </li>
                            {{-- <li class="nav-item {{ Request::is('lichgiang/phancong') ? 'active open' : '' }}">
                                <a href="{{ route('lichgiang.phancong') }}" class="nav-link nav-toggle">
                                    <i class="fa fa-calendar"></i>
                                    <span class="title">Phân Công Lịch Giảng</span>
                                    <span class="selected"></span>
                                </a>
                            </li> --}}
                            {{-- <li class="nav-item {{ Request::is('lichgiang/lichgiangtuan') ? 'active open' : '' }}">
                                <a href="{{ route('lichgiang.lichgiangtuan') }}" class="nav-link nav-toggle">
                                    <i class="fa fa-calendar-check-o"></i>
                                    <span class="title">Lịch Giảng Tuần</span>
                                    <span class="selected"></span>
                                </a>
                            </li> --}}
                            @permission('read-giangvien')
                            <li class="nav-item {{ Route::getCurrentRoute()->getPrefix() == '/giangvien' ? 'active open' : '' }}">
                                <a href="{{ route('giangvien.index') }}" class="nav-link nav-toggle">
                                    <i class="fa fa-user"></i>
                                    <span class="title">Giảng Viên</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            @endpermission
                            @permission('read-lop')
                            <li class="nav-item {{ Route::getCurrentRoute()->getPrefix() == '/lop' ? 'active open' : '' }}">
                                <a href="{{ route('lop.index') }}" class="nav-link nav-toggle">
                                    <i class="fa fa-building-o"></i>
                                    <span class="title">Lớp</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            @endpermission
                            @permission('read-hocphan')
                            <li class="nav-item {{ Route::getCurrentRoute()->getPrefix() == '/hocphan' ? 'active open' : '' }}">
                                <a href="{{ route('hocphan.index') }}" class="nav-link nav-toggle">
                                    <i class="fa fa-file-code-o"></i>
                                    <span class="title">Học Phần</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            @endpermission


                            <li class="heading">
                                <h3 class="uppercase">NCKH</h3>
                            </li>
                            <li class="nav-item {{ Request::is('nckh') ? 'active open' : '' }}">
                                <a href="{{ route('nckh.index') }}" class="nav-link nav-toggle">
                                    <i class="fa fa-briefcase "></i>
                                    <span class="title">Quản Lý NCKH</span>
                                    <span class="selected"></span>
                                </a>
                            </li>

                            <li class="heading">
                                <h3 class="uppercase">Công Việc Khác</h3>
                            </li>
                            <li class="nav-item {{ Request::is('khac') ? 'active open' : '' }}">
                                <a href="{{ route('khac.edit.get') }}" class="nav-link nav-toggle">
                                    <i class="fa fa-plus-circle "></i>
                                    <span class="title">Công Việc Khác</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            @permission('read-file-manager')
                            <li class="heading">
                                <h3 class="uppercase">Quản trị nâng cao</h3>
                            </li>
                            <li class="nav-item {{ Route::getCurrentRoute()->getPrefix() == '/file-manager' ? 'active open' : '' }}">
                                <a href="{{ route('file-manager.index') }}" class="nav-link nav-toggle">
                                    <i class="fa fa-folder-open"></i>
                                    <span class="title">Tập tin & hình ảnh</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            @endpermission
                            @permission('read-users')
                            <li class="nav-item {{ Route::getCurrentRoute()->getPrefix() == '/users' ? 'active open' : '' }}">
                                <a href="{{ route('user.index') }}" class="nav-link nav-toggle">
                                    <i class="fa fa-user"></i>
                                    <span class="title">Người Dùng Hệ Thống</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            @endpermission
                        </ul>
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <span>Bảng điều khiển</span>
                                </li>
                            </ul>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> Bảng điều khiển
                            <small>Thống kê tổng giờ giảng, NCKH và Công việc khác</small>

                        </h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <!-- BEGIN DASHBOARD STATS 1-->
                        <div class="row">
                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                @permission('create-users')
                                <div class="content" style="margin: 50px">
                                    <a class="btn btn-primary" data-toggle="modal" href='#modal-add'>Import file</a><br><br>
                                    <div class="modal fade" id="modal-add">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                <form action="{{route('lichgiang.lichgiangtuan.import')}}" method="POST" role="form" enctype="multipart/form-data">
                                                        <legend>Nhập Lịch Học</legend>
                                                        @csrf
                                                        <div class="form-group">
                                                            <input type="file" class="form-control" name="calendar" id="" placeholder="Input field">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endpermission
                                    {!! $calendar->calendar() !!}
                                    {!! $calendar->script() !!}
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <!-- END DASHBOARD STATS 1-->
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->

            </div>
            <!-- END CONTAINER -->

           <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner pull-right">@2020 - Dung B14D48 - ATTT. All Right Reserved.
            </div>
            {{-- <div class="page-footer-inner font-yellow-gold bold">
                Chú ý: Đây là bản thử nghiệm. Vì vậy mọi dữ liệu trên ứng dụng đều được xem là dữ liệu mẫu, không có giá trị thực tế
            </div> --}}
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
        </div>
        <script src="{{ asset('assets/global/plugins/pace/pace.min.js') }}" type="text/javascript"></script>
        {{-- <script src="{{ asset('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script> --}}
        {{-- <script src="{{ asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script> --}}
        <script src="{{ asset('assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{ asset('assets/global/plugins/moment-with-locales.js') }}" type="text/javascript"></script>
        <!-- <script src="{{ asset('assets/global/plugins/moment.min.js') }}" type="text/javascript"></script> -->
        <script src="{{ asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/morris/morris.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/morris/raphael-min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/counterup/jquery.waypoints.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/amcharts/amcharts/amcharts.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/amcharts/amcharts/serial.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/amcharts/amcharts/pie.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/amcharts/amcharts/radar.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/amcharts/amcharts/themes/light.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/amcharts/amcharts/themes/patterns.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/amcharts/amcharts/themes/chalk.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/amcharts/ammap/ammap.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/amcharts/ammap/maps/js/worldLow.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/amcharts/amstockcharts/amstock.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/horizontal-timeline/horizontal-timeline.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/flot/jquery.flot.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/flot/jquery.flot.resize.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/flot/jquery.flot.categories.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js') }}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{ asset('assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <!-- <script src="{{ asset('assets/pages/scripts/dashboard.js') }}" type="text/javascript"></script> -->
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{ asset('assets/layouts/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
        <!-- <script src="{{ asset('assets/layouts/layout/scripts/demo.min.js') }}" type="text/javascript"></script> -->
        <script src="{{ asset('assets/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/layouts/global/scripts/quick-nav.min.js') }}" type="text/javascript"></script>

        <script>
        $(document).ready(function() {
            var interval = setInterval(function() {
                var $now = moment().locale('vi').format('dd, DD/MM/YYYY, h:mm:ss A');
                $('#datetime-part').html($now);
            }, 100);

            var SITEURL = "{{url('/')}}";
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });



        });
        </script>

    </body>
</html>