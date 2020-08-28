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
                                    <input  name="ten" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label><b>Loại Tài Liệu:</b></label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="capbo" name="capbo">
                                        <label class="form-check-label" for="capbo">Đề tài cấp bộ:</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="capcoso" name="capcoso">
                                        <label class="form-check-label" for="capcoso">Đề tài cơ sở:</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="tapbaigiang" name="tapbaigiang">
                                        <label class="form-check-label" for="tapbaigiang">Tập Bài Giảng:</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="chuyende" name="chuyende">
                                        <label class="form-check-label" for="chuyende">Chuyên Đề:</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="thamkhao" name="thamkhao">
                                        <label class="form-check-label" for="chuyende">Tài Liệu Tham khảo:</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="sangkien" name="sangkien">
                                        <label class="form-check-label" for="chuyende">Sáng Kiến Cải Tiến:</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="bao" name="bao">
                                        <label class="form-check-label" for="bao">Bài Báo Khoa Học:</label>
                                    </div>
                                </div> 
                               
                                <div class="form-group">
                                    <label><b>Bắt Đầu:</b></label>
                                    <input class="form-control" name="batdau" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label><b>Kết Thúc:</b></label>
                                    <input class="form-control" name="ketthuc" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label><b>Số Trang:</b></label>
                                    <input class="form-control" name="sotrang" type="number" required />
                                </div>
                                <div class="form-group">
                                    <label><b>Tạp Chí (Nếu có Bài Báo Khoa Học):</b></label>
                                    <input class="form-control" name="tapchi" type="text" required />
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Chủ Biên:</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" multiple name="chubien">
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
                                    <label class="control-label col-md-4">Tham Gia: </label>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" multiple name="thamgia">
                                                <option value="0">-------- Chọn Giảng Viên --------</option>
                                                <?php if($giangvien->count()>0): ?>
                                                    <?php $__currentLoopData = $giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e((int)$v->id); ?>"><?php echo e($v->ten); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
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
<!-- /.modal --><?php /**PATH C:\xampp\htdocs\lectureSchedule\resources\views/nckh/modals/add.blade.php ENDPATH**/ ?>