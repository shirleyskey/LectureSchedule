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
        <h1 class="page-title"> <strong>Bảng điều khiển</strong>
            <small>Thông Báo Đến Hạn</small>
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 box_gio">
                         @if($vanban->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered deadline deadline-vanban">
                    <div class="portlet-body">
                        @permission('create-giangvien')
                        <div class="table-toolbar">
                            <div class="row">
                                <p class=""><i class="fa fa-book" aria-hidden="true" style="color: #ec0101; opacity: 0.5;"></i>Xử Lý Văn Bản</p>
                            </div>
                        </div>
                        @endpermission
                        <table class="table table-striped table-hover table-bordered" id="ds_giangvien">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Công Việc</th>
                                    <th> Giảng Viên Xử Lý </th>
                                    <th> Hạn</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @if($vanban->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $vanban as $v )
                                     <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{$v->noi_dung}} </td>
                                        <td> {{$v->giangviens->ten}} </td>
                                        <td> 
                                             <a class="btn_edit_congtac btn btn-xs yellow-gold" > <i class="fa fa-edit"></i> 1 Ngày </a>
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
                 @endif
                    </div>

                    <div class="col-md-12">
                         @if($hop->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered deadline deadline-hop">
                    <div class="portlet-body">
                        @permission('create-giangvien')
                        <div class="table-toolbar">
                            <div class="row">
                                <p class=""> <i style="color: aqua; opacity: 0.5;" class="fa fa-briefcase "></i>Họp</p>
                            </div>
                        </div>
                        @endpermission
                        <table class="table table-striped table-hover table-bordered" id="ds_giangvien">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Công Việc</th>
                                    <th> Giảng Viên </th>
                                    <th> Hạn</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @if($hop->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $hop as $v )
                                     <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{$v->ten}} </td>
                                         <td> {{$v->giangviens->ten}} </td>
                                        <td> 
                                             <a class="btn_edit_congtac btn btn-xs yellow-gold" > <i class="fa fa-edit"></i> 1 Ngày </a>
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
                 @endif
                    </div>

                    <div class="col-md-12">
                         @if($dang->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered deadline deadline-dang">
                    <div class="portlet-body">
                        @permission('create-giangvien')
                        <div class="table-toolbar">
                            <div class="row">
                                <p class=""><i class="fa fa-building-o" style="color: aqua; opacity: 0.5;"></i>Hoạt Động Đảng/Đoàn</p>
                            </div>
                        </div>
                        @endpermission
                        <table class="table table-striped table-hover table-bordered" id="ds_giangvien">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Công Việc</th>
                                    <th> Giảng Viên Tham Gia </th>
                                    <th> Hạn</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @if($dang->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $dang as $v )
                                     <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{$v->ten}} </td>
                                        <td> {{$v->giangviens->ten}} </td>
                                       <td> 
                                             <a class="btn_edit_congtac btn btn-xs yellow-gold" > <i class="fa fa-edit"></i> 1 Ngày </a>
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
                 @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">

                         @if($congtac->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered deadline deadline-congtac">
                    <div class="portlet-body">
                        @permission('create-giangvien')
                        <div class="table-toolbar">
                            <div class="row">
                                <p class=""><i style="color: #ffc93c; opacity: 0.8;" class="fa fa-tachometer" aria-hidden="true"></i>Đi Thực Tế</p>
                            </div>
                        </div>
                        @endpermission
                        <table class="table table-striped table-hover table-bordered" id="ds_giangvien">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Công Việc</th>
                                    <th> Giảng Viên </th>
                                    <th> Hạn</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @if($congtac->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $congtac as $v )
                                     <tr>
                                        <td> {{ $stt }} </td>
                                       <td> {{$v->ten}} </td>
                                        <td> {{$v->giangviens->ten}} </td>
                                       <td> 
                                             <a class="btn_edit_congtac btn btn-xs yellow-gold" > <i class="fa fa-edit"></i> 1 Ngày </a>
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
                 @endif
                    </div>

                    <div class="col-md-12">
                          @if($daygioi->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered deadline deadline-daygioi">
                    <div class="portlet-body">
                        @permission('create-giangvien')
                        <div class="table-toolbar">
                            <div class="row">
                                <p class=""><i class="fa fa-star-half-o" style="color: #ffc93c; opacity: 0.8;" aria-hidden="true"></i>Dạy Giỏi</p>
                            </div>
                        </div>
                        @endpermission
                        <table class="table table-striped table-hover table-bordered" id="ds_giangvien">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Công Việc</th>
                                    <th> Giảng Viên </th>
                                    <th> Hạn</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @if($vanban->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $vanban as $v )
                                     <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{$v->ten}} </td>
                                        <td> {{$v->giangviens->ten}} </td>
                                       <td> 
                                             <a class="btn_edit_congtac btn btn-xs yellow-gold" > <i class="fa fa-edit"></i> 1 Ngày </a>
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
                 @endif
                    </div>

                    <div class="col-md-12">
                         @if($chambai->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered deadline deadline-chambai">
                    <div class="portlet-body">
                        @permission('create-giangvien')
                        <div class="table-toolbar">
                            <div class="row">
                                <p class=""><i style="color: #ffc93c; opacity: 0.8;" class="fa fa-pencil-square-o" aria-hidden="true"></i>Chấm Bài</p>
                            </div>
                        </div>
                        @endpermission
                        <table class="table table-striped table-hover table-bordered" id="ds_giangvien">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Lớp</th>
                                    <th> Học Phần </th>
                                    <th> Giảng Viên</th>
                                    <th> Hạn</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @if($chambai->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $chambai as $v )
                                     <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{$v->lops->tenlop}} </td>
                                        <td> {{$v->hocphans->mahocphan}} </td>
                                        
                                        <td> {{$v->giangviens->ten}} </td>
                                       <td> 
                                             <a class="btn_edit_congtac btn btn-xs yellow-gold" > <i class="fa fa-edit"></i> 1 Ngày </a>
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
                 @endif
                    </div>
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