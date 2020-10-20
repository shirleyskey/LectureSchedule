<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_edit_bai" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="form_edit_bai">
                <?php echo csrf_field(); ?>
                <input value="" name="id_hocphan" type="hidden">
                <input value="" name="id" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Chỉnh sửa Bài Học</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên Bài Học:<span class="required">*</span></label>
                                    <input value="" name="tenbai" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Số Tiết:<span class="required">*</span></label>
                                    <input value="" name="sotiet" type="number" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Giảng Viên Chính:</label>
                                <select class="form-control" name="gvchinh">
                                <option value="">-------- Chọn Giảng Viên --------</option>
                                        <?php if($ds_giangvien->count()>0): ?>
                                            <?php $__currentLoopData = $ds_giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($v->id); ?>" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>><?php echo e($v->ten); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label>Giảng Viên Phụ:</label>
                                <select class="form-control" name="gvphu" multiple>
                                <option value="">-------- Chọn Giảng Viên --------</option>
                                        <?php if($ds_giangvien->count()>0): ?>
                                            <?php $__currentLoopData = $ds_giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($v->id); ?>" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>><?php echo e($v->ten); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                              
                                
                            </div>
                            <div class="col-md-6">
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_edit_bai"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal --><?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/bai/modals/edit.blade.php ENDPATH**/ ?>