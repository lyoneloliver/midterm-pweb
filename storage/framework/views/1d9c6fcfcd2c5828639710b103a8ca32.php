

<?php $__env->startSection('title', 'My Semester Enrollments'); ?>

<?php $__env->startSection('content'); ?>
<div class="dashboard-container">
    <h2 class="text-2xl font-semibold mb-4">My Semester Enrollments</h2>

    <div class="card overflow-x-auto">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Academic Year</th>
                    <th class="px-4 py-2">Total SKS</th>
                    <th class="px-4 py-2">GPA / IP</th>
                    <th class="px-4 py-2">Approved By</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $semesters ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $semester): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-b">
                        <td class="px-4 py-2"><?php echo e($index + 1); ?></td>
                        <td class="px-4 py-2"><?php echo e($semester->academicYear->year ?? '-'); ?></td>
                        <td class="px-4 py-2"><?php echo e($semester->total_sks ?? 0); ?></td>
                        <td class="px-4 py-2"><?php echo e($semester->total_gpa ?? '-'); ?></td>
                        <td class="px-4 py-2"><?php echo e($semester->approved_by ? $semester->approver->name : '-'); ?></td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="<?php echo e(route('student.semester-enrollments.show', $semester->id)); ?>" class="btn-primary">View</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="px-4 py-2 text-center text-gray-500">
                            No semester enrollment data found.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\frs_pweb\resources\views/student/semesters/index.blade.php ENDPATH**/ ?>