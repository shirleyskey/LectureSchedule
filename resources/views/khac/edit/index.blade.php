@extends('layouts.master')

@section('title', 'Chỉnh sửa Công Việc Khác')

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
                    <a href="{{ route('khac.edit.get') }}">Công Việc Khác</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> 
            <b>
                <i class="fa fa-edit"></i> Quản Lý | Công Việc Khác
            </b>
           
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
                            <a href="#tab_hop" data-toggle="tab">Họp</a>
                        </li>
                        <li>
                            <a href="#tab_hdkh" data-toggle="tab">Hướng Dẫn Khoa Học </a>
                        </li>
                        <li class="">
                            <a href="#tab4" data-toggle="tab">Chấm Bài</a>
                        </li>
                        <li>
                            <a href="#tab3" data-toggle="tab">Đi Thực Tế</a>
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
                        @include('khac.edit.form')
                        <!-- END FORM-->
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
        </div>

        <div class="row box_gio" >
            <div class="col-md-12">
            <h2>Hoạt Động không tính giờ</h2>
                <div class="tabbable tabbable-tabdrop">
                    <ul class="nav nav-pills" id="#myTab">
                       
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
                        @include('khac.edit.form_notgio')
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

<!-- -------------------------------------CHẤM BÀI ADD -------------------------------------->
<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_add_chambai" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="post" id="form_add_chambai">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Thêm mới Chấm Bài</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label>Tên Giảng Viên:<span class="required">*</span></label>
                                    <select class="form-control" name="id_giangvien">
                                        <option value="0">-------- Chọn Giảng Viên --------</option>
                                            @if($giangvien->count()>0)
                                                @foreach($giangvien as $v)
                                                    <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->ten }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tên Lớp: <span class="required">*</span></label>
                                    <select class="form-control" name="id_lop">
                                        <option name="lop_hientai">Chọn Lớp</option>
                                            @if($lop->count()>0)
                                                @foreach($lop as $v)
                                                    <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->tenlop }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tên Học Phần: <span class="required">*</span></label>
                                    <select class="form-control" name="id_hocphan">
                                        <option name="hocphan_hientai">Chọn Học Phần</option>
                                            @if($hocphan->count()>0)
                                                @foreach($hocphan as $v)
                                                    <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->mahocphan }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Số Bài:<span class="required">*</span></label>
                                    <input class="form-control" name="so_bai" type="number" placeholder="" required />
                                </div>
                                <div class="form-group">
                                    <label>Thời Gian:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Giờ Quy Đổi:<span class="required">*</span></label>
                                    <input class="form-control" name="so_gio" type="number" placeholder="" required />
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required">*</span></label>
                                    <input class="form-control" name="ghichu" type="text" required />
                                </div>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_add_chambai"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_edit_chambai" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="form_edit_chambai">
                @csrf
                <input value="" name="id" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Chỉnh sửa Chấm Bài</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label>Giảng Viên:<span class="required">*</span></label>
                                    <select class="form-control" name="id_giangvien">
                                        <option name="gv_hientai">Chọn Lớp</option>
                                            @if($giangvien->count()>0)
                                                @foreach($giangvien as $v)
                                                    <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->ten }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tên Lớp: <span class="required">*</span></label>
                                    <select class="form-control" name="id_lop">
                                        <option name="lop_hientai">Chọn Lớp</option>
                                            @if($lop->count()>0)
                                                @foreach($lop as $v)
                                                    <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->tenlop }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tên Học Phần: <span class="required">*</span></label>
                                    <select class="form-control" name="id_hocphan">
                                        <option name="hocphan_hientai"></option>
                                            @if($hocphan->count()>0)
                                                @foreach($hocphan as $v)
                                                    <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->mahocphan }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Số Bài:<span class="required">*</span></label>
                                    <input class="form-control" name="so_bai" type="number" placeholder="" required />
                                </div>
                                <div class="form-group">
                                    <label>Thời Gian:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Giờ Quy Đổi:<span class="required">*</span></label>
                                    <input class="form-control" name="so_gio" type="number" placeholder="" required />
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required">*</span></label>
                                    <input class="form-control" name="ghichu" type="text" required />
                                </div>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_edit_chambai"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- -------------------------------------END CHẤM BÀI ADD -------------------------------------->
<!-- -------------------------------------CÔNG TÁC ADD ------------------------------------>
<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_add_congtac" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="post" id="form_add_congtac">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Thêm mới Đi Thực Tế</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên Địa Bàn: <span class="required">*</span></label>
                                    <input  name="ten" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Tên Giảng Viên: <span class="required">*</span></label>
                                    <select class="form-control" name="id_giangvien">
                                        <option value="0">-------- Chọn Giảng Viên --------</option>
                                            @if($giangvien->count()>0)
                                                @foreach($giangvien as $v)
                                                    <option value="{{ $v->id }}"  <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->ten }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Số Giờ:<span class="required">*</span></label>
                                    <input name="so_gio" type="number" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Thời Gian:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required">*</span></label>
                                    <input name="ghichu" type="text" class="form-control" required>
                                </div>

                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_add_congtac"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_edit_congtac" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="form_edit_congtac">
                @csrf
                <input value="" name="id" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Chỉnh sửa Đi Thực Tế</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên Địa Bàn:<span class="required">*</span></label>
                                    <input value="" name="ten" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Tên Giảng Viên:<span class="required">*</span></label>
                                    <select class="form-control" name="id_giangvien">
                                    <option name="gv_hientai"></option>
                                            @if($giangvien->count()>0)
                                                @foreach($giangvien as $v)
                                                    <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->ten }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Số Giờ:<span class="required">*</span></label>
                                    <input value="" name="so_gio" type="number" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Thời Gian:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian" id="thoigian" type="date" value="" required />
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required">*</span></label>
                                    <input value="" name="ghichu" type="text" class="form-control" required>
                                </div>

                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_edit_congtac"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- -------------------------------------END CÔNG TÁC ADD -------------------------------------->

<!-- -------------------------------------VĂN BẢN ADD ------------------------------------>
<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_add_vanban" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="post" id="form_add_vanban">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Thêm mới Văn Bản Xử Lý</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label>Tên Giảng Viên: <span class="required">*</span></label>
                                    <select class="form-control" name="id_giangvien">
                                        <option value="0">-------- Chọn Giảng Viên --------</option>
                                            @if($giangvien->count()>0)
                                                @foreach($giangvien as $v)
                                                    <option value="{{ $v->id }}"  <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->ten }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nội Dung<span class="required">*</span></label>
                                    <input  name="noi_dung" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Lãnh Đạo Xử Lý:<span class="required">*</span></label>
                                    <input name="lanhdao" type="text" class="form-control" required>
                                </div> 
                               
                                <div class="form-group">
                                    <label>Thời Gian Nhận:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian_den" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Hạn:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian_nhan" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required">*</span></label>
                                    <input name="ghichu" type="text" class="form-control" required>
                                </div> 

                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_add_vanban"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_edit_vanban" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="form_edit_vanban">
                @csrf
                <input value="" name="id" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Chỉnh sửa Thông Tin Văn Bản Xử Lý</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label>Tên Giảng Viên:<span class="required">*</span></label>
                                    <select class="form-control" name="id_giangvien">
                                    <option name="gv_hientai"></option>
                                            @if($giangvien->count()>0)
                                                @foreach($giangvien as $v)
                                                    <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->ten }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nội Dung<span class="required">*</span></label>
                                    <input  name="noi_dung" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Lãnh Đạo Xử Lý:<span class="required">*</span></label>
                                    <input name="lanhdao" type="text" class="form-control" required>
                                </div> 
                               
                                <div class="form-group">
                                    <label>Thời Gian Nhận:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian_den" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Hạn:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian_nhan" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required">*</span></label>
                                    <input name="ghichu" type="text" class="form-control" required>
                                </div> 
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_edit_vanban"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- -------------------------------------END VĂN BẢn ADD -------------------------------------->
<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_add_dang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="post" id="form_add_dang">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Thêm mới Hoạt Động Đảng Đoàn</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                               
                                <div class="form-group">
                                    <label>Tên Giảng Viên:<span class="required">*</span></label>
                                    <select class="form-control" name="id_giangvien">
                                        <option name="gv_hientai">Chọn Giảng Viên</option>
                                            @if($giangvien->count()>0)
                                                @foreach($giangvien as $v)
                                                    <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->ten }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tên Hoạt Động:<span class="required">*</span></label>
                                    <input class="form-control" name="ten" type="text" required />
                                </div>
                                <div class="form-group">
                                    <label>Kết Quả:<span class="required">*</span></label>
                                    <input class="form-control" name="ket_qua" type="text" required />
                                </div>
                                <div class="form-group">
                                    <label>Vai Trò:<span class="required">*</span></label>
                                    <input class="form-control" name="vai_tro" type="text" required />
                                </div>
                                <div class="form-group">
                                    <label>Thời Gian:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required">*</span></label>
                                    <input class="form-control" name="ghichu" type="text" required />
                                </div>

                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_add_dang"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_edit_dang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="form_edit_dang">
                @csrf
                <input value="" name="id" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Chỉnh sửa Hoạt Động Đảng Đoàn</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label>Tên Giảng Viên:<span class="required">*</span></label>
                                    <select class="form-control" name="id_giangvien">
                                        <option name="gv_hientai"></option>
                                            @if($giangvien->count()>0)
                                                @foreach($giangvien as $v)
                                                    <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->ten }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tên Hoạt Động:<span class="required">*</span></label>
                                    <input class="form-control" name="ten" type="text" required />
                                </div>
                                <div class="form-group">
                                    <label>Kết Quả:<span class="required">*</span></label>
                                    <input class="form-control" name="ket_qua" type="text" required />
                                </div>
                                <div class="form-group">
                                    <label>Vai Trò:<span class="required">*</span></label>
                                    <input class="form-control" name="vai_tro" type="text" required />
                                </div>
                                <div class="form-group">
                                    <label>Thời Gian:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required">*</span></label>
                                    <input class="form-control" name="ghichu" type="text" required />
                                </div>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_edit_dang"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

 {{-- END ĐẢNG ĐOÀN --}}

