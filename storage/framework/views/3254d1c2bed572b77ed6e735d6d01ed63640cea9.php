<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="user" content="Auth::user()">
    
    <title>Obex - <?php echo $__env->yieldContent('title'); ?> </title>

    <!--<link href="/images/Obex.ico" rel="shortcut icon" type="image/x-icon" />-->
    <link rel="stylesheet" href="<?php echo asset('css/vendor.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/app.css'); ?>" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>
<body>

  <!-- Wrapper-->
    <div id="wrapper">
        
<div id='app' :permissions="<?php echo e(auth()->user()->roles()->get()); ?>"   :user="<?php echo e(auth()->user()); ?>"  >
        <!-- Navigation -->
        <?php echo $__env->make('layouts.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            <?php echo $__env->make('layouts.topnavbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <!-- Main view  -->
            <?php echo $__env->yieldContent('content'); ?>

            <!-- Footer -->
            <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>
        <!-- End page wrapper-->
</div>
    </div>
    <!-- End wrapper-->
    <script src="/js/app.js"></script>
    <script src="/js/main.js"></script>
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
        'roles' => Auth::user()->roles()->get(),
        'user' => Auth::user()
    ]); ?>;
    </script>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->yieldSection(); ?>

</body>
</html>
