@extends('layouts.master')

@section('title', 'Danh sách Giảng viên')

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
                    <span>Danh Sách Giảng Viên</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <i class="fa fa-list-ul"></i>
            Danh Sách Giảng Viên
        </h1>

        <!-- MESSAGE -->
        @include('partials.flash-message')

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        @permission('create-giangvien')
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" href="{{ route('giangvien.add.get') }}"><i class="fa fa-plus"></i> Thêm mới
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group pull-right">
                                        <button class="btn green btn-outline dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i> Công cụ
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a id="import-excel" href="#"><i class="glyphicon glyphicon-folder-open"></i> Nhập Excel </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('giangvien.export-excel.get') }}"><i class="glyphicon glyphicon-download-alt"></i> Xuất Excel </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endpermission
                        <table class="table table-striped table-hover table-bordered" id="ds_nguoi_dung">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên </th>
                                    <th> Chức Vụ </th>
                                    <th> Hệ Số Lương</th>
                                    <th> Địa Chỉ </th>
                                    <th> Chức Danh</th>
                                    <th> Trình Độ</th>
                                    <th> Có Thể Giảng</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( $ds_giangvien->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $ds_giangvien as $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td> 
                                            <a href="{{ route('giangvien.read.get', $v->id) }}">{{ $v->ten }}</a> 
                                        </td>
                                        <td> {{ $v->chucvu }}  </td>
                                        <td> {{ $v->hesoluong }} </td>
                                        <td> {{ $v->diachi }} </td>
                                        <td> {{ $v->chucdanh }} </td>
                                        <td> {{ $v->trinhdo }} </td>
                                       
                                        <td> 
                                            @if( $v->cothegiang ==1 )
                                            <span class="label label-sm label-success" style="font-size: 12px;"> Có Thể Giảng </span>
                                            @else
                                            <span class="label label-sm label-danger" style="font-size: 12px;"> Không Giảng </span>
                                            @endif
                                        </td>
                                        <td>
                                            @permission('read-giangvien')
                                            <a class="btn btn-xs blue-sharp" href="{{ route('giangvien.read.get', $v->id) }}" title="Xem"> <i class="fa fa-eye"></i> Xem</a>
                                            @endpermission
                                            @permission('update-giangvien')
                                            <a class="btn btn-xs yellow-gold" href="{{ route('giangvien.edit.get', $v->id) }}" title="Sửa"> <i class="fa fa-edit"></i> Sửa</a>
                                            @endpermission
                                            @permission('delete-giangvien')
                                            <a class="btn btn-xs red-mint" href="{{ route('giangvien.delete.get', $v->id) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa Giảng Viên này không?');" title="Xóa"> <i class="fa fa-trash"></i> Xóa</a>
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

@endsection

@section('script')
<script>
    jQuery(document).ready(function() {
        var table = $('#ds_nguoi_dung');

        var oTable = table.dataTable({

            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],

            "pageLength": 10,
    
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng nhân sự: _TOTAL_",
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

        $("#import-excel").on("click", function(e){
            e.preventDefault();
            swal({
                title: "Bạn có chắc không?",
                text: "Vui lòng tham khảo người quản trị trước khi làm điều này!",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: 'Hủy bỏ',
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Chắc chắn!",
                closeOnConfirm: false
                },
                function(){
                    window.location.href = "{{ route('giangvien.import-excel.get') }}";
                });
        });
    });
</script>

<!-- <script src="{{ asset('assets/global/scripts/datatable.js') }}" type="text/javascript"></script> -->
<script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js') }}" type="text/javascript"></script>
@endsection