<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_add_daygioi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="post" id="form_add_daygioi">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Thêm mới Dạy Giỏi</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label>Tên Dạy Giỏi: <span class="required">*</span></label>
                                    <input  name="ten" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Tên Giảng Viên: <span class="required">*</span></label>
                                    <select class="form-control" name="id_giangvien">
                                        <option name="gv_hientai">Chọn Giảng Viên</option>
                                            @if($giangvien->count()>0)
                                                @foreach($giangvien as $v)
                                                    <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->ten }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                                 
                                <div class="form-group">
                                    <label class="control-label col-md-4">Cấp:</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" name="cap">
                                                <option value="0">-------- Chọn Cấp --------</option>
                                                <option value="{{1}}">Cấp Khoa</option>
                                                <option value="{{2}}">Cấp Học Viện</option>
                                                <option value="{{3}}">Cấp Bộ</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Thời Gian:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian" type="date" required />
                                </div>
                                <div class="form-group">
                                    <label>Số Giờ:<span class="required">*</span></label>
                                    <input name="so_gio" type="number" class="form-control" required>
                                </div> 
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required">*</span></label>
                                    <input name="ghichu" type="text" class="form-control" required>
                                </div> 
                               

                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_add_daygioi"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_edit_daygioi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="form_edit_daygioi">
                @csrf
                <input value="" name="id" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Chỉnh sửa Dạy Giỏi</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label>Tên Dạy Giỏi:<span class="required">*</span></label>
                                    <input value="" name="ten" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Tên Giảng Viên:<span class="required">*</span></label>
                                    <select class="form-control" name="id_giangvien">
                                        <option name="gv_hientai"></option>
                                            @if($giangvien->count()>0)
                                                @foreach($giangvien as $v)
                                                    <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->ten }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                               
                               
                                <div class="form-group">
                                    <label class="control-label col-md-4">Cấp:</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" name="cap">
                                                <option value="0">-------- Chọn Cấp --------</option>
                                                <option value="{{1}}">Cấp Khoa</option>
                                                <option value="{{2}}">Cấp Học Viện</option>
                                                <option value="{{3}}">Cấp Bộ</option>
                                            </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Thời Gian:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian" id="thoigian" type="date" value="" required />
                                </div>
                                <div class="form-group">
                                    <label>Số Giờ:<span class="required">*</span></label>
                                    <input value="" name="so_gio" type="number" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required">*</span></label>
                                    <input value="" name="ghichu" type="text" class="form-control" required>
                                </div>

                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_edit_daygioi"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
{{-- END DẠY GIỎI  --}}

<!-- /.modal Cuộc Họp -->
<div class="modal fade bs-modal-lg" id="modal_add_hop" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="post" id="form_add_hop">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Thêm mới Cuộc Họp</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên Cuộc Họp: <span class="required">*</span></label>
                                    <input  name="ten" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Tên Giảng Viên: <span class="required">*</span></label>
                                    <select class="form-control" name="id_giangvien">
                                        <option name="gv_hientai"></option>
                                            @if($giangvien->count()>0)
                                                @foreach($giangvien as $v)
                                                    <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->ma_giangvien.'-'.$v->ten }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Số Giờ:<span class="required">*</span></label>
                                    <input name="so_gio" type="number" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Thời Gian:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required">*</span></label>
                                    <input name="ghichu" type="text" class="form-control" required>
                                </div>


                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_add_hop"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_edit_hop" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="form_edit_hop">
                @csrf
                <input value="" name="id" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Chỉnh sửa Thông Tin Cuộc Họp</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên Cuộc Họp<span class="required">*</span></label>
                                    <input value="" name="ten" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Tên Giảng Viên:<span class="required">*</span></label>
                                    <select class="form-control" name="id_giangvien">
                                        <option name="gv_hientai"></option>
                                            @if($giangvien->count()>0)
                                                @foreach($giangvien as $v)
                                                    <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->ma_giangvien.'-'.$v->ten }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Số Giờ:<span class="required">*</span></label>
                                    <input name="so_gio" type="number" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Thời Gian:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required">*</span></label>
                                    <input name="ghichu" type="text" class="form-control" required>
                                </div>

                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_edit_hop"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

{{-- END Cuộc Họp  --}}

<!-- /.modal Hướng Dẫn Khoa Học-->
<div class="modal fade bs-modal-lg" id="modal_add_hdkh" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="post" id="form_add_hdkh">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Thêm mới Hướng Dẫn Khoa Học </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label>Tên Giảng Viên: <span class="required">*</span></label>
                                    <select class="form-control" name="id_giangvien">
                                        <option name="gv_hientai"></option>
                                            @if($giangvien->count()>0)
                                                @foreach($giangvien as $v)
                                                    <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->ma_giangvien.'-'.$v->ten }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label><b>Loại Hướng Dẫn</b></label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="khoa_luan" name="khoa_luan">
                                        <label class="form-check-label" for="khoa_luan">Khóa Luận:</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="luan_van" name="luan_van">
                                        <label class="form-check-label" for="luan_van">Luận Văn:</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="luan_an" name="luan_an">
                                        <label class="form-check-label" for="luan_an">Luận Án:</label>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label>Học Viên: <span class="required">*</span></label>
                                    <input  name="hoc_vien" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Khóa: <span class="required">*</span></label>
                                    <input  name="khoa" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Số Giờ: <span class="required">*</span></label>
                                    <input  name="so_gio" type="number" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required">*</span></label>
                                    <input name="ghichu" type="text" class="form-control" required>
                                </div> 

                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_add_hdkh"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_edit_hdkh" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="form_edit_hdkh">
                @csrf
                <input value="" name="id" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Chỉnh sửa Thông Tin Hướng Dẫn Khoa Học</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                               
                                <div class="form-group">
                                    <label>Tên Giảng Viên:<span class="required">*</span></label>
                                    <select class="form-control" name="id_giangvien">
                                        <option name="gv_hientai"></option>
                                            @if($giangvien->count()>0)
                                                @foreach($giangvien as $v)
                                                    <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->ma_giangvien.'-'.$v->ten }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label><b>Loại Hướng Dẫn</b></label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="khoa_luan" name="khoa_luan">
                                        <label class="form-check-label" for="khoa_luan">Khóa Luận:</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="luan_van" name="luan_van">
                                        <label class="form-check-label" for="luan_van">Luận Văn:</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="luan_an" name="luan_an">
                                        <label class="form-check-label" for="luan_an">Luận Án:</label>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label>Học Viên: <span class="required">*</span></label>
                                    <input  name="hoc_vien" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Khóa: <span class="required">*</span></label>
                                    <input  name="khoa" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Số Giờ: <span class="required">*</span></label>
                                    <input  name="so_gio" type="number" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required">*</span></label>
                                    <input name="ghichu" type="text" class="form-control" required>
                                </div> 

                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_edit_hdkh"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal  Hướng Dẫn Khoa Học-->

