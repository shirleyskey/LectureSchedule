<?php $__env->startSection('title', 'Chỉnh sửa Giảng Viên'); ?>

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
            <h2>Hoạt Động tính giờ</h2>
                <div class="tabbable tabbable-tabdrop">
                    <ul class="nav nav-pills" id="#myTab">
                         <li class="active">
                            <a href="#tab_tk" data-toggle="tab">Tài Khoản</a>
                        </li>
                        <li>
                            <a href="#tab1" data-toggle="tab">Thông tin Hiển Thị</a>
                        </li>
                        <li>
                            <a href="#tab_hdkh" data-toggle="tab">Hướng Dẫn Khoa Học</a>
                        </li>
                        <li>
                            <a href="#tab_hop" data-toggle="tab">Họp</a>
                        </li>
                        <li>
                            <a href="#tab3" data-toggle="tab">Đi Thực Tế</a>
                        </li>
                        <li>
                            <a href="#tab4" data-toggle="tab">Chấm Bài</a>
                        </li>
                        <li>
                            <a href="#tab6" data-toggle="tab">Dạy Giỏi</a>
                        </li>
                        <li>
                            <a href="#tab10" data-toggle="tab">Học Tập</a>
                        </li>
                    </ul>
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
                                                    <label class="control-label col-md-4">Chức Vụ:
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-icon right">
                                                            <i class="fa fa-building-o"></i>
                                                            <input type="text" class="form-control" name="chucvu" required maxlength="191" value="<?php echo e($giangvien->chucvu); ?>" /> </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Hệ Số Lương:
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-icon right">
                                                            <i class="fa fa-plus-circle"></i>
                                                            <input type="number" step="any" class="form-control" name="hesoluong" value="<?php echo e($giangvien->hesoluong); ?>" /> </div>
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
                                            <div class="col-md-6">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END TAB 1-->
                                  
                             
                        
                                <!-- BEGIN TAB 3-->
                                <div class="tab-pane" id="tab3">
                                    <?php if($congtac->isNotEmpty()): ?>
                                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                        <div class="portlet light portlet-fit bordered">
                                            <div class="portlet-body">
                                                <div class="table-toolbar">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="btn-group">
                                                                <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_congtac"><i class="fa fa-plus"></i> Tạo Đi Thực Tế  Mới
                        
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                                                    <thead>
                                                        <tr>
                                                            <th> STT</th>
                                                            <th> Tên Địa Bàn</th>
                                                            <th> Thời Gian</th>
                                                            <th> Số Giờ</th>
                                                            <th> Ghi Chú</th>
                                                            <th> Hành Động</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if( $congtac->count() > 0 ): ?>
                                                            <?php $stt = 1; ?>
                                                            <?php $__currentLoopData = $congtac; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td> <?php echo e($stt); ?> </td>
                                                                <td> <?php echo e($v->ten); ?> </td>
                                                                <td> <?php echo e($v->thoigian); ?> </td>
                                                                <td> <?php echo e($v->so_gio); ?> </td>
                                                                <td> <?php echo e($v->ghichu); ?> </td>
                                                                <td>
                                                                    <a data-congtac-id="<?php echo e($v->id); ?>" class="btn_edit_congtac btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                                    <a class="btn_delete_congtac btn btn-xs red-mint" href="#" data-congtac-id="<?php echo e($v->id); ?>" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                                                </td>
                                                            </tr>
                                                            <?php $stt++; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- END EXAMPLE TABLE PORTLET-->
                                    <?php else: ?>
                                        <div class="alert alert-danger" style="margin-bottom: 0px;">
                                            <p> Không có Đi Thực Tế nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_congtac"><i class="fa fa-plus"></i> Tạo Đi Thực Tế</a></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- END TAB 3-->
                        
                             
                        
                                 <!-- BEGIN TAB 4-->
                                 <div class="tab-pane" id="tab4">
                                    <?php if($chambai->isNotEmpty()): ?>
                                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                        <div class="portlet light portlet-fit bordered">
                                            <div class="portlet-body">
                                                <div class="table-toolbar">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="btn-group">
                                                                <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_chambai"><i class="fa fa-plus"></i> Tạo Chấm Bài Mới
                        
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                                                    <thead>
                                                        <tr>
                                                            <th> STT</th>
                                                            <th> Tên Lớp </th>
                                                            <th> Tên Học Phần</th>
                                                            <th> Thời Gian</th>
                                                            <th> Số Bài</th>
                                                            <th> Số Giờ</th>
                                                            <th> Ghi Chú</th>
                                                            <th> Hành Động</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if( $chambai->count() > 0 ): ?>
                                                            <?php $stt = 1; ?>
                                                            <?php $__currentLoopData = $chambai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td> <?php echo e($stt); ?> </td>
                                                                <td> <?php echo e(($v->id_lop) ? ($v->lops->tenlop) : ''); ?> </td>
                                                                <td> <?php echo e(($v->id_hocphan) ? ($v->hocphans->mahocphan) : ''); ?> </td>
                                                                <td> <?php echo e($v->thoigian); ?> </td>
                                                                <td> <?php echo e($v->so_bai); ?> </td>
                                                                <td> <?php echo e($v->so_gio); ?> </td>
                                                                <td> <?php echo e($v->ghichu); ?> </td>
                                                                <td>
                                                                    <a data-chambai-id="<?php echo e($v->id); ?>" class="btn_edit_chambai btn btn-xs yellow-gold" href="#modal_edit_chambai" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                                    <a class="btn_delete_chambai btn btn-xs red-mint" href="#" data-chambai-id="<?php echo e($v->id); ?>" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                                                </td>
                                                            </tr>
                                                            <?php $stt++; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- END EXAMPLE TABLE PORTLET-->
                                    <?php else: ?>
                                        <div class="alert alert-danger" style="margin-bottom: 0px;">
                                            <p> Giảng Viên này không có Chấm Bài nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_chambai"><i class="fa fa-plus"></i> Tạo Chấm Bài</a></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- END TAB 4-->
                        
                                  <!-- BEGIN TAB 7-->
                                  <div class="tab-pane" id="tab6">
                                    <?php if($daygioi->isNotEmpty()): ?>
                                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                        <div class="portlet light portlet-fit bordered">
                                            <div class="portlet-body">
                                                <div class="table-toolbar">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="btn-group">
                                                                <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_daygioi"><i class="fa fa-plus"></i> Tạo Dạy Giỏi Mới
                        
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table class="table table-striped table-hover table-bordered" id="table_ds_daygioi">
                                                    <thead>
                                                        <tr>
                                                            <th> STT</th>
                                                            <th> Bài Dạy Giỏi </th>
                                                            <th> Cấp </th>
                                                            <th> Thời Gian</th>
                                                            <th> Số Giờ </th>
                                                            <th> Ghi Chú</th>
                                                            <th> Hành Động</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php if( count($daygioi) > 0 ): ?>
                                                                        <?php $stt = 1; ?>
                                                                        <?php $__currentLoopData = $daygioi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <tr>
                                                                            <td> <?php echo e($stt); ?> </td>
                                                                            <td> <?php echo e($v->ten); ?> </td>
                                                                            <td>
                                                                                <?php
                                                                                    if($v->cap == 1){
                                                                                        echo "Cấp Khoa";
                                                                                    }
                                                                                    if($v->cap == 2){
                                                                                        echo "Cấp Học Viện";
                                                                                    }
                                                                                    if($v->cap == 3){
                                                                                        echo "Cấp Bộ";
                                                                                    }
                                                                                ?>
                                                                            </td>
                                                                            <td> <?php echo e($v->thoigian); ?> </td>
                                                                            <td> <?php echo e($v->so_gio); ?> </td>
                                                                            <td> <?php echo e($v->ghichu); ?> </td>
                                                                            
                                                                             <td>
                                                                                <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                                                                <a data-daygioi-id="<?php echo e($v->id); ?>" class="btn_edit_daygioi btn btn-xs yellow-gold" href="#modal_edit_daygioi" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                                                <a class="btn_delete_daygioi btn btn-xs red-mint" href="#" data-daygioi-id="<?php echo e($v->id); ?>" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                                                                <?php endif; // app('laratrust')->can ?>
                                                                            </td> 
                                                                        </tr>
                                                                        <?php $stt++; ?>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- END EXAMPLE TABLE PORTLET-->
                                    <?php else: ?>
                                        <div class="alert alert-danger" style="margin-bottom: 0px;">
                                            <p> Giảng Viên này không có hoạt động Dạy Giỏi nào.
                                                 <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_daygioi"><i class="fa fa-plus"></i> Tạo Dạy Giỏi</a> 
                                            </p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- END TAB 7-->
                        
                               
                                 <!-- BEGIN TAB Họp-->
                                 <div class="tab-pane" id="tab_hop">
                                    <?php if($hop->isNotEmpty()): ?>
                                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                        <div class="portlet light portlet-fit bordered">
                                            <div class="portlet-body">
                                                <div class="table-toolbar">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="btn-group">
                                                                <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_hop"><i class="fa fa-plus"></i> Tạo Cuộc Họp Mới
                        
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table class="table table-striped table-hover table-bordered" id="table_ds_hop">
                                                    <thead>
                                                        <tr>
                                                            <th> STT</th>
                                                            <th> Tên </th>
                                                            <th> Thời Gian</th>
                                                            <th> Số Giờ</th>
                                                            <th> Ghi Chú</th>
                                                            <th> Hành Động</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if( $hop->count() > 0 ): ?>
                                                            <?php $stt = 1; ?>
                                                            <?php $__currentLoopData = $hop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td> <?php echo e($stt); ?> </td>
                                                                <td> <?php echo e($v->ten); ?> </td>
                                                                <td> <?php echo e($v->thoigian); ?> </td>
                                                                <td> <?php echo e($v->so_gio); ?> </td>
                                                                <td> <?php echo e($v->ghichu); ?> </td>
                                                                <td>
                                                                    <a data-hop-id="<?php echo e($v->id); ?>" class="btn_edit_hop btn btn-xs yellow-gold" href="#modal_edit_hop" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                                    <a class="btn_delete_hop btn btn-xs red-mint" href="#" data-hop-id="<?php echo e($v->id); ?>" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                                                </td>
                                                            </tr>
                                                            <?php $stt++; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- END EXAMPLE TABLE PORTLET-->
                                    <?php else: ?>
                                        <div class="alert alert-danger" style="margin-bottom: 0px;">
                                            <p> Giảng Viên này không có Cuộc Họp nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_hop"><i class="fa fa-plus"></i> Tạo Cuộc Họp</a></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- END TAB 8-->
                               
                                 <!-- BEGIN TAB 10-->
                                 <div class="tab-pane" id="tab10">
                                    <?php if($hoctap->isNotEmpty()): ?>
                                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                        <div class="portlet light portlet-fit bordered">
                                            <div class="portlet-body">
                                                <div class="table-toolbar">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="btn-group">
                                                                <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_hoctap"><i class="fa fa-plus"></i> Tạo Học Tập Mới
                        
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table class="table table-striped table-hover table-bordered" id="table_ds_hoctap">
                                                    <thead>
                                                        <tr>
                                                            <th> STT</th>
                                                            <th> Tên Lớp </th>
                                                            <th> Loại Hình</th>
                                                            <th> Số Giờ</th>
                                                            <th> Bắt Đầu</th>
                                                            <th> Kết Thúc</th>
                                                            <th> Ghi Chú</th>
                                                            <th> Hành Động</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if( $hoctap->count() > 0 ): ?>
                                                            <?php $stt = 1; ?>
                                                            <?php $__currentLoopData = $hoctap; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td> <?php echo e($stt); ?> </td>
                                                                <td> <?php echo e($v->ten); ?> </td>
                                                                <td> <?php echo e($v->loai_hinh); ?> </td>
                                                                <td> <?php echo e($v->so_gio); ?> </td>
                                                                <td> <?php echo e($v->thoigian); ?> </td>
                                                                <td> <?php echo e($v->thoigian_den); ?> </td>
                                                                <td> <?php echo e($v->ghichu); ?> </td>
                                                                <td>
                                                                    <a data-hoctap-id="<?php echo e($v->id); ?>" class="btn_edit_hoctap btn btn-xs yellow-gold" href="#modal_edit_hoctap" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                                    <a class="btn_delete_hoctap btn btn-xs red-mint" href="#" data-hoctap-id="<?php echo e($v->id); ?>" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                                                </td>
                                                            </tr>
                                                            <?php $stt++; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- END EXAMPLE TABLE PORTLET-->
                                    <?php else: ?>
                                        <div class="alert alert-danger" style="margin-bottom: 0px;">
                                            <p> Giảng Viên này không tham gia Học Tập Nào nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_hoctap"><i class="fa fa-plus"></i> Thêm Mới Học Tập</a></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- END TAB 10-->
                        
                                  <!-- BEGIN TAB Hướng Dẫn Khoa Học-->
                                  <div class="tab-pane" id="tab_hdkh">
                                    <?php if($hdkh->isNotEmpty()): ?>
                                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                        <div class="portlet light portlet-fit bordered">
                                            <div class="portlet-body">
                                                <div class="table-toolbar">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="btn-group">
                                                                <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_hdkh"><i class="fa fa-plus"></i> Tạo Hướng Dẫn Khoa Học Mới
                        
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                                    <thead>
                                                        <tr>
                                                            <th> STT</th>
                                                            <th> Loại Hướng Dẫn</th>
                                                            <th> Học Viên</th>
                                                            <th> Khóa</th>
                                                            <th> Số Giờ</th>
                                                            <th> Ghi Chú</th>
                                                            <th> Hành Động</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if( $hdkh->count() > 0 ): ?>
                                                            <?php $stt = 1; ?>
                                                            <?php $__currentLoopData = $hdkh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td> <?php echo e($stt); ?> </td>
                                                                <td> 
                                                                <?php 
                                                                    if($v->khoa_luan == 1) {
                                                                        echo "Khóa Luận";
                                                                    } 
                                                                    else if($v->luan_van == 1) {
                                                                        echo "Luận Văn";
                                                                    }  
                                                                    else if($v->luan_an == 1) {
                                                                        echo "Luận Án";
                                                                    }   
                                                                ?>
                                                                    </td>
                        
                                                                <td> <?php echo e($v->hoc_vien); ?> </td>
                                                                <td> <?php echo e($v->khoa); ?> </td>
                                                                <td> <?php echo e($v->so_gio); ?> </td>
                                                                <td> <?php echo e($v->ghichu); ?> </td>
                                                                <td>
                                                                    <a data-hdkh-id="<?php echo e($v->id); ?>" class="btn_edit_hdkh btn btn-xs yellow-gold" href="#modal_edit_hdkh" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                                    <a class="btn_delete_hdkh btn btn-xs red-mint" href="#" data-hdkh-id="<?php echo e($v->id); ?>" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                                                </td>
                                                            </tr>
                                                            <?php $stt++; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- END EXAMPLE TABLE PORTLET-->
                                    <?php else: ?>
                                        <div class="alert alert-danger" style="margin-bottom: 0px;">
                                            <p> Không tham gia Hướng Dẫn Khoa Học nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_hdkh"><i class="fa fa-plus"></i> Thêm Mới Hướng Dẫn Khoa Học</a></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- END TAB 10-->
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn green"><i class="fa fa-save"></i> Lưu</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php echo $__env->make('congtac.modals.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('congtac.modals.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('chambai.modals.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('chambai.modals.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('dang.modals.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('dang.modals.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('daygioi.modals.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('daygioi.modals.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('hoctap.modals.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('hoctap.modals.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('hdkh.modals.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('hdkh.modals.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('hop.modals.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('hop.modals.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        
                        <!-- END FORM-->
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->

        <div class="row box_gio">
            <div class="col-md-12">
            <h2>Hoạt Động không tính giờ</h2>
                <div class="tabbable tabbable-tabdrop">
                    <ul class="nav nav-pills" id="#myTab">
                        <li class="active">
                            <a href="#tab_vanban" data-toggle="tab">Xử Lý Văn Bản</a>
                        </li>
                        <li>
                            <a href="#tab5" data-toggle="tab">Đảng Đoàn</a>
                        </li>
                       <li>
                            <a href="#tab7" data-toggle="tab">Xây Dựng CT</a>
                        </li> 
                    </ul>
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form" id="form_wizard_1">
                        <!-- BEGIN FORM-->
                        <form action="<?php echo e(route('profile.edit.post', $giangvien->id)); ?>" method="post" id="form_sample_2" class="form-horizontal">
                            <?php echo csrf_field(); ?>
                            <div class="tab-content">
                                 <!-- BEGIN TAB 3-->
                                <div class="tab-pane " id="tab7">
                                            <?php if($xaydung->isNotEmpty()): ?>
                                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                <div class="portlet light portlet-fit bordered">
                                                    <div class="portlet-body">
                                                        <div class="table-toolbar">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="btn-group">
                                                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_xaydung"><i class="fa fa-plus"></i> Tạo Xây Dựng Chương Trình Mới
                        
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <table class="table table-striped table-hover table-bordered" id="table_ds_xaydung">
                                                            <thead>
                                                                <tr>
                                                                    <th> STT</th>
                                                                    <th> Tên Chương Trình</th>
                                                                    <th> Học Phần</th>
                                                                    <th> Khóa</th>
                                                                    <th> Vai Trò</th>
                                                                    <th> Thời Gian</th>
                                                                    <th> Ghi Chú</th>
                                                                    <th> Hành Động</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if( $xaydung->count() > 0 ): ?>
                                                                    <?php $stt = 1; ?>
                                                                    <?php $__currentLoopData = $xaydung; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <tr>
                                                                        <td> <?php echo e($stt); ?> </td>
                                                                        <td> <?php echo e($v->ten); ?> </td>
                                                                        <td> <?php echo e($v->hocphan); ?> </td>
                                                                        <td> <?php echo e($v->khoa); ?> </td>
                                                                        <td> <?php echo e($v->vai_tro); ?> </td>
                                                                        <td> <?php echo e($v->thoigian); ?> </td>
                                                                        <td> <?php echo e($v->ghichu); ?> </td>
                                                                        <td>
                                                                            <a data-xaydung-id="<?php echo e($v->id); ?>" class="btn_edit_xaydung btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                                            <a class="btn_delete_xaydung btn btn-xs red-mint" href="#" data-xaydung-id="<?php echo e($v->id); ?>" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php $stt++; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->
                                            <?php else: ?>
                                                <div class="alert alert-danger" style="margin-bottom: 0px;">
                                                    <p> Giảng Viên này không có Xây Dựng Chương Trình nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_xaydung"><i class="fa fa-plus"></i> Tạo Xây Dựng Chương Trình</a></p>
                                                </div>
                                            <?php endif; ?> 
                                        </div>
                                        <!-- END TAB 3-->
                                   <!-- BEGIN TAB 5-->
                                   <div class="tab-pane" id="tab5">
                                    <?php if($dang->isNotEmpty()): ?>
                                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                        <div class="portlet light portlet-fit bordered">
                                            <div class="portlet-body">
                                                <div class="table-toolbar">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="btn-group">
                                                                <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_dang"><i class="fa fa-plus"></i> Tạo Hoạt Động Mới
                        
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table class="table table-striped table-hover table-bordered" id="table_ds_dang">
                                                    <thead>
                                                        <tr>
                                                            <th> STT</th>
                                                            <th> Nội Dung</th>
                                                            <th> Kết Quả</th>
                                                            <th> Vai Trò</th>
                                                            <th> Thời Gian</th>
                                                            <th> Ghi Chú</th>
                                                            <th> Hành Động</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if( $dang->count() > 0 ): ?>
                                                            <?php $stt = 1; ?>
                                                            <?php $__currentLoopData = $dang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td> <?php echo e($stt); ?> </td>
                                                                <td> <?php echo e($v->ten); ?> </td>
                                                                <td> <?php echo e($v->ket_qua); ?> </td>
                                                                <td> <?php echo e($v->vai_tro); ?> </td>
                                                                <td> <?php echo e($v->thoigian); ?> </td>
                                                                <td> <?php echo e($v->ghichu); ?> </td>
                                                                <td>
                                                                    <a data-dang-id="<?php echo e($v->id); ?>" class="btn_edit_dang btn btn-xs yellow-gold" href="#modal_edit_dang" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                                    <a class="btn_delete_dang btn btn-xs red-mint" href="#" data-dang-id="<?php echo e($v->id); ?>" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                                                </td>
                                                            </tr>
                                                            <?php $stt++; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- END EXAMPLE TABLE PORTLET-->
                                    <?php else: ?>
                                        <div class="alert alert-danger" style="margin-bottom: 0px;">
                                            <p> Giảng Viên này không tham gia hoạt động Đảng/Đoàn nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_dang"><i class="fa fa-plus"></i> Tạo HĐ Mới</a></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- END TAB 5-->
                                <!-- BEGIN XỬ LÝ VĂN BẢN-->
                                <div class="tab-pane active" id="tab_vanban">
                                    <?php if($vanban->isNotEmpty()): ?>
                                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                        <div class="portlet light portlet-fit bordered">
                                            <div class="portlet-body">
                                                <div class="table-toolbar">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="btn-group">
                                                                <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_vanban"><i class="fa fa-plus"></i> Thêm Văn Bản Mới
                        
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table class="table table-striped table-hover table-bordered" id="table_ds_vanban">
                                                    <thead>
                                                        <tr>
                                                        <th> STT</th>
                                                            <th> Nội Dung</th>
                                                            <th> Lãnh Đạo Xử Lý</th>
                                                            <th> Thời Gian Nhận</th>
                                                            <th> Hạn</th>
                                                            <th> Ghi Chú</th>
                                                            <th> Hành Động</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if( $vanban->count() > 0 ): ?>
                                                            <?php $stt = 1; ?>
                                                            <?php $__currentLoopData = $vanban; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td> <?php echo e($stt); ?> </td>
                                                                <td> <?php echo e($v->noi_dung); ?> </td>
                                                                <td> <?php echo e($v->lanhdao); ?> </td>
                                                                <td> <?php echo e($v->thoigian_nhan); ?> </td>
                                                                <td> <?php echo e($v->thoigian_den); ?> </td>
                                                                <td> <?php echo e($v->ghichu); ?> </td>
                                                                <td>
                                                                    <a data-vanban-id="<?php echo e($v->id); ?>" class="btn_edit_vanban btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                                    <a class="btn_delete_vanban btn btn-xs red-mint" href="#" data-vanban-id="<?php echo e($v->id); ?>" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                                                </td>
                                                            </tr>
                                                            <?php $stt++; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- END EXAMPLE TABLE PORTLET-->
                                    <?php else: ?>
                                        <div class="alert alert-danger" style="margin-bottom: 0px;">
                                            <p> Không có văn bản nào!  <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_vanban"><i class="fa fa-plus"></i> Thêm Văn Bản </a></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- END XỬ LÝ VĂN BẢN-->
                            </div>
                        </form>
                        <?php echo $__env->make('xaydung.modals.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('xaydung.modals.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('dang.modals.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('dang.modals.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('vanban.modals.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('vanban.modals.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        
                        <!-- END FORM-->
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
        </div>
        <div class="row box_gio">
            <div class="col-md-12">
            <h2>Tổng Giờ</h2>
                <div class="tabbable tabbable-tabdrop">
                    <ul class="nav nav-pills" id="#myTab">
                        
                    <li class="active">
                            <a href="#tab17" data-toggle="tab">Giờ Giảng</a>
                        </li>
                        <li >
                            <a href="#tab2" data-toggle="tab">NCKH</a>
                        </li>
                        <li>
                            <a href="#tab_giokhac" data-toggle="tab">Giờ Hoạt Động Khác</a>
                        </li>
                    </ul>
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form" id="form_wizard_1">
                        <!-- BEGIN FORM-->
                        <form action="<?php echo e(route('profile.edit.post', $giangvien->id)); ?>" method="post" id="form_sample_2" class="form-horizontal">
                            <?php echo csrf_field(); ?>
                            <div class="tab-content">
                                <!-- BEGIN TAB 2-->
                                <div class="tab-pane " id="tab2">
                                    <?php if(!empty($nckh)): ?>
                                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                    <div class="portlet light portlet-fit bordered">
                                        <div class="portlet-body">
                                            <table class="table table-striped table-hover table-bordered" id="table_ds_nckh">
                                                <thead>
                                                    <tr>
                                                        <th> STT</th>
                                                        <th> Tên NCKH</th>
                                                        <th> Chủ Biên</th>
                                                        <th> Tham Gia</th>
                                                        <th> Bắt Đầu</th>
                                                        <th> Kết Thúc</th>
                                                        <th> Số Trang</th>
                                                        <th> Số Giờ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if( count($nckh) > 0 ): ?>
                                                        <?php $stt = 1; ?>
                                                        <?php $__currentLoopData = $nckh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td> <?php echo e($stt); ?> </td>
                                                            <td> <?php echo e($v->ten); ?> </td>
                                                            <td>
                                                                <?php
                                                                $chubien = json_decode( $v->chubien, true);
                                                            ?>
                                                                <?php $__currentLoopData = $chubien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                                                    <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?> </p>
                                                                <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $thamgia = json_decode( $v->thamgia, true);
                                                            ?>
                                                                <?php $__currentLoopData = $thamgia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                                                    <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?> </p>
                                                                <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </td>
                                                            <td> <?php echo e($v->batdau); ?></td>
                                                            <td> <?php echo e($v->ketthuc); ?></td>
                                                            <td> <?php echo e($v->sotrang); ?></td>
                                                            <td>
                                                                
                                                                <?php switch($v->theloai):
                                                                    case (1): ?>
                                                                    <?php echo e($gio_kh = ($v->sotrang/2.5)*8*4); ?> giờ
                                                                        <?php break; ?>
                                                                    <?php case (2): ?>
                                                                       <?php echo e($gio_kh = ($v->sotrang/2.5)*4*4); ?> giờ
                                                                        <?php break; ?>
                                                                    <?php case (3): ?>
                                                                        <?php echo e($gio_kh = 6*4); ?> giờ
                                                                        <?php break; ?>
                                                                    <?php case (4): ?>
                                                                    <?php echo e($gio_kh =($v->sotrang/2.5)*10*4); ?> giờ
                                                                        <?php break; ?>
                                                                    <?php case (5): ?>
                                                                    <?php echo e($gio_kh = $v->sotrang*1.5); ?> giờ
                                                                        <?php break; ?>
                                                                    <?php case (6): ?>
                                                                        <?php echo e($gio_kh = $v->sotrang*4.27); ?> giờ
                                                                        <?php break; ?>
                                                                    <?php case (7): ?>
                                                                        <?php echo e($gio_kh = $v->sotrang*2); ?> giờ
                                                                        <?php break; ?>
                                                                    <?php case (8): ?>
                                                                        <?php echo e($gio_kh = $v->sotrang); ?> giờ
                                                                        <?php break; ?>
                                                                    <?php default: ?>
                                                                        <?php echo e($gio_kh = $v->sotrang); ?> giờ
                                                                <?php endswitch; ?>
                                                            </td>
                                                        </tr>
                                                        <?php $stt++; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- END EXAMPLE TABLE PORTLET-->
                                    <?php else: ?>
                                        <div class="alert alert-danger" style="margin-bottom: 0px;">
                                            <p> Không có Nghiên cứu khoa học nào!</p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- END BEGIN TAB 2-->
                                                <!-- BEGIN TAB 11-->
                                                <div class="tab-pane active" id="tab17">
                                                        <?php if(!empty($hocphan)): ?>
                                                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                        <div class="portlet light portlet-fit bordered">
                                                            <div class="portlet-body">
                                                                <table class="table table-striped table-hover table-bordered" id="table_ds_tonggio">
                                                                    <thead>
                                                                        <tr>
                                                                            <th> STT</th>
                                                                            <th> Mã Học Phần</th>
                                                                            <th> Tên Học Phần</th>
                                                                            <th> Lớp</th>
                                                                            <th> Hệ</th>
                                                                            <th> Quy Mô</th>
                                                                            <th> Số Giờ Nghĩa Vụ</th>
                                                                            <th> Số Giờ Tính Tiền</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php if( count($hocphan) > 0 ): ?>
                                                                            <?php 
                                                                                $stt = 1; 
                                                                                $tongtiet = 0;
                                                                                $tongnghiavu = 0;
                                                                                $tongtien = 0;
                                                                            ?>
                                                                            <?php $__currentLoopData = $hocphan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_hocphan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php 
                                                                                $id_giangvien = $giangvien->id;
                                                                                $id_hocphan = $v_hocphan->id;
                                                                                $tiet = 0;
                                                                                $tien = 0;
                                                                                //Tìm trong bảng tiết nếu giảng viên có dạy học phần đó 
                                                                                $is_tiet = App\Tiet::where('id_hocphan', $id_hocphan)->where('id_giangvien', $id_giangvien)->first();
                                                                                if($is_tiet){
                                                                                    //Cộng trong bảng Tiết
                                                                                    $tiet_hocphans = App\Tiet::where('id_hocphan', $id_hocphan)->where('id_giangvien', $id_giangvien)->get();
                                                                                    foreach($tiet_hocphans as $v_tiet_hocphan){
                                                                                        if($v_tiet_hocphan->lops->he == 1)
                                                                                       {$tiet += $v_tiet_hocphan->so_tiet;} 
                                                                                      else if($v_tiet_hocphan->lops->he == 0)
                                                                                       {$tien +=$v_tiet_hocphan->so_tiet;} 
                                                                                    }
                                                                                    //Tổng số tiết tính giờ bằng số tiết * quy mô
                                                                                    //Tổng số giờ tính tiền bằng số tiết * quy mô
                                                                                    $quymo = $v_hocphan->lops->quymo;
                                                                                    $tiet = $tiet * $quymo;
                                                                                    $tien = $tien * $quymo;
                                                                                    $he = ($v_hocphan->lops->he) ? 'Tính Giờ' : 'Tính Tiền';
                                                                                   
                                                                                   echo "<tr>"
                                                                                        ."<td>"."$stt"."</td>"
                                                                                        ."<td>"."{$v_hocphan->mahocphan}"."</td>"
                                                                                        ."<td>"."{$v_hocphan->tenhocphan}"."</td>"
                                                                                        ."<td>"."{$v_hocphan->lops->tenlop}"."</td>"
                                                                                        ."<td>"."{$he}"."</td>"
                                                                                        ."<td>"."{$v_hocphan->lops->quymo}"."</td>"
                                                                                        ."<td>"."$tiet"."</td>"
                                                                                        ."<td>"."$tien"."</td>"
                                                                                   ."</tr>";
                                                                                   $stt++;
                                                                           
                                                                                }
                                                                                $tongtiet += $tiet;
                                                                                $tongtiet += $tien;
                                                                                $tongnghiavu += $tiet;
                                                                                $tongtien += $tien;
                                                                            ?> 
                                                                           
                                                                           
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            <tr>
                                                                            <td colspan="6"> <p> <b>Tổng Giờ: <?php echo e($tongtiet); ?></b> </p></td>
                                                                            <td> Tổng Giờ Nghĩa Vụ: <?php echo e($tongnghiavu); ?></td>
                                                                            <td> Tổng Giờ Tính Tiền: <?php echo e($tongtien); ?></td>
                                                                            </tr>
                                                                        <?php endif; ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!-- END EXAMPLE TABLE PORTLET-->
                                                        <?php else: ?>
                                                            <div class="alert alert-danger" style="margin-bottom: 0px;">
                                                                <p> Không có Nghiên cứu khoa học nào!</p>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <!-- END BEGIN TAB 17-->
                        
                                                    <!-- BEGIN GIỜ KHÁC-->
                                                    <div class="tab-pane" id="tab_giokhac">
                                                        <?php if(($hop->isNotEmpty()) || ($chambai->isNotEmpty()) || ($congtac->isNotEmpty()) || ($daygioi->isNotEmpty()) || ($hoctap->isNotEmpty()) || ($hdkh->isNotEmpty())): ?>
                                                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                        <div class="portlet light portlet-fit bordered">
                                                            <div class="portlet-body">
                                                                <table class="table table-striped table-hover table-bordered" id="table_ds_ct">
                                                                    <thead>
                                                                        <tr>
                                                                            <th> STT</th>
                                                                            <th> Thể Loại</th>
                                                                            <th> Tổng Số Giờ</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php 
                                                                            $stt = 1; 
                                                                            $total_hop = 0;
                                                                            $total_chambai = 0;
                                                                            $total_congtac = 0;
                                                                            $total_daygioi = 0; 
                                                                            $total_hoctap = 0; 
                                                                            $total_hdkh = 0; 
                                                                        
                                                                        ?>
                                                                        <?php if( $hop->count() > 0 ): ?>
                                                                            <?php  ?>
                                                                            <?php $__currentLoopData = $hop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_hop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php $total_hop += $v_hop->so_gio; ?>
                                                                            <tr>
                                                                                <td> <?php echo e($stt); ?> </td>
                                                                                <td> Họp </td>
                                                                                <td> <?php echo e($total_hop); ?> </td>
                                                                            </tr>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php $stt++; ?>
                                                                        <?php endif; ?>
                                                                       
                                                                        <?php if( $chambai->count() > 0 ): ?>
                                                                            <?php $__currentLoopData = $chambai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_chambai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php $total_chambai += $v_chambai->so_gio; ?>
                                                                            <tr>
                                                                                <td> <?php echo e($stt); ?> </td>
                                                                                <td> Chấm Bài </td>
                                                                                <td> <?php echo e($total_chambai); ?> </td>
                                                                            </tr>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php $stt++; ?>
                                                                        <?php endif; ?>
                                                                       
                                                                        <?php if( $congtac->count() > 0 ): ?>
                                                                            <?php $__currentLoopData = $congtac; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_congtac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php $total_congtac += $v_congtac->so_gio; ?>
                                                                            <tr>
                                                                                <td> <?php echo e($stt); ?> </td>
                                                                                <td> Đi Thực Tế</td>
                                                                                <td> <?php echo e($total_congtac); ?> </td>
                                                                            </tr>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php $stt++; ?>
                                                                        <?php endif; ?>
                        
                                                                        <?php if( $daygioi->count() > 0 ): ?>
                                                                           
                                                                            <?php $__currentLoopData = $daygioi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_daygioi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php $total_daygioi += $v_daygioi->so_gio; ?>
                                                                            <tr>
                                                                                <td> <?php echo e($stt); ?> </td>
                                                                                <td> Dạy Giỏi</td>
                                                                                <td> <?php echo e($total_daygioi); ?> </td>
                                                                            </tr>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php $stt++; ?>
                                                                        <?php endif; ?>
                        
                                                                        <?php if( $hoctap->count() > 0 ): ?>
                                                                           
                                                                            <?php $__currentLoopData = $hoctap; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_hoctap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php $total_hoctap += $v_hoctap->so_gio; ?>
                                                                            <tr>
                                                                                <td> <?php echo e($stt); ?> </td>
                                                                                <td> Tham Gia Học Tập</td>
                                                                                <td> <?php echo e($total_hoctap); ?> </td>
                                                                            </tr>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php $stt++; ?>
                                                                        <?php endif; ?>
                        
                                                                        <?php if( $hdkh->count() > 0 ): ?>
                                                                           
                                                                            <?php $__currentLoopData = $hdkh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_hdkh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php $total_hdkh += $v_hdkh->so_gio; ?>
                                                                            <tr>
                                                                                <td> <?php echo e($stt); ?> </td>
                                                                                <td> Hướng Dẫn Khoa Học </td>
                                                                                <td> <?php echo e($total_hdkh); ?> </td>
                                                                            </tr>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php $stt++; ?>
                                                                        <?php endif; ?>
                                                                        <?php $total = $total_hop + $total_chambai + $total_congtac + $total_daygioi + $total_hdkh + $total_hoctap; ?>
                        
                                                                        <tr> 
                                                                            <td colspan="2"> Tổng Giờ: </td>
                                                                            <td> <?php echo e($total); ?> </td>
                        
                                                                        </tr>
                        
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!-- END EXAMPLE TABLE PORTLET-->
                                                        <?php else: ?>
                                                            <div class="alert alert-danger" style="margin-bottom: 0px;">
                                                                <p> Không tham gia hoạt động nào!</p>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <!-- END GIỜ KHÁC-->
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
        // END Reload trang và giữ nguyên tab đã active
        var table_tonggio = $('#table_ds_tonggio');

var oTable_tonggio = table_tonggio.dataTable({

    "lengthMenu": [
        [10, 20, 50, -1],
        [10, 20, 50, "Tất cả"] // change per page values here
    ],

    "pageLength": 10,

    "language": {
        "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
        "zeroRecords": "Không tìm thấy dữ liệu",
        "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Học Phần tham gia Giảng Dạy: _TOTAL_",
        "infoEmpty": "Không có bản ghi nào",
        "infoFiltered": "(chọn lọc từ _MAX_ bản ghi)",
        "search": "Tìm kiếm",
        "paginate": {
            "first":      "Đầu",
            "last":       "Cuối",
            "next":       "Sau",
            "previous":   "Trước"
        },
    },
    "columnDefs": [{ // set default column settings
        'orderable': true,
        'targets': [0]
    }, {
        "searchable": true,
        "targets": [0]
    }],
    "order": [
        // [0, "asc"]
    ] // set first column as a default sort by asc
});




//End Phân trang bảng Nghiên cứu khoa học 
         // Ajax thêm NCKH
    $("#btn_add_nckh").on('click', function(e){

       e.preventDefault();
       $("#btn_add_nckh").attr("disabled", "disabled");
       $("#btn_add_nckh").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
       $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
       $.ajax({

           url: '<?php echo e(route('postThemNckh')); ?>',
           method: 'POST',
           data: {
               id_giangvien: $("#form_add_nckh input[name='id_giangvien']").val(),
               ten: $("#form_add_nckh input[name='ten']").val(),
               tiendo: $("#form_add_nckh input[name='tiendo']").val(),
               thoigian: $("#form_add_nckh input[name='thoigian']").val(),
           },
           success: function(data) {
               console.log("Hihi");
               $("#btn_add_nckh").removeAttr("disabled");
               $("#btn_add_nckh").html('<i class="fa fa-save"></i> Lưu');
               if(data.status == false){
                   var errors = "";
                   $.each(data.data, function(key, value){
                       $.each(value, function(key2, value2){
                           errors += value2 +"<br>";
                       });
                   });
                   toastr.options = {
                       "closeButton": true,
                       "debug": false,
                       "positionClass": "toast-top-center",
                       "onclick": null,
                       "showDuration": "1000",
                       "hideDuration": "1000",
                       "timeOut": "5000",
                       "extendedTimeOut": "1000",
                       "showEasing": "swing",
                       "hideEasing": "linear",
                       "showMethod": "fadeIn",
                       "hideMethod": "fadeOut"
                   }
                   toastr["error"](errors, "Lỗi")
               }
               if(data.status == true){
                   $('#modal_add_nckh').modal('hide');
                   swal({
                       "title":"Đã tạo!",
                       "text":"Bạn đã tạo thành công NCKH!",
                       "type":"success"
                   }, function() {
                           localStorage.setItem('activeTab', '#tab2');
                           location.reload();
                       }
                   );
               }
           }
       });
   });
   // END Ajax thêm NCKH
   //AJAX Tìm NCKH Theo ID
        $(".btn_edit_nckh").on("click", function(e){
            e.preventDefault();
            var nckh_id = $(this).data("nckh-id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '<?php echo e(route('postTimNckhTheoId')); ?>',
                method: 'POST',
                data: {
                    id: nckh_id
                },
                success: function(data) {
                    if(data.status == true){
                        // console.log(data.data);
                        $("#form_edit_nckh input[name='id_giangvien']").val(data.data.id_giangvien);
                        $("#form_edit_nckh input[name='id']").val(data.data.id);
                        $("#form_edit_nckh input[name='ten']").val(data.data.ten);
                        $("#form_edit_nckh input[name='tiendo']").val(data.data.tiendo);
                        $("#form_edit_nckh input[name='thoigian']").val(data.data.thoigian);
                        $('#modal_edit_nckh').modal('show');
                    }
                }
            });
        });
        // END Khi click vào nút sửa NCKH, tìm NCKH theo id và đỗ dữ liệu vào form


        // Ajax sửa NCKH
        $("#btn_edit_nckh").on('click', function(e){
            e.preventDefault();
            $("#btn_edit_nckh").attr("disabled", "disabled");
            $("#btn_edit_nckh").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '<?php echo e(route('postSuaNckh')); ?>',
                method: 'POST',
                data: {
                    id: $("#form_edit_nckh input[name='id']").val(),
                    id_giangvien: $("#form_edit_nckh input[name='id_giangvien']").val(),
                    ten: $("#form_edit_nckh input[name='ten']").val(),
                    tiendo: $("#form_edit_nckh input[name='tiendo']").val(),
                    thoigian: $("#form_edit_nckh input[name='thoigian']").val(),

                },
                success: function(data) {
                    $("#btn_edit_nckh").removeAttr("disabled");
                    $("#btn_edit_nckh").html('<i class="fa fa-save"></i> Lưu');
                    if(data.status == false){
                        var errors = "";
                        $.each(data.data, function(key, value){
                            $.each(value, function(key2, value2){
                                errors += value2 +"<br>";
                            });
                        });
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "positionClass": "toast-top-center",
                            "onclick": null,
                            "showDuration": "1000",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr["error"](errors, "Lỗi")
                    }
                    if(data.status == true){
                        $('#modal_edit_nckh').modal('hide');
                        swal({
                            "title":"Đã sửa!",
                            "text":"Bạn đã sửa thành công Nghiên Cứu Khoa Học!",
                            "type":"success"
                        }, function() {
                                localStorage.setItem('activeTab', '#tab2');
                                location.reload();
                            }
                        );
                    }
                }
            });
        });
        // END Ajax sửa NCKH

        // Xử lý khi click nút xóa NCKH
        $(".btn_delete_nckh").on("click", function(e){
            e.preventDefault();
            var nckh_id = $(this).data("nckh-id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            swal({
                title: "Xóa NCKH này?",
                text: "Bạn có chắc không, nó sẽ bị xóa vĩnh viễn!",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: 'Không',
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Có, xóa ngay!",
                closeOnConfirm: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        $.ajax({
                            url: '<?php echo e(route('postXoaNckh')); ?>',
                            method: 'POST',
                            data: {
                                id: nckh_id
                            },
                            success: function(data) {
                                console.log(data);
                                if(data.status == true){
                                    swal({
                                        "title":"Đã xóa!",
                                        "text":"Bạn đã xóa thành công NCKH!",
                                        "type":"success"
                                    }, function() {
                                            localStorage.setItem('activeTab', '#tab2');
                                            location.reload();
                                        }
                                    );
                                }
                            }
                        });
                    }
            });

        });
        // END Xử lý khi click nút xóa NCKH
        //Begin phân trang bảng Nghiên cứu khoa học
