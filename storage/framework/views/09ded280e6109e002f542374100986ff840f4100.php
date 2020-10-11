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
        <div class="row">
            <div class="col-md-12">
                <div class="tabbable tabbable-tabdrop">
                    <ul class="nav nav-pills">
                        <li class="active">
                            <a href="#tab1" data-toggle="tab">Thông tin</a>
                        </li>
                        <li>
                            <a href="#tab17" data-toggle="tab">Giờ Giảng</a>
                        </li>
                        <li>
                            <a href="#tab2" data-toggle="tab">NCKH</a>
                        </li>
                        <li>
                            <a href="#tab_hop" data-toggle="tab">Họp</a>
                        </li>
                        <li>
                            <a href="#tab_hdkh" data-toggle="tab">Hướng Dẫn Khoa Học</a>
                        </li>
                        <li>
                            <a href="#tab3" data-toggle="tab"> ĐI Thực Tế</a>
                        </li>
                        <li>
                            <a href="#tab4" data-toggle="tab">Chấm Bài</a>
                        </li>
                        <li>
                            <a href="#tab5" data-toggle="tab">Đảng Đoàn</a>
                        </li>
                        <li>
                            <a href="#tab6" data-toggle="tab">Dạy Giỏi</a>
                        </li>
                        <li>
                            <a href="#tab7" data-toggle="tab">Xây Dựng CT</a>
                        </li>
                        <li>
                            <a href="#tab8" data-toggle="tab">CV Đột Xuất</a>
                        </li>
                        <li>
                            <a href="#tab9" data-toggle="tab">Sáng Kiến</a>
                        </li>
                        <li>
                            <a href="#tab10" data-toggle="tab">Học Tập</a>
                        </li>
                        <li>
                            <a href="#tab11" data-toggle="tab">Khóa Luận</a>
                        </li>
                        <li>
                            <a href="#tab12" data-toggle="tab">Luận Văn</a>
                        </li>
                        <li>
                            <a href="#tab13" data-toggle="tab">Luận Án</a>
                        </li>
                        <li>
                            <a href="#tab14" data-toggle="tab">NCS</a>
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
                            <!-- BEGIN TAB 11-->
                                <div class="tab-pane" id="tab17">
                                <?php if(!empty($hocphan)): ?>
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên Học Phần</th>
                                                    <th> Lớp</th>
                                                    <th> Hệ</th>
                                                    <th> Quy Mô</th>
                                                    <th> Tổng Giờ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if( count($hocphan) > 0 ): ?>
                                                    <?php $stt = 1; ?>
                                                    <?php $__currentLoopData = $hocphan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_hocphan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $v_gvchinh = App\Bai::where('id_hocphan', $v_hocphan->id)->get('gvchinh');
                                                        $v_gvphu = App\Bai::where('id_hocphan', $v_hocphan->id)->get('gvphu');
                                                        $is_gvchinh = false;
                                                        $is_gvphu = false;
                                                        foreach ($v_gvchinh as $key => $value) {
                                                            if ($giangvien->id == $value->gvchinh) {
                                                                $is_gvchinh = true;
                                                            }
                                                        }
                                                        foreach ($v_gvphu as $key => $value) {
                                                            if ($giangvien->id == $value->gvphu) {
                                                                $is_gvphu = true;
                                                            }
                                                        }
                                                        // echo (int)$is_gvchinh;
                                                        // echo (int)$is_gvphu;
                                                        // die();
                                                    ?>
                                                    <?php if($is_gvchinh == true || $is_gvphu == true): ?>
                                                    <tr>
                                                        <td> <?php echo e($stt); ?> </td>
                                                        <td> <?php echo e($v_hocphan->mahocphan); ?> </td>
                                                        <td>
                                                            <?php if(App\Lop::where('id', $v_hocphan->id_lop)->first()): ?>
                                                                <?php echo e($v_hocphan->lops->tenlop); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if(App\Lop::where('id', $v_hocphan->id_lop)->first()): ?>
                                                            <?php echo e(($v_hocphan->lops->he == 1) ? "Tín chỉ" : "Niên Chế"); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if(App\Lop::where('id', $v_hocphan->id_lop)->first()): ?>
                                                           <?php echo e($v_hocphan->lops->quymo. " Học Viên"); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                                $ds_bai = App\Bai::where('id_hocphan', $v_hocphan->id)->get();
                                                                $total_gio = 0;
                                                                $total_chinh = 0;
                                                                $total_phu = 0;
                                                                $hesolop = 0;
                                                                if($v_hocphan->lops->songuoi >100)
                                                                {
                                                                    $hesolop = 1.4;
                                                                }
                                                                else if($v_hocphan->lops->songuoi >50 && $v_hocphan->lops->songuoi <100)
                                                                {
                                                                    $hesolop = 1.2;
                                                                }
                                                                else if($v_hocphan->lops->songuoi <50){
                                                                    $hesolop = 1;
                                                                }
                                                                $hetinchi = ($v_hocphan->lops->he == 1) ? 1.1 : 1;
                                                                foreach ($ds_bai as $v_bai) {
                                                                    # code...
                                                                    if($giangvien->id == $v_bai->gvchinh){
                                                                        $total_chinh +=($v_bai->lythuyet*$hesolop*$hetinchi) +  ($v_bai->xemina*$hetinchi) +  ($v_bai->thuchanh*0.7*$hetinchi);
                                                                    }
                                                                    if($giangvien->id == $v_bai->gvphu){
                                                                        $total_phu +=($v_bai->lythuyet_phu*$hesolop*$hetinchi) +  ($v_bai->xemina_phu*$hetinchi) +  ($v_bai->thuchanh_phu*0.7*$hetinchi);
                                                                    }
                                                                    $total_gio = $total_chinh + $total_phu;
                                                                }
                                                                // echo($total_chinh);
                                                                // echo($total_phu);
                                                                // die();
                                                            ?>
                                                            <?php echo e($total_gio); ?> giờ
                                                        </td>
                                                    </tr>
                                                    <?php $stt++; ?>
                                                    <?php endif; ?>

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
                            <!-- END BEGIN TAB 11-->
                            <!-- BEGIN TAB 2-->
                            <div class="tab-pane" id="tab2">
                                <?php if(!empty($nckh)): ?>
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
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
                             <div class="tab-pane" id="tab11">
                                <?php if(!empty($khoaluan)): ?>
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên Khóa Luận</th>
                                                    <th>Vai Trò</th>
                                                    <th>Ghi Chú</th>
                                                    <th>Số Giờ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if( count($khoaluan) > 0 ): ?>
                                                    <?php $stt = 1; ?>
                                                    <?php $__currentLoopData = $khoaluan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td> <?php echo e($stt); ?> </td>
                                                        <td> <?php echo e($v->ten); ?> </td>
                                                        <td>
                                                            <?php
                                                            $huongdan = json_decode( $v->huongdan, true);
                                                            $chutichcham = json_decode( $v->chutichcham, true);
                                                            $thamgiacham = json_decode( $v->thamgiacham, true);
                                                            if(in_array($giangvien->id, $huongdan)){
                                                                echo "<p>Hướng Dẫn</p> ";
                                                            };
                                                            if(in_array($giangvien->id, $chutichcham) ){
                                                                echo "<p>Chủ Tịch Chấm</p>";
                                                            };
                                                            if(in_array($giangvien->id, $thamgiacham) ){
                                                                echo "<p>Tham Gia Chấm</p>";
                                                            };
                                                            ?>

                                                        </td>
                                                        <td> <?php echo e($v->ghichu); ?></td>
                                                        <td>
                                                            <?php
                                                            $gio_khoaluan = 0;
                                                            if(in_array($giangvien->id, $huongdan)){
                                                              $gio_khoaluan += 15;
                                                            }
                                                            if(in_array($giangvien->id, $chutichcham)){
                                                                $gio_khoaluan += 2;
                                                            }
                                                            if(in_array($giangvien->id, $thamgiacham)){
                                                                $gio_khoaluan += 1.5;
                                                            };
                                                            ?>
                                                            <?php echo e($gio_khoaluan); ?> giờ
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
                                        <p> Không tham gia Khóa Luận nào!</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!-- END BEGIN TAB 11-->
                              <!-- BEGIN TAB 12-->
                              <div class="tab-pane" id="tab12">
                                <?php if(!empty($luanvan)): ?>
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên Luận Văn</th>
                                                    <th> Vai Trò</th>
                                                    <th> Thể Loại</th>
                                                    <th>Ghi Chú</th>
                                                    <th>Số Giờ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if( count($luanvan) > 0 ): ?>
                                                    <?php $stt = 1; ?>
                                                    <?php $__currentLoopData = $luanvan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td> <?php echo e($stt); ?> </td>
                                                        <td> <?php echo e($v->ten); ?> </td>
                                                        <td>
                                                            <?php
                                                            $huongdan = json_decode( $v->huongdan, true);
                                                            $chutich = json_decode( $v->chutich, true);
                                                            $phanbien = json_decode( $v->phanbien, true);
                                                            $thuky = json_decode( $v->thuky, true);
                                                            $uyvien = json_decode( $v->uyvien, true);
                                                            if(in_array($giangvien->id, $huongdan)){
                                                                echo "<p>Hướng Dẫn</p> ";
                                                            };
                                                            if(in_array($giangvien->id, $chutich) ){
                                                                echo "<p>Chủ Tịch</p>";
                                                            };
                                                            if(in_array($giangvien->id, $phanbien) ){
                                                                echo "<p>Phản Biện</p>";
                                                            };
                                                            if(in_array($giangvien->id, $thuky) ){
                                                                echo "<p>Thư Ký</p>";
                                                            };
                                                            if(in_array($giangvien->id, $uyvien) ){
                                                                echo "<p>Ủy Viên</p>";
                                                            };
                                                            ?>

                                                        </td>
                                                        <td> <?php echo e(($v->vietnam == 1) ? 'Việt Nam' : 'Nước Ngoài'); ?></td>
                                                        <td> <?php echo e($v->ghichu); ?></td>
                                                        <td>
                                                            <?php
                                                            $gio_luanvan = 0;
                                                             if(in_array($giangvien->id, $huongdan) && $v->vietnam == 1){
                                                                $gio_luanvan += 25;
                                                            };
                                                            if(in_array($giangvien->id, $huongdan) && $v->vietnam == 0){
                                                                $gio_luanvan += 30;
                                                            };
                                                            if(in_array($giangvien->id, $chutich) ){
                                                                $gio_luanvan += 4;
                                                            };
                                                            if(in_array($giangvien->id, $phanbien) ){
                                                                $gio_luanvan += 3;
                                                            };
                                                            if(in_array($giangvien->id, $thuky) ){
                                                                $gio_luanvan += 3;
                                                            };

                                                            if(in_array($giangvien->id, $uyvien) ){
                                                                $gio_luanvan += 3;
                                                            };
                                                            ?>
                                                            <?php echo e($gio_luanvan); ?> giờ
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
                                        <p> Không có Tham Gia Luận Văn nào!</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!-- END BEGIN TAB 12-->
                         <!-- BEGIN TAB 13-->
                         <div class="tab-pane" id="tab13">
                            <?php if(!empty($luanan)): ?>
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-body">
                                    <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                        <thead>
                                            <tr>
                                                <th> STT</th>
                                                <th> Tên Luận Án</th>
                                                <th> Vai Trò</th>
                                                <th> Thể Loại</th>
                                                <th> Cấp </th>
                                                <th>Ghi Chú</th>
                                                <th>Số Giờ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if( count($luanan) > 0 ): ?>
                                                <?php $stt = 1; ?>
                                                <?php $__currentLoopData = $luanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td> <?php echo e($stt); ?> </td>
                                                    <td> <?php echo e($v->ten); ?> </td>
                                                    <td>
                                                        <?php
                                                        $docnhanxet = json_decode( $v->docnhanxet, true);
                                                        $chutichhoithao = json_decode( $v->chutichhoithao, true);
                                                        $thanhvienhoithao = json_decode( $v->thanhvienhoithao, true);
                                                        $chutichcham = json_decode( $v->chutichcham, true);
                                                        $thanhviencham = json_decode( $v->thanhviencham, true);
                                                        if($giangvien->id == $v->huongdanchinh){
                                                            echo "<p>Hướng Dẫn Chính</p> ";
                                                        };
                                                        if($giangvien->id == $v->huongdanphu){
                                                            echo "<p>Hướng Dẫn Phụ</p> ";
                                                        };
                                                        if(in_array($giangvien->id, $docnhanxet) ){
                                                            echo "<p>Đọc và Nhận Xét</p>";
                                                        };
                                                        if(in_array($giangvien->id, $chutichhoithao) ){
                                                            echo "<p>Chủ Tịch Hội Thảo</p>";
                                                        };
                                                        if(in_array($giangvien->id, $thanhvienhoithao) ){
                                                            echo "<p>Thành viên Hội Thảo</p>";
                                                        };
                                                        if(in_array($giangvien->id, $chutichcham) ){
                                                            echo "<p>Chủ Tịch Chấm</p>";
                                                        };
                                                        if(in_array($giangvien->id, $thanhviencham) ){
                                                            echo "<p>Thành Viên Chấm</p>";
                                                        };
                                                        ?>

                                                    </td>
                                                    
                                                    <td> <?php echo e(($v->vietnam == 1) ? 'Việt Nam' : 'Nước Ngoài'); ?></td>
                                                    
                                                    <td> <?php echo e(($v->cap) == 1 ? 'Cơ Sở' : 'Học Viện'); ?></td>
                                                    <td> <?php echo e($v->ghichu); ?></td>
                                                    <td>
                                                        <?php
                                                        $gio_luanan = 0;
                                                        if($giangvien->id == $v->huongdanchinh && $v->vietnam == 1){
                                                            $gio_luanan += 100/3;
                                                        };
                                                        if($giangvien->id == $v->huongdanchinh && $v->vietnam == 0){
                                                            $gio_luanan += 120/3;
                                                        };
                                                        if($giangvien->id == $v->huongdanphu && $v->vietnam == 1){
                                                            $gio_luanan += 50/3;
                                                        };
                                                        if($giangvien->id == $v->huongdanphu && $v->vietnam == 1){
                                                            $gio_luanan += 60/3;
                                                        };
                                                        if(in_array($giangvien->id, $docnhanxet) ){
                                                            $gio_luanan += 10;
                                                        };
                                                        if(in_array($giangvien->id, $chutichhoithao) ){
                                                            $gio_luanan += 5;
                                                        };
                                                        if(in_array($giangvien->id, $thanhvienhoithao) ){
                                                            $gio_luanan += 4;
                                                        };
                                                        if(in_array($giangvien->id, $chutichcham) && $v->cap == 1){
                                                            $gio_luanan += 8;
                                                        };
                                                        if(in_array($giangvien->id, $thanhviencham) && $v->cap == 1){
                                                            $gio_luanan += 5;
                                                        };
                                                        if(in_array($giangvien->id, $chutichcham) && $v->cap != 1){
                                                            $gio_luanan += 10;
                                                        };
                                                        if(in_array($giangvien->id, $thanhviencham) && $v->cap != 1){
                                                            $gio_luanan += 7;
                                                        };
                                                        ?>
                                                        <?php echo e($gio_luanan); ?> giờ
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
                                    <p> Không có Tham Gia Luận Án nào!</p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- END BEGIN TAB 13-->
                          <!-- BEGIN TAB 14-->
                          <div class="tab-pane" id="tab14">
                            <?php if(!empty($ncs)): ?>
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-body">
                                    <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                        <thead>
                                            <tr>
                                                <th> STT</th>
                                                <th> Tên Nghiên Cứu Sinh</th>
                                                <th> Vai Trò</th>
                                                <th>Ghi Chú</th>
                                                <th>Số Giờ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if( count($ncs) > 0 ): ?>
                                                <?php $stt = 1; ?>
                                                <?php $__currentLoopData = $ncs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td> <?php echo e($stt); ?> </td>
                                                    <td> <?php echo e($v->ten); ?> </td>
                                                    <td>
                                                        <?php
                                                        $thanhvien = json_decode( $v->thanhvien, true);
                                                        $thuky = json_decode( $v->thuky, true);
                                                        if(in_array($giangvien->id, $thanhvien)){
                                                            echo "<p>Thành Viên</p> ";
                                                        };
                                                        if(in_array($giangvien->id, $thuky) ){
                                                            echo "<p>Thư Ký</p>";
                                                        };
                                                        ?>

                                                    </td>
                                                    <td> <?php echo e($v->ghichu); ?></td>
                                                    <td>
                                                    <?php
                                                        $nc_gio = 0;
                                                         if(in_array($giangvien->id, $thanhvien)){
                                                            $nc_gio += 2;
                                                        };
                                                        if(in_array($giangvien->id, $thuky) ){
                                                            $nc_gio += 1;
                                                        };
                                                    ?>
                                                    <?php echo e($nc_gio); ?> giờ
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
                                    <p> Không tham gia Nghiên Cứu Sinh nào!</p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- END BEGIN TAB 14-->
                            <!-- BEGIN TAB 3-->
                            <div class="tab-pane" id="tab3">
                                <?php if($congtac->isNotEmpty()): ?>
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_ct">
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
                                        <p> Không có Công Tác nào!</p>
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
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
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


                            <!-- BEGIN TAB 5-->
                            <div class="tab-pane" id="tab5">
                                <?php if($dang->isNotEmpty()): ?>
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên Hoạt Động</th>
                                                    <th> Thời Gian</th>
                                                    <th> Số Giờ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if( $dang->count() > 0 ): ?>
                                                    <?php $stt = 1; ?>
                                                    <?php $__currentLoopData = $dang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_dang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td> <?php echo e($stt); ?> </td>
                                                        <td> <?php echo e($v_dang->ten); ?> </td>
                                                        <td>  </td>
                                                        <td> </td>
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

                              <!-- BEGIN TAB 6-->
                              <div class="tab-pane" id="tab6">
                                <?php if(!empty($daygioi)): ?>
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
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
                                        <p> Không dạy giỏi!</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!-- END BEGIN TAB 6-->

                         <!-- BEGIN TAB 7-->
                         <div class="tab-pane" id="tab7">
                            <?php if($xaydung->isNotEmpty()): ?>
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-body">
                                    <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                        <thead>
                                            <tr>
                                                <th> STT</th>
                                                <th> Tên </th>
                                                <th> Thời Gian</th>
                                                <th> Số Giờ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if( $xaydung->count() > 0 ): ?>
                                                <?php $stt = 1; ?>
                                                <?php $__currentLoopData = $xaydung; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_xaydung): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td> <?php echo e($stt); ?> </td>
                                                    <td> <?php echo e($v_xaydung->ten); ?> </td>
                                                    <td>  </td>
                                                    <td> </td>
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

                         <!-- BEGIN TAB 8-->
                         <div class="tab-pane" id="tab8">
                            <?php if($dotxuat->isNotEmpty()): ?>
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-body">
                                    <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                        <thead>
                                            <tr>
                                                <th> STT</th>
                                                <th> Tên </th>
                                                <th> Thời Gian</th>
                                                <th> Số Giờ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if( $dotxuat->count() > 0 ): ?>
                                                <?php $stt = 1; ?>
                                                <?php $__currentLoopData = $dotxuat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_dotxuat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td> <?php echo e($stt); ?> </td>
                                                    <td> <?php echo e($v_dotxuat->ten); ?> </td>
                                                    <td>  </td>
                                                    <td> </td>
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
                                    <p> Không có công việc đột xuất nào!</p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- END BEGIN TAB 8-->

                          <!-- BEGIN TAB HỌP-->
                          <div class="tab-pane" id="tab_hop">
                            <?php if($hop->isNotEmpty()): ?>
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-body">
                                    <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
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

                         <!-- BEGIN TAB 9-->
                         <div class="tab-pane" id="tab9">
                            <?php if($sangkien->isNotEmpty()): ?>
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-body">
                                    <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                        <thead>
                                            <tr>
                                                <th> STT</th>
                                                <th> Tên </th>
                                                <th> Thời Gian</th>
                                                <th> Số Giờ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if( $sangkien->count() > 0 ): ?>
                                                <?php $stt = 1; ?>
                                                <?php $__currentLoopData = $sangkien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_sangkien): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td> <?php echo e($stt); ?> </td>
                                                    <td> <?php echo e($v_sangkien->ten); ?> </td>
                                                    <td>  </td>
                                                    <td> </td>
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
                                    <p> Không có sáng kiến cải tiến nào!</p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- END BEGIN TAB 9-->

                         <!-- BEGIN TAB 10-->
                         <div class="tab-pane" id="tab10">
                            <?php if($hoctap->isNotEmpty()): ?>
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-body">
                                    <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
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
                                    <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
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

                         <!-- BEGIN TAB 11-->
                         <div class="tab-pane" id="tab11">
                            
                        </div>
                        <!-- END BEGIN TAB 11-->

                         <!-- BEGIN TAB 12-->
                         <div class="tab-pane" id="tab12">
                            
                        <!-- END BEGIN TAB 12-->
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
        var table = $('#table_ds_hd');
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
         var table_ct = $('#table_ds_ct');
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
        $('#table_ds_qd').dataTable({
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