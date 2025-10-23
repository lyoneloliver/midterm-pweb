

<?php $__env->startSection('title', 'My Schedule'); ?>

<?php $__env->startSection('content'); ?>
<div class="dashboard-container">
    <h2 class="text-2xl font-semibold mb-4">My Schedule - <?php echo e($semester); ?></h2>

    <?php $__empty_1 = true; $__currentLoopData = $schedule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="card mb-4">
            <h3 class="text-xl font-semibold mb-2"><?php echo e($class['course_code']); ?> - <?php echo e($class['course_name']); ?></h3>
            <p class="mb-1"><strong>Class:</strong> <?php echo e($class['class_name']); ?></p>
            <p class="mb-1"><strong>Lecturer:</strong> <?php echo e($class['lecturer']); ?></p>

            <?php if(count($class['schedules']) > 0): ?>
                <table class="w-full table-auto mt-2">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2">Day</th>
                            <th class="px-4 py-2">Start Time</th>
                            <th class="px-4 py-2">End Time</th>
                            <th class="px-4 py-2">Room</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $class['schedules']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sched): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b">
                            <td class="px-4 py-2"><?php echo e($sched['day']); ?></td>
                            <td class="px-4 py-2"><?php echo e($sched['start_time']); ?></td>
                            <td class="px-4 py-2"><?php echo e($sched['end_time']); ?></td>
                            <td class="px-4 py-2"><?php echo e($sched['room']); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-gray-500 mt-2">No schedule available for this class.</p>
            <?php endif; ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="card text-center">
            <p>No schedule found for this semester.</p>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\frs_pweb\resources\views/student/schedule/index.blade.php ENDPATH**/ ?>