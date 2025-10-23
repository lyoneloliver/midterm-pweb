

<?php $__env->startSection('title', 'Student Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="dashboard-container">
    <h1>Welcome, <?php echo e(Auth::user()->name); ?></h1>
    <p>You are logged in as <strong>Student</strong>.</p>

    <div class="dashboard-grid">
        
        <?php if($semester): ?>
        <div class="card">
            <h3>Current Semester</h3>
            <p><?php echo e($semester->academicYear->year ?? '-'); ?> - <?php echo e($semester->semester_type ?? '-'); ?></p>
        </div>
        <?php endif; ?>

        
        <div class="card">
            <h3>Enrollments</h3>
            <p>Total classes this semester: <strong><?php echo e($enrollment_count); ?></strong></p>
            <a href="<?php echo e(route('student.enrollments.index')); ?>" class="btn-primary">View Enrollments</a>
        </div>

        
        <div class="card">
            <h3>My Schedule</h3>
            <p>View your current semester schedule.</p>
            <a href="<?php echo e(route('student.schedule.index')); ?>" class="btn-primary">View Schedule</a>
        </div>

        
        <div class="card">
            <h3>Grades / History</h3>
            <p>View grades of previous semesters.</p>
            <a href="<?php echo e(route('student.semester-enrollments.index')); ?>" class="btn-primary">View Grades</a>
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

<?php echo $__env->make('layouts.dashboard-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\frs_pweb\resources\views/dashboard/student.blade.php ENDPATH**/ ?>