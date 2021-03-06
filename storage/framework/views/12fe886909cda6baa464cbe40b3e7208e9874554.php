<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_add_xaydung" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="post" id="form_add_xaydung">
                <input value="<?php echo e($giangvien->id); ?>" name="id_giangvien" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Thêm mới Xây Dựng Chương Trình</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên Chương Trình: <span class="required">*</span></label>
                                    <input  name="ten" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Học Phần:<span class="required">*</span></label>
                                    <input name="hocphan" type="text" class="form-control" required>
                                </div> 
                                <div class="form-group">
                                    <label>Khóa:<span class="required">*</span></label>
                                    <input name="khoa" type="text" class="form-control" required>
                                </div> 
                                <div class="form-group">
                                    <label>Vai Trò:<span class="required">*</span></label>
                                    <input name="vai_tro" type="text" class="form-control" required>
                                </div> 
                               
                                <div class="form-group">
                                    <label>Thời Gian:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:</label>
                                    <input name="ghichu" type="text" class="form-control">
                                </div> 
                               
                            </div>
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_add_xaydung"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal --><?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/xaydung/modals/add.blade.php ENDPATH**/ ?>