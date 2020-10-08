<form action="<?php echo e(route('nckh.edit.post', $nckh->id)); ?>" method="post" id="form_sample_2" class="form-horizontal">
    <?php echo csrf_field(); ?>
    <div class="tab-content">
        <!-- BEGIN TAB 1-->
        <div class="tab-pane active" id="tab1">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-6">
                        
                        <div class="form-group">
                            <label class="control-label col-md-4">Họ tên
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <select class="form-control" name="id_giangvien">
                                    <option value="<?php echo e($nckh->id_giangvien); ?>"><?php echo e($nckh->giangviens->ten); ?></option>
                                        <?php if($giangvien->count()>0): ?>
                                            <?php $__currentLoopData = $giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($v->id); ?>"><?php echo e($v->ten); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Tên NCKH:
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="text" class="form-control" name="ten" required value="<?php echo e($nckh->ten); ?>" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Tiến Độ:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="number" class="form-control" name="tiendo" value="<?php echo e($nckh->tiendo); ?>" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Thời Gian:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-phone"></i>
                                    <input type="date" class="form-control" name="thoigian" value="<?php echo e($nckh->thoigian); ?>" /> </div>
                            </div>
                        </div>
                       
                       
                    </div>
                    <div class="col-md-6">
                        
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- END TAB 1-->


    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn green"><i class="fa fa-save"></i> Lưu</button>
            </div>
        </div>
    </div>
</form>
