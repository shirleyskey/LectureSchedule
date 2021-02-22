@extends('layouts.master')

@section('title', 'Chỉnh sửa Học Phần')

@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css" />
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
                    {{-- Quay lại chỉnh sửa danh sách lớp học  --}}
                    <a href="{{ route('lop.edit.get', $hocphan->id_lop) }}">Quay lại chỉnh sửa lớp học</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <i class="fa fa-edit"></i> Chỉnh sửa | {{ $hocphan->tenhocphan }} - {{ $hocphan->lops->tenlop }}
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
        @include('partials.flash-message')
            <div class="row">
                <div class="col-md-12">
                    <div class="tabbable tabbable-tabdrop">
                        <ul class="nav nav-pills" id="#myTab">
                        <li>
                        @permission('create-giangvien')
                            <div class="content text-center" style="">
                                <a class="btn btn-primary yellow-gold" data-toggle="modal" href='#modal-add'>Import Lịch Học Phần bằng Excel</a><br><br>
                                <div class="modal fade" id="modal-add">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                            <form action="{{route('hocphan.lichgiang.import', $hocphan->id)}}" method="POST" role="form" enctype="multipart/form-data">
                                                    <legend>Nhập Lịch Học</legend>
                                                    @csrf
                                                    <div class="form-group">
                                                        <input type="file" class="form-control" name="lichhocphan" id="" placeholder="Input field">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endpermission
                        </li>
                        </ul>
                        
                        <!-- BEGIN VALIDATION STATES-->
                        <div class="portlet light portlet-fit portlet-form" id="form_wizard_1">
            <!-- BEGIN FORM-->
                            <form action="{{ route('hocphan.edit.post', $hocphan->id) }}" method="post" id="form_sample_2" class="form-horizontal">
                                @csrf
                                <div class="tab-content">
                                    <!-- BEGIN TAB 1-->
                                    <div class="tab-pane active" id="tab1">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4">Mã Học Phần:
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-7">
                                                            <div class="input-icon right">
                                                                <i class="fa fa-user"></i>
                                                                <input type="text" class="form-control" name="mahocphan" value="{{ $hocphan->mahocphan }}" required /> </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4">Tên Học Phần:
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-7">
                                                            <div class="input-icon right">
                                                                <i class="fa fa-user"></i>
                                                                <input type="text" class="form-control" name="tenhocphan" value="{{ $hocphan->tenhocphan }}" required /> </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4">Lớp:
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-7">
                                                            <div class="input-icon right">
                                                                <i class="fa fa-user"></i>
                                                            <input type="text" hidden name="id_lop" value="{{$hocphan->id_lop}}">
                                                                <input type="text" class="form-control" readonly name="tenlop" value="{{ $hocphan->lops->tenlop }}" required /> </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4">Số Tín Chỉ:
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-7">
                                                            <div class="input-icon right">
                                                                <i class="fa fa-home"></i>
                                                                <input type="number" step="any" required class="form-control" name="sotinchi" value="{{ $hocphan->sotinchi }}" /> </div>
                                                        </div>
                                                    </div>
                                                    
                                                    @permission('read-users')
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn green"><i class="fa fa-save"></i> Lưu</button>
                                                    </div>
                                                    @endpermission
                                            
                                                
                                                </div>
                                                <div class="col-md-6">
                                                </div>
                            
                                            
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END TAB 1-->
                                    <!-- BEGIN TAB 2 NCKH-->
                                    <h2 class="text-center bold">Danh Sách Bài Học</h2>
                                    <div id="tab2">
                                        @if($bai->isNotEmpty())
                                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                            <div class="portlet light portlet-fit bordered">
                                                <div class="portlet-body">
                                                    <div class="table-toolbar">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                            @permission('read-users')
                                                            <div class="btn-group">
                                                                    <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_bai"><i class="fa fa-plus"></i> Tạo Bài Học Mới
                                                                        
                                                                    </a>
                                                                </div> 
                                                            </div>
                                                            @endpermission
                                                        </div>
                                                    </div>
                                                    <table class="table table-striped table-hover table-bordered" id="table_ds_bai">
                                                        <thead>
                                                            <tr>
                                                                <th> STT</th>
                                                                <th> Tên Bài</th>
                                                                <th> Hành Động </th>
                                                            
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if( $bai->count() > 0 )
                                                                @php $stt = 1; @endphp
                                                                @foreach( $bai as $v )
                                                                <tr>
                                                                    <td> {{ $stt }} </td>
                                                                    <td> {{ $v->tenbai }} </td>
                                                                    {{-- <td> {{ $v->sotiet }} </td>
                                                                    <td> {{ ($v->gvchinh) ? ($v->giangvienchinhs->ten) : '' }} </td> --}}
                                                                    {{-- <td>
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
                                                                    </td> --}}
                                                                    <td>
                                                                    @permission('read-users')
                                                                    <a class="btn_edit_bai btn btn-xs yellow-gold" data-bai-id="{{ $v->id }}" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                                    <a class="btn_delete_bai btn btn-xs red-mint" data-bai-id="{{ $v->id }}" href=""  title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                                                <p> Học Phần này chưa có bài học nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_bai"><i class="fa fa-plus"></i> Tạo Bài Học Mới</a></p>
                                            </div>
                                        @endif
                                    </div>
                                    <!-- END TAB 2-->
                                    <!-- BẮT ĐẦU TABS TIẾT HỌC -->
                                    <h2 class="text-center bold">Danh Sách Tiết  Học</h2>
                                    <div id="tab2">
                                        @if($tiet->isNotEmpty())
                                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                            <div class="portlet light portlet-fit bordered">
                                                <div class="portlet-body">
                                                    <div class="table-toolbar">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                            @permission('read-users')
                                                            <div class="btn-group">
                                                                    <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_tiet"><i class="fa fa-plus"></i> Tạo Tiết Học Mới
                                                                        
                                                                    </a>
                                                                </div> 
                                                            </div>
                                                            @endpermission
                                                        </div>
                                                    </div>
                                                    <table class="table table-striped table-hover table-bordered" id="table_ds_tiet">
                                                        <thead>
                                                            <tr>
                                                                <th> STT</th>
                                                                <th> Tên Bài</th>
                                                                <th> Thời Gian</th>
                                                                <th> Buổi</th>
                                                                <th> Ca</th>
                                                                <th> Tiến Độ</th>
                                                                <th> Giảng Viên</th>
                                                                <th> Hành Động</th>
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
                                                                <td> {{ $v->tiendo }} </td>
                                                                <td> {{ ($v->id_giangvien) ? $v->giangviens->ten : '' }} </td>
                                                                @permission('read-users')
                                                                    <td>
                                                                        <a class="btn_edit_tiet btn btn-xs yellow-gold" data-tiet-id="{{ $v->id }}" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                                        <a class="btn_delete_tiet btn btn-xs red-mint" data-tiet-id="{{ $v->id }}" href=""  title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                                                    </td>
                                                                    @endpermission
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
                                                <p> Học Phần này chưa có Tiết học  nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_tiet"><i class="fa fa-plus"></i> Tạo Tiết Học Mới</a></p>
                                            </div>
                                        @endif
                                    </div>
                                    <!-- END TABS TIẾT HỌC -->
           
                                </div>
                            </form>
                        
            <!-- END FORM-->
                    </div>
            <!-- END VALIDATION STATES-->
                </div>
      
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
@include('bai.modals.add')
@include('bai.modals.edit')
@include('tiet.modals.add')
@include('tiet.modals.edit')
@endsection

