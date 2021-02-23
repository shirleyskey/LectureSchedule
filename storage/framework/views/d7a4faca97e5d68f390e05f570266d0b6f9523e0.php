<?php $__env->startSection('title', 'Chỉnh sửa Thông tin cá nhân'); ?>

<?php $__env->startSection('style'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link href="<?php echo e(asset('assets/global/plugins/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/global/plugins/icheck/skins/all.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/global/plugins/bootstrap-toastr/toastr.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('css/main.css')); ?>" rel="stylesheet" type="text/css" />
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
                    Quản lý thông tin cá nhân
                    <i class="fa fa-circle"></i>
                    Giảng viên: <?php echo e($giangvien->ten); ?>

                </li>
            </ul>
        </div>
        <?php echo $__env->make('partials.flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
      
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
        <div class="row box_gio">
            <div class="col-md-12">
            <h2>Thông tin Cá nhân</h2>
                <div class="tabbable tabbable-tabdrop">
                   
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form" id="form_wizard_1">
                        <!-- BEGIN FORM-->
                        <form action="<?php echo e(route('profile.edit.post', $giangvien->id)); ?>" method="post" id="form_sample_2" class="form-horizontal">
                            <?php echo csrf_field(); ?>
                            <div class="tab-content">
                                  <!-- BEGIN TAB 1-->
                                  <div class="tab-pane active" id="tab_tk">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                            <input value="<?php echo e($taikhoan->id); ?>" name="id_user" type="hidden">
                                            <div class="form-group">
                                                    <label class="control-label col-md-4">Email:
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-icon right">
                                                            <i class="fa fa-user"></i>
                                                            <input type="text" class="form-control" name="email" value="<?php echo e($taikhoan->email); ?>" required maxlength="191" /> </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Password Mới: 
                                                    <br>
                                                    <span> (Để trống nếu không thay đổi) </span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-icon right">
                                                            <i class="fa fa-password"></i>
                                                            <input type="text" class="form-control" name="password"  maxlength="191" /> </div>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Mã Giảng Viên:
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-icon right">
                                                            <i class="fa fa-user"></i>
                                                            <input type="text" class="form-control" name="ma_giangvien" value="<?php echo e($giangvien->ma_giangvien); ?>" required maxlength="191" /> </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Họ tên
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-icon right">
                                                            <i class="fa fa-user"></i>
                                                            <input type="text" class="form-control" name="ten" value="<?php echo e($giangvien->ten); ?>" required maxlength="191" /> </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Công Việc:
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-icon right">
                                                            <i class="fa fa-building-o"></i>
                                                            <input type="text" class="form-control" name="congviec" required maxlength="191" value="<?php echo e($giangvien->congviec); ?>" /> </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Cấp Bậc:
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-icon right">
                                                            <i class="fa fa-plus-circle"></i>
                                                            <input type="text" step="any" class="form-control" name="capbac" value="<?php echo e($giangvien->capbac); ?>" /> </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Chỗ Ở:
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-icon right">
                                                            <i class="fa fa-phone"></i>
                                                            <input type="text" class="form-control" name="diachi" value="<?php echo e($giangvien->diachi); ?>" /> </div>
                                                    </div>
                                                </div>
                        
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Chức Danh:</label>
                                                    <div class="col-md-7">
                                                        <div class="input-icon right">
                                                            <i class="fa fa-briefcase"></i>
                                                            <input type="text" class="form-control" name="chucdanh" value="<?php echo e($giangvien->chucdanh); ?>" /> </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Trình Độ:</label>
                                                    <div class="col-md-7">
                                                        <div class="input-icon right">
                                                            <i class="fa fa-book"></i>
                                                            <input type="text" class="form-control" name="trinhdo" value="<?php echo e($giangvien->trinhdo); ?>" /> </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Có Thể Giảng: <span>(Giảng nhập 1, không giảng nhập 0)</span></label>
                                                    <div class="col-md-7">
                                                        <div class="input-icon right">
                                                            <i class="fa fa-envelope"></i>
                                                            <input type="number" class="form-control" name="cothegiang" value="<?php echo e($giangvien->cothegiang); ?>" /> </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Bài Giảng:</label>
                                                    <div class="col-md-7">
                                                        <div class="input-icon right">
                                                            <i class="fa fa-book"></i>
                                                            <input type="text" class="form-control" name="bai_giang" value="<?php echo e($giangvien->bai_giang); ?>" /> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END TAB 1-->
                                <!-- BEGIN TAB 1-->
                                <div class="tab-pane" id="tab1">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                            
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
                        
                        
                        <!-- END FORM-->
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->

                            </div>
                        </form>
                        
                        
                        
                        <!-- END FORM-->
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function()
    {
        // Reload trang và giữ nguyên tab đã active
        var activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            $('a[href="' + activeTab + '"]').tab('show');
            localStorage.removeItem('activeTab');
        }
    });
</script>


<script src="<?php echo e(asset('assets/global/plugins/datatables/datatables.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/jquery.input-ip-address-control-1.0.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/icheck/icheck.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/bootstrap-toastr/toastr.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/user/edit/index.blade.php ENDPATH**/ ?>