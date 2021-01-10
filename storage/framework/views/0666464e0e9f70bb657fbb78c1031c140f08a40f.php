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
                                                    <?php 
                                                        $stt = 1; 
                                                        $tongtiet = 0;
                                                    ?>
                                                    <?php $__currentLoopData = $hocphan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_hocphan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php 
                                                        $id_giangvien = $giangvien->id;
                                                        $id_hocphan = $v_hocphan->id;
                                                        $tiet = 0;
                                                        $is_tiet = App\Tiet::where('id_hocphan', $id_hocphan)->where('id_giangvien', $id_giangvien)->first();
                                                        if($is_tiet){
                                                            $tiet_hocphans = App\Tiet::where('id_hocphan', $id_hocphan)->where('id_giangvien', $id_giangvien)->get();
                                                            foreach($tiet_hocphans as $v_tiet_hocphan){
                                                                $tiet += 2;
                                                            }
                                                           echo "<tr>"
                                                                ."<td>"."$stt"."</td>"
                                                                ."<td>"."{$v_hocphan->tenhocphan}"."</td>"
                                                                ."<td>"."{$v_hocphan->lops->tenlop}"."</td>"
                                                                ."<td>"."{$v_hocphan->lops->he}"."</td>"
                                                                ."<td>"."{$v_hocphan->lops->quymo}"."</td>"
                                                                ."<td>"."$tiet"."</td>"
                                                           ."</tr>";
                                                   
                                                        }
                                                        $tongtiet += $tiet;
                                                    ?> 
                                                   
                                                    <?php $stt++; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                    <td colspan="5"> <p> <b>Tổng Tiết: </b> </p></td>
                                                    <td> <?php echo e($tongtiet); ?></td>
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


<?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/user/edit/form_gio.blade.php ENDPATH**/ ?>