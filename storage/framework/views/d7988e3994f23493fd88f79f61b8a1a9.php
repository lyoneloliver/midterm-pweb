

<?php $__env->startSection('title', 'Lecturers Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="dashboard-container">
    <h1>Lecturers</h1>

    
    <button class="btn-primary" data-modal-toggle="addLecturerModal">Add Lecturer</button>

    
    <div class="mt-4 overflow-x-auto">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">NIP</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $lecturers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lecturer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="px-4 py-2 border"><?php echo e($loop->iteration); ?></td>
                    <td class="px-4 py-2 border"><?php echo e($lecturer->user->name); ?></td>
                    <td class="px-4 py-2 border"><?php echo e($lecturer->user->email); ?></td>
                    <td class="px-4 py-2 border"><?php echo e($lecturer->nip); ?></td>
                    <td class="px-4 py-2 border">
                        <form method="POST" action="<?php echo e(route('admin.lecturers.destroy', $lecturer->id)); ?>" onsubmit="return confirm('Delete this lecturer?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn-primary bg-red-500 hover:bg-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="px-4 py-2 border text-center">No lecturers found.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>


<div id="addLecturerModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg w-96 p-6">
        <h2 class="text-xl font-semibold mb-4">Add Lecturer</h2>
        <form method="POST" action="<?php echo e(route('admin.lecturers.store')); ?>">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="name" class="block mb-1">Name</label>
                <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-3">
                <label for="email" class="block mb-1">Email</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-3">
                <label for="password" class="block mb-1">Password</label>
                <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-3">
                <label for="nip" class="block mb-1">NIP</label>
                <input type="text" name="nip" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="flex justify-end space-x-2 mt-4">
                <button type="button" class="btn-primary bg-gray-400 hover:bg-gray-500" data-modal-toggle="addLecturerModal">Cancel</button>
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

<?php echo $__env->make('layouts.dashboard-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\frs_pweb\resources\views/admin/lecturers/index.blade.php ENDPATH**/ ?>