var table_nckh = $('#table_ds_nckh');

var oTable_nckh = table_nckh.dataTable({

    "lengthMenu": [
        [10, 20, 50, -1],
        [10, 20, 50, "Tất cả"] // change per page values here
    ],

    "pageLength": 10,

    "language": {
        "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
        "zeroRecords": "Không tìm thấy dữ liệu",
        "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Nghiên cứu khoa học: _TOTAL_",
        "infoEmpty": "Không có bản ghi nào",
        "infoFiltered": "(chọn lọc từ _MAX_ bản ghi)",
        "search": "Tìm kiếm",
        "paginate": {
            "first":      "Đầu",
            "last":       "Cuối",
            "next":       "Sau",
            "previous":   "Trước"
        },
    },
    "columnDefs": [{ // set default column settings
        'orderable': true,
        'targets': [0]
    }, {
        "searchable": true,
        "targets": [0]
    }],
    "order": [
        // [0, "asc"]
    ] // set first column as a default sort by asc
});
// ==================================================================//

// ==================================================================//

         // Ajax thêm Công Tác
    $("#btn_add_congtac").on('click', function(e){
        e.preventDefault();
        $("#btn_add_congtac").attr("disabled", "disabled");
        $("#btn_add_congtac").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
        $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
        $.ajax({

            url: '<?php echo e(route('postThemCongTac')); ?>',
            method: 'POST',
            data: {
                id_giangvien: $("#form_add_congtac input[name='id_giangvien']").val(),
                ten: $("#form_add_congtac input[name='ten']").val(),
                so_gio: $("#form_add_congtac input[name='so_gio']").val(),
                thoigian: $("#form_add_congtac input[name='thoigian']").val(),
                ghichu: $("#form_add_congtac input[name='ghichu']").val(),
            },
            success: function(data) {
                console.log("Hihi");
                $("#btn_add_congtac").removeAttr("disabled");
                $("#btn_add_congtac").html('<i class="fa fa-save"></i> Lưu');
                if(data.status == false){
                    var errors = "";
                    $.each(data.data, function(key, value){
                        $.each(value, function(key2, value2){
                            errors += value2 +"<br>";
                        });
                    });
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "positionClass": "toast-top-center",
                        "onclick": null,
                        "showDuration": "1000",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    toastr["error"](errors, "Lỗi")
                }
                if(data.status == true){
                    $('#modal_add_congtac').modal('hide');
                    swal({
                        "title":"Đã tạo!",
                        "text":"Bạn đã tạo thành công Đi Thực Tế!",
                        "type":"success"
                    }, function() {
                            localStorage.setItem('activeTab', '#tab3');
                            location.reload();
                        }
                    );
                }
            }
        });
    });
    // END Ajax thêm congtac
    //AJAX Tìm congtac Theo ID
         $(".btn_edit_congtac").on("click", function(e){
             console.log("Fuck");
             e.preventDefault();
             var congtac_id = $(this).data("congtac-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '<?php echo e(route('postTimCongTacTheoId')); ?>',
                 method: 'POST',
                 data: {
                     id: congtac_id
                 },
                 success: function(data) {
                     if(data.status == true){
                         // console.log(data.data);
                         $("#form_edit_congtac input[name='id_giangvien']").val(data.data.id_giangvien);
                         $("#form_edit_congtac input[name='id']").val(data.data.id);
                         $("#form_edit_congtac input[name='ten']").val(data.data.ten);
                         $("#form_edit_congtac input[name='so_gio']").val(data.data.so_gio);
                         $("#form_edit_congtac input[name='thoigian']").val(data.data.thoigian);
                         $("#form_edit_congtac input[name='ghichu']").val(data.data.ghichu);
                         $('#modal_edit_congtac').modal('show');
                     };
                 }
             });
         });
         // END Khi click vào nút sửa congtac, tìm congtac theo id và đỗ dữ liệu vào form


         // Ajax sửa congtac
         $("#btn_edit_congtac").on('click', function(e){
             e.preventDefault();
             $("#btn_edit_congtac").attr("disabled", "disabled");
             $("#btn_edit_congtac").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '<?php echo e(route('postSuaCongTac')); ?>',
                 method: 'POST',
                 data: {
                     id: $("#form_edit_congtac input[name='id']").val(),
                     id_giangvien: $("#form_edit_congtac input[name='id_giangvien']").val(),
                     ten: $("#form_edit_congtac input[name='ten']").val(),
                     so_gio: $("#form_edit_congtac input[name='so_gio']").val(),
                     thoigian: $("#form_edit_congtac input[name='thoigian']").val(),
                     ghichu: $("#form_edit_congtac input[name='ghichu']").val(),
                 },
                 success: function(data) {
                     $("#btn_edit_congtac").removeAttr("disabled");
                     $("#btn_edit_congtac").html('<i class="fa fa-save"></i> Lưu');
                     if(data.status == false){
                         var errors = "";
                         $.each(data.data, function(key, value){
                             $.each(value, function(key2, value2){
                                 errors += value2 +"<br>";
                             });
                         });
                         toastr.options = {
                             "closeButton": true,
                             "debug": false,
                             "positionClass": "toast-top-center",
                             "onclick": null,
                             "showDuration": "1000",
                             "hideDuration": "1000",
                             "timeOut": "5000",
                             "extendedTimeOut": "1000",
                             "showEasing": "swing",
                             "hideEasing": "linear",
                             "showMethod": "fadeIn",
                             "hideMethod": "fadeOut"
                         }
                         toastr["error"](errors, "Lỗi")
                     };
                     if(data.status == true){
                         $('#modal_edit_congtac').modal('hide');
                         swal({
                             "title":"Đã sửa!",
                             "text":"Bạn đã sửa thành công Đi Thực Tế!",
                             "type":"success"
                         }, function() {
                                 localStorage.setItem('activeTab', '#tab3');
                                 location.reload();
                             }
                         );
                     };
                 }
             });

         });
         // END Ajax sửa congtac

         // Xử lý khi click nút xóa congtac
         $(".btn_delete_congtac").on("click", function(e){
             e.preventDefault();
             var congtac_id = $(this).data("congtac-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             swal({
                 title: "Xóa Đi Thực Tế này?",
                 text: "Bạn có chắc không, nó sẽ bị xóa vĩnh viễn!",
                 type: "warning",
                 showCancelButton: true,
                 cancelButtonText: 'Không',
                 confirmButtonClass: "btn-danger",
                 confirmButtonText: "Có, xóa ngay!",
                 closeOnConfirm: false
                 },
                 function(isConfirm){
                     if (isConfirm) {
                         $.ajax({
                             url: '<?php echo e(route('postXoaCongTac')); ?>',
                             method: 'POST',
                             data: {
                                 id: congtac_id
                             },
                             success: function(data) {
                                 console.log(data);
                                 if(data.status == true){
                                     swal({
                                         "title":"Đã xóa!",
                                         "text":"Bạn đã xóa thành công Đi Thực Tế!",
                                         "type":"success"
                                     }, function() {
                                             localStorage.setItem('activeTab', '#tab3');
                                             location.reload();
                                         }
                                     );
                                 }
                             }
                         });
                     }
             });

         });
         // END Xử lý khi click nút xóa congtac
