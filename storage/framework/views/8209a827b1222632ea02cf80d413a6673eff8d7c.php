<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lịch Giảng Tuần | Lịch Giảng </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Ứng dụng quản lý khoa, lịch trình giảng dạy" name="description" />
        <meta content="" name="author" />
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <link rel="shortcut icon" href="<?php echo e(asset('/images/logo.png')); ?>" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/global/plugins/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/global/plugins/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/global/plugins/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo e(asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/global/plugins/morris/morris.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/global/plugins/jqvmap/jqvmap/jqvmap.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- <link href="<?php echo e(asset('assets/global/plugins/pace/themes/pace-theme-flash.css')); ?>" rel="stylesheet" type="text/css" /> -->
        <link href="<?php echo e(asset('css/pace/pace-theme-flash.css')); ?>" rel="stylesheet" type="text/css" />

        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo e(asset('assets/global/css/components.min.css')); ?>" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo e(asset('assets/global/css/plugins.min.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <link href="<?php echo e(asset('assets/pages/css/login.min.css')); ?>" rel="stylesheet" type="text/css" />


        <!-- STYLE FOR CALENDAR -->
        
        <link href="<?php echo e(asset('assets/global/plugins/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
        <script src="<?php echo e(asset('assets/global/plugins/jquery.min.js')); ?>" type="text/javascript"></script>

        <script src="<?php echo e(asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/moment.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/fullcalendar/lib/fullcalendar.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/fullcalendar/lib/locales-all.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/fullcalendar/lib/lang-all.js')); ?>" type="text/javascript"></script>
        <link href="<?php echo e(asset('assets/global/plugins/fullcalendar/lib/fullcalendar.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/global/plugins/fullcalendar/lib/fullcalendar.print.css')); ?>" rel="stylesheet" type="text/css" />
          <!--END  STYLE FOR CALENDAR -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo e(asset('assets/layouts/layout/css/layout.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/layouts/layout/css/themes/blue.min.css')); ?>" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo e(asset('assets/layouts/layout/css/custom.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/layouts/layout/css/custom-calendar.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <script>

</script>
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
            <a href="<?php echo e(route('dashboard')); ?>">
                <img src="<?php echo e(asset('/images/logo_name.png')); ?>" alt="logo" class="logo-default" width="140" />
                <!-- <h5 style="padding:7px; color: #fff;">THỊNH PHONG HRM</h5> -->
            </a>
            <div class="menu-toggler sidebar-toggler custom-click-sidebar-opened">
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
            <div class='time-frame permission-style hidden-xs' style="float:left; font-size: 12px; padding: 16px; color: #fff;display: -webkit-box;">
                <img class="permission-style" alt="" style="width: 20px; margin-right: 3px" src="<?php echo e(asset('images/permission2.png')); ?>" />
            <span class="username username-hide-on-mobile">
                <?php 
                    $v = Auth::user();
                ?>
                <?php $__currentLoopData = $v->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($role->display_name); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </span>
            </div>

            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN USER LOGIN DROPDOWN -->
              
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle custom-hover" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle" src="<?php echo e(asset('images/avatar2.png')); ?>" />
                        <span class="username username-hide-on-mobile"> <?php echo e((Auth::user())?(Auth::user()->giangviens->ten):''); ?> </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="<?php echo e(route('giangvien.read.get', Auth::user()->id_giangvien)); ?>">
                                <img alt="" style="width: 18px; " src="<?php echo e(asset('images/info.png')); ?>" /> Thông Tin Cá Nhân
                            </a>
                        </li>
                        <li class="divider"> </li>
                        <li>
                            <a href="<?php echo e(route('profile.thongbao.get', Auth::user()->id_giangvien)); ?>">
                                <img alt="" style="width: 18px; " src="<?php echo e(asset('images/calendar.png')); ?>" /> Lịch Trình Cá Nhân
                            </a>
                        </li>
                        <li class="divider"> </li>
                        <li>
                            <a href="<?php echo e(route('profile.edit.get', Auth::user()->id_giangvien)); ?>">
                                <img alt="" style="width: 18px; " src="<?php echo e(asset('images/setting.png')); ?>" /> Chỉnh Sửa Thông Tin
                            </a>
                        </li>
                        <li class="divider"> </li>
                        <li >
                            <a href="<?php echo e(route('logout.get')); ?>" style="color: #e63946">
                                <img alt="" style="width: 18px; " src="<?php echo e(asset('images/logout2.png')); ?>" />
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
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->

            <!-- BEGIN CONTAINER -->
            <div class="page-container">

                <div class="page-sidebar-wrapper">
                 <!-- BEGIN SIDEBAR -->
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
            <?php if (app('laratrust')->can('read-dashboard')) : ?>
            <li class="heading nav-item <?php echo e(Route::getCurrentRoute()->getPrefix() == '/tuan' ? 'active open' : ''); ?>">
                <h3 class="uppercase custom-border">
                    <a href="<?php echo e(route('tuan.get')); ?>" style="color: #dbe7f2;" class="nav-link">
                        <i class="fa fa-calendar" style="color: #dbe7f2;"></i>
                        <span class="title" >Lịch Tuần</span>
                        <span class="selected"></span>
                    </a>
                </h3>
            </li>
            <?php endif; // app('laratrust')->can ?>
            <?php if (app('laratrust')->can('read-dashboard')) : ?>
            <li class="heading nav-item <?php echo e(Route::getCurrentRoute()->getPrefix() == '/lichgiang/lichgiangtuan' ? 'active open' : ''); ?>">
                <h3 class="uppercase custom-border">
                    <a href="<?php echo e(route('lichgiang.lichgiangtuan')); ?>" style="color: #dbe7f2;" class="nav-link">
                        <i class="fa fa-calculator" style="color: #dbe7f2;"></i>
                        <span class="title" >Lịch Giảng</span>
                        <span class="selected"></span>
                    </a>
                </h3>
            </li>
            <?php endif; // app('laratrust')->can ?>
           
            
            <li class="heading nav-item">
                <h3 class="uppercase custom-border"> <a data-toggle="collapse" href="#sub-menu" class="nav-link nav-toggle"><i class="fa fa-building-o"></i>GIẢNG DẠY</a> <span class="caret"></span></h3>
            </li>
            <div class="collapse list-group-level1" id="sub-menu">
            <?php if (app('laratrust')->can('read-dashboard')) : ?>
            <li class="nav-item <?php echo e(Route::getCurrentRoute()->getPrefix() == '/lop' ? 'active open' : ''); ?>">
                <a href="<?php echo e(route('lop.index')); ?>" class="nav-link nav-toggle" data-parent="#sub-menu">
                    <span class="title">Lịch Theo Lớp</span>
                    <span class="selected"></span>
                </a>
            </li>
            <?php endif; // app('laratrust')->can ?>
            <li class="nav-item <?php echo e(Request::is('lichgiang/phancong') ? 'active open' : ''); ?>">
                <a href="<?php echo e(route('lichgiang.phancong')); ?>" class="nav-link nav-toggle">
                    <span class="title">Lịch Theo Học Phần</span>
                    <span class="selected"></span>
                </a>
            </li>
            
            </div>
            
            <?php if (app('laratrust')->can('read-dashboard')) : ?>
            <li class="heading nav-item <?php echo e(Route::getCurrentRoute()->getPrefix() == '/nckh' ? 'active open' : ''); ?>">
                <h3 class="uppercase custom-border">
                    <a href="<?php echo e(route('nckh.index')); ?>" style="color: #dbe7f2;" class="nav-link">
                        <i class="fa fa-briefcase " style="color: #dbe7f2;"></i>
                        <span class="title" >NCKH</span>
                        <span class="selected"></span>
                    </a>
                </h3>
            </li>
            <?php endif; // app('laratrust')->can ?>
            <?php if (app('laratrust')->can('read-dashboard')) : ?>
            <li class="heading nav-item <?php echo e(Route::getCurrentRoute()->getPrefix() == '/khac' ? 'active open' : ''); ?>">
                <h3 class="uppercase custom-border">
                    <a href="<?php echo e(route('khac.edit.get')); ?>" style="color: #dbe7f2;" class="nav-link">
                        <i class="fa fa-plus-circle " style="color: #dbe7f2;"></i>
                        <span class="title" >Công Tác Khác</span>
                        <span class="selected"></span>
                    </a>
                </h3>
            </li>
            <?php endif; // app('laratrust')->can ?>
            <?php if (app('laratrust')->can('read-dashboard')) : ?>
            <li class="heading nav-item <?php echo e(Route::getCurrentRoute()->getPrefix() == '/giangvien' ? 'active open' : ''); ?>">
                <h3 class="uppercase custom-border">
                    <a href="<?php echo e(route('giangvien.index')); ?>" style="color: #dbe7f2;" class="nav-link">
                        <i class="fa fa-user" style="color: #dbe7f2;"></i>
                        <span class="title" >Giảng Viên</span>
                        <span class="selected"></span>
                    </a>
                </h3>
            </li>
            <?php endif; // app('laratrust')->can ?>
            <?php if (app('laratrust')->can('read-dashboard')) : ?>
            <li class="heading nav-item <?php echo e(Route::getCurrentRoute()->getPrefix() == '/dashboard' ? 'active open' : ''); ?>">
                <h3 class="uppercase custom-border">
                    <a href="<?php echo e(route('dashboard.deadline')); ?>" style="color: #dbe7f2;" class="nav-link">
                        <i class="fa fa-warning" style="color: #dbe7f2;"></i>
                        <span class="title" >Đến Hạn</span>
                        <span class="selected"></span>
                    </a>
                </h3>
            </li>
            <?php endif; // app('laratrust')->can ?>


            
            <?php if (app('laratrust')->can('read-dashboard')) : ?>
            <li class="heading">
                <h3 class="uppercase custom-border"> <i class="fa fa-file-code-o"></i><a data-toggle="collapse" href="#sub-menu-nangcao">Quản Trị</a> <span class="caret"></span></h3>
            </li>
            <div class="collapse list-group-level1" id="sub-menu-nangcao">
                <?php if (app('laratrust')->can('create-giangvien')) : ?>
                <li class="nav-item <?php echo e(Route::getCurrentRoute()->getPrefix() == '/hocphan' ? 'active open' : ''); ?>">
                    <a href="<?php echo e(route('hocphan.index')); ?>" class="nav-link nav-toggle">
                       
                        <span class="title"> Import Lịch Excel</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <?php endif; // app('laratrust')->can ?>
                <li class="nav-item <?php echo e(Route::getCurrentRoute()->getPrefix() == '/file-manager' ? 'active open' : ''); ?>">
                    <a href="<?php echo e(route('file-manager.index')); ?>" class="nav-link nav-toggle">
                        <span class="title">Tập tin & hình ảnh</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <?php endif; // app('laratrust')->can ?>
                <?php if (app('laratrust')->can('create-users')) : ?>
                <li class="nav-item <?php echo e(Route::getCurrentRoute()->getPrefix() == '/users' ? 'active open' : ''); ?>">
                    <a href="<?php echo e(route('user.index')); ?>" class="nav-link nav-toggle">
                        <span class="title"> Người Dùng Hệ Thống</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <?php endif; // app('laratrust')->can ?>
                <?php if (app('laratrust')->can('create-giangvien')) : ?>
                <li class="nav-item <?php echo e(Route::getCurrentRoute()->getPrefix() == '/quanly' ? 'active open' : ''); ?>">
                    <a href="<?php echo e(route('company.index')); ?>" class="nav-link nav-toggle">
                        <span class="title"> Cài Đặt</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <?php endif; // app('laratrust')->can ?>
                
            </div>
            <li class="heading custom-border">
                <h3 class=""> 
                    <img alt="" style="width: 20px; " src="<?php echo e(asset('images/logout2.png')); ?>" />
                    <a  href="<?php echo e(route('logout.get')); ?>" style="color: #e63946">Đăng Xuất</a>
                </h3>
            </li>
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
                                    <span>Bảng điều khiển / Lịch Giảng Tuần Chung</span>
                                </li>
                            </ul>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> Lịch Giảng Tuần Chung
                            <small>Xem Thông Tin Lịch Giảng Chi Tiết</small>

                        </h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <!-- BEGIN DASHBOARD STATS 1-->
                        <div class="row">
                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <?php if (app('laratrust')->can('create-users')) : ?>
                                <!-- <div class="content" style="margin: 50px">
                                    <a class="btn btn-primary" data-toggle="modal" href='#modal-add'>Import file</a><br><br>
                                    <div class="modal fade" id="modal-add">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                <form action="<?php echo e(route('lichgiang.lichgiangtuan.import')); ?>" method="POST" role="form" enctype="multipart/form-data">
                                                        <legend>Nhập Lịch Học</legend>
                                                        <?php echo csrf_field(); ?>
                                                        <div class="form-group">
                                                            <input type="file" class="form-control" name="calendar" id="" placeholder="Input field">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <?php endif; // app('laratrust')->can ?>
                                    <?php echo $calendar->calendar(); ?>

                                    <?php echo $calendar->script(); ?>

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
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 right">
                <div class="img">
                    <img src="<?php echo e((setting('company.logo','') != '')?url('/uploads/logos/' . setting('company.logo') ): 'http://www.placehold.it/200x200/EFEFEF/AAAAAA&amp;text=no+image'); ?>" alt="" />
                    <h2><?php echo e(setting('company.tenkhoa','')); ?></h2>
                    <h3><?php echo e(setting('company.tenhocvien','')); ?></h3>
                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-6 left">
                <h2 class="title"><?php echo e(setting('company.tenphanmem','')); ?></h2>
                <ul class="description">
                    <li>
                        <i class="fa fa-building" aria-hidden="true"></i>
                        Bản quyền <i class="fa fa-copyright" aria-hidden="true"></i><?php echo e(setting('company.banquyen','')); ?></li>
                    <li>
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        Địa chỉ: <?php echo e(setting('company.diachi','')); ?></li>
                    <li>
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        Liên hệ: <?php echo e(setting('company.lienhe','')); ?></li>
                    <li>
                        <i class="fa fa-code" aria-hidden="true"></i>
                        Phát triển: <?php echo e(setting('company.phattrien','')); ?></li>
                </ul>
            </div>
            
        </div>
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- END FOOTER -->

        </div>
        <script src="<?php echo e(asset('assets/global/plugins/pace/pace.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/js.cookie.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/jquery.blockui.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')); ?>" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo e(asset('assets/global/plugins/moment-with-locales.js')); ?>" type="text/javascript"></script>
        <!-- <script src="<?php echo e(asset('assets/global/plugins/moment.min.js')); ?>" type="text/javascript"></script> -->
        <script src="<?php echo e(asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/morris/morris.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/morris/raphael-min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/counterup/jquery.waypoints.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/counterup/jquery.counterup.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/horizontal-timeline/horizontal-timeline.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/flot/jquery.flot.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/flot/jquery.flot.resize.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/flot/jquery.flot.categories.min.js')); ?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo e(asset('assets/global/scripts/app.min.js')); ?>" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <!-- <script src="<?php echo e(asset('assets/pages/scripts/dashboard.js')); ?>" type="text/javascript"></script> -->
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo e(asset('assets/layouts/layout/scripts/layout.min.js')); ?>" type="text/javascript"></script>
        <!-- <script src="<?php echo e(asset('assets/layouts/layout/scripts/demo.min.js')); ?>" type="text/javascript"></script> -->
        <script src="<?php echo e(asset('assets/layouts/global/scripts/quick-sidebar.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/layouts/global/scripts/quick-nav.min.js')); ?>" type="text/javascript"></script>

        <script>
        $(document).ready(function() {
            var interval = setInterval(function() {
                var $now = moment().locale('vi').format('dd, DD/MM/YYYY, h:mm:ss A');
                $('#datetime-part').html($now);
            }, 100);

            var SITEURL = "<?php echo e(url('/')); ?>";
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // console.log("HIhi");
            $('.fc-list-button.fc-button').attr('disabled',"disabled");
            
            $(".fc-basicWeek-button").click(function(){
                $('.fc-list-button.fc-button').removeAttr("disabled");
                $('.fc-prev-button').removeAttr("disabled");
                $('.fc-next-button').removeAttr("disabled");
            });

            $('.fc-list-button.fc-button').attr('disabled',"disabled");

            $(".fc-list-button.fc-button").click(function(){
                $('.fc-prev-button').attr('disabled',"disabled");
                $('.fc-next-button').attr('disabled',"disabled");
                console.log("Block ");
            });
            $(".fc-month-button.fc-button").click(function(){
                $('.fc-prev-button').removeAttr("disabled");
                $('.fc-next-button').removeAttr("disabled");
                console.log("Hết Block");
            });
            $(".fc-basicDay-button").click(function(){
                $('.fc-prev-button').removeAttr("disabled");
                $('.fc-next-button').removeAttr("disabled");
                console.log("Hết Block");
            });
        });
        </script>

    </body>
</html>
<?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/calendar/calendar.blade.php ENDPATH**/ ?>