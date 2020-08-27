@extends('layouts.master')

@section('title', 'Danh sách NCKH')

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
                    <span>Thống kê Khoa Học</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <strong>
                <i class="fa fa-file-code-o"></i>
                THỐNG KÊ KHOA HỌC
            </strong>
        </h1>

        <!-- MESSAGE -->
        @include('partials.flash-message')

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
            <div class="col-md-12">
                <div class="tabbable tabbable-tabdrop">
                    <ul class="nav nav-pills" id="#myTab">
                        <li class="active">
                            <a href="#tab1" data-toggle="tab">Đề Tài Cấp Bộ</a>
                        </li>
                        <li>
                            <a href="#tab11" data-toggle="tab">Đề Tài Cấp Cơ Sở</a>
                        </li>
                        <li>
                            <a href="#tab12" data-toggle="tab">Tập Bài Giảng</a>
                        </li>
                        <li>
                            <a href="#tab2" data-toggle="tab">Chuyên Đề</a>
                        </li>
                        <li>
                            <a href="#tab3" data-toggle="tab">Tài Liệu Tham Khảo</a>
                        </li>
                        <li>
                            <a href="#tab4" data-toggle="tab">Sáng Kiến Cải Tiến</a>
                        </li>
                        <li>
                            <a href="#tab5" data-toggle="tab">Bài Báo Khoa Học</a>
                        </li>
                    </ul>
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form" id="form_wizard_1">
                        <!-- BEGIN FORM-->
                        <div class="tab-content">
                            <!-- BEGIN TAB 1 NCKH-->
                            <div class="tab-pane" id="tab1">
                                @if($capbo->isNotEmpty())
                                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                    <div class="portlet light portlet-fit bordered">
                                        <div class="portlet-body">
                                            <div class="table-toolbar">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="btn-group">
                                                            <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_nckh"><i class="fa fa-plus"></i> Tạo NCKH
                                                                
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                                <thead>
                                                    <tr>
                                                        <th> STT</th>
                                                        <th style="width: 20%;"> Tên Đề Tài</th>
                                                        <th> Chủ Biên</th>
                                                        <th> Tham Gia</th>
                                                        <th> Bắt Đầu</th>
                                                        <th> Kết Thúc</th>
                                                        <th> Số Trang</th>
                                                        <th> Số Giờ</th>
                                                        <th> Hành Động</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if( $capbo->count() > 0 )
                                                        @php $stt = 1; @endphp
                                                        @foreach( $capbo as $v )
                                                        <tr>
                                                            <td> {{ $stt }} </td>
                                                            <td> {{ $v->ten }} </td>
                                                            <td> 
                                                                @php
                                                                    $chubien = json_decode( $v->chubien, true);
                                                                @endphp
                                                                    @foreach($chubien as $key => $value)
                                                                       {{$tengv = App\GiangVien::where('id', $value)->first()->ten}} 
                                                                       
                                                                        
                                                                    @endforeach
                                                            </td>
                                                            <td> {{ $v->thamgia }} </td>
                                                            <td> {{$v->batdau}}</td>
                                                            <td> {{$v->ketthuc}}</td>
                                                            <td> {{$v->sotrang}}</td>
                                                            <td> </td>
                                                            <td>
                                                                <a data-nckh-id="{{ $v->id }}" class="btn_edit_nckh btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                                <a class="btn_delete_nckh btn btn-xs red-mint" href="#" data-nckh-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                                @else
                                    <div class="alert alert-danger" style="margin-bottom: 0px;">
                                        <p> Không có đề tài cấp bộ nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_nckh"><i class="fa fa-plus"></i> Tạo Đề Tài</a></p>
                                    </div>
                                @endif
                            </div>
                            <!-- END TAB 2-->

                        </div>
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
    jQuery(document).ready(function() {
        var table = $('#ds_nckh');

        var oTable = table.dataTable({

            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],

            "pageLength": 10,
    
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Nckh: _TOTAL_",
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
                    window.location.href = "{{ route('nckh.import-excel.get') }}";
                });
        });
    });
</script>

<!-- <script src="{{ asset('assets/global/scripts/datatable.js') }}" type="text/javascript"></script> -->
<script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js') }}" type="text/javascript"></script>
@endsection