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
                            <a href="<?php echo e(route('profile.edit.get', Auth::user()->id_giangvien)); ?>">
                                <img alt="" style="width: 15px; " src="<?php echo e(asset('images/info.png')); ?>" /> Thông Tin Cá Nhân
                            </a>
                        </li>
                        <li class="divider"> </li>
                        <li>
                            <a href="<?php echo e(route('profile.thongbao.get', Auth::user()->id_giangvien)); ?>">
                                <img alt="" style="width: 15px; " src="<?php echo e(asset('images/calendar.png')); ?>" /> Lịch Trình Cá Nhân
                            </a>
                        </li>
                        <li class="divider"> </li>
                        <li >
                            <a href="<?php echo e(route('logout.get')); ?>" style="color: #e63946">
                                <img alt="" style="width: 15px; " src="<?php echo e(asset('images/logout2.png')); ?>" />
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
<?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/partials/header.blade.php ENDPATH**/ ?>