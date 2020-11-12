@extends('layouts.master')

@section('title', 'Thông tin Học Phần Chuyên Môn')

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
                    <a href="{{ route('hocphan.index') }}">Danh Sách Tất Cả Học Phần Chuyên Môn</a>
                    <i class="fa fa-circle"></i>
                <a href="{{ route('lop.read.get',$hocphan->id_lop ) }}">Học Phần Chuyên Môn Của Lớp {{ $hocphan->lops->tenlop}}</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <strong>
            <i class="fa fa-book"></i> {{ $hocphan->tenhocphan }} </strong> - {{ ($hocphan->id_lop) ? $hocphan->lops->tenlop : ''}}
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
                                                <label class="control-label col-md-4 col-xs-6 bold">Tên Lớp:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $hocphan->lops->tenlop }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Mã Học Phần:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $hocphan->mahocphan }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Tên Học Phần:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $hocphan->tenhocphan }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Số Tiết:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $hocphan->sotiet }}</label>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Số Tín Chỉ:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $hocphan->sotinchi }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Số Bài:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $hocphan->bais->count() }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Bắt Đầu:</label>:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $hocphan->start }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Kết Thúc:</label>:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $hocphan->end }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END TAB 1-->
                            <!-- BEGIN TAB 2-->
                            <h2 class="text-center bold">Danh Sách Bài Học</h2>
                            <div class="" id="">
                                @if($bai->isNotEmpty())
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên Bài</th>
                                                    <th> Số Tiết</th>
                                                    <th> Giảng Viên Chính</th>
                                                    <th> Giảng Viên Phụ</th>
                                                    <th> Hành Động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( $bai->count() > 0 )
                                                    @php $stt = 1; @endphp
                                                    @foreach( $bai as $v )
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> {{ $v->tenbai }} </td>
                                                        <td> {{ $v->sotiet }} </td>
                                                        <td> {{ ($v->gvchinh) ? $v->giangvienchinhs->ten : '' }} </td>
                                                        <td>
                                                            @php
                                                                $gvphu = json_decode($v->gvphu, true);
                                                            @endphp
                                                                @if($gvphu != null)
                                                                @foreach($gvphu as $key => $value)
                                                                @if(App\GiangVien::where('id', $value)->first() !== null)
                                                                    <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}} </p>
                                                                @endif
                                                                @endforeach
                                                                @endif
                                                        </td>
                                                        <td>
                                                            @permission('read-bai')
                                                            <a class="btn btn-xs blue-sharp" href="{{ route('bai.read.get', $v->id) }}" title="Xem"> <i class="fa fa-eye"></i> Xem</a>
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
                                @else
                                    <div class="alert alert-danger" style="margin-bottom: 0px;">
                                        <p> Chưa có bài học nào!</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END BEGIN TAB 2-->

                             <!-- BEGIN TAB 3 DANH SÁCH TIẾT HỌC-->
                             <h2 class="text-center bold">Danh Sách Tiết Học</h2>
                            <div class="" id="">
                                @if($tiet->isNotEmpty())
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_tiet">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên Bài</th>
                                                    <th> Thời Gian</th>
                                                    <th> Buổi</th>
                                                    <th> Ca</th>
                                                    <th> Giảng Viên</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( $tiet->count() > 0 )
                                                    @php $stt = 1; @endphp
                                                    @foreach( $tiet as $v )
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> {{ ($v->id_bai) ? $v->bais->tenbai : '' }} </td>
                                                        <td> {{ $thoigian = Carbon\Carbon::parse($v->thoigian)->format('Y-d-m') }} </td>
                                                        <td> {{ $v->buoi }} </td>
                                                        <td> {{ $v->ca }} </td>
                                                        <td> {{ ($v->id_giangvien) ? $v->giangviens->ten : '' }} </td>
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
                                        <p> Chưa có Tiết Học nào!</p>
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
        var table = $('#table_ds_hd');
        var oTable = table.dataTable({

            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_",
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
                "info": "Trang hiển thị _PAGE_ / _PAGES_",
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
        // END Cấu hình bảng ds hợp đồng
    });
</script>
<script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js') }}" type="text/javascript"></script>
@endsection
