<?php $__env->startSection('title', 'Bảng điều khiển'); ?>

<?php $__env->startSection('content'); ?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <span>Bảng điều khiển</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> <strong>Bảng điều khiển</strong>
            <small>Thông Báo Đến Hạn</small>
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 box_gio">
                         <?php if($vanban->isNotEmpty()): ?>
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered deadline deadline-vanban">
                    <div class="portlet-body">
                        <?php if (app('laratrust')->can('create-giangvien')) : ?>
                        <div class="table-toolbar">
                            <div class="row">
                                <p class=""><i class="fa fa-book" aria-hidden="true" style="color: #ec0101; opacity: 0.5;"></i>Xử Lý Văn Bản</p>
                            </div>
                        </div>
                        <?php endif; // app('laratrust')->can ?>
                        <table class="table table-striped table-hover table-bordered" id="ds_giangvien">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Công Việc</th>
                                    <th> Giảng Viên Xử Lý </th>
                                    <th> Hạn</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php if($vanban->count() > 0 ): ?>
                                    <?php $stt = 1; ?>
                                    <?php $__currentLoopData = $vanban; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <tr>
                                        <td> <?php echo e($stt); ?> </td>
                                        <td> <?php echo e($v->noi_dung); ?> </td>
                                        <td> <?php echo e($v->giangviens->ten); ?> </td>
                                        <td> 
                                             <a class="btn_edit_congtac btn btn-xs yellow-gold" > <i class="fa fa-edit"></i> 1 Ngày </a>
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
                 <?php endif; ?>
                    </div>

                    <div class="col-md-12">
                         <?php if($hop->isNotEmpty()): ?>
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered deadline deadline-hop">
                    <div class="portlet-body">
                        <?php if (app('laratrust')->can('create-giangvien')) : ?>
                        <div class="table-toolbar">
                            <div class="row">
                                <p class=""> <i style="color: aqua; opacity: 0.5;" class="fa fa-briefcase "></i>Họp</p>
                            </div>
                        </div>
                        <?php endif; // app('laratrust')->can ?>
                        <table class="table table-striped table-hover table-bordered" id="ds_giangvien">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Công Việc</th>
                                    <th> Giảng Viên </th>
                                    <th> Hạn</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php if($hop->count() > 0 ): ?>
                                    <?php $stt = 1; ?>
                                    <?php $__currentLoopData = $hop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <tr>
                                        <td> <?php echo e($stt); ?> </td>
                                        <td> <?php echo e($v->ten); ?> </td>
                                         <td> <?php echo e($v->giangviens->ten); ?> </td>
                                        <td> 
                                             <a class="btn_edit_congtac btn btn-xs yellow-gold" > <i class="fa fa-edit"></i> 1 Ngày </a>
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
                 <?php endif; ?>
                    </div>

                    <div class="col-md-12">
                        <?php if($xaydung->isNotEmpty()): ?>
               <!-- BEGIN EXAMPLE TABLE PORTLET-->
               <div class="portlet light portlet-fit bordered deadline deadline-xaydung">
                   <div class="portlet-body">
                       <?php if (app('laratrust')->can('create-giangvien')) : ?>
                       <div class="table-toolbar">
                           <div class="row">
                               <p class=""> <i style="color: aqua; opacity: 0.5;" class="fa fa-briefcase "></i>Xây Dựng Chương Trình</p>
                           </div>
                       </div>
                       <?php endif; // app('laratrust')->can ?>
                       <table class="table table-striped table-hover table-bordered" id="ds_giangvien">
                           <thead>
                               <tr>
                                   <th> STT</th>
                                   <th> Tên Công Việc</th>
                                   <th> Giảng Viên </th>
                                   <th> Hạn</th>
                               </tr>
                           </thead>
                           <tbody>
                                <?php if($xaydung->count() > 0 ): ?>
                                   <?php $stt = 1; ?>
                                   <?php $__currentLoopData = $xaydung; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                       <td> <?php echo e($stt); ?> </td>
                                       <td> <?php echo e($v->ten); ?> </td>
                                        <td> <?php echo e($v->giangviens->ten); ?> </td>
                                       <td> 
                                            <a class="btn_edit_congtac btn btn-xs yellow-gold" > <i class="fa fa-edit"></i> 1 Ngày </a>
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
                <?php endif; ?>
                   </div>

                    <div class="col-md-12">
                         <?php if($dang->isNotEmpty()): ?>
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered deadline deadline-dang">
                    <div class="portlet-body">
                        <?php if (app('laratrust')->can('create-giangvien')) : ?>
                        <div class="table-toolbar">
                            <div class="row">
                                <p class=""><i class="fa fa-building-o" style="color: aqua; opacity: 0.5;"></i>Hoạt Động Đảng/Đoàn</p>
                            </div>
                        </div>
                        <?php endif; // app('laratrust')->can ?>
                        <table class="table table-striped table-hover table-bordered" id="ds_giangvien">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Công Việc</th>
                                    <th> Giảng Viên Tham Gia </th>
                                    <th> Hạn</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php if($dang->count() > 0 ): ?>
                                    <?php $stt = 1; ?>
                                    <?php $__currentLoopData = $dang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <tr>
                                        <td> <?php echo e($stt); ?> </td>
                                        <td> <?php echo e($v->ten); ?> </td>
                                        <td> <?php echo e($v->giangviens->ten); ?> </td>
                                       <td> 
                                             <a class="btn_edit_congtac btn btn-xs yellow-gold" > <i class="fa fa-edit"></i> 1 Ngày </a>
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
                 <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">

                         <?php if($congtac->isNotEmpty()): ?>
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered deadline deadline-congtac">
                    <div class="portlet-body">
                        <?php if (app('laratrust')->can('create-giangvien')) : ?>
                        <div class="table-toolbar">
                            <div class="row">
                                <p class=""><i style="color: #ffc93c; opacity: 0.8;" class="fa fa-tachometer" aria-hidden="true"></i>Đi Thực Tế</p>
                            </div>
                        </div>
                        <?php endif; // app('laratrust')->can ?>
                        <table class="table table-striped table-hover table-bordered" id="ds_giangvien">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Công Việc</th>
                                    <th> Giảng Viên </th>
                                    <th> Hạn</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php if($congtac->count() > 0 ): ?>
                                    <?php $stt = 1; ?>
                                    <?php $__currentLoopData = $congtac; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <tr>
                                        <td> <?php echo e($stt); ?> </td>
                                       <td> <?php echo e($v->ten); ?> </td>
                                        <td> <?php echo e($v->giangviens->ten); ?> </td>
                                       <td> 
                                             <a class="btn_edit_congtac btn btn-xs yellow-gold" > <i class="fa fa-edit"></i> 1 Ngày </a>
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
                 <?php endif; ?>
                    </div>

                    <div class="col-md-12">
                          <?php if($daygioi->isNotEmpty()): ?>
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered deadline deadline-daygioi">
                    <div class="portlet-body">
                        <?php if (app('laratrust')->can('create-giangvien')) : ?>
                        <div class="table-toolbar">
                            <div class="row">
                                <p class=""><i class="fa fa-star-half-o" style="color: #ffc93c; opacity: 0.8;" aria-hidden="true"></i>Dạy Giỏi</p>
                            </div>
                        </div>
                        <?php endif; // app('laratrust')->can ?>
                        <table class="table table-striped table-hover table-bordered" id="ds_giangvien">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Công Việc</th>
                                    <th> Giảng Viên </th>
                                    <th> Hạn</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php if($vanban->count() > 0 ): ?>
                                    <?php $stt = 1; ?>
                                    <?php $__currentLoopData = $vanban; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <tr>
                                        <td> <?php echo e($stt); ?> </td>
                                        <td> <?php echo e($v->ten); ?> </td>
                                        <td> <?php echo e($v->giangviens->ten); ?> </td>
                                       <td> 
                                             <a class="btn_edit_congtac btn btn-xs yellow-gold" > <i class="fa fa-edit"></i> 1 Ngày </a>
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
                 <?php endif; ?>
                    </div>

                    <div class="col-md-12">
                         <?php if($chambai->isNotEmpty()): ?>
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered deadline deadline-chambai">
                    <div class="portlet-body">
                        <?php if (app('laratrust')->can('create-giangvien')) : ?>
                        <div class="table-toolbar">
                            <div class="row">
                                <p class=""><i style="color: #ffc93c; opacity: 0.8;" class="fa fa-pencil-square-o" aria-hidden="true"></i>Chấm Bài</p>
                            </div>
                        </div>
                        <?php endif; // app('laratrust')->can ?>
                        <table class="table table-striped table-hover table-bordered" id="ds_giangvien">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Lớp</th>
                                    <th> Học Phần </th>
                                    <th> Giảng Viên</th>
                                    <th> Hạn</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php if($chambai->count() > 0 ): ?>
                                    <?php $stt = 1; ?>
                                    <?php $__currentLoopData = $chambai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <tr>
                                        <td> <?php echo e($stt); ?> </td>
                                        <td> <?php echo e($v->lops->tenlop); ?> </td>
                                        <td> <?php echo e($v->hocphans->mahocphan); ?> </td>
                                        
                                        <td> <?php echo e($v->giangviens->ten); ?> </td>
                                       <td> 
                                             <a class="btn_edit_congtac btn btn-xs yellow-gold" > <i class="fa fa-edit"></i> 1 Ngày </a>
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
                 <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    


        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/dashboard/deadline.blade.php ENDPATH**/ ?>