<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_add_vanban" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="post" id="form_add_vanban">
                <input value="{{ $giangvien->id }}" name="id_giangvien" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Thêm mới Xử Lý Van Bản</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nội Dung<span class="required">*</span></label>
                                    <input  name="noi_dung" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Lãnh Đạo Xử Lý:<span class="required">*</span></label>
                                    <input name="lanhdao" type="text" class="form-control" required>
                                </div> 
                               
                                <div class="form-group">
                                    <label>Thời Gian Nhận:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian_den" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Hạn:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian_nhan" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required">*</span></label>
                                    <input name="ghichu" type="text" class="form-control" required>
                                </div> 
                               
                            </div>
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_add_vanban"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->