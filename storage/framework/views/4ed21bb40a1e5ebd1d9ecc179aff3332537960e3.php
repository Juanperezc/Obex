<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>INSPINIA - <?php echo $__env->yieldContent('title'); ?> </title>
  <!--  <link href="/images/Obex.ico" rel="shortcut icon" type="image/x-icon" /> -->
    <link rel="stylesheet" href="<?php echo asset('css/vendor.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/app.css'); ?>" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>
<body class="gray-bg body-login">

  <div id='app' >
            <!-- Main view  -->
            <?php echo $__env->yieldContent('content'); ?>
     
</div>

    <!-- End wrapper-->
    <script src="/js/app.js"></script>
    <script src="/js/main.js"></script>
    <script>
    window.Laravel = <?php echo json_encode([
    'csrfToken' => csrf_token(),
     ]); ?>
     </script>
<?php $__env->startSection('scripts'); ?>
<?php echo $__env->yieldSection(); ?>

</body>
</html>
