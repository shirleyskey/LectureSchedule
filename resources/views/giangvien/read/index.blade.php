@extends('layouts.master')

@section('title', 'Thông tin giảng viên')

@section('style')
    <link href="{{ asset('assets/global/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" />
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
                    <a href="{{ route('giangvien.index') }}">Danh Sách Giảng Viên</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> <strong>
            <i class="fa fa-user"></i> {{ $giangvien->ten }} - {{ $giangvien->chucvu }}</strong>
            @if( $giangvien->cothegiang ==1 )
            <span class="label label-sm bg-green-jungle"> Có Thể giảng </span>
            @else
            <span class="label label-sm label-danger"> Không giảng </span>
            @endif
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        @if($errors->any())
        <div class="alert alert-danger">
            <button class="close" data-close="alert"></button>
            @foreach($errors->all() as $error)
                <p> {{ $error }} </p>
            @endforeach
        </div>
        @endif

        <div class="row box_gio">
            <div class="col-md-12">
            <h2>Hoạt Động tính giờ</h2>
                <div class="tabbable tabbable-tabdrop">
                    <ul class="nav nav-pills" id="#myTab">
                        <li class="active">
                            <a href="#tab1" data-toggle="tab">Thông tin</a>
                        </li>
                        <li>
                            <a href="#tab_hdkh" data-toggle="tab">Hướng Dẫn Khoa Học</a>
                        </li>
                        <li>
                            <a href="#tab_hop" data-toggle="tab">Họp</a>
                        </li>
                        <li>
                            <a href="#tab3" data-toggle="tab"> Đi Thực Tế</a>
                        </li>
                        <li>
                            <a href="#tab4" data-toggle="tab">Chấm Bài</a>
                        </li>
                        <li>
                            <a href="#tab6" data-toggle="tab">Dạy Giỏi</a>
                        </li>
                        <li>
                            <a href="#tab10" data-toggle="tab">Học Tập</a>
                        </li>
                    </ul>
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form" id="form_wizard_1">
                        <!-- BEGIN FORM-->
                        <div class="tab-content">
                             <!-- BEGIN TAB 1-->
                             <div class="tab-pane active" id="tab1">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Mã Giảng Viên:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $giangvien->ma_giangvien }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Tên:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $giangvien->ten }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Chức Vụ:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $giangvien->chucvu }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Hệ Số Lương:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $giangvien->hesoluong }}</label>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Chỗ Ở:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $giangvien->diachi }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Chức Danh:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $giangvien->chucdanh }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Trình Độ:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $giangvien->trinhdo }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Bài Giảng:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $giangvien->bai_giang }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END TAB 1-->
 
                            
                            <!-- BEGIN TAB 3-->
                            <div class="tab-pane" id="tab3">
                                @if($congtac->isNotEmpty())
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th>Địa Bàn</th>
                                                    <th> Số Giờ</th>
                                                    <th> Thời Gian</th>
                                                    <th> Ghi Chú</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( $congtac->count() > 0 )
                                                    @php $stt = 1; @endphp
                                                    @foreach( $congtac as $v_congtac )
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> {{ $v_congtac->ten }} </td>
                                                        <td> {{ $v_congtac->so_gio }} </td>
                                                        <td> {{ $v_congtac->thoigian }} </td>
                                                        <td> {{ $v_congtac->ghichu }} </td>
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
                                        <p> Không có Hoạt động Đi thực tế nào!</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END BEGIN TAB 3-->

                              <!-- BEGIN TAB 4-->
                              <div class="tab-pane" id="tab4">
                                @if($chambai->isNotEmpty())
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_chambai">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên Lớp</th>
                                                    <th> Tên Học Phần</th>
                                                    <th> Thời Gian</th>
                                                    <th> Số Bài</th>
                                                    <th> Số Giờ</th>
                                                    <th>Ghi Chú</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( $chambai->count() > 0 )
                                                    @php $stt = 1; @endphp
                                                    @foreach( $chambai as $v_chambai )
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> {{ ($v_chambai->id_lop) ? ($v_chambai->lops->tenlop) : '' }} </td>
                                                        <td> {{ ($v_chambai->id_hocphan) ? ($v_chambai->hocphans->mahocphan) : '' }} </td>
                                                        <td> {{ $v_chambai->thoigian }} </td>
                                                        <td> {{ $v_chambai->so_bai }} </td>
                                                        <td> {{ $v_chambai->so_gio }} </td>
                                                        <td> {{ $v_chambai->ghichu }} </td>
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
                                        <p> Không có chấm bài nào!</p>
                                    </div>
                                @endif

                            </div>
                            <!-- END BEGIN TAB 4-->

                          <!-- BEGIN TAB HỌP-->
                          <div class="tab-pane" id="tab_hop">
                            @if($hop->isNotEmpty())
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-body">
                                    <table class="table table-striped table-hover table-bordered" id="table_ds_hop">
                                        <thead>
                                            <tr>
                                                <th> STT</th>
                                                <th> Nội Dung Cuộc Họp</th>
                                                <th> Thời Gian</th>
                                                <th> Số Giờ</th>
                                                <th> Ghi Chú</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if( $hop->count() > 0 )
                                                @php $stt = 1; @endphp
                                                @foreach( $hop as $v_hop )
                                                <tr>
                                                    <td> {{ $stt }} </td>
                                                    <td> {{ $v_hop->ten }} </td>
                                                    <td> {{ $v_hop->thoigian }} </td>
                                                    <td> {{ $v_hop->so_gio }} </td>
                                                    <td> {{ $v_hop->ghichu }} </td>
                                                    
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
                                    <p> Không có Cuộc Họp nào!</p>
                                </div>
                            @endif
                        </div>
                        <!-- END BEGIN TAB 8-->

                        

                         <!-- BEGIN TAB 10-->
                         <div class="tab-pane" id="tab10">
                            @if($hoctap->isNotEmpty())
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-body">
                                    <table class="table table-striped table-hover table-bordered" id="table_ds_hoctap">
                                        <thead>
                                            <tr>
                                                <th> STT</th>
                                                <th> Tên Lớp</th>
                                                <th> Loại Hình</th>
                                                <th> Số Giờ</th>
                                                <th> Bắt Đầu</th>
                                                <th> Kết Thúc</th>
                                                <th> Ghi Chú</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if( $hoctap->count() > 0 )
                                                @php $stt = 1; @endphp
                                                @foreach( $hoctap as $v_hoctap )
                                                <tr>
                                                    <td> {{ $stt }} </td>
                                                    <td> {{ $v_hoctap->ten }} </td>
                                                    <td> {{ $v_hoctap->loai_hinh }} </td>
                                                    <td> {{ $v_hoctap->so_gio }} </td>
                                                    <td> {{ $v_hoctap->thoigian }} </td>
                                                    <td> {{ $v_hoctap->thoigian_den }} </td>
                                                    <td> {{ $v_hoctap->ghichu }} </td>
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
                                    <p> Không tham gia học tập!</p>
                                </div>
                            @endif
                        </div>
                        <!-- END BEGIN TAB 10-->

                         <!-- BEGIN TAB Hướng Dẫn Khoa Học-->
                         <div class="tab-pane" id="tab_hdkh">
                            @if($hdkh->isNotEmpty())
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-body">
                                    <table class="table table-striped table-hover table-bordered" id="table_ds_hdkh">
                                        <thead>
                                            <tr>
                                                <th> STT</th>
                                                <th> Loại Hướng Dẫn</th>
                                                <th> Học Viên</th>
                                                <th> Khóa</th>
                                                <th> Số Giờ</th>
                                                <th> Ghi Chú</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if( $hdkh->count() > 0 )
                                                @php $stt = 1; @endphp
                                                @foreach( $hdkh as $v_hdkh )
                                                <tr>
                                                    <td> {{ $stt }} </td>

                                                    <td> 
                                                    @php 
                                                         if($v_hdkh->khoa_luan == 1) {
                                                             echo "Khóa Luận";
                                                         } 
                                                         else if($v_hdkh->luan_van == 1) {
                                                             echo "Luận Văn";
                                                         }  
                                                         else if($v_hdkh->luan_an == 1) {
                                                             echo "Luận Án";
                                                         }   
                                                    @endphp
                                                     </td>

                                                    <td> {{ $v_hdkh->hoc_vien }} </td>
                                                    <td> {{ $v_hdkh->khoa }} </td>
                                                    <td> {{ $v_hdkh->so_gio }} </td>
                                                    <td> {{ $v_hdkh->ghichu }} </td>
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
                                    <p> Không tham gia Hướng Dẫn Khoa Học!</p>
                                </div>
                            @endif
                        </div>
                        <!-- END HƯỚNG DẪN KHOA HỌC-->
                           <!-- BEGIN TAB 6-->
                           <div class="tab-pane" id="tab6">
                                @if($daygioi->isNotEmpty())
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_daygioi">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Bài Dạy Giỏi</th>
                                                    <th> Cấp</th>
                                                    <th> Thời Gian</th>
                                                    <th> Số Giờ</th>
                                                    <th> Ghi Chú</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( count($daygioi) > 0 )
                                                    @php $stt = 1; @endphp
                                                    @foreach( $daygioi as $v )
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> {{ $v->ten }} </td>
                                                        <td>
                                                            @php
                                                                if($v->cap == 1){
                                                                    echo "Cấp Khoa";
                                                                }
                                                                if($v->cap == 2){
                                                                    echo "Cấp Học Viện";
                                                                }
                                                                if($v->cap == 3){
                                                                    echo "Cấp Bộ";
                                                                }
                                                            @endphp
                                                        </td>
                                                        <td> {{ $v->thoigian }} </td>
                                                        <td> {{ $v->so_gio }} </td>
                                                        <td> {{ $v->ghichu }} </td>
                                                        
                                                        {{-- <td>
                                                            @permission('create-giangvien')
                                                            <a data-daygioi-id="{{ $v->id }}" class="btn_edit_daygioi btn btn-xs yellow-gold" href="#modal_edit_daygioi" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                            <a class="btn_delete_daygioi btn btn-xs red-mint" href="#" data-daygioi-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                                            @endpermission
                                                        </td> --}}
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
                                        <p> Không tham gia dạy giỏi!</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END BEGIN TAB 6-->


                        </div>
                        <!-- END FORM-->
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
        </div>

        <!-- ================================ -->
        <div class="row box_gio">
            <div class="col-md-12">
            <h2>Hoạt Động không tính giờ</h2>
                <div class="tabbable tabbable-tabdrop">
                    <ul class="nav nav-pills">
                        <li class="active">
                            <a href="#tab_vanban" data-toggle="tab">Xử Lý Văn Bản</a>
                        </li>
                        <li>
                            <a href="#tab5" data-toggle="tab">Đảng Đoàn</a>
                        </li>
                        <li>
                            <a href="#tab7" data-toggle="tab">Xây Dựng CT</a>
                        </li>
                    </ul>
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form" id="form_wizard_1">
                        <!-- BEGIN FORM-->
                        <div class="tab-content">
                              <!-- BEGIN XỬ LÝ VĂN BẢN 3-->
                              <div class="tab-pane active" id="tab_vanban">
                                @if($vanban->isNotEmpty())
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_vanban">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Nội Dung</th>
                                                    <th> Lãnh Đạo Xử Lý</th>
                                                    <th> Thời Gian Nhận</th>
                                                    <th> Hạn</th>
                                                    <th> Ghi Chú</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( $vanban->count() > 0 )
                                                    @php $stt = 1; @endphp
                                                    @foreach( $vanban as $v_vanban )
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> {{ $v_vanban->noi_dung }} </td>
                                                        <td> {{ $v_vanban->lanhdao }} </td>
                                                        <td> {{ $v_vanban->thoigian_nhan }} </td>
                                                        <td> {{ $v_vanban->thoigian_den }} </td>
                                                        <td> {{ $v_vanban->ghichu }} </td>
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
                                        <p> Không có Văn Bản  nào!</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END XỬ LÝ VĂN BẢN-->

                          


                            <!-- BEGIN TAB 5-->
                            <div class="tab-pane" id="tab5">
                                @if($dang->isNotEmpty())
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_dang">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Nội Dung</th>
                                                    <th> Kết Quả</th>
                                                    <th> Vai Trò</th>
                                                    <th> Thời Gian</th>
                                                    <th> Ghi Chú</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( $dang->count() > 0 )
                                                    @php $stt = 1; @endphp
                                                    @foreach( $dang as $v_dang )
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> {{ $v_dang->ten }} </td>
                                                        <td> {{ $v_dang->ket_qua }} </td>
                                                        <td> {{ $v_dang->vai_tro }} </td>
                                                        <td> {{ $v_dang->thoigian }} </td>
                                                        <td> {{ $v_dang->ghichu }} </td>
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
                                        <p> Không có hoạt động đảng/đoàn nào!</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END BEGIN TAB 5-->

                           

                         <!-- BEGIN TAB 7-->
                         <div class="tab-pane" id="tab7">
                            @if($xaydung->isNotEmpty())
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-body">
                                    <table class="table table-striped table-hover table-bordered" id="table_ds_xaydung">
                                        <thead>
                                            <tr>
                                                <th> STT</th>
                                                <th> Tên Chương Trình</th>
                                                <th> Học Phần</th>
                                                <th> Khóa</th>
                                                <th> Vai Trò</th>
                                                <th> Thời Gian</th>
                                                <th> Ghi Chú</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if( $xaydung->count() > 0 )
                                                @php $stt = 1; @endphp
                                                @foreach( $xaydung as $v_xaydung )
                                                <tr>
                                                    <td> {{ $stt }} </td>
                                                    <td> {{ $v_xaydung->ten }} </td>
                                                    <td> {{ $v_xaydung->hocphan }} </td>
                                                    <td> {{ $v_xaydung->khoa }} </td>
                                                    <td> {{ $v_xaydung->vai_tro }} </td>
                                                    <td> {{ $v_xaydung->thoigian }} </td>
                                                    <td> {{ $v_xaydung->ghichu }} </td>
                                                  
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
                                    <p> Không tham gia xây dựng chương trình nào!</p>
                                </div>
                            @endif
                        </div>
                        <!-- END BEGIN TAB 7-->



                        
                        </div>
                        <!-- END FORM-->
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
        </div>


        <div class="row box_gio">
            <div class="col-md-12">
            <h2>Tổng Giờ</h2>
                <div class="tabbable tabbable-tabdrop">
                    <ul class="nav nav-pills" id="#myTab">
                        
                        <li class="active">
                            <a href="#tab17" data-toggle="tab">Giờ Giảng</a>
                        </li>
                        <li >
                            <a href="#tab2" data-toggle="tab">NCKH</a>
                        </li>
                        <li>
                            <a href="#tab_giokhac" data-toggle="tab">Giờ Hoạt Động Khác</a>
                        </li>
                    </ul>
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form" id="form_wizard_1">
                        <!-- BEGIN FORM-->
                        <div class="tab-content">
                        <!-- BEGIN TAB 11-->
                        <div class="tab-pane active" id="tab17">
                                @if(!empty($hocphan))
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_giogiang">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Mã Học Phần</th>
                                                    <th> Tên Học Phần</th>
                                                    <th> Lớp</th>
                                                    <th> Hệ</th>
                                                    <th> Quy Mô</th>
                                                    <th> Số Giờ Nghĩa Vụ</th>
                                                    <th> Số Giờ Tính Tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( count($hocphan) > 0 )
                                                    @php 
                                                        $stt = 1; 
                                                        $tongtiet = 0;
                                                        $tongnghiavu = 0;
                                                        $tongtien = 0;
                                                    @endphp
                                                    @foreach( $hocphan as $v_hocphan )
                                                    @php 
                                                        $id_giangvien = $giangvien->id;
                                                        $id_hocphan = $v_hocphan->id;
                                                        $tiet = 0;
                                                        $tien = 0;
                                                        //Tìm trong bảng tiết nếu giảng viên có dạy học phần đó 
                                                        $is_tiet = App\Tiet::where('id_hocphan', $id_hocphan)->where('id_giangvien', $id_giangvien)->first();
                                                        if($is_tiet){
                                                            //Cộng trong bảng Tiết
                                                            $tiet_hocphans = App\Tiet::where('id_hocphan', $id_hocphan)->where('id_giangvien', $id_giangvien)->get();
                                                            foreach($tiet_hocphans as $v_tiet_hocphan){
                                                                if($v_tiet_hocphan->lops->he == 1)
                                                               {$tiet += $v_tiet_hocphan->so_tiet;} 
                                                              else if($v_tiet_hocphan->lops->he == 0)
                                                               {$tien +=$v_tiet_hocphan->so_tiet;} 
                                                            }
                                                            //Tổng số tiết tính giờ bằng số tiết * quy mô
                                                            //Tổng số giờ tính tiền bằng số tiết * quy mô
                                                            $quymo = $v_hocphan->lops->quymo;
                                                            $tiet = $tiet * $quymo;
                                                            $tien = $tien * $quymo;
                                                            $he = ($v_hocphan->lops->he) ? 'Tính Giờ' : 'Tính Tiền';
                                                           
                                                           echo "<tr>"
                                                                ."<td>"."$stt"."</td>"
                                                                ."<td>"."{$v_hocphan->mahocphan}"."</td>"
                                                                ."<td>"."{$v_hocphan->tenhocphan}"."</td>"
                                                                ."<td>"."{$v_hocphan->lops->tenlop}"."</td>"
                                                                ."<td>"."{$he}"."</td>"
                                                                ."<td>"."{$v_hocphan->lops->quymo}"."</td>"
                                                                ."<td>"."$tiet"."</td>"
                                                                ."<td>"."$tien"."</td>"
                                                           ."</tr>";
                                                           $stt++;
                                                   
                                                        }
                                                        $tongtiet += $tiet;
                                                        $tongtiet += $tien;
                                                        $tongnghiavu += $tiet;
                                                        $tongtien += $tien;
                                                    @endphp 
                                                   
                                                   
                                                    @endforeach
                                                    <tr>
                                                    <td colspan="6"> <p> <b>Tổng Giờ: {{$tongtiet}}</b> </p></td>
                                                    <td> Tổng Giờ Nghĩa Vụ: {{$tongnghiavu}}</td>
                                                    <td> Tổng Giờ Tính Tiền: {{$tongtien}}</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                                @else
                                    <div class="alert alert-danger" style="margin-bottom: 0px;">
                                        <p> Không có Dữ Liệu</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END BEGIN TAB 17-->
                            <!-- BEGIN TAB 2-->
                            <div class="tab-pane" id="tab2">
                                @if(!empty($nckh))
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_nckh">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên NCKH</th>
                                                    <th> Chủ Biên</th>
                                                    <th> Tham Gia</th>
                                                    <th> Bắt Đầu</th>
                                                    <th> Kết Thúc</th>
                                                    <th> Số Trang</th>
                                                    <th> Số Giờ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( count($nckh) > 0 )
                                                    @php $stt = 1; @endphp
                                                    @foreach( $nckh as $v )
                                                    <tr>
                                                        <td> {{ $stt}} </td>
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
                                                            <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}} </p>
                                                            @endif
                                                            @endforeach
                                                        </td>
                                                        <td> {{$v->batdau}}</td>
                                                        <td> {{$v->ketthuc}}</td>
                                                        <td> {{$v->sotrang}}</td>
                                                        <td>
                                                            {{-- In ra số Giờ --}}
                                                            @switch($v->theloai)
                                                                @case(1)
                                                                {{ $gio_kh = ($v->sotrang/2.5)*8*4}} giờ
                                                                    @break
                                                                @case(2)
                                                                   {{ $gio_kh = ($v->sotrang/2.5)*4*4}} giờ
                                                                    @break
                                                                @case(3)
                                                                    {{ $gio_kh = 6*4}} giờ
                                                                    @break
                                                                @case(4)
                                                                {{ $gio_kh =($v->sotrang/2.5)*10*4}} giờ
                                                                    @break
                                                                @case(5)
                                                                {{ $gio_kh = $v->sotrang*1.5}} giờ
                                                                    @break
                                                                @case(6)
                                                                    {{$gio_kh = $v->sotrang*4.27}} giờ
                                                                    @break
                                                                @case(7)
                                                                    {{$gio_kh = $v->sotrang*2}} giờ
                                                                    @break
                                                                @case(8)
                                                                    {{$gio_kh = $v->sotrang}} giờ
                                                                    @break
                                                                @default
                                                                    {{$gio_kh = $v->sotrang}} giờ
                                                            @endswitch
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
                                        <p> Không có Nghiên cứu khoa học nào!</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END BEGIN TAB 2-->

                            <!-- BEGIN GIỜ KHÁC-->
                        <div class="tab-pane " id="tab_giokhac">
                                @if(($hop->isNotEmpty()) || ($chambai->isNotEmpty()) || ($congtac->isNotEmpty()) || ($daygioi->isNotEmpty()) || ($hoctap->isNotEmpty()) || ($hdkh->isNotEmpty()))
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_giokhac">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Thể Loại</th>
                                                    <th> Tổng Số Giờ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php 
                                                    $stt = 1; 
                                                    $total_hop = 0;
                                                    $total_chambai = 0;
                                                    $total_congtac = 0;
                                                    $total_daygioi = 0; 
                                                    $total_hoctap = 0; 
                                                    $total_hdkh = 0; 
                                                
                                                @endphp
                                                @if( $hop->count() > 0 )
                                                    @php  @endphp
                                                    @foreach( $hop as $v_hop )
                                                    @php $total_hop += $v_hop->so_gio; @endphp
                                                    @endforeach
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> Họp </td>
                                                        <td> {{ $total_hop }} </td>
                                                    </tr>
                                                    @php $stt++; @endphp
                                                @endif
                                               
                                                @if( $chambai->count() > 0 )
                                                    @foreach( $chambai as $v_chambai )
                                                    @php $total_chambai += $v_chambai->so_gio; @endphp
                                                    
                                                    @endforeach
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> Chấm Bài </td>
                                                        <td> {{ $total_chambai }} </td>
                                                    </tr>
                                                    @php $stt++; @endphp
                                                @endif
                                               
                                                @if( $congtac->count() > 0 )
                                                    @foreach( $congtac as $v_congtac )
                                                    @php $total_congtac += $v_congtac->so_gio; @endphp
                                                   
                                                    @endforeach
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> Đi Thực Tế</td>
                                                        <td> {{ $total_congtac }} </td>
                                                    </tr>
                                                    @php $stt++; @endphp
                                                @endif

                                                @if( $daygioi->count() > 0 )
                                                   
                                                    @foreach( $daygioi as $v_daygioi )
                                                    @php $total_daygioi += $v_daygioi->so_gio; @endphp
                                                   
                                                    @endforeach
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> Dạy Giỏi</td>
                                                        <td> {{ $total_daygioi }} </td>
                                                    </tr>
                                                    @php $stt++; @endphp
                                                @endif

                                                @if( $hoctap->count() > 0 )
                                                   
                                                    @foreach( $hoctap as $v_hoctap )
                                                    @php $total_hoctap += $v_hoctap->so_gio; @endphp
                                                    
                                                    @endforeach
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> Tham Gia Học Tập</td>
                                                        <td> {{ $total_hoctap }} </td>
                                                    </tr>
                                                    @php $stt++; @endphp
                                                @endif

                                                @if( $hdkh->count() > 0 )
                                                   
                                                    @foreach( $hdkh as $v_hdkh )
                                                    @php $total_hdkh += $v_hdkh->so_gio; @endphp
                                                    
                                                    @endforeach
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> Hướng Dẫn Khoa Học </td>
                                                        <td> {{ $total_hdkh }} </td>
                                                    </tr>
                                                    @php $stt++; @endphp
                                                @endif
                                                @php $total = $total_hop + $total_chambai + $total_congtac + $total_daygioi + $total_hdkh + $total_hoctap; @endphp

                                                <tr> 
                                                    <td colspan="2"> Tổng Giờ: </td>
                                                    <td> {{$total}} </td>

                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                                @else
                                    <div class="alert alert-danger" style="margin-bottom: 0px;">
                                        <p> Không tham gia hoạt động nào!</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END GIỜ KHÁC-->

                        </div>
                        <!-- END FORM-->
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

@endsection

@section('script')
<script>
    $(document).ready(function(){
        // Cấu hình bảng ds hợp đồng
        var table = $('#table_ds_hop');
        var oTable = table.dataTable({

            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_",
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
        // END Cấu hình bảng ds hợp đồng

         // Cấu hình bảng cong tác
         var table_ct = $('#table_ds_chambai');
        var oTable_ct = table_ct.dataTable({

            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_",
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
        // END Cấu hình bảng ds công tác

        // Cấu hình bảng ds quyết định
        $('#table_ds_daygioi').dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_",
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

        $('#table_ds_hoctap').dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_",
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

        $('#table_ds_hdkh').dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_",
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
        $('#table_ds_congtac').dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_",
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
        $('#table_ds_xaydung').dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_",
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
        $('#table_ds_dang').dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_",
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
        $('#table_ds_vanban').dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_",
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
        $('#table_ds_giogiang').dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_",
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
        
        $('#table_ds_nckh').dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_",
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
        // END Cấu hình bảng ds quyết định
    });
</script>
<script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js') }}" type="text/javascript"></script>
@endsection
