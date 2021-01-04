

<?php $__env->startSection('title', 'Thêm mới người dùng'); ?>

<?php $__env->startSection('style'); ?>
    <link href="<?php echo e(asset('assets/global/plugins/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="<?php echo e(route('dashboard')); ?>">Bảng Điều Khiển</a>
                    <i class="fa fa-circle"></i>
                    <a href="<?php echo e(route('user.index')); ?>">Danh Sách Người Dùng</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <strong>
            <i class="fa fa-plus"></i>
            Thêm Người Dùng
        </strong>
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <button class="close" data-close="alert"></button>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p> <?php echo e($error); ?> </p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
        <!-- BEGIN FORM-->
        <form action="<?php echo e(route('user.add.post')); ?>" method="post" id="form_sample_3">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-md-8">
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form bordered">
                        <div class="portlet-body">
                            <div class="form-body">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <div class="input-group">
                                        <select class="form-control" name="id_giangvien">
                                            <option value="0">-------- Chọn Giảng Viên (Bắt buộc) --------</option>
                                            <?php if($giangvien->count()>0): ?>
                                                <?php $__currentLoopData = $giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($v->id); ?>" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>><?php echo e($v->ten); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="email" value="<?php echo e(old('email')); ?>">
                                        <label for="form_control_1">Email <span class="required"> * </span></label>
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <div class="input-group">
                                        
                                        <input id="myPassword" type="password" class="form-control" name="password" value="<?php echo e(old('password')); ?>">
                                        <label for="form_control_1">Mật khẩu <span class="required"> * </span></br>
                                        </label>
                                        <!-- <span id="name-error" class="help-block help-block-error">Để trống để giữ nguyên.</span> -->
                                        <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                    </div>
                                    <input type="checkbox" onclick="myFunction()">Hiển thị mật khẩu </br>
                                    
                                </div>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <select class="form-control" name="role[]">
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($role->id); ?>"><?php echo e($role->display_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <label for="form_control_1">Quyền</label>
                                </div>
                               

                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn green"><i class="fa fa-save"></i> Lưu</button>
                                        <button type="reset" class="btn default"><i class="fa fa-refresh"></i> Làm lại
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
        </form>
        <!-- END FORM-->
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    function myFunction() {
      var x = document.getElementById("myPassword");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/user/add.blade.php ENDPATH**/ ?>