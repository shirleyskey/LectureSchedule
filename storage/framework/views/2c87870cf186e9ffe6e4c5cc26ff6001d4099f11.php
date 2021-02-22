<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_add_tiet" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="post" id="form_add_tiet">
                
                <input value="" name="id" type="hidden">
                <?php 
                    $id_hocphan = $hocphan->id;
                    $id_lop = App\HocPhan::where('id', $id_hocphan)->first();
                    $id_lop = $id_lop->id_lop;
                ?> 
                <input value="<?php echo e($id_lop); ?>" name="id_lop" type="hidden">
                <input value="<?php echo e($id_hocphan); ?>" name="id_hocphan" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Thêm mới Tiết Học</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                        <label>Giảng Viên:</label>
                                        <span class="required">*</span>
                                        <select class="form-control" name="id_giangvien">
                                            <option value="0">-------- Chọn Giảng Viên --------</option>
                                            <?php if($ds_giangvien->count()>0): ?>
                                                <?php $__currentLoopData = $ds_giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($v->id); ?>" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>><?php echo e($v->ten); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Bài Học:</label>
                                        <span class="required">*</span>
                                        <select class="form-control" name="id_bai">
                                            <option value="0">-------- Chọn Bài --------</option>
                                            <?php if($bai->count()>0): ?>
                                                <?php $__currentLoopData = $bai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($v->id); ?>" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>><?php echo e($v->tenbai); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                
                                <div class="form-group">
                                    <label>Thời Gian: <span class="required">*</span></label>
                                    <input  name="thoigian" type="date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Buổi:</label>
                                    <span class="required">*</span>
                                    <select class="form-control" name="buoi">
                                        <option name="chonbuoi">-------- Chọn Buổi --------</option>
                                        <option value="S">Sáng</option>
                                        <option value="C">Chiều</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Ca</label>
                                    <span class="required">*</span>
                                    <select class="form-control" name="ca">
                                        <option name="chonbuoi">-------- Chọn Ca --------</option>
                                        <option value="1">Ca 1</option>
                                        <option value="2">Ca 2</option>
                                        <option value="0">Cả buổi</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Số Tiết:<span class="required">*</span></label>
                                    <input name="so_tiet" type="number" class="form-control" required>
                                </div> 
                                <div class="form-group">
                                    <label>Tiến Độ:<span class="required">*</span></label>
                                    <input name="tiendo" type="text" class="form-control" required>
                                </div> 
                            </div>
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_add_tiet"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal --><?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/tiet/modals/add.blade.php ENDPATH**/ ?>