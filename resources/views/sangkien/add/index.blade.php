@extends('layouts.master')

@section('title', 'Thêm mới Sáng Kiến ')

@section('style')
    <!-- <link href="{{ asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" /> -->
    <link href="{{ asset('assets/global/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css" />
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
                    <a href="{{ route('sangkien.index') }}">Danh Sách Sáng Kiến Cải Tiến</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <i class="fa fa-plus"></i> Thêm Hoạt Động Mới
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
        <div class="row">
            <div class="col-md-12">
                <div class="tabbable tabbable-tabdrop">
                    <ul class="nav nav-pills">
                        <li class="active">
                            <a href="#tab1" data-toggle="tab">Thông tin</a>
                        </li>
                       
                    </ul>
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form" id="form_wizard_1">
                        <!-- BEGIN FORM-->
                        <form action="{{ route('sangkien.add.post') }}" method="post" id="form_sample_2" class="form-horizontal">
                            @csrf
                            <div class="tab-content">
                                <!-- BEGIN TAB 1-->
                                <div class="tab-pane active" id="tab1">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Tên Giảng Viên:
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-icon right">
                                                            <i class="fa fa-key"></i>
                                                            <select class="form-control" name="id_giangvien">
                                                                <option value="0">-------- Chọn Giảng Viên --------</option>
                                                                @if($ds_giangvien->count()>0)
                                                                    @foreach($ds_giangvien as $v)
                                                                    <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->ten }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Tên Sáng Kiến Cải Tiến:
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-icon right">
                                                            <i class="fa fa-user"></i>
                                                            <input type="text" class="form-control" name="ten" value="{{ old('ten') }}" required maxlength="191" /> </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Thời Gian
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-icon right">
                                                            <i class="fa fa-home"></i>
                                                            <input type="date" class="form-control" name="thoigian" value="{{ old('thoigian') }}" /> </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Ghi Chú:
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-icon right">
                                                            <i class="fa fa-home"></i>
                                                            <input type="text" class="form-control" name="ghichu" value="{{ old('thoigian') }}" /> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END TAB 1-->
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn green"><i class="fa fa-save"></i> Lưu</button>
                                        <button type="reset" class="btn default"><i class="fa fa-refresh"></i> Làm lại
                                        </button>
                                    </div>
                                </div>
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

@endsection

@section('script')
<script>
    $(document).ready(function()
    {
       
    })
</script>
<script src="{{ asset('assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery.input-ip-address-control-1.0.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/icheck/icheck.min.js') }}" type="text/javascript"></script>
@endsection