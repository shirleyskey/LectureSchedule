@extends('layouts.master')

@section('title', 'Lịch Tuần')

@section('style')
    <link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css" />
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
                </li>
                <li>
                    <span>Lịch Tuần</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <div class="row">
            <div class="col-md-6">
                @permission('read-users')
                   <div class="btn-group">
                        <a style="margin-top: 20px" id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_tuan"><i class="fa fa-plus"></i> Tạo Lịch Tuần Mới
                            
                        </a>
                    </div> 
                </div>
                @endpermission
            <div class="col-md-6">
              
            </div>

        </div>

        <!-- MESSAGE -->
        @include('partials.flash-message')

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-title">
                    <i class="fa fa-book"></i>
                    <strong>Lịch Tuần Này</strong>
                </h1>
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        @permission('create-giangvien')
                        <div class="table-toolbar">
                            {{-- <div class="row">
                                <div class="col-md-6">
                                    @permission('read-users')
                                       <div class="btn-group">
                                            <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_tuan"><i class="fa fa-plus"></i> Tạo Lịch Tuần Mới
                                                
                                            </a>
                                        </div> 
                                    </div>
                                    @endpermission
                                <div class="col-md-6">
                                  
                                </div>

                            </div> --}}
                        </div>
                        @endpermission
                        <table class="table table-striped table-hover table-bordered" id="ds_tuan_nay">
                            <thead>
                                <tr>
                                    <th> Thứ</th>
                                    <th> Ngày Tháng</th>
                                    <th> Giờ </th>
                                    <th> Địa Điểm </th>
                                    <th> Nội Dung</th>
                                    <th> Thành Phần </th>
                                    <th> Trực Ban</th>
                                    <th> Ghi CHú</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( $t2->count() > 0 )
                                @foreach( $t2 as $v_t2 )
                                
                                <tr>
                                    <td>
                                        Thứ Hai
                                    </td>
                                    <td>
                                        {{ $v_t2->thoi_gian }}
                                    </td>
                                    <td>
                                        {{ $v_t2->gio }}
                                    </td>
                                    <td>
                                        {{ $v_t2->dia_diem }}
                                    </td>
                                    <td>
                                        {{ $v_t2->noi_dung }}
                                    </td>
                                    <td>
                                        {{ $v_t2->thanh_phan }}
                                    </td>
                                    <td>
                                        {{ $v_t2->truc_ban }}
                                    </td>
                                    <td>
                                        {{ $v_t2->ghi_chu }}
                                    </td>
                                    <td>
                                           
                                        @permission('read-users')
                                        <a class="btn_edit_tuan btn btn-xs yellow-gold" data-tuan-id="{{ $v_t2->id }}" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                        <a class="btn_delete_tuan btn btn-xs red-mint" data-tuan-id="{{ $v_t2->id }}" href=""  title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                       @endpermission
                                    </td>
                                </tr>
                                    @endforeach
                                    @endif
                                    @if( $t3->count() > 0 )
                                    @foreach( $t3 as $v_t3 )
                                    <tr>
                                    <td>
                                        Thứ Ba
                                    </td>
                                    <td>
                                        {{ $v_t3->thoi_gian }}
                                    </td>
                                    <td>
                                        {{ $v_t3->gio }}
                                    </td>
                                    <td>
                                        {{ $v_t3->dia_diem }}
                                    </td>
                                    <td>
                                        {{ $v_t3->noi_dung }}
                                    </td>
                                    <td>
                                        {{ $v_t3->thanh_phan }}
                                    </td>
                                    <td>
                                        {{ $v_t3->truc_ban }}
                                    </td>
                                    <td>
                                        {{ $v_t3->ghi_chu }}
                                    </td>
                                    <td>
                                           
                                        @permission('read-users')
                                        <a class="btn_edit_tuan btn btn-xs yellow-gold" data-tuan-id="{{ $v_t3->id }}" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                        <a class="btn_delete_tuan btn btn-xs red-mint" data-tuan-id="{{ $v_t3->id }}" href=""  title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                        @endpermission
                                    </td>
                                </tr>

                                @endforeach
                                @endif
                                @if( $t2->count() > 0 )
                                @foreach( $t4 as $v_t4 )
                                <tr>
                                    <td>
                                        Thứ Tư
                                    </td>
                                    <td>
                                        {{ $v_t4->thoi_gian }}
                                    </td>
                                    <td>
                                        {{ $v_t4->gio }}
                                    </td>
                                    <td>
                                        {{ $v_t4->dia_diem }}
                                    </td>
                                    <td>
                                        {{ $v_t4->noi_dung }}
                                    </td>
                                    <td>
                                        {{ $v_t4->thanh_phan }}
                                    </td>
                                    <td>
                                        {{ $v_t4->truc_ban }}
                                    </td>
                                    <td>
                                        {{ $v_t4->ghi_chu }}
                                    </td>
                                    <td>
                                           
                                        @permission('read-users')
                                        <a class="btn_edit_tuan btn btn-xs yellow-gold" data-tuan-id="{{ $v_t4->id }}" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                        <a class="btn_delete_tuan btn btn-xs red-mint" data-tuan-id="{{ $v_t4->id }}" href=""  title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                       @endpermission
                                    </td>
                                </tr>
                                    @endforeach
                                    @endif
                                    @if( $t2->count() > 0 )
                                    @foreach( $t5 as $v_t5 )
                                    <tr>
                                    <td>
                                        Thứ Năm
                                    </td>
                                    <td>
                                        {{ $v_t5->thoi_gian }}
                                    </td>
                                    <td>
                                        {{ $v_t5->gio }}
                                    </td>
                                    <td>
                                        {{ $v_t5->dia_diem }}
                                    </td>
                                    <td>
                                        {{ $v_t5->noi_dung }}
                                    </td>
                                    <td>
                                        {{ $v_t5->thanh_phan }}
                                    </td>
                                    <td>
                                        {{ $v_t5->truc_ban }}
                                    </td>
                                    <td>
                                        {{ $v_t5->ghi_chu }}
                                    </td>
                                    <td>
                                           
                                        @permission('read-users')
                                        <a class="btn_edit_tuan btn btn-xs yellow-gold" data-tuan-id="{{ $v_t5->id }}" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                        <a class="btn_delete_tuan btn btn-xs red-mint" data-tuan-id="{{ $v_t5->id }}" href=""  title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                       @endpermission
                                    </td>
                                </tr>
                                    @endforeach
                                    @endif

                                    @if( $t6->count() > 0 )
                                    @foreach( $t6 as $v_t6 )
                                    <tr>
                                    <td>
                                        Thứ Sáu
                                    </td>
                                    <td>
                                        {{ $v_t6->thoi_gian }}
                                    </td>
                                    <td>
                                        {{ $v_t6->gio }}
                                    </td>
                                    <td>
                                        {{ $v_t6->dia_diem }}
                                    </td>
                                    <td>
                                        {{ $v_t6->noi_dung }}
                                    </td>
                                    <td>
                                        {{ $v_t6->thanh_phan }}
                                    </td>
                                    <td>
                                        {{ $v_t6->truc_ban }}
                                    </td>
                                    <td>
                                        {{ $v_t6->ghi_chu }}
                                    </td>
                                    <td>
                                           
                                        @permission('read-users')
                                        <a class="btn_edit_tuan btn btn-xs yellow-gold" data-tuan-id="{{ $v_t6->id }}" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                        <a class="btn_delete_tuan btn btn-xs red-mint" data-tuan-id="{{ $v_t6->id }}" href=""  title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                       @endpermission
                                    </td>
                                </tr>
                                    @endforeach
                                    @endif
                                    @if( $t7->count() > 0 )
                                    @foreach( $t7 as $v_t7 )
                                    <tr>
                                    <td>
                                        Thứ Bảy
                                    </td>
                                    <td>
                                        {{ $v_t7->thoi_gian }}
                                    </td>
                                    <td>
                                        {{ $v_t7->gio }}
                                    </td>
                                    <td>
                                        {{ $v_t7->dia_diem }}
                                    </td>
                                    <td>
                                        {{ $v_t7->noi_dung }}
                                    </td>
                                    <td>
                                        {{ $v_t7->thanh_phan }}
                                    </td>
                                    <td>
                                        {{ $v_t7->truc_ban }}
                                    </td>
                                    <td>
                                        {{ $v_t7->ghi_chu }}
                                    </td>
                                    <td>
                                           
                                        @permission('read-users')
                                        <a class="btn_edit_tuan btn btn-xs yellow-gold" data-tuan-id="{{ $v_t7->id }}" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                        <a class="btn_delete_tuan btn btn-xs red-mint" data-tuan-id="{{ $v_t7->id }}" href=""  title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                       @endpermission
                                    </td>
                                </tr>
                                    @endforeach
                                    @endif
                                    @if( $t8->count() > 0 )
                                    @foreach( $t8 as $v_t8 )
                                    <tr>
                                    <td>
                                        Chủ Nhật
                                    </td>
                                    <td>
                                        {{ $v_t8->thoi_gian }}
                                    </td>
                                    <td>
                                        {{ $v_t8->gio }}
                                    </td>
                                    <td>
                                        {{ $v_t8->dia_diem }}
                                    </td>
                                    <td>
                                        {{ $v_t8->noi_dung }}
                                    </td>
                                    <td>
                                        {{ $v_t8->thanh_phan }}
                                    </td>
                                    <td>
                                        {{ $v_t8->truc_ban }}
                                    </td>
                                    <td>
                                        {{ $v_t8->ghi_chu }}
                                    </td>
                                    <td>
                                           
                                        @permission('read-users')
                                        <a class="btn_edit_tuan btn btn-xs yellow-gold" data-tuan-id="{{ $v_t8->id }}" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                        <a class="btn_delete_tuan btn btn-xs red-mint" data-tuan-id="{{ $v_t8->id }}" href=""  title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                       @endpermission
                                    </td>
                                </tr>
                                    @endforeach
                                    @endif
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
                <h1 class="page-title">
                    <i class="fa fa-book"></i>
                    <strong>Danh Sách Tất Cả Lịch Tuần</strong>
                </h1>
                 <!-- BEGIN EXAMPLE TABLE PORTLET-->
                 <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        @permission('create-giangvien')
                        <div class="table-toolbar">
                            <div class="row">
                               
                                <div class="col-md-6">
                                  
                                </div>

                            </div>
                        </div>
                        @endpermission
                        <table class="table table-striped table-hover table-bordered" id="ds_tuan">
                            <thead>
                                <tr>
                                    <th> Thứ</th>
                                    <th> Ngày Tháng</th>
                                    <th> Giờ </th>
                                    <th> Địa Điểm </th>
                                    <th> Nội Dung</th>
                                    <th> Thành Phần </th>
                                    <th> Trực Ban</th>
                                    <th> Ghi CHú</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( $ds_tuan->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $ds_tuan as $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{ $v->thoi_gian }} </td>
                                        <td> {{ $v->gio }} </td>
                                        <td> {{ $v->dia_diem }}  </td>
                                        <td> {{ $v->noi_dung }} </td>
                                        <td> {{ $v->thanh_phan }} </td>
                                        <td> {{ $v->truc_ban }} </td>
                                        <td> {{ $v->ghi_chu }} </td>
                                        <td>
                                           
                                            @permission('read-users')
                                            <a class="btn_edit_tuan btn btn-xs yellow-gold" data-tuan-id="{{ $v->id }}" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_tuan btn btn-xs red-mint" data-tuan-id="{{ $v->id }}" href=""  title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                           @endpermission
                                        </td>
                                    </tr>
                                    @php $stt++; @endphp
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->



