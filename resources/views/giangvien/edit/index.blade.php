@extends('layouts.master')

@section('title', 'Chỉnh sửa Giảng Viên')

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
                    <a href="{{ route('giangvien.index') }}">Danh Sách Giảng Viên</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
           <strong> <i class="fa fa-edit"></i> Chỉnh sửa </strong> | {{ $giangvien->ten }} - {{ $giangvien->chucvu }}
            @if( $giangvien->cothegiang == 1 )
            <span class="label label-sm bg-green-jungle"> Có thể giảng </span>
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
        <div class="row">
            <div class="col-md-12">
                <div class="tabbable tabbable-tabdrop">
                    <ul class="nav nav-pills" id="#myTab">
                        <li class="active">
                            <a href="#tab1" data-toggle="tab">Thông tin</a>
                        </li>
                        <li>
                            <a href="#tab_hop" data-toggle="tab">Họp</a>
                        </li>
                        <li>
                            <a href="#tab_hdkh" data-toggle="tab">Hướng Dẫn Khoa Học</a>
                        </li>
                        <li>
                            <a href="#tab3" data-toggle="tab">Đi Thực Tế</a>
                        </li>
                        <li>
                            <a href="#tab_vanban" data-toggle="tab">Xử Lý Văn Bản</a>
                        </li>
                        <li>
                            <a href="#tab4" data-toggle="tab">Chấm Bài</a>
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
                        @include('giangvien.edit.form')
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
        // Reload trang và giữ nguyên tab đã active
        var activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            $('a[href="' + activeTab + '"]').tab('show');
            localStorage.removeItem('activeTab');
        }
        // END Reload trang và giữ nguyên tab đã active

