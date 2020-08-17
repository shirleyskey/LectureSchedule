<form action="{{ route('giangvien.edit.post', $giangvien->id) }}" method="post" id="form_sample_2" class="form-horizontal">
    @csrf
    <div class="tab-content">
        <!-- BEGIN TAB 1-->
        <div class="tab-pane active" id="tab1">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-6">
                        {{-- <div class="form-group">
                            <label class="control-label col-md-4">Mã NV
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-key"></i>
                                    <input type="text" class="form-control" name="ma_nv" value="{{ $giangvien->ma_nv }}" required maxlength="20" /> </div>
                            </div>
                        </div> --}}
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
                                    <input type="number" class="form-control" name="hesoluong" value="{{ $giangvien->hesoluong }}" /> </div>
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
                        {{-- <div class="form-group">
                            <label class="control-label col-md-4">Giới tính
                            </label>
                            <div class="col-md-7">
                                <div class="md-radio-inline">
                                    <div class="md-radio">
                                        <input type="radio" id="checkbox1" name="gioi_tinh" value="1" class="md-radiobtn" <?php if($giangvien->gioi_tinh) echo $giangvien->gioi_tinh == '1' ? 'checked' : ''; else echo 'checked'; ?>>
                                        <label for="checkbox1">
                                            <span class="inc"></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Nam </label>
                                    </div>
                                    <div class="md-radio">
                                        <input type="radio" id="checkbox2" name="gioi_tinh" value="0" class="md-radiobtn" <?php echo $giangvien->gioi_tinh == '0' ? 'checked' : ''; ?>>
                                        <label for="checkbox2">
                                            <span class="inc"></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Nữ </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Ngày sinh
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-calendar"></i>
                                    <input class="form-control" name="ngay_sinh" id="ngay_sinh" type="text" placeholder="dd-mm-yyyy" required value="{{ $giangvien->ngay_sinh }}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Số CMND
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-info"></i>
                                    <input type="text" class="form-control" name="so_cmnd" required value="{{ $giangvien->so_cmnd }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Ngày cấp CMND
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-calendar"></i>
                                    <input class="form-control" name="ngay_cap_cmnd" id="ngay_cap_cmnd" type="text" placeholder="dd-mm-yyyy" value="{{ $giangvien->ngay_cap_cmnd }}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Nơi cấp CMND
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-location-arrow"></i>
                                    <input type="text" class="form-control" name="noi_cap_cmnd" value="{{ $giangvien->noi_cap_cmnd }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Ngày bắt đầu làm
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-calendar"></i>
                                    <input class="form-control" name="ngay_bat_dau_lam" id="ngay_bat_dau_lam" type="text" placeholder="dd-mm-yyyy" value="{{ $giangvien->ngay_bat_dau_lam }}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Ngày làm việc cuối
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-calendar"></i>
                                    <input class="form-control" name="ngay_lam_viec_cuoi" id="ngay_lam_viec_cuoi" type="text" placeholder="dd-mm-yyyy" value="{{ $giangvien->ngay_lam_viec_cuoi }}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Trạng thái</label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa"></i>
                                    <select class="form-control" name="trang_thai">
                                        <option value="1" {{ ($giangvien->trang_thai == 1) ? 'selected' : ''}}>Đang làm</option>
                                        <option value="0" {{ ($giangvien->trang_thai == 0) ? 'selected' : ''}}>Thôi việc</option>
                                    </select>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- END TAB 1-->

        <!-- BEGIN TAB 2-->
        <div class="tab-pane" id="tab2">
            
        </div>
        <!-- END TAB 2-->

        <!-- BEGIN TAB 5-->
        <div class="tab-pane" id="tab5">
       
        </div>
        <!-- END TAB 5-->

        <!-- BEGIN TAB 4-->
        <div class="tab-pane" id="tab4">
            @if($nckh->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_hd"><i class="fa fa-plus"></i> Tạo hợp đồng
                                            
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên NCKH</th>
                                    <th> Tiến Độ</th>
                                    <th> Thời Gian</th>
                                    <th> Số Giờ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( $nckh->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $nckh as $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{ $v->ten }} </td>
                                        <td> {{ $v->tiendo }} </td>
                                        <td> {{ $v->thoigian }} </td>
                                        <td> </td>
                                        <td>
                                            <a data-hd-id="{{ $v->id }}" class="btn_read_hd btn btn-xs blue-steel" href="#" title="In"> <i class="fa fa-print"></i> In </a>
                                            <a data-hd-id="{{ $v->id }}" class="btn_edit_hd btn btn-xs yellow-gold" href="#" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_hd btn btn-xs red-mint" href="#" data-hd-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Giảng Viên này không có Nghiên cứu khoa học nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_hd"><i class="fa fa-plus"></i> Tạo hợp đồng</a></p>
                </div>
            @endif
        </div>
        <!-- END TAB 4-->

        <!-- BEGIN TAB 3-->
        <div class="tab-pane" id="tab3">
           
        </div>
        <!-- END TAB 3-->
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn green"><i class="fa fa-save"></i> Lưu</button>
            </div>
        </div>
    </div>

</form>
{{-- @include('nckh.modals.add')
@include('nckh.modals.edit')
@include('nckh.modals.read') --}}
{{-- @include('quyet_dinh.modals.add')
@include('quyet_dinh.modals.edit')
@include('quyet_dinh.modals.read') --}}