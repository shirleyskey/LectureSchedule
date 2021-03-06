<!-- BEGIN CORE PLUGINS -->
<script src="<?php echo e(asset('assets/global/plugins/pace/pace.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/jquery.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/js.cookie.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/jquery.blockui.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')); ?>" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo e(asset('assets/global/plugins/moment-with-locales.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/morris/morris.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/morris/raphael-min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/counterup/jquery.waypoints.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/counterup/jquery.counterup.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/horizontal-timeline/horizontal-timeline.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/flot/jquery.flot.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/flot/jquery.flot.resize.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/flot/jquery.flot.categories.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/jquery.sparkline.min.js')); ?>" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?php echo e(asset('assets/global/scripts/app.min.js')); ?>" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?php echo e(asset('assets/layouts/layout/scripts/layout.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/layouts/global/scripts/quick-sidebar.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/layouts/global/scripts/quick-nav.min.js')); ?>" type="text/javascript"></script>
<script>
$(document).ready(function() {
    var interval = setInterval(function() {
        var $now = moment().locale('vi').format('dd, DD/MM/YYYY, h:mm:ss A');
        $('#datetime-part').html($now);
    }, 100);

    $('.custom-click-sidebar-opened').on('click', function(){
        $('.custom-click-sidebar').removeClass('col-md-10');
        $('.custom-click-sidebar').addClass('col-md-12');
        $(this).toggleClass('custom-click-sidebar-opened');
        $(this).toggleClass('custom-click-sidebar-closed');
        console.log('đóng');

    });
    $('.custom-click-sidebar-closed').on('click', function(){
        $('.custom-click-sidebar').removeClass('col-md-12');
        $('.custom-click-sidebar').addClass('col-md-10');
        $(this).toggleClass('custom-click-sidebar-opened');
        $(this).toggleClass('custom-click-sidebar-closed');
        console.log('mở');
    });
});
</script><?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/partials/script.blade.php ENDPATH**/ ?>