{{------------------------------------------------- Modal Add  ---------------------------------------}}
<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_add_tuan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="post" id="form_add_tuan">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Thêm mới Lịch Tuần</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ngày Tháng: <span class="required">*</span></label>
                                    <input  name="thoi_gian" type="datetime-local" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Giờ: <span class="required">*</span></label>
                                    <input  name="gio" type="text" class="form-control" required placeholder="8:00AM - 9:00AM">
                                </div>
                                <div class="form-group">
                                    <label>Địa Điểm: <span class="required">*</span></label>
                                    <input  name="dia_diem" type="text" class="form-control" required placeholder="Nhập địa điểm">
                                </div>
                                <div class="form-group">
                                    <label>Nội Dung: <span class="required">*</span></label>
                                    <input  name="noi_dung" type="text" class="form-control" required placeholder="Nội Dung...">
                                </div>
                                <div class="form-group">
                                    <label>Thành Phần: <span class="required">*</span></label>
                                    <input  name="thanh_phan" type="text" class="form-control" required placeholder="Thành Phần tham gia...">
                                </div>
                                <div class="form-group">
                                    <label>Trực Ban: <span class="required">*</span></label>
                                    <input  name="truc_ban" type="text" class="form-control" required placeholder="Trực ban...">
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú: <span class="required">*</span></label>
                                    <input  name="ghi_chu" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_add_tuan"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

