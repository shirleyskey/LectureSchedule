<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_edit_dotxuat" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="form_edit_dotxuat">
                @csrf
                <input value="" name="id" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Chỉnh sửa Công Việc Đột Xuất</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên Xây Dựng:<span class="required">*</span></label>
                                    <input value="" name="ten" type="text" class="form-control" required>
                                </div>
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
                                    <label>Ghi Chú:<span class="required">*</span></label>
                                    <input value="" name="ghichu" type="text" class="form-control" required>
                                </div>
                               
                                <div class="form-group">
                                    <label>Thời Gian:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian" id="thoigian" type="date" placeholder="dd-mm-yyyy" value="" required />
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_edit_dotxuat"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->