<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_edit_nckh" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="form_edit_nckh">
                <?php echo csrf_field(); ?>
                <input value="" name="id" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Chỉnh sửa NCKH</h4>
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
                                    <label><b>Loại Tài Liệu:</b><span class="required">(Chỉ chọn 1 mục) *</span></label>
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
                                        <label class="form-check-label" for="bao">Bài Báo, tham luận:</label>
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
                                    <input class="form-control" name="sotrang" type="number" required />
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-4">Thể Loại: <span class="required">*</span></label>
                                    <span class="required">(Chọn thể loại phù hợp với Loại tài liệu)</span>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" name="theloai">
                                                <option value="0">-------- Chọn Loại --------</option>
                                                <?php if($theloai->count()>0): ?>
                                                    <?php $__currentLoopData = $theloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e((int)$v->id); ?>"><?php echo e($v->ten); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Chủ Biên:<span class="required">*</span></label>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" multiple name="chubien">
                                                <option value="0">-------- Chưa có Giảng Viên --------</option>
                                                <?php if($giangvien->count()>0): ?>
                                                    <?php $__currentLoopData = $giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($v->id); ?>"><?php echo e($v->ten); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Tham Gia:<span class="required">*</span> </label>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" multiple name="thamgia">
                                                <option value="0">-------- Chưa có Giảng Viên --------</option>
                                                <?php if($giangvien->count()>0): ?>
                                                    <?php $__currentLoopData = $giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($v->id); ?>"><?php echo e($v->ten); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                </div>
                                <div class="form-group">
                                    <label><b>Số Người:</b><span class="required">*</span></label>
                                    <input class="form-control" name="songuoi" type="number" required />
                                </div>
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_edit_nckh"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal --><?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/nckh/modals/edit.blade.php ENDPATH**/ ?>