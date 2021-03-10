@extends('layouts.master')

@section('title', 'Danh Sách Lịch Tuần')

@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css" />
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
                    <a href="{{ route('tuan.get') }}"> Danh Sách Lịch Tuần</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> 
            <b>
                {{-- <i class="fa fa-edit"></i> Danh Sách Lịch Tuần --}}
            </b>
           
        </h1>
        <!-- END PAGE TITLE-->
        <div class="row">
            <div class="col-md-6">
                   <div class="btn-group">
                        <a style="margin-top: 20px" id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_tuan"><i class="fa fa-plus"></i> Tạo Lịch Tuần Mới
                            
                        </a>
                    </div> 
                </div>
            <div class="col-md-6">
              
            </div>

        </div>
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
            <h2>Lịch Tuần</h2>
                <div class="tabbable tabbable-tabdrop">
                    <ul class="nav nav-pills" id="#myTab">
                        <li class="active">
                            <a href="#tab_lichtuan" data-toggle="tab">Lịch Tuần Này</a>
                        </li>
                        <li>
                            <a href="#tab_all" data-toggle="tab">Danh Sách Tất Cả Lịch Tuần </a>
                        </li>
                       
                    </ul>
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form" id="form_wizard_1">
                        <!-- BEGIN FORM-->
                        {{-- @include('khac.edit.form') --}}
                        <form action="{{ route('khac.edit.get')}}" method="post" id="form_sample_2" class="form-horizontal">
                            @csrf
                            <div class="tab-content">
                                <!-- BEGIN TAB 3-->
                                <div class="tab-pane active" id="tab_lichtuan">
                                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                        <div class="portlet light portlet-fit bordered">
                                            <div class="portlet-body">
                                                <div class="table-toolbar">
                                                    <div class="row">
                                                        {{-- <div class="col-md-6">
                                                            <div class="btn-group">
                                                                <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_congtac"><i class="fa fa-plus"></i> Tạo Đi Thực Tế Mới
                        
                                                                </a>
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                <table class="table table-striped table-hover table-bordered" id="ds_tuan_nay">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:60px"> Thứ</th>
                                                            <th> Ngày Giờ</th>
                                                            <th> Trực LĐ</th>
                                                            <th> Trực GV</th>
                                                            <th> Địa Điểm </th>
                                                            <th style="width:180px"> Nội Dung</th>
                                                            <th> Thành Phần </th>
                                                            <th> Ghi Chú</th>
                                                            <th> Hành Động</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if( $t2->count() > 0 )
                                                        @foreach( $t2 as $v_t2 )
                                                        
                                                        <tr>
                                                            <td>
                                                                Hai
                                                            </td>
                                                            <td>
                                                                {{ $v_t2->thoi_gian }}
                                                            </td>
                                                            <td>
                                                                @if (App\GiangVien::where('id', $v_t2->truc_ban)->first() !== null)
                                                                {{ $v_t2->trucbans->ten }}
                                                                @endif
                                                            </td>
                                                             <td>
                                                                    @if (App\GiangVien::where('id', $v_t2->truc_gv)->first() !== null)
                                                                    {{ $v_t2->trucgvs->ten }}
                                                                    @endif
                                                            </td>
                                                            <td>
                                                                {{ $v_t2->dia_diem }}
                                                            </td>
                                                            <td>
                                                                {{ $v_t2->noi_dung }}
                                                            </td>
                                                            <td>
                                                                {{ $v_t2->thanh_phan }}
                                                            </td>
                                                            <td>
                                                                {{ $v_t2->ghi_chu }}
                                                            </td>
                                                            <td>
                                                                   
                                                                <a class="btn_edit_tuan btn btn-xs yellow-gold" data-tuan-id="{{ $v_t2->id }}" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                                <a class="btn_delete_tuan btn btn-xs red-mint" data-tuan-id="{{ $v_t2->id }}" href=""  title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                                            </td>
                                                        </tr>
                                                            @endforeach
                                                            @endif
                        
                        
                                                            @if( $t3->count() > 0 )
                                                            @foreach( $t3 as $v_t3 )
                                                            <tr>
                                                            <td>
                                                                Ba
                                                            </td>
                                                            <td>
                                                                {{ $v_t3->thoi_gian }}
                                                            </td>
                                                            <td>
                                                                @if (App\GiangVien::where('id', $v_t3->truc_ban)->first() !== null)
                                                                {{ $v_t3->trucbans->ten }}
                                                                @endif
                                                            </td>
                                                             <td>
                                                                    @if (App\GiangVien::where('id', $v_t3->truc_gv)->first() !== null)
                                                                    {{ $v_t3->trucgvs->ten }}
                                                                    @endif
                                                            </td>
                                                            <td>
                                                                {{ $v_t3->dia_diem }}
                                                            </td>
                                                            <td>
                                                                {{ $v_t3->noi_dung }}
                                                            </td>
                                                            <td>
                                                                {{ $v_t3->thanh_phan }}
                                                            </td>
                                                            <td>
                                                                {{ $v_t3->ghi_chu }}
                                                            </td>
                                                            <td>
                                                                   
                                                                <a class="btn_edit_tuan btn btn-xs yellow-gold" data-tuan-id="{{ $v_t3->id }}" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                                <a class="btn_delete_tuan btn btn-xs red-mint" data-tuan-id="{{ $v_t3->id }}" href=""  title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                                            </td>
                                                        </tr>
                        
                                                        @endforeach
                                                        @endif
                                                        @if( $t4->count() > 0 )
                                                        @foreach( $t4 as $v_t4 )
                                                        <tr>
                                                            <td>
                                                                Tư
                                                            </td>
                                                            <td>
                                                                {{ $v_t4->thoi_gian }}
                                                            </td>
                                                            <td>
                                                                @if (App\GiangVien::where('id', $v_t4->truc_ban)->first() !== null)
                                                                {{ $v_t4->trucbans->ten }}
                                                                @endif
                                                            </td>
                                                             <td>
                                                                    @if (App\GiangVien::where('id', $v_t4->truc_gv)->first() !== null)
                                                                    {{ $v_t4->trucgvs->ten }}
                                                                    @endif
                                                            </td>
                                                            <td>
                                                                {{ $v_t4->dia_diem }}
                                                            </td>
                                                            <td>
                                                                {{ $v_t4->noi_dung }}
                                                            </td>
                                                            <td>
                                                                {{ $v_t4->thanh_phan }}
                                                            </td>
                                                            <td>
                                                                {{ $v_t4->ghi_chu }}
                                                            </td>
                                                            <td>
                                                                   
                                                                <a class="btn_edit_tuan btn btn-xs yellow-gold" data-tuan-id="{{ $v_t4->id }}" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                                <a class="btn_delete_tuan btn btn-xs red-mint" data-tuan-id="{{ $v_t4->id }}" href=""  title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                                            </td>
                                                        </tr>
                                                            @endforeach
                                                            @endif
                                                            @if( $t5->count() > 0 )
                                                            @foreach( $t5 as $v_t5 )
                                                            <tr>
                                                            <td>
                                                                Năm
                                                            </td>
                                                            <td>
                                                                {{ $v_t5->thoi_gian }}
                                                            </td>
                                                            <td>
                                                                @if (App\GiangVien::where('id', $v_t5->truc_ban)->first() !== null)
                                                                {{ $v_t5->trucbans->ten }}
                                                                @endif
                                                            </td>
                                                             <td>
                                                                    @if (App\GiangVien::where('id', $v_t5->truc_gv)->first() !== null)
                                                                    {{ $v_t5->trucgvs->ten }}
                                                                    @endif
                                                                </td>
                                                            <td>
                                                                {{ $v_t5->dia_diem }}
                                                            </td>
                                                            <td>
                                                                {{ $v_t5->noi_dung }}
                                                            </td>
                                                            <td>
                                                                {{ $v_t5->thanh_phan }}
                                                            </td>
                                                            <td>
                                                                {{ $v_t5->ghi_chu }}
                                                            </td>
                                                            <td>
                                                                   
                                                                <a class="btn_edit_tuan btn btn-xs yellow-gold" data-tuan-id="{{ $v_t5->id }}" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                                <a class="btn_delete_tuan btn btn-xs red-mint" data-tuan-id="{{ $v_t5->id }}" href=""  title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                                            </td>
                                                        </tr>
                                                            @endforeach
                                                            @endif
                        
                                                            @if( $t6->count() > 0 )
                                                            @foreach( $t6 as $v_t6 )
                                                            <tr>
                                                            <td>
                                                                Sáu
                                                            </td>
                                                            <td>
                                                                {{ $v_t6->thoi_gian }}
                                                            </td>
                                                            <td>
                                                                @if (App\GiangVien::where('id', $v_t6->truc_ban)->first() !== null)
                                                                {{ $v_t6->trucbans->ten }}
                                                                @endif
                                                            </td>
                                                             <td>
                                                                    @if (App\GiangVien::where('id', $v_t6->truc_gv)->first() !== null)
                                                                    {{ $v_t6->trucgvs->ten }}
                                                                    @endif
                                                            </td>
                                                            <td>
                                                                {{ $v_t6->dia_diem }}
                                                            </td>
                                                            <td>
                                                                {{ $v_t6->noi_dung }}
                                                            </td>
                                                            <td>
                                                                {{ $v_t6->thanh_phan }}
                                                            </td>
                                                            <td>
                                                                {{ $v_t6->ghi_chu }}
                                                            </td>
                                                            <td>
                                                                   
                                                                <a class="btn_edit_tuan btn btn-xs yellow-gold" data-tuan-id="{{ $v_t6->id }}" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                                <a class="btn_delete_tuan btn btn-xs red-mint" data-tuan-id="{{ $v_t6->id }}" href=""  title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                                            </td>
                                                        </tr>
                                                            @endforeach
                                                            @endif
                                                            @if( $t7->count() > 0 )
                                                            @foreach( $t7 as $v_t7 )
                                                            <tr>
                                                            <td>
                                                                Bảy
                                                            </td>
                                                            <td>
                                                                {{ $v_t7->thoi_gian }}
                                                            </td>
                                                            <td>
                                                                @if (App\GiangVien::where('id', $v_t7->truc_ban)->first() !== null)
                                                                {{ $v_t7->trucbans->ten }}
                                                                @endif
                                                            </td>
                                                             <td>
                                                                    @if (App\GiangVien::where('id', $v_t7->truc_gv)->first() !== null)
                                                                    {{ $v_t7->trucgvs->ten }}
                                                                    @endif
                                                            </td>
                                                            <td>
                                                                {{ $v_t7->dia_diem }}
                                                            </td>
                                                            <td>
                                                                {{ $v_t7->noi_dung }}
                                                            </td>
                                                            <td>
                                                                {{ $v_t7->thanh_phan }}
                                                            </td>
                                                            <td>
                                                                {{ $v_t7->ghi_chu }}
                                                            </td>
                                                            <td>
                                                                   
                                                                <a class="btn_edit_tuan btn btn-xs yellow-gold" data-tuan-id="{{ $v_t7->id }}" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                                <a class="btn_delete_tuan btn btn-xs red-mint" data-tuan-id="{{ $v_t7->id }}" href=""  title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                                            </td>
                                                        </tr>
                                                            @endforeach
                                                            @endif
                                                            @if( $t8->count() > 0 )
                                                            @foreach( $t8 as $v_t8 )
                                                            <tr>
                                                            <td>
                                                                Chủ Nhật
                                                            </td>
                                                            <td>
                                                                {{ $v_t8->thoi_gian }}
                                                            </td>
                                                            <td>
                                                                @if (App\GiangVien::where('id', $v_t8->truc_ban)->first() !== null)
                                                                {{ $v_t8->trucbans->ten }}
                                                                @endif
                                                            </td>
                                                             <td>
                                                                    @if (App\GiangVien::where('id', $v_t8->truc_gv)->first() !== null)
                                                                    {{ $v_t8->trucgvs->ten }}
                                                                    @endif
                                                            </td>
                                                            <td>
                                                                {{ $v_t8->dia_diem }}
                                                            </td>
                                                            <td>
                                                                {{ $v_t8->noi_dung }}
                                                            </td>
                                                            <td>
                                                                {{ $v_t8->thanh_phan }}
                                                            </td>
                                                            
                                                            <td>
                                                                {{ $v_t8->ghi_chu }}
                                                            </td>
                                                            <td>
                                                                   
                                                                <a class="btn_edit_tuan btn btn-xs yellow-gold" data-tuan-id="{{ $v_t8->id }}" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                                <a class="btn_delete_tuan btn btn-xs red-mint" data-tuan-id="{{ $v_t8->id }}" href=""  title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                                            </td>
                                                        </tr>
                                                            @endforeach
                                                            @endif
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                </div>
                                <!-- END TAB 3-->
                        
                                
                                 <!-- BEGIN TAB Họp-->
                                <div class="tab-pane" id="tab_all">
                                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                        <div class="portlet light portlet-fit bordered">
                                            <div class="portlet-body">
                                                <div class="table-toolbar">
                                                    <div class="row">
                                                        {{-- <div class="col-md-6">
                                                            <div class="btn-group">
                                                                <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_hop"><i class="fa fa-plus"></i> Tạo Cuộc Họp Mới
                        
                                                                </a>
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                <table class="table table-striped table-hover table-bordered" id="ds_tuan">
                                                    <thead>
                                                        <tr>
                                                            <th> STT</th>
                                                            <th> Thứ</th>
                                                            <th> Ngày Giờ</th>
                                                            <th> Trực LĐ</th>
                                                            <th> Trực GV</th>
                                                            <th> Địa Điểm </th>
                                                            <th> Nội Dung</th>
                                                            <th> Thành Phần </th>
                                                            <th> Ghi Chú</th>
                                                            <th> Hành Động</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if( $ds_tuan->count() > 0 )
                                                            @php $stt = 1; @endphp
                                                            @foreach( $ds_tuan as $v )
                                                            <tr>
                                                                <td> {{ $stt }} </td>
                                                                <td> 
                                                                    @php
                                                                    $day = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $v->thoi_gian)->dayOfWeek;
                                                                    if($day == 1 ) echo " Hai";
                                                                    if($day == 2 ) echo " Ba";
                                                                    if($day == 3 ) echo " Tư";
                                                                    if($day == 4 ) echo " Năm";
                                                                    if($day == 5 ) echo " Sáu";
                                                                    if($day == 6 ) echo " Bảy";
                                                                    if($day == 0 ) echo " CN";


                                                                    @endphp 
                                                                </td>
                                                                <td> {{ $v->thoi_gian }} </td>
                                                                <td>
                                                                    @if (App\GiangVien::where('id', $v->truc_ban)->first() !== null)
                                                                    {{ $v->trucbans->ten }}
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if (App\GiangVien::where('id', $v->truc_gv)->first() !== null)
                                                                    {{ $v->trucgvs->ten }}
                                                                    @endif
                                                                </td>
                                                                <td> {{ $v->dia_diem }}  </td>
                                                                <td> {{ $v->noi_dung }} </td>
                                                                <td> {{ $v->thanh_phan }} </td>
                                                                <td> {{ $v->ghi_chu }} </td>
                                                                <td>
                                                                   
                                                                    <a class="btn_edit_tuan btn btn-xs yellow-gold" data-tuan-id="{{ $v->id }}" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                                    <a class="btn_delete_tuan btn btn-xs red-mint" data-tuan-id="{{ $v->id }}" href=""  title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                                </div>
                                <!-- END TAB Họp-->
                        
                           
                                
                            </div>
                          
                        
                        </form>
                        

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
{{------------------------------------------------- Modal Add  ---------------------------------------}}
<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_add_tuan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="post" id="form_add_tuan">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Thêm mới Lịch Tuần</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ngày Giờ: <span class="required">*</span></label>
                                    <input  name="thoi_gian" type="datetime-local" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Trực Lãnh Đạo:<span class="required"></span></label>
                                    <select class="form-control" name="truc_ban">
                                        <option name="gv_hientai"></option>
                                            @if($giangvien->count()>0)
                                                @foreach($giangvien as $v)
                                                    <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->ma_giangvien.'-'.$v->ten }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Trực Giảng Viên:<span class="required"></span></label>
                                    <select class="form-control" name="truc_gv">
                                        <option name="gv_hientai"></option>
                                            @if($giangvien->count()>0)
                                                @foreach($giangvien as $v)
                                                    <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->ma_giangvien.'-'.$v->ten }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Địa Điểm: <span class="required"></span></label>
                                    <input  name="dia_diem" type="text" class="form-control" placeholder="Nhập địa điểm">
                                </div>
                                <div class="form-group">
                                    <label>Nội Dung: <span class="required"></span></label>
                                    <input  name="noi_dung" type="text" class="form-control" placeholder="Nội Dung...">
                                </div>
                                <div class="form-group">
                                    <label>Thành Phần: <span class="required"></span></label>
                                    <input  name="thanh_phan" type="text" class="form-control" placeholder="Thành Phần tham gia...">
                                </div>
                                
                                <div class="form-group">
                                    <label>Ghi Chú: <span class="required"></span></label>
                                    <input  name="ghi_chu" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_add_tuan"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

{{----------------------------------------------------- Modal Edit  ----------------------------------}}
<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_edit_tuan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="form_edit_tuan">
                @csrf
                <input value="" name="id" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Chỉnh sửa Lịch Tuần</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ngày Giờ: <span class="required">*</span></label>
                                    <input  name="thoi_gian" type="datetime-local" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Trực Lãnh Đạo:<span class="required"></span></label>
                                    <select class="form-control" name="truc_ban">
                                        <option name="gv_hientai"></option>
                                            @if($giangvien->count()>0)
                                                @foreach($giangvien as $v)
                                                    <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->ma_giangvien.'-'.$v->ten }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Trực Giảng Viên:<span class="required"></span></label>
                                    <select class="form-control" name="truc_gv">
                                        <option name="gv_hientai"></option>
                                            @if($giangvien->count()>0)
                                                @foreach($giangvien as $v)
                                                    <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->ma_giangvien.'-'.$v->ten }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Địa Điểm: <span class="required"></span></label>
                                    <input  name="dia_diem" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nội Dung: <span class="required"></span></label>
                                    <input  name="noi_dung" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Thành Phần: <span class="required"></span></label>
                                    <input  name="thanh_phan" type="text" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label>Ghi Chú: <span class="required">*</span></label>
                                    <input  name="ghi_chu" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_edit_tuan"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