<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_add_hoctap" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="post" id="form_add_hoctap">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Thêm mới Học Tập</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label>Tên Giảng Viên: <span class="required">*</span></label>
                                    <select class="form-control" name="id_giangvien">
                                        <option name="gv_hientai"></option>
                                            @if($giangvien->count()>0)
                                                @foreach($giangvien as $v)
                                                    <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->ten }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tên Lớp: <span class="required">*</span></label>
                                    <input  name="ten" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Loại Hình: <span class="required">*</span></label>
                                    <input  name="loai_hinh" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Số Giờ: <span class="required">*</span></label>
                                    <input  name="so_gio" type="number" class="form-control" required>
                                </div>
                                
                               
                                <div class="form-group">
                                    <label>Bắt Đầu:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Kết Thúc:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian_den" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required">*</span></label>
                                    <input name="ghichu" type="text" class="form-control" required>
                                </div> 

                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_add_hoctap"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_edit_hoctap" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="form_edit_hoctap">
                @csrf
                <input value="" name="id" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Chỉnh sửa Học Tập</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label>Tên Giảng Viên:<span class="required">*</span></label>
                                    <select class="form-control" name="id_giangvien">
                                        <option name="gv_hientai"></option>
                                            @if($giangvien->count()>0)
                                                @foreach($giangvien as $v)
                                                    <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->ten }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tên Lớp: <span class="required">*</span></label>
                                    <input  name="ten" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Loại Hình: <span class="required">*</span></label>
                                    <input  name="loai_hinh" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Số Giờ: <span class="required">*</span></label>
                                    <input  name="so_gio" type="number" class="form-control" required>
                                </div>
                                
                               
                                <div class="form-group">
                                    <label>Bắt Đầu:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Kết Thúc:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian_den" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required">*</span></label>
                                    <input name="ghichu" type="text" class="form-control" required>
                                </div> 

                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_edit_hoctap"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_add_xaydung" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="post" id="form_add_xaydung">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Thêm mới Xây Dựng Chương Trình</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label>Tên Giảng Viên: <span class="required">*</span></label>
                                    <select class="form-control" name="id_giangvien">
                                        <option name="gv_hientai"></option>
                                            @if($giangvien->count()>0)
                                                @foreach($giangvien as $v)
                                                    <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->ten }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tên Chương Trình: <span class="required">*</span></label>
                                    <input  name="ten" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Học Phần:<span class="required">*</span></label>
                                    <input name="hocphan" type="text" class="form-control" required>
                                </div> 
                                <div class="form-group">
                                    <label>Khóa:<span class="required">*</span></label>
                                    <input name="khoa" type="text" class="form-control" required>
                                </div> 
                                <div class="form-group">
                                    <label>Vai Trò:<span class="required">*</span></label>
                                    <input name="vai_tro" type="text" class="form-control" required>
                                </div> 
                                
                               
                                <div class="form-group">
                                    <label>Thời Gian:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required">*</span></label>
                                    <input name="ghichu" type="text" class="form-control" required>
                                </div> 

                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_add_xaydung"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_edit_xaydung" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="form_edit_xaydung">
                @csrf
                <input value="" name="id" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Chỉnh sửa Xây Dựng</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label>Tên Giảng Viên:<span class="required">*</span></label>
                                    <select class="form-control" name="id_giangvien">
                                        <option name="gv_hientai"></option>
                                            @if($giangvien->count()>0)
                                                @foreach($giangvien as $v)
                                                    <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->ten }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tên Chương Trình: <span class="required">*</span></label>
                                    <input  name="ten" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Học Phần:<span class="required">*</span></label>
                                    <input name="hocphan" type="text" class="form-control" required>
                                </div> 
                                <div class="form-group">
                                    <label>Khóa:<span class="required">*</span></label>
                                    <input name="khoa" type="text" class="form-control" required>
                                </div> 
                                <div class="form-group">
                                    <label>Vai Trò:<span class="required">*</span></label>
                                    <input name="vai_tro" type="text" class="form-control" required>
                                </div> 
                               
                               
                                <div class="form-group">
                                    <label>Thời Gian:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian" id="thoigian" type="date" placeholder="dd-mm-yyyy" value="" required />
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required">*</span></label>
                                    <input value="" name="ghichu" type="text" class="form-control" required>
                                </div>

                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_edit_xaydung"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@endsection