//Begin phân trang bảng Công tác
var table_congtac = $('#table_ds_congtac');

var oTable_congtac = table_congtac.dataTable({

    "lengthMenu": [
        [10, 20, 50, -1],
        [10, 20, 50, "Tất cả"] // change per page values here
    ],

    "pageLength": 10,

    "language": {
        "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
        "zeroRecords": "Không tìm thấy dữ liệu",
        "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Đi thực tế: _TOTAL_",
        "infoEmpty": "Không có bản ghi nào",
        "infoFiltered": "(chọn lọc từ _MAX_ bản ghi)",
        "search": "Tìm kiếm",
        "paginate": {
            "first":      "Đầu",
            "last":       "Cuối",
            "next":       "Sau",
            "previous":   "Trước"
        },
    },
    "columnDefs": [{ // set default column settings
        'orderable': true,
        'targets': [0]
    }, {
        "searchable": true,
        "targets": [0]
    }],
    "order": [
        // [0, "asc"]
    ] // set first column as a default sort by asc
});

//End Phân trang bảng Công tác 
         // ==================================================================//

              // Ajax thêm Văn Bản Xử Lý
    $("#btn_add_vanban").on('click', function(e){
        console.log("Hihi");
        e.preventDefault();
        $("#btn_add_vanban").attr("disabled", "disabled");
        $("#btn_add_vanban").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
        $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
        $.ajax({

            url: '<?php echo e(route('postThemVanBan')); ?>',
            method: 'POST',
            data: {
                id_giangvien: $("#form_add_vanban input[name='id_giangvien']").val(),
                noi_dung: $("#form_add_vanban input[name='noi_dung']").val(),
                lanhdao: $("#form_add_vanban input[name='lanhdao']").val(),
                thoigian_nhan: $("#form_add_vanban input[name='thoigian_nhan']").val(),
                thoigian_den: $("#form_add_vanban input[name='thoigian_den']").val(),
                ghichu: $("#form_add_vanban input[name='ghichu']").val(),
            },
            success: function(data) {
                console.log("Hihi");
                $("#btn_add_vanban").removeAttr("disabled");
                $("#btn_add_vanban").html('<i class="fa fa-save"></i> Lưu');
                if(data.status == false){
                    var errors = "";
                    $.each(data.data, function(key, value){
                        $.each(value, function(key2, value2){
                            errors += value2 +"<br>";
                        });
                    });
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "positionClass": "toast-top-center",
                        "onclick": null,
                        "showDuration": "1000",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    toastr["error"](errors, "Lỗi")
                }
                if(data.status == true){
                    $('#modal_add_vanban').modal('hide');
                    swal({
                        "title":"Đã tạo!",
                        "text":"Bạn đã tạo thành công Văn Bản Xử Lý!",
                        "type":"success"
                    }, function() {
                            localStorage.setItem('activeTab', '#tab_vanban');
                            location.reload();
                        }
                    );
                }
            }
        });
    });
    // END Ajax thêm vanban
    //AJAX Tìm vanban Theo ID
         $(".btn_edit_vanban").on("click", function(e){
             console.log("Fuck");
             e.preventDefault();
             var vanban_id = $(this).data("vanban-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '<?php echo e(route('postTimVanBanTheoId')); ?>',
                 method: 'POST',
                 data: {
                     id: vanban_id
                 },
                 success: function(data) {
                     if(data.status == true){
                         // console.log(data.data);
                         $("#form_edit_vanban input[name='id_giangvien']").val(data.data.id_giangvien);
                         $("#form_edit_vanban input[name='id']").val(data.data.id);
                         $("#form_edit_vanban input[name='noi_dung']").val(data.data.noi_dung);
                         $("#form_edit_vanban input[name='lanhdao']").val(data.data.lanhdao);
                         $("#form_edit_vanban input[name='thoigian_nhan']").val(data.data.thoigian_nhan);
                         $("#form_edit_vanban input[name='thoigian_den']").val(data.data.thoigian_den);
                         $("#form_edit_vanban input[name='ghichu']").val(data.data.ghichu);
                         $('#modal_edit_vanban').modal('show');
                     };
                 }
             });
         });
         // END Khi click vào nút sửa vanban, tìm vanban theo id và đỗ dữ liệu vào form


         // Ajax sửa vanban
         $("#btn_edit_vanban").on('click', function(e){
             e.preventDefault();
             $("#btn_edit_vanban").attr("disabled", "disabled");
             $("#btn_edit_vanban").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '<?php echo e(route('postSuaVanBan')); ?>',
                 method: 'POST',
                 data: {
                     id: $("#form_edit_vanban input[name='id']").val(),
                     id_giangvien: $("#form_edit_vanban input[name='id_giangvien']").val(),
                     noi_dung: $("#form_edit_vanban input[name='noi_dung']").val(),
                     lanhdao: $("#form_edit_vanban input[name='lanhdao']").val(),
                     thoigian_den: $("#form_edit_vanban input[name='thoigian_den']").val(),
                     thoigian_nhan: $("#form_edit_vanban input[name='thoigian_nhan']").val(),
                     ghichu: $("#form_edit_vanban input[name='ghichu']").val(),
                 },
                 success: function(data) {
                     $("#btn_edit_vanban").removeAttr("disabled");
                     $("#btn_edit_vanban").html('<i class="fa fa-save"></i> Lưu');
                     if(data.status == false){
                         var errors = "";
                         $.each(data.data, function(key, value){
                             $.each(value, function(key2, value2){
                                 errors += value2 +"<br>";
                             });
                         });
                         toastr.options = {
                             "closeButton": true,
                             "debug": false,
                             "positionClass": "toast-top-center",
                             "onclick": null,
                             "showDuration": "1000",
                             "hideDuration": "1000",
                             "timeOut": "5000",
                             "extendedTimeOut": "1000",
                             "showEasing": "swing",
                             "hideEasing": "linear",
                             "showMethod": "fadeIn",
                             "hideMethod": "fadeOut"
                         }
                         toastr["error"](errors, "Lỗi")
                     };
                     if(data.status == true){
                         $('#modal_edit_vanban').modal('hide');
                         swal({
                             "title":"Đã sửa!",
                             "text":"Bạn đã sửa thành công Văn Bản Xử Lý!",
                             "type":"success"
                         }, function() {
                                 localStorage.setItem('activeTab', '#tab_vanban');
                                 location.reload();
                             }
                         );
                     };
                 }
             });

         });
         // END Ajax sửa vanban

         // Xử lý khi click nút xóa vanban
         $(".btn_delete_vanban").on("click", function(e){
             e.preventDefault();
             var vanban_id = $(this).data("vanban-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             swal({
                 title: "Xóa Văn Bản này?",
                 text: "Bạn có chắc không, nó sẽ bị xóa vĩnh viễn!",
                 type: "warning",
                 showCancelButton: true,
                 cancelButtonText: 'Không',
                 confirmButtonClass: "btn-danger",
                 confirmButtonText: "Có, xóa ngay!",
                 closeOnConfirm: false
                 },
                 function(isConfirm){
                     if (isConfirm) {
                         $.ajax({
                             url: '<?php echo e(route('postXoaVanBan')); ?>',
                             method: 'POST',
                             data: {
                                 id: vanban_id
                             },
                             success: function(data) {
                                 console.log(data);
                                 if(data.status == true){
                                     swal({
                                         "title":"Đã xóa!",
                                         "text":"Bạn đã xóa thành công Văn Bản!",
                                         "type":"success"
                                     }, function() {
                                             localStorage.setItem('activeTab', '#tab_vanban');
                                             location.reload();
                                         }
                                     );
                                 }
                             }
                         });
                     }
             });

         });
         // END Xử lý khi click nút xóa vanban
