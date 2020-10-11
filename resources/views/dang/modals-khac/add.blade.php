<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_add_dang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="post" id="form_add_dang">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Thêm mới Hoạt Động Đảng Đoàn</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                               
                                <div class="form-group">
                                    <label>Tên Giảng Viên:<span class="required">*</span></label>
                                    <select class="form-control" name="id_giangvien">
                                        <option name="gv_hientai"></option>
                                            @if($giangvien->count()>0)
                                                @foreach($giangvien as $v)
                                                    <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->ten }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tên Hoạt Động:<span class="required">*</span></label>
                                    <input class="form-control" name="ten" type="text" required />
                                </div>
                                <div class="form-group">
                                    <label>Kết Quả:<span class="required">*</span></label>
                                    <input class="form-control" name="ket_qua" type="text" required />
                                </div>
                                <div class="form-group">
                                    <label>Vai Trò:<span class="required">*</span></label>
                                    <input class="form-control" name="vai_tro" type="text" required />
                                </div>
                                <div class="form-group">
                                    <label>Thời Gian:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian" type="date" placeholder="dd-mm-yyyy" required />
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
                    <a href="#" class="btn green" id="btn_add_dang"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->