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
                                    <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_congtac"><i class="fa fa-plus"></i> Tạo Đi Thực Tế Mới

                                        </a>
                                    </div>
                                    <?php endif; // app('laratrust')->can ?>
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
                                            <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                            <a data-congtac-id="<?php echo e($v->id); ?>" class="btn_edit_congtac btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_congtac btn btn-xs red-mint" href="#" data-congtac-id="<?php echo e($v->id); ?>" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không có Đi Thưc Tế nào.
                        <?php if (app('laratrust')->can('create-giangvien')) : ?>
                        <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_congtac"><i class="fa fa-plus"></i> Tạo Đi Thực Tế</a></p>
                        <?php endif; // app('laratrust')->can ?>
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
                                    <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_hop"><i class="fa fa-plus"></i> Tạo Cuộc Họp Mới

                                        </a>
                                    </div>
                                    <?php endif; // app('laratrust')->can ?>
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
                                    <th> Bắt Đầu</th>
                                    <th> Kết Thúc</th>
                                    <th> Giờ Giảng</th>
                                    <th> Giờ Khoa Học</th>
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
                                        <td> <?php echo e($v->batdau); ?> </td>
                                        <td> <?php echo e($v->ketthuc); ?> </td>
                                        <td> <?php echo e($v->giogiang); ?> </td>
                                        <td> <?php echo e($v->giokhoahoc); ?> </td>
                                        <td> <?php echo e($v->ghichu); ?> </td>
                                        <td>
                                            <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                            <a data-hop-id="<?php echo e($v->id); ?>" class="btn_edit_hop btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_hop btn btn-xs red-mint" href="#" data-hop-id="<?php echo e($v->id); ?>" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không có Cuộc Họp  nào.
                        <?php if (app('laratrust')->can('create-giangvien')) : ?>
                        <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_hop"><i class="fa fa-plus"></i> Tạo Cuộc Họp</a></p>
                        <?php endif; // app('laratrust')->can ?>
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
                                    <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_hdkh"><i class="fa fa-plus"></i> Tạo Hướng Dẫn Khoa Học Mới

                                        </a>
                                    </div>
                                    <?php endif; // app('laratrust')->can ?>
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
                                            <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                            <a data-hdkh-id="<?php echo e($v->id); ?>" class="btn_edit_hdkh btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_hdkh btn btn-xs red-mint" href="#" data-hdkh-id="<?php echo e($v->id); ?>" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không có Cuộc Họp  nào.
                        <?php if (app('laratrust')->can('create-giangvien')) : ?>
                        <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_hdkh"><i class="fa fa-plus"></i> Tạo Hướng Dẫn Khoa Học Mới </a></p>
                        <?php endif; // app('laratrust')->can ?>
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
                                    <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_chambai"><i class="fa fa-plus"></i> Tạo Chấm Bài Mới

                                        </a>
                                    </div>
                                    <?php endif; // app('laratrust')->can ?>
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
                                            <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                            <a data-chambai-id="<?php echo e($v->id); ?>" class="btn_edit_chambai btn btn-xs yellow-gold" href="#modal_edit_chambai" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_chambai btn btn-xs red-mint" href="#" data-chambai-id="<?php echo e($v->id); ?>" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không có Chấm Bài nào.
                        <?php if (app('laratrust')->can('create-giangvien')) : ?>
                        <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_chambai"><i class="fa fa-plus"></i> Tạo Chấm Bài</a></p>
                        <?php endif; // app('laratrust')->can ?>
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
                                    <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_daygioi"><i class="fa fa-plus"></i> Tạo Dạy Giỏi Mới

                                        </a>
                                    </div>
                                    <?php endif; // app('laratrust')->can ?>
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
                    <p> Không có hoạt động Dạy Giỏi nào.
                        <?php if (app('laratrust')->can('create-giangvien')) : ?>
                        <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_daygioi"><i class="fa fa-plus"></i> Tạo Dạy Giỏi Mới</a></p>
                        <?php endif; // app('laratrust')->can ?>
                </div>
            <?php endif; ?>
        </div>
        <!-- END TAB 7-->
         <!-- BEGIN TAB 10-->
         
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
<?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/khac/edit/form.blade.php ENDPATH**/ ?>