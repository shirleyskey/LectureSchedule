<form action="<?php echo e(route('lop.add.post')); ?>" method="post" id="form_sample_2" class="form-horizontal">
    <?php echo csrf_field(); ?>
    <div class="tab-content">
        <!-- BEGIN TAB 1-->
        <div class="tab-pane active" id="tab1">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">Mã Lớp (Duy Nhất):
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-file-code-o"></i>
                                    <input type="text" class="form-control" name="malop" value="<?php echo e(old('malop')); ?>" required  /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Tên Lớp:
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-briefcase"></i>
                                    <input type="text" class="form-control" name="tenlop" value="<?php echo e(old('tenlop')); ?>" required  /> </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">Quy Mô:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-book"></i>
                                    <input type="text" class="form-control" name="quymo" required value="<?php echo e(old('quymo')); ?>" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Số Học Viên:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <input type="number" step="any" class="form-control" name="songuoi" value="<?php echo e(old('songuoi')); ?>" /> </div>
                            </div>
                        </div>
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

</form><?php /**PATH C:\xampp\htdocs\lectureSchedule\resources\views/lop/add/form.blade.php ENDPATH**/ ?>