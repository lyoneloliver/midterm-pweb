

<?php $__env->startSection('title', 'Lecturer Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="dashboard-container">
    <h1>Welcome, <?php echo e(Auth::user()->name); ?></h1>
    <p>You are logged in as <strong>Lecturer</strong>.</p>

    <div class="dashboard-grid">
        <div class="card">
            <h3>Your Classes</h3>
            <p>Total classes you are teaching: <strong><?php echo e($class_count); ?></strong></p>
            <a href="<?php echo e(route('lecturer.class-sections.index')); ?>" class="btn-primary">View Classes</a>
        </div>

        <div class="card">
            <h3>Attendance</h3>
            <p>Record and monitor student attendance.</p>
            <a href="<?php echo e(route('lecturer.attendance.index')); ?>" class="btn-primary">Go</a>
        </div>

        <div class="card">
            <h3>Grades</h3>
            <p>Manage student grades for your classes.</p>
            <a href="<?php echo e(route('lecturer.grades.index')); ?>" class="btn-primary">Go</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/dashboard.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('js/dashboard.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.dashboard-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\frs_pweb\resources\views/dashboard/lecturer.blade.php ENDPATH**/ ?>