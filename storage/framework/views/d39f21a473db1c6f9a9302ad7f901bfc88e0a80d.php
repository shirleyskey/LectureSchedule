<?php $__env->startSection('title', 'Bảng điều khiển | Lịch Theo Học Phần'); ?>

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
                    <span>Bảng điều khiển / Phân công lịch giảng theo Học Phần</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title text-center uppercase"> <b>Bảng Phân Công Lịch Giảng năm học 2020-2021</b> 
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">

           <div class="col-md-12">
            <div class="tab-pane" id="tab4">
                <?php if($lop->isNotEmpty()): ?>
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <table class="table table-striped table-hover table-bordered" id="table_ds_phancong">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Mã Học Phần</th>
                                    <th> Lớp</th>
                                    <th style="text-align: center"> Bài - Giáo Viên</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if( $ds_hocphan->count() > 0 ): ?>
                                    <?php $stt = 1; ?>
                                    <?php $__currentLoopData = $ds_hocphan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   
                                    <tr>
                                        <td> <?php echo e($stt); ?> </td>
                                        <td> 
                                            <?php echo e($v->mahocphan); ?>

                                        </td>
                                        <td> <?php echo e($v->lops->tenlop); ?> </td>
                                        <td> 
                                            <?php 
                                            $ds_bai = App\Bai::where('id_hocphan', $v->id)->get();
                                            ?>
                                                <?php if($ds_bai): ?>
                                                    <?php  $so_tiet = 0; ?>
                                                    <?php $__currentLoopData = $ds_bai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_bai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div style="display: inline-block; padding: 10px; background-color: #80808047; margin-right: 5px; margin-top: 15px">
                                                            <p style="margin-bottom: 0px">
                                                                <?php 
                                                                    $tiet = App\Tiet::where('id_bai', $v_bai->id)->sum('so_tiet');
                                                                    $giangviens = App\Tiet::where('id_bai', $v_bai->id)->select('id_giangvien')->groupBy('id_giangvien')->get();
                                                                ?>
                                                                <b><?php echo e($v_bai->tenbai); ?></b>  - <?php echo e($tiet); ?> Tiết
                                                            </p>
                                                            <?php $__currentLoopData = $giangviens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_giangvien): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($v_giangvien->id_giangvien): ?>
                                                            <p style="margin-bottom: 0px">
                                                               <?php echo e($v_giangvien->giangviens->ma_giangvien); ?>

                                                            </p>
                                                            <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                           
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
                        <p>Chưa có Phân Công Lịch Giảng</p>
                    </div>
                <?php endif; ?>
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
    jQuery(document).ready(function() {
        var table_phancong = $('#table_ds_phancong');

        var oTable_phancong = table_phancong.dataTable({

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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/lichgiang/phancong.blade.php ENDPATH**/ ?>