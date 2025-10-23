

<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="dashboard-container">
    <h1>Welcome, <?php echo e(Auth::user()->name); ?></h1>
    <p>You are logged in as <strong>Administrator</strong>.</p>

    <div class="dashboard-grid">
        
        <div class="card">
            <h3>Students</h3>
            <p>Total registered students: <strong><?php echo e($student_count); ?></strong></p>
            <a href="<?php echo e(route('admin.students.index')); ?>" class="btn-primary">Manage Students</a>
        </div>

        
        <div class="card">
            <h3>Lecturers</h3>
            <p>Total lecturers: <strong><?php echo e($lecturer_count); ?></strong></p>
            <a href="<?php echo e(route('admin.lecturers.index')); ?>" class="btn-primary">Manage Lecturers</a>
        </div>

        
        <div class="card">
            <h3>Courses</h3>
            <p>Total courses: <strong><?php echo e($course_count); ?></strong></p>
            <a href="<?php echo e(route('admin.courses.index')); ?>" class="btn-primary">Manage Courses</a>
        </div>

        
        <div class="card">
            <h3>Departments</h3>
            <p>Total departments: <strong><?php echo e($department_count); ?></strong></p>
            <a href="<?php echo e(route('admin.departments.index')); ?>" class="btn-primary">Manage Departments</a>
        </div>

        
        <div class="card">
            <h3>Academic Years</h3>
            <p>Manage academic years and active semester.</p>
            <a href="<?php echo e(route('admin.academic-years.index')); ?>" class="btn-primary">Go</a>
        </div>

        
        <div class="card">
            <h3>System Settings</h3>
            <p>Configure general system settings.</p>
            <a href="<?php echo e(route('admin.settings.index')); ?>" class="btn-primary">Go</a>
        </div>

        <div class="card" justify-self="center">
            <h3>User</h3>
            <p>Manage system users.</p>
            <a href="<?php echo e(route('admin.users.index')); ?>" class="btn-primary">Manage Users</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/dashboard.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('js/dashboard.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.dashboard-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\frs_pweb\resources\views/dashboard/admin.blade.php ENDPATH**/ ?>