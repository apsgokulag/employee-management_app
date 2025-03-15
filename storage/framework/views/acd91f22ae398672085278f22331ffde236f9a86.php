

<?php $__env->startSection('content'); ?>
<div class="bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold mb-6">Dashboard</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
            <h2 class="text-xl font-semibold text-blue-700 mb-2">Total Employees</h2>
            <p class="text-3xl font-bold"><?php echo e($totalEmployees); ?></p>
        </div>
        
        <div class="bg-green-50 border border-green-200 rounded-lg p-6">
            <h2 class="text-xl font-semibold text-green-700 mb-2">Your Role</h2>
            <p class="text-3xl font-bold capitalize"><?php echo e(Auth::user()->role); ?></p>
        </div>
        
        <div class="bg-purple-50 border border-purple-200 rounded-lg p-6">
            <h2 class="text-xl font-semibold text-purple-700 mb-2">Quick Access</h2>
            <div class="mt-4">
                <a href="<?php echo e(route('employees.index')); ?>" class="block bg-purple-600 text-white py-2 px-4 rounded text-center hover:bg-purple-700">
                    View Employees
                </a>
                
                <?php if(Auth::user()->isAdmin()): ?>
                    <a href="<?php echo e(route('employees.create')); ?>" class="block mt-2 bg-purple-600 text-white py-2 px-4 rounded text-center hover:bg-purple-700">
                        Add New Employee
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEVELOP\PHP\employee-management\resources\views/dashboard.blade.php ENDPATH**/ ?>