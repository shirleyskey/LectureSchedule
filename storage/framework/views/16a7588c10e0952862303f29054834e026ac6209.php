<form action="<?php echo e(route('profile.edit.post', $giangvien->id)); ?>" method="post" id="form_sample_2" class="form-horizontal">
    <?php echo csrf_field(); ?>
    <div class="tab-content">
        <!-- BEGIN TAB 1-->
        <div class="tab-pane active" id="tab1">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-6">
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
                                    <i class="fa fa-home"></i>
                                    <input type="text" class="form-control" name="chucvu" required maxlength="191" value="<?php echo e($giangvien->chucvu); ?>" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Hệ Số Lương:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="number" step="any" class="form-control" name="hesoluong" value="<?php echo e($giangvien->hesoluong); ?>" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Địa Chỉ:
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
                                    <i class="fa fa-envelope"></i>
                                    <input type="text" class="form-control" name="chucdanh" value="<?php echo e($giangvien->chucdanh); ?>" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Trình Độ:</label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-envelope"></i>
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
                    </div>
                    <div class="col-md-6">
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
                    <p> Không có giờ giảng nào!</p>
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
                                <th> STT</th>
                                <th> Tên Khóa Luận</th>
                                <th> Vai Trò</th>
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
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_congtac"><i class="fa fa-plus"></i> Tạo Công Tác Mới

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Công Tác</th>
                                    <th> Tiến Độ</th>
                                    <th> Thời Gian</th>
                                    <th> Số Giờ</th>
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
                                        <td> <?php echo e($v->tiendo); ?> </td>
                                        <td> <?php echo e($v->thoigian); ?> </td>
                                        <td> </td>
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
                    <p> Giảng Viên này không có Công Tác nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_congtac"><i class="fa fa-plus"></i> Tạo Công Tác</a></p>
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
                                    <th> Thời Gian</th>
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
                                        <td> <?php echo e($v->thoigian); ?> </td>
                                        <td> <?php echo e($v->ghichu); ?> </td>
                                        <td> </td>
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
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên </th>
                                    <th> Thời Gian</th>
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
                                        <td> <?php echo e($v->thoigian); ?> </td>
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
                    <p> Giảng Viên này không tham gia hoạt động Đảng/Đoàn nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_dang"><i class="fa fa-plus"></i> Tạo Mới Hoạt Động</a></p>
                </div>
            <?php endif; ?>
        </div>
        <!-- END TAB 5-->

          <!-- BEGIN TAB 7-->
          <div class="tab-pane" id="tab7">
            <?php if(!empty($daygioi)): ?>
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                 <!-- BEGIN EXAMPLE TABLE PORTLET-->
                 <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên </th>
                                    <th> Tên Giảng Viên</th>
                                    <th> Thành Viên</th>
                                    <th> Cấp</th>
                                    <th> Đạt Bài Dạy Giỏi</th>
                                    <th> Thời Gian</th>
                                    <th> Ghi Chú</th>
                                    <th> Số Giờ</th>
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
                                        <?php if(App\GiangVien::where('id', $v->id_giangvien)->first() !== null): ?>
                                        <?php echo e($v->giangviens->ten); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php
                                            $thanhvien = json_decode( $v->thanhvien, true);
                                        ?>
                                            <?php $__currentLoopData = $thanhvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                            <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?> </p>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
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
                                    <td> <?php echo e(($v->dat == 1) ? 'Đạt' : 'Không Đạt'); ?> </td>
                                    <td> <?php echo e($v->thoigian); ?> </td>
                                    <td> <?php echo e($v->ghichu); ?> </td>
                                    <td>
                                        <?php
                                         $thanhvien = json_decode( $v->thanhvien, true);
                                         $daygioi_gio = 0;
                                        if(in_array($giangvien->id, $thanhvien)){
                                            if($v->cap == 1){
                                                $daygioi_gio += 1;
                                            }
                                            if($v->cap == 2){
                                                $daygioi_gio += 2;
                                            }
                                            if($v->cap == 3){
                                                $daygioi_gio += 3;
                                            }
                                                };
                                            if($v->dat == 1){
                                                if($v->cap == 1){
                                                $daygioi_gio += 4;
                                            }
                                            if($v->cap == 2){
                                                $daygioi_gio += 6;
                                            }
                                            if($v->cap == 3){
                                                $daygioi_gio += 8;
                                            } };


                                        ?>
                                    <?php echo e($daygioi_gio); ?> giờ
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
                <!-- END EXAMPLE TABLE PORTLET-->
            <?php else: ?>
                <div class="alert alert-danger" style="margin-bottom: 0px;">
                    <p> Giảng Viên này không có hoạt động Dạy Giỏi nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_daygioi"><i class="fa fa-plus"></i> Tạo Dạy Giỏi</a></p>
                </div>
            <?php endif; ?>
        </div>
        <!-- END TAB 7-->

           <!-- BEGIN TAB 8-->
           <div class="tab-pane" id="tab8">
            <?php if($dotxuat->isNotEmpty()): ?>
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_dotxuat"><i class="fa fa-plus"></i> Tạo CV Đột Xuất Mới

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên </th>
                                    <th> Thời Gian</th>
                                    <th> Ghi Chú</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if( $dotxuat->count() > 0 ): ?>
                                    <?php $stt = 1; ?>
                                    <?php $__currentLoopData = $dotxuat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td> <?php echo e($stt); ?> </td>
                                        <td> <?php echo e($v->ten); ?> </td>
                                        <td> <?php echo e($v->thoigian); ?> </td>
                                        <td> <?php echo e($v->ghichu); ?> </td>
                                        <td>
                                            <a data-dotxuat-id="<?php echo e($v->id); ?>" class="btn_edit_dotxuat btn btn-xs yellow-gold" href="#modal_edit_dotxuat" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_dotxuat btn btn-xs red-mint" href="#" data-dotxuat-id="<?php echo e($v->id); ?>" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Giảng Viên này không có Công Việc Đột Xuất nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_dotxuat"><i class="fa fa-plus"></i> Tạo Đột Xuất</a></p>
                </div>
            <?php endif; ?>
        </div>
        <!-- END TAB 8-->
         <!-- BEGIN TAB 9-->
         <div class="tab-pane" id="tab9">
            <?php if($sangkien->isNotEmpty()): ?>
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_sangkien"><i class="fa fa-plus"></i> Tạo Sáng Kiến Cải Tiến

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên </th>
                                    <th> Thời Gian</th>
                                    <th> Ghi Chú</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if( $sangkien->count() > 0 ): ?>
                                    <?php $stt = 1; ?>
                                    <?php $__currentLoopData = $sangkien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td> <?php echo e($stt); ?> </td>
                                        <td> <?php echo e($v->ten); ?> </td>
                                        <td> <?php echo e($v->thoigian); ?> </td>
                                        <td> <?php echo e($v->ghichu); ?> </td>
                                        <td>
                                            <a data-sangkien-id="<?php echo e($v->id); ?>" class="btn_edit_sangkien btn btn-xs yellow-gold" href="#modal_edit_sangkien" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_sangkien btn btn-xs red-mint" href="#" data-sangkien-id="<?php echo e($v->id); ?>" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Giảng Viên này không có Sáng Kiến Cải Tiến nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_sangkien"><i class="fa fa-plus"></i> Tạo Sáng Kiến Cải Tiến Mới</a></p>
                </div>
            <?php endif; ?>
        </div>
        <!-- END TAB 9-->
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
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên </th>
                                    <th> Thời Gian</th>
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
                                        <td> <?php echo e($v->thoigian); ?> </td>
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
                    <p> Giảng Viên này không tham gia Học Tập Nào nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_hoctap"><i class="fa fa-plus"></i> Tạo Học Tập Mới</a></p>
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
<?php echo $__env->make('dotxuat.modals.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dotxuat.modals.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('sangkien.modals.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('sangkien.modals.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('hoctap.modals.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('hoctap.modals.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\lectureSchedule\resources\views/user/edit/form.blade.php ENDPATH**/ ?>