<!DOCTYPE html>

<html lang="<?php echo e(app()->getLocale()); ?>">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php echo $__env->make('partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('style'); ?>
    <?php echo $__env->make('partials.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- END HEAD -->

    

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
            <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <?php echo $__env->make('partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <!-- END CONTAINER -->
            
            <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <?php echo $__env->make('partials.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->yieldContent('script'); ?>
    </body>

</html><?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/layouts/master.blade.php ENDPATH**/ ?>