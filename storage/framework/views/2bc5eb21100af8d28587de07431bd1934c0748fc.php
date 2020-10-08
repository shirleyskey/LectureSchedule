<form action="<?php echo e(route('hocphan.edit.post', $hocphan->id)); ?>" method="post" id="form_sample_2" class="form-horizontal">
    <?php echo csrf_field(); ?>
    <div class="tab-content">
        <!-- BEGIN TAB 1-->
        <div class="tab-pane active" id="tab1">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">Mã Học Phần:
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" name="mahocphan" value="<?php echo e($hocphan->mahocphan); ?>" required /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Tên Học Phần:
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" name="tenhocphan" value="<?php echo e($hocphan->tenhocphan); ?>" required /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Lớp:
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" readonly name="tenlop" value="<?php echo e($hocphan->lops->tenlop); ?>" required /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Số Tiết:
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="number" class="form-control" name="sotiet" required value="<?php echo e($hocphan->sotiet); ?>" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Số Tín Chỉ:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="number" step="any" class="form-control" name="sotinchi" value="<?php echo e($hocphan->sotinchi); ?>" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Số Bài:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="number" step="any" class="form-control" name="sobai" value="<?php echo e($hocphan->sobai); ?>" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Ngày Bắt Đầu:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="date" class="form-control" name="sobai" value="<?php echo e($hocphan->start); ?>" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Ngày Kết Thúc:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="date" class="form-control" name="sobai" value="<?php echo e($hocphan->end); ?>" /> </div>
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
        <ul class="nav nav-pills">
            <li class="active">
                <a  href="" data-toggle="" >Danh Sách Bài Học</a>
            </li>
        </ul>
        <div id="tab2">
            <?php if($bai->isNotEmpty()): ?>
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_bai">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Bài</th>
                                    <th> Số Tiết</th>
                                    <th> GV Chính</th>
                                    <th> GV Tham Gia</th>
                                    <th> LýT GVC</th>
                                    <th> Xemina GVC</th>
                                    <th> Th/TL GVC</th>
                                    <th> LýT TrG</th>
                                    <th> Xemina TrG</th>
                                    <th> TH/TL TrG</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if( $bai->count() > 0 ): ?>
                                    <?php $stt = 1; ?>
                                    <?php $__currentLoopData = $bai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td> <?php echo e($stt); ?> </td>
                                        <td> <?php echo e($v->tenbai); ?> </td>
                                        <td> <?php echo e($v->sotiet); ?> </td>
                                        <td> <?php echo e(($v->gvchinh) ? ($v->giangvienchinhs->ten) : ''); ?> </td>
                                        <td> <?php echo e(($v->gvphu) ? ($v->giangvienphus->ten) : ''); ?> </td>
                                        <td> <?php echo e($v->lythuyet); ?> </td>
                                        <td> <?php echo e($v->xemina); ?> </td>
                                        <td> <?php echo e($v->thuchanh); ?> </td>
                                        <td> <?php echo e($v->lythuyet_phu); ?> </td>
                                        <td> <?php echo e($v->xemina_phu); ?> </td>
                                        <td> <?php echo e($v->thuchanh_phu); ?> </td>
                                        <td>
                                        <a  class="btn_edit_bai btn btn-xs yellow-gold" data-bai-id="<?php echo e($v->id); ?>" href="<?php echo e(route('bai.edit.get', $v->id)); ?>" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                        <a class="btn_delete_bai btn btn-xs red-mint" data-bai-id="<?php echo e($v->id); ?>" href="<?php echo e(route('bai.delete.get', $v->id)); ?>"  title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Học Phần này chưa có bài học nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_bai"><i class="fa fa-plus"></i> Tạo Bài Học Mới</a></p>
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
<?php echo $__env->make('bai.modals.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('bai.modals.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\lectureSchedule\resources\views/hocphan/edit/form.blade.php ENDPATH**/ ?>