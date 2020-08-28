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
            <i class="fa fa-edit"></i> Quản Lý | Công Việc Khác
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
                    <ul class="nav nav-pills" id="#myTab">
                       
                        <li>
                            <a href="#tab11" data-toggle="tab">Khóa Luận</a>
                        </li>
                        <li>
                            <a href="#tab12" data-toggle="tab">Luận Văn</a>
                        </li>
                        <li>
                            <a href="#tab13" data-toggle="tab">Luận Án</a>
                        </li>
                        <li>
                            <a href="#tab14" data-toggle="tab">Nghiên Cứu Sinh</a>
                        </li>
                        <li class="active">
                            <a href="#tab4" data-toggle="tab">Chấm Bài</a>
                        </li>
                        <li>
                            <a href="#tab3" data-toggle="tab">Công Tác</a>
                        </li>
                        <li>
                            <a href="#tab5" data-toggle="tab">Đảng Đoàn</a>
                        </li>
                        <li>
                            <a href="#tab6" data-toggle="tab">Dạy Giỏi</a>
                        </li>
                        <li>
                            <a href="#tab7" data-toggle="tab">Xây Dựng CT</a>
                        </li>
                        <li>
                            <a href="#tab8" data-toggle="tab">CV Đột Xuất</a>
                        </li>
                        <li>
                            <a href="#tab9" data-toggle="tab">Sáng Kiến</a>
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
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
@include('khoaluan.modals-khac.edit')
@include('luanvan.modals-khac.edit')

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

          //BEGIN ADD KHÓA LUẬN
    $("#btn_add_khoaluan").on('click', function(e){
        e.preventDefault();
        $("#btn_add_khoaluan").attr("disabled", "disabled");
        $("#btn_add_khoaluan").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
        $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
        $.ajax({
            url: '{{route('postThemKhoaLuan')}}',
            method: 'POST',
            data: {
                ten: $("#form_add_khoaluan input[name='ten']").val(),
                huongdan: $("#form_add_khoaluan select[name='huongdan']").val(),
                chutichcham: $("#form_add_khoaluan select[name='chutichcham']").val(),
                thamgiacham: $("#form_add_khoaluan select[name='thamgiacham']").val(),
                ghichu: $("#form_add_khoaluan input[name='ghichu']").val(),
            },
            success: function(data) {
                console.log("Hihi");
                $("#btn_add_khoaluan").removeAttr("disabled"); 
                $("#btn_add_khoaluan").html('<i class="fa fa-save"></i> Lưu');
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
                    $('#modal_add_khoaluan').modal('hide');
                    swal({
                        "title":"Đã tạo!", 
                        "text":"Bạn đã tạo thành công Khóa Luận!",
                        "type":"success"
                    }, function() {
                            localStorage.setItem('activeTab', '#tab11');
                            location.reload();
                        }
                    );
                }
            }
        });
    });
    // END ADD KHÓA LUẬN
    $(".btn_edit_khoaluan").on("click", function(e){
            e.preventDefault();
            var khoaluan_id = $(this).data("khoaluan-id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('postTimKhoaLuanTheoId') }}',
                method: 'POST',
                data: {
                    id: khoaluan_id
                },
                success: function(data) {
                    if(data.status == true){
                        // console.log(data.data);
                        $("#form_edit_khoaluan input[name='id']").val(data.data.id);
                        $("#form_edit_khoaluan input[name='ten']").val(data.data.ten);
                        $("#form_edit_khoaluan select[name='huongdan']").val($.parseJSON(data.data.huongdan));
                        $("#form_edit_khoaluan select[name='chutichcham']").val($.parseJSON(data.data.chutichcham));
                        $("#form_edit_khoaluan select[name='thamgiacham']").val($.parseJSON(data.data.thamgiacham));
                        $("#form_edit_khoaluan input[name='ghichu']").val(data.data.ghichu);
                        $('#modal_edit_khoaluan').modal('show');
                    }
                }
            });
        });
        // END Khi click vào nút sửa KHOALUAN, tìm KHOALUAN theo id và đỗ dữ liệu vào form

        
        // Ajax SỬA KHÓA LUẬN
        $("#btn_edit_khoaluan").on('click', function(e){
            e.preventDefault();
            $("#btn_edit_khoaluan").attr("disabled", "disabled");
            $("#btn_edit_khoaluan").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('postSuaKhoaLuan') }}',
                method: 'POST',
                data: {
                    id: $("#form_edit_khoaluan input[name='id']").val(),
                    ten: $("#form_edit_khoaluan input[name='ten']").val(),
                    huongdan: $("#form_edit_khoaluan select[name='huongdan']").val(),
                    chutichcham: $("#form_edit_khoaluan select[name='chutichcham']").val(),
                    thamgiacham: $("#form_edit_khoaluan select[name='thamgiacham']").val(),
                    ghichu: $("#form_edit_khoaluan input[name='ghichu']").val(),
                },
                success: function(data) {
                    $("#btn_edit_khoaluan").removeAttr("disabled"); 
                    $("#btn_edit_khoaluan").html('<i class="fa fa-save"></i> Lưu');
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
                        $('#modal_edit_khoaluan').modal('hide');
                        swal({
                            "title":"Đã sửa!", 
                            "text":"Bạn đã sửa thành công Khóa Luận!",
                            "type":"success"
                        }, function() {
                                localStorage.setItem('activeTab', '#tab11');
                                location.reload();
                            }
                        );
                    }
                }
            });
        });
        // END Ajax SỬA KHÓA LUẬN

         // Xử lý khi click nút xóa KHÓA LUẬN
         $(".btn_delete_khoaluan").on("click", function(e){
            e.preventDefault();
            var khoaluan_id = $(this).data("khoaluan-id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            swal({
                title: "Xóa KHOALUAN này?",
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
                            url: '{{ route('postXoaKhoaLuan') }}',
                            method: 'POST',
                            data: {
                                id: khoaluan_id
                            },
                            success: function(data) {
                                console.log(data);
                                if(data.status == true){
                                    swal({
                                        "title":"Đã xóa!", 
                                        "text":"Bạn đã xóa thành công KHOALUAN!",
                                        "type":"success"
                                    }, function() {
                                            localStorage.setItem('activeTab', '#tab11');
                                            location.reload();
                                        }
                                    );
                                }
                            }
                        });
                    }   
            });

        });
        // END Xử lý khi click nút XÓA KHÓA LUẬN

        
          //BEGIN ADD LUẬN VĂN
    $("#btn_add_luanvan").on('click', function(e){
        e.preventDefault();
        $("#btn_add_luanvan").attr("disabled", "disabled");
        $("#btn_add_luanvan").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
        $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
        $.ajax({
            url: '{{route('postThemLuanVan')}}',
            method: 'POST',
            data: {
                ten: $("#form_add_luanvan input[name='ten']").val(),
                vietnam: ($("#form_add_luanvan input[name='vietnam']").is(':checked')) ? 1 : 0,
                huongdan: $("#form_add_luanvan select[name='huongdan']").val(),
                chutich: $("#form_add_luanvan select[name='chutich']").val(),
                phanbien: $("#form_add_luanvan select[name='phanbien']").val(),
                thuky: $("#form_add_luanvan select[name='thuky']").val(),
                uyvien: $("#form_add_luanvan select[name='uyvien']").val(),
                ghichu: $("#form_add_luanvan input[name='ghichu']").val(),
            },
            success: function(data) {
                console.log("Hihi");
                $("#btn_add_luanvan").removeAttr("disabled"); 
                $("#btn_add_luanvan").html('<i class="fa fa-save"></i> Lưu');
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
                    $('#modal_add_luanvan').modal('hide');
                    swal({
                        "title":"Đã tạo!", 
                        "text":"Bạn đã tạo thành công Luận Văn!",
                        "type":"success"
                    }, function() {
                            localStorage.setItem('activeTab', '#tab1');
                            location.reload();
                        }
                    );
                }
            }
        });
    });
    // END ADD Luận Văn
    $(".btn_edit_luanvan").on("click", function(e){
            e.preventDefault();
            var luanvan_id = $(this).data("luanvan-id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('postTimLuanVanTheoId') }}',
                method: 'POST',
                data: {
                    id: luanvan_id
                },
                success: function(data) {
                    if(data.status == true){
                        // console.log(data.data);
                        $("#form_edit_luanvan input[name='id']").val(data.data.id);
                        $("#form_edit_luanvan input[name='ten']").val(data.data.ten);
                        $("#form_edit_luanvan input[name='vietnam']").prop('checked', (data.data.vietnam == 1) ? true : false);
                        $("#form_edit_luanvan select[name='huongdan']").val($.parseJSON(data.data.huongdan));
                        $("#form_edit_luanvan select[name='chutich']").val($.parseJSON(data.data.chutich));
                        $("#form_edit_luanvan select[name='phanbien']").val($.parseJSON(data.data.phanbien));
                        $("#form_edit_luanvan select[name='thuky']").val($.parseJSON(data.data.thuky));
                        $("#form_edit_luanvan select[name='uyvien']").val($.parseJSON(data.data.uyvien));
                        $("#form_edit_luanvan input[name='ghichu']").val(data.data.ghichu);
                        $('#modal_edit_luanvan').modal('show');
                    }
                }
            });
        });
        // END Khi click vào nút sửa LUANVAN, tìm LUANVAN theo id và đỗ dữ liệu vào form

        
        // Ajax SỬA Luận Văn
        $("#btn_edit_luanvan").on('click', function(e){
            e.preventDefault();
            $("#btn_edit_luanvan").attr("disabled", "disabled");
            $("#btn_edit_luanvan").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('postSuaLuanVan') }}',
                method: 'POST',
                data: {
                    id: $("#form_edit_luanvan input[name='id']").val(),
                    ten: $("#form_edit_luanvan input[name='ten']").val(),
                    huongdan: $("#form_edit_luanvan select[name='huongdan']").val(),
                    chutich: $("#form_edit_luanvan select[name='chutich']").val(),
                    phanbien: $("#form_edit_luanvan select[name='chutich']").val(),
                    thuky: $("#form_edit_luanvan select[name='chutich']").val(),
                    uyvien: $("#form_edit_luanvan select[name='']").val(),
                    ghichu: $("#form_edit_luanvan input[name='ghichu']").val(),
                },
                success: function(data) {
                    $("#btn_edit_luanvan").removeAttr("disabled"); 
                    $("#btn_edit_luanvan").html('<i class="fa fa-save"></i> Lưu');
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
                        $('#modal_edit_luanvan').modal('hide');
                        swal({
                            "title":"Đã sửa!", 
                            "text":"Bạn đã sửa thành công Khóa Luận!",
                            "type":"success"
                        }, function() {
                                localStorage.setItem('activeTab', '#tab11');
                                location.reload();
                            }
                        );
                    }
                }
            });
        });
        // END Ajax SỬA KHÓA LUẬN

         // Xử lý khi click nút xóa KHÓA LUẬN
         $(".btn_delete_luanvan").on("click", function(e){
            e.preventDefault();
            var luanvan_id = $(this).data("luanvan-id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            swal({
                title: "Xóa LUANVAN này?",
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
                            url: '{{ route('postXoaLuanvan') }}',
                            method: 'POST',
                            data: {
                                id: luanvan_id
                            },
                            success: function(data) {
                                console.log(data);
                                if(data.status == true){
                                    swal({
                                        "title":"Đã xóa!", 
                                        "text":"Bạn đã xóa thành công LUANVAN!",
                                        "type":"success"
                                    }, function() {
                                            localStorage.setItem('activeTab', '#tab11');
                                            location.reload();
                                        }
                                    );
                                }
                            }
                        });
                    }   
            });

        });
        // END Xử lý khi click nút XÓA KHÓA LUẬN
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
                id_giangvien: $("#form_add_congtac select[name='id_giangvien'").val(),
                ten: $("#form_add_congtac input[name='ten']").val(),
                tiendo: $("#form_add_congtac input[name='tiendo']").val(),
                thoigian: $("#form_add_congtac input[name='thoigian']").val(),
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
                        "text":"Bạn đã tạo thành công Công Tác!",
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
                         $("#form_edit_congtac input[name='tiendo']").val(data.data.tiendo);
                         $("#form_edit_congtac input[name='thoigian']").val(data.data.thoigian);
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
                     tiendo: $("#form_edit_congtac input[name='tiendo']").val(),
                     thoigian: $("#form_edit_congtac input[name='thoigian'").val(),
                    
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
                             "text":"Bạn đã sửa thành công Công Tác!",
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
                 title: "Xóa congtac này?",
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
                                         "text":"Bạn đã xóa thành công Công Tác!",
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
                ghichu: $("#form_add_chambai input[name='ghichu']").val(),
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
                         // console.log(data.data);
                         $("#form_edit_chambai select[name='id_giangvien']").val(data.data.id_giangvien);
                         $("#form_edit_chambai input[name='id']").val(data.data.id);
                         $("#form_edit_chambai input[name='ghichu']").val(data.data.ghichu);
                         $("#form_edit_chambai input[name='thoigian']").val(data.data.thoigian);
                         $('#modal_edit_chambai').modal('show');
                     }
                 }
             });
         });
         // END Khi click vào nút sửa chấm Bài, tìm chấm Bài theo id và đỗ dữ liệu vào form
 
         
         // Ajax sửa chấm bài
         $(".btn_edit_chambai").on('click', function(e){
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
                     ghichu: $("#form_edit_chambai input[name='ghichu']").val(),
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
                 title: "Xóa chambai này?",
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
                     thoigian: $("#form_edit_dang input[name='thoigian'").val(),
                    
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
                 title: "Xóa dang này?",
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
                     thoigian: $("#form_edit_daygioi input[name='thoigian'").val(),
                    
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
                 title: "Xóa daygioi này?",
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
                     ghichu: $("#form_edit_xaydung input[name='ghichu']").val(),
                     thoigian: $("#form_edit_xaydung input[name='thoigian'").val(),
                    
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
                 title: "Xóa xaydung này?",
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
         
         // Ajax thêm Đột Xuất
         $("#btn_add_dotxuat").on('click', function(e){
        e.preventDefault();
        $("#btn_add_dotxuat").attr("disabled", "disabled");
        $("#btn_add_dotxuat").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
        $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
        $.ajax({
            
            url: '{{route('postThemDotXuat')}}',
            method: 'POST',
            data: {
                id_giangvien: $("#form_add_dotxuat select[name='id_giangvien']").val(),
                ten: $("#form_add_dotxuat input[name='ten']").val(),
                ghichu: $("#form_add_dotxuat input[name='ghichu']").val(),
                thoigian: $("#form_add_dotxuat input[name='thoigian']").val(),
            },
            success: function(data) {
                console.log("Hihi");
                $("#btn_add_dotxuat").removeAttr("disabled"); 
                $("#btn_add_dotxuat").html('<i class="fa fa-save"></i> Lưu');
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
                    $('#modal_add_dotxuat').modal('hide');
                    swal({
                        "title":"Đã tạo!", 
                        "text":"Bạn đã tạo thành công Công Việc Đột Xuất!",
                        "type":"success"
                    }, function() {
                            localStorage.setItem('activeTab', '#tab8');
                            location.reload();
                        }
                    );
                }
            }
        });
    });
    // END Ajax thêm dotxuat
    //AJAX Tìm dotxuat Theo ID
         $(".btn_edit_dotxuat").on("click", function(e){
             e.preventDefault();
             var dotxuat_id = $(this).data("dotxuat-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '{{ route('postTimDotXuatTheoId') }}',
                 method: 'POST',
                 data: {
                     id: dotxuat_id
                 },
                 success: function(data) {
                     if(data.status == true){
                         // console.log(data.data);
                         $("#form_edit_dotxuat select[name='id_giangvien']").val(data.data.id_giangvien);
                         $("#form_edit_dotxuat input[name='id']").val(data.data.id);
                         $("#form_edit_dotxuat input[name='ten']").val(data.data.ten);
                         $("#form_edit_dotxuat input[name='ghichu']").val(data.data.ghichu);
                         $("#form_edit_dotxuat input[name='thoigian']").val(data.data.thoigian);
                         $('#modal_edit_dotxuat').modal('show');
                     }
                 }
             });
         });
         // END Khi click vào nút sửa dotxuat, tìm dotxuat theo id và đỗ dữ liệu vào form
 
         
         // Ajax sửa dotxuat
         $("#btn_edit_dotxuat").on('click', function(e){
             e.preventDefault();
             $("#btn_edit_dotxuat").attr("disabled", "disabled");
             $("#btn_edit_dotxuat").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '{{ route('postSuaDotXuat') }}',
                 method: 'POST',
                 data: {
                     id: $("#form_edit_dotxuat input[name='id']").val(),
                     id_giangvien: $("#form_edit_dotxuat select[name='id_giangvien']").val(),
                     ten: $("#form_edit_dotxuat input[name='ten']").val(),
                     ghichu: $("#form_edit_dotxuat input[name='ghichu']").val(),
                     thoigian: $("#form_edit_dotxuat input[name='thoigian'").val(),
                    
                 },
                 success: function(data) {
                     $("#btn_edit_dotxuat").removeAttr("disabled"); 
                     $("#btn_edit_dotxuat").html('<i class="fa fa-save"></i> Lưu');
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
                         $('#modal_edit_dotxuat').modal('hide');
                         swal({
                             "title":"Đã sửa!", 
                             "text":"Bạn đã sửa thành công Công Việc Đột Xuất!",
                             "type":"success"
                         }, function() {
                                 localStorage.setItem('activeTab', '#tab8');
                                 location.reload();
                             }
                         );
                     }
                 }
             });
         });
         // END Ajax sửa dotxuat
         
         // Xử lý khi click nút xóa dotxuat
         $(".btn_delete_dotxuat").on("click", function(e){
             e.preventDefault();
             var dotxuat_id = $(this).data("dotxuat-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             swal({
                 title: "Xóa dotxuat này?",
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
                             url: '{{ route('postXoaDotXuat') }}',
                             method: 'POST',
                             data: {
                                 id: dotxuat_id
                             },
                             success: function(data) {
                                 console.log(data);
                                 if(data.status == true){
                                     swal({
                                         "title":"Đã xóa!", 
                                         "text":"Bạn đã xóa thành công Công Việc Đột Xuất!",
                                         "type":"success"
                                     }, function() {
                                             localStorage.setItem('activeTab', '#tab8');
                                             location.reload();
                                         }
                                     );
                                 }
                             }
                         });
                     }   
             });
 
         });
         // END Xử lý khi click nút xóa dotxuat
 // ==================================================================//
 // ==================================================================//
         
         // Ajax thêm Sáng Kiến
         $("#btn_add_sangkien").on('click', function(e){
        e.preventDefault();
        $("#btn_add_sangkien").attr("disabled", "disabled");
        $("#btn_add_sangkien").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
        $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
        $.ajax({
            
            url: '{{route('postThemSangKien')}}',
            method: 'POST',
            data: {
                id_giangvien: $("#form_add_sangkien select[name='id_giangvien']").val(),
                ten: $("#form_add_sangkien input[name='ten']").val(),
                ghichu: $("#form_add_sangkien input[name='ghichu']").val(),
                thoigian: $("#form_add_sangkien input[name='thoigian']").val(),
            },
            success: function(data) {
                console.log("Hihi");
                $("#btn_add_sangkien").removeAttr("disabled"); 
                $("#btn_add_sangkien").html('<i class="fa fa-save"></i> Lưu');
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
                    $('#modal_add_sangkien').modal('hide');
                    swal({
                        "title":"Đã tạo!", 
                        "text":"Bạn đã tạo thành công Sáng Kiến Cải Tiến!",
                        "type":"success"
                    }, function() {
                            localStorage.setItem('activeTab', '#tab9');
                            location.reload();
                        }
                    );
                }
            }
        });
    });
    // END Ajax thêm sangkien
    //AJAX Tìm sangkien Theo ID
         $(".btn_edit_sangkien").on("click", function(e){
             e.preventDefault();
             var sangkien_id = $(this).data("sangkien-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '{{ route('postTimSangKienTheoId') }}',
                 method: 'POST',
                 data: {
                     id: sangkien_id
                 },
                 success: function(data) {
                     if(data.status == true){
                         // console.log(data.data);
                         $("#form_edit_sangkien select[name='id_giangvien']").val(data.data.id_giangvien);
                         $("#form_edit_sangkien input[name='id']").val(data.data.id);
                         $("#form_edit_sangkien input[name='ten']").val(data.data.ten);
                         $("#form_edit_sangkien input[name='ghichu']").val(data.data.ghichu);
                         $("#form_edit_sangkien input[name='thoigian']").val(data.data.thoigian);
                         $('#modal_edit_sangkien').modal('show');
                     }
                 }
             });
         });
         // END Khi click vào nút sửa sangkien, tìm sangkien theo id và đỗ dữ liệu vào form
 
         
         // Ajax sửa sangkien
         $("#btn_edit_sangkien").on('click', function(e){
             e.preventDefault();
             $("#btn_edit_sangkien").attr("disabled", "disabled");
             $("#btn_edit_sangkien").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '{{ route('postSuaSangKien') }}',
                 method: 'POST',
                 data: {
                     id: $("#form_edit_sangkien input[name='id']").val(),
                     id_giangvien: $("#form_edit_sangkien select[name='id_giangvien']").val(),
                     ten: $("#form_edit_sangkien input[name='ten']").val(),
                     ghichu: $("#form_edit_sangkien input[name='ghichu']").val(),
                     thoigian: $("#form_edit_sangkien input[name='thoigian'").val(),
                    
                 },
                 success: function(data) {
                     $("#btn_edit_sangkien").removeAttr("disabled"); 
                     $("#btn_edit_sangkien").html('<i class="fa fa-save"></i> Lưu');
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
                         $('#modal_edit_sangkien').modal('hide');
                         swal({
                             "title":"Đã sửa!", 
                             "text":"Bạn đã sửa thành công Sáng Kiến Cải Tiến!",
                             "type":"success"
                         }, function() {
                                 localStorage.setItem('activeTab', '#tab9');
                                 location.reload();
                             }
                         );
                     }
                 }
             });
         });
         // END Ajax sửa sangkien
         
         // Xử lý khi click nút xóa sangkien
         $(".btn_delete_sangkien").on("click", function(e){
             e.preventDefault();
             var sangkien_id = $(this).data("sangkien-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             swal({
                 title: "Xóa sangkien này?",
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
                             url: '{{ route('postXoaSangKien') }}',
                             method: 'POST',
                             data: {
                                 id: sangkien_id
                             },
                             success: function(data) {
                                 console.log(data);
                                 if(data.status == true){
                                     swal({
                                         "title":"Đã xóa!", 
                                         "text":"Bạn đã xóa thành công Sáng Kiến Cải Tiến!",
                                         "type":"success"
                                     }, function() {
                                             localStorage.setItem('activeTab', '#tab9');
                                             location.reload();
                                         }
                                     );
                                 }
                             }
                         });
                     }   
             });
 
         });
         // END Xử lý khi click nút xóa sangkien
 // ==================================================================//

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
                ghichu: $("#form_add_hoctap input[name='ghichu']").val(),
                thoigian: $("#form_add_hoctap input[name='thoigian']").val(),
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
                         $("#form_edit_hoctap input[name='ghichu']").val(data.data.ghichu);
                         $("#form_edit_hoctap input[name='thoigian']").val(data.data.thoigian);
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
                     ghichu: $("#form_edit_hoctap input[name='ghichu']").val(),
                     thoigian: $("#form_edit_hoctap input[name='thoigian'").val(),
                    
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
                 title: "Xóa hoctap này?",
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
         // END Xử lý khi click nút xóa hoctap
 // ==================================================================//
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