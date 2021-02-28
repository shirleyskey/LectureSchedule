<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_add_nckh" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="post" id="form_add_nckh">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><strong><i class="fa fa-plus"></i> Thêm mới NCKH</strong></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><b>Tên NCKH:</b> <span class="required">*</span></label>
                                    <input  name="ten" type="text" class="form-control" required placeholder="Nhập Tên NCKH">
                                </div>
                                <div class="form-group">
                                    <label><b>Loại Tài Liệu:</b><span class="required">(Chỉ chọn 1 mục) *</span> </label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="capbo" name="capbo">
                                        <label class="form-check-label" for="capbo">Đề tài</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="thamkhao" name="thamkhao">
                                        <label class="form-check-label" for="chuyende">Tài Liệu Dạy học:</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="bao" name="bao">
                                        <label class="form-check-label" for="bao">Bài Báo Tham Luận:</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="sangkien" name="sangkien">
                                        <label class="form-check-label" for="chuyende">Sáng Kiến Cải Tiến:</label>
                                    </div>
                                    
                                </div> 
                               
                                <div class="form-group">
                                    <label><b>Bắt Đầu:</b><span class="required">*</span></label>
                                    <input class="form-control" name="batdau" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label><b>Kết Thúc:</b><span class="required">*</span></label>
                                    <input class="form-control" name="ketthuc" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label><b>Hoàn Thành:</b><span class="required"></span></label>
                                    <input class="form-control" name="hoan_thanh" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label><b>Số Giờ:</b><span class="required">*</span></label>
                                    <input class="form-control" name="sotrang" type="number" required placeholder="Nhập Số Giờ"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Thể Loại:</label>
                                    <span class="required">(Chọn thể loại phù hợp với Loại Tài Liệu) *</span>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" name="theloai">
                                                <option value="0">-------- Chọn Thể Loại --------</option>
                                                @if($theloai->count()>0)
                                                    @foreach($theloai as $v)
                                                    <option value="{{ (int)$v->id }}">{{ $v->ten }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Chủ Biên:<span class="required">*</span></label>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" multiple name="chubien">
                                                <option value="0">-------- Chưa có Giảng Viên --------</option>
                                                @if($giangvien->count()>0)
                                                    @foreach($giangvien as $v)
                                                    <option value="{{ (int)$v->id }}">{{ $v->ten }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Tham Gia:<span class="required">*</span> </label>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" multiple name="thamgia">
                                                <option value="0">-------- Chưa có Giảng Viên  --------</option>
                                                @if($giangvien->count()>0)
                                                    @foreach($giangvien as $v)
                                                    <option value="{{ (int)$v->id }}">{{ $v->ten }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label><b>Số Người:</b><span class="required">*</span></label>
                                    <input class="form-control" name="songuoi" type="number" min="1" step="1" required />
                                </div>
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_add_nckh"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->