<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_edit_daygioi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="form_edit_daygioi">
                <?php echo csrf_field(); ?>
                <input value="" name="id_giangvien" type="hidden">
                <input value="" name="id" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Chỉnh sửa Dạy Giỏi</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên Dạy Giỏi:<span class="required">*</span></label>
                                    <input value="" name="ten" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required">*</span></label>
                                    <input value="" name="ghichu" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Cấp:</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" name="cap">
                                                <option value="0">-------- Chọn Cấp --------</option>
                                                <option value="<?php echo e(1); ?>">Cấp Khoa</option>
                                                <option value="<?php echo e(2); ?>">Cấp Học Viện</option>
                                                <option value="<?php echo e(3); ?>">Cấp Bộ</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><b>Đạt Bài Dạy Giỏi:</b></label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="dat" name="dat">
                                        <label class="form-check-label" for="dat">Đạt:</label>
                                    </div>
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
                    <a href="#" class="btn green" id="btn_edit_daygioi"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/daygioi/modals/edit.blade.php ENDPATH**/ ?>