{{----------------------------------------------------- Modal Edit  ----------------------------------}}
<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_edit_tuan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="form_edit_tuan">
                @csrf
                <input value="" name="id" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Chỉnh sửa Lịch Tuần</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ngày Tháng: <span class="required">*</span></label>
                                    <input  name="thoi_gian" type="datetime-local" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Giờ: <span class="required">*</span></label>
                                    <input  name="gio" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Địa Điểm: <span class="required">*</span></label>
                                    <input  name="dia_diem" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Nội Dung: <span class="required">*</span></label>
                                    <input  name="noi_dung" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Thành Phần: <span class="required">*</span></label>
                                    <input  name="thanh_phan" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Trực Ban: <span class="required">*</span></label>
                                    <input  name="truc_ban" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú: <span class="required">*</span></label>
                                    <input  name="ghi_chu" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_edit_tuan"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

{{------------------------------------ END MODAL EDIT  ------------------------}}
@endsection

@section('script')
<script>
    jQuery(document).ready(function() {




        var table = $('#ds_tuan');

        var oTable = table.dataTable({

            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],

            "pageLength": 10,

            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng: _TOTAL_",
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



        // Ajax thêm Lịch Tuần Học mới
    $("#btn_add_tuan").on('click', function(e){
       e.preventDefault();
       console.log("hihi");
       $("#btn_add_tuan").attr("disabled", "disabled");
       $("#btn_add_tuan").html('<i class="fa fa-spinner fa-spin"></i> Lưu');

       $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

       $.ajax({
           url: '{{route('postThemTuan')}}',
           method: 'POST',
           data: {
               thoi_gian: $("#form_add_tuan input[name='thoi_gian']").val(),
               gio: $("#form_add_tuan input[name='gio']").val(),
               dia_diem: $("#form_add_tuan input[name='dia_diem']").val(),
               noi_dung: $("#form_add_tuan input[name='noi_dung']").val(),
               thanh_phan: $("#form_add_tuan input[name='thanh_phan']").val(),
               truc_ban: $("#form_add_tuan input[name='truc_ban']").val(),
               ghi_chu: $("#form_add_tuan input[name='ghi_chu']").val(),
               
           },
           success: function(data) {
                console.log("Hihi");
                $("#btn_add_tuan").removeAttr("disabled");
                $("#btn_add_tuan").html('<i class="fa fa-save"></i> Lưu');
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
                    $('#modal_add_tuan').modal('hide');
                    swal({
                        "title":"Đã tạo!",
                        "text":"Bạn đã tạo thành công Lịch Tuần!",
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
   // END Ajax thêm Bài Học
   //AJAX Tìm Bài Học Theo ID


        $(".btn_edit_tuan").on("click", function(e){
            e.preventDefault();
            var tuan_id = $(this).data("tuan-id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('postTimTuanTheoId') }}',
                method: 'POST',
                data: {
                    id: tuan_id
                },
                success: function(data) {
                    if(data.status == true){
                        console.log(data.data);
                        $("#form_edit_tuan input[name='id']").val(data.data.id);
                        $("#form_edit_tuan input[name='thoi_gian']").val(data.data.thoi_gian);
                        $("#form_edit_tuan input[name='gio']").val(data.data.gio);
                        $("#form_edit_tuan input[name='dia_diem']").val(data.data.dia_diem);
                        $("#form_edit_tuan input[name='noi_dung']").val(data.data.noi_dung);
                        $("#form_edit_tuan input[name='thanh_phan']").val(data.data.thanh_phan);
                        $("#form_edit_tuan input[name='truc_ban']").val(data.data.truc_ban);
                        $("#form_edit_tuan input[name='ghi_chu']").val(data.data.ghi_chu);
                        $('#modal_edit_tuan').modal('show');
                    }
                }
            });
        });
        // END Khi click vào nút sửa tuan, tìm tuan theo id và đỗ dữ liệu vào form

        // Ajax sửa tuan
        $("#btn_edit_tuan").on('click', function(e){
            e.preventDefault();
            $("#btn_edit_tuan").attr("disabled", "disabled");
            $("#btn_edit_tuan").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('postSuaTuan') }}',
                method: 'POST',
                data: {
                    id: $("#form_edit_tuan input[name='id']").val(),
                    thoi_gian: $("#form_edit_tuan input[name='thoi_gian']").val(),
                    gio: $("#form_edit_tuan input[name='gio']").val(),
                    dia_diem: $("#form_edit_tuan input[name='dia_diem']").val(),
                    noi_dung: $("#form_edit_tuan input[name='noi_dung']").val(),
                    thanh_phan: $("#form_edit_tuan input[name='thanh_phan']").val(),
                    truc_ban: $("#form_edit_tuan input[name='truc_ban']").val(),
                    ghi_chu: $("#form_edit_tuan input[name='ghi_chu']").val(),
                    
                },
                success: function(data) {
                    $("#btn_edit_tuan").removeAttr("disabled"); 
                    $("#btn_edit_tuan").html('<i class="fa fa-save"></i> Lưu');
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
                        $('#modal_edit_tuan').modal('hide');
                        swal({
                            "title":"Đã sửa!", 
                            "text":"Bạn đã sửa thành công Lịch Tuần!",
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
        // END Ajax sửa tuan
        
        // Xử lý khi click nút xóa tuan
        $(".btn_delete_tuan").on("click", function(e){
            e.preventDefault();

            var tuan_id = $(this).data("tuan-id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            swal({
                title: "Xóa Lịch Tuần này?",
                text: "Lưu ý: Lịch Tuần này sẽ bị xóa vĩnh viễn!",
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
                            url: '{{ route('postXoaTuan') }}',
                            method: 'POST',
                            data: {
                                id: tuan_id
                            },
                            success: function(data) {
                                console.log(data);
                                if(data.status == true){
                                    swal({
                                        "title":"Đã xóa!", 
                                        "text":"Bạn đã xóa thành công Lịch Tuần!",
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

        // END Xử lý khi click nút xóa Lịch Tuan

    });
</script>
<script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js') }}" type="text/javascript"></script>
@endsection
