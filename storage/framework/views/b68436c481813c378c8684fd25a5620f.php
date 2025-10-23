

<?php $__env->startSection('title', 'Academic Years'); ?>

<?php $__env->startSection('content'); ?>
<div class="dashboard-container">
    <h1>Academic Years</h1>

    
    <button class="btn-primary" data-modal-toggle="addYearModal">Add Academic Year</button>

    
    <div class="mt-4 overflow-x-auto">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">Year</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $academicYears; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="px-4 py-2 border"><?php echo e($loop->iteration); ?></td>
                    <td class="px-4 py-2 border"><?php echo e($year->year); ?></td>
                    <td class="px-4 py-2 border">
                        <?php if($year->is_active): ?>
                            <span class="text-green-600 font-semibold">Active</span>
                        <?php else: ?>
                            <span class="text-gray-500">Inactive</span>
                        <?php endif; ?>
                    </td>
                    <td class="px-4 py-2 border">
                        <?php if(!$year->is_active): ?>
                        <form method="POST" action="<?php echo e(route('admin.academic-years.activate', $year->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <button type="submit" class="btn-primary bg-blue-600 hover:bg-blue-700">Activate</button>
                        </form>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="4" class="px-4 py-2 border text-center">No academic years found.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>


<div id="addYearModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg w-96 p-6">
        <h2 class="text-xl font-semibold mb-4">Add Academic Year</h2>
        <form method="POST" action="<?php echo e(route('admin.academic-years.store')); ?>">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="year" class="block mb-1">Year</label>
                <input type="text" name="year" class="w-full border rounded px-3 py-2" placeholder="2025 - Ganjil" required>
            </div>

            <div class="mb-3 flex items-center space-x-2">
                <input type="checkbox" name="is_active" id="is_active">
                <label for="is_active" class="block">Set as active</label>
            </div>

            <div class="flex justify-end space-x-2 mt-4">
                <button type="button" class="btn-primary bg-gray-400 hover:bg-gray-500" data-modal-toggle="addYearModal">Cancel</button>
                <button type="submit" class="btn-primary bg-blue-600 hover:bg-blue-700">Save</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/dashboard.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    // Toggle modal
    document.querySelectorAll('[data-modal-toggle]').forEach(btn => {
        btn.addEventListener('click', function() {
            const modalId = this.getAttribute('data-modal-toggle');
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.dashboard-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\frs_pweb\resources\views/admin/academic_years/index.blade.php ENDPATH**/ ?>