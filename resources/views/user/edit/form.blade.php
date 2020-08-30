<form action="{{ route('profile.edit.post', $giangvien->id) }}" method="post" id="form_sample_2" class="form-horizontal">
    @csrf
    <div class="tab-content">
        <!-- BEGIN TAB 1-->
        <div class="tab-pane active" id="tab1">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">Họ tên
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" name="ten" value="{{ $giangvien->ten }}" required maxlength="191" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Chức Vụ:
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="text" class="form-control" name="chucvu" required maxlength="191" value="{{ $giangvien->chucvu }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Hệ Số Lương:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="number" step="any" class="form-control" name="hesoluong" value="{{ $giangvien->hesoluong }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Địa Chỉ:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-phone"></i>
                                    <input type="text" class="form-control" name="diachi" value="{{ $giangvien->diachi }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Chức Danh:</label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-envelope"></i>
                                    <input type="text" class="form-control" name="chucdanh" value="{{ $giangvien->chucdanh }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Trình Độ:</label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-envelope"></i>
                                    <input type="text" class="form-control" name="trinhdo" value="{{ $giangvien->trinhdo }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Có Thể Giảng: <span>(Giảng nhập 1, không giảng nhập 0)</span></label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-envelope"></i>
                                    <input type="number" class="form-control" name="cothegiang" value="{{ $giangvien->cothegiang }}" /> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </div>
        </div>
        <!-- END TAB 1-->
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
                                          <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}} </p>
                                        @endforeach
                                    </td>
                                    <td>
                                        @php
                                        $thamgia = json_decode( $v->thamgia, true);
                                    @endphp
                                        @foreach($thamgia as $key => $value)
                                        <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p> 
                                        @endforeach
                                    </td>
                                    <td> {{$v->batdau}}</td>
                                    <td> {{$v->ketthuc}}</td>
                                    <td> {{$v->sotrang}}</td>
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
                                <th> STT</th>
                                <th> Tên Khóa Luận</th>
                                <th> Vai Trò</th>
                                <th>Ghi Chú</th>
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
                                <th>Ghi Chú</th>
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
                                    <td> {{$v->ghichu}}</td>
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
                            <th>Ghi Chú</th>
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
                                <td> {{$v->ghichu}}</td>
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
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_congtac"><i class="fa fa-plus"></i> Tạo Công Tác Mới
                                            
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Công Tác</th>
                                    <th> Tiến Độ</th>
                                    <th> Thời Gian</th>
                                    <th> Số Giờ</th>
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
                                        <td> {{ $v->tiendo }} </td>
                                        <td> {{ $v->thoigian }} </td>
                                        <td> </td>
                                        <td>
                                            <a data-congtac-id="{{ $v->id }}" class="btn_edit_congtac btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_congtac btn btn-xs red-mint" href="#" data-congtac-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Giảng Viên này không có Công Tác nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_congtac"><i class="fa fa-plus"></i> Tạo Công Tác</a></p>
                </div>
            @endif
        </div>
        <!-- END TAB 3-->

         <!-- BEGIN TAB 4-->
         <div class="tab-pane" id="tab4">
            @if($chambai->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_chambai"><i class="fa fa-plus"></i> Tạo Chấm Bài Mới
                                            
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Thời Gian</th>
                                    <th> Số Giờ</th>
                                    <th> Ghi Chú</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( $chambai->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $chambai as $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{ $v->thoigian }} </td>
                                        <td> {{ $v->ghichu }} </td>
                                        <td> </td>
                                        <td>
                                            <a data-chambai-id="{{ $v->id }}" class="btn_edit_chambai btn btn-xs yellow-gold" href="#modal_edit_chambai" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_chambai btn btn-xs red-mint" href="#" data-chambai-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Giảng Viên này không có Chấm Bài nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_chambai"><i class="fa fa-plus"></i> Tạo Chấm Bài</a></p>
                </div>
            @endif
        </div>
        <!-- END TAB 4-->

           <!-- BEGIN TAB 5-->
           <div class="tab-pane" id="tab5">
            @if($dang->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_dang"><i class="fa fa-plus"></i> Tạo Hoạt Động Mới
                                            
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên </th>
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
                                        <td> {{ $v->thoigian }} </td>
                                        <td>
                                            <a data-dang-id="{{ $v->id }}" class="btn_edit_dang btn btn-xs yellow-gold" href="#modal_edit_dang" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_dang btn btn-xs red-mint" href="#" data-dang-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Giảng Viên này không tham gia hoạt động Đảng/Đoàn nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_dang"><i class="fa fa-plus"></i> Tạo Chấm Bài</a></p>
                </div>
            @endif
        </div>
        <!-- END TAB 5-->

          <!-- BEGIN TAB 7-->
          <div class="tab-pane" id="tab7">
            @if($daygioi->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_daygioi"><i class="fa fa-plus"></i> Tạo Dạy Giỏi Mới
                                            
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên </th>
                                    <th> Thời Gian</th>
                                    <th> Ghi Chú</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( $daygioi->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $daygioi as $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{ $v->ten }} </td>
                                        <td> {{ $v->thoigian }} </td>
                                        <td> {{ $v->ghichu }} </td>
                                        <td>
                                            <a data-daygioi-id="{{ $v->id }}" class="btn_edit_daygioi btn btn-xs yellow-gold" href="#modal_edit_daygioi" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_daygioi btn btn-xs red-mint" href="#" data-daygioi-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Giảng Viên này không có hoạt động Dạy Giỏi nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_daygioi"><i class="fa fa-plus"></i> Tạo Dạy Giỏi</a></p>
                </div>
            @endif
        </div>
        <!-- END TAB 7-->

           <!-- BEGIN TAB 8-->
           <div class="tab-pane" id="tab8">
            @if($dotxuat->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_dotxuat"><i class="fa fa-plus"></i> Tạo CV Đột Xuất Mới
                                            
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên </th>
                                    <th> Thời Gian</th>
                                    <th> Ghi Chú</th>
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
                                        <td> {{ $v->thoigian }} </td>
                                        <td> {{ $v->ghichu }} </td>
                                        <td>
                                            <a data-dotxuat-id="{{ $v->id }}" class="btn_edit_dotxuat btn btn-xs yellow-gold" href="#modal_edit_dotxuat" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_dotxuat btn btn-xs red-mint" href="#" data-dotxuat-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Giảng Viên này không có Công Việc Đột Xuất nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_dotxuat"><i class="fa fa-plus"></i> Tạo Đột Xuất</a></p>
                </div>
            @endif
        </div>
        <!-- END TAB 8-->
         <!-- BEGIN TAB 9-->
         <div class="tab-pane" id="tab9">
            @if($sangkien->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_sangkien"><i class="fa fa-plus"></i> Tạo Sáng Kiến Cải Tiến
                                            
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên </th>
                                    <th> Thời Gian</th>
                                    <th> Ghi Chú</th>
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
                                        <td> {{ $v->thoigian }} </td>
                                        <td> {{ $v->ghichu }} </td>
                                        <td>
                                            <a data-sangkien-id="{{ $v->id }}" class="btn_edit_sangkien btn btn-xs yellow-gold" href="#modal_edit_sangkien" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_sangkien btn btn-xs red-mint" href="#" data-sangkien-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Giảng Viên này không có Sáng Kiến Cải Tiến nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_sangkien"><i class="fa fa-plus"></i> Tạo Đột Xuất</a></p>
                </div>
            @endif
        </div>
        <!-- END TAB 9-->
         <!-- BEGIN TAB 10-->
         <div class="tab-pane" id="tab10">
            @if($hoctap->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_hoctap"><i class="fa fa-plus"></i> Tạo Học Tập Mới
                                            
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên </th>
                                    <th> Thời Gian</th>
                                    <th> Ghi Chú</th>
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
                                        <td> {{ $v->thoigian }} </td>
                                        <td> {{ $v->ghichu }} </td>
                                        <td>
                                            <a data-hoctap-id="{{ $v->id }}" class="btn_edit_hoctap btn btn-xs yellow-gold" href="#modal_edit_hoctap" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_hoctap btn btn-xs red-mint" href="#" data-hoctap-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Giảng Viên này không tham gia Học Tập Nào nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_hoctap"><i class="fa fa-plus"></i> Tạo Đột Xuất</a></p>
                </div>
            @endif
        </div>
        <!-- END TAB 10-->
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn green"><i class="fa fa-save"></i> Lưu</button>
            </div>
        </div>
    </div>

</form>

 @include('congtac.modals.add')
@include('congtac.modals.edit')
@include('chambai.modals.add')
@include('chambai.modals.edit')
@include('dang.modals.add')
@include('dang.modals.edit')
@include('daygioi.modals.add')
@include('daygioi.modals.edit')
@include('dotxuat.modals.add')
@include('dotxuat.modals.edit')
@include('sangkien.modals.add')
@include('sangkien.modals.edit')
@include('hoctap.modals.add')
@include('hoctap.modals.edit')
