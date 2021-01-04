<?php $__env->startSection('title', 'Danh sách Học Phần'); ?>

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
                    <span>Danh Sách Học Phần Chuyên Môn</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <strong>
            <i class="fa fa-building-o"></i>
            Danh Sách Học Phần Chuyên Môn
        </strong>
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
                        <?php if (app('laratrust')->can('create-hocphan')) : ?>
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" href="<?php echo e(route('hocphan.add.get')); ?>"><i class="fa fa-plus"></i> Thêm mới
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                        </div>
                        <?php endif; // app('laratrust')->can ?>
                        <table class="table table-striped table-hover table-bordered" id="ds_nguoi_dung">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Lớp </th>
                                    <th> Mã Học Phần </th>
                                    <th> Tên Học Phần </th>
                                    <th> Số Tiết </th>
                                    <th> Tín Chỉ</th>
                                    <th> Bài</th>
                                    <th> Bắt Đầu</th>
                                    <th> Kết Thúc</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if( $ds_hocphan->count() > 0 ): ?>
                                    <?php $stt = 1; ?>
                                    <?php $__currentLoopData = $ds_hocphan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php 
                                        $so_tiet = 0;
                                        $is_tiet = App\Tiet::where('id_hocphan', $v->id);
                                        if($is_tiet){
                                            $tiet_hocphans = App\Tiet::where('id_hocphan', $v->id)->get();
                                            $start = App\Tiet::where('id_hocphan', $v->id)->orderBy('thoigian', 'asc')->first();
                                            $end = App\Tiet::where('id_hocphan', $v->id)->orderBy('thoigian', 'desc')->first();
                                            $start_result = ($start) ? $start->thoigian : null;
                                            $end_result = ($end) ? $end->thoigian : null;
                                            foreach($tiet_hocphans as $v_tiet_hocphan){
                                                $so_tiet += $v_tiet_hocphan->so_tiet;
                                            }
                                        }
                                    ?>
                                    <tr>
                                        <td> <?php echo e($stt); ?> </td>
                                        <td> 
                                            <?php echo e(($v->id_lop) ? ($v->lops->tenlop) : ''); ?>

                                        </td>
                                        <td> <?php echo e($v->mahocphan); ?> </td>
                                        <td> <?php echo e($v->tenhocphan); ?> </td>
                                        <td> <?php echo e($so_tiet); ?>  </td>
                                        <td> <?php echo e($v->sotinchi); ?> </td>
                                        <td> 
                                        <?php 
                                             $sobai = App\Bai::where('id_hocphan', $v->id)->get()->count();  
                                             echo $sobai;
                                        ?>
                                         </td>
                                        <td><?php echo e($start_result); ?> </td>
                                        <td> <?php echo e($end_result); ?> </td>
                                       
                                       
                                        <td>
                                            <?php if (app('laratrust')->can('read-hocphan')) : ?>
                                            <a class="btn btn-xs blue-sharp" href="<?php echo e(route('hocphan.read.get', $v->id)); ?>" title="Xem"> <i class="fa fa-eye"></i> Xem</a>
                                            <?php endif; // app('laratrust')->can ?>
                                            <?php if (app('laratrust')->can('update-hocphan')) : ?>
                                            <a class="btn btn-xs yellow-gold" href="<?php echo e(route('hocphan.edit.get', $v->id)); ?>" title="Sửa"> <i class="fa fa-edit"></i> Sửa</a>
                                            <?php endif; // app('laratrust')->can ?>
                                            <?php if (app('laratrust')->can('delete-hocphan')) : ?>
                                            <a class="btn btn-xs red-mint" href="<?php echo e(route('hocphan.delete.get', $v->id)); ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa Học Phần này không?');" title="Xóa"> <i class="fa fa-trash"></i> Xóa</a>
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
        var table = $('#ds_nguoi_dung');

        var oTable = table.dataTable({

            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],

            "pageLength": 10,
    
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Học Phần: _TOTAL_",
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

<!-- <script src="<?php echo e(asset('assets/global/scripts/datatable.js')); ?>" type="text/javascript"></script> -->
<script src="<?php echo e(asset('assets/global/plugins/datatables/datatables.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/hocphan/browser/index.blade.php ENDPATH**/ ?>