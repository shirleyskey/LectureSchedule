@extends('layouts.master')

@section('title', 'Chỉnh sửa Học Phần')

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
                    <a href="{{ route('hocphan.index') }}">Danh Sách Học Phần</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <i class="fa fa-edit"></i> Chỉnh sửa | {{ $hocphan->tenhocphan }} - {{ $hocphan->lops->tenlop }}
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
                            <a href="" data-toggle="tab">Thông tin</a>
                        </li>
                        {{--  --}}
                    </ul>
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form" id="form_wizard_1">
                        <!-- BEGIN FORM-->
                        @include('hocphan.edit.form')
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
        //START CẤU HÌNH bảng Danh sách Bài Học
       
        //END Cấu Hình bảng danh sách bài học
        // Ajax thêm Bài Học mới
    $("#btn_add_bai").on('click', function(e){
       e.preventDefault();
       console.log("hihi");
       $("#btn_add_bai").attr("disabled", "disabled");
       $("#btn_add_bai").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
       $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
       $.ajax({
           url: '{{route('postThemBai')}}',
           method: 'POST',
           data: {
               id_hocphan: $("#form_add_bai input[name='id_hocphan']").val(),
               tenbai: $("#form_add_bai input[name='tenbai']").val(),
               sotiet: $("#form_add_bai input[name='sotiet']").val(),
               gvchinh: $("#form_add_bai select[name='gvchinh']").val(),
               gvphu: $("#form_add_bai select[name='gvphu']").val(),
               lythuyet:null,
               xemina:null,
               thuchanh:null,
               lythuyet_phu:null,
               xemina_phu:null,
               thuchanh_phu:null,
           success: function(data) {
               console.log("haua");
               $("#btn_add_bai").removeAttr("disabled"); 
               $("#btn_add_bai").html('<i class="fa fa-save"></i> Lưu');
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
                    $('#modal_add_bai').modal('hide');
                    swal({
                        "title":"Đã tạo!", 
                        "text":"Bạn đã tạo thành công Bài!",
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
   // END Ajax thêm Bài Học
   //AJAX Tìm Bài Học Theo ID
        $(".btn_edit_bai").on("click", function(e){
            e.preventDefault();
            var bai_id = $(this).data("bai-id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('postTimBaiTheoId') }}',
                method: 'POST',
                data: {
                    id: bai_id
                },
                success: function(data) {
                    if(data.status == true){
                        // console.log(data.data);
                        $("#form_edit_bai input[name='id_hocphan']").val(data.data.id_hocphan);
                        $("#form_edit_bai input[name='id']").val(data.data.id);
                        $("#form_edit_bai input[name='tenbai']").val(data.data.tenbai);
                        $("#form_edit_bai input[name='sotiet']").val(data.data.sotiet);
                        $("#form_edit_bai select[name='gvchinh']").val(data.data.gvchinh);
                        $("#form_edit_bai select[name='gvphu']").val(data.data.gvphu);
                        $('#modal_edit_bai').modal('show');
                    }
                }
            });
        });
        // END Khi click vào nút sửa BAI, tìm BAI theo id và đỗ dữ liệu vào form

        // Ajax sửa BAI
        $("#btn_edit_bai").on('click', function(e){
            e.preventDefault();
            $("#btn_edit_bai").attr("disabled", "disabled");
            $("#btn_edit_bai").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('postSuaBai') }}',
                method: 'POST',
                data: {
                    id: $("#form_edit_bai input[name='id']").val(),
                    id_hocphan: $("#form_edit_bai input[name='id_hocphan']").val(),
                    sotiet: $("#form_edit_bai input[name='sotiet']").val(),
                    tenbai: $("#form_edit_bai input[name='tenbai']").val(),
                    gvchinh: $("#form_edit_bai select[name='gvchinh']").val(),
                    gvphu: $("#form_edit_bai select[name='gvphu']").val(),
                    lythuyet:null,
                    xemina:null,
                    thuchanh:null,
                    lythuyet_phu:null,
                    xemina_phu:null,
                    thuchanh_phu:null,
                },
                success: function(data) {
                    $("#btn_edit_bai").removeAttr("disabled"); 
                    $("#btn_edit_bai").html('<i class="fa fa-save"></i> Lưu');
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
                        $('#modal_edit_bai').modal('hide');
                        swal({
                            "title":"Đã sửa!", 
                            "text":"Bạn đã sửa thành công Bài Học!",
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
        // END Ajax sửa BAI
        
        // Xử lý khi click nút xóa BAI
        $(".btn_delete_bai").on("click", function(e){
            e.preventDefault();

            var bai_id = $(this).data("bai-id");
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
                            url: '{{ route('postXoaBai') }}',
                            method: 'POST',
                            data: {
                                id: bai_id
                            },
                            success: function(data) {
                                console.log(data);
                                if(data.status == true){
                                    swal({
                                        "title":"Đã xóa!", 
                                        "text":"Bạn đã xóa thành công Bài Học!",
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