//Begin phân trang bảng Văn Bản 
var table = $('#table_ds_vanban');

var oTable = table.dataTable({

    "lengthMenu": [
        [10, 20, 50, -1],
        [10, 20, 50, "Tất cả"] // change per page values here
    ],

    "pageLength": 10,

    "language": {
        "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
        "zeroRecords": "Không tìm thấy dữ liệu",
        "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Văn Bản Xử lý: _TOTAL_",
        "infoEmpty": "Không có bản ghi nào",
        "infoFiltered": "(chọn lọc từ _MAX_ bản ghi)",
        "search": "Tìm kiếm",
        "paginate": {
            "first":      "Đầu",
            "last":       "Cuối",
            "next":       "Sau",
            "previous":   "Trước"
        },
    },
    "columnDefs": [{ // set default column settings
        'orderable': true,
        'targets': [0]
    }, {
        "searchable": true,
        "targets": [0]
    }],
    "order": [
        // [0, "asc"]
    ] // set first column as a default sort by asc
});
         // ==================================================================//

            // Ajax thêm Hướng Dân Khoa Học
        $("#btn_add_hdkh").on('click', function(e){

            e.preventDefault();
            $("#btn_add_hdkh").attr("disabled", "disabled");
            $("#btn_add_hdkh").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            $.ajax({

                url: '<?php echo e(route('postThemHdkh')); ?>',
                method: 'POST',
                data: {
                    id_giangvien: $("#form_add_hdkh input[name='id_giangvien']").val(),
                    khoa_luan: ($("#form_add_hdkh input[name='khoa_luan']").is(':checked')) ? 1 : 0,
                    luan_van: ($("#form_add_hdkh input[name='luan_van']").is(':checked')) ? 1 : 0,
                    luan_an: ($("#form_add_hdkh input[name='luan_an']").is(':checked')) ? 1 : 0,
                    so_gio: $("#form_add_hdkh input[name='so_gio']").val(),
                    hoc_vien: $("#form_add_hdkh input[name='hoc_vien']").val(),
                    khoa: $("#form_add_hdkh input[name='khoa']").val(),
                    ghichu: $("#form_add_hdkh input[name='ghichu']").val(),
                },
                success: function(data) {
                    console.log("Hihi");
                    $("#btn_add_hdkh").removeAttr("disabled");
                    $("#btn_add_hdkh").html('<i class="fa fa-save"></i> Lưu');
                    if(data.status == false){
                        var errors = "";
                        $.each(data.data, function(key, value){
                            $.each(value, function(key2, value2){
                                errors += value2 +"<br>";
                            });
                        });
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "positionClass": "toast-top-center",
                            "onclick": null,
                            "showDuration": "1000",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr["error"](errors, "Lỗi")
                    }
                    if(data.status == true){
                        $('#modal_add_hdkh').modal('hide');
                        swal({
                            "title":"Đã tạo!",
                            "text":"Bạn đã tạo thành công Hướng Dẫn Khoa Học!",
                            "type":"success"
                        }, function() {
                                localStorage.setItem('activeTab', '#tab_hdkh');
                                location.reload();
                            }
                        );
                    }
                }
            });
        });
