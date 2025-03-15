

<?php $__env->startSection('content'); ?>
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Employee Details</h1>
        
        <div>
            <a href="<?php echo e(route('employees.index')); ?>" class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-700">
                Back to List
            </a>
            
            <?php if(Auth::user()->isAdmin()): ?>
                <a href="<?php echo e(route('employees.edit', $employee)); ?>" class="ml-2 bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                    Edit
                </a>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h2 class="text-gray-600 text-sm">Employee ID</h2>
                <p class="text-lg font-semibold"><?php echo e($employee->employee_id); ?></p>
            </div>
            
            <div>
                <h2 class="text-gray-600 text-sm">Name</h2>
                <p class="text-lg font-semibold"><?php echo e($employee->name); ?></p>
            </div>
            
            <div>
                <h2 class="text-gray-600 text-sm">Email</h2>
                <p class="text-lg font-semibold"><?php echo e($employee->email); ?></p>
            </div>
            
            <div>
                <h2 class="text-gray-600 text-sm">Date of Birth</h2>
                <p class="text-lg font-semibold"><?php echo e($employee->dob->format('M d, Y')); ?></p>
            </div>
            
            <div>
                <h2 class="text-gray-600 text-sm">Date of Joining</h2>
                <p class="text-lg font-semibold"><?php echo e($employee->doj->format('M d, Y')); ?></p>
            </div>
            
            <div>
                <h2 class="text-gray-600 text-sm">Created At</h2>
                <p class="text-lg font-semibold"><?php echo e($employee->created_at->format('M d, Y H:i')); ?></p>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEVELOP\PHP\employee-management\resources\views/employees/show.blade.php ENDPATH**/ ?>