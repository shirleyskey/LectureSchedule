@extends('layouts.master')

@section('title', 'Danh sách NCKH')

@section('style')
    <link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css" />
@endsection()

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
                    <a href="{{ route('dashboard') }}">Bảng Điều Khiển</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Thống kê Khoa Học</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <strong>
                <i class="fa fa-file-code-o"></i>
                THỐNG KÊ KHOA HỌC
            </strong>
            <div class="col-md-6">
                @permission('create-nckh')
                <div class="btn-group">
                    <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_nckh"><i class="fa fa-plus"></i> Tạo NCKH

                    </a>
                </div>
                @endpermission
            </div>
        </h1>


        <!-- MESSAGE -->
        @include('partials.flash-message')

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
            <div class="col-md-12">
                <div class="tabbable tabbable-tabdrop">
                    <ul class="nav nav-pills" id="#myTab">
                        <li class="active">
                            <a href="#tab1" data-toggle="tab">Đề Tài Cấp Bộ</a>
                        </li>
                        <li>
                            <a href="#tab2" data-toggle="tab">Đề Tài Cấp Cơ Sở</a>
                        </li>
                        <li>
                            <a href="#tab3" data-toggle="tab">Tập Bài Giảng</a>
                        </li>
                        <li>
                            <a href="#tab4" data-toggle="tab">Chuyên Đề</a>
                        </li>
                        <li>
                            <a href="#tab5" data-toggle="tab">Tài Liệu Tham Khảo</a>
                        </li>
                        <li>
                            <a href="#tab6" data-toggle="tab">Sáng Kiến Cải Tiến</a>
                        </li>
                        <li>
                            <a href="#tab7" data-toggle="tab">Bài Báo Khoa Học</a>
                        </li>
                    </ul>
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form" id="form_wizard_1">
                        <!-- BEGIN FORM-->
                        <div class="tab-content">
                            <!-- BEGIN TAB 1 NCKH-->
                            <div class="tab-pane" id="tab1">
                                @if($capbo->isNotEmpty())
                                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                    <div class="portlet light portlet-fit bordered">
                                        <div class="portlet-body">
                                            <div class="table-toolbar">
                                                <div class="row">

                                                </div>
                                            </div>
                                            <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                                <thead>
                                                    <tr>
                                                        <th> STT</th>
                                                        <th style="width: 20%;"> Tên Đề Tài</th>
                                                        <th> Chủ Biên</th>
                                                        <th> Tham Gia</th>
                                                        <th> Bắt Đầu</th>
                                                        <th> Kết Thúc</th>
                                                        <th> Số Trang</th>
                                                        <th> Số Giờ</th>
                                                        <th> Hành Động</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if( $capbo->count() > 0 )
                                                        @php $stt = 1; @endphp
                                                        @foreach( $capbo as $v )
                                                        <tr>
                                                            <td> {{ $stt }} </td>
                                                            <td> {{ $v->ten }} </td>
                                                            <td>
                                                                @php
                                                                    $chubien = json_decode( $v->chubien, true);
                                                                @endphp
                                                                    @foreach($chubien as $key => $value)
                                                                    @if(App\GiangVien::where('id', $value)->first() !== null)
                                                                      <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}} </p>
                                                                    @endif
                                                                    @endforeach
                                                            </td>
                                                            <td>
                                                            @php
                                                                $thamgia = json_decode( $v->thamgia, true);
                                                            @endphp
                                                                @foreach($thamgia as $key => $value)
                                                                @if(App\GiangVien::where('id', $value)->first() !== null)
                                                                     <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p>
                                                                @endif
                                                                @endforeach
                                                            </td>
                                                            <td> {{$v->batdau}}</td>
                                                            <td> {{$v->ketthuc}}</td>
                                                            <td> {{$v->sotrang}}</td>
                                                            <td> </td>
                                                            <td>
                                                                <a data-nckh-id="{{ $v->id }}" class="btn_edit_nckh btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                                <a class="btn_delete_nckh btn btn-xs red-mint" href="#" data-nckh-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                                            </td>
                                                        </tr>
                                                        @php $stt++; @endphp
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- END EXAMPLE TABLE PORTLET-->
                                @else
                                    <div class="alert alert-danger" style="margin-bottom: 0px;">
                                        <p> Không có đề tài cấp bộ nào. </p>
                                    </div>
                                @endif
                            </div>
                            <!-- END TAB 1-->
                         <!-- BEGIN TAB 2 NCKH-->
                         <div class="tab-pane" id="tab2">
                            @if($capcoso->isNotEmpty())
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <div class="table-toolbar">
                                            <div class="row">

                                            </div>
                                        </div>
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th style="width: 20%;"> Tên Đề Tài</th>
                                                    <th> Chủ Biên</th>
                                                    <th> Tham Gia</th>
                                                    <th> Bắt Đầu</th>
                                                    <th> Kết Thúc</th>
                                                    <th> Số Trang</th>
                                                    <th> Số Giờ</th>
                                                    <th> Hành Động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( $capcoso->count() > 0 )
                                                    @php $stt = 1; @endphp
                                                    @foreach( $capcoso as $v )
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> {{ $v->ten }} </td>
                                                        <td>
                                                            @php
                                                                $chubien = json_decode( $v->chubien, true);
                                                            @endphp
                                                                @foreach($chubien as $key => $value)
                                                                @if(App\GiangVien::where('id', $value)->first() !== null)
                                                                  <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}} </p>
                                                                  @endif
                                                                @endforeach
                                                        </td>
                                                        <td>
                                                        @php
                                                            $thamgia = json_decode( $v->thamgia, true);
                                                        @endphp
                                                            @foreach($thamgia as $key => $value)
                                                            @if(App\GiangVien::where('id', $value)->first() !== null)
                                                            <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p>
                                                            @endif
                                                            @endforeach
                                                        </td>
                                                        <td> {{$v->batdau}}</td>
                                                        <td> {{$v->ketthuc}}</td>
                                                        <td> {{$v->sotrang}}</td>
                                                        <td> </td>
                                                        <td>
                                                            <a data-nckh-id="{{ $v->id }}" class="btn_edit_nckh btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                            <a class="btn_delete_nckh btn btn-xs red-mint" href="#" data-nckh-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                                        </td>
                                                    </tr>
                                                    @php $stt++; @endphp
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            @else
                                <div class="alert alert-danger" style="margin-bottom: 0px;">
                                    <p> Không có đề tài cấp cơ sở nào. </p>
                                </div>
                            @endif
                        </div>
                        <!-- END TAB 2-->
                     <!-- BEGIN TAB 3 NCKH-->
                     <div class="tab-pane" id="tab3">
                        @if($tapbaigiang->isNotEmpty())
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">

                                        </div>
                                    </div>
                                    <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                        <thead>
                                            <tr>
                                                <th> STT</th>
                                                <th style="width: 20%;"> Tên Đề Tài</th>
                                                <th> Chủ Biên</th>
                                                <th> Tham Gia</th>
                                                <th> Bắt Đầu</th>
                                                <th> Kết Thúc</th>
                                                <th> Số Trang</th>
                                                <th> Số Giờ</th>
                                                <th> Hành Động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if( $tapbaigiang->count() > 0 )
                                                @php $stt = 1; @endphp
                                                @foreach( $tapbaigiang as $v )
                                                <tr>
                                                    <td> {{ $stt }} </td>
                                                    <td> {{ $v->ten }} </td>
                                                    <td>
                                                        @php
                                                            $chubien = json_decode( $v->chubien, true);
                                                        @endphp
                                                            @foreach($chubien as $key => $value)
                                                            @if(App\GiangVien::where('id', $value)->first() !== null)
                                                              <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}} </p>
                                                            @endif
                                                            @endforeach
                                                    </td>
                                                    <td>
                                                    @php
                                                        $thamgia = json_decode( $v->thamgia, true);
                                                    @endphp
                                                        @foreach($thamgia as $key => $value)
                                                        @if( App\GiangVien::where('id', $value)->first() !== null)
                                                        <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p>
                                                        @endif
                                                        @endforeach
                                                    </td>
                                                    <td> {{$v->batdau}}</td>
                                                    <td> {{$v->ketthuc}}</td>
                                                    <td> {{$v->sotrang}}</td>
                                                    <td> </td>
                                                    <td>
                                                        <a data-nckh-id="{{ $v->id }}" class="btn_edit_nckh btn btn-xs yellow-gold" href="#" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                        <a class="btn_delete_nckh btn btn-xs red-mint" href="#" data-nckh-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                                    </td>
                                                </tr>
                                                @php $stt++; @endphp
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        @else
                            <div class="alert alert-danger" style="margin-bottom: 0px;">
                                <p> Không có tập bài giảng nào. </p>
                            </div>
                        @endif
                    </div>
                    <!-- END TAB 3-->

                     <!-- BEGIN TAB 4 NCKH-->
                     <div class="tab-pane" id="tab4">
                        @if($chuyende->isNotEmpty())
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">

                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                        <thead>
                                            <tr>
                                                <th> STT</th>
                                                <th style="width: 20%;"> Tên Đề Tài</th>
                                                <th> Chủ Biên</th>
                                                <th> Tham Gia</th>
                                                <th> Bắt Đầu</th>
                                                <th> Kết Thúc</th>
                                                <th> Số Trang</th>
                                                <th> Số Giờ</th>
                                                <th> Hành Động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if( $chuyende->count() > 0 )
                                                @php $stt = 1; @endphp
                                                @foreach( $chuyende as $v )
                                                <tr>
                                                    <td> {{ $stt }} </td>
                                                    <td> {{ $v->ten }} </td>
                                                    <td>
                                                        @php
                                                            $chubien = json_decode( $v->chubien, true);
                                                        @endphp
                                                            @foreach($chubien as $key => $value)
                                                            @if( App\GiangVien::where('id', $value)->first() !== null)
                                                              <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}} </p>
                                                            @endif
                                                            @endforeach
                                                    </td>
                                                    <td>
                                                    @php
                                                        $thamgia = json_decode( $v->thamgia, true);
                                                    @endphp
                                                        @foreach($thamgia as $key => $value)
                                                        @if(App\GiangVien::where('id', $value)->first() !== null)
                                                        <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p>
                                                        @endif
                                                        @endforeach
                                                    </td>
                                                    <td> {{$v->batdau}}</td>
                                                    <td> {{$v->ketthuc}}</td>
                                                    <td> {{$v->sotrang}}</td>
                                                    <td> </td>
                                                    <td>
                                                        <a data-nckh-id="{{ $v->id }}" class="btn_edit_nckh btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                        <a class="btn_delete_nckh btn btn-xs red-mint" href="#" data-nckh-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                                    </td>
                                                </tr>
                                                @php $stt++; @endphp
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        @else
                            <div class="alert alert-danger" style="margin-bottom: 0px;">
                                <p> Không có Chuyên đề nào.</p>
                            </div>
                        @endif
                    </div>
                    <!-- END TAB 5-->
                      <!-- BEGIN TAB <i class="fas fa-500px    "></i> NCKH-->
                      <div class="tab-pane" id="tab5">
                        @if($thamkhao->isNotEmpty())
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">

                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                        <thead>
                                            <tr>
                                                <th> STT</th>
                                                <th style="width: 20%;"> Tên Đề Tài</th>
                                                <th> Chủ Biên</th>
                                                <th> Tham Gia</th>
                                                <th> Bắt Đầu</th>
                                                <th> Kết Thúc</th>
                                                <th> Số Trang</th>
                                                <th> Số Giờ</th>
                                                <th> Hành Động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if( $thamkhao->count() > 0 )
                                                @php $stt = 1; @endphp
                                                @foreach( $thamkhao as $v )
                                                <tr>
                                                    <td> {{ $stt }} </td>
                                                    <td> {{ $v->ten }} </td>
                                                    <td>
                                                        @php
                                                            $chubien = json_decode( $v->chubien, true);
                                                        @endphp
                                                            @foreach($chubien as $key => $value)
                                                            @if(App\GiangVien::where('id', $value)->first() !== null)
                                                              <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}} </p>
                                                              @endif
                                                            @endforeach
                                                    </td>
                                                    <td>
                                                    @php
                                                        $thamgia = json_decode( $v->thamgia, true);
                                                    @endphp
                                                        @foreach($thamgia as $key => $value)
                                                            @if(App\GiangVien::where('id', $value)->first() !== null)
                                                            <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p>
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td> {{$v->batdau}}</td>
                                                    <td> {{$v->ketthuc}}</td>
                                                    <td> {{$v->sotrang}}</td>
                                                    <td> </td>
                                                    <td>
                                                        <a data-nckh-id="{{ $v->id }}" class="btn_edit_nckh btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                        <a class="btn_delete_nckh btn btn-xs red-mint" href="#" data-nckh-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                                    </td>
                                                </tr>
                                                @php $stt++; @endphp
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        @else
                            <div class="alert alert-danger" style="margin-bottom: 0px;">
                                <p> Không có Tài Liệu tham khảo cấp học viện nào.</p>
                            </div>
                        @endif
                    </div>
                    <!-- END TAB 5-->
                    <div class="tab-pane" id="tab6">
                        @if($sangkien->isNotEmpty())
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">

                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                        <thead>
                                            <tr>
                                                <th> STT</th>
                                                <th style="width: 20%;"> Tên Đề Tài</th>
                                                <th> Chủ Biên</th>
                                                <th> Tham Gia</th>
                                                <th> Bắt Đầu</th>
                                                <th> Kết Thúc</th>
                                                <th> Số Trang</th>
                                                <th> Số Giờ</th>
                                                <th> Hành Động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if( $sangkien->count() > 0 )
                                                @php $stt = 1; @endphp
                                                @foreach( $sangkien as $v )
                                                <tr>
                                                    <td> {{ $stt }} </td>
                                                    <td> {{ $v->ten }} </td>
                                                    <td>
                                                        @php
                                                            $chubien = json_decode( $v->chubien, true);
                                                        @endphp
                                                            @foreach($chubien as $key => $value)
                                                                @if(App\GiangVien::where('id', $value)->first() !== null)
                                                                <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}} </p>
                                                                @endif
                                                            @endforeach
                                                    </td>
                                                    <td>
                                                    @php
                                                        $thamgia = json_decode( $v->thamgia, true);
                                                    @endphp
                                                        @foreach($thamgia as $key => $value)
                                                        @if(App\GiangVien::where('id', $value)->first() !== null)
                                                        <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p>
                                                        @endif
                                                        @endforeach
                                                    </td>
                                                    <td> {{$v->batdau}}</td>
                                                    <td> {{$v->ketthuc}}</td>
                                                    <td> {{$v->sotrang}}</td>
                                                    <td> </td>
                                                    <td>
                                                        <a data-nckh-id="{{ $v->id }}" class="btn_edit_nckh btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                        <a class="btn_delete_nckh btn btn-xs red-mint" href="#" data-nckh-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                                    </td>
                                                </tr>
                                                @php $stt++; @endphp
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        @else
                            <div class="alert alert-danger" style="margin-bottom: 0px;">
                                <p> Không có Sáng Kiến Cải Tiến nào.</p>
                            </div>
                        @endif
                    </div>
                    <!-- END TAB 6-->

                    <div class="tab-pane" id="tab7">
                        @if($bao->isNotEmpty())
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">

                                        </div>
                                    </div>
                                    <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                        <thead>
                                            <tr>
                                                <th> STT</th>
                                                <th style="width: 20%;"> Tên Bài Báo khoa Học</th>
                                                <th> Họ Tên Tác Giả</th>
                                                <th> Tạp Chí Đăng Tải</th>
                                                <th> Hành Động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if( $bao->count() > 0 )
                                                @php $stt = 1; @endphp
                                                @foreach( $bao as $v )
                                                <tr>
                                                    <td> {{ $stt }} </td>
                                                    <td> {{ $v->ten }} </td>
                                                    <td>
                                                        @php
                                                            $chubien = json_decode( $v->chubien, true);
                                                        @endphp
                                                            @foreach($chubien as $key => $value)
                                                                @if(App\GiangVien::where('id', $value)->first() !== null)
                                                                    <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}} </p>
                                                                @endif
                                                            @endforeach
                                                    </td>
                                                    <td> {{$v->tapchi}}</td>
                                                    <td> </td>
                                                    <td>
                                                        <a data-nckh-id="{{ $v->id }}" class="btn_edit_nckh btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                        <a class="btn_delete_nckh btn btn-xs red-mint" href="#" data-nckh-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                                    </td>
                                                </tr>
                                                @php $stt++; @endphp
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        @else
                            <div class="alert alert-danger" style="margin-bottom: 0px;">
                                <p> Không có Bài Báo Khoa Học nào nào. </p>
                            </div>
                        @endif
                    </div>
                    <!-- END TAB 7-->


                        </div>
                        <!-- END FORM-->
                        @include('nckh.modals.edit')
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
    </div>
    <!-- END CONTENT BODY -->

