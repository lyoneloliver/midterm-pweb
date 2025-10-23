<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?> - FRS System</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/auth.css')); ?>">
    <script src="<?php echo e(asset('js/auth.js')); ?>" defer></script>
</head>
<body class="auth-container">

    <div class="auth-box">
        <h1 class="auth-title"><?php echo $__env->yieldContent('title'); ?></h1>

        <?php if(session('error')): ?>
            <div class="alert alert-error"><?php echo e(session('error')); ?></div>
        <?php endif; ?>

        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\frs_pweb\resources\views/layouts/auth-layout.blade.php ENDPATH**/ ?>