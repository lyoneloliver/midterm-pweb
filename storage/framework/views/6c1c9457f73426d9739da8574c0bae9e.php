

<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>
<form method="POST" action="<?php echo e(route('login.perform')); ?>">
    <?php echo csrf_field(); ?>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" required>
    </div>

    <button type="submit" class="btn-primary">Login</button>

    <div class="auth-links">
        <a href="<?php echo e(route('register')); ?>">Don't have an account? Register</a>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\frs_pweb\resources\views/auth/login.blade.php ENDPATH**/ ?>