<form action="<?php echo e(route('bai.edit.post', $bai->id)); ?>" method="post" id="form_sample_2" class="form-horizontal">
    <?php echo csrf_field(); ?>
    <div class="tab-content">
        <!-- BEGIN TAB 1-->
        <!-- <div class="tab-pane active" id="tab1">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-6">
                        
                    </div>
                    <div class="col-md-6">
                      
                    </div>
                </div>
            </div>
        </div> -->
        <!-- END TAB 1-->
        <!-- <div class="form-actions">
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn green"><i class="fa fa-save"></i> Lưu</button>
                </div>
            </div>
        </div> -->
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
                                   <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_tiet"><i class="fa fa-plus"></i> Tạo Tiết Học
                                            
                                        </a>
                                    </div> 
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
                                            <a class="btn_edit_tiet btn btn-xs yellow-gold" data-tiet-id="<?php echo e($v->id); ?>" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_tiet btn btn-xs red-mint" data-tiet-id="<?php echo e($v->id); ?>" href=""  title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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