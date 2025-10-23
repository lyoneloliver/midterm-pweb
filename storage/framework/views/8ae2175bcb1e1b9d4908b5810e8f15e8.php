

<?php $__env->startSection('title', 'My Class Sections Attendance'); ?>

<?php $__env->startSection('content'); ?>
<div class="dashboard-container">
    <h2 class="text-2xl font-semibold mb-4">My Class Sections</h2>

    <div class="card overflow-x-auto">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Academic Year</th>
                    <th class="px-4 py-2">Course Code</th>
                    <th class="px-4 py-2">Course Name</th>
                    <th class="px-4 py-2">Section Code</th>
                    <th class="px-4 py-2">Capacity</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $classSections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-b">
                        <td class="px-4 py-2"><?php echo e($index + 1); ?></td>
                        <td class="px-4 py-2"><?php echo e($class->academicYear->year ?? '-'); ?></td>
                        <td class="px-4 py-2"><?php echo e($class->course->code ?? '-'); ?></td>
                        <td class="px-4 py-2"><?php echo e($class->course->name ?? '-'); ?></td>
                        <td class="px-4 py-2"><?php echo e($class->section_code ?? '-'); ?></td>
                        <td class="px-4 py-2"><?php echo e($class->capacity ?? '-'); ?></td>
                        <td class="px-4 py-2">
                            <a href="<?php echo e(route('lecturer.attendance.show', $class->id)); ?>" class="btn-primary">Manage Attendance</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="px-4 py-2 text-center text-gray-500">
                            No class sections found.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\frs_pweb\resources\views/lecturer/attendance/index.blade.php ENDPATH**/ ?>