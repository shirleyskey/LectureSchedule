<form action="<?php echo e(route('bai.edit.post', $bai->id)); ?>" method="post" id="form_sample_2" class="form-horizontal">
    <?php echo csrf_field(); ?>
    <div class="tab-content">
        <!-- BEGIN TAB 1-->
        <div class="tab-pane active" id="tab1">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">Tên Bài:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" name="tenbai" value="<?php echo e($bai->tenbai); ?>" required /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Tên Học Phần:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="text" class="form-control" name="id_hocphan" value="<?php echo e($bai->hocphans->id); ?>" hidden/> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Tên Lớp:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="text" class="form-control" name="tenhocphan" readonly value="<?php echo e($bai->hocphans->lops->tenlop); ?>" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Số Tiết:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="number" class="form-control" name="sotiet" value="<?php echo e($bai->sotiet); ?>" /> </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Giảng Viên Chính:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-phone"></i>
                                    <select class="form-control" name="gvchinh">
                                        <option value="<?php echo e(($bai->gvchinh) ? $bai->gvchinh : null); ?>"><?php echo e(($bai->gvchinh) ? $bai->giangvienchinhs->ten : ''); ?></option>
                                            <?php if($ds_giangvien->count()>0): ?>
                                                <?php $__currentLoopData = $ds_giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($v->id); ?>" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>><?php echo e($v->ten); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                    </select>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Giảng Viên Phụ:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-phone"></i>
                                    <select class="form-control" name="gvphu" multiple>
                                        <option value="<?php echo e(($bai->gvphu) ? $bai->gvphu : null); ?>"><?php echo e(($bai->gvchinh) ? $bai->giangvienchinhs->ten : ''); ?></option>
                                            <?php if($ds_giangvien->count()>0): ?>
                                                <?php $__currentLoopData = $ds_giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($v->id); ?>" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>><?php echo e($v->ten); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                    </select>
                            </div>
                        </div>
                        </div>

                       
                    </div>
                    </div>
                    <div class="col-md-6">
                      
                    </div>
                </div>
            </div>
        </div>
        <!-- END TAB 1-->
        <div class="form-actions">
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn green"><i class="fa fa-save"></i> Lưu</button>
                </div>
            </div>
        </div>
        <!-- BEGIN TAB 2 NCKH-->
        <ul class="nav nav-pills" id="">
            <li  class="active">
                <a href="" data-toggle="">Danh Sách Tiết Học</a>
            </li>
        </ul>
        <div class="" id="">
            <?php if($tiet->isNotEmpty()): ?>
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_tiet">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Thời Gian</th>
                                    <th> Buổi </th>
                                    <th> Ca</th>
                                    <th> Tên Giảng Viên</th>
                                    <th> Hành Động</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php if( $tiet->count() > 0 ): ?>
                                    <?php $stt = 1; ?>
                                    <?php $__currentLoopData = $tiet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td> <?php echo e($stt); ?> </td>
                                        <td> <?php echo e($v->thoigian); ?> </td>
                                        <td> <?php echo e($v->buoi); ?> </td>
                                        <td> <?php echo e($v->ca); ?> </td>
                                        <td> <?php echo e(($v->id_giangvien) ? $v->giangviens->ten : ''); ?> </td>
                                        <td>
                                            <a class="btn btn-xs yellow-gold" href="<?php echo e(route('lichgiang.lichgiangtuan.get', $v->id)); ?>" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
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
                    <p> Bài Học này chưa có tiết học nào. </p>
                </div>
            <?php endif; ?>
        </div>
        <!-- END TAB 2-->
    </div>
   

</form>
<?php echo $__env->make('tiet.modals.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('tiet.modals.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/bai/edit/form.blade.php ENDPATH**/ ?>