

<?php $__env->startSection('title', 'Chỉnh sửa Giảng viên'); ?>

<?php $__env->startSection('style'); ?>
    <link href="<?php echo e(asset('assets/global/plugins/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')); ?>" rel="stylesheet" type="text/css" />
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
                    <a href="<?php echo e(route('user.index')); ?>">Người Dùng Hệ Thống</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <strong>
            <i class="fa fa-edit"></i>
            Sửa Thông Tin Người Dùng
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
        <form action="<?php echo e(route('user.edit.post')); ?>" method="post" id="form_sample_3" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
            <div class="row">
                <div class="col-md-4 text-center col-md-push-8">
                   
                </div>
                <div class="col-md-8 col-md-pull-4">
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form bordered">
                        <div class="portlet-body">
                            <div class="form-body">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <div class="input-group">
                                        <label for="form_control">Cảnh báo: Không được sửa trường này</label>
                                        <select class="form-control" name="id_giangvien" readonly>
                                        <option value="<?php echo e($user->giangviens->id); ?>"><?php echo e($user->giangviens->ten); ?></option>
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
                                        <input type="text" class="form-control" name="email" value="<?php echo e($user->email); ?>">
                                        <label for="form_control_1">Email <span class="required"> * </span></label>
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" value="" id="myPassword">
                                        <label for="form_control_1">Mật khẩu</label>
                                        <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                    </div>
                                     <input type="checkbox" onclick="myFunction()">Hiển thị mật khẩu (Cảnh báo: Giáo vụ không tự ý thay đổi mật khẩu người dùng. Để trống để giữ nguyên.)</br>
                                    <span id="name-error" class="help-block help-block-error"></span>
                                </div>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <select class="form-control" name="role[]">
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($role->id); ?>" <?php echo e(($user->roles[0]->id == $role->id)?'selected':''); ?>><?php echo e($role->display_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <label for="form_control_1">Quyền</label>
                                </div>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <select class="form-control" name="active">
                                        <option value="1" <?php echo e(($user->active)?'selected':''); ?>>Đang hoạt động</option>
                                        <option value="0" <?php echo e((!$user->active)?'selected':''); ?>>Vô hiệu hóa</option>
                                    </select>
                                    <label for="form_control_1">Trạng thái</label>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn green"><i class="fa fa-save"></i> Lưu</button>
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
<script src="<?php echo e(asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/user/edit.blade.php ENDPATH**/ ?>