// END Ajax thêm hdkh
//AJAX Tìm hdkh Theo ID
 $(".btn_edit_hdkh").on("click", function(e){
     e.preventDefault();
     var hdkh_id = $(this).data("hdkh-id");
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     $.ajax({
         url: '<?php echo e(route('postTimHdkhTheoId')); ?>',
         method: 'POST',
         data: {
             id: hdkh_id
         },
         success: function(data) {
             if(data.status == true){
                 // console.log(data.data);
                 $("#form_edit_hdkh input[name='id_giangvien']").val(data.data.id_giangvien);
                 $("#form_edit_hdkh input[name='id']").val(data.data.id);
                 $("#form_edit_hdkh input[name='khoa_luan']").prop('checked', (data.data.khoa_luan == 1) ? true : false);
                 $("#form_edit_hdkh input[name='luan_van']").prop('checked', (data.data.luan_van == 1) ? true : false);
                 $("#form_edit_hdkh input[name='luan_an']").prop('checked', (data.data.luan_an == 1) ? true : false);
                 $("#form_edit_hdkh input[name='so_gio']").val(data.data.so_gio);
                 $("#form_edit_hdkh input[name='hoc_vien']").val(data.data.hoc_vien);
                 $("#form_edit_hdkh input[name='khoa']").val(data.data.khoa);
                 $("#form_edit_hdkh input[name='ghichu']").val(data.data.ghichu);
                 $('#modal_edit_hdkh').modal('show');
             }
         }
     });
 });
 // END Khi click vào nút sửa hdkh, tìm hdkh theo id và đỗ dữ liệu vào form


 // Ajax sửa hdkh
 $("#btn_edit_hdkh").on('click', function(e){
     e.preventDefault();
     $("#btn_edit_hdkh").attr("disabled", "disabled");
     $("#btn_edit_hdkh").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     $.ajax({
         url: '<?php echo e(route('postSuaHdkh')); ?>',
         method: 'POST',
         data: {
             id: $("#form_edit_hdkh input[name='id']").val(),
             id_giangvien: $("#form_edit_hdkh input[name='id_giangvien']").val(),
             khoa_luan: ($("#form_edit_hdkh input[name='khoa_luan']").is(':checked')) ? 1 : 0,
             luan_van: ($("#form_edit_hdkh input[name='luan_van']").is(':checked')) ? 1 : 0,
             luan_an: ($("#form_edit_hdkh input[name='luan_an']").is(':checked')) ? 1 : 0,
             so_gio: $("#form_edit_hdkh input[name='so_gio']").val(),
             hoc_vien: $("#form_edit_hdkh input[name='hoc_vien']").val(),
             khoa: $("#form_edit_hdkh input[name='khoa']").val(),
             ghichu: $("#form_edit_hdkh input[name='ghichu']").val(),

         },
         success: function(data) {
             $("#btn_edit_hdkh").removeAttr("disabled");
             $("#btn_edit_hdkh").html('<i class="fa fa-save"></i> Lưu');
             if(data.status == false){
                 var errors = "";
                 $.each(data.data, function(key, value){
                     $.each(value, function(key2, value2){
                         errors += value2 +"<br>";
                     });
                 });
                 toastr.options = {
                     "closeButton": true,
                     "debug": false,
                     "positionClass": "toast-top-center",
                     "onclick": null,
                     "showDuration": "1000",
                     "hideDuration": "1000",
                     "timeOut": "5000",
                     "extendedTimeOut": "1000",
                     "showEasing": "swing",
                     "hideEasing": "linear",
                     "showMethod": "fadeIn",
                     "hideMethod": "fadeOut"
                 }
                 toastr["error"](errors, "Lỗi")
             }
             if(data.status == true){
                 $('#modal_edit_hdkh').modal('hide');
                 swal({
                     "title":"Đã sửa!",
                     "text":"Bạn đã sửa thành công Hướng Dẫn Khoa Học!",
                     "type":"success"
                 }, function() {
                         localStorage.setItem('activeTab', '#tab_hdkh');
                         location.reload();
                     }
                 );
             }
         }
      });
 });
 // END Ajax sửa hdkh

 // Xử lý khi click nút xóa hdkh
 $(".btn_delete_hdkh").on("click", function(e){
     e.preventDefault();
     var hdkh_id = $(this).data("hdkh-id");
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     swal({
         title: "Xóa Hướng Dẫn Khoa Học này?",
         text: "Bạn có chắc không, nó sẽ bị xóa vĩnh viễn!",
         type: "warning",
         showCancelButton: true,
         cancelButtonText: 'Không',
         confirmButtonClass: "btn-danger",
         confirmButtonText: "Có, xóa ngay!",
         closeOnConfirm: false
         },
         function(isConfirm){
             if (isConfirm) {
                 $.ajax({
                     url: '<?php echo e(route('postXoaHdkh')); ?>',
                     method: 'POST',
                     data: {
                         id: hdkh_id
                     },
                     success: function(data) {
                         console.log(data);
                         if(data.status == true){
                             swal({
                                 "title":"Đã xóa!",
                                 "text":"Bạn đã xóa thành công Hướng Dẫn Khoa Học!",
                                 "type":"success"
                             }, function() {
                                     localStorage.setItem('activeTab', '#tab_hdkh');
                                     location.reload();
                                 }
                             );
                         }
                     }
                 });
             }
     });

 });
 // END Xử lý khi click nút xóa hdkh
//Begin phân trang bảng hướng dẫn 
var table_hd = $('#table_ds_hd');

