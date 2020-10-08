<?php if(session('status_success')): ?>
    <div class="alert alert-success">
        <button class="close" data-close="alert"></button>
            <p> <?php echo e(session('status_success')); ?> </p>
    </div>
<?php endif; ?>
<?php if(session('status_error')): ?>
    <div class="alert alert-warning">
        <button class="close" data-close="alert"></button>
            <p> <?php echo e(session('status_error')); ?> </p>
    </div>
<?php endif; ?>
<?php if(session('status_danger')): ?>
    <div class="alert alert-danger">
        <button class="close" data-close="alert"></button>
            <p> <?php echo e(session('status_danger')); ?> </p>
    </div>
<?php endif; ?><?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/partials/flash-message.blade.php ENDPATH**/ ?>