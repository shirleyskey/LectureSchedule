<?php $__env->startSection('title', 'Thông tin Học Phần Chuyên Môn'); ?>

<?php $__env->startSection('style'); ?>
    <link href="<?php echo e(asset('assets/global/plugins/icheck/skins/all.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/global/plugins/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('css/main.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

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
                    <a href="<?php echo e(route('dashboard')); ?>">Bảng Điều Khiển</a>
                    <i class="fa fa-circle"></i>
                    <a href="<?php echo e(route('hocphan.index')); ?>">Danh Sách Tất Cả Học Phần Chuyên Môn</a>
                    <i class="fa fa-circle"></i>
                <a href="<?php echo e(route('lop.read.get',$hocphan->id_lop )); ?>">Học Phần Chuyên Môn Của Lớp <?php echo e($hocphan->lops->tenlop); ?></a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <strong>
            <i class="fa fa-book"></i> <?php echo e($hocphan->tenhocphan); ?> </strong> - <?php echo e(($hocphan->id_lop) ? $hocphan->lops->tenlop : ''); ?>

        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <button class="close" data-close="alert"></button>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p> <?php echo e($error); ?> </p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-12">
                <div class="tabbable tabbable-tabdrop">
                    <ul class="nav nav-pills">
                        <li class="active">
                            <a href="#tab1" data-toggle="tab">Thông tin</a>
                        </li>
                    </ul>
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form" id="form_wizard_1">
                        <!-- BEGIN FORM-->
                        <div class="tab-content">
                            <!-- BEGIN TAB 1-->
                            <div class="tab-pane active" id="tab1">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Tên Lớp:</label>
                                                <label class="control-label col-md-7 col-xs-6"><?php echo e($hocphan->lops->tenlop); ?></label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Mã Học Phần:</label>
                                                <label class="control-label col-md-7 col-xs-6"><?php echo e($hocphan->mahocphan); ?></label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Tên Học Phần:</label>
                                                <label class="control-label col-md-7 col-xs-6"><?php echo e($hocphan->tenhocphan); ?></label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Số Tiết:</label>
                                                <label class="control-label col-md-7 col-xs-6"><?php echo e($hocphan->sotiet); ?></label>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Số Tín Chỉ:</label>
                                                <label class="control-label col-md-7 col-xs-6"><?php echo e($hocphan->sotinchi); ?></label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Số Bài:</label>
                                                <label class="control-label col-md-7 col-xs-6"><?php echo e($hocphan->bais->count()); ?></label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Bắt Đầu:</label>:</label>
                                                <label class="control-label col-md-7 col-xs-6"><?php echo e($hocphan->start); ?></label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Kết Thúc:</label>:</label>
                                                <label class="control-label col-md-7 col-xs-6"><?php echo e($hocphan->end); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END TAB 1-->
                            <!-- BEGIN TAB 2-->
                            <ul class="nav nav-pills">
                                <li class="active">
                                    <a href="" data-toggle="">Danh Sách Các Bài Học</a>
                                </li>
                            </ul>
                            <div class="" id="">
                                <?php if($bai->isNotEmpty()): ?>
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên Bài</th>
                                                    <th> Số Tiết</th>
                                                    <th> Giảng Viên Chính</th>
                                                    <th> Giảng Viên Phụ</th>
                                                    <th> Hành Động</th>
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
                                                        <td> <?php echo e(($v->gvchinh) ? $v->giangvienchinhs->ten : ''); ?> </td>
                                                        <td>
                                                            <?php
                                                                $gvphu = json_decode($v->gvphu, true);
                                                            ?>
                                                                <?php if($gvphu != null): ?>
                                                                <?php $__currentLoopData = $gvphu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                                                    <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?> </p>
                                                                <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if (app('laratrust')->can('read-bai')) : ?>
                                                            <a class="btn btn-xs blue-sharp" href="<?php echo e(route('bai.read.get', $v->id)); ?>" title="Xem"> <i class="fa fa-eye"></i> Xem</a>
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
                                        <p> Chưa có bài học nào!</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!-- END BEGIN TAB 2-->

                             <!-- BEGIN TAB 3 DANH SÁCH TIẾT HỌC-->
                             <ul class="nav nav-pills">
                                <li class="active">
                                    <a href="" data-toggle="">Danh Sách Các Tiết Học</a>
                                </li>
                            </ul>
                            <div class="" id="">
                                <?php if($tiet->isNotEmpty()): ?>
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_tiet">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên Bài</th>
                                                    <th> Thời Gian</th>
                                                    <th> Buổi</th>
                                                    <th> Ca</th>
                                                    <th> Giảng Viên</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if( $tiet->count() > 0 ): ?>
                                                    <?php $stt = 1; ?>
                                                    <?php $__currentLoopData = $tiet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td> <?php echo e($stt); ?> </td>
                                                        <td> <?php echo e(($v->id_bai) ? $v->bais->tenbai : ''); ?> </td>
                                                        <td> <?php echo e($thoigian = Carbon\Carbon::parse($v->thoigian)->format('Y-d-m')); ?> </td>
                                                        <td> <?php echo e($v->buoi); ?> </td>
                                                        <td> <?php echo e($v->ca); ?> </td>
                                                        <td> <?php echo e(($v->id_giangvien) ? $v->giangviens->ten : ''); ?> </td>
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
                                        <p> Chưa có Tiết Học nào!</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!-- END BEGIN TAB 2-->
                        </div>
                        <!-- END FORM-->
                    </div>
                    <!-- END VALIDATION STATES-->
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

<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function(){
        // Cấu hình bảng ds hợp đồng
        var table = $('#table_ds_hd');
        var oTable = table.dataTable({

            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_",
                "infoEmpty": "Không có bản ghi nào",
                "infoFiltered": "(chọn lọc từ _MAX_ bản ghi)",
                "search": "Tìm kiếm",
                "paginate": {
                    "first":      "Đầu",
                    "last":       "Cuối",
                    "next":       "Sau",
                    "previous":   "Trước"
                },
            },
            "columnDefs": [{ // set default column settings
                'orderable': true,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0]
            }],
            "order": [
                // [0, "asc"]
            ] // set first column as a default sort by asc
        });

        var table = $('#table_ds_tiet');
        var oTable = table.dataTable({

            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_",
                "infoEmpty": "Không có bản ghi nào",
                "infoFiltered": "(chọn lọc từ _MAX_ bản ghi)",
                "search": "Tìm kiếm",
                "paginate": {
                    "first":      "Đầu",
                    "last":       "Cuối",
                    "next":       "Sau",
                    "previous":   "Trước"
                },
            },
            "columnDefs": [{ // set default column settings
                'orderable': true,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0]
            }],
            "order": [
                // [0, "asc"]
            ] // set first column as a default sort by asc
        });
        // END Cấu hình bảng ds hợp đồng
    });
</script>
<script src="<?php echo e(asset('assets/global/plugins/datatables/datatables.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/hocphan/read/index.blade.php ENDPATH**/ ?>