var oTable_hd = table_hd.dataTable({

    "lengthMenu": [
        [10, 20, 50, -1],
        [10, 20, 50, "Tất cả"] // change per page values here
    ],

    "pageLength": 10,

    "language": {
        "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
        "zeroRecords": "Không tìm thấy dữ liệu",
        "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Hướng Dẫn: _TOTAL_",
        "infoEmpty": "Không có bản ghi nào",
        "infoFiltered": "(chọn lọc từ _MAX_ bản ghi)",
        "search": "Tìm kiếm",
        "paginate": {
            "first":      "Đầu",
            "last":       "Cuối",
            "next":       "Sau",
            "previous":   "Trước"
        },
    },
    "columnDefs": [{ // set default column settings
        'orderable': true,
        'targets': [0]
    }, {
        "searchable": true,
        "targets": [0]
    }],
    "order": [
        // [0, "asc"]
    ] // set first column as a default sort by asc
});
 // ==================================================================//


         // Ajax thêm Chấm Bài
    $("#btn_add_chambai").on('click', function(e){

        e.preventDefault();
        $("#btn_add_chambai").attr("disabled", "disabled");
        $("#btn_add_chambai").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
        $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
        $.ajax({

            url: '<?php echo e(route('postThemChamBai')); ?>',
            method: 'POST',
            data: {
                id_giangvien: $("#form_add_chambai input[name='id_giangvien']").val(),
                id_lop: $("#form_add_chambai select[name='id_lop']").val(),
                id_hocphan: $("#form_add_chambai select[name='id_hocphan']").val(),
                ghichu: $("#form_add_chambai input[name='ghichu']").val(),
                so_bai: $("#form_add_chambai input[name='so_bai']").val(),
                so_gio: $("#form_add_chambai input[name='so_gio']").val(),
                thoigian: $("#form_add_chambai input[name='thoigian']").val(),
            },
            success: function(data) {
                console.log("Hihi");
                $("#btn_add_chambai").removeAttr("disabled");
                $("#btn_add_chambai").html('<i class="fa fa-save"></i> Lưu');
                if(data.status == false){
                    var errors = "";
                    $.each(data.data, function(key, value){
                        $.each(value, function(key2, value2){
                            errors += value2 +"<br>";
                        });
                    });
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "positionClass": "toast-top-center",
                        "onclick": null,
                        "showDuration": "1000",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    toastr["error"](errors, "Lỗi")
                }
                if(data.status == true){
                    $('#modal_add_chambai').modal('hide');
                    swal({
                        "title":"Đã tạo!",
                        "text":"Bạn đã tạo thành công Chấm Bài!",
                        "type":"success"
                    }, function() {
                            localStorage.setItem('activeTab', '#tab4');
                            location.reload();
                        }
                    );
                }
            }
        });
    });
    // END Ajax thêm Chấm Bài
    //AJAX Tìm Chấm Bài Theo ID
     $(".btn_edit_chambai").on("click", function(e){
             e.preventDefault();
             var chambai_id = $(this).data("chambai-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '<?php echo e(route('postTimChamBaiTheoId')); ?>',
                 method: 'POST',
                 data: {
                     id: chambai_id
                 },
                 success: function(data) {
                     if(data.status == true){
                         // console.log(data.data);
                         $("#form_edit_chambai input[name='id_giangvien']").val(data.data.id_giangvien);
                         $("#form_edit_chambai select[name='id_lop']").val(data.data.id_lop);
                         $("#form_edit_chambai select[name='id_hocphan']").val(data.data.id_hocphan);
                         $("#form_edit_chambai input[name='id']").val(data.data.id);
                         $("#form_edit_chambai input[name='ghichu']").val(data.data.ghichu);
                         $("#form_edit_chambai input[name='so_gio']").val(data.data.so_gio);
                         $("#form_edit_chambai input[name='so_bai']").val(data.data.so_bai);
                         $("#form_edit_chambai input[name='thoigian']").val(data.data.thoigian);
                         $('#modal_edit_chambai').modal('show');
                     }
                 }
             });
         });
         // END Khi click vào nút sửa chấm Bài, tìm chấm Bài theo id và đỗ dữ liệu vào form


         $("#btn_edit_chambai").on('click', function(e){
             e.preventDefault();
             $("#btn_edit_chambai").attr("disabled", "disabled");
             $("#btn_edit_chambai").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '<?php echo e(route('postSuaChamBai')); ?>',
                 method: 'POST',
                 data: {
                    id: $("#form_edit_chambai input[name='id']").val(),
                     id_giangvien: $("#form_edit_chambai input[name='id_giangvien']").val(),
                     id_lop: $("#form_edit_chambai select[name='id_lop']").val(),
                     id_hocphan: $("#form_edit_chambai select[name='id_hocphan']").val(),
                     ghichu: $("#form_edit_chambai input[name='ghichu']").val(),
                     so_gio: $("#form_edit_chambai input[name='so_gio']").val(),
                     so_bai: $("#form_edit_chambai input[name='so_bai']").val(),
                     thoigian: $("#form_edit_chambai input[name='thoigian']").val(),

                 },
                 success: function(data) {
                     $("#btn_edit_chambai").removeAttr("disabled");
                     $("#btn_edit_chambai").html('<i class="fa fa-save"></i> Lưu');
                     if(data.status == false){
                         var errors = "";
                         $.each(data.data, function(key, value){
                             $.each(value, function(key2, value2){
                                 errors += value2 +"<br>";
                             });
                         });
                         toastr.options = {
                             "closeButton": true,
                             "debug": false,
                             "positionClass": "toast-top-center",
                             "onclick": null,
                             "showDuration": "1000",
                             "hideDuration": "1000",
                             "timeOut": "5000",
                             "extendedTimeOut": "1000",
                             "showEasing": "swing",
                             "hideEasing": "linear",
                             "showMethod": "fadeIn",
                             "hideMethod": "fadeOut"
                         }
                         toastr["error"](errors, "Lỗi")
                     }
                     if(data.status == true){
                         $('#modal_edit_chambai').modal('hide');
                         swal({
                             "title":"Đã sửa!",
                             "text":"Bạn đã sửa thành công Chấm Bài!",
                             "type":"success"
                         }, function() {
                                 localStorage.setItem('activeTab', '#tab4');
                                 location.reload();
                             }
                         );
                     }
                 }
             });
         });

         // Xử lý khi click nút xóa chấm Bài
         $(".btn_delete_chambai").on("click", function(e){
             e.preventDefault();
             var chambai_id = $(this).data("chambai-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             swal({
                 title: "Xóa Chấm Bài này?",
                 text: "Bạn có chắc không, nó sẽ bị xóa vĩnh viễn!",
                 type: "warning",
                 showCancelButton: true,
                 cancelButtonText: 'Không',
                 confirmButtonClass: "btn-danger",
                 confirmButtonText: "Có, xóa ngay!",
                 closeOnConfirm: false
                 },
                 function(isConfirm){
                     if (isConfirm) {
                         $.ajax({
                             url: '<?php echo e(route('postXoaChamBai')); ?>',
                             method: 'POST',
                             data: {
                                 id: chambai_id
                             },
                             success: function(data) {
                                 console.log(data);
                                 if(data.status == true){
                                     swal({
                                         "title":"Đã xóa!",
                                         "text":"Bạn đã xóa thành công chambai!",
                                         "type":"success"
                                     }, function() {
                                             localStorage.setItem('activeTab', '#tab4');
                                             location.reload();
                                         }
                                     );
                                 }
                             }
                         });
                     }
             });

         });
         // END Xử lý khi click nút xóa chấm Bài
         var table_chambai = $('#table_ds_chambai');

var oTable_chambai = table_chambai.dataTable({

    "lengthMenu": [
        [10, 20, 50, -1],
        [10, 20, 50, "Tất cả"] // change per page values here
    ],

    "pageLength": 10,

    "language": {
        "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
        "zeroRecords": "Không tìm thấy dữ liệu",
        "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Chấm Bài: _TOTAL_",
        "infoEmpty": "Không có bản ghi nào",
        "infoFiltered": "(chọn lọc từ _MAX_ bản ghi)",
        "search": "Tìm kiếm",
        "paginate": {
            "first":      "Đầu",
            "last":       "Cuối",
            "next":       "Sau",
            "previous":   "Trước"
        },
    },
    "columnDefs": [{ // set default column settings
        'orderable': true,
        'targets': [0]
    }, {
        "searchable": true,
        "targets": [0]
    }],
    "order": [
        // [0, "asc"]
    ] // set first column as a default sort by asc
});
// ========================================================================

         // Ajax thêm Đảng
    $("#btn_add_dang").on('click', function(e){

        e.preventDefault();
        $("#btn_add_dang").attr("disabled", "disabled");
        $("#btn_add_dang").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
        $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
        $.ajax({

            url: '<?php echo e(route('postThemDang')); ?>',
            method: 'POST',
            data: {
                id_giangvien: $("#form_add_dang input[name='id_giangvien']").val(),
                ten: $("#form_add_dang input[name='ten']").val(),
                thoigian: $("#form_add_dang input[name='thoigian']").val(),
                ket_qua: $("#form_add_dang input[name='ket_qua']").val(),
                vai_tro: $("#form_add_dang input[name='vai_tro']").val(),
                ghichu: $("#form_add_dang input[name='ghichu']").val(),
            },
            success: function(data) {
                console.log("Hihi");
                $("#btn_add_dang").removeAttr("disabled");
                $("#btn_add_dang").html('<i class="fa fa-save"></i> Lưu');
                if(data.status == false){
                    var errors = "";
                    $.each(data.data, function(key, value){
                        $.each(value, function(key2, value2){
                            errors += value2 +"<br>";
                        });
                    });
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "positionClass": "toast-top-center",
                        "onclick": null,
                        "showDuration": "1000",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    toastr["error"](errors, "Lỗi")
                }
                if(data.status == true){
                    $('#modal_add_dang').modal('hide');
                    swal({
                        "title":"Đã tạo!",
                        "text":"Bạn đã tạo thành công Hoạt Động Đảng!",
                        "type":"success"
                    }, function() {
                            localStorage.setItem('activeTab', '#tab5');
                            location.reload();
                        }
                    );
                }
            }
        });
    });
    // END Ajax thêm dang
    //AJAX Tìm dang Theo ID
         $(".btn_edit_dang").on("click", function(e){
             e.preventDefault();
             var dang_id = $(this).data("dang-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '<?php echo e(route('postTimDangTheoId')); ?>',
                 method: 'POST',
                 data: {
                     id: dang_id
                 },
                 success: function(data) {
                     if(data.status == true){
                         // console.log(data.data);
                         $("#form_edit_dang input[name='id_giangvien']").val(data.data.id_giangvien);
                         $("#form_edit_dang input[name='id']").val(data.data.id);
                         $("#form_edit_dang input[name='ten']").val(data.data.ten);
                         $("#form_edit_dang input[name='thoigian']").val(data.data.thoigian);
                         $("#form_edit_dang input[name='vai_tro']").val(data.data.vai_tro);
                         $("#form_edit_dang input[name='ket_qua']").val(data.data.ket_qua);
                         $("#form_edit_dang input[name='ghichu']").val(data.data.ghichu);
                         $('#modal_edit_dang').modal('show');
                     }
                 }
             });
         });
         // END Khi click vào nút sửa dang, tìm dang theo id và đỗ dữ liệu vào form


         // Ajax sửa dang
         $("#btn_edit_dang").on('click', function(e){
             e.preventDefault();
             $("#btn_edit_dang").attr("disabled", "disabled");
             $("#btn_edit_dang").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '<?php echo e(route('postSuaDang')); ?>',
                 method: 'POST',
                 data: {
                     id: $("#form_edit_dang input[name='id']").val(),
                     id_giangvien: $("#form_edit_dang input[name='id_giangvien']").val(),
                     ten: $("#form_edit_dang input[name='ten']").val(),
                     thoigian: $("#form_edit_dang input[name='thoigian']").val(),
                     ket_qua: $("#form_edit_dang input[name='ket_qua']").val(),
                     vai_tro: $("#form_edit_dang input[name='vai_tro']").val(),
                     ghichu: $("#form_edit_dang input[name='ghichu']").val(),

                 },
                 success: function(data) {
                     $("#btn_edit_dang").removeAttr("disabled");
                     $("#btn_edit_dang").html('<i class="fa fa-save"></i> Lưu');
                     if(data.status == false){
                         var errors = "";
                         $.each(data.data, function(key, value){
                             $.each(value, function(key2, value2){
                                 errors += value2 +"<br>";
                             });
                         });
                         toastr.options = {
                             "closeButton": true,
                             "debug": false,
                             "positionClass": "toast-top-center",
                             "onclick": null,
                             "showDuration": "1000",
                             "hideDuration": "1000",
                             "timeOut": "5000",
                             "extendedTimeOut": "1000",
                             "showEasing": "swing",
                             "hideEasing": "linear",
                             "showMethod": "fadeIn",
                             "hideMethod": "fadeOut"
                         }
                         toastr["error"](errors, "Lỗi")
                     }
                     if(data.status == true){
                         $('#modal_edit_dang').modal('hide');
                         swal({
                             "title":"Đã sửa!",
                             "text":"Bạn đã sửa thành công Hoạt Động Đảng!",
                             "type":"success"
                         }, function() {
                                 localStorage.setItem('activeTab', '#tab5');
                                 location.reload();
                             }
                         );
                     }
                 }
             });
         });
         // END Ajax sửa dang

         // Xử lý khi click nút xóa dang
         $(".btn_delete_dang").on("click", function(e){
             e.preventDefault();
             var dang_id = $(this).data("dang-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             swal({
                 title: "Xóa Hoạt Động Đảng này?",
                 text: "Bạn có chắc không, nó sẽ bị xóa vĩnh viễn!",
                 type: "warning",
                 showCancelButton: true,
                 cancelButtonText: 'Không',
                 confirmButtonClass: "btn-danger",
                 confirmButtonText: "Có, xóa ngay!",
                 closeOnConfirm: false
                 },
                 function(isConfirm){
                     if (isConfirm) {
                         $.ajax({
                             url: '<?php echo e(route('postXoaDang')); ?>',
                             method: 'POST',
                             data: {
                                 id: dang_id
                             },
                             success: function(data) {
                                 console.log(data);
                                 if(data.status == true){
                                     swal({
                                         "title":"Đã xóa!",
                                         "text":"Bạn đã xóa thành công Hoạt Động Đảng!",
                                         "type":"success"
                                     }, function() {
                                             localStorage.setItem('activeTab', '#tab5');
                                             location.reload();
                                         }
                                     );
                                 }
                             }
                         });
                     }
             });

         });
         // END Xử lý khi click nút xóa dang
          // Begin cấu hình bảng dạy giỏi
          var table_dang = $('#table_ds_dang');

