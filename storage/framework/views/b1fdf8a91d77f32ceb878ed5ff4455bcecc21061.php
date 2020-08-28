<!DOCTYPE html>

<html lang="<?php echo e(app()->getLocale()); ?>">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php echo $__env->make('partials.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('style'); ?>
    <?php echo $__env->make('partials.style', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- END HEAD -->

    

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
            <?php echo $__env->make('partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <?php echo $__env->make('partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <!-- END CONTAINER -->
            
            <?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

        <?php echo $__env->make('partials.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->yieldContent('script'); ?>
    </body>

</html>