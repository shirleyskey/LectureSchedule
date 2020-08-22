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
            <small>Thống kê tổng giờ giảng, NCKH và Công việc khác</small>
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
           
            
           
             <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 blue" href="{{ route('dashboard.read') }}">
                    <div class="visual">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="{{ $lop->count()}}"></span>
                        </div>
                        <div class="desc"> LỚP</div>
                    </div>
                </a>
            </div>
               {{-- Học Phần Giảng Dạy --}}
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 green" href="">
                    <div class="visual">
                        <i class="fa fa-book"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                        <span data-counter="counterup" data-value="{{ $hocphan->count()}}">0</span>
                        </div>
                        <div class="desc"> HỌC PHẦN GIẢNG DẠY</div>
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