@section('script')
<script>
    $(document).ready(function()
    {
        // Reload trang và giữ nguyên tab đã active
        var activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            $('a[href="' + activeTab + '"]').tab('show');
            localStorage.removeItem('activeTab');
        }
        // END Reload trang và giữ nguyên tab đã active
      

       

        // Ajax thêm Bài Học mới
    $("#btn_add_bai").on('click', function(e){
       e.preventDefault();
       console.log("hihi");
       $("#btn_add_bai").attr("disabled", "disabled");
       $("#btn_add_bai").html('<i class="fa fa-spinner fa-spin"></i> Lưu');

       $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

       $.ajax({
           url: '{{route('postThemBai')}}',
           method: 'POST',
           data: {
               id_hocphan: $("#form_add_bai input[name='id_hocphan']").val(),
               tenbai: $("#form_add_bai input[name='tenbai']").val(),
               sotiet: $("#form_add_bai input[name='sotiet']").val(),
               gvchinh: $("#form_add_bai select[name='gvchinh']").val(),
               gvphu: $("#form_add_bai select[name='gvphu']").val(),
           },
           success: function(data) {
                console.log("Hihi");
                $("#btn_add_bai").removeAttr("disabled");
                $("#btn_add_bai").html('<i class="fa fa-save"></i> Lưu');
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
                    $('#modal_add_bai').modal('hide');
                    swal({
                        "title":"Đã tạo!",
                        "text":"Bạn đã tạo thành công Bài Mới!",
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


        $(".btn_edit_bai").on("click", function(e){
            e.preventDefault();
            var bai_id = $(this).data("bai-id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('postTimBaiTheoId') }}',
                method: 'POST',
                data: {
                    id: bai_id
                },
                success: function(data) {
                    if(data.status == true){
                        // console.log(data.data);
                        $("#form_edit_bai input[name='id_hocphan']").val(data.data.id_hocphan);
                        $("#form_edit_bai input[name='id']").val(data.data.id);
                        $("#form_edit_bai input[name='tenbai']").val(data.data.tenbai);
                        // $("#form_edit_bai input[name='sotiet']").val(data.data.sotiet);
                        // $("#form_edit_bai select[name='gvchinh']").val(data.data.gvchinh);
                        // $("#form_edit_bai select[name='gvphu']").val($.parseJSON(data.data.gvphu));
                        $('#modal_edit_bai').modal('show');
                    }
                }
            });
        });
        // END Khi click vào nút sửa BAI, tìm BAI theo id và đỗ dữ liệu vào form

        // Ajax sửa BAI
        $("#btn_edit_bai").on('click', function(e){
            e.preventDefault();
            $("#btn_edit_bai").attr("disabled", "disabled");
            $("#btn_edit_bai").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('postSuaBai') }}',
                method: 'POST',
                data: {
                    id: $("#form_edit_bai input[name='id']").val(),
                    id_hocphan: $("#form_edit_bai input[name='id_hocphan']").val(),
                    // sotiet: $("#form_edit_bai input[name='sotiet']").val(),
                    tenbai: $("#form_edit_bai input[name='tenbai']").val(),
                    // gvchinh: $("#form_edit_bai select[name='gvchinh']").val(),
                    // gvphu: $("#form_edit_bai select[name='gvphu']").val(),
                    lythuyet:null,
                    xemina:null,
                    thuchanh:null,
                    lythuyet_phu:null,
                    xemina_phu:null,
                    thuchanh_phu:null,
                },
                success: function(data) {
                    $("#btn_edit_bai").removeAttr("disabled"); 
                    $("#btn_edit_bai").html('<i class="fa fa-save"></i> Lưu');
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
                        $('#modal_edit_bai').modal('hide');
                        swal({
                            "title":"Đã sửa!", 
                            "text":"Bạn đã sửa thành công Bài Học!",
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
        // END Ajax sửa BAI
        
        // Xử lý khi click nút xóa BAI
        $(".btn_delete_bai").on("click", function(e){
            e.preventDefault();

            var bai_id = $(this).data("bai-id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            swal({
                title: "Xóa Bài Học này?",
                text: "Bạn có chắc không? Lưu ý: Nó sẽ bị xóa vĩnh viễn cùng những tiết học liên quan!",
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
                            url: '{{ route('postXoaBai') }}',
                            method: 'POST',
                            data: {
                                id: bai_id
                            },
                            success: function(data) {
                                console.log(data);
                                if(data.status == true){
                                    swal({
                                        "title":"Đã xóa!", 
                                        "text":"Bạn đã xóa thành công Bài Học!",
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

        // END Xử lý khi click nút xóa BAI


         // Ajax thêm TIET
    $("#btn_add_tiet").on('click', function(e){
        
        e.preventDefault();
        $("#btn_add_tiet").attr("disabled", "disabled");
        $("#btn_add_tiet").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
        $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
        $.ajax({
            
            url: '{{route('postThemTiet')}}',
            method: 'POST',
            data: {
                id_bai: $("#form_add_tiet select[name='id_bai']").val(),
                id_lop: $("#form_add_tiet input[name='id_lop']").val(),
                id_hocphan: $("#form_add_tiet input[name='id_hocphan']").val(),
                thoigian: $("#form_add_tiet input[name='thoigian']").val(),
                buoi: $("#form_add_tiet select[name='buoi']").val(),
                ca: $("#form_add_tiet select[name='ca']").val(),
                so_tiet: $("#form_add_tiet input[name='so_tiet']").val(),
                tiendo: $("#form_add_tiet input[name='tiendo']").val(),
                id_giangvien: $("#form_add_tiet select[name='id_giangvien']").val(),
               
            },
            success: function(data) {
                console.log("Hihi");
                $("#btn_add_tiet").removeAttr("disabled"); 
                $("#btn_add_tiet").html('<i class="fa fa-save"></i> Lưu');
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
                    $('#modal_add_tiet').modal('hide');
                    swal({
                        "title":"Đã tạo!", 
                        "text":"Bạn đã tạo thành công Tiết Học!",
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
    // END Ajax thêm TIET
    //AJAX Tìm TIET Theo ID
         $(".btn_edit_tiet").on('click', function(e){

             e.preventDefault();
             var tiet_id = $(this).data("tiet-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '{{ route('postTimTietTheoId') }}',
                 method: 'POST',
                 data: {
                     id: tiet_id
                 },
                 success: function(data) {
                     if(data.status == true){
                         // console.log(data.data);
                         $("#form_edit_tiet select[name='id_bai']").val(data.data.id_bai);
                         $("#form_edit_tiet input[name='id']").val(data.data.id);
                         $("#form_edit_tiet input[name='id_lop']").val(data.data.id_lop);
                         $("#form_edit_tiet input[name='id_hocphan']").val(data.data.id_hocphan);
                         $("#form_edit_tiet input[name='thoigian']").val(data.data.thoigian);
                         $("#form_edit_tiet select[name='buoi']").val(data.data.buoi);
                         $("#form_edit_tiet select[name='ca']").val(data.data.ca);
                         $("#form_edit_tiet input[name='so_tiet']").val(data.data.so_tiet);
                         $("#form_edit_tiet input[name='tiendo']").val(data.data.tiendo);
                         $("#form_edit_tiet select[name='id_giangvien']").val(data.data.id_giangvien);
                         
                         $('#modal_edit_tiet').modal('show');
                     }
                 }
             });
         });
         // END Khi click vào nút sửa TIET, tìm TIET theo id và đỗ dữ liệu vào form
 
         
         // Ajax sửa TIET
         $("#btn_edit_tiet").on('click', function(e){
             e.preventDefault();
             $("#btn_edit_tiet").attr("disabled", "disabled");
             $("#btn_edit_tiet").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '{{ route('postSuaTiet') }}',
                 method: 'POST',
                 data: {
                     id: $("#form_edit_tiet input[name='id']").val(),
                     id_bai: $("#form_edit_tiet select[name='id_bai']").val(),
                     id_lop: $("#form_edit_tiet input[name='id_lop']").val(),
                     id_hocphan: $("#form_edit_tiet input[name='id_hocphan']").val(),
                     thoigian: $("#form_edit_tiet input[name='thoigian']").val(),
                     buoi: $("#form_edit_tiet select[name='buoi']").val(),
                     ca: $("#form_edit_tiet select[name='ca']").val(),
                     so_tiet: $("#form_edit_tiet input[name='so_tiet']").val(),
                     tiendo: $("#form_edit_tiet input[name='tiendo']").val(),
                     id_giangvien: $("#form_edit_tiet select[name='id_giangvien']").val(),
                 },
                 success: function(data) {
                     $("#btn_edit_tiet").removeAttr("disabled"); 
                     $("#btn_edit_tiet").html('<i class="fa fa-save"></i> Lưu');
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
                         $('#modal_edit_tiet').modal('hide');
                         swal({
                             "title":"Đã sửa!", 
                             "text":"Bạn đã sửa thành công Tiết Học!",
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
         // END Ajax sửa TIET
         
         // Xử lý khi click nút xóa TIET
         $(".btn_delete_tiet").on("click", function(e){
             e.preventDefault();
             var tiet_id = $(this).data("tiet-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             swal({
                 title: "Xóa Tiết học này?",
                 text: "Bạn có chắc không, nó sẽ bị xóa vĩnh viễn!",
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
                             url: '{{ route('postXoaTiet') }}',
                             method: 'POST',
                             data: {
                                 id: tiet_id
                             },
                             success: function(data) {
                                 console.log(data);
                                 if(data.status == true){
                                     swal({
                                         "title":"Đã xóa!", 
                                         "text":"Bạn đã xóa thành công Tiết Học!",
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
         // END Xử lý khi click nút xóa TIET
           //Cấu hình bảng danh sách Bài học
           var table = $('#table_ds_bai');
            var oTable = table.dataTable({
                "lengthMenu": [
                    [5, 10, 20, 50, -1],
                    [5, 10, 20, 50, "Tất cả"] // change per page values here
                ],

                "pageLength": 10,

                "language": {
                    "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                    "zeroRecords": "Không tìm thấy dữ liệu",
                    "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Bài Học: _TOTAL_",
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
                    [0, "asc"]
                ] // set first column as a default sort by asc
            });
        //End Cấu hình bảng danh sách Bài học

          //Cấu hình bảng danh sách Bài học
         var table_2 = $('#table_ds_tiet');

        var oTable_2 = table_2.dataTable({

            "lengthMenu": [
                [5, 10, 20, 50, -1],
                [5, 10, 20, 50, "Tất cả"] // change per page values here
            ],

            "pageLength": 10,

            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Tiết Học: _TOTAL_",
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
        //End Cấu hình bảng danh sách Tiết học
    });

   
</script>


<script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery.input-ip-address-control-1.0.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/icheck/icheck.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js') }}" type="text/javascript"></script>
@endsection