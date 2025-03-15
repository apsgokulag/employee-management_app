

<?php $__env->startSection('content'); ?>
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Employees</h1>
        
        <?php if(Auth::user()->isAdmin()): ?>
            <a href="<?php echo e(route('employees.create')); ?>" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                Add Employee
            </a>
        <?php endif; ?>
    </div>
    
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-3 px-4 bg-gray-100 border-b text-left">Employee ID</th>
                    <th class="py-3 px-4 bg-gray-100 border-b text-left">Name</th>
                    <th class="py-3 px-4 bg-gray-100 border-b text-left">Email</th>
                    <th class="py-3 px-4 bg-gray-100 border-b text-left">Date of Birth</th>
                    <th class="py-3 px-4 bg-gray-100 border-b text-left">Date of Joining</th>
                    <th class="py-3 px-4 bg-gray-100 border-b text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-4 border-b"><?php echo e($employee->employee_id); ?></td>
                        <td class="py-3 px-4 border-b"><?php echo e($employee->name); ?></td>
                        <td class="py-3 px-4 border-b"><?php echo e($employee->email); ?></td>
                        <td class="py-3 px-4 border-b"><?php echo e($employee->dob->format('M d, Y')); ?></td>
                        <td class="py-3 px-4 border-b"><?php echo e($employee->doj->format('M d, Y')); ?></td>
                        <td class="py-3 px-4 border-b text-center">
                            <a href="<?php echo e(route('employees.show', $employee)); ?>" class="text-blue-600 hover:underline mr-2">
                                View
                            </a>
                            
                            <?php if(Auth::user()->isAdmin()): ?>
                                <a href="<?php echo e(route('employees.edit', $employee)); ?>" class="text-green-600 hover:underline mr-2">
                                    Edit
                                </a>
                                
                                <form action="<?php echo e(route('employees.destroy', $employee)); ?>" method="POST" class="inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Are you sure you want to delete this employee?')">
                                        Delete
                                    </button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="py-3 px-4 text-center">No employees found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
    <div class="mt-4">
        <?php echo e($employees->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEVELOP\PHP\employee-management\resources\views/employees/index.blade.php ENDPATH**/ ?>