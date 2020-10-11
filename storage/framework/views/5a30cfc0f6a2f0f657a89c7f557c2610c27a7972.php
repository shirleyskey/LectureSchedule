<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_add_hdkh" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="post" id="form_add_hdkh">
                <input value="<?php echo e($giangvien->id); ?>" name="id_giangvien" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Thêm mới Hướng Dẫn Khoa Học</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                            
                                <div class="form-group">
                                    <label><b>Loại Hướng Dẫn</b></label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="khoa_luan" name="khoa_luan">
                                        <label class="form-check-label" for="khoa_luan">Khóa Luận:</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="luan_van" name="luan_van">
                                        <label class="form-check-label" for="luan_van">Luận Văn:</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="luan_an" name="luan_an">
                                        <label class="form-check-label" for="luan_an">Luận Án:</label>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label>Học Viên: <span class="required">*</span></label>
                                    <input  name="hoc_vien" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Khóa: <span class="required">*</span></label>
                                    <input  name="khoa" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Số Giờ: <span class="required">*</span></label>
                                    <input  name="so_gio" type="number" class="form-control" required>
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
                    <a href="#" class="btn green" id="btn_add_hdkh"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal --><?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/hdkh/modals/add.blade.php ENDPATH**/ ?>