<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_edit_chambai" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="form_edit_chambai">
                @csrf
                <input value="" name="id_giangvien" type="hidden">
                <input value="" name="id" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Chỉnh sửa Chấm Bài</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label>Tên Lớp: <span class="required">*</span></label>
                                    <select class="form-control" name="id_lop">
                                        <option name="lop_hientai">Chọn Lớp</option>
                                            @if($lop->count()>0)
                                                @foreach($lop as $v)
                                                    <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->tenlop }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tên Học Phần: <span class="required">*</span></label>
                                    <select class="form-control" name="id_hocphan">
                                        <option name="hocphan_hientai">Chọn Học Phần</option>
                                            @if($hocphan->count()>0)
                                                @foreach($hocphan as $v)
                                                    <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->mahocphan }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Số Bài:<span class="required">*</span></label>
                                    <input class="form-control" name="so_bai" type="number" placeholder="" required />
                                </div>
                                <div class="form-group">
                                    <label>Thời Gian:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Giờ Quy Đổi:<span class="required">*</span></label>
                                    <input class="form-control" name="so_gio" type="number" placeholder="" required />
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required">*</span></label>
                                    <input class="form-control" name="ghichu" type="text" required />
                                </div>
                               
                                
                            </div>
                            <div class="col-md-6">
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_edit_chambai"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->