@extends('layouts.master')

@section('title', 'Chỉnh sửa Giảng viên')

@section('style')
    <link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
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
                    <a href="{{ route('user.index') }}">Người Dùng Hệ Thống</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <strong>
            <i class="fa fa-edit"></i>
            Sửa Thông Tin Người Dùng
        </strong>
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
        <!-- BEGIN FORM-->
        <form action="{{ route('user.edit.post') }}" method="post" id="form_sample_3" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="row">
                <div class="col-md-4 text-center col-md-push-8">
                   
                </div>
                <div class="col-md-8 col-md-pull-4">
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form bordered">
                        <div class="portlet-body">
                            <div class="form-body">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <div class="input-group">
                                        <label for="form_control"></label>
                                        <select class="form-control" name="id_giangvien" readonly>
                                        <option readonly value="{{$user->giangviens->id}}">{{$user->giangviens->ten}}</option>
                                            @if($giangvien->count()>0)
                                                @foreach($giangvien as $v)
                                                <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->ten }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                                        <label for="form_control_1">Email <span class="required"> * </span></label>
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" value="" id="myPassword">
                                        <label for="form_control_1">Mật khẩu</label>
                                        <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                    </div>
                                     <input type="checkbox" onclick="myFunction()">Hiển thị mật khẩu (Cảnh báo: Không tự ý thay đổi mật khẩu người dùng. Để trống để giữ nguyên.)</br>
                                    <span id="name-error" class="help-block help-block-error"></span>
                                </div>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <select class="form-control" name="role[]">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}" {{ ($user->roles[0]->id == $role->id)?'selected':'' }}>{{ $role->display_name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="form_control_1">Quyền</label>
                                </div>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <select class="form-control" name="active">
                                        <option value="1" {{ ($user->active)?'selected':'' }}>Đang hoạt động</option>
                                        <option value="0" {{ (!$user->active)?'selected':'' }}>Vô hiệu hóa</option>
                                    </select>
                                    <label for="form_control_1">Trạng thái</label>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn green"><i class="fa fa-save"></i> Lưu</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
        </form>
        <!-- END FORM-->
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

@endsection

@section('script')
<script>
    function myFunction() {
      var x = document.getElementById("myPassword");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    </script>
<script src="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
@endsection