@extends('layouts.master')

@section('title', 'Bảng điều khiển')

@section('content')
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
            <small>Phân công giảng dạy. Thống kê giờ giảng, Nghiên cứu khoa học và Công việc khác.</small>
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
             <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 blue" href="{{ route('lichgiang.phancong') }}">
                    <div class="visual">
                        <i class="fa fa-calendar" style="color: #ffc93c; opacity: 0.8;"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            {{-- <span data-counter="counterup" data-value="{{ $lop->count()}}"></span> --}}
                        </div>
                        <div class="desc"><p><strong>PHÂN CÔNG LỊCH GIẢNG</strong></p></div>
                    </div>
                </a>
            </div>
               {{-- Học Phần Giảng Dạy --}}
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 green" href="{{ route('lichgiang.lichgiangtuan') }}">
                    <div class="visual">
                        <i class="fa fa-calendar-check-o" style="color: aqua; opacity: 0.5;"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                        {{-- <span data-counter="counterup" data-value="{{ $hocphan->count()}}">0</span> --}}
                        </div>
                        <div class="desc"><p><strong> LỊCH GIẢNG TUẦN</strong></p></div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 yellow" href="">
                    <div class="visual">
                        <i class="fa fa-file-code-o" style="color: #ec0101; opacity: 0.5;"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                        </div>
                        <div class="desc"><p><strong>NGHIÊN CỨU KHOA HỌC</strong></p></div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 red" href="{{ route('khac.edit.get') }}">
                    <div class="visual">
                        <i class="fa fa-plus-circle" style="color: aqua; opacity: 0.5;"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                        </div>
                        <div class="desc"><p><strong>CÔNG VIỆC KHÁC</strong></p></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
@endsection