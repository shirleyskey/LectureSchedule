<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_add_luanvan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="post" id="form_add_luanvan">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><strong><i class="fa fa-plus"></i> Thêm mới Luận Văn</strong></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><b>Tên Luận Văn:</b> <span class="required">*</span></label>
                                    <input  name="ten" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label><b>Người Việt hoặc Nước Ngoài:</b></label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="vietnam" name="vietnam">
                                        <label class="form-check-label" for="vietnam">Người Việt:</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Hướng Dẫn:</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" multiple name="huongdan">
                                                <option value="0">-------- Chọn Giảng Viên --------</option>
                                                @if($giangvien->count()>0)
                                                    @foreach($giangvien as $v)
                                                    <option value="{{ (int)$v->id }}">{{ $v->ten }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Chủ Tịch:</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" multiple name="chutich">
                                                <option value="0">-------- Chọn Giảng Viên --------</option>
                                                @if($giangvien->count()>0)
                                                    @foreach($giangvien as $v)
                                                    <option value="{{ (int)$v->id }}">{{ $v->ten }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Phản Biện: </label>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" multiple name="phanbien">
                                                <option value="0">-------- Chọn Giảng Viên --------</option>
                                                @if($giangvien->count()>0)
                                                    @foreach($giangvien as $v)
                                                    <option value="{{ (int)$v->id }}">{{ $v->ten }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Thư Ký: </label>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" multiple name="thuky">
                                                <option value="0">-------- Chọn Giảng Viên --------</option>
                                                @if($giangvien->count()>0)
                                                    @foreach($giangvien as $v)
                                                    <option value="{{ (int)$v->id }}">{{ $v->ten }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Ủy Viên: </label>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" multiple name="uyvien">
                                                <option value="0">-------- Chọn Giảng Viên --------</option>
                                                @if($giangvien->count()>0)
                                                    @foreach($giangvien as $v)
                                                    <option value="{{ (int)$v->id }}">{{ $v->ten }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label><b>Ghi Chú:</b></label>
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
                    <a href="#" class="btn green" id="btn_add_luanvan"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->