var oTable_dang = table_dang.dataTable({

    "lengthMenu": [
        [10, 20, 50, -1],
        [10, 20, 50, "Tất cả"] // change per page values here
    ],

    "pageLength": 10,

    "language": {
        "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
        "zeroRecords": "Không tìm thấy dữ liệu",
        "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Đảng: _TOTAL_",
        "infoEmpty": "Không có bản ghi nào",
        "infoFiltered": "(chọn lọc từ _MAX_ bản ghi)",
        "search": "Tìm kiếm",
        "paginate": {
            "first":      "Đầu",
            "last":       "Cuối",
            "next":       "Sau",
            "previous":   "Trước"
        },
    },
    "columnDefs": [{ // set default column settings
        'orderable': true,
        'targets': [0]
    }, {
        "searchable": true,
        "targets": [0]
    }],
    "order": [
        // [0, "asc"]
    ] // set first column as a default sort by asc
});

 // ==================================================================//

         // Ajax thêm Dạy Giỏi
    $("#btn_add_daygioi").on('click', function(e){
        e.preventDefault();
        $("#btn_add_daygioi").attr("disabled", "disabled");
        $("#btn_add_daygioi").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
        $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
        $.ajax({

            url: '<?php echo e(route('postThemDayGioi')); ?>',
            method: 'POST',
            data: {
                id_giangvien: $("#form_add_daygioi input[name='id_giangvien']").val(),
                ten: $("#form_add_daygioi input[name='ten']").val(),
                ghichu: $("#form_add_daygioi input[name='ghichu']").val(),
                thoigian: $("#form_add_daygioi input[name='thoigian']").val(),
                so_gio: $("#form_add_daygioi input[name='so_gio']").val(),
                cap: $("#form_add_daygioi select[name='cap']").val(),
            },
            success: function(data) {
                console.log("Hihi");
                $("#btn_add_daygioi").removeAttr("disabled");
                $("#btn_add_daygioi").html('<i class="fa fa-save"></i> Lưu');
                if(data.status == false){
                    var errors = "";
                    $.each(data.data, function(key, value){
                        $.each(value, function(key2, value2){
                            errors += value2 +"<br>";
                        });
                    });
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "positionClass": "toast-top-center",
                        "onclick": null,
                        "showDuration": "1000",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    toastr["error"](errors, "Lỗi")
                }
                if(data.status == true){
                    $('#modal_add_daygioi').modal('hide');
                    swal({
                        "title":"Đã tạo!",
                        "text":"Bạn đã tạo thành công Dạy Giỏi!",
                        "type":"success"
                    }, function() {
                            localStorage.setItem('activeTab', '#tab6');
                            location.reload();
                        }
                    );
                }
            }
        });
    });
    // END Ajax thêm daygioi
    //AJAX Tìm daygioi Theo ID
         $(".btn_edit_daygioi").on("click", function(e){
             e.preventDefault();
             var daygioi_id = $(this).data("daygioi-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '<?php echo e(route('postTimDayGioiTheoId')); ?>',
                 method: 'POST',
                 data: {
                     id: daygioi_id
                 },
                 success: function(data) {
                     if(data.status == true){
                         // console.log(data.data);
                         $("#form_edit_daygioi input[name='id_giangvien']").val(data.data.id_giangvien);
                         $("#form_edit_daygioi input[name='id']").val(data.data.id);
                         $("#form_edit_daygioi input[name='ten']").val(data.data.ten);
                         $("#form_edit_daygioi input[name='ghichu']").val(data.data.ghichu);
                         $("#form_edit_daygioi input[name='so_gio']").val(data.data.so_gio);
                         $("#form_edit_daygioi select[name='cap']").val(data.data.cap);
                         $("#form_edit_daygioi input[name='thoigian']").val(data.data.thoigian);
                         $('#modal_edit_daygioi').modal('show');
                     }
                 }
             });
         });
         // END Khi click vào nút sửa daygioi, tìm daygioi theo id và đỗ dữ liệu vào form


         // Ajax sửa daygioi
         $("#btn_edit_daygioi").on('click', function(e){
             e.preventDefault();
             $("#btn_edit_daygioi").attr("disabled", "disabled");
             $("#btn_edit_daygioi").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '<?php echo e(route('postSuaDayGioi')); ?>',
                 method: 'POST',
                 data: {
                     id: $("#form_edit_daygioi input[name='id']").val(),
                     id_giangvien: $("#form_edit_daygioi input[name='id_giangvien']").val(),
                     ten: $("#form_edit_daygioi input[name='ten']").val(),
                     ghichu: $("#form_edit_daygioi input[name='ghichu']").val(),
                     so_gio: $("#form_edit_daygioi input[name='so_gio']").val(),
                     cap: $("#form_edit_daygioi select[name='cap']").val(),
                     thoigian: $("#form_edit_daygioi input[name='thoigian']").val(),

                 },
                 success: function(data) {
                     $("#btn_edit_daygioi").removeAttr("disabled");
                     $("#btn_edit_daygioi").html('<i class="fa fa-save"></i> Lưu');
                     if(data.status == false){
                         var errors = "";
                         $.each(data.data, function(key, value){
                             $.each(value, function(key2, value2){
                                 errors += value2 +"<br>";
                             });
                         });
                         toastr.options = {
                             "closeButton": true,
                             "debug": false,
                             "positionClass": "toast-top-center",
                             "onclick": null,
                             "showDuration": "1000",
                             "hideDuration": "1000",
                             "timeOut": "5000",
                             "extendedTimeOut": "1000",
                             "showEasing": "swing",
                             "hideEasing": "linear",
                             "showMethod": "fadeIn",
                             "hideMethod": "fadeOut"
                         }
                         toastr["error"](errors, "Lỗi")
                     }
                     if(data.status == true){
                         $('#modal_edit_daygioi').modal('hide');
                         swal({
                             "title":"Đã sửa!",
                             "text":"Bạn đã sửa thành công Dạy Giỏi!",
                             "type":"success"
                         }, function() {
                                 localStorage.setItem('activeTab', '#tab6');
                                 location.reload();
                             }
                         );
                     }
                 }
             });
         });
         // END Ajax sửa daygioi

         // Xử lý khi click nút xóa daygioi
         $(".btn_delete_daygioi").on("click", function(e){
             e.preventDefault();
             var daygioi_id = $(this).data("daygioi-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             swal({
                 title: "Xóa Dạy Giỏi này?",
                 text: "Bạn có chắc không, nó sẽ bị xóa vĩnh viễn!",
                 type: "warning",
                 showCancelButton: true,
                 cancelButtonText: 'Không',
                 confirmButtonClass: "btn-danger",
                 confirmButtonText: "Có, xóa ngay!",
                 closeOnConfirm: false
                 },
                 function(isConfirm){
                     if (isConfirm) {
                         $.ajax({
                             url: '<?php echo e(route('postXoaDayGioi')); ?>',
                             method: 'POST',
                             data: {
                                 id: daygioi_id
                             },
                             success: function(data) {
                                 console.log(data);
                                 if(data.status == true){
                                     swal({
                                         "title":"Đã xóa!",
                                         "text":"Bạn đã xóa thành công Dạy Giỏi!",
                                         "type":"success"
                                     }, function() {
                                             localStorage.setItem('activeTab', '#tab6');
                                             location.reload();
                                         }
                                     );
                                 }
                             }
                         });
                     }
             });

         });
         // END Xử lý khi click nút xóa Dạy Giỏi
         // Begin cấu hình bảng dạy giỏi
         var table_daygioi = $('#table_ds_daygioi');

var oTable_daygioi = table_daygioi.dataTable({

    "lengthMenu": [
        [10, 20, 50, -1],
        [10, 20, 50, "Tất cả"] // change per page values here
    ],

    "pageLength": 10,

    "language": {
        "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
        "zeroRecords": "Không tìm thấy dữ liệu",
        "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Dạy Giỏi: _TOTAL_",
        "infoEmpty": "Không có bản ghi nào",
        "infoFiltered": "(chọn lọc từ _MAX_ bản ghi)",
        "search": "Tìm kiếm",
        "paginate": {
            "first":      "Đầu",
            "last":       "Cuối",
            "next":       "Sau",
            "previous":   "Trước"
        },
    },
    "columnDefs": [{ // set default column settings
        'orderable': true,
        'targets': [0]
    }, {
        "searchable": true,
        "targets": [0]
    }],
    "order": [
        // [0, "asc"]
    ] // set first column as a default sort by asc
});

 // ==================================================================//

 // ==================================================================//

         // Ajax thêm Xây Dựng
    $("#btn_add_xaydung").on('click', function(e){
        e.preventDefault();
        $("#btn_add_xaydung").attr("disabled", "disabled");
        $("#btn_add_xaydung").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
        $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
        $.ajax({

            url: '<?php echo e(route('postThemXayDung')); ?>',
            method: 'POST',
            data: {
                id_giangvien: $("#form_add_xaydung input[name='id_giangvien']").val(),
                ten: $("#form_add_xaydung input[name='ten']").val(),
                hocphan: $("#form_add_xaydung input[name='hocphan']").val(),
                khoa: $("#form_add_xaydung input[name='khoa']").val(),
                vai_tro: $("#form_add_xaydung input[name='vai_tro']").val(),
                ghichu: $("#form_add_xaydung input[name='ghichu']").val(),
                thoigian: $("#form_add_xaydung input[name='thoigian']").val(),
            },
            success: function(data) {
                console.log("Hihi");
                $("#btn_add_xaydung").removeAttr("disabled");
                $("#btn_add_xaydung").html('<i class="fa fa-save"></i> Lưu');
                if(data.status == false){
                    var errors = "";
                    $.each(data.data, function(key, value){
                        $.each(value, function(key2, value2){
                            errors += value2 +"<br>";
                        });
                    });
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "positionClass": "toast-top-center",
                        "onclick": null,
                        "showDuration": "1000",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    toastr["error"](errors, "Lỗi")
                }
                if(data.status == true){
                    $('#modal_add_xaydung').modal('hide');
                    swal({
                        "title":"Đã tạo!",
                        "text":"Bạn đã tạo thành công xaydung!",
                        "type":"success"
                    }, function() {
                            localStorage.setItem('activeTab', '#tab7');
                            location.reload();
                        }
                    );
                }
            }
        });
    });
    // END Ajax thêm xaydung
    //AJAX Tìm xaydung Theo ID
         $(".btn_edit_xaydung").on("click", function(e){
             e.preventDefault();
             var xaydung_id = $(this).data("xaydung-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '<?php echo e(route('postTimXayDungTheoId')); ?>',
                 method: 'POST',
                 data: {
                     id: xaydung_id
                 },
                 success: function(data) {
                     if(data.status == true){
                         // console.log(data.data);
                         $("#form_edit_xaydung input[name='id_giangvien']").val(data.data.id_giangvien);
                         $("#form_edit_xaydung input[name='id']").val(data.data.id);
                         $("#form_edit_xaydung input[name='ten']").val(data.data.ten);
                         $("#form_edit_xaydung input[name='hocphan']").val(data.data.hocphan);
                         $("#form_edit_xaydung input[name='khoa']").val(data.data.khoa);
                         $("#form_edit_xaydung input[name='vai_tro']").val(data.data.vai_tro);
                         $("#form_edit_xaydung input[name='ghichu']").val(data.data.ghichu);
                         $("#form_edit_xaydung input[name='thoigian']").val(data.data.thoigian);
                         $('#modal_edit_xaydung').modal('show');
                     }
                 }
             });
         });
         // END Khi click vào nút sửa xaydung, tìm xaydung theo id và đỗ dữ liệu vào form


         // Ajax sửa xaydung
         $("#btn_edit_xaydung").on('click', function(e){
             e.preventDefault();
             $("#btn_edit_xaydung").attr("disabled", "disabled");
             $("#btn_edit_xaydung").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '<?php echo e(route('postSuaXayDung')); ?>',
                 method: 'POST',
                 data: {
                     id: $("#form_edit_xaydung input[name='id']").val(),
                     id_giangvien: $("#form_edit_xaydung input[name='id_giangvien']").val(),
                     ten: $("#form_edit_xaydung input[name='ten']").val(),
                     hocphan: $("#form_edit_xaydung input[name='hocphan']").val(),
                     khoa: $("#form_edit_xaydung input[name='khoa']").val(),
                     vai_tro: $("#form_edit_xaydung input[name='vai_tro']").val(),
                     ghichu: $("#form_edit_xaydung input[name='ghichu']").val(),
                     thoigian: $("#form_edit_xaydung input[name='thoigian']").val(),

                 },
                 success: function(data) {
                     $("#btn_edit_xaydung").removeAttr("disabled");
                     $("#btn_edit_xaydung").html('<i class="fa fa-save"></i> Lưu');
                     if(data.status == false){
                         var errors = "";
                         $.each(data.data, function(key, value){
                             $.each(value, function(key2, value2){
                                 errors += value2 +"<br>";
                             });
                         });
                         toastr.options = {
                             "closeButton": true,
                             "debug": false,
                             "positionClass": "toast-top-center",
                             "onclick": null,
                             "showDuration": "1000",
                             "hideDuration": "1000",
                             "timeOut": "5000",
                             "extendedTimeOut": "1000",
                             "showEasing": "swing",
                             "hideEasing": "linear",
                             "showMethod": "fadeIn",
                             "hideMethod": "fadeOut"
                         }
                         toastr["error"](errors, "Lỗi")
                     }
                     if(data.status == true){
                         $('#modal_edit_xaydung').modal('hide');
                         swal({
                             "title":"Đã sửa!",
                             "text":"Bạn đã sửa thành công Xây Dựng Chương Trình!",
                             "type":"success"
                         }, function() {
                                 localStorage.setItem('activeTab', '#tab7');
                                 location.reload();
                             }
                         );
                     }
                 }
             });
         });
         // END Ajax sửa xaydung

         // Xử lý khi click nút xóa xaydung
         $(".btn_delete_xaydung").on("click", function(e){
             e.preventDefault();
             var xaydung_id = $(this).data("xaydung-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             swal({
                 title: "Xóa Xây Dựng Chương Trình này?",
                 text: "Bạn có chắc không, nó sẽ bị xóa vĩnh viễn!",
                 type: "warning",
                 showCancelButton: true,
                 cancelButtonText: 'Không',
                 confirmButtonClass: "btn-danger",
                 confirmButtonText: "Có, xóa ngay!",
                 closeOnConfirm: false
                 },
                 function(isConfirm){
                     if (isConfirm) {
                         $.ajax({
                             url: '<?php echo e(route('postXoaXayDung')); ?>',
                             method: 'POST',
                             data: {
                                 id: xaydung_id
                             },
                             success: function(data) {
                                 console.log(data);
                                 if(data.status == true){
                                     swal({
                                         "title":"Đã xóa!",
                                         "text":"Bạn đã xóa thành công Xây Dựng Chương Trình!",
                                         "type":"success"
                                     }, function() {
                                             localStorage.setItem('activeTab', '#tab7');
                                             location.reload();
                                         }
                                     );
                                 }
                             }
                         });
                     }
             });

         });
         // END Xử lý khi click nút xóa xaydung
         //Begin phân trang bảng Xây dựng chương trình
var table_xaydung = $('#table_ds_xaydung');

var oTable_xaydung = table_xaydung.dataTable({

    "lengthMenu": [
        [10, 20, 50, -1],
        [10, 20, 50, "Tất cả"] // change per page values here
    ],

    "pageLength": 10,

    "language": {
        "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
        "zeroRecords": "Không tìm thấy dữ liệu",
        "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Xây dựng chương trình: _TOTAL_",
        "infoEmpty": "Không có bản ghi nào",
        "infoFiltered": "(chọn lọc từ _MAX_ bản ghi)",
        "search": "Tìm kiếm",
        "paginate": {
            "first":      "Đầu",
            "last":       "Cuối",
            "next":       "Sau",
            "previous":   "Trước"
        },
    },
    "columnDefs": [{ // set default column settings
        'orderable': true,
        'targets': [0]
    }, {
        "searchable": true,
        "targets": [0]
    }],
    "order": [
        // [0, "asc"]
    ] // set first column as a default sort by asc
});

