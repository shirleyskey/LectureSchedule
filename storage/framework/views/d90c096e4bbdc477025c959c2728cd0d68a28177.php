

<?php $__env->startSection('title', 'Đăng nhập hệ thống'); ?>

<?php $__env->startSection('content'); ?>
    <!-- BEGIN LOGO -->
    <div class="logo">
        <h3 class="font-green">PHẦN MỀM QUẢN LÝ GIỜ GIẢNG KHOA AN NINH ĐIỀU TRA</h3>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content" style="margin-top: 0px;">
        <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="<?php echo e(route('login.post')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <h3 class="form-title font-green">Đăng Nhập</h3>
            <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <button class="close" data-close="alert"></button>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p> <?php echo e($error); ?> </p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>
            
            <!-- MESSAGE -->
            <?php echo $__env->make('partials.flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">Email</label>
                <input value="" class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Mật khẩu</label>
                <input value="" class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Mật khẩu" name="password" /> </div>
            <div class="form-group">
                <button type="submit" class="btn green uppercase">Đăng nhập</button>
                <label class="rememberme check mt-checkbox mt-checkbox-outline">
                    <input type="checkbox" name="remember" value="1" />Nhớ mật khẩu?
                    <span></span>
                </label>
            </div>
        </form>
        <table class="table">
            <thead>
            <tr>
                <th>Email</th>
                <th>Mật khẩu</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>superadministrator@app.com</td>
                <td>password</td>
                <td><a class="copy-account" href="#" data-account="superadministrator@app.com" data-password="password">copy</a></td>
            </tr>
            <tr>
                <td>administrator@app.com</td>
                <td>password</td>
                <td><a class="copy-account" href="#" data-account="administrator@app.com" data-password="password">copy</a></td>
            </tr>
            <tr>
                <td>user@app.com</td>
                <td>password</td>
                <td><a class="copy-account" href="#" data-account="user@app.com" data-password="password">copy</a></td>
            </tr>
            </tbody>
        </table>
        <!-- END LOGIN FORM -->
    </div>
    
    
    <!--[if lt IE 9]>
    <script src="../assets/global/plugins/respond.min.js"></script>
    <script src="../assets/global/plugins/excanvas.min.js"></script> 
    <script src="../assets/global/plugins/ie8.fix.min.js"></script> 
    <![endif]-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function()
        {
            $('.copy-account').on('click', function(e){
                e.preventDefault();
                var $account = $(this).data('account');
                var $password = $(this).data('password');
                // console.log($account + $password);
                $('.login-form input[name="email"]').val($account);
                $('.login-form input[name="password"]').val($password);
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/login/index.blade.php ENDPATH**/ ?>