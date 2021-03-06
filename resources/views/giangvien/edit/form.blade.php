<form action="{{ route('giangvien.edit.post', $giangvien->id) }}" method="post" id="form_sample_2" class="form-horizontal">
    @csrf
    <div class="tab-content">
        <!-- BEGIN TAB 1-->
        <div class="tab-pane active" id="tab1">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">Mã Giảng Viên:
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" name="ma_giangvien" value="{{ $giangvien->ma_giangvien }}" required maxlength="191" /> </div>
                            </div>
                        </div>
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
                            <label class="control-label col-md-4">Công Việc:
                                
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-building-o"></i>
                                    <input type="text" class="form-control" name="congviec"  maxlength="191" value="{{ $giangvien->congviec }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Cấp Bậc:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-plus-circle"></i>
                                    <input type="text" class="form-control" name="capbac" value="{{ $giangvien->capbac }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Chỗ Ở:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-phone"></i>
                                    <input type="text" class="form-control" name="diachi" value="{{ $giangvien->diachi }}" /> </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">Chức Danh:</label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-briefcase"></i>
                                    <input type="text" class="form-control" name="chucdanh" value="{{ $giangvien->chucdanh }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Trình Độ:</label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-book"></i>
                                    <input type="text" class="form-control" name="trinhdo" value="{{ $giangvien->trinhdo }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Có Thể Giảng: <span>(Giảng nhập 1, không giảng nhập 0)</span><span class="required"> * </span></label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-envelope"></i>
                                    <input type="number" class="form-control" required name="cothegiang" value="{{ $giangvien->cothegiang }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Bài Giảng:</label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-book"></i>
                                    <input type="text" class="form-control" name="bai_giang" value="{{ $giangvien->bai_giang }}" /> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn green"><i class="fa fa-save"></i> Lưu</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END TAB 1-->
       
      

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
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_congtac"><i class="fa fa-plus"></i> Tạo Đi Thực Tế  Mới

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="ds_congtac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Địa Bàn</th>
                                    <th> Thời Gian</th>
                                    <th> Số Giờ</th>
                                    <th> Ghi Chú</th>
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
                                        <td> {{ $v->thoigian }} </td>
                                        <td> {{ $v->so_gio }} </td>
                                        <td> {{ $v->ghichu }} </td>
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
                    <p> Không có Đi Thực Tế nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_congtac"><i class="fa fa-plus"></i> Tạo Đi Thực Tế</a></p>
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
                        <table class="table table-striped table-hover table-bordered" id="ds_chambai">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Lớp </th>
                                    <th> Tên Học Phần</th>
                                    <th> Thời Gian</th>
                                    <th> Số Bài</th>
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
                                        <td> {{ ($v->id_lop) ? ($v->lops->tenlop) : ''}} </td>
                                        <td> {{ ($v->id_hocphan) ? ($v->hocphans->mahocphan) : '' }} </td>
                                        <td> {{ $v->thoigian }} </td>
                                        <td> {{ $v->so_bai }} </td>
                                        <td> {{ $v->so_gio }} </td>
                                        <td> {{ $v->ghichu }} </td>
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

        

          <!-- BEGIN TAB 7-->
          <div class="tab-pane" id="tab6">
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
                        <table class="table table-striped table-hover table-bordered" id="ds_daygioi">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Bài Dạy Giỏi </th>
                                    <th> Cấp </th>
                                    <th> Thời Gian</th>
                                    <th> Số Giờ </th>
                                    <th> Ghi Chú</th>
                                    <th> Hành Động</th>
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
                                                    <td> {{ $v->thoigian }} </td>
                                                    <td> {{ $v->so_gio }} </td>
                                                    <td> {{ $v->ghichu }} </td>
                                                    
                                                     <td>
                                                        @permission('create-giangvien')
                                                        <a data-daygioi-id="{{ $v->id }}" class="btn_edit_daygioi btn btn-xs yellow-gold" href="#modal_edit_daygioi" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                        <a class="btn_delete_daygioi btn btn-xs red-mint" href="#" data-daygioi-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Giảng Viên này không có hoạt động Dạy Giỏi nào.
                         <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_daygioi"><i class="fa fa-plus"></i> Tạo Dạy Giỏi</a> 
                    </p>
                </div>
            @endif
        </div>
        <!-- END TAB 7-->

       
         <!-- BEGIN TAB Họp-->
         <div class="tab-pane" id="tab_hop">
            @if($hop->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_hop"><i class="fa fa-plus"></i> Tạo Cuộc Họp Mới

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="ds_hop">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên </th>
                                    <th> Thời Gian</th>
                                    <th> Số Giờ</th>
                                    <th> Ghi Chú</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( $hop->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $hop as $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{ $v->ten }} </td>
                                        <td> {{ $v->thoigian }} </td>
                                        <td> {{ $v->so_gio }} </td>
                                        <td> {{ $v->ghichu }} </td>
                                        <td>
                                            <a data-hop-id="{{ $v->id }}" class="btn_edit_hop btn btn-xs yellow-gold" href="#modal_edit_hop" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_hop btn btn-xs red-mint" href="#" data-hop-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Giảng Viên này không có Cuộc Họp nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_hop"><i class="fa fa-plus"></i> Tạo Cuộc Họp</a></p>
                </div>
            @endif
        </div>
        <!-- END TAB 8-->
       
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
                        <table class="table table-striped table-hover table-bordered" id="ds_hoctap">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Lớp </th>
                                    <th> Loại Hình</th>
                                    <th> Số Giờ</th>
                                    <th> Bắt Đầu</th>
                                    <th> Kết Thúc</th>
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
                                        <td> {{ $v->loai_hinh }} </td>
                                        <td> {{ $v->so_gio }} </td>
                                        <td> {{ $v->thoigian }} </td>
                                        <td> {{ $v->thoigian_den }} </td>
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
                    <p> Giảng Viên này không tham gia Học Tập Nào nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_hoctap"><i class="fa fa-plus"></i> Tạo Học Tập Mới</a></p>
                </div>
            @endif
        </div>
        <!-- END TAB 10-->

          <!-- BEGIN TAB Hướng Dẫn Khoa Học-->
          <div class="tab-pane" id="tab_hdkh">
            @if($hdkh->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_hdkh"><i class="fa fa-plus"></i> Tạo Hướng Dẫn Khoa Học Mới

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="ds_hdkh">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Loại Hướng Dẫn</th>
                                    <th> Học Viên</th>
                                    <th> Khóa</th>
                                    <th> Số Giờ</th>
                                    <th> Ghi Chú</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( $hdkh->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $hdkh as $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td> 
                                        @php 
                                            if($v->khoa_luan == 1) {
                                                echo "Khóa Luận";
                                            } 
                                            else if($v->luan_van == 1) {
                                                echo "Luận Văn";
                                            }  
                                            else if($v->luan_an == 1) {
                                                echo "Luận Án";
                                            }   
                                        @endphp
                                            </td>

                                        <td> {{ $v->hoc_vien }} </td>
                                        <td> {{ $v->khoa }} </td>
                                        <td> {{ $v->so_gio }} </td>
                                        <td> {{ $v->ghichu }} </td>
                                        <td>
                                            <a data-hdkh-id="{{ $v->id }}" class="btn_edit_hdkh btn btn-xs yellow-gold" href="#modal_edit_hdkh" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_hdkh btn btn-xs red-mint" href="#" data-hdkh-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không tham gia Hướng Dẫn Khoa Học nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_hdkh"><i class="fa fa-plus"></i> Thêm Mới Hướng Dẫn Khoa Học</a></p>
                </div>
            @endif
        </div>
        <!-- END TAB 10-->
    </div>
    
</form>
@include('congtac.modals.add')
@include('congtac.modals.edit')
@include('chambai.modals.add')
@include('chambai.modals.edit')
@include('daygioi.modals.add')
@include('daygioi.modals.edit')
@include('hop.modals.add')
@include('hop.modals.edit')
@include('hoctap.modals.add')
@include('hoctap.modals.edit')
@include('hdkh.modals.add')
@include('hdkh.modals.edit')