{{------------------------------------ END MODAL EDIT  ------------------------}}



@endsection

@section('script')
<script>
    jQuery(document).ready(function() {







        // Ajax thêm Lịch Tuần Học mới
    $("#btn_add_tuan").on('click', function(e){
       e.preventDefault();
       console.log("hihi");
       $("#btn_add_tuan").attr("disabled", "disabled");
       $("#btn_add_tuan").html('<i class="fa fa-spinner fa-spin"></i> Lưu');

       $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

       $.ajax({
           url: '{{route('postThemTuan')}}',
           method: 'POST',
           data: {
               thoi_gian: $("#form_add_tuan input[name='thoi_gian']").val(),
               truc_ban: $("#form_add_tuan select[name='truc_ban']").val(),
               truc_gv: $("#form_add_tuan select[name='truc_gv']").val(),
               dia_diem: $("#form_add_tuan input[name='dia_diem']").val(),
               noi_dung: $("#form_add_tuan input[name='noi_dung']").val(),
               thanh_phan: $("#form_add_tuan input[name='thanh_phan']").val(),
               ghi_chu: $("#form_add_tuan input[name='ghi_chu']").val(),
               
           },
           success: function(data) {
                console.log("Hihi");
                $("#btn_add_tuan").removeAttr("disabled");
                $("#btn_add_tuan").html('<i class="fa fa-save"></i> Lưu');
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
                    $('#modal_add_tuan').modal('hide');
                    swal({
                        "title":"Đã tạo!",
                        "text":"Bạn đã tạo thành công Lịch Tuần!",
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
   // END Ajax thêm Bài Học
   //AJAX Tìm Bài Học Theo ID


        $(".btn_edit_tuan").on("click", function(e){
            e.preventDefault();
            var tuan_id = $(this).data("tuan-id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('postTimTuanTheoId') }}',
                method: 'POST',
                data: {
                    id: tuan_id
                },
                success: function(data) {
                    if(data.status == true){
                        console.log(data.data);
                        $("#form_edit_tuan input[name='id']").val(data.data.id);
                        $("#form_edit_tuan input[name='thoi_gian']").val(data.data.thoi_gian);
                        $("#form_edit_tuan select[name='truc_ban']").val(data.data.truc_ban);
                        $("#form_edit_tuan select[name='truc_gv']").val(data.data.truc_gv);
                        $("#form_edit_tuan input[name='dia_diem']").val(data.data.dia_diem);
                        $("#form_edit_tuan input[name='noi_dung']").val(data.data.noi_dung);
                        $("#form_edit_tuan input[name='thanh_phan']").val(data.data.thanh_phan);
                        $("#form_edit_tuan input[name='ghi_chu']").val(data.data.ghi_chu);
                        $('#modal_edit_tuan').modal('show');
                    }
                }
            });
        });
        // END Khi click vào nút sửa tuan, tìm tuan theo id và đỗ dữ liệu vào form

        // Ajax sửa tuan
        $("#btn_edit_tuan").on('click', function(e){
            e.preventDefault();
            $("#btn_edit_tuan").attr("disabled", "disabled");
            $("#btn_edit_tuan").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('postSuaTuan') }}',
                method: 'POST',
                data: {
                    id: $("#form_edit_tuan input[name='id']").val(),
                    thoi_gian: $("#form_edit_tuan input[name='thoi_gian']").val(),
                    truc_ban: $("#form_edit_tuan select[name='truc_ban']").val(),
                    truc_gv: $("#form_edit_tuan select[name='truc_gv']").val(),
                    dia_diem: $("#form_edit_tuan input[name='dia_diem']").val(),
                    noi_dung: $("#form_edit_tuan input[name='noi_dung']").val(),
                    thanh_phan: $("#form_edit_tuan input[name='thanh_phan']").val(),
                    ghi_chu: $("#form_edit_tuan input[name='ghi_chu']").val(),
                    
                },
                success: function(data) {
                    $("#btn_edit_tuan").removeAttr("disabled"); 
                    $("#btn_edit_tuan").html('<i class="fa fa-save"></i> Lưu');
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
                        $('#modal_edit_tuan').modal('hide');
                        swal({
                            "title":"Đã sửa!", 
                            "text":"Bạn đã sửa thành công Lịch Tuần!",
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
        // END Ajax sửa tuan
        
        // Xử lý khi click nút xóa tuan
        $(".btn_delete_tuan").on("click", function(e){
            e.preventDefault();

            var tuan_id = $(this).data("tuan-id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            swal({
                title: "Xóa Lịch Tuần này?",
                text: "Lưu ý: Lịch Tuần này sẽ bị xóa vĩnh viễn!",
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
                            url: '{{ route('postXoaTuan') }}',
                            method: 'POST',
                            data: {
                                id: tuan_id
                            },
                            success: function(data) {
                                console.log(data);
                                if(data.status == true){
                                    swal({
                                        "title":"Đã xóa!", 
                                        "text":"Bạn đã xóa thành công Lịch Tuần!",
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




        var table = $('#ds_tuan');

        var oTable = table.dataTable({
            "autoWidth":false,
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],

            "pageLength": 10,

            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng: _TOTAL_",
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
            },
            { "width": "30px", "targets": 0 },
            { "width": "60px", "targets": 1 },
            { "width": "80px", "targets": 2 },
            { "width": "80px", "targets": 3 },
            { "width": "80px", "targets": 4 },
            { "width": "100px", "targets": 5 },
            { "width": "180px", "targets": 6 },
            { "width": "120px", "targets": 7 },
            { "width": "120px", "targets": 8 },
            { "width": "80px", "targets": 9 },
            ],
            "order": [
                // [0, "asc"]
            ] // set first column as a default sort by asc
        });


        // END Xử lý khi click nút xóa Lịch Tuan

    });
</script>
<script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js') }}" type="text/javascript"></script>
@endsection
