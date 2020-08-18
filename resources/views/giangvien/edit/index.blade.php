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
                    <a href="{{ route('giangvien.index') }}">Giảng Viên Khoa ANĐT</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <i class="fa fa-edit"></i> Chỉnh sửa | {{ $giangvien->ten }} - {{ $giangvien->chucvu }}
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
                            <a href="#tab11" data-toggle="tab">Giờ Giảng</a>
                        </li>
                        <li>
                            <a href="#tab12" data-toggle="tab">Tổng Hợp Giờ</a>
                        </li>
                        <li>
                            <a href="#tab2" data-toggle="tab">NCKH</a>
                        </li>
                        <li>
                            <a href="#tab3" data-toggle="tab">Công Tác</a>
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
    $(document).ready(function()
    {
        // Reload trang và giữ nguyên tab đã active
        var activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            $('a[href="' + activeTab + '"]').tab('show');
            localStorage.removeItem('activeTab');
        }
        // END Reload trang và giữ nguyên tab đã active

       
    $("#btn_add_nckh").on('click', function(e){
        
       e.preventDefault();
       $("#btn_add_nckh").attr("disabled", "disabled");
       $("#btn_add_nckh").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
       $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
         // Ajax thêm NCKH
       $.ajax({
           
           url: '{{route('postThemNckh')}}',
           method: 'POST',
           data: {
               id_giangvien: $("#form_add_nckh input[name='id_giangvien']").val(),
               ten: $("#form_add_nckh input[name='ten']").val(),
               tiendo: $("#form_add_nckh input[name='tiendo']").val(),
               thoigian: $("#form_add_nckh input[name='thoigian']").val(),
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
   // END Ajax thêm NCKH
   //AJAX Tìm NCKH Theo ID
        $(".btn_edit_nckh").on("click", function(e){
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
                        $("#form_edit_nckh input[name='id_giangvien']").val(data.data.id_giangvien);
                        $("#form_edit_nckh input[name='id']").val(data.data.id);
                        $("#form_edit_nckh input[name='ten']").val(data.data.ten);
                        $("#form_edit_nckh input[name='tiendo']").val(data.data.tiendo);
                        $("#form_edit_nckh input[name='thoigian']").val(data.data.thoigian);
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
                    id_giangvien: $("#form_edit_nckh input[name='id_giangvien']").val(),
                    ten: $("#form_edit_nckh input[name='ten']").val(),
                    tiendo: $("#form_edit_nckh input[name='tiendo']").val(),
                    thoigian: $("#form_edit_nckh input[name='thoigian'").val(),
                   
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


<script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery.input-ip-address-control-1.0.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/icheck/icheck.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js') }}" type="text/javascript"></script>
@endsection