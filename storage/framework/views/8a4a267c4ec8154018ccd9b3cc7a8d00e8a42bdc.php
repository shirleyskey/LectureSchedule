<?php $__env->startSection('title', 'Chỉnh sửa Tiết Học'); ?>

<?php $__env->startSection('style'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link href="<?php echo e(asset('assets/global/plugins/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/global/plugins/icheck/skins/all.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/global/plugins/bootstrap-toastr/toastr.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('css/main.css')); ?>" rel="stylesheet" type="text/css" />
    <style>
        body{
            font-family: "Open Sans",sans-serif;
        }
    </style>
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
                    <a href="<?php echo e(route('hocphan.index')); ?>">Học Phần Giảng Dạy</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <i class="fa fa-edit"></i> Chỉnh sửa | <?php echo e($tiet->hocphans->mahocphan); ?>

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
        <div class="row">
            <div class="col-md-12">
                <div class="tabbable tabbable-tabdrop">
                    <ul class="nav nav-pills" id="#myTab">
                        <li class="active">
                            <a href="">Thông tin Tiết Học</a>
                        </li>
                        <li >
                        <a href="<?php echo e(route('bai.edit.get',$tiet->id_bai )); ?>">Xem Bài Học</a>
                        </li>
                        <li >
                            <a href="<?php echo e(route('hocphan.edit.get',$tiet->id_hocphan )); ?>">Xem Học Phần</a>
                        </li>
                    </ul>
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form" id="form_wizard_1">
                        <!-- BEGIN FORM-->
                        <form action="<?php echo e(route('lichgiang.lichgiangtuan.post', $tiet->id)); ?>" method="post" id="form_sample_2" class="form-horizontal">
                            <?php echo csrf_field(); ?>
                            <div class="tab-content">
                                <!-- BEGIN TAB 1-->
                                <div class="tab-pane active" id="tab1">
                                    <div class="form-body">
                                        <div class="row">
                                            <input value="<?php echo e($tiet->id); ?>" name="id" type="hidden">
                                            <input value="<?php echo e($tiet->id_lop); ?>" name="id_lop" type="hidden">
                                            <input value="<?php echo e($tiet->id_hocphan); ?>" name="id_hocphan" type="hidden">
                                            <input value="<?php echo e($tiet->id_bai); ?>" name="id_bai" type="hidden">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Tên Lớp:
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-icon right">
                                                            <i class="fa fa-user"></i>
                                                            <input type="text" class="form-control" readonly name="" value="<?php echo e($tiet->lops->tenlop); ?>" required /> </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Tên Học Phần:
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-icon right">
                                                            <i class="fa fa-user"></i>
                                                            <input type="text" class="form-control" readonly name="" value="<?php echo e($tiet->hocphans->tenhocphan); ?>" required /> </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Tên Bài Học:</label>
                                                    <div class="col-md-7">
                                                        <div class="input-icon right">
                                                            <i class="fa fa-user"></i>
                                                            <input type="text" class="form-control" readonly name="" value="<?php echo e($tiet->bais->tenbai); ?>" required /> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Giảng Viên:
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-icon right">
                                                            <i class="fa fa-user"></i>
                                                            <select class="form-control" name="id_giangvien">
                                                            <option selected value="<?php echo e(($tiet->id_giangvien) ? ($tiet->id_giangvien) : null); ?>"><?php echo e(($tiet->id_giangvien) ? $tiet->giangviens->ten : ''); ?></option>
                                                                <?php
                                                                    $id_gvchinh = $tiet->bais->gvchinh;
                                                                    $id_gvphu = $tiet->bais->gvphu;
                                                                    $gvchinh = App\GiangVien::where('id', $id_gvchinh)->first();
                                                                    $gvphu = App\GiangVien::where('id', $id_gvphu)->first();
                                                                ?>
                                                                    <option value="<?php echo e(($gvchinh) ? ($gvchinh->id) : null); ?>"><?php echo e(($gvchinh) ? $gvchinh->ten : ''); ?></option>
                                                                    <option value="<?php echo e(($gvphu) ? ($gvphu->id) : null); ?>"><?php echo e(($gvphu) ? $gvphu->ten : ''); ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Danh Sách Tiết Học:
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-icon right">
                                                            <i class="fa fa-user"></i>
                                                            <input type="text" class="form-control" name="lesson" value="<?php echo e($tiet->lesson); ?>" required /> </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Thời Gian:
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-icon right">
                                                            <i class="fa fa-user"></i>
                                                            <input type="date" class="form-control" name="thoigian" 
                                                            value="<?php echo e(\Carbon\Carbon::parse($tiet->thoigian)->format('Y-m-d')); ?>" 
                                                            required /> </div>
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
                        <!-- END FORM-->
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/global/plugins/datatables/datatables.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/jquery.input-ip-address-control-1.0.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/icheck/icheck.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/bootstrap-toastr/toastr.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lectureSchedule\resources\views/calendar/calendar-edit.blade.php ENDPATH**/ ?>