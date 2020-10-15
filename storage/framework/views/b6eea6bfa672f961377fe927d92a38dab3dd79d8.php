<form action="<?php echo e(route('lop.edit.post', $lop->id)); ?>" method="post" id="form_sample_2" class="form-horizontal">
    <?php echo csrf_field(); ?>
    <div class="tab-content">
        <!-- BEGIN TAB 1-->
        <div class="tab-pane active" id="tab1">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">Mã Lớp:
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-file-code-o"></i>
                                    <input type="text" class="form-control" readonly name="malop" value="<?php echo e($lop->malop); ?>" required maxlength="191" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Tên Lớp:
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-building-o"></i>
                                    <input type="text" class="form-control" name="tenlop" value="<?php echo e($lop->tenlop); ?>" required maxlength="191" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Quy Mô:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="text" class="form-control" name="quymo" required maxlength="191" value="<?php echo e($lop->quymo); ?>" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Số Người:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <input type="number" step="any" class="form-control" name="songuoi" value="<?php echo e($lop->songuoi); ?>" /> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </div>
        </div>
        <!-- END TAB 1-->
        <!-- BEGIN TAB 2 NCKH-->
        <div class="tab-pane" id="tab2">
           
            <?php if($hocphan->isNotEmpty()): ?>
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_hocphan"><i class="fa fa-plus"></i> Tạo Học Phần
                                            
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Mã Học Phần</th>
                                    <th> Tên Học Phần</th>
                                    <th> Số Tiết</th>
                                    <th> Số Tín Chỉ</th>
                                    <th> Bắt Đầu</th>
                                    <th> Kết Thúc</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if( $hocphan->count() > 0 ): ?>
                                    <?php $stt = 1; ?>
                                    <?php $__currentLoopData = $hocphan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td> <?php echo e($stt); ?> </td>
                                        <td> <?php echo e($v->mahocphan); ?> </td>
                                        <td> <?php echo e($v->tenhocphan); ?> </td>
                                        <td> <?php echo e($v->sotiet); ?> </td>
                                        <td> <?php echo e($v->sotinchi); ?> </td>
                                        <td> <?php echo e($v->start); ?> </td>
                                        <td> <?php echo e($v->end); ?> </td>
                                        <td> 
                                            <?php if (app('laratrust')->can('read-hocphan')) : ?>
                                            <a class="btn btn-xs blue-sharp" href="<?php echo e(route('hocphan.read.get', $v->id)); ?>" title="Xem"> <i class="fa fa-eye"></i> Xem</a>
                                            <?php endif; // app('laratrust')->can ?>
                                            <a data-hocphan-id="<?php echo e($v->id); ?>" class="btn_edit_hocphan btn btn-xs yellow-gold" href="#modal_edit_hocphan" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_hocphan btn btn-xs red-mint" href="#" data-hocphan-id="<?php echo e($v->id); ?>" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Lớp này chưa có Học Phần nào. </p>
                </div>
            <?php endif; ?>
        </div>
        <!-- END TAB 2-->
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn green"><i class="fa fa-save"></i> Lưu</button>
            </div>
        </div>
    </div>

</form>
<?php echo $__env->make('hocphan.modals.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('hocphan.modals.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/lop/edit/form.blade.php ENDPATH**/ ?>