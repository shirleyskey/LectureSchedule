<?php $__env->startSection('title', 'Chỉnh sửa Công Việc Khác'); ?>

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
                    <a href="<?php echo e(route('dashboard')); ?>">Bảng Điều Khiển</a>
                    <i class="fa fa-circle"></i>
                    <a href="<?php echo e(route('khac.edit.get')); ?>"> Công Việc Khác </a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> 
            <b>
                
            </b>
           
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
        <div class="row box_gio">
            <div class="col-md-12">
            <h2>Công tác khác</h2>
            <p>
                Tổng Giờ Giảng: <?php echo e($gio_giang); ?>

            </p>
            <p>
                Tổng Giờ Khoa Học: <?php echo e($gio_khoa_hoc); ?>

            </p>
                <div class="tabbable tabbable-tabdrop">
                    <ul class="nav nav-pills" id="#myTab">
                        <li class="active">
                            <a href="#tab_hop" data-toggle="tab">Họp</a>
                        </li>
                        <li>
                            <a href="#tab_hdkh" data-toggle="tab">Hướng Dẫn Khoa Học </a>
                        </li>
                        <li class="">
                            <a href="#tab4" data-toggle="tab">Chấm Bài</a>
                        </li>
                        <li>
                            <a href="#tab3" data-toggle="tab">Đi Thực Tế</a>
                        </li>
                        <li>
                            <a href="#tab6" data-toggle="tab">Dạy Giỏi</a>
                        </li>
                        <li class="">
                            <a href="#tab_vanban" data-toggle="tab">Xử Lý Văn Bản</a>
                        </li>
                        <li>
                            <a href="#tab5" data-toggle="tab">Đảng Đoàn</a>
                        </li>
                    </ul>
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form" id="form_wizard_1">
                        <!-- BEGIN FORM-->
                        
                        <form action="<?php echo e(route('khac.edit.get')); ?>" method="post" id="form_sample_2" class="form-horizontal">
                            <?php echo csrf_field(); ?>
                            <div class="tab-content">
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
                                                                <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_congtac"><i class="fa fa-plus"></i> Tạo Đi Thực Tế Mới
                        
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table class="table table-striped table-hover table-bordered" id="ds_congtac">
                                                    <thead>
                                                        <tr>
                                                            <th> STT</th>
                                                            <th> Tên</th>
                                                            <th> Tên Giảng Viên</th>
                                                            <th> Địa Điểm</th>
                                                            <th> Bắt Đầu</th>
                                                            <th> Kết Thúc</th>
                                                            <th> Giờ Giảng</th>
                                                            <th> Giờ Khoa Học</th>
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
                                                                <td>
                                                                    <?php if(App\GiangVien::where('id', $v->id_giangvien)->first() !== null): ?>
                                                                    <?php echo e($v->giangviens->ten); ?>

                                                                    <?php endif; ?>
                        
                                                                 </td>
                                                                <td> <?php echo e($v->dia_diem); ?> </td>
                                                                <td> <?php echo e($v->bat_dau); ?> </td>
                                                                <td> <?php echo e($v->ket_thuc); ?> </td>
                                                                 <td> <?php echo e($v->gio_giang); ?> </td>
                                                                 <td> <?php echo e($v->gio_khoahoc); ?> </td>
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
                                            <p> Không có Đi Thưc Tế nào.
                                                <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_congtac"><i class="fa fa-plus"></i> Tạo Đi Thực Tế</a></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- END TAB 3-->
                        
                                
                                 <!-- BEGIN TAB Họp-->
                                <div class="tab-pane active" id="tab_hop">
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
                                                <table class="table table-striped table-hover table-bordered" id="ds_hop">
                                                    <thead>
                                                        <tr>
                                                            <th> STT</th>
                                                            <th> Tên Cuộc Họp</th>
                                                            <th> Địa Điểm</th>
                                                            <th> Tên Giảng Viên</th>
                                                            <th> Thời Gian</th>
                                                            <th> Giờ Giảng</th>
                                                            <th> Giờ KH</th>
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
                                                                <td> <?php echo e($v->dia_diem); ?> </td>
                                                                <td>
                                                                    <?php if(App\GiangVien::where('id', $v->id_giangvien)->first() !== null): ?>
                                                                    <?php echo e($v->giangviens->ma_giangvien.'-'.$v->giangviens->ten); ?>

                                                                    <?php endif; ?>
                        
                                                                 </td>
                                                                <td> <?php echo e($v->thoigian); ?> </td>
                                                                <td> <?php echo e($v->giogiang); ?> </td>
                                                                <td> <?php echo e($v->giokhoahoc); ?> </td>
                                                                <td> <?php echo e($v->ghichu); ?> </td>
                                                                <td>
                                                                    <a data-hop-id="<?php echo e($v->id); ?>" class="btn_edit_hop btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
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
                                            <p> Không có Cuộc Họp  nào.
                                                <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_hop"><i class="fa fa-plus"></i> Tạo Cuộc Họp</a></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- END TAB Họp-->
                        
                                <!-- BEGIN TAB HDKH-->
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
                                                <table class="table table-striped table-hover table-bordered" id="ds_hdkh">
                                                    <thead>
                                                        <tr>
                                                            <th> STT</th>
                                                            <th> Tên Giảng Viên</th>
                                                            <th> Loại Hướng Dẫn</th>
                                                            <th> Học Viên</th>
                                                            <th> Khóa</th>
                                                            <th> Bắt Đầu</th>
                                                            <th> Kết Thúc</th>
                                                            <th> Giờ Gỉang</th>
                                                            <th> Giờ Khoa Học</th>
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
                                                                    <?php if(App\GiangVien::where('id', $v->id_giangvien)->first() !== null): ?>
                                                                    <?php echo e($v->giangviens->ma_giangvien.'-'.$v->giangviens->ten); ?>

                                                                    <?php endif; ?>
                        
                                                                 </td>
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
                                                                    else if($v->sinhvien_nc == 1) {
                                                                        echo "Sinh viên NCKH";
                                                                    }   
                                                                ?>
                                                                    </td>
                        
                                                                <td> <?php echo e($v->hoc_vien); ?> </td>
                                                                <td> <?php echo e($v->khoa); ?> </td>
                                                                <td> <?php echo e($v->bat_dau); ?> </td>
                                                                <td> <?php echo e($v->ket_thuc); ?> </td>
                                                                <td> <?php echo e($v->gio_giang); ?> </td>
                                                                <td> <?php echo e($v->gio_khoahoc); ?> </td>
                                                                <td> <?php echo e($v->ghichu); ?> </td>
                                                                <td>
                                                                    <a data-hdkh-id="<?php echo e($v->id); ?>" class="btn_edit_hdkh btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
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
                                            <p> Không có Cuộc HDKH  nào.
                                                <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_hdkh"><i class="fa fa-plus"></i> Tạo Hướng Dẫn Khoa Học Mới </a></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- END TAB Họp-->
                        
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
                                                <table class="table table-striped table-hover table-bordered" id="ds_chambai">
                                                    <thead>
                                                        <tr>
                                                            <th> STT</th>
                                                            <th> Tên Giảng Viên</th>
                                                            <th> Tên Lớp</th>
                                                            <th> Hình Thức </th>
                                                            <th> Số Bài</th>
                                                            <th> Bắt Đầu </th>
                                                            <th> Kết Thúc</th>
                                                            <th> Giờ Giảng</th>
                                                            <th> Giờ Khoa Học</th>
                                                            <th> Ghi Chú </th>
                                                            <th> Hành Động</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if( $chambai->count() > 0 ): ?>
                                                            <?php $stt = 1; ?>
                                                            <?php $__currentLoopData = $chambai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td> <?php echo e($stt); ?> </td>
                                                                <td>
                                                                <?php if(App\GiangVien::where('id', $v->id_giangvien)->first() !== null): ?>
                                                                <?php echo e($v->giangviens->ten); ?>

                                                                <?php endif; ?>
                                                                </td>
                                                                <td> <?php echo e(($v->lop)); ?> </td>
                                                                <td> 
                                                                    <?php 
                                                                        if($v->hoc_phan == 1) {
                                                                            echo "HP";
                                                                        } 
                                                                        else if($v->giua_hoc_phan == 1) {
                                                                            echo "GHP";
                                                                        }  
                                                                        else if($v->cdtn == 1) {
                                                                            echo "CĐTN";
                                                                        }  
                                                                    ?>
                                                                </td>
                                                                <td> <?php echo e($v->so_bai); ?> </td>
                                                                <td> <?php echo e($v->bat_dau); ?> </td>
                                                                <td> <?php echo e($v->ket_thuc); ?> </td>
                                                                <td> <?php echo e($v->gio_giang); ?> </td>
                                                                <td> <?php echo e($v->gio_khoahoc); ?> </td>
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
                                            <p> Không có Chấm Bài nào.
                                                <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_chambai"><i class="fa fa-plus"></i> Tạo Chấm Bài</a></p>
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
                                                <table class="table table-striped table-hover table-bordered" id="ds_daygioi">
                                                    <thead>
                                                        <tr>
                                                            <th> STT</th>
                                                            <th> Tên Giảng Viên</th>
                                                            <th> Tên Bài </th>
                                                            <th> Cấp</th>
                                                            <th> Bắt Đầu</th>
                                                            <th> Kết Thúc</th>
                                                            <th> Giờ Giảng</th>
                                                            <th> Giờ Khoa Học</th>
                                                            <th> Ghi Chú</th>
                                                            <th> Hành Động</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if( $daygioi->count() > 0 ): ?>
                                                            <?php $stt = 1; ?>
                                                            <?php $__currentLoopData = $daygioi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td> <?php echo e($stt); ?> </td>
                                                                <td> <?php echo e($v->ten); ?> </td>
                                                                <td>
                                                                    <?php if(App\GiangVien::where('id', $v->id_giangvien)->first() !== null): ?>
                                                                    <?php echo e($v->giangviens->ten); ?>

                                                                    <?php endif; ?>
                                                                </td>
                                                               
                                                                <td> 
                                                                    <?php
                                                                        if($v->cap_bo == 1){
                                                                            echo "Cấp Bộ";
                                                                        }
                                                                        if($v->cap_hoc_vien == 1){
                                                                            echo "Cấp Học Viện";
                                                                        }
                                                                        if($v->cap_khoa == 1){
                                                                            echo "Cấp Khoa";
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td> <?php echo e($v->bat_dau); ?> </td>
                                                                <td> <?php echo e($v->ket_thuc); ?> </td>
                                                                <td> <?php echo e($v->gio_giang); ?> </td>
                                                                <td> <?php echo e($v->gio_khoahoc); ?> </td>
                                                                <td> <?php echo e($v->ghichu); ?> </td>
                                                                <td>
                                                                    <a data-daygioi-id="<?php echo e($v->id); ?>" class="btn_edit_daygioi btn btn-xs yellow-gold" href="#modal_edit_daygioi" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                                    <a class="btn_delete_daygioi btn btn-xs red-mint" href="#" data-daygioi-id="<?php echo e($v->id); ?>" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                                            <p> Không có hoạt động Dạy Giỏi nào.
                                                <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_daygioi"><i class="fa fa-plus"></i> Tạo Dạy Giỏi Mới</a></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- END TAB 7-->
                                 <!-- BEGIN TAB 10-->
                                 
                                <!-- END TAB 10-->
                                 <!-- BEGIN XỬ LÝ VĂN BẢN-->
                                 <div class="tab-pane" id="tab_vanban">
                                    <?php if($vanban->isNotEmpty()): ?>
                                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                        <div class="portlet light portlet-fit bordered">
                                            <div class="portlet-body">
                                                <div class="table-toolbar">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="btn-group">
                                                                <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_vanban"><i class="fa fa-plus"></i> Thêm Mới Văn Bản Xử Lý
                        
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table class="table table-striped table-hover table-bordered" id="ds_vanban">
                                                    <thead>
                                                        <tr>
                                                            <th> STT</th>
                                                            <th> Nội Dung</th>
                                                            <th> Lãnh Đạo Xử Lý</th>
                                                            <th> Chủ Trì</th>
                                                            <th> Tham Gia</th>
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
                                                                <td>
                                                                    <?php
                                                                    if($v->chu_tri){
                                                                        $chu_tri = json_decode( $v->chu_tri, true);
                                                                    }
                                                                    ?>
                                                                        <?php $__currentLoopData = $chu_tri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                                                            <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?> </p>
                                                                            <?php endif; ?>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </td>
                                                                <td>
                                                                <?php
                                                                 if($v->tham_gia)
                                                                    $tham_gia = json_decode( $v->tham_gia, true);
                                                                ?>
                                                                    <?php $__currentLoopData = $tham_gia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                                                    <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?>  </p>
                                                                    <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </td>
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
                                            <p> Không có Văn Bản nào.
                                                <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_vanban"><i class="fa fa-plus"></i> Thêm Văn Bản Xử Lý</a></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- END XỬ LÝ VĂN BẢN-->
                               
                        
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
                                                <table class="table table-striped table-hover table-bordered" id="ds_dang">
                                                    <thead>
                                                        <tr>
                                                            <th> STT</th>
                                                            <th> Tên Hoạt Động </th>
                                                            <th> Địa Điểm</th>
                                                            <th> Chủ Trì</th>
                                                            <th> Tham Gia</th>
                                                            <th> Bắt Đầu</th>
                                                            <th> Kết Thúc</th>
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
                                                                <td> <?php echo e($v->dia_diem); ?> </td>
                                                                <td>
                                                                    <?php
                                                                    if($v->chu_tri){
                                                                        $chu_tri = json_decode( $v->chu_tri, true);
                                                                    }
                                                                    ?>
                                                                        <?php $__currentLoopData = $chu_tri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                                                            <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?> </p>
                                                                            <?php endif; ?>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </td>
                                                                <td>
                                                                <?php
                                                                 if($v->tham_gia)
                                                                    $tham_gia = json_decode( $v->tham_gia, true);
                                                                ?>
                                                                    <?php $__currentLoopData = $tham_gia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                                                    <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?>  </p>
                                                                    <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </td>
                                                                <td> <?php echo e($v->bat_dau); ?> </td>
                                                                <td> <?php echo e($v->ket_thuc); ?> </td>
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
                                            <p> Không tham gia hoạt động Đảng/Đoàn nào.
                                                <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_dang"><i class="fa fa-plus"></i> Tạo Hoạt Động</a></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- END TAB 5-->
                                
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                    </div>
                                </div>
                            </div>
                        
                        </form>
                        
                        
                        <form action="<?php echo e(route('khac.edit.get')); ?>" method="post" id="form_sample_2" class="form-horizontal">
                            <?php echo csrf_field(); ?>
                            <div class="tab-content">
                                
                        
                                 
                                 <!-- BEGIN TAB 7-->
                                 
                                <!-- END TAB 7-->
                                
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
<!-- -------------------------------------CHẤM BÀI ADD -------------------------------------->
<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_add_chambai" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="post" id="form_add_chambai">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Thêm mới Chấm Bài</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên Giảng Viên:<span class="required">*</span></label>
                                    <select class="form-control" name="id_giangvien">
                                        <option value="0">-------- Chọn Giảng Viên --------</option>
                                            <?php if($giangvien->count()>0): ?>
                                                <?php $__currentLoopData = $giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($v->id); ?>" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>><?php echo e($v->ten); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Lớp:<span class="required">*</span></label>
                                    <input class="form-control" name="lop" type="text" placeholder="Nhập tên Lớp" required />
                                </div>
                                <div class="form-group">
                                    <label><b>Hình Thức:</b><span class="required">(Chỉ chọn 1 mục) *</span></label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="hoc_phan" name="hoc_phan">
                                        <label class="form-check-label" for="hoc_phan">Học Phần:</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="giua_hoc_phan" name="giua_hoc_phan">
                                        <label class="form-check-label" for="giua_hoc_phan">Giữa Học Phần:</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="cdtn" name="cdtn">
                                        <label class="form-check-label" for="cdtn">CĐTN:</label>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label>Số Bài:<span class="required">*</span></label>
                                    <input class="form-control" name="so_bai" type="number" placeholder="Nhập Số Bài" required />
                                </div>
                                <div class="form-group">
                                    <label>Bắt Đầu:<span class="required">*</span></label>
                                    <input class="form-control" name="bat_dau" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Kết Thúc:<span class="required">*</span></label>
                                    <input class="form-control" name="ket_thuc" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Giờ Giảng:<span class="required">*</span></label>
                                    <input class="form-control" name="gio_giang" type="number" placeholder="Nhập Giờ Giảng" required />
                                </div>
                                <div class="form-group">
                                    <label>Giờ Khoa Học:<span class="required">*</span></label>
                                    <input class="form-control" name="gio_khoahoc" type="number" placeholder="Nhập Giờ Khoa Học" required />
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required"></span></label>
                                    <input class="form-control" name="ghichu" type="text" required placeholder="Nhập Ghi CHú"/>
                                </div>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_add_chambai"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_edit_chambai" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="form_edit_chambai">
                <?php echo csrf_field(); ?>
                <input value="" name="id" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Chỉnh sửa Chấm Bài</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label>Giảng Viên:<span class="required">*</span></label>
                                    <select class="form-control" name="id_giangvien">
                                        <option name="gv_hientai">Chọn Lớp</option>
                                            <?php if($giangvien->count()>0): ?>
                                                <?php $__currentLoopData = $giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($v->id); ?>" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>><?php echo e($v->ten); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Lớp:<span class="required">*</span></label>
                                    <input class="form-control" name="lop" type="text" placeholder="" required />
                                </div>
                                <div class="form-group">
                                    <label><b>Hình Thức:</b><span class="required">(Chỉ chọn 1 mục) *</span></label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="hoc_phan" name="hoc_phan">
                                        <label class="form-check-label" for="hoc_phan">Học Phần:</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="giua_hoc_phan" name="giua_hoc_phan">
                                        <label class="form-check-label" for="giua_hoc_phan">Giữa Học Phần:</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="cdtn" name="cdtn">
                                        <label class="form-check-label" for="cdtn">CĐTN:</label>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label>Số Bài:<span class="required">*</span></label>
                                    <input class="form-control" name="so_bai" type="number" placeholder="Nhập Số Bài" required />
                                </div>
                                <div class="form-group">
                                    <label>Bắt Đầu:<span class="required">*</span></label>
                                    <input class="form-control" name="bat_dau" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Kết Thúc:<span class="required">*</span></label>
                                    <input class="form-control" name="ket_thuc" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Giờ Giảng:<span class="required">*</span></label>
                                    <input class="form-control" name="gio_giang" type="number" placeholder="" required />
                                </div>
                                <div class="form-group">
                                    <label>Giờ Khoa Học:<span class="required">*</span></label>
                                    <input class="form-control" name="gio_khoahoc" type="number" placeholder="" required />
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required"></span></label>
                                    <input class="form-control" name="ghichu" type="text" required />
                                </div>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_edit_chambai"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- -------------------------------------END CHẤM BÀI ADD -------------------------------------->
<!-- -------------------------------------CÔNG TÁC ADD ------------------------------------>
<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_add_congtac" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="post" id="form_add_congtac">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Thêm mới Đi Thực Tế</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên Địa Bàn: <span class="required">*</span></label>
                                    <input  name="ten" type="text" class="form-control" required placeholder="Nhập Tên Địa Bàn">
                                </div>
                                <div class="form-group">
                                    <label>Tên Giảng Viên: <span class="required">*</span></label>
                                    <select class="form-control" name="id_giangvien">
                                        <option value="0">-------- Chọn Giảng Viên --------</option>
                                            <?php if($giangvien->count()>0): ?>
                                                <?php $__currentLoopData = $giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($v->id); ?>"  <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>><?php echo e($v->ten); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Địa Điểm:<span class="required">*</span></label>
                                    <input name="dia_diem" type="text" class="form-control" required placeholder="Nhập Địa Điểm">
                                </div>
                                <div class="form-group">
                                    <label>Bắt Đầu:<span class="required">*</span></label>
                                    <input class="form-control" name="bat_dau" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Kết Thúc:<span class="required">*</span></label>
                                    <input class="form-control" name="ket_thuc" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Giờ Giảng:<span class="required">*</span></label>
                                    <input name="gio_giang" type="number" class="form-control" required placeholder="Nhập Giờ Giảng">
                                </div>
                                <div class="form-group">
                                    <label>Giờ Khoa Học:<span class="required">*</span></label>
                                    <input name="gio_khoahoc" type="number" class="form-control" required placeholder="Nhập Giờ Khoa Học">
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required"></span></label>
                                    <input name="ghichu" type="text" class="form-control" required placeholder="Nhập Ghi Chú">
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_add_congtac"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_edit_congtac" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="form_edit_congtac">
                <?php echo csrf_field(); ?>
                <input value="" name="id" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Chỉnh sửa Đi Thực Tế</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên Địa Bàn:<span class="required">*</span></label>
                                    <input value="" name="ten" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Tên Giảng Viên:<span class="required">*</span></label>
                                    <select class="form-control" name="id_giangvien">
                                    <option name="gv_hientai"></option>
                                            <?php if($giangvien->count()>0): ?>
                                                <?php $__currentLoopData = $giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($v->id); ?>" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>><?php echo e($v->ten); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                    </select>
                                </div>
                                    <div class="form-group">
                                        <label>Địa Điểm:<span class="required">*</span></label>
                                        <input name="dia_diem" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Bắt Đầu:<span class="required">*</span></label>
                                        <input class="form-control" name="bat_dau" type="date" placeholder="dd-mm-yyyy" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Kết Thúc:<span class="required">*</span></label>
                                        <input class="form-control" name="ket_thuc" type="date" placeholder="dd-mm-yyyy" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Giờ Giảng:<span class="required">*</span></label>
                                        <input name="gio_giang" type="number" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Giờ Khoa Học:<span class="required">*</span></label>
                                        <input name="gio_khoahoc" type="number" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Ghi Chú:<span class="required"></span></label>
                                        <input name="ghichu" type="text" class="form-control" required>
                                    </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_edit_congtac"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- -------------------------------------END CÔNG TÁC ADD -------------------------------------->

<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_add_vanban" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="post" id="form_add_vanban">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Thêm mới Văn Bản Xử Lý</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nội Dung<span class="required">*</span></label>
                                    <input  name="noi_dung" type="text" class="form-control" required placeholder="Nhập Nội Dung Văn Bản">
                                </div>
                                <div class="form-group">
                                    <label>Lãnh Đạo Xử Lý:<span class="required">*</span></label>
                                    <input name="lanhdao" type="text" class="form-control" required placeholder="Nhập Tên Lãnh Đạo ">
                                </div> 
                                <div class="form-group">
                                    <label class="control-label col-md-4">Chủ Trì: <span class="required">*</span></label>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" multiple name="chu_tri">
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
                                    <label class="control-label col-md-4">Tham Gia: <span class="required">*</span> </label>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" multiple name="tham_gia">
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
                                    <label>Thời Gian Nhận:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian_den" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Hạn:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian_nhan" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required"></span></label>
                                    <input name="ghichu" type="text" class="form-control" required>
                                </div> 
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_add_vanban"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_edit_vanban" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="form_edit_vanban">
                <?php echo csrf_field(); ?>
                <input value="" name="id" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Chỉnh sửa Thông Tin Văn Bản Xử Lý</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nội Dung:<span class="required">*</span></label>
                                    <input class="form-control" name="noi_dung" type="text" required />
                                </div>
                                <div class="form-group">
                                    <label>Lãnh đạo xử lý:<span class="required">*</span></label>
                                    <input class="form-control" name="lanhdao" type="text" required />
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Chủ Trì: <span class="required">*</span></label>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" multiple name="chu_tri">
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
                                    <label class="control-label col-md-4">Tham Gia:  <span class="required">*</span></label>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" multiple name="tham_gia">
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
                                    <label>Thời Gian Nhận:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian_den" type="date" placeholder="dd-mm-yyyy" required />
                                </div>

                                <div class="form-group">
                                    <label>Hạn:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian_nhan" type="date" placeholder="dd-mm-yyyy" required />
                                </div>

                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required"></span></label>
                                    <input name="ghichu" type="text" class="form-control" required />
                                </div> 
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_edit_vanban"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_add_dang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="post" id="form_add_dang">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Thêm mới Hoạt Động Đảng Đoàn</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên Hoạt Động:<span class="required">*</span></label>
                                    <input class="form-control" name="ten" type="text" required placeholder="Nhập Tên Hoạt Động"/>
                                </div>
                                <div class="form-group">
                                    <label>Địa Điểm:<span class="required">*</span></label>
                                    <input class="form-control" name="dia_diem" type="text" required placeholder="Nhập Địa Điểm"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Chủ Trì: <span class="required">*</span></label>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" multiple name="chu_tri">
                                                <option value="0">----Chọn Giảng Viên Chủ Trì----</option>
                                                <?php if($giangvien->count()>0): ?>
                                                    <?php $__currentLoopData = $giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e((int)$v->id); ?>"><?php echo e($v->ten); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Tham Gia:  <span class="required">*</span></label>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" multiple name="tham_gia">
                                                <option value="0">----Chọn Giảng Viên Tham Gia----</option>
                                                <?php if($giangvien->count()>0): ?>
                                                    <?php $__currentLoopData = $giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e((int)$v->id); ?>"><?php echo e($v->ten); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label>Bắt Đầu:<span class="required">*</span></label>
                                    <input class="form-control" name="bat_dau" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Kết Thúc:<span class="required">*</span></label>
                                    <input class="form-control" name="ket_thuc" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required"</span></label>
                                    <input class="form-control" name="ghichu" type="text" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_add_dang"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_edit_dang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="form_edit_dang">
                <?php echo csrf_field(); ?>
                <input value="" name="id" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Chỉnh sửa Hoạt Động Đảng Đoàn</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên Hoạt Động:<span class="required">*</span></label>
                                    <input class="form-control" name="ten" type="text" required />
                                </div>
                                <div class="form-group">
                                    <label>Địa Điểm:<span class="required">*</span></label>
                                    <input class="form-control" name="dia_diem" type="text" required />
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Chủ Trì: <span class="required">*</span></label>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" multiple name="chu_tri">
                                                <option value="0">----Chọn Giảng Viên Chủ Trì----</option>
                                                <?php if($giangvien->count()>0): ?>
                                                    <?php $__currentLoopData = $giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e((int)$v->id); ?>"><?php echo e($v->ten); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Tham Gia:  <span class="required">*</span></label>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" multiple name="tham_gia">
                                                <option value="0">----Chọn Giảng Viên Tham Gia----</option>
                                                <?php if($giangvien->count()>0): ?>
                                                    <?php $__currentLoopData = $giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e((int)$v->id); ?>"><?php echo e($v->ten); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label>Bắt Đầu:<span class="required">*</span></label>
                                    <input class="form-control" name="bat_dau" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Kết Thúc:<span class="required">*</span></label>
                                    <input class="form-control" name="ket_thuc" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required"></span></label>
                                    <input class="form-control" name="ghichu" type="text" required />
                                </div>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_edit_dang"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_add_daygioi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="post" id="form_add_daygioi">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Thêm mới Dạy Giỏi</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên Dạy Giỏi: <span class="required">*</span></label>
                                    <input  name="ten" type="text" class="form-control" required placeholder="Nhập Tên Dạy Giỏi">
                                </div>
                                <div class="form-group">
                                    <label>Tên Giảng Viên: <span class="required">*</span></label>
                                    <select class="form-control" name="id_giangvien">
                                        <option name="gv_hientai">Chọn Giảng Viên</option>
                                            <?php if($giangvien->count()>0): ?>
                                                <?php $__currentLoopData = $giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($v->id); ?>" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>><?php echo e($v->ten); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><b>Cấp:</b><span class="required">(Chỉ chọn 1 mục) *</span></label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="cap_bo" name="cap_bo">
                                        <label class="form-check-label" for="cap_bo">Cấp Bộ</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="cap_hoc_vien" name="cap_hoc_vien">
                                        <label class="form-check-label" for="cap_hoc_vien">Cấp Học Viện</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="cap_khoa" name="cap_khoa">
                                        <label class="form-check-label" for="cap_khoa">Cấp Khoa</label>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label>Bắt Đầu:<span class="required">*</span></label>
                                    <input class="form-control" name="bat_dau" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Kết Thúc:<span class="required">*</span></label>
                                    <input class="form-control" name="ket_thuc" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Giờ Giảng:<span class="required">*</span></label>
                                    <input class="form-control" name="gio_giang" type="number" placeholder="Nhập Giờ Giảng" required />
                                </div>
                                <div class="form-group">
                                    <label>Giờ Khoa Học:<span class="required">*</span></label>
                                    <input class="form-control" name="gio_khoahoc" type="number" placeholder="Nhập Giờ Khoa Học" required />
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required"></span></label>
                                    <input name="ghichu" type="text" class="form-control" required placeholder="Nhập Ghi Chú">
                                </div> 
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_add_daygioi"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_edit_daygioi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="form_edit_daygioi">
                <?php echo csrf_field(); ?>
                <input value="" name="id" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Chỉnh sửa Dạy Giỏi</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên Dạy Giỏi:<span class="required">*</span></label>
                                    <input value="" name="ten" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Tên Giảng Viên:<span class="required">*</span></label>
                                    <select class="form-control" name="id_giangvien">
                                        <option name="gv_hientai"></option>
                                            <?php if($giangvien->count()>0): ?>
                                                <?php $__currentLoopData = $giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($v->id); ?>" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>><?php echo e($v->ten); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                    </select>
                                </div>
                               
                               
                                <div class="form-group">
                                    <label><b>Cấp:</b></label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="cap_bo" name="cap_bo">
                                        <label class="form-check-label" for="cap_bo">Cấp Bộ</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="cap_hoc_vien" name="cap_hoc_vien">
                                        <label class="form-check-label" for="cap_hoc_vien">Cấp Học Viện</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="cap_khoa" name="cap_khoa">
                                        <label class="form-check-label" for="cap_khoa">Cấp Khoa</label>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label>Bắt Đầu:<span class="required">*</span></label>
                                    <input class="form-control" name="bat_dau" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Kết Thúc:<span class="required">*</span></label>
                                    <input class="form-control" name="ket_thuc" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Giờ Giảng:<span class="required">*</span></label>
                                    <input class="form-control" name="gio_giang" type="number" placeholder="" required />
                                </div>
                                <div class="form-group">
                                    <label>Giờ Khoa Học:<span class="required">*</span></label>
                                    <input class="form-control" name="gio_khoahoc" type="number" placeholder="" required />
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required">*</span></label>
                                    <input name="ghichu" type="text" class="form-control" required>
                                </div> 
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_edit_daygioi"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /.modal Cuộc Họp -->
<div class="modal fade bs-modal-lg" id="modal_add_hop" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="post" id="form_add_hop">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Thêm mới Cuộc Họp</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên Cuộc Họp: <span class="required">*</span></label>
                                    <input  name="ten" type="text" class="form-control" required placeholder="Nhập Tên Cuộc Họp">
                                </div>
                                <div class="form-group">
                                    <label>Địa Điểm: <span class="required">*</span></label>
                                    <input  name="dia_diem" type="text" class="form-control" required placeholder="Nhập Tên Địa Điểm">
                                </div>
                                <div class="form-group">
                                    <label>Tên Giảng Viên: <span class="required">*</span></label>
                                    <select class="form-control" name="id_giangvien">
                                        <option name="gv_hientai">------------Chọn Giảng Viên----------</option>
                                            <?php if($giangvien->count()>0): ?>
                                                <?php $__currentLoopData = $giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($v->id); ?>" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>><?php echo e($v->ma_giangvien.'-'.$v->ten); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Thời Gian:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian" type="datetime-local" placeholder="dd-mm-yyyy H:s:i" required placeholder="Thời Gian" />
                                </div>
                                
                                <div class="form-group">
                                    <label>Giờ Giảng:<span class="required">*</span></label>
                                    <input name="giogiang" type="number" class="form-control" required placeholder="Nhập Giờ Giảng">
                                </div>
                                <div class="form-group">
                                    <label>Giờ Khoa Học:<span class="required">*</span></label>
                                    <input name="giokhoahoc" type="number" class="form-control" required placeholder="Nhập Giờ Khoa Học">
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required"></span></label>
                                    <input name="ghichu" type="text" class="form-control" required placeholder="Nhập Ghi Chú">
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_add_hop"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_edit_hop" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="form_edit_hop">
                <?php echo csrf_field(); ?>
                <input value="" name="id" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Chỉnh sửa Thông Tin Cuộc Họp</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên Cuộc Họp:<span class="required">*</span></label>
                                    <input value="" name="ten" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Địa Điểm:<span class="required">*</span></label>
                                    <input value="" name="dia_diem" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Tên Giảng Viên:<span class="required">*</span></label>
                                    <select class="form-control" name="id_giangvien">
                                        <option name="gv_hientai"></option>
                                            <?php if($giangvien->count()>0): ?>
                                                <?php $__currentLoopData = $giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($v->id); ?>" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>><?php echo e($v->ma_giangvien.'-'.$v->ten); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                    </select>
                                </div>
                               
                                <div class="form-group">
                                    <label>Thời Gian:<span class="required">*</span></label>
                                    <input class="form-control" name="thoigian" type="datetime-local" placeholder="dd-mm-yyyy H:s:i" required />
                                </div>
                    
                                <div class="form-group">
                                    <label>Giờ Giảng:<span class="required">*</span></label>
                                    <input name="giogiang" type="number" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Giờ Khoa Học:<span class="required">*</span></label>
                                    <input name="giokhoahoc" type="number" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required"></span></label>
                                    <input name="ghichu" type="text" class="form-control" required>
                                </div>

                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_edit_hop"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /.modal Hướng Dẫn Khoa Học -->
<div class="modal fade bs-modal-lg" id="modal_add_hdkh" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="post" id="form_add_hdkh">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Thêm mới Hướng Dẫn Khoa Học </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label>Tên Giảng Viên: <span class="required">*</span></label>
                                    <select class="form-control" name="id_giangvien">
                                        <option name="gv_hientai">------Chọn Giảng Viên--------</option>
                                            <?php if($giangvien->count()>0): ?>
                                                <?php $__currentLoopData = $giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($v->id); ?>" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>><?php echo e($v->ma_giangvien.'-'.$v->ten); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label><b>Loại Hướng Dẫn</b><span class="required">* (Chỉ chọn 1 mục)</span></label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="sinhvien_nc" name="sinhvien_nc">
                                        <label class="form-check-label" for="sinhvien_nc">Sinh viên NCKH:</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="khoa_luan" name="khoa_luan">
                                        <label class="form-check-label" for="khoa_luan">Khóa Luận:</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="luan_van" name="luan_van">
                                        <label class="form-check-label" for="luan_van">Luận Văn:</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="luan_an" name="luan_an">
                                        <label class="form-check-label" for="luan_an">Luận Án:</label>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label>Học Viên: <span class="required">*</span></label>
                                    <input  name="hoc_vien" type="text" class="form-control" required placeholder="Nhập Tên Học Viên">
                                </div>
                                <div class="form-group">
                                    <label>Khóa: <span class="required">*</span></label>
                                    <input  name="khoa" type="text" class="form-control" required placeholder="Nhập Tên Khóa">
                                </div>
                                <div class="form-group">
                                    <label>Bắt Đầu: <span class="required">*</span></label>
                                    <input  name="bat_dau" type="date" class="form-control" required placeholder="Nhập Thời Gian Bắt Đầu">
                                </div>
                                <div class="form-group">
                                    <label>Kết Thúc: <span class="required">*</span></label>
                                    <input  name="ket_thuc" type="date" class="form-control" required placeholder="Nhập Thời Gian Kết Thúc">
                                </div>
                                <div class="form-group">
                                    <label>Giờ Giảng: <span class="required">*</span></label>
                                    <input  name="gio_giang" type="number" class="form-control" required placeholder="Nhập Giờ Giảng">
                                </div>
                                <div class="form-group">
                                    <label>Giờ Khoa Học: <span class="required">*</span></label>
                                    <input  name="gio_khoahoc" type="number" class="form-control" required placeholder="Nhập Giờ Khoa Học">
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required"></span></label>
                                    <input name="ghichu" type="text" class="form-control" required placeholder="Nhập Ghi Chú">
                                </div> 

                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_add_hdkh"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_edit_hdkh" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="form_edit_hdkh">
                <?php echo csrf_field(); ?>
                <input value="" name="id" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Chỉnh sửa Thông Tin Hướng Dẫn Khoa Học</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                               
                                <div class="form-group">
                                    <label>Tên Giảng Viên:<span class="required">*</span></label>
                                    <select class="form-control" name="id_giangvien">
                                        <option name="gv_hientai"></option>
                                            <?php if($giangvien->count()>0): ?>
                                                <?php $__currentLoopData = $giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($v->id); ?>" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>><?php echo e($v->ma_giangvien.'-'.$v->ten); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label><b>Loại Hướng Dẫn</b><span class="required">(Chỉ chọn 1 mục) *</span></label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="sinhvien_nc" name="sinhvien_nc">
                                        <label class="form-check-label" for="sinhvien_nc">Sinh viên NCKH:</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="khoa_luan" name="khoa_luan">
                                        <label class="form-check-label" for="khoa_luan">Khóa Luận:</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="luan_van" name="luan_van">
                                        <label class="form-check-label" for="luan_van">Luận Văn:</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="luan_an" name="luan_an">
                                        <label class="form-check-label" for="luan_an">Luận Án:</label>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label>Học Viên: <span class="required">*</span></label>
                                    <input  name="hoc_vien" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Khóa: <span class="required">*</span></label>
                                    <input  name="khoa" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Bắt Đầu: <span class="required">*</span></label>
                                    <input  name="bat_dau" type="date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Kết Thúc: <span class="required">*</span></label>
                                    <input  name="ket_thuc" type="date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Giờ Giảng: <span class="required">*</span></label>
                                    <input  name="gio_giang" type="number" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Giờ Khoa Học: <span class="required">*</span></label>
                                    <input  name="gio_khoahoc" type="number" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú:<span class="required"></span></label>
                                    <input name="ghichu" type="text" class="form-control" required>
                                </div> 
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_edit_hdkh"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



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
                id_giangvien: $("#form_add_congtac select[name='id_giangvien']").val(),
                ten: $("#form_add_congtac input[name='ten']").val(),
                dia_diem: $("#form_add_congtac input[name='dia_diem']").val(),
                gio_giang: $("#form_add_congtac input[name='gio_giang']").val(),
                gio_khoahoc: $("#form_add_congtac input[name='gio_khoahoc']").val(),
                bat_dau: $("#form_add_congtac input[name='bat_dau']").val(),
                ket_thuc: $("#form_add_congtac input[name='ket_thuc']").val(),
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
                         $("#form_edit_congtac select[name='id_giangvien']").val(data.data.id_giangvien);
                         $("#form_edit_congtac input[name='id']").val(data.data.id);
                         $("#form_edit_congtac input[name='ten']").val(data.data.ten);
                         $("#form_edit_congtac input[name='dia_diem']").val(data.data.dia_diem);
                         $("#form_edit_congtac input[name='gio_giang']").val(data.data.gio_giang);
                         $("#form_edit_congtac input[name='gio_khoahoc']").val(data.data.gio_khoahoc);
                         $("#form_edit_congtac input[name='bat_dau']").val(data.data.bat_dau);
                         $("#form_edit_congtac input[name='ket_thuc']").val(data.data.ket_thuc);
                         $("#form_edit_congtac input[name='ghichu']").val(data.data.ghichu);
                         $('#modal_edit_congtac').modal('show');
                     }
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
                     id_giangvien: $("#form_edit_congtac select[name='id_giangvien']").val(),
                     ten: $("#form_edit_congtac input[name='ten']").val(),
                     dia_diem: $("#form_edit_congtac input[name='dia_diem']").val(),
                     gio_giang: $("#form_edit_congtac input[name='gio_giang']").val(),
                     gio_khoahoc: $("#form_edit_congtac input[name='gio_khoahoc']").val(),
                     bat_dau: $("#form_edit_congtac input[name='bat_dau']").val(),
                     ket_thuc: $("#form_edit_congtac input[name='ket_thuc']").val(),
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
                     }
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
                     }
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
                 title: "Xóa Hoạt động Thực tế này?",
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
         // ==================================================================//
          // Ajax thêm Văn Bản Xử Lý
          $("#btn_add_vanban").on('click', function(e){
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
        chu_tri: $("#form_add_vanban select[name='chu_tri']").val(),
        tham_gia: $("#form_add_vanban select[name='tham_gia']").val(),
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
                         $("#form_edit_vanban input[name='id']").val(data.data.id);
                         $("#form_edit_vanban select[name='chu_tri']").val($.parseJSON(data.data.chu_tri));
                         $("#form_edit_vanban select[name='tham_gia']").val($.parseJSON(data.data.tham_gia));
                         $("#form_edit_vanban input[name='noi_dung']").val(data.data.noi_dung);
                         $("#form_edit_vanban input[name='lanhdao']").val(data.data.lanhdao);
                         $("#form_edit_vanban input[name='thoigian_nhan']").val(data.data.thoigian_nhan);
                         $("#form_edit_vanban input[name='thoigian_den']").val(data.data.thoigian_den);
                         $("#form_edit_vanban input[name='ghichu']").val(data.data.ghichu);
                         $('#modal_edit_vanban').modal('show');
             }
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
                     chu_tri: $("#form_edit_vanban select[name='chu_tri']").val(),
                     tham_gia: $("#form_edit_vanban select[name='tham_gia']").val(),
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
             }
             if(data.status == true){
                 $('#modal_edit_vanban').modal('hide');
                 swal({
                     "title":"Đã sửa!",
                     "text":"Bạn đã sửa thành công Văn Bản!",
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
                id_giangvien: $("#form_add_chambai select[name='id_giangvien']").val(),
                lop: $("#form_add_chambai input[name='lop']").val(),
                hoc_phan: ($("#form_add_chambai input[name='hoc_phan']").is(':checked')) ? 1 : 0,
                giua_hoc_phan: ($("#form_add_chambai input[name='giua_hoc_phan']").is(':checked')) ? 1 : 0,
                cdtn: ($("#form_add_chambai input[name='cdtn']").is(':checked')) ? 1 : 0,
                so_bai: $("#form_add_chambai input[name='so_bai']").val(),
                bat_dau: $("#form_add_chambai input[name='bat_dau']").val(),
                ket_thuc: $("#form_add_chambai input[name='ket_thuc']").val(),
                gio_giang: $("#form_add_chambai input[name='gio_giang']").val(),
                gio_khoahoc: $("#form_add_chambai input[name='gio_khoahoc']").val(),
                ghichu: $("#form_add_chambai input[name='ghichu']").val(),
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
                         $("#form_edit_chambai select[name='id_giangvien']").val(data.data.id_giangvien);
                         $("#form_edit_chambai input[name='lop']").val(data.data.lop);
                         $("#form_edit_chambai input[name='hoc_phan']").prop('checked', (data.data.hoc_phan == 1) ? true : false);
                         $("#form_edit_chambai input[name='giua_hoc_phan']").prop('checked', (data.data.giua_hoc_phan == 1) ? true : false);
                         $("#form_edit_chambai input[name='cdtn']").prop('checked', (data.data.cdtn == 1) ? true : false);
                         $("#form_edit_chambai input[name='id']").val(data.data.id);
                         $("#form_edit_chambai input[name='gio_giang']").val(data.data.gio_giang);
                         $("#form_edit_chambai input[name='gio_khoahoc']").val(data.data.gio_khoahoc);
                         $("#form_edit_chambai input[name='so_bai']").val(data.data.so_bai);
                         $("#form_edit_chambai input[name='bat_dau']").val(data.data.bat_dau);
                         $("#form_edit_chambai input[name='ket_thuc']").val(data.data.ket_thuc);
                         $("#form_edit_chambai input[name='ghichu']").val(data.data.ghichu);
                         $('#modal_edit_chambai').modal('show');
                     }
                 }
             });
         });
         // END Khi click vào nút sửa chấm Bài, tìm chấm Bài theo id và đỗ dữ liệu vào form
         // Ajax sửa chấm bài
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
                     id_giangvien: $("#form_edit_chambai select[name='id_giangvien']").val(),
                     lop: $("#form_edit_chambai input[name='lop']").val(),
                     hoc_phan: ($("#form_edit_chambai input[name='hoc_phan']").is(':checked')) ? 1 : 0,
                     giua_hoc_phan: ($("#form_edit_chambai input[name='giua_hoc_phan']").is(':checked')) ? 1 : 0,
                     cdtn: ($("#form_edit_chambai input[name='cdtn']").is(':checked')) ? 1 : 0,
                     ghichu: $("#form_edit_chambai input[name='ghichu']").val(),
                     gio_giang: $("#form_edit_chambai input[name='gio_giang']").val(),
                     gio_khoahoc: $("#form_edit_chambai input[name='gio_khoahoc']").val(),
                     so_bai: $("#form_edit_chambai input[name='so_bai']").val(),
                     bat_dau: $("#form_edit_chambai input[name='bat_dau']").val(),
                     ket_thuc: $("#form_edit_chambai input[name='ket_thuc']").val(),
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
         // END Ajax sửa chấm Bài
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
                                         "text":"Bạn đã xóa thành công Chấm Bài!",
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
                ten: $("#form_add_dang input[name='ten']").val(),
                dia_diem: $("#form_add_dang input[name='dia_diem']").val(),
                chu_tri: $("#form_add_dang select[name='chu_tri']").val(),
                tham_gia: $("#form_add_dang select[name='tham_gia']").val(),
                bat_dau: $("#form_add_dang input[name='bat_dau']").val(),
                ket_thuc: $("#form_add_dang input[name='ket_thuc']").val(),
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
                        "text":"Bạn đã tạo thành công Hoạt Động!",
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
                         $("#form_edit_dang select[name='chu_tri']").val($.parseJSON(data.data.chu_tri));
                         $("#form_edit_dang select[name='tham_gia']").val($.parseJSON(data.data.tham_gia));
                         $("#form_edit_dang input[name='id']").val(data.data.id);
                         $("#form_edit_dang input[name='ten']").val(data.data.ten);
                         $("#form_edit_dang input[name='dia_diem']").val(data.data.dia_diem);
                         $("#form_edit_dang input[name='bat_dau']").val(data.data.bat_dau);
                         $("#form_edit_dang input[name='ket_thuc']").val(data.data.ket_thuc);
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
                     chu_tri: $("#form_edit_dang select[name='chu_tri']").val(),
                     tham_gia: $("#form_edit_dang select[name='tham_gia']").val(),
                     ten: $("#form_edit_dang input[name='ten']").val(),
                     dia_diem: $("#form_edit_dang input[name='dia_diem']").val(),
                     bat_dau: $("#form_edit_dang input[name='bat_dau']").val(),
                     ket_thuc: $("#form_edit_dang input[name='ket_thuc']").val(),
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
                             "text":"Bạn đã sửa thành công Đảng!",
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
                 title: "Xóa Hoạt động Đảng này?",
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
 // ==================================================================//
         // Ajax thêm Dạy Giỏi
    $("#btn_add_daygioi").on('click', function(e){
        console.log("hihi");
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
                id_giangvien: $("#form_add_daygioi select[name='id_giangvien']").val(),
                ten: $("#form_add_daygioi input[name='ten']").val(),
                cap_bo: ($("#form_add_daygioi input[name='cap_bo']").is(':checked')) ? 1 : 0,
                cap_hoc_vien: ($("#form_add_daygioi input[name='cap_hoc_vien']").is(':checked')) ? 1 : 0,
                cap_khoa: ($("#form_add_daygioi input[name='cap_khoa']").is(':checked')) ? 1 : 0,
                bat_dau: $("#form_add_daygioi input[name='bat_dau']").val(),
                ket_thuc: $("#form_add_daygioi input[name='ket_thuc']").val(),
                gio_giang: $("#form_add_daygioi input[name='gio_giang']").val(),
                gio_khoahoc: $("#form_add_daygioi input[name='gio_khoahoc']").val(),
                ghichu: $("#form_add_daygioi input[name='ghichu']").val(),
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
                        "text":"Bạn đã tạo thành công Hoạt Động Dạy Giỏi!",
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
                         $("#form_edit_daygioi select[name='id_giangvien']").val(data.data.id_giangvien);
                         $("#form_edit_daygioi input[name='id']").val(data.data.id);
                         $("#form_edit_daygioi input[name='ten']").val(data.data.ten);
                         $("#form_edit_daygioi input[name='cap_bo']").prop('checked', (data.data.cap_bo == 1) ? true : false);
                         $("#form_edit_daygioi input[name='cap_hoc_vien']").prop('checked', (data.data.cap_hoc_vien == 1) ? true : false);
                         $("#form_edit_daygioi input[name='cap_khoa']").prop('checked', (data.data.cap_khoa == 1) ? true : false);
                         $("#form_edit_daygioi input[name='bat_dau']").val(data.data.bat_dau);
                         $("#form_edit_daygioi input[name='ket_thuc']").val(data.data.ket_thuc);
                         $("#form_edit_daygioi input[name='gio_giang']").val(data.data.gio_giang);
                         $("#form_edit_daygioi input[name='gio_khoahoc']").val(data.data.gio_khoahoc);
                         $("#form_edit_daygioi input[name='ghichu']").val(data.data.ghichu);
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
                     id_giangvien: $("#form_edit_daygioi select[name='id_giangvien']").val(),
                     ten: $("#form_edit_daygioi input[name='ten']").val(),
                     cap_bo: ($("#form_edit_daygioi input[name='cap_bo']").is(':checked')) ? 1 : 0,
                     cap_hoc_vien: ($("#form_edit_daygioi input[name='cap_hoc_vien']").is(':checked')) ? 1 : 0,
                     cap_khoa: ($("#form_edit_daygioi input[name='cap_khoa']").is(':checked')) ? 1 : 0,
                     bat_dau: $("#form_edit_daygioi input[name='bat_dau']").val(),
                     ket_thuc: $("#form_edit_daygioi input[name='ket_thuc']").val(),
                     gio_giang: $("#form_edit_daygioi input[name='gio_giang']").val(),
                     gio_khoahoc: $("#form_edit_daygioi input[name='gio_khoahoc']").val(),
                     ghichu: $("#form_edit_daygioi input[name='ghichu']").val(),
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
                             "text":"Bạn đã sửa thành công Hoạt Động Dạy Giỏi!",
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
                                         "text":"Bạn đã xóa thành công Hoạt Động Dạy Giỏi!",
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
         // END Xử lý khi click nút xóa daygioi
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
                id_giangvien: $("#form_add_xaydung select[name='id_giangvien']").val(),
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
                        "text":"Bạn đã tạo thành công Xây Dựng Chương Trình!",
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
                         $("#form_edit_xaydung select[name='id_giangvien']").val(data.data.id_giangvien);
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
                     id_giangvien: $("#form_edit_xaydung select[name='id_giangvien']").val(),
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
                 title: "Xóa Xây dựng Chương trình này?",
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
 // ==================================================================//
  // ==================================================================//
         // Ajax thêm Cuộc Họp
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
                id_giangvien: $("#form_add_hop select[name='id_giangvien']").val(),
                ten: $("#form_add_hop input[name='ten']").val(),
                dia_diem: $("#form_add_hop input[name='dia_diem']").val(),
                thoigian: $("#form_add_hop input[name='thoigian']").val(),
                giogiang: $("#form_add_hop input[name='giogiang']").val(),
                giokhoahoc: $("#form_add_hop input[name='giokhoahoc']").val(),
                ghichu: $("#form_add_hop input[name='ghichu']").val(),
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
                        "text":"Bạn đã tạo thành công Thông Tin Cuộc Họp!",
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
                         $("#form_edit_hop select[name='id_giangvien']").val(data.data.id_giangvien);
                         $("#form_edit_hop input[name='id']").val(data.data.id);
                         $("#form_edit_hop input[name='ten']").val(data.data.ten);
                         $("#form_edit_hop input[name='dia_diem']").val(data.data.dia_diem);
                         $("#form_edit_hop input[name='ghichu']").val(data.data.ghichu);
                         $("#form_edit_hop input[name='thoigian']").val(data.data.thoigian);
                         $("#form_edit_hop input[name='giogiang']").val(data.data.giogiang);
                         $("#form_edit_hop input[name='giokhoahoc']").val(data.data.giokhoahoc);
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
                     id_giangvien: $("#form_edit_hop select[name='id_giangvien']").val(),
                     ten: $("#form_edit_hop input[name='ten']").val(),
                     dia_diem: $("#form_edit_hop input[name='dia_diem']").val(),
                     ghichu: $("#form_edit_hop input[name='ghichu']").val(),
                     thoigian: $("#form_edit_hop input[name='thoigian']").val(),
                     giogiang: $("#form_edit_hop input[name='giogiang']").val(),
                     giokhoahoc: $("#form_edit_hop input[name='giokhoahoc']").val(),
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
                             "text":"Bạn đã sửa thành công Thông tin Cuộc Họp!",
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
                 title: "Xóa Cuộc Họp này?",
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
         // END Xử lý khi click nút xóa hop
 // ==================================================================//
  // ==================================================================//
         // Ajax thêm Hướng Dẫn Khoa Học 
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
                id_giangvien: $("#form_add_hdkh select[name='id_giangvien']").val(),
                sinhvien_nc: ($("#form_add_hdkh input[name='sinhvien_nc']").is(':checked')) ? 1 : 0,
                khoa_luan: ($("#form_add_hdkh input[name='khoa_luan']").is(':checked')) ? 1 : 0,
                luan_van: ($("#form_add_hdkh input[name='luan_van']").is(':checked')) ? 1 : 0,
                luan_an: ($("#form_add_hdkh input[name='luan_an']").is(':checked')) ? 1 : 0,
                bat_dau: $("#form_add_hdkh input[name='bat_dau']").val(),
                ket_thuc: $("#form_add_hdkh input[name='ket_thuc']").val(),
                gio_giang: $("#form_add_hdkh input[name='gio_giang']").val(),
                gio_khoahoc: $("#form_add_hdkh input[name='gio_khoahoc']").val(),
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
                        "text":"Bạn đã tạo thành công Thông Tin Hướng Dẫn Khoa Học !",
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
                         $("#form_edit_hdkh select[name='id_giangvien']").val(data.data.id_giangvien);
                         $("#form_edit_hdkh input[name='id']").val(data.data.id);
                        $("#form_edit_hdkh input[name='sinhvien_nc']").prop('checked', (data.data.sinhvien_nc == 1) ? true : false);
                        $("#form_edit_hdkh input[name='khoa_luan']").prop('checked', (data.data.khoa_luan == 1) ? true : false);
                        $("#form_edit_hdkh input[name='luan_van']").prop('checked', (data.data.luan_van == 1) ? true : false);
                        $("#form_edit_hdkh input[name='luan_an']").prop('checked', (data.data.luan_an == 1) ? true : false);
                        $("#form_edit_hdkh input[name='bat_dau']").val(data.data.bat_dau);
                        $("#form_edit_hdkh input[name='ket_thuc']").val(data.data.ket_thuc);
                        $("#form_edit_hdkh input[name='gio_giang']").val(data.data.gio_giang);
                        $("#form_edit_hdkh input[name='gio_khoahoc']").val(data.data.gio_khoahoc);
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
                     id_giangvien: $("#form_edit_hdkh select[name='id_giangvien']").val(),
                     sinhvien_nc: ($("#form_edit_hdkh input[name='sinhvien_nc']").is(':checked')) ? 1 : 0,
                     khoa_luan: ($("#form_edit_hdkh input[name='khoa_luan']").is(':checked')) ? 1 : 0,
                    luan_van: ($("#form_edit_hdkh input[name='luan_van']").is(':checked')) ? 1 : 0,
                    luan_an: ($("#form_edit_hdkh input[name='luan_an']").is(':checked')) ? 1 : 0,
                    bat_dau: $("#form_edit_hdkh input[name='bat_dau']").val(),
                    ket_thuc: $("#form_edit_hdkh input[name='ket_thuc']").val(),
                    gio_giang: $("#form_edit_hdkh input[name='gio_giang']").val(),
                    gio_khoahoc: $("#form_edit_hdkh input[name='gio_khoahoc']").val(),
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
                             "text":"Bạn đã sửa thành công Thông tin Hướng Dẫn Khoa Học !",
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
                 title: "Xóa Hướng dẫn Khoa học này?",
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
                                         "text":"Bạn đã xóa thành công Hướng Dẫn Khoa Học !",
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
         // END Xử lý khi click nút xóa Hướng Dẫn Khoa Học 
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
                id_giangvien: $("#form_add_hoctap select[name='id_giangvien']").val(),
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
                         $("#form_edit_hoctap select[name='id_giangvien']").val(data.data.id_giangvien);
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
                     id_giangvien: $("#form_edit_hoctap select[name='id_giangvien']").val(),
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
                             "text":"Bạn đã sửa thành công Hoạt Động Học Tập!",
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
                 title: "Xóa Hoạt đọng Học tập này?",
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
                                         "text":"Bạn đã xóa thành công Hoạt Động Học Tập!",
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
         // End xử lý nút xóa học tập
         var table = $('#ds_hop');
        var oTable = table.dataTable({
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
var table = $('#ds_congtac');
        var oTable = table.dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
    "pageLength": 10,
    "language": {
        "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
        "zeroRecords": "Không tìm thấy dữ liệu",
        "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Hoạt Động Đi Thực Tế: _TOTAL_",
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
var table = $('#ds_chambai');
        var oTable = table.dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
    "pageLength": 10,
    "language": {
        "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
        "zeroRecords": "Không tìm thấy dữ liệu",
        "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Hoạt Động Chấm Bài: _TOTAL_",
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
var table = $('#ds_daygioi');
        var oTable = table.dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
    "pageLength": 10,
    "language": {
        "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
        "zeroRecords": "Không tìm thấy dữ liệu",
        "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Hoạt Động Dạy Giỏi: _TOTAL_",
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
var table = $('#ds_hoctap');
        var oTable = table.dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
    "pageLength": 10,
    "language": {
        "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
        "zeroRecords": "Không tìm thấy dữ liệu",
        "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Tham Gia Học Tập: _TOTAL_",
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
var table = $('#ds_hdkh');
        var oTable = table.dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
    "pageLength": 10,
    "language": {
        "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
        "zeroRecords": "Không tìm thấy dữ liệu",
        "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng HDKH: _TOTAL_",
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
var table = $('#ds_xaydung');
        var oTable = table.dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
    "pageLength": 10,
    "language": {
        "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
        "zeroRecords": "Không tìm thấy dữ liệu",
        "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Xây Dựng Chương Trình: _TOTAL_",
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
var table = $('#ds_vanban');
        var oTable = table.dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
    "pageLength": 10,
    "language": {
        "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
        "zeroRecords": "Không tìm thấy dữ liệu",
        "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Văn Bản: _TOTAL_",
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
var table = $('#ds_dang');
        var oTable = table.dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
    "pageLength": 10,
    "language": {
        "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
        "zeroRecords": "Không tìm thấy dữ liệu",
        "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Hoạt Động Đảng: _TOTAL_",
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/khac/edit/index.blade.php ENDPATH**/ ?>