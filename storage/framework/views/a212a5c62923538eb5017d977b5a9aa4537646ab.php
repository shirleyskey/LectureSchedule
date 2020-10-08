<!DOCTYPE html>

<html lang="<?php echo e(app()->getLocale()); ?>">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php echo $__env->make('partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('partials.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <!-- END HEAD -->

    <body class="login">
        <?php echo $__env->yieldContent('content'); ?>

        <?php echo $__env->make('partials.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->yieldContent('script'); ?>
    </body>

</html>

<?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/layouts/login.blade.php ENDPATH**/ ?>