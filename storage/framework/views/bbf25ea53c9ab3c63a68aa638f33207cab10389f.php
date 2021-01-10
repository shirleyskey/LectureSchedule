<?php $__env->startSection('title', 'Chỉnh sửa Lớp'); ?>

<?php $__env->startSection('style'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link href="<?php echo e(asset('assets/global/plugins/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/global/plugins/icheck/skins/all.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/global/plugins/bootstrap-toastr/toastr.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.css')); ?>" rel="stylesheet" type="text/css" />
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
                    <a href="<?php echo e(route('lop.index')); ?>">Quay Lại Danh Sách Lớp Học</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <strong>
            <i class="fa fa-edit"></i> Chỉnh sửa Lớp: <?php echo e($lop->tenlop); ?> 
        </strong>
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
                    <ul class="nav nav-pills" id="#myTab">
                        <li class="active">
                            <a href="#tab1" data-toggle="tab">Thông tin</a>
                        </li>
                        <li>
                            <a href="#tab2" data-toggle="tab">Danh Sách Học Phần</a>
                        </li>
                    </ul>
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form" id="form_wizard_1">
                        <!-- BEGIN FORM-->
                        <?php echo $__env->make('lop.edit.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    $(document).ready(function()
    {
        var table = $('#table_ds_hocphan');
        var oTable = table.dataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
    "pageLength": 10,

    "language": {
        "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
        "zeroRecords": "Không tìm thấy dữ liệu",
        "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng: _TOTAL_",
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
        // Reload trang và giữ nguyên tab đã active
        var activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            $('a[href="' + activeTab + '"]').tab('show');
            localStorage.removeItem('activeTab');
        }
        // END Reload trang và giữ nguyên tab đã active

        // ==================================================================//

         // Ajax thêm Ho Phan
         $("#btn_add_hocphan").on('click', function(e){
        e.preventDefault();
        $("#btn_add_hocphan").attr("disabled", "disabled");
        $("#btn_add_hocphan").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
        $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
        $.ajax({

            url: '<?php echo e(route('postThemHocPhan')); ?>',
            method: 'POST',
            data: {
               id_lop: $("#form_add_hocphan input[name='id_lop']").val(),
               tenhocphan: $("#form_add_hocphan input[name='tenhocphan']").val(),
            //    sotiet: $("#form_add_hocphan input[name='sotiet']").val(),
               sotinchi: $("#form_add_hocphan input[name='sotinchi']").val(),
               mahocphan: $("#form_add_hocphan input[name='mahocphan']").val(),
            //    start: $("#form_add_hocphan input[name='start']").val(),
            //    end: $("#form_add_hocphan input[name='end']").val(),
            },
            success: function(data) {
                console.log("Hihi");
                $("#btn_add_hocphan").removeAttr("disabled");
                $("#btn_add_hocphan").html('<i class="fa fa-save"></i> Lưu');
                if(data.status == false){
                    var errors = "";
                    $.each(data.data, function(key, value){
                        $.each(value, function(key2, value2){
                            errors += value2 +"<br>";
                        });
                    });
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "positionClass": "toast-top-center",
                        "onclick": null,
                        "showDuration": "1000",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    toastr["error"](errors, "Lỗi")
                }
                if(data.status == true){
                    $('#modal_add_hocphan').modal('hide');
                    swal({
                        "title":"Đã tạo!",
                        "text":"Bạn đã tạo thành công Học Phần!",
                        "type":"success"
                    }, function() {
                            localStorage.setItem('activeTab', '#tab2');
                            location.reload();
                        }
                    );
                }
            }
        });
    });
   //AJAX Tìm Học Phần Theo ID
        $(".btn_edit_hocphan").on("click", function(e){
            e.preventDefault();
            console.log("Sửa nè");
            var hocphan_id = $(this).data("hocphan-id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '<?php echo e(route('postTimHocPhanTheoId')); ?>',
                method: 'POST',
                data: {
                    id: hocphan_id
                },
                success: function(data) {
                    if(data.status == true){
                        // console.log(data.data);
                        $("#form_edit_hocphan input[name='id_lop']").val(data.data.id_lop);
                        $("#form_edit_hocphan input[name='id']").val(data.data.id);
                        $("#form_edit_hocphan input[name='tenhocphan']").val(data.data.tenhocphan);
                        // $("#form_edit_hocphan input[name='sotiet']").val(data.data.sotiet);
                        $("#form_edit_hocphan input[name='sotinchi']").val(data.data.sotinchi);
                        $("#form_edit_hocphan input[name='mahocphan']").val(data.data.mahocphan);
                        // $("#form_edit_hocphan input[name='start']").val(data.data.start);
                        // $("#form_edit_hocphan input[name='end']").val(data.data.end);
                        $('#modal_edit_hocphan').modal('show');
                    }
                }
            });
        });
        // END Khi click vào nút sửa HOCPHAN, tìm HOCPHAN theo id và đỗ dữ liệu vào form

        
        // Ajax sửa HOCPHAN
        $("#btn_edit_hocphan").on('click', function(e){
            e.preventDefault();
            
            $("#btn_edit_hocphan").attr("disabled", "disabled");
            $("#btn_edit_hocphan").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '<?php echo e(route('postSuaHocPhan')); ?>',
                method: 'POST',
                data: {
                    id: $("#form_edit_hocphan input[name='id']").val(),
                    id_lop: $("#form_edit_hocphan input[name='id_lop']").val(),
                    // sotiet: $("#form_edit_hocphan input[name='sotiet']").val(),
                    tenhocphan: $("#form_edit_hocphan input[name='tenhocphan']").val(),
                    sotinchi: $("#form_edit_hocphan input[name='sotinchi']").val(),
                    mahocphan: $("#form_edit_hocphan input[name='mahocphan']").val(),
                    // start: $("#form_edit_hocphan input[name='start']").val(),
                    // end: $("#form_edit_hocphan input[name='end']").val(),
                },
                success: function(data) {
                    $("#btn_edit_hocphan").removeAttr("disabled"); 
                    $("#btn_edit_hocphan").html('<i class="fa fa-save"></i> Lưu');
                    if(data.status == false){
                        var errors = "";
                        $.each(data.data, function(key, value){
                            $.each(value, function(key2, value2){
                                errors += value2 +"<br>";
                            });
                        });
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "positionClass": "toast-top-center",
                            "onclick": null,
                            "showDuration": "1000",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr["error"](errors, "Lỗi")
                    }
                    if(data.status == true){
                        $('#modal_edit_hocphan').modal('hide');
                        swal({
                            "title":"Đã sửa!", 
                            "text":"Bạn đã sửa thành công Học Phần!",
                            "type":"success"
                        }, function() {
                                localStorage.setItem('activeTab', '#tab2');
                                location.reload();
                            }
                        );
                    }
                }
            });
        });
        // END Ajax sửa HOCPHAN
        
        // Xử lý khi click nút xóa HOCPHAN
        $(".btn_delete_hocphan").on("click", function(e){
            e.preventDefault();
            console.log("Xóa nè");
            var hocphan_id = $(this).data("hocphan-id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            swal({
                title: "Xóa Học Phần này?",
                text: "Bạn có chắc không? Lưu ý: Học Phần này sẽ bị xóa vĩnh viễn cùng những bài học, tiết học, hoạt động chấm bài có liên quan!",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: 'Không',
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Có, xóa ngay!",
                closeOnConfirm: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        $.ajax({
                            url: '<?php echo e(route('postXoaHocPhan')); ?>',
                            method: 'POST',
                            data: {
                                id: hocphan_id
                            },
                            success: function(data) {
                                console.log(data);
                                if(data.status == true){
                                    swal({
                                        "title":"Đã xóa!", 
                                        "text":"Bạn đã xóa thành công HOCPHAN!",
                                        "type":"success"
                                    }, function() {
                                            localStorage.setItem('activeTab', '#tab2');
                                            location.reload();
                                        }
                                    );
                                }
                            }
                        });
                    }   
            });

        });
        // END Xử lý khi click nút xóa HOCPHAN
    });

   
</script>


<script src="<?php echo e(asset('assets/global/plugins/datatables/datatables.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/jquery.input-ip-address-control-1.0.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/icheck/icheck.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/bootstrap-toastr/toastr.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/lop/edit/index.blade.php ENDPATH**/ ?>