

<?php $__env->startSection('title', 'Bảng điều khiển'); ?>

<?php $__env->startSection('content'); ?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="container custom-container">
            <div class="row custom-row">
                <div class="col-md-10 col-lg-10 custom-click-sidebar">
            <div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-bottom: 30px">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
              </ol>
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <?php if((setting('company.slide1','') != '')): ?>
                <div class="item active" style="background-image: url(<?php echo e((setting('company.slide1','') != '')?url('/uploads/slides/' . setting('company.slide1') ): 'http://www.placehold.it/200x200/EFEFEF/AAAAAA&amp;text=no+image'); ?>); background-size: cover; background-position: center;">
                </div>
                <?php endif; ?>
                <?php if((setting('company.slide2','') != '')): ?>
                <div class="item" style="background-image: url(<?php echo e((setting('company.slide2','') != '')?url('/uploads/slides/' . setting('company.slide2') ): 'http://www.placehold.it/200x200/EFEFEF/AAAAAA&amp;text=no+image'); ?>); background-size: cover; background-position: center;">
                </div>
                <?php endif; ?>
                <?php if((setting('company.slide3','') != '')): ?>
                <div class="item" style="background-image: url(<?php echo e((setting('company.slide3','') != '')?url('/uploads/slides/' . setting('company.slide3') ): 'http://www.placehold.it/200x200/EFEFEF/AAAAAA&amp;text=no+image'); ?>); background-size: cover; background-position: center;">
                </div>
                <?php endif; ?>
              </div>
              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/dashboard/index.blade.php ENDPATH**/ ?>