@extends('layouts.master')

@section('title', 'Thông tin giảng viên')

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
                    <a href="{{ route('giangvien.index') }}">Danh Sách Giảng Viên</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> <strong>
            <i class="fa fa-user"></i> {{ $giangvien->ten }} - {{ $giangvien->chucvu }}</strong>
            @if( $giangvien->cothegiang ==1 )
            <span class="label label-sm bg-green-jungle"> Có Thể giảng </span>
            @else
            <span class="label label-sm label-danger"> Không giảng </span>
            @endif
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
                            <a href="#tab1" data-toggle="tab">Thông tin</a>
                        </li>
                        <li>
                            <a href="#tab17" data-toggle="tab">Giờ Giảng</a>
                        </li>
                        <li>
                            <a href="#tab2" data-toggle="tab">NCKH</a>
                        </li>
                        <li>
                            <a href="#tab3" data-toggle="tab">Công Tác</a>
                        </li>
                        <li>
                            <a href="#tab4" data-toggle="tab">Chấm Bài</a>
                        </li>
                        <li>
                            <a href="#tab5" data-toggle="tab">Đảng Đoàn</a>
                        </li>
                        <li>
                            <a href="#tab6" data-toggle="tab">Dạy Giỏi</a>
                        </li>
                        <li>
                            <a href="#tab7" data-toggle="tab">Xây Dựng CT</a>
                        </li>
                        <li>
                            <a href="#tab8" data-toggle="tab">CV Đột Xuất</a>
                        </li>
                        <li>
                            <a href="#tab9" data-toggle="tab">Sáng Kiến</a>
                        </li>
                        <li>
                            <a href="#tab10" data-toggle="tab">Học Tập</a>
                        </li>
                        <li>
                            <a href="#tab11" data-toggle="tab">Khóa Luận</a>
                        </li>
                        <li>
                            <a href="#tab12" data-toggle="tab">Luận Văn</a>
                        </li>
                        <li>
                            <a href="#tab13" data-toggle="tab">Luận Án</a>
                        </li>
                        <li>
                            <a href="#tab14" data-toggle="tab">NCS</a>
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
                                                <label class="control-label col-md-4 col-xs-6 bold">Mã Giảng Viên:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $giangvien->ma_giangvien }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Tên:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $giangvien->ten }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Chức Vụ:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $giangvien->chucvu }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Hệ Số Lương:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $giangvien->hesoluong }}</label>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Chỗ Ở:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $giangvien->diachi }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Chức Danh:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $giangvien->chucdanh }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Trình Độ:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $giangvien->trinhdo }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Bài Giảng:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $giangvien->bai_giang }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END TAB 1-->
                            <!-- BEGIN TAB 11-->
                                <div class="tab-pane" id="tab17">
                                @if(!empty($hocphan))
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên Học Phần</th>
                                                    <th> Lớp</th>
                                                    <th> Hệ</th>
                                                    <th> Quy Mô</th>
                                                    <th> Tổng Giờ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( count($hocphan) > 0 )
                                                    @php $stt = 1; @endphp
                                                    @foreach( $hocphan as $v_hocphan )
                                                    @php
                                                        $v_gvchinh = App\Bai::where('id_hocphan', $v_hocphan->id)->get('gvchinh');
                                                        $v_gvphu = App\Bai::where('id_hocphan', $v_hocphan->id)->get('gvphu');
                                                        $is_gvchinh = false;
                                                        $is_gvphu = false;
                                                        foreach ($v_gvchinh as $key => $value) {
                                                            if ($giangvien->id == $value->gvchinh) {
                                                                $is_gvchinh = true;
                                                            }
                                                        }
                                                        foreach ($v_gvphu as $key => $value) {
                                                            if ($giangvien->id == $value->gvphu) {
                                                                $is_gvphu = true;
                                                            }
                                                        }
                                                        // echo (int)$is_gvchinh;
                                                        // echo (int)$is_gvphu;
                                                        // die();
                                                    @endphp
                                                    @if ($is_gvchinh == true || $is_gvphu == true)
                                                    <tr>
                                                        <td> {{ $stt}} </td>
                                                        <td> {{ $v_hocphan->mahocphan }} </td>
                                                        <td>
                                                            @if (App\Lop::where('id', $v_hocphan->id_lop)->first())
                                                                {{$v_hocphan->lops->tenlop}}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if (App\Lop::where('id', $v_hocphan->id_lop)->first())
                                                            {{($v_hocphan->lops->he == 1) ? "Tín chỉ" : "Niên Chế"}}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if (App\Lop::where('id', $v_hocphan->id_lop)->first())
                                                           {{$v_hocphan->lops->quymo. " Học Viên"}}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @php
                                                                $ds_bai = App\Bai::where('id_hocphan', $v_hocphan->id)->get();
                                                                $total_gio = 0;
                                                                $total_chinh = 0;
                                                                $total_phu = 0;
                                                                $hesolop = 0;
                                                                if($v_hocphan->lops->songuoi >100)
                                                                {
                                                                    $hesolop = 1.4;
                                                                }
                                                                else if($v_hocphan->lops->songuoi >50 && $v_hocphan->lops->songuoi <100)
                                                                {
                                                                    $hesolop = 1.2;
                                                                }
                                                                else if($v_hocphan->lops->songuoi <50){
                                                                    $hesolop = 1;
                                                                }
                                                                $hetinchi = ($v_hocphan->lops->he == 1) ? 1.1 : 1;
                                                                foreach ($ds_bai as $v_bai) {
                                                                    # code...
                                                                    if($giangvien->id == $v_bai->gvchinh){
                                                                        $total_chinh +=($v_bai->lythuyet*$hesolop*$hetinchi) +  ($v_bai->xemina*$hetinchi) +  ($v_bai->thuchanh*0.7*$hetinchi);
                                                                    }
                                                                    if($giangvien->id == $v_bai->gvphu){
                                                                        $total_phu +=($v_bai->lythuyet_phu*$hesolop*$hetinchi) +  ($v_bai->xemina_phu*$hetinchi) +  ($v_bai->thuchanh_phu*0.7*$hetinchi);
                                                                    }
                                                                    $total_gio = $total_chinh + $total_phu;
                                                                }
                                                                // echo($total_chinh);
                                                                // echo($total_phu);
                                                                // die();
                                                            @endphp
                                                            {{$total_gio}} giờ
                                                        </td>
                                                    </tr>
                                                    @php $stt++; @endphp
                                                    @endif

                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                                @else
                                    <div class="alert alert-danger" style="margin-bottom: 0px;">
                                        <p> Không có Nghiên cứu khoa học nào!</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END BEGIN TAB 11-->
                            <!-- BEGIN TAB 2-->
                            <div class="tab-pane" id="tab2">
                                @if(!empty($nckh))
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên NCKH</th>
                                                    <th> Chủ Biên</th>
                                                    <th> Tham Gia</th>
                                                    <th> Bắt Đầu</th>
                                                    <th> Kết Thúc</th>
                                                    <th> Số Trang</th>
                                                    <th> Số Giờ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( count($nckh) > 0 )
                                                    @php $stt = 1; @endphp
                                                    @foreach( $nckh as $v )
                                                    <tr>
                                                        <td> {{ $stt}} </td>
                                                        <td> {{ $v->ten }} </td>
                                                        <td>
                                                            @php
                                                            $chubien = json_decode( $v->chubien, true);
                                                        @endphp
                                                            @foreach($chubien as $key => $value)
                                                            @if(App\GiangVien::where('id', $value)->first() !== null)
                                                            <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}} </p>
                                                            @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @php
                                                            $thamgia = json_decode( $v->thamgia, true);
                                                        @endphp
                                                            @foreach($thamgia as $key => $value)
                                                            @if(App\GiangVien::where('id', $value)->first() !== null)
                                                            <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}} </p>
                                                            @endif
                                                            @endforeach
                                                        </td>
                                                        <td> {{$v->batdau}}</td>
                                                        <td> {{$v->ketthuc}}</td>
                                                        <td> {{$v->sotrang}}</td>
                                                        <td>
                                                            {{-- In ra số Giờ --}}
                                                            @switch($v->theloai)
                                                                @case(1)
                                                                {{ $gio_kh = ($v->sotrang/2.5)*8*4}} giờ
                                                                    @break
                                                                @case(2)
                                                                   {{ $gio_kh = ($v->sotrang/2.5)*4*4}} giờ
                                                                    @break
                                                                @case(3)
                                                                    {{ $gio_kh = 6*4}} giờ
                                                                    @break
                                                                @case(4)
                                                                {{ $gio_kh =($v->sotrang/2.5)*10*4}} giờ
                                                                    @break
                                                                @case(5)
                                                                {{ $gio_kh = $v->sotrang*1.5}} giờ
                                                                    @break
                                                                @case(6)
                                                                    {{$gio_kh = $v->sotrang*4.27}} giờ
                                                                    @break
                                                                @case(7)
                                                                    {{$gio_kh = $v->sotrang*2}} giờ
                                                                    @break
                                                                @case(8)
                                                                    {{$gio_kh = $v->sotrang}} giờ
                                                                    @break
                                                                @default
                                                                    {{$gio_kh = $v->sotrang}} giờ
                                                            @endswitch
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
                                        <p> Không có Nghiên cứu khoa học nào!</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END BEGIN TAB 2-->
                             <!-- BEGIN TAB 11-->
                             <div class="tab-pane" id="tab11">
                                @if(!empty($khoaluan))
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên Khóa Luận</th>
                                                    <th>Vai Trò</th>
                                                    <th>Ghi Chú</th>
                                                    <th>Số Giờ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( count($khoaluan) > 0 )
                                                    @php $stt = 1; @endphp
                                                    @foreach( $khoaluan as $v )
                                                    <tr>
                                                        <td> {{ $stt}} </td>
                                                        <td> {{ $v->ten }} </td>
                                                        <td>
                                                            @php
                                                            $huongdan = json_decode( $v->huongdan, true);
                                                            $chutichcham = json_decode( $v->chutichcham, true);
                                                            $thamgiacham = json_decode( $v->thamgiacham, true);
                                                            if(in_array($giangvien->id, $huongdan)){
                                                                echo "<p>Hướng Dẫn</p> ";
                                                            };
                                                            if(in_array($giangvien->id, $chutichcham) ){
                                                                echo "<p>Chủ Tịch Chấm</p>";
                                                            };
                                                            if(in_array($giangvien->id, $thamgiacham) ){
                                                                echo "<p>Tham Gia Chấm</p>";
                                                            };
                                                            @endphp

                                                        </td>
                                                        <td> {{$v->ghichu}}</td>
                                                        <td>
                                                            @php
                                                            $gio_khoaluan = 0;
                                                            if(in_array($giangvien->id, $huongdan)){
                                                              $gio_khoaluan += 15;
                                                            }
                                                            if(in_array($giangvien->id, $chutichcham)){
                                                                $gio_khoaluan += 2;
                                                            }
                                                            if(in_array($giangvien->id, $thamgiacham)){
                                                                $gio_khoaluan += 1.5;
                                                            };
                                                            @endphp
                                                            {{$gio_khoaluan}} giờ
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
                                        <p> Không tham gia Khóa Luận nào!</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END BEGIN TAB 11-->
                              <!-- BEGIN TAB 12-->
                              <div class="tab-pane" id="tab12">
                                @if(!empty($luanvan))
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên Luận Văn</th>
                                                    <th> Vai Trò</th>
                                                    <th> Thể Loại</th>
                                                    <th>Ghi Chú</th>
                                                    <th>Số Giờ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( count($luanvan) > 0 )
                                                    @php $stt = 1; @endphp
                                                    @foreach( $luanvan as $v )
                                                    <tr>
                                                        <td> {{ $stt}} </td>
                                                        <td> {{ $v->ten }} </td>
                                                        <td>
                                                            @php
                                                            $huongdan = json_decode( $v->huongdan, true);
                                                            $chutich = json_decode( $v->chutich, true);
                                                            $phanbien = json_decode( $v->phanbien, true);
                                                            $thuky = json_decode( $v->thuky, true);
                                                            $uyvien = json_decode( $v->uyvien, true);
                                                            if(in_array($giangvien->id, $huongdan)){
                                                                echo "<p>Hướng Dẫn</p> ";
                                                            };
                                                            if(in_array($giangvien->id, $chutich) ){
                                                                echo "<p>Chủ Tịch</p>";
                                                            };
                                                            if(in_array($giangvien->id, $phanbien) ){
                                                                echo "<p>Phản Biện</p>";
                                                            };
                                                            if(in_array($giangvien->id, $thuky) ){
                                                                echo "<p>Thư Ký</p>";
                                                            };
                                                            if(in_array($giangvien->id, $uyvien) ){
                                                                echo "<p>Ủy Viên</p>";
                                                            };
                                                            @endphp

                                                        </td>
                                                        <td> {{($v->vietnam == 1) ? 'Việt Nam' : 'Nước Ngoài'}}</td>
                                                        <td> {{$v->ghichu}}</td>
                                                        <td>
                                                            @php
                                                            $gio_luanvan = 0;
                                                             if(in_array($giangvien->id, $huongdan) && $v->vietnam == 1){
                                                                $gio_luanvan += 25;
                                                            };
                                                            if(in_array($giangvien->id, $huongdan) && $v->vietnam == 0){
                                                                $gio_luanvan += 30;
                                                            };
                                                            if(in_array($giangvien->id, $chutich) ){
                                                                $gio_luanvan += 4;
                                                            };
                                                            if(in_array($giangvien->id, $phanbien) ){
                                                                $gio_luanvan += 3;
                                                            };
                                                            if(in_array($giangvien->id, $thuky) ){
                                                                $gio_luanvan += 3;
                                                            };

                                                            if(in_array($giangvien->id, $uyvien) ){
                                                                $gio_luanvan += 3;
                                                            };
                                                            @endphp
                                                            {{$gio_luanvan}} giờ
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
                                        <p> Không có Tham Gia Luận Văn nào!</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END BEGIN TAB 12-->
                         <!-- BEGIN TAB 13-->
                         <div class="tab-pane" id="tab13">
                            @if(!empty($luanan))
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-body">
                                    <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                        <thead>
                                            <tr>
                                                <th> STT</th>
                                                <th> Tên Luận Án</th>
                                                <th> Vai Trò</th>
                                                <th> Thể Loại</th>
                                                <th> Cấp </th>
                                                <th>Ghi Chú</th>
                                                <th>Số Giờ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if( count($luanan) > 0 )
                                                @php $stt = 1; @endphp
                                                @foreach( $luanan as $v )
                                                <tr>
                                                    <td> {{ $stt}} </td>
                                                    <td> {{ $v->ten }} </td>
                                                    <td>
                                                        @php
                                                        $docnhanxet = json_decode( $v->docnhanxet, true);
                                                        $chutichhoithao = json_decode( $v->chutichhoithao, true);
                                                        $thanhvienhoithao = json_decode( $v->thanhvienhoithao, true);
                                                        $chutichcham = json_decode( $v->chutichcham, true);
                                                        $thanhviencham = json_decode( $v->thanhviencham, true);
                                                        if($giangvien->id == $v->huongdanchinh){
                                                            echo "<p>Hướng Dẫn Chính</p> ";
                                                        };
                                                        if($giangvien->id == $v->huongdanphu){
                                                            echo "<p>Hướng Dẫn Phụ</p> ";
                                                        };
                                                        if(in_array($giangvien->id, $docnhanxet) ){
                                                            echo "<p>Đọc và Nhận Xét</p>";
                                                        };
                                                        if(in_array($giangvien->id, $chutichhoithao) ){
                                                            echo "<p>Chủ Tịch Hội Thảo</p>";
                                                        };
                                                        if(in_array($giangvien->id, $thanhvienhoithao) ){
                                                            echo "<p>Thành viên Hội Thảo</p>";
                                                        };
                                                        if(in_array($giangvien->id, $chutichcham) ){
                                                            echo "<p>Chủ Tịch Chấm</p>";
                                                        };
                                                        if(in_array($giangvien->id, $thanhviencham) ){
                                                            echo "<p>Thành Viên Chấm</p>";
                                                        };
                                                        @endphp

                                                    </td>
                                                    {{-- Thể Loại  --}}
                                                    <td> {{($v->vietnam == 1) ? 'Việt Nam' : 'Nước Ngoài'}}</td>
                                                    {{-- Cấp  --}}
                                                    <td> {{($v->cap) == 1 ? 'Cơ Sở' : 'Học Viện'}}</td>
                                                    <td> {{$v->ghichu}}</td>
                                                    <td>
                                                        @php
                                                        $gio_luanan = 0;
                                                        if($giangvien->id == $v->huongdanchinh && $v->vietnam == 1){
                                                            $gio_luanan += 100/3;
                                                        };
                                                        if($giangvien->id == $v->huongdanchinh && $v->vietnam == 0){
                                                            $gio_luanan += 120/3;
                                                        };
                                                        if($giangvien->id == $v->huongdanphu && $v->vietnam == 1){
                                                            $gio_luanan += 50/3;
                                                        };
                                                        if($giangvien->id == $v->huongdanphu && $v->vietnam == 1){
                                                            $gio_luanan += 60/3;
                                                        };
                                                        if(in_array($giangvien->id, $docnhanxet) ){
                                                            $gio_luanan += 10;
                                                        };
                                                        if(in_array($giangvien->id, $chutichhoithao) ){
                                                            $gio_luanan += 5;
                                                        };
                                                        if(in_array($giangvien->id, $thanhvienhoithao) ){
                                                            $gio_luanan += 4;
                                                        };
                                                        if(in_array($giangvien->id, $chutichcham) && $v->cap == 1){
                                                            $gio_luanan += 8;
                                                        };
                                                        if(in_array($giangvien->id, $thanhviencham) && $v->cap == 1){
                                                            $gio_luanan += 5;
                                                        };
                                                        if(in_array($giangvien->id, $chutichcham) && $v->cap != 1){
                                                            $gio_luanan += 10;
                                                        };
                                                        if(in_array($giangvien->id, $thanhviencham) && $v->cap != 1){
                                                            $gio_luanan += 7;
                                                        };
                                                        @endphp
                                                        {{$gio_luanan}} giờ
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
                                    <p> Không có Tham Gia Luận Án nào!</p>
                                </div>
                            @endif
                        </div>
                        <!-- END BEGIN TAB 13-->
                          <!-- BEGIN TAB 14-->
                          <div class="tab-pane" id="tab14">
                            @if(!empty($ncs))
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-body">
                                    <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                        <thead>
                                            <tr>
                                                <th> STT</th>
                                                <th> Tên Nghiên Cứu Sinh</th>
                                                <th> Vai Trò</th>
                                                <th>Ghi Chú</th>
                                                <th>Số Giờ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if( count($ncs) > 0 )
                                                @php $stt = 1; @endphp
                                                @foreach( $ncs as $v )
                                                <tr>
                                                    <td> {{ $stt}} </td>
                                                    <td> {{ $v->ten }} </td>
                                                    <td>
                                                        @php
                                                        $thanhvien = json_decode( $v->thanhvien, true);
                                                        $thuky = json_decode( $v->thuky, true);
                                                        if(in_array($giangvien->id, $thanhvien)){
                                                            echo "<p>Thành Viên</p> ";
                                                        };
                                                        if(in_array($giangvien->id, $thuky) ){
                                                            echo "<p>Thư Ký</p>";
                                                        };
                                                        @endphp

                                                    </td>
                                                    <td> {{$v->ghichu}}</td>
                                                    <td>
                                                    @php
                                                        $nc_gio = 0;
                                                         if(in_array($giangvien->id, $thanhvien)){
                                                            $nc_gio += 2;
                                                        };
                                                        if(in_array($giangvien->id, $thuky) ){
                                                            $nc_gio += 1;
                                                        };
                                                    @endphp
                                                    {{$nc_gio}} giờ
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
                                    <p> Không tham gia Nghiên Cứu Sinh nào!</p>
                                </div>
                            @endif
                        </div>
                        <!-- END BEGIN TAB 14-->
                            <!-- BEGIN TAB 3-->
                            <div class="tab-pane" id="tab3">
                                @if($congtac->isNotEmpty())
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_ct">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên Công Tác</th>
                                                    <th> Tiến Độ</th>
                                                    <th> Thời Gian</th>
                                                    <th> Số Giờ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( $congtac->count() > 0 )
                                                    @php $stt = 1; @endphp
                                                    @foreach( $congtac as $v_congtac )
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> {{ $v_congtac->ten }} </td>
                                                        <td> {{ $v_congtac->tiendo }} </td>
                                                        <td> {{ $v_congtac->thoigian }} </td>
                                                        <td> </td>
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
                                        <p> Không có Công Tác nào!</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END BEGIN TAB 3-->

                            <!-- BEGIN TAB 4-->
                            <div class="tab-pane" id="tab4">
                                @if($chambai->isNotEmpty())
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên Chấm Bài</th>
                                                    <th> Thời Gian</th>
                                                    <th> Số Giờ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( $chambai->count() > 0 )
                                                    @php $stt = 1; @endphp
                                                    @foreach( $chambai as $v_chambai )
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> {{ $v_chambai->ten }} </td>
                                                        <td> {{ $v_chambai->thoigian }} </td>
                                                        <td> </td>
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
                                        <p> Không có chấm bài nào!</p>
                                    </div>
                                @endif

                            </div>
                            <!-- END BEGIN TAB 4-->


                            <!-- BEGIN TAB 5-->
                            <div class="tab-pane" id="tab5">
                                @if($dang->isNotEmpty())
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên Hoạt Động</th>
                                                    <th> Thời Gian</th>
                                                    <th> Số Giờ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( $dang->count() > 0 )
                                                    @php $stt = 1; @endphp
                                                    @foreach( $dang as $v_dang )
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> {{ $v_dang->ten }} </td>
                                                        <td>  </td>
                                                        <td> </td>
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
                                        <p> Không có hoạt động đảng/đoàn nào!</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END BEGIN TAB 5-->

                              <!-- BEGIN TAB 6-->
                              <div class="tab-pane" id="tab6">
                                @if(!empty($daygioi))
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên </th>
                                                    <th> Tên Giảng Viên</th>
                                                    <th> Thành Viên</th>
                                                    <th> Cấp</th>
                                                    <th> Đạt Bài Dạy Giỏi</th>
                                                    <th> Thời Gian</th>
                                                    <th> Ghi Chú</th>
                                                    <th> Số Giờ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( count($daygioi) > 0 )
                                                @php $stt = 1; @endphp
                                                @foreach( $daygioi as $v )
                                                <tr>
                                                    <td> {{ $stt }} </td>
                                                    <td> {{ $v->ten }} </td>
                                                    <td>
                                                        @if (App\GiangVien::where('id', $v->id_giangvien)->first() !== null)
                                                        {{ $v->giangviens->ten }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @php
                                                            $thanhvien = json_decode( $v->thanhvien, true);
                                                        @endphp
                                                            @foreach($thanhvien as $key => $value)
                                                            @if(App\GiangVien::where('id', $value)->first() !== null)
                                                            <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}} </p>
                                                            @endif
                                                            @endforeach
                                                    </td>
                                                    <td>
                                                        @php
                                                            if($v->cap == 1){
                                                                echo "Cấp Khoa";
                                                            }
                                                            if($v->cap == 2){
                                                                echo "Cấp Học Viện";
                                                            }
                                                            if($v->cap == 3){
                                                                echo "Cấp Bộ";
                                                            }
                                                        @endphp
                                                    </td>
                                                    <td> {{($v->dat == 1) ? 'Đạt' : 'Không Đạt'}} </td>
                                                    <td> {{ $v->thoigian }} </td>
                                                    <td> {{ $v->ghichu }} </td>
                                                    <td>
                                                        @php
                                                         $thanhvien = json_decode( $v->thanhvien, true);
                                                         $daygioi_gio = 0;
                                                        if(in_array($giangvien->id, $thanhvien)){
                                                            if($v->cap == 1){
                                                                $daygioi_gio += 1;
                                                            }
                                                            if($v->cap == 2){
                                                                $daygioi_gio += 2;
                                                            }
                                                            if($v->cap == 3){
                                                                $daygioi_gio += 3;
                                                            }
                                                                };
                                                            if($v->dat == 1){
                                                                if($v->cap == 1){
                                                                $daygioi_gio += 4;
                                                            }
                                                            if($v->cap == 2){
                                                                $daygioi_gio += 6;
                                                            }
                                                            if($v->cap == 3){
                                                                $daygioi_gio += 8;
                                                            } };


                                                        @endphp
                                                    {{$daygioi_gio}} giờ
                                                    </td>
                                                    {{-- <td>
                                                        @permission('create-giangvien')
                                                        <a data-daygioi-id="{{ $v->id }}" class="btn_edit_daygioi btn btn-xs yellow-gold" href="#modal_edit_daygioi" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                        <a class="btn_delete_daygioi btn btn-xs red-mint" href="#" data-daygioi-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                                        @endpermission
                                                    </td> --}}
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
                                        <p> Không dạy giỏi!</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END BEGIN TAB 6-->

                         <!-- BEGIN TAB 7-->
                         <div class="tab-pane" id="tab7">
                            @if($xaydung->isNotEmpty())
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-body">
                                    <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                        <thead>
                                            <tr>
                                                <th> STT</th>
                                                <th> Tên </th>
                                                <th> Thời Gian</th>
                                                <th> Số Giờ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if( $xaydung->count() > 0 )
                                                @php $stt = 1; @endphp
                                                @foreach( $xaydung as $v_xaydung )
                                                <tr>
                                                    <td> {{ $stt }} </td>
                                                    <td> {{ $v_xaydung->ten }} </td>
                                                    <td>  </td>
                                                    <td> </td>
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
                                    <p> Không tham gia xây dựng chương trình nào!</p>
                                </div>
                            @endif
                        </div>
                        <!-- END BEGIN TAB 7-->

                         <!-- BEGIN TAB 8-->
                         <div class="tab-pane" id="tab8">
                            @if($dotxuat->isNotEmpty())
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-body">
                                    <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                        <thead>
                                            <tr>
                                                <th> STT</th>
                                                <th> Tên </th>
                                                <th> Thời Gian</th>
                                                <th> Số Giờ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if( $dotxuat->count() > 0 )
                                                @php $stt = 1; @endphp
                                                @foreach( $dotxuat as $v_dotxuat )
                                                <tr>
                                                    <td> {{ $stt }} </td>
                                                    <td> {{ $v_dotxuat->ten }} </td>
                                                    <td>  </td>
                                                    <td> </td>
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
                                    <p> Không có công việc đột xuất nào!</p>
                                </div>
                            @endif
                        </div>
                        <!-- END BEGIN TAB 8-->

                         <!-- BEGIN TAB 9-->
                         <div class="tab-pane" id="tab9">
                            @if($sangkien->isNotEmpty())
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-body">
                                    <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                        <thead>
                                            <tr>
                                                <th> STT</th>
                                                <th> Tên </th>
                                                <th> Thời Gian</th>
                                                <th> Số Giờ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if( $sangkien->count() > 0 )
                                                @php $stt = 1; @endphp
                                                @foreach( $sangkien as $v_sangkien )
                                                <tr>
                                                    <td> {{ $stt }} </td>
                                                    <td> {{ $v_sangkien->ten }} </td>
                                                    <td>  </td>
                                                    <td> </td>
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
                                    <p> Không có sáng kiến cải tiến nào!</p>
                                </div>
                            @endif
                        </div>
                        <!-- END BEGIN TAB 9-->

                         <!-- BEGIN TAB 10-->
                         <div class="tab-pane" id="tab10">
                            @if($hoctap->isNotEmpty())
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-body">
                                    <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                        <thead>
                                            <tr>
                                                <th> STT</th>
                                                <th> Tên </th>
                                                <th> Thời Gian</th>
                                                <th> Số Giờ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if( $hoctap->count() > 0 )
                                                @php $stt = 1; @endphp
                                                @foreach( $hoctap as $v_hoctap )
                                                <tr>
                                                    <td> {{ $stt }} </td>
                                                    <td> {{ $v_hoctap->ten }} </td>
                                                    <td>  </td>
                                                    <td> </td>
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
                                    <p> Không tham gia học tập!</p>
                                </div>
                            @endif
                        </div>
                        <!-- END BEGIN TAB 10-->

                         <!-- BEGIN TAB 11-->
                         <div class="tab-pane" id="tab11">
                            {{-- @if($daygioi->isNotEmpty())
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-body">
                                    <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                        <thead>
                                            <tr>
                                                <th> STT</th>
                                                <th> Tên </th>
                                                <th> Thời Gian</th>
                                                <th> Số Giờ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if( $daygioi->count() > 0 )
                                                @php $stt = 1; @endphp
                                                @foreach( $daygioi as $v_daygioi )
                                                <tr>
                                                    <td> {{ $stt }} </td>
                                                    <td> {{ $v_daygioi->ten }} </td>
                                                    <td>  </td>
                                                    <td> </td>
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
                                    <p> Không dạy giỏi!</p>
                                </div>
                            @endif --}}
                        </div>
                        <!-- END BEGIN TAB 11-->

                         <!-- BEGIN TAB 12-->
                         <div class="tab-pane" id="tab12">
                            {{-- @if($daygioi->isNotEmpty())
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-body">
                                    <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                        <thead>
                                            <tr>
                                                <th> STT</th>
                                                <th> Tên </th>
                                                <th> Thời Gian</th>
                                                <th> Số Giờ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if( $daygioi->count() > 0 )
                                                @php $stt = 1; @endphp
                                                @foreach( $daygioi as $v_daygioi )
                                                <tr>
                                                    <td> {{ $stt }} </td>
                                                    <td> {{ $v_daygioi->ten }} </td>
                                                    <td>  </td>
                                                    <td> </td>
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
                                    <p> Không dạy giỏi!</p>
                                </div>
                            @endif
                        </div> --}}
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
        // END Cấu hình bảng ds hợp đồng

         // Cấu hình bảng cong tác
         var table_ct = $('#table_ds_ct');
        var oTable_ct = table_ct.dataTable({

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
        // END Cấu hình bảng ds công tác

        // Cấu hình bảng ds quyết định
        $('#table_ds_qd').dataTable({
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
        // END Cấu hình bảng ds quyết định
    });
</script>
<script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js') }}" type="text/javascript"></script>
@endsection
