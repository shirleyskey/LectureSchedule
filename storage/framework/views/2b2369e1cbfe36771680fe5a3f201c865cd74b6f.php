<!DOCTYPE html>

<html lang="<?php echo e(app()->getLocale()); ?>">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php echo $__env->make('partials.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('partials.style', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    <!-- END HEAD -->

    <body class="login">
        <?php echo $__env->yieldContent('content'); ?>

        <?php echo $__env->make('partials.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->yieldContent('script'); ?>
    </body>

</html>

