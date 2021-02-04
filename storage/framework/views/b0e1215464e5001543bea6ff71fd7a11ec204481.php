<form action="<?php echo e(route('khac.edit.get')); ?>" method="post" id="form_sample_2" class="form-horizontal">
    <?php echo csrf_field(); ?>
    <div class="tab-content">
         <!-- BEGIN XỬ LÝ VĂN BẢN-->
         <div class="tab-pane active" id="tab_vanban">
            <?php if($vanban->isNotEmpty()): ?>
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_vanban"><i class="fa fa-plus"></i> Thêm Mới Văn Bản Xử Lý

                                        </a>
                                    </div>
                                    <?php endif; // app('laratrust')->can ?>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="ds_vanban">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Nội Dung</th>
                                    <th> Tên Giảng Viên</th>
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
                                        <td>
                                            <?php if(App\GiangVien::where('id', $v->id_giangvien)->first() !== null): ?>
                                            <?php echo e($v->giangviens->ten); ?>

                                            <?php endif; ?>

                                         </td>
                                        <td> <?php echo e($v->lanhdao); ?> </td>
                                         <td> <?php echo e($v->thoigian_nhan); ?> </td>
                                         <td> <?php echo e($v->thoigian_den); ?> </td>
                                         <td> <?php echo e($v->ghichu); ?> </td>
                                        <td>
                                            <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                            <a data-vanban-id="<?php echo e($v->id); ?>" class="btn_edit_vanban btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_vanban btn btn-xs red-mint" href="#" data-vanban-id="<?php echo e($v->id); ?>" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không có Văn Bản nào.
                        <?php if (app('laratrust')->can('create-giangvien')) : ?>
                        <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_vanban"><i class="fa fa-plus"></i> Thêm Văn Bản Xử Lý</a></p>
                        <?php endif; // app('laratrust')->can ?>
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
                                    <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_dang"><i class="fa fa-plus"></i> Tạo Hoạt Động Mới

                                        </a>
                                    </div>
                                    <?php endif; // app('laratrust')->can ?>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="ds_dang">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Nội Dung </th>
                                    <th> Tên Giảng Viên</th>
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
                                        <td>
                                        <?php if(App\GiangVien::where('id', $v->id_giangvien)->first() !== null): ?>
                                        <?php echo e($v->giangviens->ten); ?>

                                        <?php endif; ?>
                                        </td>
                                        <td> <?php echo e($v->ket_qua); ?> </td>
                                        <td> <?php echo e($v->vai_tro); ?> </td>
                                        <td> <?php echo e($v->thoigian); ?> </td>
                                        <td> <?php echo e($v->ghichu); ?> </td>
                                        <td>
                                            <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                            <a data-dang-id="<?php echo e($v->id); ?>" class="btn_edit_dang btn btn-xs yellow-gold" href="#modal_edit_dang" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_dang btn btn-xs red-mint" href="#" data-dang-id="<?php echo e($v->id); ?>" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không tham gia hoạt động Đảng/Đoàn nào.
                        <?php if (app('laratrust')->can('create-giangvien')) : ?>
                        <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_dang"><i class="fa fa-plus"></i> Tạo Hoạt Động</a></p>
                        <?php endif; // app('laratrust')->can ?>
                </div>
            <?php endif; ?>
        </div>
        <!-- END TAB 5-->

         
         <!-- BEGIN TAB 7-->
         
        <!-- END TAB 7-->
        
    </div>
  

</form>
<?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/khac/edit/form_notgio.blade.php ENDPATH**/ ?>