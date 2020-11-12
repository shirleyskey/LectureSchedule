@extends('layouts.master')

@section('title', 'Chỉnh sửa Bài Học')

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
                    <a href="{{ route('hocphan.edit.get', $bai->hocphans->id) }}">Học Phần Giảng Dạy</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <i class="fa fa-edit"></i> Chỉnh sửa | {{ $bai->tenbai }} - {{ $bai->hocphans->tenhocphan }}
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
                       
                        {{-- <li>
                            <a href="#tab2" data-toggle="tab">Danh Sách Tiết Học</a>
                        </li> --}}
                    </ul>
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form" id="form_wizard_1">
                        <!-- BEGIN FORM-->
                        @include('bai.edit.form')
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

        //Cấu hình bảng danh sách tiết học
        var table = $('#table_ds_tiet');

        var oTable = table.dataTable({

            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],

            "pageLength": 10,

            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Tiết Học: _TOTAL_",
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
        //End Cấu hình bảng danh sách tiết học
    
         // Ajax thêm TIET
    $("#btn_add_tiet").on('click', function(e){
        
       e.preventDefault();
       $("#btn_add_tiet").attr("disabled", "disabled");
       $("#btn_add_tiet").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
       $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
       $.ajax({
           
           url: '{{route('postThemTiet')}}',
           method: 'POST',
           data: {
               id_bai: $("#form_add_tiet input[name='id_bai']").val(),
               id_lop: $("#form_add_tiet input[name='id_lop']").val(),
               id_hocphan: $("#form_add_tiet input[name='id_hocphan']").val(),
               thoigian: $("#form_add_tiet input[name='thoigian']").val(),
               buoi: $("#form_add_tiet input[name='buoi']").val(),
               ca: $("#form_add_tiet input[name='ca']").val(),
               tiendo: $("#form_add_tiet input[name='tiendo']").val(),
               id_giangvien: $("#form_add_tiet select[name='id_giangvien']").val(),
              
           },
           success: function(data) {
               console.log("Hihi");
               $("#btn_add_tiet").removeAttr("disabled"); 
               $("#btn_add_tiet").html('<i class="fa fa-save"></i> Lưu');
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
                   $('#modal_add_tiet').modal('hide');
                   swal({
                       "title":"Đã tạo!", 
                       "text":"Bạn đã tạo thành công Tiết Học!",
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
   // END Ajax thêm TIET
   //AJAX Tìm TIET Theo ID
        $(".btn_edit_tiet").on("click", function(e){
            e.preventDefault();
            var tiet_id = $(this).data("tiet-id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('postTimTietTheoId') }}',
                method: 'POST',
                data: {
                    id: tiet_id
                },
                success: function(data) {
                    if(data.status == true){
                        // console.log(data.data);
                        $("#form_edit_tiet input[name='id_bai']").val(data.data.id_bai);
                        $("#form_edit_tiet input[name='id']").val(data.data.id);
                        $("#form_edit_tiet input[name='id_lop']").val(data.data.id_lop);
                        $("#form_edit_tiet input[name='id_hocphan']").val(data.data.id_hocphan);
                        $("#form_edit_tiet input[name='thoigian']").val(data.data.thoigian);
                        $("#form_edit_tiet input[name='buoi']").val(data.data.buoi);
                        $("#form_edit_tiet input[name='ca']").val(data.data.ca);
                        $("#form_edit_tiet input[name='tiendo']").val(data.data.tiendo);
                        $("#form_edit_tiet select[name='id_giangvien']").val(data.data.id_giangvien);
                        
                        $('#modal_edit_tiet').modal('show');
                    }
                }
            });
        });
        // END Khi click vào nút sửa TIET, tìm TIET theo id và đỗ dữ liệu vào form

        
        // Ajax sửa TIET
        $("#btn_edit_tiet").on('click', function(e){
            e.preventDefault();
            $("#btn_edit_tiet").attr("disabled", "disabled");
            $("#btn_edit_tiet").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('postSuaTiet') }}',
                method: 'POST',
                data: {
                    id: $("#form_edit_tiet input[name='id']").val(),
                    id_bai: $("#form_edit_tiet input[name='id_bai']").val(),
                    id_lop: $("#form_edit_tiet input[name='id_lop']").val(),
                    id_hocphan: $("#form_edit_tiet input[name='id_hocphan']").val(),
                    thoigian: $("#form_edit_tiet input[name='thoigian']").val(),
                    buoi: $("#form_edit_tiet input[name='buoi']").val(),
                    ca: $("#form_edit_tiet input[name='ca']").val(),
                    tiendo: $("#form_edit_tiet input[name='tiendo']").val(),
                    id_giangvien: $("#form_edit_tiet select[name='id_giangvien']").val(),
                },
                success: function(data) {
                    $("#btn_edit_tiet").removeAttr("disabled"); 
                    $("#btn_edit_tiet").html('<i class="fa fa-save"></i> Lưu');
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
                        $('#modal_edit_tiet').modal('hide');
                        swal({
                            "title":"Đã sửa!", 
                            "text":"Bạn đã sửa thành công Tiết Học!",
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
        // END Ajax sửa TIET
        
        // Xử lý khi click nút xóa TIET
        $(".btn_delete_tiet").on("click", function(e){
            e.preventDefault();
            var tiet_id = $(this).data("tiet-id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            swal({
                title: "Xóa TIET này?",
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
                            url: '{{ route('postXoaTiet') }}',
                            method: 'POST',
                            data: {
                                id: tiet_id
                            },
                            success: function(data) {
                                console.log(data);
                                if(data.status == true){
                                    swal({
                                        "title":"Đã xóa!", 
                                        "text":"Bạn đã xóa thành công Tiết Học!",
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
        // END Xử lý khi click nút xóa TIET
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