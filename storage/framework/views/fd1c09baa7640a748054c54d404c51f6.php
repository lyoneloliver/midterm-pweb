<aside class="w-64 bg-blue-700 text-white flex flex-col">
    <div class="p-4 text-2xl font-bold border-b border-blue-500">
        FRS System
    </div>

    <nav class="flex-1 p-4 space-y-2">
        <?php if(Auth::user()->role === 'admin'): ?>
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="sidebar-link">Dashboard</a>
            <a href="<?php echo e(route('admin.users.index')); ?>" class="sidebar-link">Users</a>
            <a href="<?php echo e(route('admin.departments.index')); ?>" class="sidebar-link">Departments</a>
            <a href="<?php echo e(route('admin.courses.index')); ?>" class="sidebar-link">Courses</a>
            <a href="<?php echo e(route('admin.settings.index')); ?>" class="sidebar-link">Settings</a>

        <?php elseif(Auth::user()->role === 'lecturer'): ?>
            <a href="<?php echo e(route('lecturer.dashboard')); ?>" class="sidebar-link">Dashboard</a>
            <a href="<?php echo e(route('lecturer.class-sections.index')); ?>" class="sidebar-link">Classes</a>
            <a href="<?php echo e(route('lecturer.attendance.index')); ?>" class="sidebar-link">Attendance</a>
            <a href="<?php echo e(route('lecturer.grades.index')); ?>" class="sidebar-link">Grades</a>

        <?php elseif(Auth::user()->role === 'student'): ?>
            <a href="<?php echo e(route('student.dashboard')); ?>" class="sidebar-link">Dashboard</a>
            <a href="<?php echo e(route('student.enrollments.index')); ?>" class="sidebar-link">Enrollments</a>
            <a href="<?php echo e(route('student.schedule.index')); ?>" class="sidebar-link">Schedule</a>
            <a href="<?php echo e(route('student.semester-enrollments.index')); ?>" class="sidebar-link">Grades</a>
        <?php endif; ?>
    </nav>

    <footer class="p-4 text-sm text-center border-t border-blue-500">
        &copy; <?php echo e(date('Y')); ?> FRS System
    </footer>
</aside>
<?php /**PATH C:\xampp\htdocs\frs_pweb\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>