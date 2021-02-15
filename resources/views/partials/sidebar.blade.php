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
            @permission('read-giangvien')
            <li class="heading nav-item {{ Route::getCurrentRoute()->getPrefix() == '/tuan' ? 'active open' : '' }}">
                <h3 class="uppercase custom-border">
                    <a href="{{ route('tuan.get') }}" style="color: #dbe7f2;" class="nav-link">
                        <i class="fa fa-calendar" style="color: #dbe7f2;"></i>
                        <span class="title" >Lịch Tuần</span>
                        <span class="selected"></span>
                    </a>
                </h3>
            </li>
            @endpermission
            @permission('read-giangvien')
            <li class="heading nav-item {{ Route::getCurrentRoute()->getPrefix() == '/lichgiang/lichgiangtuan' ? 'active open' : '' }}">
                <h3 class="uppercase custom-border">
                    <a href="{{ route('lichgiang.lichgiangtuan') }}" style="color: #dbe7f2;" class="nav-link">
                        <i class="fa fa-calculator" style="color: #dbe7f2;"></i>
                        <span class="title" >Lịch Giảng Theo Ngày</span>
                        <span class="selected"></span>
                    </a>
                </h3>
            </li>
            @endpermission
           
            
            <li class="heading nav-item">
                <h3 class="uppercase custom-border"> <a data-toggle="collapse" href="#sub-menu" class="nav-link nav-toggle"><i class="fa fa-building-o"></i>GIẢNG DẠY</a> <span class="caret"></span></h3>
            </li>
            <div class="collapse list-group-level1" id="sub-menu">
            @permission('read-lop')
            <li class="nav-item {{ Route::getCurrentRoute()->getPrefix() == '/lop' ? 'active open' : '' }}">
                <a href="{{ route('lop.index') }}" class="nav-link nav-toggle" data-parent="#sub-menu">
                    <span class="title">Lịch Theo Lớp</span>
                    <span class="selected"></span>
                </a>
            </li>
            @endpermission
            <li class="nav-item {{ Request::is('lichgiang/phancong') ? 'active open' : '' }}">
                <a href="{{ route('lichgiang.phancong') }}" class="nav-link nav-toggle">
                    <span class="title">Lịch Theo Học Phần</span>
                    <span class="selected"></span>
                </a>
            </li>
            {{-- <li class="nav-item {{ Request::is('lichgiang/lichgiangtuan') ? 'active open' : '' }}">
                <a href="{{ route('lichgiang.lichgiangtuan') }}" class="nav-link nav-toggle">
                    <span class="title">Lịch Theo Ngày</span>
                    <span class="selected"></span>
                </a>
            </li> --}}
            </div>
            
            @permission('read-giangvien')
            <li class="heading nav-item {{ Route::getCurrentRoute()->getPrefix() == '/nckh' ? 'active open' : '' }}">
                <h3 class="uppercase custom-border">
                    <a href="{{ route('nckh.index') }}" style="color: #dbe7f2;" class="nav-link">
                        <i class="fa fa-briefcase " style="color: #dbe7f2;"></i>
                        <span class="title" >Quản Lý NCKH</span>
                        <span class="selected"></span>
                    </a>
                </h3>
            </li>
            @endpermission
            @permission('read-giangvien')
            <li class="heading nav-item {{ Route::getCurrentRoute()->getPrefix() == '/khac' ? 'active open' : '' }}">
                <h3 class="uppercase custom-border">
                    <a href="{{ route('khac.edit.get') }}" style="color: #dbe7f2;" class="nav-link">
                        <i class="fa fa-plus-circle " style="color: #dbe7f2;"></i>
                        <span class="title" >Công Tác Khác</span>
                        <span class="selected"></span>
                    </a>
                </h3>
            </li>
            @endpermission
            @permission('read-giangvien')
            <li class="heading nav-item {{ Route::getCurrentRoute()->getPrefix() == '/giangvien' ? 'active open' : '' }}">
                <h3 class="uppercase custom-border">
                    <a href="{{ route('giangvien.index') }}" style="color: #dbe7f2;" class="nav-link">
                        <i class="fa fa-user" style="color: #dbe7f2;"></i>
                        <span class="title" >Giảng Viên</span>
                        <span class="selected"></span>
                    </a>
                </h3>
            </li>
            @endpermission
            @permission('read-giangvien')
            <li class="heading nav-item {{ Route::getCurrentRoute()->getPrefix() == '/dashboard' ? 'active open' : '' }}">
                <h3 class="uppercase custom-border">
                    <a href="{{ route('dashboard.deadline') }}" style="color: #dbe7f2;" class="nav-link">
                        <i class="fa fa-warning" style="color: #dbe7f2;"></i>
                        <span class="title" >Đến Hạn</span>
                        <span class="selected"></span>
                    </a>
                </h3>
            </li>
            @endpermission


            
            @permission('read-file-manager')
            <li class="heading">
                <h3 class="uppercase custom-border"> <i class="fa fa-file-code-o"></i><a data-toggle="collapse" href="#sub-menu-nangcao">Quản Trị Nâng Cao</a> <span class="caret"></span></h3>
            </li>
            <div class="collapse list-group-level1" id="sub-menu-nangcao">
                @permission('read-users')
                <li class="nav-item {{ Route::getCurrentRoute()->getPrefix() == '/hocphan' ? 'active open' : '' }}">
                    <a href="{{ route('hocphan.index') }}" class="nav-link nav-toggle">
                       
                        <span class="title"> Import Lịch Excel</span>
                        <span class="selected"></span>
                    </a>
                </li>
                @endpermission
                <li class="nav-item {{ Route::getCurrentRoute()->getPrefix() == '/file-manager' ? 'active open' : '' }}">
                    <a href="{{ route('file-manager.index') }}" class="nav-link nav-toggle">
                        <span class="title">Tập tin & hình ảnh</span>
                        <span class="selected"></span>
                    </a>
                </li>
                @endpermission
                @permission('read-users')
                <li class="nav-item {{ Route::getCurrentRoute()->getPrefix() == '/users' ? 'active open' : '' }}">
                    <a href="{{ route('user.index') }}" class="nav-link nav-toggle">
                        <span class="title"> Người Dùng Hệ Thống</span>
                        <span class="selected"></span>
                    </a>
                </li>
                @endpermission
                
            </div>
            <li class="heading custom-border">
                <h3 class=""> 
                    <img alt="" style="width: 20px; " src="{{ asset('images/logout2.png')}}" />
                    <a  href="{{ route('logout.get') }}" style="color: #e63946">Đăng Xuất</a>
                </h3>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->