@section('script')
<script>
    $(document).ready(function()
    {

       
        // Reload trang và giữ nguyên tab đã active
        var activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            $('a[href="' + activeTab + '"]').tab('show');
            localStorage.removeItem('activeTab');
        }
        // END Reload trang và giữ nguyên tab đã active
         // Ajax thêm Công Tác
         $("#btn_add_congtac").on('click', function(e){

        e.preventDefault();
        $("#btn_add_congtac").attr("disabled", "disabled");
        $("#btn_add_congtac").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
        $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
        $.ajax({
            url: '{{route('postThemCongTac')}}',
            method: 'POST',
            data: {
                id_giangvien: $("#form_add_congtac select[name='id_giangvien']").val(),
                ten: $("#form_add_congtac input[name='ten']").val(),
                so_gio: $("#form_add_congtac input[name='so_gio']").val(),
                thoigian: $("#form_add_congtac input[name='thoigian']").val(),
                ghichu: $("#form_add_congtac input[name='ghichu']").val(),
            },
            success: function(data) {
                console.log("Hihi");
                $("#btn_add_congtac").removeAttr("disabled");
                $("#btn_add_congtac").html('<i class="fa fa-save"></i> Lưu');
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
                    $('#modal_add_congtac').modal('hide');
                    swal({
                        "title":"Đã tạo!",
                        "text":"Bạn đã tạo thành công Đi Thực Tế!",
                        "type":"success"
                    }, function() {
                            localStorage.setItem('activeTab', '#tab3');
                            location.reload();
                        }
                    );
                }
            }
        });
    });
    // END Ajax thêm congtac
    //AJAX Tìm congtac Theo ID
         $(".btn_edit_congtac").on("click", function(e){
             e.preventDefault();
             var congtac_id = $(this).data("congtac-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '{{ route('postTimCongTacTheoId') }}',
                 method: 'POST',
                 data: {
                     id: congtac_id
                 },
                 success: function(data) {
                     if(data.status == true){
                         // console.log(data.data);
                         $("#form_edit_congtac select[name='id_giangvien']").val(data.data.id_giangvien);
                         $("#form_edit_congtac input[name='id']").val(data.data.id);
                         $("#form_edit_congtac input[name='ten']").val(data.data.ten);
                         $("#form_edit_congtac input[name='so_gio']").val(data.data.so_gio);
                         $("#form_edit_congtac input[name='thoigian']").val(data.data.thoigian);
                         $("#form_edit_congtac input[name='ghichu']").val(data.data.ghichu);
                         $('#modal_edit_congtac').modal('show');
                     }
                 }
             });
         });
         // END Khi click vào nút sửa congtac, tìm congtac theo id và đỗ dữ liệu vào form


         // Ajax sửa congtac
         $("#btn_edit_congtac").on('click', function(e){
             e.preventDefault();
             $("#btn_edit_congtac").attr("disabled", "disabled");
             $("#btn_edit_congtac").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '{{ route('postSuaCongTac') }}',
                 method: 'POST',
                 data: {
                     id: $("#form_edit_congtac input[name='id']").val(),
                     id_giangvien: $("#form_edit_congtac select[name='id_giangvien']").val(),
                     ten: $("#form_edit_congtac input[name='ten']").val(),
                     so_gio: $("#form_edit_congtac input[name='so_gio']").val(),
                     thoigian: $("#form_edit_congtac input[name='thoigian']").val(),
                     ghichu: $("#form_edit_congtac input[name='ghichu']").val(),

                 },
                 success: function(data) {
                     $("#btn_edit_congtac").removeAttr("disabled");
                     $("#btn_edit_congtac").html('<i class="fa fa-save"></i> Lưu');
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
                         $('#modal_edit_congtac').modal('hide');
                         swal({
                             "title":"Đã sửa!",
                             "text":"Bạn đã sửa thành công Đi Thực Tế!",
                             "type":"success"
                         }, function() {
                                 localStorage.setItem('activeTab', '#tab3');
                                 location.reload();
                             }
                         );
                     }
                 }
             });
         });
         // END Ajax sửa congtac

         // Xử lý khi click nút xóa congtac
         $(".btn_delete_congtac").on("click", function(e){
             e.preventDefault();
             var congtac_id = $(this).data("congtac-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             swal({
                 title: "Xóa Hoạt động Thực tế này?",
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
                             url: '{{ route('postXoaCongTac') }}',
                             method: 'POST',
                             data: {
                                 id: congtac_id
                             },
                             success: function(data) {
                                 console.log(data);
                                 if(data.status == true){
                                     swal({
                                         "title":"Đã xóa!",
                                         "text":"Bạn đã xóa thành công Đi Thực Tế!",
                                         "type":"success"
                                     }, function() {
                                             localStorage.setItem('activeTab', '#tab3');
                                             location.reload();
                                         }
                                     );
                                 }
                             }
                         });
                     }
             });

         });
         // END Xử lý khi click nút xóa congtac

         // ==================================================================//

          // Ajax thêm Văn Bản Xử Lý
          $("#btn_add_vanban").on('click', function(e){

e.preventDefault();
$("#btn_add_vanban").attr("disabled", "disabled");
$("#btn_add_vanban").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
$.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
$.ajax({
    url: '{{route('postThemVanBan')}}',
    method: 'POST',
    data: {
        id_giangvien: $("#form_add_vanban select[name='id_giangvien']").val(),
                noi_dung: $("#form_add_vanban input[name='noi_dung']").val(),
                lanhdao: $("#form_add_vanban input[name='lanhdao']").val(),
                thoigian_nhan: $("#form_add_vanban input[name='thoigian_nhan']").val(),
                thoigian_den: $("#form_add_vanban input[name='thoigian_den']").val(),
                ghichu: $("#form_add_vanban input[name='ghichu']").val(),
    },
    success: function(data) {
        console.log("Hihi");
        $("#btn_add_vanban").removeAttr("disabled");
        $("#btn_add_vanban").html('<i class="fa fa-save"></i> Lưu');
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
            $('#modal_add_vanban').modal('hide');
            swal({
                "title":"Đã tạo!",
                "text":"Bạn đã tạo thành công Văn Bản Xử Lý!",
                "type":"success"
            }, function() {
                    localStorage.setItem('activeTab', '#tab_vanban');
                    location.reload();
                }
            );
        }
    }
});
});
// END Ajax thêm vanban
//AJAX Tìm vanban Theo ID
 $(".btn_edit_vanban").on("click", function(e){
     e.preventDefault();
     var vanban_id = $(this).data("vanban-id");
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     $.ajax({
         url: '{{ route('postTimVanBanTheoId') }}',
         method: 'POST',
         data: {
             id: vanban_id
         },
         success: function(data) {
             if(data.status == true){
                 // console.log(data.data);
                 $("#form_edit_vanban select[name='id_giangvien']").val(data.data.id_giangvien);
                         $("#form_edit_vanban input[name='id']").val(data.data.id);
                         $("#form_edit_vanban input[name='noi_dung']").val(data.data.noi_dung);
                         $("#form_edit_vanban input[name='lanhdao']").val(data.data.lanhdao);
                         $("#form_edit_vanban input[name='thoigian_nhan']").val(data.data.thoigian_nhan);
                         $("#form_edit_vanban input[name='thoigian_den']").val(data.data.thoigian_den);
                         $("#form_edit_vanban input[name='ghichu']").val(data.data.ghichu);
                         $('#modal_edit_vanban').modal('show');
             }
         }
     });
 });
 // END Khi click vào nút sửa vanban, tìm vanban theo id và đỗ dữ liệu vào form


 // Ajax sửa vanban
 $("#btn_edit_vanban").on('click', function(e){
     e.preventDefault();
     $("#btn_edit_vanban").attr("disabled", "disabled");
     $("#btn_edit_vanban").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     $.ajax({
         url: '{{ route('postSuaVanBan') }}',
         method: 'POST',
         data: {
            id: $("#form_edit_vanban input[name='id']").val(),
                     id_giangvien: $("#form_edit_vanban select[name='id_giangvien']").val(),
                     noi_dung: $("#form_edit_vanban input[name='noi_dung']").val(),
                     lanhdao: $("#form_edit_vanban input[name='lanhdao']").val(),
                     thoigian_den: $("#form_edit_vanban input[name='thoigian_den']").val(),
                     thoigian_nhan: $("#form_edit_vanban input[name='thoigian_nhan']").val(),
                     ghichu: $("#form_edit_vanban input[name='ghichu']").val(),

         },
         success: function(data) {
             $("#btn_edit_vanban").removeAttr("disabled");
             $("#btn_edit_vanban").html('<i class="fa fa-save"></i> Lưu');
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
                 $('#modal_edit_vanban').modal('hide');
                 swal({
                     "title":"Đã sửa!",
                     "text":"Bạn đã sửa thành công Văn Bản!",
                     "type":"success"
                 }, function() {
                         localStorage.setItem('activeTab', '#tab_vanban');
                         location.reload();
                     }
                 );
             }
         }
     });
 });
 // END Ajax sửa vanban

 // Xử lý khi click nút xóa vanban
 $(".btn_delete_vanban").on("click", function(e){
     e.preventDefault();
     var vanban_id = $(this).data("vanban-id");
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     swal({
         title: "Xóa Văn Bản này?",
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
                     url: '{{ route('postXoaVanBan') }}',
                     method: 'POST',
                     data: {
                         id: vanban_id
                     },
                     success: function(data) {
                         console.log(data);
                         if(data.status == true){
                             swal({
                                 "title":"Đã xóa!",
                                 "text":"Bạn đã xóa thành công Văn Bản!",
                                 "type":"success"
                             }, function() {
                                     localStorage.setItem('activeTab', '#tab_vanban');
                                     location.reload();
                                 }
                             );
                         }
                     }
                 });
             }
     });

 });
 // END Xử lý khi click nút xóa vanban

 // ==================================================================//


         // Ajax thêm Chấm Bài
         $("#btn_add_chambai").on('click', function(e){

        e.preventDefault();
        $("#btn_add_chambai").attr("disabled", "disabled");
        $("#btn_add_chambai").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
        $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
        $.ajax({

            url: '{{route('postThemChamBai')}}',
            method: 'POST',
            data: {
                id_giangvien: $("#form_add_chambai select[name='id_giangvien']").val(),
                id_lop: $("#form_add_chambai select[name='id_lop']").val(),
                id_hocphan: $("#form_add_chambai select[name='id_hocphan']").val(),
                ghichu: $("#form_add_chambai input[name='ghichu']").val(),
                so_bai: $("#form_add_chambai input[name='so_bai']").val(),
                so_gio: $("#form_add_chambai input[name='so_gio']").val(),
                thoigian: $("#form_add_chambai input[name='thoigian']").val(),
            },
            success: function(data) {
                console.log("Hihi");
                $("#btn_add_chambai").removeAttr("disabled");
                $("#btn_add_chambai").html('<i class="fa fa-save"></i> Lưu');
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
                    $('#modal_add_chambai').modal('hide');
                    swal({
                        "title":"Đã tạo!",
                        "text":"Bạn đã tạo thành công Chấm Bài!",
                        "type":"success"
                    }, function() {
                            localStorage.setItem('activeTab', '#tab4');
                            location.reload();
                        }
                    );
                }
            }
        });
    });
    // END Ajax thêm Chấm Bài
    //AJAX Tìm Chấm Bài Theo ID
         $(".btn_edit_chambai").on("click", function(e){
             e.preventDefault();
             var chambai_id = $(this).data("chambai-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '{{ route('postTimChamBaiTheoId') }}',
                 method: 'POST',
                 data: {
                     id: chambai_id
                 },
                 success: function(data) {
                     if(data.status == true){
                         $("#form_edit_chambai select[name='id_giangvien']").val(data.data.id_giangvien);
                         $("#form_edit_chambai select[name='id_lop']").val(data.data.id_lop);
                         $("#form_edit_chambai select[name='id_hocphan']").val(data.data.id_hocphan);
                         $("#form_edit_chambai input[name='id']").val(data.data.id);
                         $("#form_edit_chambai input[name='ghichu']").val(data.data.ghichu);
                         $("#form_edit_chambai input[name='so_gio']").val(data.data.so_gio);
                         $("#form_edit_chambai input[name='so_bai']").val(data.data.so_bai);
                         $("#form_edit_chambai input[name='thoigian']").val(data.data.thoigian);
                         $('#modal_edit_chambai').modal('show');
                     }
                 }
             });
         });
         // END Khi click vào nút sửa chấm Bài, tìm chấm Bài theo id và đỗ dữ liệu vào form


         // Ajax sửa chấm bài
         $("#btn_edit_chambai").on('click', function(e){
             e.preventDefault();
             $("#btn_edit_chambai").attr("disabled", "disabled");
             $("#btn_edit_chambai").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '{{ route('postSuaChamBai') }}',
                 method: 'POST',
                 data: {
                    id: $("#form_edit_chambai input[name='id']").val(),
                     id_giangvien: $("#form_edit_chambai select[name='id_giangvien']").val(),
                     id_lop: $("#form_edit_chambai select[name='id_lop']").val(),
                     id_hocphan: $("#form_edit_chambai select[name='id_hocphan']").val(),
                     ghichu: $("#form_edit_chambai input[name='ghichu']").val(),
                     so_gio: $("#form_edit_chambai input[name='so_gio']").val(),
                     so_bai: $("#form_edit_chambai input[name='so_bai']").val(),
                     thoigian: $("#form_edit_chambai input[name='thoigian']").val(),

                 },
                 success: function(data) {
                     $("#btn_edit_chambai").removeAttr("disabled");
                     $("#btn_edit_chambai").html('<i class="fa fa-save"></i> Lưu');
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
                         $('#modal_edit_chambai').modal('hide');
                         swal({
                             "title":"Đã sửa!",
                             "text":"Bạn đã sửa thành công Chấm Bài!",
                             "type":"success"
                         }, function() {
                                 localStorage.setItem('activeTab', '#tab4');
                                 location.reload();
                             }
                         );
                     }
                 }
             });
         });
         // END Ajax sửa chấm Bài

         // Xử lý khi click nút xóa chấm Bài
         $(".btn_delete_chambai").on("click", function(e){
             e.preventDefault();
             var chambai_id = $(this).data("chambai-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             swal({
                 title: "Xóa Chấm Bài này?",
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
                             url: '{{ route('postXoaChamBai') }}',
                             method: 'POST',
                             data: {
                                 id: chambai_id
                             },
                             success: function(data) {
                                 console.log(data);
                                 if(data.status == true){
                                     swal({
                                         "title":"Đã xóa!",
                                         "text":"Bạn đã xóa thành công Chấm Bài!",
                                         "type":"success"
                                     }, function() {
                                             localStorage.setItem('activeTab', '#tab4');
                                             location.reload();
                                         }
                                     );
                                 }
                             }
                         });
                     }
             });

         });
         // END Xử lý khi click nút xóa chấm Bài
