@extends('layouts.master')

@section('title', 'Thông tin Phần mềm')

@section('style')
    <link href="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
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
                    <a href="{{ route('company.index') }}">Thông Tin Phần Mềm</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> 
            <i class="fa fa-building-o"></i>
            Thông Tin Phần Mềm
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <!-- MESSAGE -->
        @include('partials.flash-message')
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-body form">
                <form role="form" action="{{ route('company.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-4 text-center col-md-push-8">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: auto;">
                                            <img src="{{ (setting('company.logo','') != '')?url('/uploads/logos/' . setting('company.logo') ): 'http://www.placehold.it/200x200/EFEFEF/AAAAAA&amp;text=no+image'}}" alt="" />
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px;"> </div>
                                        <div>
                                            <span class="btn default btn-file">
                                                <span class="fileinput-new"> Chọn ảnh Logo Footer </span>
                                                <span class="fileinput-exists"> Thay đổi </span>
                                                <input type="file" name="logo"> </span>
                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Hủy </a>
                                        </div>
                                    </div>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: auto;">
                                            <img src="{{ (setting('company.slide1','') != '')?url('/uploads/slides/' . setting('company.slide1') ): 'http://www.placehold.it/200x200/EFEFEF/AAAAAA&amp;text=no+image'}}" alt="" />
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px;"> </div>
                                        <div>
                                            <span class="btn default btn-file">
                                                <span class="fileinput-new"> Thay Đổi Ảnh Slide</span>
                                                <span class="fileinput-exists"> Thay đổi </span>
                                                <input type="file" name="slide1"> </span>
                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Hủy </a>
                                        </div>
                                    </div>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: auto;">
                                            <img src="{{ (setting('company.slide2','') != '')?url('/uploads/slides/' . setting('company.slide2') ): 'http://www.placehold.it/200x200/EFEFEF/AAAAAA&amp;text=no+image'}}" alt="" />
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px;"> </div>
                                        <div>
                                            <span class="btn default btn-file">
                                                <span class="fileinput-new"> Thay đổi Ảnh Slide 2 </span>
                                                <span class="fileinput-exists"> Thay đổi </span>
                                                <input type="file" name="slide2"> </span>
                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Hủy </a>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-8 col-md-pull-4">
                                    <div class="form-group">
                                        <label>Tên Học Viện<span class="required">*</span></label>
                                        <input value="{{ setting('company.tenhocvien','') }}" name="tenhocvien" type="text" class="form-control" placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tên Khoa<span class="required">*</span></label>
                                        <input value="{{ setting('company.tenkhoa','') }}" name="tenkhoa" type="text" class="form-control" placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tên Phần Mềm<span class="required">*</span></label>
                                        <input value="{{ setting('company.tenphanmem','') }}" name="tenphanmem" type="text" class="form-control" placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Bản Quyền<span class="required">*</span></label>
                                        <input value="{{ setting('company.banquyen','') }}" name="banquyen" type="text" class="form-control" placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Địa Chỉ</label>
                                        <input value="{{ setting('company.diachi','') }}" name="diachi" type="text" class="form-control" placeholder="">
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label>Liên Hệ<span class="required">*</span></label>
                                        <input value="{{ setting('company.lienhe','') }}" name="lienhe" type="text" class="form-control" placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Phát Triển<span class="required">*</span></label>
                                        <input value="{{ setting('company.phattrien','') }}" name="phattrien" type="text" class="form-control" placeholder="" required>
                                    </div>
                                    
                                    <button type="submit" class="btn green"><i class="fa fa-save"></i> Lưu</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
<script src="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
@endsection