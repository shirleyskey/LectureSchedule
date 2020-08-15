@extends('layouts.master')

@section('title', 'Bảng điều khiển')

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
                    <span>Bảng điều khiển / Phân công lịch giảng</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title text-center"> Bảng Phân Công Lịch Giảng
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
          
           <div class="col-md-12">
            <div class="tab-pane" id="tab4">
                @if($lop->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <table class="table table-striped table-hover table-bordered" id="table_ds_phancong">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Lớp</th>
                                    <th> Học Phần</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @if( $lop->count() > 0 )
                                    @php 
                                    $stt = 1;
                                    @endphp
                                    @foreach( $lop as $v )
                                    @php
                                    $ds_hocphan = App\Hocphan::where('id_lop', $v->id)->get();
                                    @endphp
                                    <tr>
                                        {{-- cột STT  --}}
                                        <td > {{ $stt }} </td>
                                        {{-- Cột Tên Lớp --}}
                                        <td > {{ $v->tenlop }} </td>
                                        <td>
                                            @foreach($ds_hocphan as $v_hocphan)
                                            {{-- Mỗi lớp có một bảng học phần của lớp đó  --}}
                                            <table class="table table-striped table-hover table-bordered">
                                                <tr>
                                                <th class="text-center" colspan="{{($v_hocphan->sobai) + 1}}"> 
                                                    <b>{{$v_hocphan->tenhocphan}} - {{$v_hocphan->sotiet}}t</b> 
                                                    <br>
                                                    <span>{{$v_hocphan->start}} - {{$v_hocphan->end}} </span> 
                                                </th>
                                                </tr>
                                                <tr>
                                                    @php
                                                        $ds_bai = App\Bai::where('id_hocphan', $v_hocphan->id)->get();
                                                    @endphp
                                                   @foreach ($ds_bai as $v_bai)
                                                <td>{{$v_bai->tenbai}} - {{$v_bai->sotiet}}t</td>
                                                   @endforeach
                                                    
                                                </tr>
                                            </table>
                                           
                                            @endforeach
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
                        <p>Chưa có Phân Công Lịch Giảng</p>
                    </div>
                @endif
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
        var table_phancong = $('#table_ds_phancong');

        var oTable_phancong = table_phancong.dataTable({

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

      
    });
</script>

<!-- <script src="{{ asset('assets/global/scripts/datatable.js') }}" type="text/javascript"></script> -->
<script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js') }}" type="text/javascript"></script>
@endsection