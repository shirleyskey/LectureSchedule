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
            <li class="nav-item start ">
                <a href="<?php echo e(route('dashboard')); ?>" class="nav-link">
                    <i class="fa fa-dashboard" style="color: #addab9;"></i>
                    <span class="title"> <strong>BẢNG ĐIỀU KHIỂN</strong></span>
                    <span class="selected"></span>
                </a>
            </li>
            <?php if (app('laratrust')->can('read-giangvien')) : ?>
            <li class="nav-item <?php echo e(Route::getCurrentRoute()->getPrefix() == '/giangvien' ? 'active open' : ''); ?>">
                <a href="<?php echo e(route('giangvien.index')); ?>" style="color: #addab9;" class="nav-link nav-toggle">
                    <i class="fa fa-user" style="color: #addab9;"></i>
                    <span class="title" >Giảng Viên</span>
                    <span class="selected"></span>
                </a>
            </li>
            <?php endif; // app('laratrust')->can ?>
            
            <li class="heading">
                <h3 class="uppercase"> <a data-toggle="collapse" href="#sub-menu">LỊCH GIẢNG</a> <span class="caret"></span></h3>
            </li>
            <div class="collapse list-group-level1" id="sub-menu">
            <?php if (app('laratrust')->can('read-lop')) : ?>
            <li class="nav-item <?php echo e(Route::getCurrentRoute()->getPrefix() == '/lop' ? 'active open' : ''); ?>">
                <a href="<?php echo e(route('lop.index')); ?>" class="nav-link nav-toggle" data-parent="#sub-menu">
                    <i class="fa fa-building-o"></i>
                    <span class="title">Lịch Giảng Theo Lớp</span>
                    <span class="selected"></span>
                </a>
            </li>
            <?php endif; // app('laratrust')->can ?>
            <li class="nav-item <?php echo e(Request::is('lichgiang/phancong') ? 'active open' : ''); ?>">
                <a href="<?php echo e(route('lichgiang.phancong')); ?>" class="nav-link nav-toggle">
                    <i class="fa fa-calendar"></i>
                    <span class="title">Lịch Giảng Theo HP</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="nav-item <?php echo e(Request::is('lichgiang/lichgiangtuan') ? 'active open' : ''); ?>">
                <a href="<?php echo e(route('lichgiang.lichgiangtuan')); ?>" class="nav-link nav-toggle">
                    <i class="fa fa-calendar-check-o"></i>
                    <span class="title">Lịch Giảng Theo Ngày</span>
                    <span class="selected"></span>
                </a>
            </li>
            </div>
            <li class="heading">
                <h3 class="uppercase"><a data-toggle="collapse" href="#sub-menu-nckh">QUẢN LÝ NCKH</a> <span class="caret"></span></h3>
            </li>
            <div class="collapse list-group-level1" id="sub-menu-nckh">
            <li class="nav-item <?php echo e(Request::is('nckh') ? 'active open' : ''); ?>">
                <a href="<?php echo e(route('nckh.index')); ?>" class="nav-link nav-toggle">
                    <i class="fa fa-briefcase "></i>
                    <span class="title">Quản Lý NCKH</span>
                    <span class="selected"></span>
                </a>
            </li>
            </div>
            <li class="heading">
                <h3 class="uppercase"><a data-toggle="collapse" href="#sub-menu-khac">Công Việc Khác</a> <span class="caret"></span></h3>
            </li>
            <div class="collapse list-group-level1" id="sub-menu-khac">
                <li class="nav-item <?php echo e(Request::is('khac') ? 'active open' : ''); ?>">
                    <a href="<?php echo e(route('khac.edit.get')); ?>" class="nav-link nav-toggle">
                        <i class="fa fa-plus-circle "></i>
                        <span class="title">Công Việc Khác</span>
                        <span class="selected"></span>
                    </a>
                </li>
            </div>
            <li class="heading">
                <h3 class="uppercase"><a data-toggle="collapse" href="#sub-menu-canhbao">Cảnh Báo</a> <span class="caret"></span></h3>
            </li>
            <div class="collapse list-group-level1" id="sub-menu-canhbao">
                <?php if (app('laratrust')->can('read-giangvien')) : ?>
                <li class="nav-item <?php echo e(Request::is('deadline') ? 'active open' : ''); ?>">
                    <a href="<?php echo e(route('dashboard.deadline')); ?>" class="nav-link nav-toggle">
                        <i class="fa fa-warning"></i>
                        <span class="title">Cảnh Báo Đến Hạn</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <?php endif; // app('laratrust')->can ?>
            </div>
            <?php if (app('laratrust')->can('read-file-manager')) : ?>
            <li class="heading">
                <h3 class="uppercase"><a data-toggle="collapse" href="#sub-menu-nangcao">Quản Trị Nâng Cao</a> <span class="caret"></span></h3>
            </li>
            <div class="collapse list-group-level1" id="sub-menu-nangcao">
                <?php if (app('laratrust')->can('read-hocphan')) : ?>
                <li class="nav-item <?php echo e(Route::getCurrentRoute()->getPrefix() == '/hocphan' ? 'active open' : ''); ?>">
                    <a href="<?php echo e(route('hocphan.index')); ?>" class="nav-link nav-toggle">
                        <i class="fa fa-file-code-o"></i>
                        <span class="title">Import Lịch Bằng Excel</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <?php endif; // app('laratrust')->can ?>
                <li class="nav-item <?php echo e(Route::getCurrentRoute()->getPrefix() == '/file-manager' ? 'active open' : ''); ?>">
                    <a href="<?php echo e(route('file-manager.index')); ?>" class="nav-link nav-toggle">
                        <i class="fa fa-folder-open"></i>
                        <span class="title">Tập tin & hình ảnh</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <?php endif; // app('laratrust')->can ?>
                <?php if (app('laratrust')->can('read-users')) : ?>
                <li class="nav-item <?php echo e(Route::getCurrentRoute()->getPrefix() == '/users' ? 'active open' : ''); ?>">
                    <a href="<?php echo e(route('user.index')); ?>" class="nav-link nav-toggle">
                        <i class="fa fa-user"></i>
                        <span class="title">Người Dùng Hệ Thống</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <?php endif; // app('laratrust')->can ?>
            </div>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR --><?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/partials/sidebar.blade.php ENDPATH**/ ?>