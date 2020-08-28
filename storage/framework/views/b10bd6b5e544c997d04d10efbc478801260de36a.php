<form action="<?php echo e(route('giangvien.edit.post', $giangvien->id)); ?>" method="post" id="form_sample_2" class="form-horizontal">
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
                            <label class="control-label col-md-4">Địa Chỉ:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-phone"></i>
                                    <input type="text" class="form-control" name="diachi" value="<?php echo e($giangvien->diachi); ?>" /> </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="col-md-6">
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
                    <p> Giảng Viên này không tham gia hoạt động Đảng/Đoàn nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_dang"><i class="fa fa-plus"></i> Tạo Chấm Bài</a></p>
                </div>
            <?php endif; ?>
        </div>
        <!-- END TAB 5-->

          <!-- BEGIN TAB 7-->
          <div class="tab-pane" id="tab7">
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
                                <?php if( $daygioi->count() > 0 ): ?>
                                    <?php $stt = 1; ?>
                                    <?php $__currentLoopData = $daygioi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td> <?php echo e($stt); ?> </td>
                                        <td> <?php echo e($v->ten); ?> </td>
                                        <td> <?php echo e($v->thoigian); ?> </td>
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
                    <p> Giảng Viên này không có Sáng Kiến Cải Tiến nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_sangkien"><i class="fa fa-plus"></i> Tạo Đột Xuất</a></p>
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
                    <p> Giảng Viên này không tham gia Học Tập Nào nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_hoctap"><i class="fa fa-plus"></i> Tạo Đột Xuất</a></p>
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
<?php /**PATH C:\xampp\htdocs\lectureSchedule\resources\views/giangvien/edit/form.blade.php ENDPATH**/ ?>