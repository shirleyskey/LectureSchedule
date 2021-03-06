@extends('layouts.master')

@section('title', 'Thông tin Lớp Học')

@section('style')
    <link href="{{ asset('assets/global/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
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
                    <a href="{{ route('lop.index') }}">Quay lại Danh Sách Lớp Học</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <strong>
            <i class="fa fa-building-o"></i> Lớp: {{ $lop->tenlop }}
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
        <div class="row">
            <div class="col-md-12">
                <div class="tabbable tabbable-tabdrop">
                    <ul class="nav nav-pills">
                        <li class="active">
                            <a href="#tab1" data-toggle="tab">Thông tin Lớp học</a>
                        </li>
                        <li>
                            <a href="#tab2" data-toggle="tab">Danh Sách Học Phần</a>
                        </li>
                    </ul>
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form" id="form_wizard_1">
                        <!-- BEGIN FORM-->
                        <div class="tab-content">
                            <!-- BEGIN TAB 1-->
                            <div class="tab-pane active" id="tab1">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Mã Lớp:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $lop->malop }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Tên Lớp:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $lop->tenlop }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Quy Mô:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $lop->quymo }}</label>
                                            </div>
                                           
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Hệ:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ ($lop->he == 1) ? 'Tính Giờ' : 'Tính Tiền' }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Số Học Phần:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $hocphan->count() }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END TAB 1-->
                            <!-- BEGIN TAB 2-->
                            <div class="tab-pane" id="tab2">
                                @if($hocphan->isNotEmpty())
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_hp">
                                            <thead>
                                                <tr>
                                                    <th style="width:20px!important" class="small-column"> STT</th>
                                                    <th> Mã Học Phần</th>
                                                    <th> Tên Học Phần</th>
                                                    <th> Số Tiết</th>
                                                    <th> Số Tín Chỉ</th>
                                                    <th> Số Bài</th>
                                                    <th> Bắt Đầu</th>
                                                    <th> Kết Thúc</th>
                                                    <th> Hành Động</th>
                                                </tr>
                                            </thead>
                                                <tbody>
                                                    @if( $hocphan->count() > 0 )
                                                        @php $stt = 1; @endphp
                                                        @foreach( $hocphan as $v )
                                                        @php 
                                                            $so_tiet = 0;
                                                            $is_tiet = App\Tiet::where('id_hocphan', $v->id);
                                                            if($is_tiet){
                                                                $tiet_hocphans = App\Tiet::where('id_hocphan', $v->id)->get();
                                                                $start = App\Tiet::where('id_hocphan', $v->id)->orderBy('thoigian', 'asc')->first();
                                                                $end = App\Tiet::where('id_hocphan', $v->id)->orderBy('thoigian', 'desc')->first();
                                                                $start_result = ($start) ? $start->thoigian : null;
                                                                $end_result = ($end) ? $end->thoigian : null;
                                                                foreach($tiet_hocphans as $v_tiet_hocphan){
                                                                    $so_tiet += $v_tiet_hocphan->so_tiet;
                                                                }
                                                            }
                                                        @endphp
                                                        <tr>
                                                            <td> {{ $stt }} </td>
                                                            <td> {{ $v->mahocphan }} </td>
                                                            <td> {{ $v->tenhocphan }} </td>
                                                            <td> {{ $so_tiet }}  </td>
                                                            <td> {{ $v->sotinchi }} </td>
                                                            <td> 
                                                            @php 
                                                                 $sobai = App\Bai::where('id_hocphan', $v->id)->get()->count();  
                                                                 echo $sobai;
                                                            @endphp
                                                             </td>
                                                            <td>{{ $start_result }} </td>
                                                            <td> {{  $end_result }} </td>
                                                           
                                                           
                                                            <td>
                                                                @permission('read-hocphan')
                                                                <a class="btn btn-xs blue-sharp" href="{{ route('hocphan.read.get', $v->id) }}" title="Xem"> <i class="fa fa-eye"></i> Xem</a>
                                                                @endpermission
                                                                {{-- @permission('update-hocphan')
                                                                <a class="btn btn-xs yellow-gold" href="{{ route('hocphan.edit.get', $v->id) }}" title="Sửa"> <i class="fa fa-edit"></i> Sửa</a>
                                                                @endpermission --}}
                                                                {{-- @permission('delete-hocphan')
                                                                <a class="btn btn-xs red-mint" href="{{ route('hocphan.delete.get', $v->id) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa Học Phần này không?');" title="Xóa"> <i class="fa fa-trash"></i> Xóa</a>
                                                                @endpermission --}}
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
                                        <p> Không có Học Phần nào!</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END BEGIN TAB 2-->
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
    $(document).ready(function(){
        // Cấu hình bảng ds hợp đồng
        var table = $('#table_ds_hp');
        var oTable = table.dataTable({
            "autoWidth":false,
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_",
                "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Học Phần: _TOTAL_",
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
            },
            { "width": "30px", "targets": 0 },
            { "width": "150px", "targets": 1 },
            { "width": "150px", "targets": 2 },
            { "width": "60px", "targets": 3 },
            { "width": "80px", "targets": 4 },
            { "width": "60px", "targets": 5 },
            { "width": "100px", "targets": 6 },
            { "width": "100px", "targets": 7 },
            { "width": "60px", "targets": 8 },],
            "order": [
                // [0, "asc"]
            ] // set first column as a default sort by asc
        });
        // END Cấu hình bảng ds hợp đồng
    });
</script>
<script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js') }}" type="text/javascript"></script>
@endsection