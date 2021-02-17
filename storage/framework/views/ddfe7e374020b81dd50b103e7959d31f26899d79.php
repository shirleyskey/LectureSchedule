    <!-- BEGIN FOOTER -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 right">
                <div class="img">
                    <img src="<?php echo e((setting('company.logo','') != '')?url('/uploads/logos/' . setting('company.logo') ): 'http://www.placehold.it/200x200/EFEFEF/AAAAAA&amp;text=no+image'); ?>" alt="" />
                    <h2><?php echo e(setting('company.tenkhoa','')); ?></h2>
                    <h3><?php echo e(setting('company.tenhocvien','')); ?></h3>
                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-6 left">
                <h2 class="title"><?php echo e(setting('company.tenphanmem','')); ?></h2>
                <ul class="description">
                    <li>
                        <i class="fa fa-building" aria-hidden="true"></i>
                        Bản quyền <i class="fa fa-copyright" aria-hidden="true"></i><?php echo e(setting('company.banquyen','')); ?></li>
                    <li>
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        Địa chỉ: <?php echo e(setting('company.diachi','')); ?></li>
                    <li>
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        Liên hệ: <?php echo e(setting('company.lienhe','')); ?></li>
                    <li>
                        <i class="fa fa-code" aria-hidden="true"></i>
                        Phát triển: <?php echo e(setting('company.phattrien','')); ?></li>
                </ul>
            </div>
            
        </div>
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- END FOOTER -->
<?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/partials/footer.blade.php ENDPATH**/ ?>