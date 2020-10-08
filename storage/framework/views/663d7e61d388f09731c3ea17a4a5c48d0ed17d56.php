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
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_congtac"><i class="fa fa-plus"></i> Tạo Công Tác Mới

                                        </a>
                                    </div>
                                    <?php endif; // app('laratrust')->can ?>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Công Tác</th>
                                    <th> Tên Giảng Viên</th>
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
                                        <td>
                                            <?php if(App\GiangVien::where('id', $v->id_giangvien)->first() !== null): ?>
                                            <?php echo e($v->giangviens->ten); ?>

                                            <?php endif; ?>

                                         </td>
                                        <td> <?php echo e($v->tiendo); ?> </td>
                                        <td> <?php echo e($v->thoigian); ?> </td>
                                        <td> </td>
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
                    <p> Không có Công Tác nào.
                        <?php if (app('laratrust')->can('create-giangvien')) : ?>
                        <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_congtac"><i class="fa fa-plus"></i> Tạo Công Tác</a></p>
                        <?php endif; // app('laratrust')->can ?>
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
                                    <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_chambai"><i class="fa fa-plus"></i> Tạo Chấm Bài Mới

                                        </a>
                                    </div>
                                    <?php endif; // app('laratrust')->can ?>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Giảng Viên</th>
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
                                        <?php if(App\GiangVien::where('id', $v->id_giangvien)->first() !== null): ?>
                                        <?php echo e($v->giangviens->ten); ?>

                                        <?php endif; ?>
                                        <td> <?php echo e($v->thoigian); ?> </td>
                                        <td> <?php echo e($v->ghichu); ?> </td>
                                        <td> </td>
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
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên </th>
                                    <th> Tên Giảng Viên</th>
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
                                        <?php if(App\GiangVien::where('id', $v->id_giangvien)->first() !== null): ?>
                                        <?php echo e($v->giangviens->ten); ?>

                                        <?php endif; ?>
                                        <td> <?php echo e($v->thoigian); ?> </td>
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
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
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
         <!-- BEGIN TAB 7-->
         <div class="tab-pane" id="tab7">
            <?php if($xaydung->isNotEmpty()): ?>
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_xaydung"><i class="fa fa-plus"></i> Tạo Xây Dựng Mới

                                        </a>
                                    </div>
                                    <?php endif; // app('laratrust')->can ?>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên </th>
                                    <th> Tên Giảng Viên</th>
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
                                        <?php if(App\GiangVien::where('id', $v->id_giangvien)->first() !== null): ?>
                                        <?php echo e($v->giangviens->ten); ?>

                                        <?php endif; ?>
                                        <td> <?php echo e($v->thoigian); ?> </td>
                                        <td> <?php echo e($v->ghichu); ?> </td>
                                        <td>
                                            <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                            <a data-xaydung-id="<?php echo e($v->id); ?>" class="btn_edit_xaydung btn btn-xs yellow-gold" href="#modal_edit_xaydung" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_xaydung btn btn-xs red-mint" href="#" data-xaydung-id="<?php echo e($v->id); ?>" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không có hoạt động Xây Dựng CHương Trình nào.
                        <?php if (app('laratrust')->can('create-giangvien')) : ?>
                        <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_xaydung"><i class="fa fa-plus"></i> Tạo XD Chương Trình Mới</a></p>
                        <?php endif; // app('laratrust')->can ?>
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
                                    <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_dotxuat"><i class="fa fa-plus"></i> Tạo CV Đột Xuất Mới

                                        </a>
                                    </div>
                                    <?php endif; // app('laratrust')->can ?>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên </th>
                                    <th> Tên Giảng Viên</th>
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
                                        <?php if(App\GiangVien::where('id', $v->id_giangvien)->first() !== null): ?>
                                        <?php echo e($v->giangviens->ten); ?>

                                        <?php endif; ?>
                                        <td> <?php echo e($v->thoigian); ?> </td>
                                        <td> <?php echo e($v->ghichu); ?> </td>
                                        <td>
                                            <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                            <a data-dotxuat-id="<?php echo e($v->id); ?>" class="btn_edit_dotxuat btn btn-xs yellow-gold" href="#modal_edit_dotxuat" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_dotxuat btn btn-xs red-mint" href="#" data-dotxuat-id="<?php echo e($v->id); ?>" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p>Không có Công Việc Đột Xuất nào.
                        <?php if (app('laratrust')->can('create-giangvien')) : ?>
                        <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_dotxuat"><i class="fa fa-plus"></i> Tạo Đột Xuất Mới</a></p>
                        <?php endif; // app('laratrust')->can ?>
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
                                    <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_sangkien"><i class="fa fa-plus"></i> Tạo Sáng Kiến Cải Tiến

                                        </a>
                                    </div>
                                    <?php endif; // app('laratrust')->can ?>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên </th>
                                    <th> Tên Giảng Viên</th>
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
                                        <?php if(App\GiangVien::where('id', $v->id_giangvien)->first() !== null): ?>
                                        <?php echo e($v->giangviens->ten); ?>

                                        <?php endif; ?>
                                        <td> <?php echo e($v->thoigian); ?> </td>
                                        <td> <?php echo e($v->ghichu); ?> </td>
                                        <td>
                                            <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                            <a data-sangkien-id="<?php echo e($v->id); ?>" class="btn_edit_sangkien btn btn-xs yellow-gold" href="#modal_edit_sangkien" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_sangkien btn btn-xs red-mint" href="#" data-sangkien-id="<?php echo e($v->id); ?>" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p>Không có Sáng Kiến Cải Tiến nào.
                        <?php if (app('laratrust')->can('create-giangvien')) : ?>
                        <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_sangkien"><i class="fa fa-plus"></i> Tạo Sáng Kiến Mới</a></p>
                        <?php endif; // app('laratrust')->can ?>
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
                                    <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_hoctap"><i class="fa fa-plus"></i> Tạo Học Tập Mới

                                        </a>
                                    </div>
                                    <?php endif; // app('laratrust')->can ?>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên </th>
                                    <th> Tên Giảng Viên</th>
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
                                        <?php if(App\GiangVien::where('id', $v->id_giangvien)->first() !== null): ?>
                                        <?php echo e($v->giangviens->ten); ?>

                                        <?php endif; ?>
                                        <td> <?php echo e($v->thoigian); ?> </td>
                                        <td> <?php echo e($v->ghichu); ?> </td>
                                        <td>
                                            <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                            <a data-hoctap-id="<?php echo e($v->id); ?>" class="btn_edit_hoctap btn btn-xs yellow-gold" href="#modal_edit_hoctap" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_hoctap btn btn-xs red-mint" href="#" data-hoctap-id="<?php echo e($v->id); ?>" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không tham gia Học Tập Nào nào.
                        <?php if (app('laratrust')->can('create-giangvien')) : ?>
                         <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_hoctap"><i class="fa fa-plus"></i> Tạo Học Tập Mới</a></p>
                        <?php endif; // app('laratrust')->can ?>
                </div>
            <?php endif; ?>
        </div>
        <!-- END TAB 10-->
          <!-- BEGIN TAB 11 KHÓA LUẬN-->
          <div class="tab-pane" id="tab11">
            <?php if($khoaluan->isNotEmpty()): ?>
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_khoaluan"><i class="fa fa-plus"></i> Thêm Khóa Luân

                                        </a>
                                    </div>
                                    <?php endif; // app('laratrust')->can ?>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_khoaluan">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th style="width: 20%;"> Tên Khóa Luận</th>
                                    <th> Hướng Dẫn</th>
                                    <th> Chủ Tịch Chấm</th>
                                    <th> Tham Gia Chấm</th>
                                    <th> Ghi Chú</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if( $khoaluan->count() > 0 ): ?>
                                    <?php $stt = 1; ?>
                                    <?php $__currentLoopData = $khoaluan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td> <?php echo e($stt); ?> </td>
                                        <td> <?php echo e($v->ten); ?> </td>
                                        <td>
                                            <?php
                                                $huongdan = json_decode( $v->huongdan, true);
                                            ?>
                                                <?php $__currentLoopData = $huongdan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                                <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?>  </p>
                                                <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td>
                                            <?php
                                                $chutichcham = json_decode( $v->chutichcham, true);
                                            ?>
                                                <?php $__currentLoopData = $chutichcham; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                                <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?>  </p>
                                                <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td>
                                            <?php
                                                $thamgiacham = json_decode( $v->thamgiacham, true);
                                            ?>
                                                <?php $__currentLoopData = $thamgiacham; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                                <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?>  </p>
                                                <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>

                                        <td> <?php echo e($v->ghichu); ?></td>
                                        <td>
                                            <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                            <a data-khoaluan-id="<?php echo e($v->id); ?>" class="btn_edit_khoaluan btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_khoaluan btn btn-xs red-mint" href="#" data-khoaluan-id="<?php echo e($v->id); ?>" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không có Khóa Luận nào.
                        <?php if (app('laratrust')->can('create-giangvien')) : ?>
                        <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_khoaluan"><i class="fa fa-plus"></i> Tạo Khóa Luận Mới</a>
                        <?php endif; // app('laratrust')->can ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>
        <!-- END TAB 11-->

         <!-- BEGIN TAB 12 LUẬN VĂN-->
         <div class="tab-pane" id="tab12">
            <?php if($luanvan->isNotEmpty()): ?>
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_luanvan"><i class="fa fa-plus"></i> Thêm Luận Văn

                                        </a>
                                    </div>
                                    <?php endif; // app('laratrust')->can ?>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_luanvan">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th style="width: 20%;"> Tên Luận Văn</th>
                                    <th> Hướng Dẫn</th>
                                    <th> Chủ Tịch Chấm</th>
                                    <th> Phản Biện Chấm</th>
                                    <th> Thư Ký Chấm</th>
                                    <th> Ủy Viên Chấm</th>
                                    <th> Ghi Chú</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if( $luanvan->count() > 0 ): ?>
                                    <?php $stt = 1; ?>
                                    <?php $__currentLoopData = $luanvan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td> <?php echo e($stt); ?> </td>
                                        <td> <?php echo e($v->ten); ?> </td>
                                        <td>
                                            <?php
                                                $huongdan = json_decode( $v->huongdan, true);
                                            ?>
                                                <?php $__currentLoopData = $huongdan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                                <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?>  </p>
                                                <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td>
                                        <?php
                                            $chutich = json_decode( $v->chutich, true);
                                        ?>
                                            <?php $__currentLoopData = $chutich; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                            <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?>  </p>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td>
                                            <?php
                                                $phanbien = json_decode( $v->phanbien, true);
                                            ?>
                                                <?php $__currentLoopData = $phanbien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                                <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?>  </p>
                                                <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td>
                                            <?php
                                                $thuky = json_decode( $v->thuky, true);
                                            ?>
                                                <?php $__currentLoopData = $thuky; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                                <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?>  </p>
                                                <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td>
                                            <?php
                                                $uyvien = json_decode( $v->uyvien, true);
                                            ?>
                                                <?php $__currentLoopData = $uyvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                                <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?>  </p>
                                                <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>

                                        <td> <?php echo e($v->ghichu); ?></td>
                                        <td>
                                            <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                            <a data-luanvan-id="<?php echo e($v->id); ?>" class="btn_edit_luanvan btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_luanvan btn btn-xs red-mint" href="#" data-luanvan-id="<?php echo e($v->id); ?>" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không có Luận Văn nào.
                        <?php if (app('laratrust')->can('create-giangvien')) : ?>
                        <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_luanvan"><i class="fa fa-plus"></i> Tạo Luận Văn Mới</a>
                        <?php endif; // app('laratrust')->can ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>
        <!-- END TAB 12-->

          <!-- BEGIN TAB 13 LUẬN ÁN-->
          <div class="tab-pane" id="tab13">
            <?php if($luanan->isNotEmpty()): ?>
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_luanan"><i class="fa fa-plus"></i> Thêm Luận Án

                                        </a>
                                    </div>
                                    <?php endif; // app('laratrust')->can ?>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_luanan">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th style="width: 20%;"> Tên Luận Án</th>
                                    <th> Hướng Dẫn</th>
                                    <th> Đọc và NX</th>
                                    <th> Chủ Tịch HT</th>
                                    <th> Thành Viên HT</th>
                                    <th> Chủ Tịch Chấm</th>
                                    <th> Thành Viên Chấm</th>
                                    <th> Cấp</th>
                                    <th> Ghi Chú</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if( $luanan->count() > 0 ): ?>
                                    <?php $stt = 1; ?>
                                    <?php $__currentLoopData = $luanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td> <?php echo e($stt); ?> </td>
                                        <td> <?php echo e($v->ten); ?> </td>
                                        <td>
                                            <p><?php echo e(($v->huongdanchinh) ? ($tengv = App\GiangVien::where('id', $v->huongdanchinh)->first()->ten) : ''); ?></p>
                                            <p><?php echo e(($v->huongdanphu) ? ($tengv = App\GiangVien::where('id', $v->huongdanphu)->first()->ten) : ''); ?></p>
                                        </td>
                                        <td>
                                            <?php
                                                $docnhanxet = json_decode( $v->docnhanxet, true);
                                            ?>
                                                <?php $__currentLoopData = $docnhanxet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                                <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?>  </p>
                                                <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td>
                                            <?php
                                                $chutichhoithao = json_decode( $v->chutichhoithao, true);
                                            ?>
                                                <?php $__currentLoopData = $chutichhoithao; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                                <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?>  </p>
                                                <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td>
                                            <?php
                                                $thanhvienhoithao = json_decode( $v->thanhvienhoithao, true);
                                            ?>
                                                <?php $__currentLoopData = $thanhvienhoithao; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                                <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?>  </p>
                                                <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td>
                                        <?php
                                            $chutichcham = json_decode( $v->chutichcham, true);
                                        ?>
                                            <?php $__currentLoopData = $chutichcham; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                                <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?>  </p>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td>
                                            <?php
                                                $thanhviencham = json_decode( $v->thanhviencham, true);
                                            ?>
                                                <?php $__currentLoopData = $thanhviencham; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                                <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?>  </p>
                                                <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>

                                        <td> <?php echo e($v->ghichu); ?></td>
                                        <td>
                                            <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                            <a data-luanan-id="<?php echo e($v->id); ?>" class="btn_edit_luanan btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_luanan btn btn-xs red-mint" href="#" data-luanan-id="<?php echo e($v->id); ?>" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không có Luận Án nào.
                        <?php if (app('laratrust')->can('create-giangvien')) : ?>
                        <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_luanan"><i class="fa fa-plus"></i> Tạo Luận Án Mới</a>
                        <?php endif; // app('laratrust')->can ?>
                         </p>
                </div>
            <?php endif; ?>
        </div>
        <!-- END TAB 13-->

          <!-- BEGIN TAB 14 NCS-->
          <div class="tab-pane" id="tab14">
            <?php if($ncs->isNotEmpty()): ?>
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_ncs"><i class="fa fa-plus"></i> Thêm Nghiên Cứu Sinh

                                        </a>
                                    </div>
                                    <?php endif; // app('laratrust')->can ?>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_ncs">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th style="width: 20%;"> Tên Nghiên Cứu</th>
                                    <th> Thành Viên</th>
                                    <th> Thư Ký</th>
                                    <th> Ghi Chú</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if( $ncs->count() > 0 ): ?>
                                    <?php $stt = 1; ?>
                                    <?php $__currentLoopData = $ncs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td> <?php echo e($stt); ?> </td>
                                        <td> <?php echo e($v->ten); ?> </td>
                                        <td>
                                            <?php
                                                $thanhvien = json_decode( $v->thanhvien, true);
                                            ?>
                                                <?php $__currentLoopData = $thanhvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                                <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?>  </p>
                                                <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td>
                                        <?php
                                            $thuky = json_decode( $v->thuky, true);
                                        ?>
                                            <?php $__currentLoopData = $thuky; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                            <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?>  </p>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td> <?php echo e($v->ghichu); ?></td>
                                        <td>
                                            <?php if (app('laratrust')->can('create-giangvien')) : ?>
                                            <a data-ncs-id="<?php echo e($v->id); ?>" class="btn_edit_ncs btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_ncs btn btn-xs red-mint" href="#" data-ncs-id="<?php echo e($v->id); ?>" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không có Nghiên Cứu Sinh nào.
                        <?php if (app('laratrust')->can('create-giangvien')) : ?>
                        <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_ncs"><i class="fa fa-plus"></i> Tạo Nghiên Cứu Sinh</a>
                        <?php endif; // app('laratrust')->can ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>
        <!-- END TAB 11-->
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn green"><i class="fa fa-save"></i> Lưu</button>
            </div>
        </div>
    </div>

</form>
<!-- -------------------------------------START NGHIÊN CỨU SINH EDIT -------------------------------------->
<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_edit_ncs" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="form_edit_ncs">
                <?php echo csrf_field(); ?>
                <input value="" name="id" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Chỉnh sửa Khóa Luận</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><b>Tên Nghiên Cứu Sinh:</b> <span class="required">*</span></label>
                                    <input  name="ten" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Thành Viên:</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" multiple name="thanhvien">
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
                                    <label class="control-label col-md-4">Thư Ký: </label>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" multiple name="thuky">
                                                <option value="0">-------- Chọn Giảng Viên --------</option>
                                                <?php if($giangvien->count()>0): ?>
                                                    <?php $__currentLoopData = $giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e((int)$v->id); ?>"><?php echo e($v->ten); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                </div>
                                <div class="form-group">
                                    <label><b>Ghi Chú:</b></label>
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
                    <a href="#" class="btn green" id="btn_edit_ncs"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- -------------------------------------END NGHIÊN CỨU SINH EDIT -------------------------------------->
<?php /**PATH C:\xampp\htdocs\lectureSchedule\resources\views/khac/edit/form.blade.php ENDPATH**/ ?>