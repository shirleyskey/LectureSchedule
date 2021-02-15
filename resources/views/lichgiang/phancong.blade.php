@extends('layouts.master')

@section('title', 'Bảng điều khiển | Lịch Theo Học Phần')

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
                    <span>Bảng điều khiển / Phân công lịch giảng theo Học Phần</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title text-center uppercase"> <b>Bảng Phân Công Lịch Giảng năm học 2020-2021</b> 
        </h1>
        <p> <b>Tổng số Tiết:</b> {{$so_tiet}}</p>
        <p><b> Tổng số Giờ Cả Khoa (Tính Giờ):</b> {{$so_gio}}</p>
        <p><b>Tổng số Giờ Cả Khoa (Tính Tiền):</b> {{$so_gio_tien}}</p>
        <p><b>Tổng số Giờ:</b> {{$tong_gio}}</p>
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
                                    <th> Mã Học Phần</th>
                                    <th> Bắt Đầu  </th>
                                    <th> Kết Thúc   </th>
                                    <th> Lớp</th>
                                    <th style="text-align: center"> Bài - Giáo Viên</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( $ds_hocphan->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $ds_hocphan as $v )
                                   
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td> 
                                            {{ $v->mahocphan }}
                                        </td>
                                        <td>
                                            <span>
                                                @php 
                                                $batdau = App\Tiet::where('id_hocphan', $v->id)->orderBy('thoigian','desc')->first();
                                                $ketthuc = App\Tiet::where('id_hocphan', $v->id)->orderBy('thoigian','asc')->first();
                                                if($batdau){
                                                    echo \Carbon\Carbon::parse($batdau->thoigian)->format('Y-m-d');
                                                }
                                                @endphp
                                            </span>
                                        </td>
                                        <td>
                                            <span>
                                                @php 
                                                   if($ketthuc){
                                                    echo \Carbon\Carbon::parse($ketthuc->thoigian)->format('Y-m-d');
                                                   }
                                                @endphp
                                            </span>
                                        </td>
                                        <td> {{ $v->lops->tenlop }} </td>
                                        <td> 
                                            @php 
                                            $ds_bai = App\Bai::where('id_hocphan', $v->id)->get();
                                            @endphp
                                                @if($ds_bai)
                                                    @php  $so_tiet = 0; @endphp
                                                    @foreach($ds_bai as $v_bai)
                                                        <div style="display: inline-block; padding: 10px; background-color: #80808047; margin-right: 5px; margin-top: 15px">
                                                            <p style="margin-bottom: 0px">
                                                                @php 
                                                                    $tiet = App\Tiet::where('id_bai', $v_bai->id)->sum('so_tiet');
                                                                    $giangviens = App\Tiet::where('id_bai', $v_bai->id)->select('id_giangvien')->groupBy('id_giangvien')->get();
                                                                @endphp
                                                                <b>{{$v_bai->tenbai}}</b>  - {{$tiet}} Tiết
                                                            </p>
                                                            @foreach($giangviens as $v_giangvien)
                                                            @if($v_giangvien->id_giangvien)
                                                            <p style="margin-bottom: 0px">
                                                               {{$v_giangvien->giangviens->ma_giangvien}}
                                                            </p>
                                                            @endif
                                                            @endforeach
                                                        </div>
                                                    @endforeach
                                                @endif
                                           
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
