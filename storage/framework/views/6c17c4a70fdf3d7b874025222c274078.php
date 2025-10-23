<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?> | FRS System</title>

    
    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/x-icon">

    
    <link rel="stylesheet" href="<?php echo e(asset('css/dashboard.css')); ?>">

    
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="bg-gray-100 flex min-h-screen text-gray-900">

    
    <?php echo $__env->make('layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <div class="flex-1 flex flex-col">
        
        <header class="bg-white shadow p-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold"><?php echo $__env->yieldContent('title'); ?></h1>

            <div class="flex items-center space-x-4">
                <span>👋 <?php echo e(Auth::user()->name); ?></span>

                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                        Logout
                    </button>
                </form>
            </div>
        </header>

        
        <main class="flex-1 p-6">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    
    <script src="<?php echo e(asset('js/dashboard.js')); ?>"></script>

    
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\frs_pweb\resources\views/layouts/dashboard-layout.blade.php ENDPATH**/ ?>