</div>
<!-- END CONTENT -->
@include('nckh.modals.add')


@endsection

@section('script')
<script>
    jQuery(document).ready(function() {
         // Reload trang và giữ nguyên tab đã active
         var activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            $('a[href="' + activeTab + '"]').tab('show');
            localStorage.removeItem('activeTab');
        }
        // END Reload trang và giữ nguyên tab đã active

        var table = $('#ds_nckh');

        var oTable = table.dataTable({

            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],

            "pageLength": 10,

            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Nckh: _TOTAL_",
                "infoEmpty": "Không có bản ghi nào",
                "infoFiltered": "(chọn lọc từ _MAX_ bản ghi)",
                "search": "Tìm kiếm",
                "paginate": {
                    "first":      "Đầu",
                    "last":       "Cuối",
                    "next":       "Sau",
                    "previous":   "Trước"
                },
            },
            "columnDefs": [{ // set default column settings
                'orderable': true,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0]
            }],
            "order": [
                // [0, "asc"]
            ] // set first column as a default sort by asc
        });
    //Thêm NCKH
    $("#btn_add_nckh").on('click', function(e){
        e.preventDefault();
        $("#btn_add_nckh").attr("disabled", "disabled");
        $("#btn_add_nckh").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
        $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
        $.ajax({
            url: '{{route('postThemNckh')}}',
            method: 'POST',
            data: {
                ten: $("#form_add_nckh input[name='ten']").val(),
                capbo: ($("#form_add_nckh input[name='capbo']").is(':checked')) ? 1 : 0,
                capcoso: ($("#form_add_nckh input[name='capcoso']").is(':checked')) ? 1 : 0,
                tapbaigiang: ($("#form_add_nckh input[name='tapbaigiang']").is(':checked')) ? 1 : 0,
                chuyende: ($("#form_add_nckh input[name='chuyende']").is(':checked')) ? 1 : 0,
                thamkhao: ($("#form_add_nckh input[name='thamkhao']").is(':checked')) ? 1 : 0,
                sangkien: ($("#form_add_nckh input[name='sangkien']").is(':checked')) ? 1 : 0,
                bao: ($("#form_add_nckh input[name='bao']").is(':checked')) ? 1 : 0,
                chubien: $("#form_add_nckh select[name='chubien']").val(),
                thamgia: $("#form_add_nckh select[name='thamgia']").val(),
                sotrang: $("#form_add_nckh input[name='sotrang']").val(),
                batdau: $("#form_add_nckh input[name='batdau']").val(),
                ketthuc: $("#form_add_nckh input[name='ketthuc']").val(),
                tapchi: $("#form_add_nckh input[name='tapchi']").val(),
            },
            success: function(data) {
                console.log("Hihi");
                $("#btn_add_nckh").removeAttr("disabled");
                $("#btn_add_nckh").html('<i class="fa fa-save"></i> Lưu');
                if(data.status == false){
                    var errors = "";
                    $.each(data.data, function(key, value){
                        $.each(value, function(key2, value2){
                            errors += value2 +"<br>";
                        });
                    });
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "positionClass": "toast-top-center",
                        "onclick": null,
                        "showDuration": "1000",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    toastr["error"](errors, "Lỗi")
                }
                if(data.status == true){
                    $('#modal_add_nckh').modal('hide');
                    swal({
                        "title":"Đã tạo!",
                        "text":"Bạn đã tạo thành công NCKH!",
                        "type":"success"
                    }, function() {
                            localStorage.setItem('activeTab', '#tab2');
                            location.reload();
                        }
                    );
                }
            }
        });
    });
    // End Add NCKH
    $(".btn_edit_nckh").on("click", function(e){
        console.log("Hihi");
            e.preventDefault();
            var nckh_id = $(this).data("nckh-id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('postTimNckhTheoId') }}',
                method: 'POST',
                data: {
                    id: nckh_id
                },
                success: function(data) {
                    if(data.status == true){
                        // console.log(data.data);
                        $("#form_edit_nckh input[name='id']").val(data.data.id);
                        $("#form_edit_nckh input[name='ten']").val(data.data.ten);
                        $("#form_edit_nckh input[name='capbo']").prop('checked', (data.data.capbo == 1) ? true : false);
                        $("#form_edit_nckh input[name='capcoso']").prop('checked', (data.data.capcoso == 1) ? true : false);
                        $("#form_edit_nckh input[name='tapbaigiang']").prop('checked', (data.data.tapbaigiang == 1) ? true : false);
                        $("#form_edit_nckh input[name='chuyende']").prop('checked', (data.data.chuyende == 1) ? true : false);
                        $("#form_edit_nckh input[name='thamkhao']").prop('checked', (data.data.thamkhao == 1) ? true : false);
                        $("#form_edit_nckh input[name='sangkien']").prop('checked', (data.data.sangkien == 1) ? true : false);
                        $("#form_edit_nckh input[name='bao']").prop('checked', (data.data.bao == 1) ? true : false);
                        $("#form_edit_nckh input[name='tapchi']").val(data.data.tapchi);
                        $("#form_edit_nckh input[name='sotrang']").val(data.data.sotrang);
                        $("#form_edit_nckh input[name='batdau']").val(data.data.batdau);
                        $("#form_edit_nckh input[name='ketthuc']").val(data.data.ketthuc);
                        $("#form_edit_nckh select[name='chubien']").val($.parseJSON(data.data.chubien));
                        $("#form_edit_nckh select[name='thamgia']").val($.parseJSON(data.data.thamgia));
                        $('#modal_edit_nckh').modal('show');
                    }
                }
            });
        });
        // END Khi click vào nút sửa NCKH, tìm NCKH theo id và đỗ dữ liệu vào form


        // Ajax sửa NCKH
        $("#btn_edit_nckh").on('click', function(e){
            e.preventDefault();
            $("#btn_edit_nckh").attr("disabled", "disabled");
            $("#btn_edit_nckh").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('postSuaNckh') }}',
                method: 'POST',
                data: {
                    id: $("#form_edit_nckh input[name='id']").val(),
                    ten: $("#form_edit_nckh input[name='ten']").val(),
                    capbo: ($("#form_edit_nckh input[name='capbo']").is(':checked')) ? 1 : 0,
                    capcoso: ($("#form_edit_nckh input[name='capcoso']").is(':checked')) ? 1 : 0,
                    tapbaigiang: ($("#form_edit_nckh input[name='tapbaigiang']").is(':checked')) ? 1 : 0,
                    chuyende: ($("#form_edit_nckh input[name='chuyende']").is(':checked')) ? 1 : 0,
                    thamkhao: ($("#form_edit_nckh input[name='thamkhao']").is(':checked')) ? 1 : 0,
                    sangkien: ($("#form_edit_nckh input[name='sangkien']").is(':checked')) ? 1 : 0,
                    bao: ($("#form_edit_nckh input[name='bao']").is(':checked')) ? 1 : 0,
                    chubien: $("#form_edit_nckh select[name='chubien']").val(),
                    thamgia: $("#form_edit_nckh select[name='thamgia']").val(),
                    sotrang: $("#form_edit_nckh input[name='sotrang']").val(),
                    batdau: $("#form_edit_nckh input[name='batdau']").val(),
                    ketthuc: $("#form_edit_nckh input[name='ketthuc']").val(),
                    tapchi: $("#form_edit_nckh input[name='tapchi']").val(),

                },
                success: function(data) {
                    $("#btn_edit_nckh").removeAttr("disabled");
                    $("#btn_edit_nckh").html('<i class="fa fa-save"></i> Lưu');
                    if(data.status == false){
                        var errors = "";
                        $.each(data.data, function(key, value){
                            $.each(value, function(key2, value2){
                                errors += value2 +"<br>";
                            });
                        });
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "positionClass": "toast-top-center",
                            "onclick": null,
                            "showDuration": "1000",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr["error"](errors, "Lỗi")
                    }
                    if(data.status == true){
                        $('#modal_edit_nckh').modal('hide');
                        swal({
                            "title":"Đã sửa!",
                            "text":"Bạn đã sửa thành công Nghiên Cứu Khoa Học!",
                            "type":"success"
                        }, function() {
                                localStorage.setItem('activeTab', '#tab2');
                                location.reload();
                            }
                        );
                    }
                }
            });
        });
        // END Ajax sửa NCKH

         // Xử lý khi click nút xóa NCKH
         $(".btn_delete_nckh").on("click", function(e){
            e.preventDefault();
            var nckh_id = $(this).data("nckh-id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            swal({
                title: "Xóa NCKH này?",
                text: "Bạn có chắc không, nó sẽ bị xóa vĩnh viễn!",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: 'Không',
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Có, xóa ngay!",
                closeOnConfirm: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        $.ajax({
                            url: '{{ route('postXoaNckh') }}',
                            method: 'POST',
                            data: {
                                id: nckh_id
                            },
                            success: function(data) {
                                console.log(data);
                                if(data.status == true){
                                    swal({
                                        "title":"Đã xóa!",
                                        "text":"Bạn đã xóa thành công NCKH!",
                                        "type":"success"
                                    }, function() {
                                            localStorage.setItem('activeTab', '#tab2');
                                            location.reload();
                                        }
                                    );
                                }
                            }
                        });
                    }
            });

        });
        // END Xử lý khi click nút xóa NCKH
    });
</script>

<!-- <script src="{{ asset('assets/global/scripts/datatable.js') }}" type="text/javascript"></script> -->
<script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js') }}" type="text/javascript"></script>
@endsection
