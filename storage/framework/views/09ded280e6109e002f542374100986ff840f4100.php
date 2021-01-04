<?php $__env->startSection('title', 'Thông tin giảng viên'); ?>

<?php $__env->startSection('style'); ?>
    <link href="<?php echo e(asset('assets/global/plugins/icheck/skins/all.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/global/plugins/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
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
                    <a href="<?php echo e(route('giangvien.index')); ?>">Danh Sách Giảng Viên</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> <strong>
            <i class="fa fa-user"></i> <?php echo e($giangvien->ten); ?> - <?php echo e($giangvien->chucvu); ?></strong>
            <?php if( $giangvien->cothegiang ==1 ): ?>
            <span class="label label-sm bg-green-jungle"> Có Thể giảng </span>
            <?php else: ?>
            <span class="label label-sm label-danger"> Không giảng </span>
            <?php endif; ?>
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
            <h2>Hoạt Động tính giờ</h2>
                <div class="tabbable tabbable-tabdrop">
                    <ul class="nav nav-pills" id="#myTab">
                        <li class="active">
                            <a href="#tab1" data-toggle="tab">Thông tin</a>
                        </li>
                        <li>
                            <a href="#tab_hdkh" data-toggle="tab">Hướng Dẫn Khoa Học</a>
                        </li>
                        <li>
                            <a href="#tab_hop" data-toggle="tab">Họp</a>
                        </li>
                        <li>
                            <a href="#tab3" data-toggle="tab"> Đi Thực Tế</a>
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
                        <div class="tab-content">
                             <!-- BEGIN TAB 1-->
                             <div class="tab-pane active" id="tab1">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Mã Giảng Viên:</label>
                                                <label class="control-label col-md-7 col-xs-6"><?php echo e($giangvien->ma_giangvien); ?></label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Tên:</label>
                                                <label class="control-label col-md-7 col-xs-6"><?php echo e($giangvien->ten); ?></label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Chức Vụ:</label>
                                                <label class="control-label col-md-7 col-xs-6"><?php echo e($giangvien->chucvu); ?></label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Hệ Số Lương:</label>
                                                <label class="control-label col-md-7 col-xs-6"><?php echo e($giangvien->hesoluong); ?></label>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Chỗ Ở:</label>
                                                <label class="control-label col-md-7 col-xs-6"><?php echo e($giangvien->diachi); ?></label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Chức Danh:</label>
                                                <label class="control-label col-md-7 col-xs-6"><?php echo e($giangvien->chucdanh); ?></label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Trình Độ:</label>
                                                <label class="control-label col-md-7 col-xs-6"><?php echo e($giangvien->trinhdo); ?></label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Bài Giảng:</label>
                                                <label class="control-label col-md-7 col-xs-6"><?php echo e($giangvien->bai_giang); ?></label>
                                            </div>
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
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th>Địa Bàn</th>
                                                    <th> Số Giờ</th>
                                                    <th> Thời Gian</th>
                                                    <th> Ghi Chú</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if( $congtac->count() > 0 ): ?>
                                                    <?php $stt = 1; ?>
                                                    <?php $__currentLoopData = $congtac; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_congtac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td> <?php echo e($stt); ?> </td>
                                                        <td> <?php echo e($v_congtac->ten); ?> </td>
                                                        <td> <?php echo e($v_congtac->so_gio); ?> </td>
                                                        <td> <?php echo e($v_congtac->thoigian); ?> </td>
                                                        <td> <?php echo e($v_congtac->ghichu); ?> </td>
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
                                        <p> Không có Hoạt động Đi thực tế nào!</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!-- END BEGIN TAB 3-->

                              <!-- BEGIN TAB 4-->
                              <div class="tab-pane" id="tab4">
                                <?php if($chambai->isNotEmpty()): ?>
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_chambai">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên Lớp</th>
                                                    <th> Tên Học Phần</th>
                                                    <th> Thời Gian</th>
                                                    <th> Số Bài</th>
                                                    <th> Số Giờ</th>
                                                    <th>Ghi Chú</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if( $chambai->count() > 0 ): ?>
                                                    <?php $stt = 1; ?>
                                                    <?php $__currentLoopData = $chambai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_chambai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td> <?php echo e($stt); ?> </td>
                                                        <td> <?php echo e(($v_chambai->id_lop) ? ($v_chambai->lops->tenlop) : ''); ?> </td>
                                                        <td> <?php echo e(($v_chambai->id_hocphan) ? ($v_chambai->hocphans->mahocphan) : ''); ?> </td>
                                                        <td> <?php echo e($v_chambai->thoigian); ?> </td>
                                                        <td> <?php echo e($v_chambai->so_bai); ?> </td>
                                                        <td> <?php echo e($v_chambai->so_gio); ?> </td>
                                                        <td> <?php echo e($v_chambai->ghichu); ?> </td>
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
                                        <p> Không có chấm bài nào!</p>
                                    </div>
                                <?php endif; ?>

                            </div>
                            <!-- END BEGIN TAB 4-->

                          <!-- BEGIN TAB HỌP-->
                          <div class="tab-pane" id="tab_hop">
                            <?php if($hop->isNotEmpty()): ?>
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-body">
                                    <table class="table table-striped table-hover table-bordered" id="table_ds_hop">
                                        <thead>
                                            <tr>
                                                <th> STT</th>
                                                <th> Nội Dung Cuộc Họp</th>
                                                <th> Thời Gian</th>
                                                <th> Số Giờ</th>
                                                <th> Ghi Chú</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if( $hop->count() > 0 ): ?>
                                                <?php $stt = 1; ?>
                                                <?php $__currentLoopData = $hop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_hop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td> <?php echo e($stt); ?> </td>
                                                    <td> <?php echo e($v_hop->ten); ?> </td>
                                                    <td> <?php echo e($v_hop->thoigian); ?> </td>
                                                    <td> <?php echo e($v_hop->so_gio); ?> </td>
                                                    <td> <?php echo e($v_hop->ghichu); ?> </td>
                                                    
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
                                    <p> Không có Cuộc Họp nào!</p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- END BEGIN TAB 8-->

                        

                         <!-- BEGIN TAB 10-->
                         <div class="tab-pane" id="tab10">
                            <?php if($hoctap->isNotEmpty()): ?>
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-body">
                                    <table class="table table-striped table-hover table-bordered" id="table_ds_hoctap">
                                        <thead>
                                            <tr>
                                                <th> STT</th>
                                                <th> Tên Lớp</th>
                                                <th> Loại Hình</th>
                                                <th> Số Giờ</th>
                                                <th> Bắt Đầu</th>
                                                <th> Kết Thúc</th>
                                                <th> Ghi Chú</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if( $hoctap->count() > 0 ): ?>
                                                <?php $stt = 1; ?>
                                                <?php $__currentLoopData = $hoctap; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_hoctap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td> <?php echo e($stt); ?> </td>
                                                    <td> <?php echo e($v_hoctap->ten); ?> </td>
                                                    <td> <?php echo e($v_hoctap->loai_hinh); ?> </td>
                                                    <td> <?php echo e($v_hoctap->so_gio); ?> </td>
                                                    <td> <?php echo e($v_hoctap->thoigian); ?> </td>
                                                    <td> <?php echo e($v_hoctap->thoigian_den); ?> </td>
                                                    <td> <?php echo e($v_hoctap->ghichu); ?> </td>
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
                                    <p> Không tham gia học tập!</p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- END BEGIN TAB 10-->

                         <!-- BEGIN TAB Hướng Dẫn Khoa Học-->
                         <div class="tab-pane" id="tab_hdkh">
                            <?php if($hdkh->isNotEmpty()): ?>
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-body">
                                    <table class="table table-striped table-hover table-bordered" id="table_ds_hdkh">
                                        <thead>
                                            <tr>
                                                <th> STT</th>
                                                <th> Loại Hướng Dẫn</th>
                                                <th> Học Viên</th>
                                                <th> Khóa</th>
                                                <th> Số Giờ</th>
                                                <th> Ghi Chú</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if( $hdkh->count() > 0 ): ?>
                                                <?php $stt = 1; ?>
                                                <?php $__currentLoopData = $hdkh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_hdkh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td> <?php echo e($stt); ?> </td>

                                                    <td> 
                                                    <?php 
                                                         if($v_hdkh->khoa_luan == 1) {
                                                             echo "Khóa Luận";
                                                         } 
                                                         else if($v_hdkh->luan_van == 1) {
                                                             echo "Luận Văn";
                                                         }  
                                                         else if($v_hdkh->luan_an == 1) {
                                                             echo "Luận Án";
                                                         }   
                                                    ?>
                                                     </td>

                                                    <td> <?php echo e($v_hdkh->hoc_vien); ?> </td>
                                                    <td> <?php echo e($v_hdkh->khoa); ?> </td>
                                                    <td> <?php echo e($v_hdkh->so_gio); ?> </td>
                                                    <td> <?php echo e($v_hdkh->ghichu); ?> </td>
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
                                    <p> Không tham gia Hướng Dẫn Khoa Học!</p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- END HƯỚNG DẪN KHOA HỌC-->
                           <!-- BEGIN TAB 6-->
                           <div class="tab-pane" id="tab6">
                                <?php if($daygioi->isNotEmpty()): ?>
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_daygioi">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Bài Dạy Giỏi</th>
                                                    <th> Cấp</th>
                                                    <th> Thời Gian</th>
                                                    <th> Số Giờ</th>
                                                    <th> Ghi Chú</th>
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
                                        <p> Không tham gia dạy giỏi!</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!-- END BEGIN TAB 6-->


                        </div>
                        <!-- END FORM-->
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
        </div>

        <!-- ================================ -->
        <div class="row box_gio">
            <div class="col-md-12">
            <h2>Hoạt Động không tính giờ</h2>
                <div class="tabbable tabbable-tabdrop">
                    <ul class="nav nav-pills">
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
                        <div class="tab-content">
                              <!-- BEGIN XỬ LÝ VĂN BẢN 3-->
                              <div class="tab-pane active" id="tab_vanban">
                                <?php if($vanban->isNotEmpty()): ?>
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_vanban">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Nội Dung</th>
                                                    <th> Lãnh Đạo Xử Lý</th>
                                                    <th> Thời Gian Nhận</th>
                                                    <th> Hạn</th>
                                                    <th> Ghi Chú</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if( $vanban->count() > 0 ): ?>
                                                    <?php $stt = 1; ?>
                                                    <?php $__currentLoopData = $vanban; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_vanban): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td> <?php echo e($stt); ?> </td>
                                                        <td> <?php echo e($v_vanban->noi_dung); ?> </td>
                                                        <td> <?php echo e($v_vanban->lanhdao); ?> </td>
                                                        <td> <?php echo e($v_vanban->thoigian_nhan); ?> </td>
                                                        <td> <?php echo e($v_vanban->thoigian_den); ?> </td>
                                                        <td> <?php echo e($v_vanban->ghichu); ?> </td>
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
                                        <p> Không có Văn Bản  nào!</p>
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
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_dang">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Nội Dung</th>
                                                    <th> Kết Quả</th>
                                                    <th> Vai Trò</th>
                                                    <th> Thời Gian</th>
                                                    <th> Ghi Chú</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if( $dang->count() > 0 ): ?>
                                                    <?php $stt = 1; ?>
                                                    <?php $__currentLoopData = $dang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_dang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td> <?php echo e($stt); ?> </td>
                                                        <td> <?php echo e($v_dang->ten); ?> </td>
                                                        <td> <?php echo e($v_dang->ket_qua); ?> </td>
                                                        <td> <?php echo e($v_dang->vai_tro); ?> </td>
                                                        <td> <?php echo e($v_dang->thoigian); ?> </td>
                                                        <td> <?php echo e($v_dang->ghichu); ?> </td>
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
                                        <p> Không có hoạt động đảng/đoàn nào!</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!-- END BEGIN TAB 5-->

                           

                         <!-- BEGIN TAB 7-->
                         <div class="tab-pane" id="tab7">
                            <?php if($xaydung->isNotEmpty()): ?>
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-body">
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if( $xaydung->count() > 0 ): ?>
                                                <?php $stt = 1; ?>
                                                <?php $__currentLoopData = $xaydung; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_xaydung): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td> <?php echo e($stt); ?> </td>
                                                    <td> <?php echo e($v_xaydung->ten); ?> </td>
                                                    <td> <?php echo e($v_xaydung->hocphan); ?> </td>
                                                    <td> <?php echo e($v_xaydung->khoa); ?> </td>
                                                    <td> <?php echo e($v_xaydung->vai_tro); ?> </td>
                                                    <td> <?php echo e($v_xaydung->thoigian); ?> </td>
                                                    <td> <?php echo e($v_xaydung->ghichu); ?> </td>
                                                  
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
                                    <p> Không tham gia xây dựng chương trình nào!</p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- END BEGIN TAB 7-->



                        
                        </div>
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
                        <div class="tab-content">
                        <!-- BEGIN TAB 11-->
                        <div class="tab-pane active" id="tab17">
                                <?php if(!empty($hocphan)): ?>
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_giogiang">
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
                                        <p> Không có Dữ Liệu</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!-- END BEGIN TAB 17-->
                            <!-- BEGIN TAB 2-->
                            <div class="tab-pane" id="tab2">
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

                            <!-- BEGIN GIỜ KHÁC-->
                        <div class="tab-pane " id="tab_giokhac">
                                <?php if(($hop->isNotEmpty()) || ($chambai->isNotEmpty()) || ($congtac->isNotEmpty()) || ($daygioi->isNotEmpty()) || ($hoctap->isNotEmpty()) || ($hdkh->isNotEmpty())): ?>
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_giokhac">
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
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td> <?php echo e($stt); ?> </td>
                                                        <td> Họp </td>
                                                        <td> <?php echo e($total_hop); ?> </td>
                                                    </tr>
                                                    <?php $stt++; ?>
                                                <?php endif; ?>
                                               
                                                <?php if( $chambai->count() > 0 ): ?>
                                                    <?php $__currentLoopData = $chambai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_chambai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $total_chambai += $v_chambai->so_gio; ?>
                                                    
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td> <?php echo e($stt); ?> </td>
                                                        <td> Chấm Bài </td>
                                                        <td> <?php echo e($total_chambai); ?> </td>
                                                    </tr>
                                                    <?php $stt++; ?>
                                                <?php endif; ?>
                                               
                                                <?php if( $congtac->count() > 0 ): ?>
                                                    <?php $__currentLoopData = $congtac; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_congtac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $total_congtac += $v_congtac->so_gio; ?>
                                                   
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td> <?php echo e($stt); ?> </td>
                                                        <td> Đi Thực Tế</td>
                                                        <td> <?php echo e($total_congtac); ?> </td>
                                                    </tr>
                                                    <?php $stt++; ?>
                                                <?php endif; ?>

                                                <?php if( $daygioi->count() > 0 ): ?>
                                                   
                                                    <?php $__currentLoopData = $daygioi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_daygioi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $total_daygioi += $v_daygioi->so_gio; ?>
                                                   
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td> <?php echo e($stt); ?> </td>
                                                        <td> Dạy Giỏi</td>
                                                        <td> <?php echo e($total_daygioi); ?> </td>
                                                    </tr>
                                                    <?php $stt++; ?>
                                                <?php endif; ?>

                                                <?php if( $hoctap->count() > 0 ): ?>
                                                   
                                                    <?php $__currentLoopData = $hoctap; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_hoctap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $total_hoctap += $v_hoctap->so_gio; ?>
                                                    
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td> <?php echo e($stt); ?> </td>
                                                        <td> Tham Gia Học Tập</td>
                                                        <td> <?php echo e($total_hoctap); ?> </td>
                                                    </tr>
                                                    <?php $stt++; ?>
                                                <?php endif; ?>

                                                <?php if( $hdkh->count() > 0 ): ?>
                                                   
                                                    <?php $__currentLoopData = $hdkh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_hdkh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $total_hdkh += $v_hdkh->so_gio; ?>
                                                    
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td> <?php echo e($stt); ?> </td>
                                                        <td> Hướng Dẫn Khoa Học </td>
                                                        <td> <?php echo e($total_hdkh); ?> </td>
                                                    </tr>
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
<script>
    $(document).ready(function(){
        // Cấu hình bảng ds hợp đồng
        var table = $('#table_ds_hop');
        var oTable = table.dataTable({

            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_",
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
        // END Cấu hình bảng ds hợp đồng

         // Cấu hình bảng cong tác
         var table_ct = $('#table_ds_chambai');
        var oTable_ct = table_ct.dataTable({

            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_",
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
        // END Cấu hình bảng ds công tác

        // Cấu hình bảng ds quyết định
        $('#table_ds_daygioi').dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_",
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

        $('#table_ds_hoctap').dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_",
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

        $('#table_ds_hdkh').dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_",
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
        $('#table_ds_congtac').dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_",
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
        $('#table_ds_xaydung').dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_",
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
        $('#table_ds_dang').dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_",
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
        $('#table_ds_vanban').dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_",
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
        $('#table_ds_giogiang').dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_",
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
        
        $('#table_ds_nckh').dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_",
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
        // END Cấu hình bảng ds quyết định
    });
</script>
<script src="<?php echo e(asset('assets/global/plugins/datatables/datatables.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/giangvien/read/index.blade.php ENDPATH**/ ?>