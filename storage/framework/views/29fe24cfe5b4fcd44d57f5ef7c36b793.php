

<?php $__env->startSection('title', 'Attendance - ' . ($classSection->course->name ?? '')); ?>

<?php $__env->startSection('content'); ?>
<div class="dashboard-container">
    <h2 class="text-2xl font-semibold mb-4">
        Attendance - <?php echo e($classSection->course->code ?? '-'); ?> <?php echo e($classSection->section_code ?? ''); ?>

    </h2>

    <div class="mb-4">
        <p><strong>Date:</strong> <?php echo e($today); ?></p>
        <p><strong>Academic Year:</strong> <?php echo e($classSection->academicYear->year ?? '-'); ?></p>
        <p><strong>Lecturer:</strong> <?php echo e($classSection->lecturer->user->name ?? '-'); ?></p>
    </div>

    <form action="<?php echo e(route('lecturer.attendance.store', $classSection->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="card overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Student NRP</th>
                        <th class="px-4 py-2">Student Name</th>
                        <th class="px-4 py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $enrollments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $enrollment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="border-b">
                            <td class="px-4 py-2"><?php echo e($index + 1); ?></td>
                            <td class="px-4 py-2"><?php echo e($enrollment->student->NRP ?? '-'); ?></td>
                            <td class="px-4 py-2"><?php echo e($enrollment->student->user->name ?? '-'); ?></td>
                            <td class="px-4 py-2">
                                <select name="attendance[<?php echo e($enrollment->id); ?>]" class="border p-2 rounded">
                                    <option value="present" <?php echo e((isset($attendances[$enrollment->id]) && $attendances[$enrollment->id] == 'present') ? 'selected' : ''); ?>>Present</option>
                                    <option value="absent" <?php echo e((isset($attendances[$enrollment->id]) && $attendances[$enrollment->id] == 'absent') ? 'selected' : ''); ?>>Absent</option>
                                    <option value="late" <?php echo e((isset($attendances[$enrollment->id]) && $attendances[$enrollment->id] == 'late') ? 'selected' : ''); ?>>Late</option>
                                </select>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4" class="px-4 py-2 text-center text-gray-500">
                                No students enrolled in this class section.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn-primary">Save Attendance</button>
            <a href="<?php echo e(route('lecturer.attendance.index')); ?>" class="btn-primary bg-gray-500 hover:bg-gray-600 ml-2">Back</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\frs_pweb\resources\views/lecturer/attendance/show.blade.php ENDPATH**/ ?>