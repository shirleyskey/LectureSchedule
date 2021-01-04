<?php $__env->startSection('title', 'Danh sách Giảng viên'); ?>

<?php $__env->startSection('style'); ?>
    <link href="<?php echo e(asset('assets/global/plugins/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.css')); ?>" rel="stylesheet" type="text/css" />
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
                </li>
                <li>
                    <span>Danh Sách Giảng Viên</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <i class="fa fa-book"></i>
            <strong>Danh Sách Giảng Viên</strong>
        </h1>

        <!-- MESSAGE -->
        <?php echo $__env->make('partials.flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <?php if (app('laratrust')->can('create-giangvien')) : ?>
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" href="<?php echo e(route('giangvien.add.get')); ?>"><i class="fa fa-plus"></i> Thêm mới
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- <div class="btn-group pull-right">
                                        <button class="btn green btn-outline dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i> Công cụ
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right">

                                            <li>
                                                <form action="<?php echo e(route('giangvien.import')); ?>" method="POST" role="form" enctype="multipart/form-data" class="nhap-excel" style="padding: 10px">
                                                    <?php echo csrf_field(); ?>
                                                    <input id="giangvien-file" type="file" name="giangvien-file" accept=".xlsx, .xls, .csv, .ods" placeholder="Chọn File" style="margin-bottom: 10px;
                                                ">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="glyphicon glyphicon-folder-open"></i>
                                                        Nhập Excel</button>
                                                </form>
                                            </li>
                                            <li>

                                                <button class="btn btn-primary" style="margin: 10px;">
                                                    <a href="<?php echo e(route('giangvien.export')); ?>" style="color: #fff!important"><i class="glyphicon glyphicon-download-alt" ></i> Xuất Excel </a>
                                                   </button>

                                            </li>
                                        </ul>
                                    </div> -->
                                </div>

                            </div>
                        </div>
                        <?php endif; // app('laratrust')->can ?>
                        <table class="table table-striped table-hover table-bordered" id="ds_giangvien">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Mã Giảng Viên</th>
                                    <th> Tên </th>
                                    <th> Chức Vụ </th>
                                    <th> Hệ Số Lương</th>
                                    <th> Chỗ Ở </th>
                                    <th> Chức Danh</th>
                                    <th> Trình Độ</th>
                                    <th> Có Thể Giảng</th>
                                    <th> Bài Giảng</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if( $ds_giangvien->count() > 0 ): ?>
                                    <?php $stt = 1; ?>
                                    <?php $__currentLoopData = $ds_giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td> <?php echo e($stt); ?> </td>
                                        <td> <?php echo e($v->ma_giangvien); ?> </td>
                                        <td>
                                            <a href="<?php echo e(route('giangvien.read.get', $v->id)); ?>"><?php echo e($v->ten); ?></a>
                                        </td>
                                        <td> <?php echo e($v->chucvu); ?>  </td>
                                        <td> <?php echo e($v->hesoluong); ?> </td>
                                        <td> <?php echo e($v->diachi); ?> </td>
                                        <td> <?php echo e($v->chucdanh); ?> </td>
                                        <td> <?php echo e($v->trinhdo); ?> </td>

                                        <td>
                                            <?php if( $v->cothegiang ==1 ): ?>
                                            <span class="label label-sm label-success" style="font-size: 12px;"> Có Thể Giảng </span>
                                            <?php else: ?>
                                            <span class="label label-sm label-danger" style="font-size: 12px;"> Không Giảng </span>
                                            <?php endif; ?>
                                        </td>
                                        <td> <?php echo e($v->bai_giang); ?> </td>
                                        <td>
                                            <?php if (app('laratrust')->can('read-giangvien')) : ?>
                                            <a class="btn btn-xs blue-sharp" href="<?php echo e(route('giangvien.read.get', $v->id)); ?>" title="Xem"> <i class="fa fa-eye"></i> Xem</a>
                                            <?php endif; // app('laratrust')->can ?>
                                            <?php if (app('laratrust')->can('delete-giangvien')) : ?>
                                            <a class="btn btn-xs yellow-gold" href="<?php echo e(route('giangvien.edit.get', $v->id)); ?>" title="Sửa"> <i class="fa fa-edit"></i> Sửa</a>
                                            <?php endif; // app('laratrust')->can ?>
                                            <?php if (app('laratrust')->can('delete-giangvien')) : ?>
                                            <a class="btn btn-xs red-mint" href="<?php echo e(route('giangvien.delete.get', $v->id)); ?>" 
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa Giảng Viên này không? Nếu xóa, mọi Tiết học và các Hoạt động liên quan đến giảng viên sẽ bị xóa! Hãy cân nhắc để tránh dẫn đến sai sót');" title="Xóa"> <i class="fa fa-trash"></i> Xóa</a>
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
    jQuery(document).ready(function() {
        var table = $('#ds_giangvien');

        var oTable = table.dataTable({

            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],

            "pageLength": 10,

            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Giảng Viên: _TOTAL_",
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
    });
</script>
<script src="<?php echo e(asset('assets/global/plugins/datatables/datatables.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/giangvien/browser/index.blade.php ENDPATH**/ ?>