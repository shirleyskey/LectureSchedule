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
                    <a href="<?php echo e(route('giangvien.index')); ?>">Quay Lại Danh Sách Giảng Viên</a>
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
            <h2>1. Thông tin cá nhân</h2>
                <div class="tabbable tabbable-tabdrop">
                    <ul class="nav nav-pills" id="#myTab">
                        <li class="active">
                            
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
                        </div>
                        <!-- END FORM-->
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
        </div>


        <div class="row box_gio">
            <div class="col-md-12">
            <h2>2. Giảng Dạy</h2>
                <div class="tabbable tabbable-tabdrop">
                    <ul class="nav nav-pills" id="#myTab">
                        <li class="active">
                            
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
                        </div>
                        <!-- END FORM-->
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
        </div>


        <div class="row box_gio">
            <div class="col-md-12">
            <h2>3. Nghiên Cứu Khoa Học</h2>
                <div class="tabbable tabbable-tabdrop">
                    <ul class="nav nav-pills" id="#myTab">
                    </ul>
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form" id="form_wizard_1">
                        <!-- BEGIN FORM-->
                        <div class="tab-content">
                            <!-- BEGIN TAB 2-->
                            <div class="tab-pane active" id="tab2">
                                <?php if(!empty($nckh)): ?>
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_nckh">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên NCKH</th>
                                                    <th> Thể Loại</th>
                                                    <th> Chủ Biên</th>
                                                    <th> Tham Gia</th>
                                                    <th> Bắt Đầu</th>
                                                    <th> Kết Thúc</th>
                                                    
                                                    <th> Số Giờ</th>
                                                    <th> Giờ Của Giảng Viên</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if( count($nckh) > 0 ): ?>
                                                    <?php 
                                                    $stt = 1; 
                                                    $tong_so_gio_nc = 0;
                                                    
                                                    ?>
                                                    <?php $__currentLoopData = $nckh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $id_giangvien = $giangvien->id;

                                                    ?>
                                                    <tr>
                                                        <td> <?php echo e($stt); ?> </td>
                                                        <td> <?php echo e($v->ten); ?> </td>
                                                        <td> <?php echo e(($v->theloai) ? $v->theloais->ten : ''); ?></td>
                                                        <td>
                                                            <?php
                                                            $chubien = json_decode( $v->chubien, true);
                                                            $so_chubien = 0;
                                                            $is_chubien = false;
                                                            ?>
                                                            <?php $__currentLoopData = $chubien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                                             <?php
                                                                 $so_chubien = $so_chubien + 1;
                                                             ?>
                                                             <?php if($value == $id_giangvien): ?>
                                                                 <?php
                                                                     $is_chubien = true;
                                                                 ?>
                                                             <?php endif; ?> 
                                                            <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?> </p>
                                                            <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $thamgia = json_decode( $v->thamgia, true);
                                                            $so_thamgia = 0;
                                                            ?>
                                                            <?php $__currentLoopData = $thamgia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                           
                                                            <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                                            <?php
                                                            $so_thamgia = $so_thamgia + 1;
                                                            ?>
                                                            <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?> </p>
                                                            <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </td>
                                                        <td> <?php echo e($v->batdau); ?></td>
                                                        <td> <?php echo e($v->ketthuc); ?></td>
                                                        <td> <?php echo e($v->sotrang); ?> giờ</td>
                                                        
                                                        <td>
                                                            <?php
                                                                if($is_chubien == true){
                                                                    $so_gio_nc = ($v->sotrang)*1/3 + (2*($v->sotrang))/(3*($so_chubien+$so_thamgia));
                                                                }
                                                                else{
                                                                    $so_gio_nc = (2*($v->sotrang))/(3*($so_chubien+$so_thamgia));
                                                                }
                                                                echo $so_gio_nc;
                                                                // echo $so_chubien;
                                                                $tong_so_gio_nc = $tong_so_gio_nc + $so_gio_nc;
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <?php $stt++; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td colspan="9">
                                                            Tổng Giờ NCKH của Giảng Viên = <?php echo e($tong_so_gio_nc); ?>

                                                        </td>
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
                            <!-- END BEGIN TAB 2-->
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
            <h2>4. Công tác khác</h2>
                <div class="tabbable tabbable-tabdrop">
                    <ul class="nav nav-pills">
                        <li class="active">
                            <a href="#tab_giokhac" data-toggle="tab">Giờ Hoạt Động Khác</a>
                        </li>
                        <li>
                            <a href="#tab_hop" data-toggle="tab">Họp</a>
                        </li>
                        <li>
                            <a href="#tab_hdkh" data-toggle="tab">Hướng Dẫn Khoa Học</a>
                        </li>
                        <li>
                            <a href="#tab4" data-toggle="tab">Chấm Bài</a>
                        </li>
                        <li>
                            <a href="#tab3" data-toggle="tab"> Đi Thực Tế</a>
                        </li>
                        <li>
                            <a href="#tab6" data-toggle="tab">Dạy Giỏi</a>
                        </li>
                        <li >
                            <a href="#tab_vanban" data-toggle="tab">Xử Lý Văn Bản</a>
                        </li>
                        <li>
                            <a href="#tab5" data-toggle="tab">Đảng Đoàn</a>
                        </li>
                    </ul>
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form" id="form_wizard_1">
                        <!-- BEGIN FORM-->
                        <div class="tab-content">

                            <!-- BEGIN GIỜ KHÁC-->
                            <div class="tab-pane active" id="tab_giokhac">
                                <?php if(($hop->isNotEmpty()) || ($chambai->isNotEmpty()) || ($congtac->isNotEmpty()) || ($daygioi->isNotEmpty()) || ($hoctap->isNotEmpty()) || ($hdkh->isNotEmpty())): ?>
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_giokhac">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Thể Loại</th>
                                                    <th> Giờ Giảng</th>
                                                    <th> Giờ Khoa Học</th>
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
                                                    $total_hop_khoahoc = 0;
                                                    $total_chambai_khoahoc = 0;
                                                    $total_congtac_khoahoc = 0;
                                                    $total_daygioi_khoahoc = 0; 
                                                    $total_hoctap_khoahoc = 0; 
                                                    $total_hdkh_khoahoc = 0; 
                                                
                                                ?>
                                                <?php if( $hop->count() > 0 ): ?>
                                                    <?php $__currentLoopData = $hop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_hop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php 
                                                    $total_hop += $v_hop->giogiang; 
                                                    $total_hop_khoahoc += $v_hop->giokhoahoc; 
                                                    ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td> <?php echo e($stt); ?> </td>
                                                        <td> Họp </td>
                                                        <td> <?php echo e($total_hop); ?> </td>
                                                        <td> <?php echo e($total_hop_khoahoc); ?> </td>
                                                    </tr>
                                                    <?php $stt++; ?>
                                                <?php endif; ?>
                                                <?php if( $hdkh->count() > 0 ): ?>
                                                   
                                                <?php $__currentLoopData = $hdkh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_hdkh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php 
                                                $total_hdkh += $v_hdkh->gio_giang; 
                                                $total_hdkh_khoahoc += $v_hdkh->gio_khoahoc; 
                                                ?>
                                                
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td> <?php echo e($stt); ?> </td>
                                                    <td> Hướng Dẫn Khoa Học </td>
                                                    <td> <?php echo e($total_hdkh); ?> </td>
                                                    <td> <?php echo e($total_hdkh_khoahoc); ?> </td>
                                                </tr>
                                                <?php $stt++; ?>
                                            <?php endif; ?>
                                               
                                                <?php if( $chambai->count() > 0 ): ?>
                                                    <?php $__currentLoopData = $chambai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_chambai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php 
                                                    $total_chambai += $v_chambai->gio_giang; 
                                                    $total_chambai_khoahoc += $v_chambai->gio_khoahoc; 
                                                    ?>
                                                    
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td> <?php echo e($stt); ?> </td>
                                                        <td> Chấm Bài </td>
                                                        <td> <?php echo e($total_chambai); ?> </td>
                                                        <td> <?php echo e($total_chambai_khoahoc); ?> </td>
                                                    </tr>
                                                    <?php $stt++; ?>
                                                <?php endif; ?>
                                               
                                                <?php if( $congtac->count() > 0 ): ?>
                                                    <?php $__currentLoopData = $congtac; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_congtac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php 
                                                    $total_congtac += $v_congtac->gio_giang; 
                                                    $total_congtac_khoahoc += $v_congtac->gio_khoahoc; 
                                                    ?>
                                                   
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td> <?php echo e($stt); ?> </td>
                                                        <td> Đi Thực Tế</td>
                                                        <td> <?php echo e($total_congtac); ?></td>
                                                        <td> <?php echo e($total_congtac_khoahoc); ?></td>
                                                    </tr>
                                                    <?php $stt++; ?>
                                                <?php endif; ?>

                                                <?php if( $daygioi->count() > 0 ): ?>
                                                   
                                                    <?php $__currentLoopData = $daygioi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_daygioi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php 
                                                    $total_daygioi += $v_daygioi->gio_giang; 
                                                    $total_daygioi_khoahoc += $v_daygioi->gio_khoahoc; 
                                                    ?>
                                                   
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td> <?php echo e($stt); ?> </td>
                                                        <td> Dạy Giỏi</td>
                                                        <td> <?php echo e($total_daygioi); ?></td>
                                                        <td> <?php echo e($total_daygioi_khoahoc); ?></td>
                                                    </tr>
                                                    <?php $stt++; ?>
                                                <?php endif; ?>

                                               
                                                <?php $total = $total_hop + $total_chambai + $total_congtac + $total_daygioi + $total_hdkh + $total_hoctap; ?>
                                                <?php $total_khoahoc = $total_hop_khoahoc + $total_chambai_khoahoc + $total_congtac_khoahoc + $total_daygioi_khoahoc + $total_hdkh_khoahoc + $total_hoctap_khoahoc; ?>

                                                <tr> 
                                                    <td colspan="3"> Tổng Giờ Giảng: </td>
                                                    <td> <?php echo e($total); ?> </td>
                                                </tr>
                                                <tr> 
                                                    <td colspan="3"> Tổng Giờ Khoa Học: </td>
                                                    <td> <?php echo e($total_khoahoc); ?> </td>
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
                              <!-- BEGIN XỬ LÝ VĂN BẢN 3-->
                              <div class="tab-pane " id="tab_vanban">
                                <?php if(!empty($vanban)): ?>
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_vanban">
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if( count($vanban) > 0 ): ?>
                                                    <?php $stt = 1; ?>
                                                    <?php $__currentLoopData = $vanban; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_vanban): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td> <?php echo e($stt); ?> </td>
                                                        <td> <?php echo e($v_vanban->noi_dung); ?> </td>
                                                        <td> <?php echo e($v_vanban->lanhdao); ?> </td>
                                                        <td>
                                                            <?php
                                                            $chu_tri = json_decode( $v_vanban->chu_tri, true);
                                                            $so_chu_tri = 0;
                                                            $is_chu_tri = false;
                                                            ?>
                                                            <?php $__currentLoopData = $chu_tri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                                             <?php
                                                                 $so_chu_tri = $so_chu_tri + 1;
                                                             ?>
                                                             <?php if($value == $id_giangvien): ?>
                                                                 <?php
                                                                     $is_chu_tri = true;
                                                                 ?>
                                                             <?php endif; ?> 
                                                            <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?> </p>
                                                            <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $tham_gia = json_decode( $v_vanban->tham_gia, true);
                                                            $so_tham_gia = 0;
                                                            ?>
                                                            <?php $__currentLoopData = $tham_gia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                           
                                                            <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                                            <?php
                                                            $so_tham_gia = $so_tham_gia + 1;
                                                            ?>
                                                            <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?> </p>
                                                            <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </td>
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
                                                <th> Tên </th>
                                                <th> Địa Điểm</th>
                                                <th> Bắt Đầu</th>
                                                <th> Kết Thúc</th>
                                                <th> Giờ Giảng</th>
                                                <th> Giờ Khoa Học</th>
                                                <th> Ghi Chú</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if( $congtac->count() > 0 ): ?>
                                                <?php $stt = 1; $giang = 0; $khoahoc = 0; ?>
                                                <?php $__currentLoopData = $congtac; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_congtac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td> <?php echo e($stt); ?> </td>
                                                    <td> <?php echo e($v_congtac->ten); ?> </td>
                                                    <td> <?php echo e($v_congtac->dia_diem); ?> </td>
                                                    <td> <?php echo e($v_congtac->bat_dau); ?> </td>
                                                    <td> <?php echo e($v_congtac->ket_thuc); ?> </td>
                                                    <td> <?php echo e($v_congtac->gio_giang); ?> </td>
                                                    <td> <?php echo e($v_congtac->gio_khoahoc); ?> </td>
                                                    <td> <?php echo e($v_congtac->ghichu); ?> </td>
                                                </tr>
                                                <?php 
                                                    $stt++; 
                                                    $giang = $giang + $v_congtac->gio_giang; 
                                                    $khoahoc = $khoahoc + $v_congtac->gio_khoahoc;
                                                ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td colspan="7">
                                                        Tổng Giờ Giảng:
                                                    </td>
                                                    <td colspan="0">
                                                       <?php echo e($giang); ?>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="7">
                                                        Tổng Giờ Khoa Học:
                                                    </td>
                                                    <td colspan="0">
                                                       <?php echo e($khoahoc); ?>

                                                    </td>
                                                </tr>
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
                                                <th> Hình Thúc</th>
                                                <th> Số Bài</th>
                                                <th> Bắt Đầu</th>
                                                <th> Kết Thúc</th>
                                                <th> Giờ Giảng</th>
                                                <th> Giờ Khoa Học</th>
                                                <th>Ghi Chú</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if( $chambai->count() > 0 ): ?>
                                                <?php $stt = 1; $giang = 0; $khoahoc = 0; ?>
                                                <?php $__currentLoopData = $chambai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_chambai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td> <?php echo e($stt); ?> </td>
                                                    <td> <?php echo e(($v_chambai->lop)); ?> </td>
                                                    <td> 
                                                        <?php 
                                                            if($v_chambai->hoc_phan == 1) {
                                                                echo "HP";
                                                            } 
                                                            else if($v_chambai->giua_hoc_phan == 1) {
                                                                echo "GHP";
                                                            }  
                                                            else if($v_chambai->cdtn == 1) {
                                                                echo "CĐTN";
                                                            }  
                                                        ?>
                                                    </td>
                                                    <td> <?php echo e($v_chambai->so_bai); ?> </td>
                                                    <td> <?php echo e($v_chambai->bat_dau); ?> </td>
                                                    <td> <?php echo e($v_chambai->ket_thuc); ?> </td>
                                                    <td> <?php echo e($v_chambai->gio_giang); ?> </td>
                                                    <td> <?php echo e($v_chambai->gio_khoahoc); ?> </td>
                                                    <td> <?php echo e($v_chambai->ghichu); ?> </td>
                                                </tr>
                                                <?php 
                                                $stt++; 
                                                $giang = $giang + $v_chambai->gio_giang; 
                                                $khoahoc = $khoahoc + $v_chambai->gio_khoahoc;
                                                ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td colspan="8">
                                                        Tổng Giờ Giảng:
                                                    </td>
                                                    <td colspan="0">
                                                       <?php echo e($giang); ?>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8">
                                                        Tổng Giờ Khoa Học:
                                                    </td>
                                                    <td colspan="0">
                                                       <?php echo e($khoahoc); ?>

                                                    </td>
                                                </tr>
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
                                            <th> Địa Điểm</th>
                                            <th> Bắt Đầu</th>
                                            <th> Kết Thúc</th>
                                            <th> Giờ Giảng</th>
                                            <th> Giờ Khoa Học</th>
                                            <th> Ghi Chú</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if( $hop->count() > 0 ): ?>
                                            <?php $stt = 1; $giang = 0; $khoahoc = 0; ?>
                                            <?php $__currentLoopData = $hop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_hop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td> <?php echo e($stt); ?> </td>
                                                <td> <?php echo e($v_hop->ten); ?> </td>
                                                <td> <?php echo e($v_hop->dia_diem); ?> </td>
                                                <td> <?php echo e($v_hop->batdau); ?> </td>
                                                <td> <?php echo e($v_hop->ketthuc); ?> </td>
                                                <td> <?php echo e($v_hop->giogiang); ?> </td>
                                                <td> <?php echo e($v_hop->giokhoahoc); ?> </td>
                                                <td> <?php echo e($v_hop->ghichu); ?> </td>
                                                
                                            </tr>
                                            <?php 
                                            $stt++; 
                                            $giang = $giang + $v_hop->giogiang; 
                                            $khoahoc = $khoahoc + $v_hop->giokhoahoc;
                                            ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td colspan="7">
                                                    Tổng Giờ Giảng:
                                                </td>
                                                <td colspan="0">
                                                   <?php echo e($giang); ?>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="7">
                                                    Tổng Giờ Khoa Học:
                                                </td>
                                                <td colspan="0">
                                                   <?php echo e($khoahoc); ?>

                                                </td>
                                            </tr>
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
                                            <th> Bắt Đầu</th>
                                            <th> Kết Thúc</th>
                                            <th> Giờ Giảng</th>
                                            <th> Giờ Khoa Học</th>
                                            <th> Ghi Chú</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if( $hdkh->count() > 0 ): ?>
                                        <?php $stt = 1; $giang = 0; $khoahoc = 0; ?>
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
                                                     else if($v_hdkh->sinhvien_nc == 1) {
                                                         echo "Sinh Viên NCKH";
                                                     }   
                                                ?>
                                                 </td>

                                                <td> <?php echo e($v_hdkh->hoc_vien); ?> </td>
                                                <td> <?php echo e($v_hdkh->khoa); ?> </td>
                                                <td> <?php echo e($v_hdkh->bat_dau); ?> </td>
                                                <td> <?php echo e($v_hdkh->ket_thuc); ?> </td>
                                                <td> <?php echo e($v_hdkh->gio_giang); ?> </td>
                                                <td> <?php echo e($v_hdkh->gio_khoahoc); ?> </td>
                                                <td> <?php echo e($v_hdkh->ghichu); ?> </td>
                                            </tr>
                                            <?php 
                                            $stt++; 
                                            $giang = $giang + $v_hdkh->gio_giang; 
                                            $khoahoc = $khoahoc + $v_hdkh->gio_khoahoc;
                                            ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td colspan="8">
                                                    Tổng Giờ Giảng:
                                                </td>
                                                <td colspan="0">
                                                   <?php echo e($giang); ?>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="8">
                                                    Tổng Giờ Khoa Học:
                                                </td>
                                                <td colspan="0">
                                                   <?php echo e($khoahoc); ?>

                                                </td>
                                            </tr>
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
                                                <th> Bắt Đầu</th>
                                                <th> Kết Thúc</th>
                                                <th> Giờ Giảng</th>
                                                <th> Giờ Khoa Học</th>
                                                <th> Ghi Chú</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if( count($daygioi) > 0 ): ?>
                                                <?php $stt = 1; $giang = 0; $khoahoc = 0; ?>
                                                <?php $__currentLoopData = $daygioi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td> <?php echo e($stt); ?> </td>
                                                    <td> <?php echo e($v->ten); ?> </td>
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
                                                    
                                                    
                                                </tr>
                                                <?php 
                                                $stt++; 
                                                $giang = $giang + $v->gio_giang; 
                                                $khoahoc = $khoahoc + $v->gio_khoahoc;
                                                ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td colspan="7">
                                                        Tổng Giờ Giảng:
                                                    </td>
                                                    <td colspan="1">
                                                       <?php echo e($giang); ?>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="7">
                                                        Tổng Giờ Khoa Học:
                                                    </td>
                                                    <td colspan="1">
                                                       <?php echo e($khoahoc); ?>

                                                    </td>
                                                </tr>
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
                            <!-- BEGIN TAB 5-->
                            <div class="tab-pane" id="tab5">
                                <?php if(!empty($dang)): ?>
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_dang">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên Hoạt Động</th>
                                                    <th> Địa Điểm</th>
                                                    <th> Chủ Trì</th>
                                                    <th> Tham Gia</th>
                                                    <th> Bắt Đầu</th>
                                                    <th> Kết Thúc</th>
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
                                                        <td> <?php echo e($v_dang->dia_diem); ?> </td>
                                                        <td>
                                                            <?php
                                                            $chu_tri = json_decode( $v_dang->chu_tri, true);
                                                            $so_chu_tri = 0;
                                                            $is_chu_tri = false;
                                                            ?>
                                                            <?php $__currentLoopData = $chu_tri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                                             <?php
                                                                 $so_chu_tri = $so_chu_tri + 1;
                                                             ?>
                                                             <?php if($value == $id_giangvien): ?>
                                                                 <?php
                                                                     $is_chu_tri = true;
                                                                 ?>
                                                             <?php endif; ?> 
                                                            <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?> </p>
                                                            <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $tham_gia = json_decode( $v_dang->tham_gia, true);
                                                            $so_tham_gia = 0;
                                                            ?>
                                                            <?php $__currentLoopData = $tham_gia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                           
                                                            <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                                            <?php
                                                            $so_tham_gia = $so_tham_gia + 1;
                                                            ?>
                                                            <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?> </p>
                                                            <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </td>
                                                        <td> <?php echo e($v_dang->bat_dau); ?> </td>
                                                        <td> <?php echo e($v_dang->ket_thuc); ?> </td>
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