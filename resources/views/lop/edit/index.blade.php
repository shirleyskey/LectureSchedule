@extends('layouts.master')

@section('title', 'Chỉnh sửa Lớp')

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
                    <a href="{{ route('lop.index') }}">Danh Sách Lớp Học</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <i class="fa fa-edit"></i> Chỉnh sửa | {{ $lop->tenlop }} - QUY MÔ: {{ $lop->quymo }}
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
                            <a href="#tab2" data-toggle="tab">Danh Sách Học Phần</a>
                        </li>
                    </ul>
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form" id="form_wizard_1">
                        <!-- BEGIN FORM-->
                        @include('lop.edit.form')
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

         // Ajax thêm Học Phần
    $("#btn_add_hocphan").on('click', function(e){
        
       e.preventDefault();
       $("#btn_add_hocphan").attr("disabled", "disabled");
       $("#btn_add_hocphan").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
       $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
       $.ajax({
           
           url: '{{route('postThemHocPhan')}}',
           method: 'POST',
           data: {
               id_lop: $("#form_add_hocphan input[name='id_lop']").val(),
               tenhocphan: $("#form_add_hocphan input[name='tenhocphan']").val(),
               sotiet: $("#form_add_hocphan input[name='sotiet']").val(),
               sotinchi: $("#form_add_hocphan input[name='sotinchi']").val(),
               mahocphan: $("#form_add_hocphan input[name='mahocphan']").val(),
               start: $("#form_add_hocphan input[name='start']").val(),
               end: $("#form_add_hocphan input[name='end']").val(),
              
           success: function(data) {
               console.log("Hihi");
               $("#btn_add_hocphan").removeAttr("disabled"); 
               $("#btn_add_hocphan").html('<i class="fa fa-save"></i> Lưu');
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
                    $('#modal_add_hocphan').modal('hide');
                    swal({
                        "title":"Đã tạo!", 
                        "text":"Bạn đã tạo thành công HOCPHAN!",
                        "type":"success"
                    }, function() {
                            localStorage.setItem('activeTab', '#tab2');
                            location.reload();
                        }
                    );
                }
           }
           }
       });
   });

   // END Ajax thêm Học Phần
   //AJAX Tìm Học Phần Theo ID
        $(".btn_edit_hocphan").on("click", function(e){
            e.preventDefault();
            var hocphan_id = $(this).data("hocphan-id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('postTimHocPhanTheoId') }}',
                method: 'POST',
                data: {
                    id: hocphan_id
                },
                success: function(data) {
                    if(data.status == true){
                        // console.log(data.data);
                        $("#form_edit_hocphan input[name='id_lop']").val(data.data.id_lop);
                        $("#form_edit_hocphan input[name='id']").val(data.data.id);
                        $("#form_edit_hocphan input[name='tenhocphan']").val(data.data.tenhocphan);
                        $("#form_edit_hocphan input[name='sotiet']").val(data.data.sotiet);
                        $("#form_edit_hocphan input[name='sotinchi']").val(data.data.sotinchi);
                        $("#form_edit_hocphan input[name='mahocphan']").val(data.data.mahocphan);
                        $("#form_edit_hocphan input[name='start']").val(data.data.start);
                        $("#form_edit_hocphan input[name='end']").val(data.data.end);
                        $('#modal_edit_hocphan').modal('show');
                    }
                }
            });
        });
        // END Khi click vào nút sửa HOCPHAN, tìm HOCPHAN theo id và đỗ dữ liệu vào form

        
        // Ajax sửa HOCPHAN
        $("#btn_edit_hocphan").on('click', function(e){
            e.preventDefault();
            $("#btn_edit_hocphan").attr("disabled", "disabled");
            $("#btn_edit_hocphan").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('postSuaHocPhan') }}',
                method: 'POST',
                data: {
                    id: $("#form_edit_hocphan input[name='id']").val(),
                    id_lop: $("#form_edit_hocphan input[name='id_lop']").val(),
                    sotiet: $("#form_edit_hocphan input[name='sotiet']").val(),
                    tenhocphan: $("#form_edit_hocphan input[name='tenhocphan']").val(),
                    sotinchi: $("#form_edit_hocphan input[name='sotinchi']").val(),
                    mahocphan: $("#form_edit_hocphan input[name='mahocphan']").val(),
                    start: $("#form_edit_hocphan input[name='start']").val(),
                    end: $("#form_edit_hocphan input[name='end']").val(),
                },
                success: function(data) {
                    $("#btn_edit_hocphan").removeAttr("disabled"); 
                    $("#btn_edit_hocphan").html('<i class="fa fa-save"></i> Lưu');
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
                        $('#modal_edit_hocphan').modal('hide');
                        swal({
                            "title":"Đã sửa!", 
                            "text":"Bạn đã sửa thành công Học Phần!",
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
        // END Ajax sửa HOCPHAN
        
        // Xử lý khi click nút xóa HOCPHAN
        $(".btn_delete_hocphan").on("click", function(e){
            e.preventDefault();

            var hocphan_id = $(this).data("hocphan-id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            swal({
                title: "Xóa Học Phần này?",
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
                            url: '{{ route('postXoaHocPhan') }}',
                            method: 'POST',
                            data: {
                                id: hocphan_id
                            },
                            success: function(data) {
                                console.log(data);
                                if(data.status == true){
                                    swal({
                                        "title":"Đã xóa!", 
                                        "text":"Bạn đã xóa thành công HOCPHAN!",
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
        // END Xử lý khi click nút xóa HOCPHAN
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