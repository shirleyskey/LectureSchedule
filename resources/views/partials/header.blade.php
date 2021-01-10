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
                <img class="permission-style" alt="" style="width: 20px; margin-right: 3px" src="{{ asset('images/permission2.png')}}" />
            <span class="username username-hide-on-mobile">
                @php 
                    $v = Auth::user();
                @endphp
                @foreach($v->roles as $role)
                    {{ $role->display_name }}
                @endforeach
            </span>
            </div>

            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN USER LOGIN DROPDOWN -->
              
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle custom-hover" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle" src="{{ asset('images/avatar2.png')}}" />
                        <span class="username username-hide-on-mobile"> {{ (Auth::user())?(Auth::user()->giangviens->ten):'' }} </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="{{route('profile.edit.get', Auth::user()->id_giangvien)}}">
                                <img alt="" style="width: 18px; " src="{{ asset('images/info.png')}}" /> Thông Tin Cá Nhân
                            </a>
                        </li>
                        <li class="divider"> </li>
                        <li>
                            <a href="{{route('profile.thongbao.get', Auth::user()->id_giangvien)}}">
                                <img alt="" style="width: 18px; " src="{{ asset('images/calendar.png')}}" /> Lịch Trình Cá Nhân
                            </a>
                        </li>
                        <li class="divider"> </li>
                        <li >
                            <a href="{{ route('logout.get') }}" style="color: #e63946">
                                <img alt="" style="width: 18px; " src="{{ asset('images/logout2.png')}}" />
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
