<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_edit_khoaluan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="form_edit_khoaluan">
                <?php echo csrf_field(); ?>
                <input value="" name="id" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Chỉnh sửa Khóa Luận</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><b>Tên Khóa Luận:</b> <span class="required">*</span></label>
                                    <input  name="ten" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Hướng Dẫn:</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" multiple name="huongdan">
                                                <option value="0">-------- Chọn Giảng Viên --------</option>
                                                <?php if($giangvien->count()>0): ?>
                                                    <?php $__currentLoopData = $giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e((int)$v->id); ?>"><?php echo e($v->ten); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Chủ Tịch Chấm:</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" multiple name="chutichcham">
                                                <option value="0">-------- Chọn Giảng Viên --------</option>
                                                <?php if($giangvien->count()>0): ?>
                                                    <?php $__currentLoopData = $giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e((int)$v->id); ?>"><?php echo e($v->ten); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Tham Gia Chấm: </label>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" multiple name="thamgiacham">
                                                <option value="0">-------- Chọn Giảng Viên --------</option>
                                                <?php if($giangvien->count()>0): ?>
                                                    <?php $__currentLoopData = $giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e((int)$v->id); ?>"><?php echo e($v->ten); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                </div>
                                <div class="form-group">
                                    <label><b>Ghi Chú:</b></label>
                                    <input class="form-control" name="ghichu" type="text" required />
                                </div>
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_edit_khoaluan"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal --><?php /**PATH C:\xampp\htdocs\lectureSchedule\resources\views/khoaluan/modals-khac/edit.blade.php ENDPATH**/ ?>