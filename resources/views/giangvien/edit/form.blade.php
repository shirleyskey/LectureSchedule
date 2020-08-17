<form action="{{ route('giangvien.edit.post', $giangvien->id) }}" method="post" id="form_sample_2" class="form-horizontal">
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


        <!-- BEGIN TAB 5-->
        <div class="tab-pane" id="tab5">
       
        </div>
        <!-- END TAB 5-->

        <!-- BEGIN TAB 2 NCKH-->
        <div class="tab-pane" id="tab2">
           
            @if($nckh->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_nckh"><i class="fa fa-plus"></i> Tạo NCKH
                                            
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
                                    <th> Hành Động</th>
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
                    <p> Giảng Viên này không có Nghiên cứu khoa học nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_hd"><i class="fa fa-plus"></i> Tạo NCKH</a></p>
                </div>
            @endif
        </div>
        <!-- END TAB 2-->

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
 @include('nckh.modals.add')
 {{--
@include('nckh.modals.edit')
@include('nckh.modals.read')  --}}
{{-- @include('quyet_dinh.modals.add')
@include('quyet_dinh.modals.edit')
@include('quyet_dinh.modals.read') --}}