// ==================================================================//

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
                id_giangvien: $("#form_add_congtac input[name='id_giangvien']").val(),
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
             console.log("Fuck");
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
                         $("#form_edit_congtac input[name='id_giangvien']").val(data.data.id_giangvien);
                         $("#form_edit_congtac input[name='id']").val(data.data.id);
                         $("#form_edit_congtac input[name='ten']").val(data.data.ten);
                         $("#form_edit_congtac input[name='so_gio']").val(data.data.so_gio);
                         $("#form_edit_congtac input[name='thoigian']").val(data.data.thoigian);
                         $("#form_edit_congtac input[name='ghichu']").val(data.data.ghichu);
                         $('#modal_edit_congtac').modal('show');
                     };
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
                     id_giangvien: $("#form_edit_congtac input[name='id_giangvien']").val(),
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
                     };
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
                     };
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
        console.log("Hihi");
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
                id_giangvien: $("#form_add_vanban input[name='id_giangvien']").val(),
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
             console.log("Fuck");
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
                         $("#form_edit_vanban input[name='id_giangvien']").val(data.data.id_giangvien);
                         $("#form_edit_vanban input[name='id']").val(data.data.id);
                         $("#form_edit_vanban input[name='noi_dung']").val(data.data.noi_dung);
                         $("#form_edit_vanban input[name='lanhdao']").val(data.data.lanhdao);
                         $("#form_edit_vanban input[name='thoigian_nhan']").val(data.data.thoigian_nhan);
                         $("#form_edit_vanban input[name='thoigian_den']").val(data.data.thoigian_den);
                         $("#form_edit_vanban input[name='ghichu']").val(data.data.ghichu);
                         $('#modal_edit_vanban').modal('show');
                     };
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
                     id_giangvien: $("#form_edit_vanban input[name='id_giangvien']").val(),
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
                     };
                     if(data.status == true){
                         $('#modal_edit_vanban').modal('hide');
                         swal({
                             "title":"Đã sửa!",
                             "text":"Bạn đã sửa thành công Văn Bản Xử Lý!",
                             "type":"success"
                         }, function() {
                                 localStorage.setItem('activeTab', '#tab_vanban');
                                 location.reload();
                             }
                         );
                     };
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

            // Ajax thêm Hướng Dân Khoa Học
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
                    id_giangvien: $("#form_add_hdkh input[name='id_giangvien']").val(),
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
                            "text":"Bạn đã tạo thành công Hướng Dẫn Khoa Học!",
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
                 $("#form_edit_hdkh input[name='id_giangvien']").val(data.data.id_giangvien);
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
             id_giangvien: $("#form_edit_hdkh input[name='id_giangvien']").val(),
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
                     "text":"Bạn đã sửa thành công Hướng Dẫn Khoa Học!",
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
         title: "Xóa hdkh này?",
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
                                 "text":"Bạn đã xóa thành công Hướng Dẫn Khoa Học!",
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
 // END Xử lý khi click nút xóa hdkh

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
                id_giangvien: $("#form_add_chambai input[name='id_giangvien']").val(),
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
                         // console.log(data.data);
                         $("#form_edit_chambai input[name='id_giangvien']").val(data.data.id_giangvien);
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
                     id_giangvien: $("#form_edit_chambai input[name='id_giangvien']").val(),
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
                                         "text":"Bạn đã xóa thành công chambai!",
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
                id_giangvien: $("#form_add_dang input[name='id_giangvien']").val(),
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
                        "text":"Bạn đã tạo thành công Hoạt Động Đảng!",
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
                         $("#form_edit_dang input[name='id_giangvien']").val(data.data.id_giangvien);
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
                     id_giangvien: $("#form_edit_dang input[name='id_giangvien']").val(),
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
                             "text":"Bạn đã sửa thành công Hoạt Động Đảng!",
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
                 title: "Xóa Hoạt Động Đảng này?",
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
                id_giangvien: $("#form_add_daygioi input[name='id_giangvien']").val(),
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
                        "text":"Bạn đã tạo thành công Dạy Giỏi!",
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
                         $("#form_edit_daygioi input[name='id_giangvien']").val(data.data.id_giangvien);
                         $("#form_edit_daygioi input[name='id']").val(data.data.id);
                         $("#form_edit_daygioi input[name='ten']").val(data.data.ten);
                         $("#form_edit_daygioi input[name='ghichu']").val(data.data.ghichu);
                         $("#form_edit_daygioi input[name='so_gio']").val(data.data.so_gio);
                         $("#form_edit_daygioi select[name='cap']").val(data.data.cap);
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
                     id_giangvien: $("#form_edit_daygioi input[name='id_giangvien']").val(),
                     ten: $("#form_edit_daygioi input[name='ten']").val(),
                     ghichu: $("#form_edit_daygioi input[name='ghichu']").val(),
                     so_gio: $("#form_edit_daygioi input[name='so_gio']").val(),
                     cap: $("#form_edit_daygioi select[name='cap']").val(),
                     thoigian: $("#form_edit_daygioi input[name='thoigian']").val(),

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
                             "text":"Bạn đã sửa thành công Dạy Giỏi!",
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
                                         "text":"Bạn đã xóa thành công Dạy Giỏi!",
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
         // END Xử lý khi click nút xóa Dạy Giỏi
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
                id_giangvien: $("#form_add_xaydung input[name='id_giangvien']").val(),
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
                        "text":"Bạn đã tạo thành công xaydung!",
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
                         $("#form_edit_xaydung input[name='id_giangvien']").val(data.data.id_giangvien);
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
                     id_giangvien: $("#form_edit_xaydung input[name='id_giangvien']").val(),
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
                             "text":"Bạn đã sửa thành công Nghiên Cứu Khoa Học!",
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
                                         "text":"Bạn đã xóa thành công xaydung!",
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
                id_giangvien: $("#form_add_dotxuat input[name='id_giangvien']").val(),
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
                        "text":"Bạn đã tạo thành công dotxuat!",
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
                         $("#form_edit_dotxuat input[name='id_giangvien']").val(data.data.id_giangvien);
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
                     id_giangvien: $("#form_edit_dotxuat input[name='id_giangvien']").val(),
                     ten: $("#form_edit_dotxuat input[name='ten']").val(),
                     ghichu: $("#form_edit_dotxuat input[name='ghichu']").val(),
                     thoigian: $("#form_edit_dotxuat input[name='thoigian']").val(),

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
                             "text":"Bạn đã sửa thành công Nghiên Cứu Khoa Học!",
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
                                         "text":"Bạn đã xóa thành công dotxuat!",
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
                id_giangvien: $("#form_add_hop input[name='id_giangvien']").val(),
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
                        "text":"Bạn đã tạo thành công Cuộc Họp!",
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
                         $("#form_edit_hop input[name='id_giangvien']").val(data.data.id_giangvien);
                         $("#form_edit_hop input[name='id']").val(data.data.id);
                         $("#form_edit_hop input[name='ten']").val(data.data.ten);
                         $("#form_edit_hop input[name='ghichu']").val(data.data.ghichu);
                         $("#form_edit_hop input[name='thoigian']").val(data.data.thoigian);
                         $("#form_edit_hop input[name='so_gio']").val(data.data.so_gio);
                         $('#modal_edit_hop').modal('show');
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
                     id_giangvien: $("#form_edit_hop input[name='id_giangvien']").val(),
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
                             "text":"Bạn đã sửa thành công Cuộc Họp!",
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
                 title: "Xóa hop này?",
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
         // END Xử lý khi click nút xóa Cuộc Họp
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
                id_giangvien: $("#form_add_sangkien input[name='id_giangvien']").val(),
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
                        "text":"Bạn đã tạo thành công sangkien!",
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
                         $("#form_edit_sangkien input[name='id_giangvien']").val(data.data.id_giangvien);
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
                     id_giangvien: $("#form_edit_sangkien input[name='id_giangvien']").val(),
                     ten: $("#form_edit_sangkien input[name='ten']").val(),
                     ghichu: $("#form_edit_sangkien input[name='ghichu']").val(),
                     thoigian: $("#form_edit_sangkien input[name='thoigian']").val(),

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
                             "text":"Bạn đã sửa thành công Nghiên Cứu Khoa Học!",
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
                                         "text":"Bạn đã xóa thành công sangkien!",
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
                id_giangvien: $("#form_add_hoctap input[name='id_giangvien']").val(),
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
                         $("#form_edit_hoctap input[name='id_giangvien']").val(data.data.id_giangvien);
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
                     id_giangvien: $("#form_edit_hoctap input[name='id_giangvien']").val(),
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
                             "text":"Bạn đã sửa thành công Học Tập!",
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
                                         "text":"Bạn đã xóa thành công Học Tập!",
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
