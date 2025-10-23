

<?php $__env->startSection('title', 'My Enrollments'); ?>

<?php $__env->startSection('content'); ?>
<div class="dashboard-container">
    <h2 class="text-2xl font-semibold mb-4">My Enrollments - <?php echo e($academicYear->year ?? '-'); ?></h2>

    
    <div class="card overflow-x-auto mb-6">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Course Code</th>
                    <th class="px-4 py-2">Course Name</th>
                    <th class="px-4 py-2">Class Section</th>
                    <th class="px-4 py-2">Lecturer</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $enrollments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $enrollment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-b">
                        <td class="px-4 py-2"><?php echo e($index + 1); ?></td>
                        <td class="px-4 py-2"><?php echo e($enrollment->classSection->course->code ?? '-'); ?></td>
                        <td class="px-4 py-2"><?php echo e($enrollment->classSection->course->name ?? '-'); ?></td>
                        <td class="px-4 py-2"><?php echo e($enrollment->classSection->section_code ?? '-'); ?></td>
                        <td class="px-4 py-2"><?php echo e($enrollment->classSection->lecturer->user->name ?? '-'); ?></td>
                        <td class="px-4 py-2">
                            <form action="<?php echo e(route('student.enrollments.destroy', $enrollment->id)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to remove this enrollment?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn-primary bg-red-500 hover:bg-red-600">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="px-4 py-2 text-center text-gray-500">
                            You have not enrolled in any class yet.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    
    <div class="card">
        <h3 class="text-xl font-semibold mb-2">Enroll New Class</h3>
        <form action="<?php echo e(route('student.enrollments.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-4">
                <label for="class_section_id" class="block mb-1 font-medium">Select Class:</label>
                <select name="class_section_id" id="class_section_id" class="border p-2 rounded w-full">
                    <?php $__currentLoopData = $availableClasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($class->id); ?>">
                            <?php echo e($class->course->code ?? '-'); ?> - <?php echo e($class->course->name ?? '-'); ?> (<?php echo e($class->section_code ?? '-'); ?>)
                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['class_section_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <button type="submit" class="btn-primary">Enroll Class</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\frs_pweb\resources\views/student/enrollments/index.blade.php ENDPATH**/ ?>