// ========================================================================

         // Ajax thêm Đảng
    $("#btn_add_dang").on('click', function(e){

        e.preventDefault();
        $("#btn_add_dang").attr("disabled", "disabled");
        $("#btn_add_dang").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
        $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
        $.ajax({

            url: '{{route('postThemDang')}}',
            method: 'POST',
            data: {
                id_giangvien: $("#form_add_dang select[name='id_giangvien']").val(),
                ten: $("#form_add_dang input[name='ten']").val(),
                thoigian: $("#form_add_dang input[name='thoigian']").val(),
                ket_qua: $("#form_add_dang input[name='ket_qua']").val(),
                vai_tro: $("#form_add_dang input[name='vai_tro']").val(),
                ghichu: $("#form_add_dang input[name='ghichu']").val(),
            },
            success: function(data) {
                console.log("Hihi");
                $("#btn_add_dang").removeAttr("disabled");
                $("#btn_add_dang").html('<i class="fa fa-save"></i> Lưu');
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
                    $('#modal_add_dang').modal('hide');
                    swal({
                        "title":"Đã tạo!",
                        "text":"Bạn đã tạo thành công Hoạt Động!",
                        "type":"success"
                    }, function() {
                            localStorage.setItem('activeTab', '#tab5');
                            location.reload();
                        }
                    );
                }
            }
        });
    });
    // END Ajax thêm dang
    //AJAX Tìm dang Theo ID
         $(".btn_edit_dang").on("click", function(e){
             e.preventDefault();
             var dang_id = $(this).data("dang-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '{{ route('postTimDangTheoId') }}',
                 method: 'POST',
                 data: {
                     id: dang_id
                 },
                 success: function(data) {
                     if(data.status == true){
                         // console.log(data.data);
                         $("#form_edit_dang select[name='id_giangvien']").val(data.data.id_giangvien);
                         $("#form_edit_dang input[name='id']").val(data.data.id);
                         $("#form_edit_dang input[name='ten']").val(data.data.ten);
                         $("#form_edit_dang input[name='thoigian']").val(data.data.thoigian);
                         $("#form_edit_dang input[name='vai_tro']").val(data.data.vai_tro);
                         $("#form_edit_dang input[name='ket_qua']").val(data.data.ket_qua);
                         $("#form_edit_dang input[name='ghichu']").val(data.data.ghichu);
                         $('#modal_edit_dang').modal('show');
                     }
                 }
             });
         });
         // END Khi click vào nút sửa dang, tìm dang theo id và đỗ dữ liệu vào form


         // Ajax sửa dang
         $("#btn_edit_dang").on('click', function(e){
             e.preventDefault();
             $("#btn_edit_dang").attr("disabled", "disabled");
             $("#btn_edit_dang").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '{{ route('postSuaDang') }}',
                 method: 'POST',
                 data: {
                    id: $("#form_edit_dang input[name='id']").val(),
                     id_giangvien: $("#form_edit_dang select[name='id_giangvien']").val(),
                     ten: $("#form_edit_dang input[name='ten']").val(),
                     thoigian: $("#form_edit_dang input[name='thoigian']").val(),
                     ket_qua: $("#form_edit_dang input[name='ket_qua']").val(),
                     vai_tro: $("#form_edit_dang input[name='vai_tro']").val(),
                     ghichu: $("#form_edit_dang input[name='ghichu']").val(),
                 },
                 success: function(data) {
                     $("#btn_edit_dang").removeAttr("disabled");
                     $("#btn_edit_dang").html('<i class="fa fa-save"></i> Lưu');
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
                         $('#modal_edit_dang').modal('hide');
                         swal({
                             "title":"Đã sửa!",
                             "text":"Bạn đã sửa thành công hoạt động Đảng!",
                             "type":"success"
                         }, function() {
                                 localStorage.setItem('activeTab', '#tab5');
                                 location.reload();
                             }
                         );
                     }
                 }
             });
         });
         // END Ajax sửa dang

         // Xử lý khi click nút xóa dang
         $(".btn_delete_dang").on("click", function(e){
             e.preventDefault();
             var dang_id = $(this).data("dang-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             swal({
                 title: "Xóa Hoạt động Đảng này?",
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
                             url: '{{ route('postXoaDang') }}',
                             method: 'POST',
                             data: {
                                 id: dang_id
                             },
                             success: function(data) {
                                 console.log(data);
                                 if(data.status == true){
                                     swal({
                                         "title":"Đã xóa!",
                                         "text":"Bạn đã xóa thành công Hoạt Động Đảng!",
                                         "type":"success"
                                     }, function() {
                                             localStorage.setItem('activeTab', '#tab5');
                                             location.reload();
                                         }
                                     );
                                 }
                             }
                         });
                     }
             });

         });
         // END Xử lý khi click nút xóa dang
 // ==================================================================//

         // Ajax thêm Dạy Giỏi
    $("#btn_add_daygioi").on('click', function(e){
        e.preventDefault();
        $("#btn_add_daygioi").attr("disabled", "disabled");
        $("#btn_add_daygioi").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
        $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
        $.ajax({

            url: '{{route('postThemDayGioi')}}',
            method: 'POST',
            data: {
                id_giangvien: $("#form_add_daygioi select[name='id_giangvien']").val(),
                ten: $("#form_add_daygioi input[name='ten']").val(),
                ghichu: $("#form_add_daygioi input[name='ghichu']").val(),
                thoigian: $("#form_add_daygioi input[name='thoigian']").val(),
                so_gio: $("#form_add_daygioi input[name='so_gio']").val(),
                cap: $("#form_add_daygioi select[name='cap']").val(),
            },
            success: function(data) {
                console.log("Hihi");
                $("#btn_add_daygioi").removeAttr("disabled");
                $("#btn_add_daygioi").html('<i class="fa fa-save"></i> Lưu');
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
                    $('#modal_add_daygioi').modal('hide');
                    swal({
                        "title":"Đã tạo!",
                        "text":"Bạn đã tạo thành công Hoạt Động Dạy Giỏi!",
                        "type":"success"
                    }, function() {
                            localStorage.setItem('activeTab', '#tab6');
                            location.reload();
                        }
                    );
                }
            }
        });
    });
    // END Ajax thêm daygioi
    //AJAX Tìm daygioi Theo ID
         $(".btn_edit_daygioi").on("click", function(e){
             e.preventDefault();
             var daygioi_id = $(this).data("daygioi-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '{{ route('postTimDayGioiTheoId') }}',
                 method: 'POST',
                 data: {
                     id: daygioi_id
                 },
                 success: function(data) {
                     if(data.status == true){
                         // console.log(data.data);
                         $("#form_edit_daygioi select[name='id_giangvien']").val(data.data.id_giangvien);
                         $("#form_edit_daygioi input[name='id']").val(data.data.id);
                         $("#form_edit_daygioi input[name='ten']").val(data.data.ten);
                         $("#form_edit_daygioi input[name='ghichu']").val(data.data.ghichu);
                         $("#form_edit_daygioi input[name='thoigian']").val(data.data.thoigian);
                         $("#form_edit_daygioi input[name='so_gio']").val(data.data.so_gio);
                         $("#form_edit_daygioi select[name='cap']").val(data.data.cap);
                         $('#modal_edit_daygioi').modal('show');
                     }
                 }
             });
         });
         // END Khi click vào nút sửa daygioi, tìm daygioi theo id và đỗ dữ liệu vào form


         // Ajax sửa daygioi
         $("#btn_edit_daygioi").on('click', function(e){
             e.preventDefault();
             $("#btn_edit_daygioi").attr("disabled", "disabled");
             $("#btn_edit_daygioi").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '{{ route('postSuaDayGioi') }}',
                 method: 'POST',
                 data: {
                     id: $("#form_edit_daygioi input[name='id']").val(),
                     id_giangvien: $("#form_edit_daygioi select[name='id_giangvien']").val(),
                     ten: $("#form_edit_daygioi input[name='ten']").val(),
                     ghichu: $("#form_edit_daygioi input[name='ghichu']").val(),
                     thoigian: $("#form_edit_daygioi input[name='thoigian']").val(),
                     so_gio: $("#form_edit_daygioi input[name='so_gio']").val(),
                     cap: $("#form_edit_daygioi select[name='cap']").val(),

                 },
                 success: function(data) {
                     $("#btn_edit_daygioi").removeAttr("disabled");
                     $("#btn_edit_daygioi").html('<i class="fa fa-save"></i> Lưu');
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
                         $('#modal_edit_daygioi').modal('hide');
                         swal({
                             "title":"Đã sửa!",
                             "text":"Bạn đã sửa thành công Hoạt Động Dạy Giỏi!",
                             "type":"success"
                         }, function() {
                                 localStorage.setItem('activeTab', '#tab6');
                                 location.reload();
                             }
                         );
                     }
                 }
             });
         });
         // END Ajax sửa daygioi

         // Xử lý khi click nút xóa daygioi
         $(".btn_delete_daygioi").on("click", function(e){
             e.preventDefault();
             var daygioi_id = $(this).data("daygioi-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             swal({
                 title: "Xóa Dạy Giỏi này?",
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
                             url: '{{ route('postXoaDayGioi') }}',
                             method: 'POST',
                             data: {
                                 id: daygioi_id
                             },
                             success: function(data) {
                                 console.log(data);
                                 if(data.status == true){
                                     swal({
                                         "title":"Đã xóa!",
                                         "text":"Bạn đã xóa thành công Hoạt Động Dạy Giỏi!",
                                         "type":"success"
                                     }, function() {
                                             localStorage.setItem('activeTab', '#tab6');
                                             location.reload();
                                         }
                                     );
                                 }
                             }
                         });
                     }
             });

         });
         // END Xử lý khi click nút xóa daygioi
 // ==================================================================//

 // ==================================================================//

         // Ajax thêm Xây Dựng
         $("#btn_add_xaydung").on('click', function(e){
        e.preventDefault();
        $("#btn_add_xaydung").attr("disabled", "disabled");
        $("#btn_add_xaydung").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
        $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
        $.ajax({

            url: '{{route('postThemXayDung')}}',
            method: 'POST',
            data: {
                id_giangvien: $("#form_add_xaydung select[name='id_giangvien']").val(),
                ten: $("#form_add_xaydung input[name='ten']").val(),
                hocphan: $("#form_add_xaydung input[name='hocphan']").val(),
                khoa: $("#form_add_xaydung input[name='khoa']").val(),
                vai_tro: $("#form_add_xaydung input[name='vai_tro']").val(),
                ghichu: $("#form_add_xaydung input[name='ghichu']").val(),
                thoigian: $("#form_add_xaydung input[name='thoigian']").val(),
            },
            success: function(data) {
                console.log("Hihi");
                $("#btn_add_xaydung").removeAttr("disabled");
                $("#btn_add_xaydung").html('<i class="fa fa-save"></i> Lưu');
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
                    $('#modal_add_xaydung').modal('hide');
                    swal({
                        "title":"Đã tạo!",
                        "text":"Bạn đã tạo thành công Xây Dựng Chương Trình!",
                        "type":"success"
                    }, function() {
                            localStorage.setItem('activeTab', '#tab7');
                            location.reload();
                        }
                    );
                }
            }
        });
    });
    // END Ajax thêm xaydung
    //AJAX Tìm xaydung Theo ID
         $(".btn_edit_xaydung").on("click", function(e){
             e.preventDefault();
             var xaydung_id = $(this).data("xaydung-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '{{ route('postTimXayDungTheoId') }}',
                 method: 'POST',
                 data: {
                     id: xaydung_id
                 },
                 success: function(data) {
                     if(data.status == true){
                         // console.log(data.data);
                         $("#form_edit_xaydung select[name='id_giangvien']").val(data.data.id_giangvien);
                         $("#form_edit_xaydung input[name='id']").val(data.data.id);
                         $("#form_edit_xaydung input[name='ten']").val(data.data.ten);
                         $("#form_edit_xaydung input[name='hocphan']").val(data.data.hocphan);
                         $("#form_edit_xaydung input[name='khoa']").val(data.data.khoa);
                         $("#form_edit_xaydung input[name='vai_tro']").val(data.data.vai_tro);
                         $("#form_edit_xaydung input[name='ghichu']").val(data.data.ghichu);
                         $("#form_edit_xaydung input[name='thoigian']").val(data.data.thoigian);
                         $('#modal_edit_xaydung').modal('show');
                     }
                 }
             });
         });
         // END Khi click vào nút sửa xaydung, tìm xaydung theo id và đỗ dữ liệu vào form


         // Ajax sửa xaydung
         $("#btn_edit_xaydung").on('click', function(e){
             e.preventDefault();
             $("#btn_edit_xaydung").attr("disabled", "disabled");
             $("#btn_edit_xaydung").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '{{ route('postSuaXayDung') }}',
                 method: 'POST',
                 data: {
                    id: $("#form_edit_xaydung input[name='id']").val(),
                     id_giangvien: $("#form_edit_xaydung select[name='id_giangvien']").val(),
                     ten: $("#form_edit_xaydung input[name='ten']").val(),
                     hocphan: $("#form_edit_xaydung input[name='hocphan']").val(),
                     khoa: $("#form_edit_xaydung input[name='khoa']").val(),
                     vai_tro: $("#form_edit_xaydung input[name='vai_tro']").val(),
                     ghichu: $("#form_edit_xaydung input[name='ghichu']").val(),
                     thoigian: $("#form_edit_xaydung input[name='thoigian']").val(),

                 },
                 success: function(data) {
                     $("#btn_edit_xaydung").removeAttr("disabled");
                     $("#btn_edit_xaydung").html('<i class="fa fa-save"></i> Lưu');
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
                         $('#modal_edit_xaydung').modal('hide');
                         swal({
                             "title":"Đã sửa!",
                             "text":"Bạn đã sửa thành công Xây Dựng Chương Trình!",
                             "type":"success"
                         }, function() {
                                 localStorage.setItem('activeTab', '#tab7');
                                 location.reload();
                             }
                         );
                     }
                 }
             });
         });
         // END Ajax sửa xaydung

         // Xử lý khi click nút xóa xaydung
         $(".btn_delete_xaydung").on("click", function(e){
             e.preventDefault();
             var xaydung_id = $(this).data("xaydung-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             swal({
                 title: "Xóa Xây dựng Chương trình này?",
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
                             url: '{{ route('postXoaXayDung') }}',
                             method: 'POST',
                             data: {
                                 id: xaydung_id
                             },
                             success: function(data) {
                                 console.log(data);
                                 if(data.status == true){
                                     swal({
                                         "title":"Đã xóa!",
                                         "text":"Bạn đã xóa thành công Xây Dựng Chương Trình!",
                                         "type":"success"
                                     }, function() {
                                             localStorage.setItem('activeTab', '#tab7');
                                             location.reload();
                                         }
                                     );
                                 }
                             }
                         });
                     }
             });

         });
         // END Xử lý khi click nút xóa xaydung
 // ==================================================================//


  // ==================================================================//

         // Ajax thêm Cuộc Họp
         $("#btn_add_hop").on('click', function(e){
        e.preventDefault();
        $("#btn_add_hop").attr("disabled", "disabled");
        $("#btn_add_hop").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
        $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
        $.ajax({

            url: '{{route('postThemHop')}}',
            method: 'POST',
            data: {
                id_giangvien: $("#form_add_hop select[name='id_giangvien']").val(),
                ten: $("#form_add_hop input[name='ten']").val(),
                ghichu: $("#form_add_hop input[name='ghichu']").val(),
                thoigian: $("#form_add_hop input[name='thoigian']").val(),
                so_gio: $("#form_add_hop input[name='so_gio']").val(),
            },
            success: function(data) {
                console.log("Hihi");
                $("#btn_add_hop").removeAttr("disabled");
                $("#btn_add_hop").html('<i class="fa fa-save"></i> Lưu');
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
                    $('#modal_add_hop').modal('hide');
                    swal({
                        "title":"Đã tạo!",
                        "text":"Bạn đã tạo thành công Thông Tin Cuộc Họp!",
                        "type":"success"
                    }, function() {
                            localStorage.setItem('activeTab', '#tab_hop');
                            location.reload();
                        }
                    );
                }
            }
        });
    });
    // END Ajax thêm hop
    //AJAX Tìm hop Theo ID
         $(".btn_edit_hop").on("click", function(e){
             e.preventDefault();
             var hop_id = $(this).data("hop-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '{{ route('postTimHopTheoId') }}',
                 method: 'POST',
                 data: {
                     id: hop_id
                 },
                 success: function(data) {
                     if(data.status == true){
                         // console.log(data.data);
                         $("#form_edit_hop select[name='id_giangvien']").val(data.data.id_giangvien);
                         $("#form_edit_hop input[name='id']").val(data.data.id);
                         $("#form_edit_hop input[name='ten']").val(data.data.ten);
                         $("#form_edit_hop input[name='ghichu']").val(data.data.ghichu);
                         $("#form_edit_hop input[name='thoigian']").val(data.data.thoigian);
                         $("#form_edit_hop input[name='so_gio']").val(data.data.so_gio);
                         $('#modal_edit_hop').modal('show');
                     }
                 }
             });
         });
         // END Khi click vào nút sửa hop, tìm hop theo id và đỗ dữ liệu vào form


         // Ajax sửa hop
         $("#btn_edit_hop").on('click', function(e){
             e.preventDefault();
             $("#btn_edit_hop").attr("disabled", "disabled");
             $("#btn_edit_hop").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '{{ route('postSuaHop') }}',
                 method: 'POST',
                 data: {
                     id: $("#form_edit_hop input[name='id']").val(),
                     id_giangvien: $("#form_edit_hop select[name='id_giangvien']").val(),
                     ten: $("#form_edit_hop input[name='ten']").val(),
                     ghichu: $("#form_edit_hop input[name='ghichu']").val(),
                     thoigian: $("#form_edit_hop input[name='thoigian']").val(),
                     so_gio: $("#form_edit_hop input[name='so_gio']").val(),

                 },
                 success: function(data) {
                     $("#btn_edit_hop").removeAttr("disabled");
                     $("#btn_edit_hop").html('<i class="fa fa-save"></i> Lưu');
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
                         $('#modal_edit_hop').modal('hide');
                         swal({
                             "title":"Đã sửa!",
                             "text":"Bạn đã sửa thành công Thông tin Cuộc Họp!",
                             "type":"success"
                         }, function() {
                                 localStorage.setItem('activeTab', '#tab_hop');
                                 location.reload();
                             }
                         );
                     }
                 }
             });
         });
         // END Ajax sửa hop

         // Xử lý khi click nút xóa hop
         $(".btn_delete_hop").on("click", function(e){
             e.preventDefault();
             var hop_id = $(this).data("hop-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             swal({
                 title: "Xóa Cuộc Họp này?",
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
                             url: '{{ route('postXoaHop') }}',
                             method: 'POST',
                             data: {
                                 id: hop_id
                             },
                             success: function(data) {
                                 console.log(data);
                                 if(data.status == true){
                                     swal({
                                         "title":"Đã xóa!",
                                         "text":"Bạn đã xóa thành công Cuộc Họp!",
                                         "type":"success"
                                     }, function() {
                                             localStorage.setItem('activeTab', '#tab_hop');
                                             location.reload();
                                         }
                                     );
                                 }
                             }
                         });
                     }
             });

         });
         // END Xử lý khi click nút xóa hop
 // ==================================================================//

  // ==================================================================//

         // Ajax thêm Hướng Dẫn Khoa Học 
         $("#btn_add_hdkh").on('click', function(e){
        e.preventDefault();
        $("#btn_add_hdkh").attr("disabled", "disabled");
        $("#btn_add_hdkh").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
        $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
        $.ajax({

            url: '{{route('postThemHdkh')}}',
            method: 'POST',
            data: {
                id_giangvien: $("#form_add_hdkh select[name='id_giangvien']").val(),
                khoa_luan: ($("#form_add_hdkh input[name='khoa_luan']").is(':checked')) ? 1 : 0,
                luan_van: ($("#form_add_hdkh input[name='luan_van']").is(':checked')) ? 1 : 0,
                luan_an: ($("#form_add_hdkh input[name='luan_an']").is(':checked')) ? 1 : 0,
                so_gio: $("#form_add_hdkh input[name='so_gio']").val(),
                hoc_vien: $("#form_add_hdkh input[name='hoc_vien']").val(),
                khoa: $("#form_add_hdkh input[name='khoa']").val(),
                ghichu: $("#form_add_hdkh input[name='ghichu']").val(),
            },
            success: function(data) {
                console.log("Hihi");
                $("#btn_add_hdkh").removeAttr("disabled");
                $("#btn_add_hdkh").html('<i class="fa fa-save"></i> Lưu');
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
                    $('#modal_add_hdkh').modal('hide');
                    swal({
                        "title":"Đã tạo!",
                        "text":"Bạn đã tạo thành công Thông Tin Hướng Dẫn Khoa Học !",
                        "type":"success"
                    }, function() {
                            localStorage.setItem('activeTab', '#tab_hdkh');
                            location.reload();
                        }
                    );
                }
            }
        });
    });
    // END Ajax thêm hdkh
    //AJAX Tìm hdkh Theo ID
         $(".btn_edit_hdkh").on("click", function(e){
             e.preventDefault();
             var hdkh_id = $(this).data("hdkh-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '{{ route('postTimHdkhTheoId') }}',
                 method: 'POST',
                 data: {
                     id: hdkh_id
                 },
                 success: function(data) {
                     if(data.status == true){
                         // console.log(data.data);
                         $("#form_edit_hdkh select[name='id_giangvien']").val(data.data.id_giangvien);
                         $("#form_edit_hdkh input[name='id']").val(data.data.id);
                        $("#form_edit_hdkh input[name='khoa_luan']").prop('checked', (data.data.khoa_luan == 1) ? true : false);
                        $("#form_edit_hdkh input[name='luan_van']").prop('checked', (data.data.luan_van == 1) ? true : false);
                        $("#form_edit_hdkh input[name='luan_an']").prop('checked', (data.data.luan_an == 1) ? true : false);
                        $("#form_edit_hdkh input[name='so_gio']").val(data.data.so_gio);
                        $("#form_edit_hdkh input[name='hoc_vien']").val(data.data.hoc_vien);
                        $("#form_edit_hdkh input[name='khoa']").val(data.data.khoa);
                        $("#form_edit_hdkh input[name='ghichu']").val(data.data.ghichu);
                        $('#modal_edit_hdkh').modal('show');
                     }
                 }
             });
         });
         // END Khi click vào nút sửa hdkh, tìm hdkh theo id và đỗ dữ liệu vào form


         // Ajax sửa hdkh
         $("#btn_edit_hdkh").on('click', function(e){
             e.preventDefault();
             $("#btn_edit_hdkh").attr("disabled", "disabled");
             $("#btn_edit_hdkh").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '{{ route('postSuaHdkh') }}',
                 method: 'POST',
                 data: {
                     id: $("#form_edit_hdkh input[name='id']").val(),
                     id_giangvien: $("#form_edit_hdkh select[name='id_giangvien']").val(),
                     khoa_luan: ($("#form_edit_hdkh input[name='khoa_luan']").is(':checked')) ? 1 : 0,
                    luan_van: ($("#form_edit_hdkh input[name='luan_van']").is(':checked')) ? 1 : 0,
                    luan_an: ($("#form_edit_hdkh input[name='luan_an']").is(':checked')) ? 1 : 0,
                    so_gio: $("#form_edit_hdkh input[name='so_gio']").val(),
                    hoc_vien: $("#form_edit_hdkh input[name='hoc_vien']").val(),
                    khoa: $("#form_edit_hdkh input[name='khoa']").val(),
                    ghichu: $("#form_edit_hdkh input[name='ghichu']").val(),

                 },
                 success: function(data) {
                     $("#btn_edit_hdkh").removeAttr("disabled");
                     $("#btn_edit_hdkh").html('<i class="fa fa-save"></i> Lưu');
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
                         $('#modal_edit_hdkh').modal('hide');
                         swal({
                             "title":"Đã sửa!",
                             "text":"Bạn đã sửa thành công Thông tin Hướng Dẫn Khoa Học !",
                             "type":"success"
                         }, function() {
                                 localStorage.setItem('activeTab', '#tab_hdkh');
                                 location.reload();
                             }
                         );
                     }
                 }
             });
         });
         // END Ajax sửa hdkh

         // Xử lý khi click nút xóa hdkh
         $(".btn_delete_hdkh").on("click", function(e){
             e.preventDefault();
             var hdkh_id = $(this).data("hdkh-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             swal({
                 title: "Xóa Hướng dẫn Khoa họcc này?",
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
                             url: '{{ route('postXoaHdkh') }}',
                             method: 'POST',
                             data: {
                                 id: hdkh_id
                             },
                             success: function(data) {
                                 console.log(data);
                                 if(data.status == true){
                                     swal({
                                         "title":"Đã xóa!",
                                         "text":"Bạn đã xóa thành công Hướng Dẫn Khoa Học !",
                                         "type":"success"
                                     }, function() {
                                             localStorage.setItem('activeTab', '#tab_hdkh');
                                             location.reload();
                                         }
                                     );
                                 }
                             }
                         });
                     }
             });

         });
         // END Xử lý khi click nút xóa Hướng Dẫn Khoa Học 
 // ==================================================================//
         // Ajax thêm Học Tập
         $("#btn_add_hoctap").on('click', function(e){
        e.preventDefault();
        $("#btn_add_hoctap").attr("disabled", "disabled");
        $("#btn_add_hoctap").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
        $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
        $.ajax({

            url: '{{route('postThemHocTap')}}',
            method: 'POST',
            data: {
                id_giangvien: $("#form_add_hoctap select[name='id_giangvien']").val(),
                ten: $("#form_add_hoctap input[name='ten']").val(),
                loai_hinh: $("#form_add_hoctap input[name='loai_hinh']").val(),
                so_gio: $("#form_add_hoctap input[name='so_gio']").val(),
                ghichu: $("#form_add_hoctap input[name='ghichu']").val(),
                thoigian: $("#form_add_hoctap input[name='thoigian']").val(),
                thoigian_den: $("#form_add_hoctap input[name='thoigian_den']").val(),
            },
            success: function(data) {
                console.log("Hihi");
                $("#btn_add_hoctap").removeAttr("disabled");
                $("#btn_add_hoctap").html('<i class="fa fa-save"></i> Lưu');
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
                    $('#modal_add_hoctap').modal('hide');
                    swal({
                        "title":"Đã tạo!",
                        "text":"Bạn đã tạo thành công Học Tập!",
                        "type":"success"
                    }, function() {
                            localStorage.setItem('activeTab', '#tab10');
                            location.reload();
                        }
                    );
                }
            }
        });
    });
    // END Ajax thêm hoctap
    //AJAX Tìm hoctap Theo ID
         $(".btn_edit_hoctap").on("click", function(e){
             e.preventDefault();
             var hoctap_id = $(this).data("hoctap-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '{{ route('postTimHocTapTheoId') }}',
                 method: 'POST',
                 data: {
                     id: hoctap_id
                 },
                 success: function(data) {
                     if(data.status == true){
                         // console.log(data.data);
                         $("#form_edit_hoctap select[name='id_giangvien']").val(data.data.id_giangvien);
                         $("#form_edit_hoctap input[name='id']").val(data.data.id);
                         $("#form_edit_hoctap input[name='ten']").val(data.data.ten);
                         $("#form_edit_hoctap input[name='loai_hinh']").val(data.data.loai_hinh);
                         $("#form_edit_hoctap input[name='so_gio']").val(data.data.so_gio);
                         $("#form_edit_hoctap input[name='ghichu']").val(data.data.ghichu);
                         $("#form_edit_hoctap input[name='thoigian']").val(data.data.thoigian);
                         $("#form_edit_hoctap input[name='thoigian_den']").val(data.data.thoigian_den);
                         $('#modal_edit_hoctap').modal('show');
                     }
                 }
             });
         });
         // END Khi click vào nút sửa hoctap, tìm hoctap theo id và đỗ dữ liệu vào form


         // Ajax sửa hoctap
         $("#btn_edit_hoctap").on('click', function(e){
             e.preventDefault();
             $("#btn_edit_hoctap").attr("disabled", "disabled");
             $("#btn_edit_hoctap").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '{{ route('postSuaHocTap') }}',
                 method: 'POST',
                 data: {
                     id: $("#form_edit_hoctap input[name='id']").val(),
                     id_giangvien: $("#form_edit_hoctap select[name='id_giangvien']").val(),
                     ten: $("#form_edit_hoctap input[name='ten']").val(),
                     loai_hinh: $("#form_edit_hoctap input[name='loai_hinh']").val(),
                     so_gio: $("#form_edit_hoctap input[name='so_gio']").val(),
                     ghichu: $("#form_edit_hoctap input[name='ghichu']").val(),
                     thoigian: $("#form_edit_hoctap input[name='thoigian']").val(),
                     thoigian_den: $("#form_edit_hoctap input[name='thoigian_den']").val(),

                 },
                 success: function(data) {
                     $("#btn_edit_hoctap").removeAttr("disabled");
                     $("#btn_edit_hoctap").html('<i class="fa fa-save"></i> Lưu');
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
                         $('#modal_edit_hoctap').modal('hide');
                         swal({
                             "title":"Đã sửa!",
                             "text":"Bạn đã sửa thành công Hoạt Động Học Tập!",
                             "type":"success"
                         }, function() {
                                 localStorage.setItem('activeTab', '#tab10');
                                 location.reload();
                             }
                         );
                     }
                 }
             });
         });
         // END Ajax sửa hoctap

         // Xử lý khi click nút xóa hoctap
         $(".btn_delete_hoctap").on("click", function(e){
             e.preventDefault();
             var hoctap_id = $(this).data("hoctap-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             swal({
                 title: "Xóa Hoạt đọng Học tập này?",
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
                             url: '{{ route('postXoaHocTap') }}',
                             method: 'POST',
                             data: {
                                 id: hoctap_id
                             },
                             success: function(data) {
                                 console.log(data);
                                 if(data.status == true){
                                     swal({
                                         "title":"Đã xóa!",
                                         "text":"Bạn đã xóa thành công Hoạt Động Học Tập!",
                                         "type":"success"
                                     }, function() {
                                             localStorage.setItem('activeTab', '#tab10');
                                             location.reload();
                                         }
                                     );
                                 }
                             }
                         });
                     }
             });

         });
         // End xử lý nút xóa học tập
         var table = $('#ds_hop');
        var oTable = table.dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
    "pageLength": 10,

    "language": {
        "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
        "zeroRecords": "Không tìm thấy dữ liệu",
        "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Họp: _TOTAL_",
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
var table = $('#ds_congtac');
        var oTable = table.dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
    "pageLength": 10,

    "language": {
        "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
        "zeroRecords": "Không tìm thấy dữ liệu",
        "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Hoạt Động Đi Thực Tế: _TOTAL_",
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
var table = $('#ds_chambai');
        var oTable = table.dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
    "pageLength": 10,

    "language": {
        "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
        "zeroRecords": "Không tìm thấy dữ liệu",
        "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Hoạt Động Chấm Bài: _TOTAL_",
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
var table = $('#ds_daygioi');
        var oTable = table.dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
    "pageLength": 10,

    "language": {
        "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
        "zeroRecords": "Không tìm thấy dữ liệu",
        "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Hoạt Động Dạy Giỏi: _TOTAL_",
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
var table = $('#ds_hoctap');
        var oTable = table.dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
    "pageLength": 10,

    "language": {
        "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
        "zeroRecords": "Không tìm thấy dữ liệu",
        "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Tham Gia Học Tập: _TOTAL_",
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
var table = $('#ds_hdkh');
        var oTable = table.dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
    "pageLength": 10,

    "language": {
        "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
        "zeroRecords": "Không tìm thấy dữ liệu",
        "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng HDKH: _TOTAL_",
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
var table = $('#ds_xaydung');
        var oTable = table.dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
    "pageLength": 10,

    "language": {
        "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
        "zeroRecords": "Không tìm thấy dữ liệu",
        "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Xây Dựng Chương Trình: _TOTAL_",
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
var table = $('#ds_vanban');
        var oTable = table.dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
    "pageLength": 10,

    "language": {
        "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
        "zeroRecords": "Không tìm thấy dữ liệu",
        "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Văn Bản: _TOTAL_",
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
var table = $('#ds_dang');
        var oTable = table.dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
    "pageLength": 10,

    "language": {
        "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
        "zeroRecords": "Không tìm thấy dữ liệu",
        "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Hoạt Động Đảng: _TOTAL_",
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

        
    });


</script>


<script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery.input-ip-address-control-1.0.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/icheck/icheck.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js') }}" type="text/javascript"></script>
@endsection
