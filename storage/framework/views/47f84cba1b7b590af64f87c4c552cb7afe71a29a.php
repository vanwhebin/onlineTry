<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo e($meta_description); ?>">
    <meta name="author" content="<?php echo e(config('post.author')); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e($title ?? config('post.title')); ?></title>

    
    <link href="<?php echo e(asset('css/main.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/atelier-heath-dark.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('font/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('layui/css/layui.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/pure-highlight.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/shCoreDefault.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/sweetalert2.min.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('layui/layui.all.js')); ?>"></script>
    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body class="post-template-default single single-post single-format-standard  navbar-sticky navbar-slide no-search sidebar-right pagination-infinite_button" style="transform: none;">

<?php echo $__env->make('post.partials.page-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('page-header'); ?>

<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->yieldContent('gadget'); ?>

<?php echo $__env->make('post.partials.page-footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<script src="<?php echo e(asset('js/main.js')); ?>"></script>
<script src="<?php echo e(asset('js/common.js')); ?>"></script>
<script src="<?php echo e(asset('js/highlight.pack.js')); ?>"></script>
<script src="<?php echo e(asset('js/iconfont.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.fancybox.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/plugins.js')); ?>"></script>
<script src="<?php echo e(asset('js/shCore.js')); ?>"></script>
<script src="<?php echo e(asset('js/theia-sticky-sidebar.js')); ?>"></script>
<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html><?php /**PATH /var/www/onlineTry/resources/views/layouts/master.blade.php ENDPATH**/ ?>