//End Phân trang bảng Xây dựng chương trình
 // ==================================================================//

    $("#btn_add_hop").on('click', function(e){
        e.preventDefault();
        $("#btn_add_hop").attr("disabled", "disabled");
        $("#btn_add_hop").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
        $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
        $.ajax({

            url: '<?php echo e(route('postThemHop')); ?>',
            method: 'POST',
            data: {
                id_giangvien: $("#form_add_hop input[name='id_giangvien']").val(),
                ten: $("#form_add_hop input[name='ten']").val(),
                ghichu: $("#form_add_hop input[name='ghichu']").val(),
                thoigian: $("#form_add_hop input[name='thoigian']").val(),
                so_gio: $("#form_add_hop input[name='so_gio']").val(),
            },
            success: function(data) {
                console.log("Hihi");
                $("#btn_add_hop").removeAttr("disabled");
                $("#btn_add_hop").html('<i class="fa fa-save"></i> Lưu');
                if(data.status == false){
                    var errors = "";
                    $.each(data.data, function(key, value){
                        $.each(value, function(key2, value2){
                            errors += value2 +"<br>";
                        });
                    });
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "positionClass": "toast-top-center",
                        "onclick": null,
                        "showDuration": "1000",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    toastr["error"](errors, "Lỗi")
                }
                if(data.status == true){
                    $('#modal_add_hop').modal('hide');
                    swal({
                        "title":"Đã tạo!",
                        "text":"Bạn đã tạo thành công Cuộc Họp!",
                        "type":"success"
                    }, function() {
                            localStorage.setItem('activeTab', '#tab_hop');
                            location.reload();
                        }
                    );
                }
            }
        });
    });
    // END Ajax thêm hop
    //AJAX Tìm hop Theo ID
    $(".btn_edit_hop").on("click", function(e){
             e.preventDefault();
             var hop_id = $(this).data("hop-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '<?php echo e(route('postTimHopTheoId')); ?>',
                 method: 'POST',
                 data: {
                     id: hop_id
                 },
                 success: function(data) {
                     if(data.status == true){
                         // console.log(data.data);
                         $("#form_edit_hop input[name='id_giangvien']").val(data.data.id_giangvien);
                         $("#form_edit_hop input[name='id']").val(data.data.id);
                         $("#form_edit_hop input[name='ten']").val(data.data.ten);
                         $("#form_edit_hop input[name='ghichu']").val(data.data.ghichu);
                         $("#form_edit_hop input[name='thoigian']").val(data.data.thoigian);
                         $("#form_edit_hop input[name='so_gio']").val(data.data.so_gio);
                         $('#modal_edit_hop').modal('show');
                         $('#modal_edit_hop').modal('show');
                     }
                 }
             });
    });
         // END Khi click vào nút sửa hop, tìm hop theo id và đỗ dữ liệu vào form


         // Ajax sửa hop
         $("#btn_edit_hop").on('click', function(e){
             e.preventDefault();
             $("#btn_edit_hop").attr("disabled", "disabled");
             $("#btn_edit_hop").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '<?php echo e(route('postSuaHop')); ?>',
                 method: 'POST',
                 data: {
                     id: $("#form_edit_hop input[name='id']").val(),
                     id_giangvien: $("#form_edit_hop input[name='id_giangvien']").val(),
                     ten: $("#form_edit_hop input[name='ten']").val(),
                     ghichu: $("#form_edit_hop input[name='ghichu']").val(),
                     thoigian: $("#form_edit_hop input[name='thoigian']").val(),
                     so_gio: $("#form_edit_hop input[name='so_gio']").val(),

                 },
                 success: function(data) {
                     $("#btn_edit_hop").removeAttr("disabled");
                     $("#btn_edit_hop").html('<i class="fa fa-save"></i> Lưu');
                     if(data.status == false){
                         var errors = "";
                         $.each(data.data, function(key, value){
                             $.each(value, function(key2, value2){
                                 errors += value2 +"<br>";
                             });
                         });
                         toastr.options = {
                             "closeButton": true,
                             "debug": false,
                             "positionClass": "toast-top-center",
                             "onclick": null,
                             "showDuration": "1000",
                             "hideDuration": "1000",
                             "timeOut": "5000",
                             "extendedTimeOut": "1000",
                             "showEasing": "swing",
                             "hideEasing": "linear",
                             "showMethod": "fadeIn",
                             "hideMethod": "fadeOut"
                         }
                         toastr["error"](errors, "Lỗi")
                     }
                     if(data.status == true){
                         $('#modal_edit_hop').modal('hide');
                         swal({
                             "title":"Đã sửa!",
                             "text":"Bạn đã sửa thành công Cuộc Họp!",
                             "type":"success"
                         }, function() {
                                 localStorage.setItem('activeTab', '#tab_hop');
                                 location.reload();
                             }
                         );
                     }
                 }
             });
         });
         // END Ajax sửa hop

         // Xử lý khi click nút xóa hop
         $(".btn_delete_hop").on("click", function(e){
             e.preventDefault();
             var hop_id = $(this).data("hop-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             swal({
                 title: "Xóa Cuộc Họp  này?",
                 text: "Bạn có chắc không, nó sẽ bị xóa vĩnh viễn!",
                 type: "warning",
                 showCancelButton: true,
                 cancelButtonText: 'Không',
                 confirmButtonClass: "btn-danger",
                 confirmButtonText: "Có, xóa ngay!",
                 closeOnConfirm: false
                 },
                 function(isConfirm){
                     if (isConfirm) {
                         $.ajax({
                             url: '<?php echo e(route('postXoaHop')); ?>',
                             method: 'POST',
                             data: {
                                 id: hop_id
                             },
                             success: function(data) {
                                 console.log(data);
                                 if(data.status == true){
                                     swal({
                                         "title":"Đã xóa!",
                                         "text":"Bạn đã xóa thành công Cuộc Họp!",
                                         "type":"success"
                                     }, function() {
                                             localStorage.setItem('activeTab', '#tab_hop');
                                             location.reload();
                                         }
                                     );
                                 }
                             }
                         });
                     }
             });

         });
         // END Xử lý khi click nút xóa Cuộc Họp
          //Begin phân trang bảng Hopj
var table_hop = $('#table_ds_hop');

var oTable_hop = table_hop.dataTable({

    "lengthMenu": [
        [10, 20, 50, -1],
        [10, 20, 50, "Tất cả"] // change per page values here
    ],

    "pageLength": 10,

    "language": {
        "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
        "zeroRecords": "Không tìm thấy dữ liệu",
        "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Họp: _TOTAL_",
        "infoEmpty": "Không có bản ghi nào",
        "infoFiltered": "(chọn lọc từ _MAX_ bản ghi)",
        "search": "Tìm kiếm",
        "paginate": {
            "first":      "Đầu",
            "last":       "Cuối",
            "next":       "Sau",
            "previous":   "Trước"
        },
    },
    "columnDefs": [{ // set default column settings
        'orderable': true,
        'targets': [0]
    }, {
        "searchable": true,
        "targets": [0]
    }],
    "order": [
        // [0, "asc"]
    ] // set first column as a default sort by asc
});

//End Phân trang bảng Họp
 // ==================================================================//

         // Ajax thêm Học Tập
    $("#btn_add_hoctap").on('click', function(e){
        e.preventDefault();
        $("#btn_add_hoctap").attr("disabled", "disabled");
        $("#btn_add_hoctap").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
        $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
        $.ajax({

            url: '<?php echo e(route('postThemHocTap')); ?>',
            method: 'POST',
            data: {
                id_giangvien: $("#form_add_hoctap input[name='id_giangvien']").val(),
                ten: $("#form_add_hoctap input[name='ten']").val(),
                loai_hinh: $("#form_add_hoctap input[name='loai_hinh']").val(),
                so_gio: $("#form_add_hoctap input[name='so_gio']").val(),
                ghichu: $("#form_add_hoctap input[name='ghichu']").val(),
                thoigian: $("#form_add_hoctap input[name='thoigian']").val(),
                thoigian_den: $("#form_add_hoctap input[name='thoigian_den']").val(),
            },
            success: function(data) {
                console.log("Hihi");
                $("#btn_add_hoctap").removeAttr("disabled");
                $("#btn_add_hoctap").html('<i class="fa fa-save"></i> Lưu');
                if(data.status == false){
                    var errors = "";
                    $.each(data.data, function(key, value){
                        $.each(value, function(key2, value2){
                            errors += value2 +"<br>";
                        });
                    });
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "positionClass": "toast-top-center",
                        "onclick": null,
                        "showDuration": "1000",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    toastr["error"](errors, "Lỗi")
                }
                if(data.status == true){
                    $('#modal_add_hoctap').modal('hide');
                    swal({
                        "title":"Đã tạo!",
                        "text":"Bạn đã tạo thành công Học Tập!",
                        "type":"success"
                    }, function() {
                            localStorage.setItem('activeTab', '#tab10');
                            location.reload();
                        }
                    );
                }
            }
        });
    });
    // END Ajax thêm hoctap
    //AJAX Tìm hoctap Theo ID
         $(".btn_edit_hoctap").on("click", function(e){
             e.preventDefault();
             var hoctap_id = $(this).data("hoctap-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '<?php echo e(route('postTimHocTapTheoId')); ?>',
                 method: 'POST',
                 data: {
                     id: hoctap_id
                 },
                 success: function(data) {
                     if(data.status == true){
                         // console.log(data.data);
                         $("#form_edit_hoctap input[name='id_giangvien']").val(data.data.id_giangvien);
                         $("#form_edit_hoctap input[name='id']").val(data.data.id);
                         $("#form_edit_hoctap input[name='ten']").val(data.data.ten);
                         $("#form_edit_hoctap input[name='loai_hinh']").val(data.data.loai_hinh);
                         $("#form_edit_hoctap input[name='so_gio']").val(data.data.so_gio);
                         $("#form_edit_hoctap input[name='ghichu']").val(data.data.ghichu);
                         $("#form_edit_hoctap input[name='thoigian']").val(data.data.thoigian);
                         $("#form_edit_hoctap input[name='thoigian_den']").val(data.data.thoigian_den);
                         $('#modal_edit_hoctap').modal('show');
                     }
                 }
             });
         });
         // END Khi click vào nút sửa hoctap, tìm hoctap theo id và đỗ dữ liệu vào form


         // Ajax sửa hoctap
         $("#btn_edit_hoctap").on('click', function(e){
             e.preventDefault();
             $("#btn_edit_hoctap").attr("disabled", "disabled");
             $("#btn_edit_hoctap").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '<?php echo e(route('postSuaHocTap')); ?>',
                 method: 'POST',
                 data: {
                     id: $("#form_edit_hoctap input[name='id']").val(),
                     id_giangvien: $("#form_edit_hoctap input[name='id_giangvien']").val(),
                     ten: $("#form_edit_hoctap input[name='ten']").val(),
                     loai_hinh: $("#form_edit_hoctap input[name='loai_hinh']").val(),
                     so_gio: $("#form_edit_hoctap input[name='so_gio']").val(),
                     ghichu: $("#form_edit_hoctap input[name='ghichu']").val(),
                     thoigian: $("#form_edit_hoctap input[name='thoigian']").val(),
                     thoigian_den: $("#form_edit_hoctap input[name='thoigian_den']").val(),

                 },
                 success: function(data) {
                     $("#btn_edit_hoctap").removeAttr("disabled");
                     $("#btn_edit_hoctap").html('<i class="fa fa-save"></i> Lưu');
                     if(data.status == false){
                         var errors = "";
                         $.each(data.data, function(key, value){
                             $.each(value, function(key2, value2){
                                 errors += value2 +"<br>";
                             });
                         });
                         toastr.options = {
                             "closeButton": true,
                             "debug": false,
                             "positionClass": "toast-top-center",
                             "onclick": null,
                             "showDuration": "1000",
                             "hideDuration": "1000",
                             "timeOut": "5000",
                             "extendedTimeOut": "1000",
                             "showEasing": "swing",
                             "hideEasing": "linear",
                             "showMethod": "fadeIn",
                             "hideMethod": "fadeOut"
                         }
                         toastr["error"](errors, "Lỗi")
                     }
                     if(data.status == true){
                         $('#modal_edit_hoctap').modal('hide');
                         swal({
                             "title":"Đã sửa!",
                             "text":"Bạn đã sửa thành công Học Tập!",
                             "type":"success"
                         }, function() {
                                 localStorage.setItem('activeTab', '#tab10');
                                 location.reload();
                             }
                         );
                     }
                 }
             });
         });
         // END Ajax sửa hoctap

         // Xử lý khi click nút xóa hoctap
         $(".btn_delete_hoctap").on("click", function(e){
             e.preventDefault();
             var hoctap_id = $(this).data("hoctap-id");
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             swal({
                 title: "Xóa Học Tập này?",
                 text: "Bạn có chắc không, nó sẽ bị xóa vĩnh viễn!",
                 type: "warning",
                 showCancelButton: true,
                 cancelButtonText: 'Không',
                 confirmButtonClass: "btn-danger",
                 confirmButtonText: "Có, xóa ngay!",
                 closeOnConfirm: false
                 },
                 function(isConfirm){
                     if (isConfirm) {
                         $.ajax({
                             url: '<?php echo e(route('postXoaHocTap')); ?>',
                             method: 'POST',
                             data: {
                                 id: hoctap_id
                             },
                             success: function(data) {
                                 console.log(data);
                                 if(data.status == true){
                                     swal({
                                         "title":"Đã xóa!",
                                         "text":"Bạn đã xóa thành công Học Tập!",
                                         "type":"success"
                                     }, function() {
                                             localStorage.setItem('activeTab', '#tab10');
                                             location.reload();
                                         }
                                     );
                                 }
                             }
                         });
                     }
             });

         });
         // END Xử lý khi click nút xóa hoctap
         //Begin phân trang bảng Học Tập
         var table_hoctap = $('#table_ds_hoctap');

        var oTable_hoctap = table_hoctap.dataTable({

    "lengthMenu": [
        [10, 20, 50, -1],
        [10, 20, 50, "Tất cả"] // change per page values here
    ],

    "pageLength": 10,

    "language": {
        "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
        "zeroRecords": "Không tìm thấy dữ liệu",
        "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Họp: _TOTAL_",
        "infoEmpty": "Không có bản ghi nào",
        "infoFiltered": "(chọn lọc từ _MAX_ bản ghi)",
        "search": "Tìm kiếm",
        "paginate": {
            "first":      "Đầu",
            "last":       "Cuối",
            "next":       "Sau",
            "previous":   "Trước"
        },
    },
    "columnDefs": [{ // set default column settings
        'orderable': true,
        'targets': [0]
    }, {
        "searchable": true,
        "targets": [0]
    }],
    "order": [
        // [0, "asc"]
    ] // set first column as a default sort by asc
});
 // ==================================================================//
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