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
                    <span>Bảng điều khiển</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Bảng điều khiển
            <small>Thống kê tổng giờ giảng, NCKH và Công việc khác</small>
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
            <div class="col-md-12">
                <div class="tabbable tabbable-tabdrop">
                    <ul class="nav nav-pills">
                       
                        <li>
                            <a href="#tab2" data-toggle="tab">Lớp</a>
                        </li>
                        <li>
                            <a href="#tab3" data-toggle="tab">Học Phần</a>
                        </li>
                        <li>
                            <a href="#tab4" data-toggle="tab">NCKH</a>
                        </li>
                        <li>
                            <a href="#tab5" data-toggle="tab">Dạy Giỏi</a>
                        </li>
                        <li>
                            <a href="#tab6" data-toggle="tab">Chấm Bài</a>
                        </li>
                        <li>
                            <a href="#tab7" data-toggle="tab">Học Tập</a>
                        </li>
                        <li>
                            <a href="#tab8" data-toggle="tab">Công Tác</a>
                        </li>
                        <li>
                            <a href="#tab9" data-toggle="tab">Sáng Kiến</a>
                        </li>
                        <li>
                            <a href="#tab10" data-toggle="tab">Xây Dựng</a>
                        </li>
                        <li>
                            <a href="#tab11" data-toggle="tab">HĐ Đảng/Đoàn</a>
                        </li>
                        <li>
                            <a href="#tab12" data-toggle="tab">CV Đột Xuất</a>
                        </li>
                    </ul>
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form" id="form_wizard_1">
                        <!-- BEGIN FORM-->
                        <div class="tab-content">
                            <!-- BEGIN TAB 1-->
                            <div class="tab-pane" id="tab2">
                                @if($lop->isNotEmpty())
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <h2>Danh Sách Lớp</h2>
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_lop">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên Lớp</th>
                                                    <th> Quy Mô</th>
                                                    <th> Số Học Viên</th>
                                                    <th> Hành Động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( $lop->count() > 0 )
                                                    @php $stt = 1; @endphp
                                                    @foreach( $lop as $v_lop )
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> {{ $v_lop->tenlop }} </td>
                                                        <td> {{ $v_lop->quymo }} </td>
                                                        <td> {{ $v_lop->songuoi }} </td>
                                                        <td>
                                                            @permission('read-lop')
                                                            <a class="btn btn-xs blue-sharp" href="" title="Xem"> <i class="fa fa-eye"></i> Xem</a>
                                                            @endpermission
                                                            @permission('update-lop')
                                                            <a class="btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa</a>
                                                            @endpermission
                                                            @permission('delete-lop')
                                                            <a class="btn btn-xs red-mint" href="" onclick="return confirm('Bạn có chắc chắn muốn xóa Lớp này không?');" title="Xóa"> <i class="fa fa-trash"></i> Xóa</a>
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
                                        <p> Không có Lớp nào!</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END TAB 1-->
                            <!-- BEGIN TAB 2-->
                            <div class="tab-pane" id="tab3">
                                @if($hocphan->isNotEmpty())
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <h2>Danh Sách Học Phần</h2>
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_hocphan">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên Lớp</th>
                                                    <th> Tên Học Phần</th>
                                                    <th> Số Tiết</th>
                                                    <th> Số Tín Chỉ</th>
                                                    <th> Hành Động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( $hocphan->count() > 0 )
                                                    @php $stt = 1; @endphp
                                                    @foreach( $hocphan as $v_hocphan )
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> 
                                                            {{ ($v_hocphan->id_lop) ? $v_hocphan->lops->tenlop : '' }}
                                                        </td>
                                                        <td> {{ $v_hocphan->tenhocphan }} </td>
                                                        <td> {{ $v_hocphan->sotiet }} </td>
                                                        <td> {{ $v_hocphan->sotinchi }} </td>
                                                      
                                                        <td>
                                                            @permission('read-lop')
                                                            <a class="btn btn-xs blue-sharp" href="" title="Xem"> <i class="fa fa-eye"></i> Xem</a>
                                                            @endpermission
                                                            @permission('update-lop')
                                                            <a class="btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa</a>
                                                            @endpermission
                                                            @permission('delete-lop')
                                                            <a class="btn btn-xs red-mint" href="" onclick="return confirm('Bạn có chắc chắn muốn xóa Lớp này không?');" title="Xóa"> <i class="fa fa-trash"></i> Xóa</a>
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
                                        <p> Không có Lớp nào!</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END BEGIN TAB 2-->
                            <!-- BEGIN TAB 3-->
                            <div class="tab-pane" id="tab4">
                                @if($nckh->isNotEmpty())
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <h2>Danh Sách NCKH</h2>
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_nckh">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên NCKH</th>
                                                    <th> Tên Giảng Viên</th>
                                                    <th> Tiến Độ</th>
                                                    <th> Thời Gian</th>
                                                    <th> Hành Động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( $nckh->count() > 0 )
                                                    @php $stt = 1; @endphp
                                                    @foreach( $nckh as $v_nckh )
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> {{ $v_nckh->ten }} </td>
                                                        <td> 
                                                            {{ ($v_nckh->id_giangvien) ? $v_nckh->giangviens->ten : '' }}
                                                        </td>
                                                        <td> {{ $v_nckh->tiendo }} </td>
                                                        <td> {{ $v_nckh->thoigian }} </td>
                                                      
                                                        <td>
                                                            @permission('read-nckh')
                                                            <a class="btn btn-xs blue-sharp" href="" title="Xem"> <i class="fa fa-eye"></i> Xem</a>
                                                            @endpermission
                                                            @permission('update-nckh')
                                                            <a class="btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa</a>
                                                            @endpermission
                                                            @permission('delete-nckh')
                                                            <a class="btn btn-xs red-mint" href="" onclick="return confirm('Bạn có chắc chắn muốn xóa NCKH này không?');" title="Xóa"> <i class="fa fa-trash"></i> Xóa</a>
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
                                        <p> Không có Lớp nào!</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END BEGIN TAB 3-->

                            <!-- BEGIN TAB 4-->
                            <div class="tab-pane" id="tab5">
                                @if($daygioi->isNotEmpty())
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <h2>Danh Sách Dạy Giỏi</h2>
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_daygioi">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên Dạy Giỏi</th>
                                                    <th> Tên Giảng Viên</th>
                                                    <th> Thời Gian</th>
                                                    <th> Hành Động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( $daygioi->count() > 0 )
                                                    @php $stt = 1; @endphp
                                                    @foreach( $daygioi as $v_daygioi )
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> {{ $v_daygioi->ten }} </td>
                                                        <td> 
                                                            {{ ($v_daygioi->id_giangvien) ? $v_daygioi->giangviens->ten : '' }}
                                                        </td>
                                                        <td> </td>
                                                        <td>
                                                            @permission('read-daygioi')
                                                            <a class="btn btn-xs blue-sharp" href="" title="Xem"> <i class="fa fa-eye"></i> Xem</a>
                                                            @endpermission
                                                            @permission('update-daygioi')
                                                            <a class="btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa</a>
                                                            @endpermission
                                                            @permission('delete-daygioi')
                                                            <a class="btn btn-xs red-mint" href="" onclick="return confirm('Bạn có chắc chắn muốn xóa NCKH này không?');" title="Xóa"> <i class="fa fa-trash"></i> Xóa</a>
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
                                        <p> Không có Dạy Giỏi nào!</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END BEGIN TAB 4-->
                            
                            
                            <!-- BEGIN TAB 5-->
                            <div class="tab-pane" id="tab6">
                                @if($chambai->isNotEmpty())
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <h2>Danh Sách Chấm Bài</h2>
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_chambai">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên Chấm Bài</th>
                                                    <th> Tên Giảng Viên</th>
                                                    <th> Thời Gian</th>
                                                    <th> Hành Động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( $chambai->count() > 0 )
                                                    @php $stt = 1; @endphp
                                                    @foreach( $chambai as $v )
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> {{ $v->ten }} </td>
                                                        <td> 
                                                            {{ ($v->id_giangvien) ? $v->giangviens->ten : '' }}
                                                        </td>
                                                        <td> </td>
                                                        <td>
                                                            @permission('read-chambai')
                                                            <a class="btn btn-xs blue-sharp" href="" title="Xem"> <i class="fa fa-eye"></i> Xem</a>
                                                            @endpermission
                                                            @permission('update-chambai')
                                                            <a class="btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa</a>
                                                            @endpermission
                                                            @permission('delete-chambai')
                                                            <a class="btn btn-xs red-mint" href="" onclick="return confirm('Bạn có chắc chắn muốn xóa NCKH này không?');" title="Xóa"> <i class="fa fa-trash"></i> Xóa</a>
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
                                        <p> Không có Chấm Bài nào!</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END BEGIN TAB 5-->

                             <!-- BEGIN TAB 6-->
                             <div class="tab-pane" id="tab7">
                                @if($hoctap->isNotEmpty())
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <h2>Danh Sách Tham Gia Học Tập</h2>
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_hoctap">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên Học Tập</th>
                                                    <th> Tên Giảng Viên</th>
                                                    <th> Thời Gian</th>
                                                    <th> Hành Động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( $hoctap->count() > 0 )
                                                    @php $stt = 1; @endphp
                                                    @foreach( $hoctap as $v )
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> {{ $v->ten }} </td>
                                                        <td> 
                                                            {{ ($v->id_giangvien) ? $v->giangviens->ten : '' }}
                                                        </td>
                                                        <td> </td>
                                                        <td>
                                                            @permission('read-hoctap')
                                                            <a class="btn btn-xs blue-sharp" href="" title="Xem"> <i class="fa fa-eye"></i> Xem</a>
                                                            @endpermission
                                                            @permission('update-hoctap')
                                                            <a class="btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa</a>
                                                            @endpermission
                                                            @permission('delete-hoctap')
                                                            <a class="btn btn-xs red-mint" href="" onclick="return confirm('Bạn có chắc chắn muốn xóa NCKH này không?');" title="Xóa"> <i class="fa fa-trash"></i> Xóa</a>
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
                                        <p> Không có Hoạt động tham gia học tập nào!</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END BEGIN TAB 6-->

                             <!-- BEGIN TAB 7-->
                             <div class="tab-pane" id="tab8">
                                @if($congtac->isNotEmpty())
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <h2>Danh Sách Tham Gia Công Tác</h2>
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên Công Tác</th>
                                                    <th> Tên Giảng Viên</th>
                                                    <th> Tiến độ</th>
                                                    <th> Thời Gian</th>
                                                    <th> Hành Động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( $congtac->count() > 0 )
                                                    @php $stt = 1; @endphp
                                                    @foreach( $congtac as $v )
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> {{ $v->ten }} </td>
                                                        <td> 
                                                            {{ ($v->id_giangvien) ? $v->giangviens->ten : '' }}
                                                        </td>
                                                        <td> {{ $v->tiendo }} </td>
                                                        <td> {{ $v->thoigian }} </td>
                                                        <td>
                                                            @permission('read-congtac')
                                                            <a class="btn btn-xs blue-sharp" href="" title="Xem"> <i class="fa fa-eye"></i> Xem</a>
                                                            @endpermission
                                                            @permission('update-congtac')
                                                            <a class="btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa</a>
                                                            @endpermission
                                                            @permission('delete-congtac')
                                                            <a class="btn btn-xs red-mint" href="" onclick="return confirm('Bạn có chắc chắn muốn xóa NCKH này không?');" title="Xóa"> <i class="fa fa-trash"></i> Xóa</a>
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
                                        <p> Không có Hoạt động tham gia học tập nào!</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END BEGIN TAB 7-->

                             <!-- BEGIN TAB 8-->
                             <div class="tab-pane" id="tab9">
                                @if($sangkien->isNotEmpty())
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <h2>Danh Sách các Sáng Kiến</h2>
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_sangkien">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên Sáng Kiến</th>
                                                    <th> Tên Giảng Viên</th>
                                                    <th> Thời Gian</th>
                                                    <th> Hành Động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( $sangkien->count() > 0 )
                                                    @php $stt = 1; @endphp
                                                    @foreach( $sangkien as $v )
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> {{ $v->ten }} </td>
                                                        <td> 
                                                            {{ ($v->id_giangvien) ? $v->giangviens->ten : '' }}
                                                        </td>
                                                        <td> </td>
                                                        <td>
                                                            @permission('read-sangkien')
                                                            <a class="btn btn-xs blue-sharp" href="" title="Xem"> <i class="fa fa-eye"></i> Xem</a>
                                                            @endpermission
                                                            @permission('update-sangkien')
                                                            <a class="btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa</a>
                                                            @endpermission
                                                            @permission('delete-sangkien')
                                                            <a class="btn btn-xs red-mint" href="" onclick="return confirm('Bạn có chắc chắn muốn xóa NCKH này không?');" title="Xóa"> <i class="fa fa-trash"></i> Xóa</a>
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
                                        <p> Không có Sáng Kiến nào!</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END BEGIN TAB 8-->

                             <!-- BEGIN TAB 9-->
                             <div class="tab-pane" id="tab10">
                                @if($xaydung->isNotEmpty())
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <h2>Danh Sách Xây Dựng Chương Trình</h2>
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_xaydung">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên Xây Dựng</th>
                                                    <th> Tên Giảng Viên</th>
                                                    <th> Thời Gian</th>
                                                    <th> Hành Động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( $xaydung->count() > 0 )
                                                    @php $stt = 1; @endphp
                                                    @foreach( $xaydung as $v )
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> {{ $v->ten }} </td>
                                                        <td> 
                                                            {{ ($v->id_giangvien) ? $v->giangviens->ten : '' }}
                                                        </td>
                                                        <td> </td>
                                                        <td>
                                                            @permission('read-xaydung')
                                                            <a class="btn btn-xs blue-sharp" href="" title="Xem"> <i class="fa fa-eye"></i> Xem</a>
                                                            @endpermission
                                                            @permission('update-xaydung')
                                                            <a class="btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa</a>
                                                            @endpermission
                                                            @permission('delete-xaydung')
                                                            <a class="btn btn-xs red-mint" href="" onclick="return confirm('Bạn có chắc chắn muốn xóa NCKH này không?');" title="Xóa"> <i class="fa fa-trash"></i> Xóa</a>
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
                                        <p> Không có Xây Dựng nào!</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END BEGIN TAB 9-->

                            <!-- BEGIN TAB 10-->
                            <div class="tab-pane" id="tab11">
                                @if($dang->isNotEmpty())
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <h2>Danh Sách Hoạt Động Đảng/Đoàn</h2>
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_dang">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên Hoạt Động</th>
                                                    <th> Tên Giảng Viên</th>
                                                    <th> Thời Gian</th>
                                                    <th> Hành Động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( $dang->count() > 0 )
                                                    @php $stt = 1; @endphp
                                                    @foreach( $dang as $v )
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> {{ $v->ten }} </td>
                                                        <td> 
                                                            {{ ($v->id_giangvien) ? $v->giangviens->ten : '' }}
                                                        </td>
                                                        <td> </td>
                                                        <td>
                                                            @permission('read-dang')
                                                            <a class="btn btn-xs blue-sharp" href="" title="Xem"> <i class="fa fa-eye"></i> Xem</a>
                                                            @endpermission
                                                            @permission('update-dang')
                                                            <a class="btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa</a>
                                                            @endpermission
                                                            @permission('delete-dang')
                                                            <a class="btn btn-xs red-mint" href="" onclick="return confirm('Bạn có chắc chắn muốn xóa NCKH này không?');" title="Xóa"> <i class="fa fa-trash"></i> Xóa</a>
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
                                        <p> Không có hoạt động Đảng/Đoàn nào!</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END BEGIN TAB 10-->


                            <!-- BEGIN TAB 11-->
                            <div class="tab-pane" id="tab12">
                                @if($dotxuat->isNotEmpty())
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <h2>Danh Sách CV Đột Xuất</h2>
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_dotxuat">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên CV</th>
                                                    <th> Tên Giảng Viên</th>
                                                    <th> Thời Gian</th>
                                                    <th> Hành Động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( $dotxuat->count() > 0 )
                                                    @php $stt = 1; @endphp
                                                    @foreach( $dotxuat as $v )
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> {{ $v->ten }} </td>
                                                        <td> 
                                                            {{ ($v->id_giangvien) ? $v->giangviens->ten : '' }}
                                                        </td>
                                                        <td> </td>
                                                        <td>
                                                            @permission('read-dotxuat')
                                                            <a class="btn btn-xs blue-sharp" href="" title="Xem"> <i class="fa fa-eye"></i> Xem</a>
                                                            @endpermission
                                                            @permission('update-dotxuat')
                                                            <a class="btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa</a>
                                                            @endpermission
                                                            @permission('delete-dotxuat')
                                                            <a class="btn btn-xs red-mint" href="" onclick="return confirm('Bạn có chắc chắn muốn xóa NCKH này không?');" title="Xóa"> <i class="fa fa-trash"></i> Xóa</a>
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
                                        <p> Không có CV Đột Xuất nào!</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END BEGIN TAB 11-->

                            <!-- BEGIN TAB 12-->
                          
                            <!-- END BEGIN TAB 12-->
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
        // Cấu hình bảng ds lớp
        var table = $('#table_ds_lop');
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
        // END Cấu hình bảng ds lớp

         // Cấu hình bảng ds Học phần
         var table_hp = $('#table_ds_hocphan');
        var oTable_hp = table_hp.dataTable({

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
        // END Cấu hình bảng ds Học Phần

          // Cấu hình bảng ds NCKH
          var table_nckh = $('#table_ds_nckh');
        var oTable_nckh = table_nckh.dataTable({

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
        // END Cấu hình bảng ds NCKH

        // Cấu hình bảng ds Dạy Giỏi
        var table_daygioi = $('#table_ds_daygioi');
        var oTable_daygioi = table_daygioi.dataTable({

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
        // END Cấu hình bảng ds Dạy Giỏi

         // Cấu hình bảng ds Chấm Bài
         var table_chambai = $('#table_ds_chambai');
        var oTable_chambai = table_chambai.dataTable({

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
        // END Cấu hình bảng ds Chấm Bài

         // Cấu hình bảng ds Học Tập
         var table_hoctap = $('#table_ds_hoctap');
        var oTable_hoctap = table_hoctap.dataTable({

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
        // END Cấu hình bảng ds Học Tập

         // Cấu hình bảng ds Công TÁc
         var table_congtac = $('#table_ds_congtac');
        var oTable_congtac = table_congtac.dataTable({

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
        // END Cấu hình bảng ds Công tác

          // Cấu hình bảng ds Sáng Kiến
          var table_sangkien = $('#table_ds_sangkien');
        var oTable_sangkien = table_sangkien.dataTable({

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
        // END Cấu hình bảng ds Sáng Kiến

          // Cấu hình bảng ds Xây Dựng
          var table_xaydung = $('#table_ds_xaydung');
        var oTable_xaydung = table_xaydung.dataTable({

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
        // END Cấu hình bảng ds Xây Dựng

         // Cấu hình bảng ds Đảng
         var table_dang = $('#table_ds_dang');
        var oTable_dang = table_dang.dataTable({

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
        // END Cấu hình bảng ds Đảng

         // Cấu hình bảng ds Đột Xuất
         var table_dotxuat = $('#table_ds_dotxuat');
        var oTable_dotxuat = table_dotxuat.dataTable({

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
        // END Cấu hình bảng ds Đột Xuất

    });
</script>
<script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js') }}" type="text/javascript"></script>
@endsection