

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gradient-to-b from-white to-blue-100 pt-10 px-4 md:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-8 mb-8 animate-fade-in">
            <div class="flex items-center space-x-4">
                <img src="<?php echo e($user->imageUrl); ?>" alt="Profile Image" class="w-24 h-24 rounded-full object-cover border-4 border-blue-500">
                <div>
                    <h1 class="text-3xl font-semibold text-gray-800"><?php echo e($user->name); ?></h1>
                    <p class="text-xl text-gray-500"><?php echo e($user->role); ?></p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-lg p-6 border border-gray-200 hover:shadow-xl transition duration-300 ease-in-out">
                <div class="flex items-center space-x-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-blue-500">
                        <path d="M21 12H3m0 0L12 3m-9 9l9 9"></path>
                    </svg>
                    <span class="font-medium text-gray-700">EMAIL ADDRESS</span>
                </div>
                <p class="text-gray-600 mt-2"><?php echo e($user->email); ?></p>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6 border border-gray-200 hover:shadow-xl transition duration-300 ease-in-out">
                <div class="flex items-center space-x-4">
                    <i class="fa fa-user text-green-500 h-6 w-6" aria-hidden="true"></i>
                    <span class="font-medium text-gray-700">ROLE</span>
                </div>
                <p class="text-gray-600 mt-2"><?php echo e($user->role); ?></p>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6 border border-gray-200 hover:shadow-xl transition duration-300 ease-in-out md:col-span-2">
                <div class="flex items-center space-x-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-yellow-500">
                        <path d="M8 7V4M8 7H4m4 0h4M12 17h6M12 17h-6m6-6H6m6-6H6m6-6h-2m4-6v6"></path>
                    </svg>
                    <span class="font-medium text-gray-700">DATE OF JOINING</span>
                </div>
                <p class="text-gray-600 mt-2"><?php echo e($user->doj ? $user->doj->format('M d, Y') : 'N/A'); ?></p>
            </div>
        </div>

        <div class="flex justify-center md:justify-end animate-fade-in">
            <a href="<?php echo e(route('auth.profile.edit')); ?>" class="bg-blue-600 text-white py-2 px-6 rounded-full hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                <svg class="h-5 w-5 inline-block mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 5v14M5 12l7 7 7-7"></path>
                </svg>
                Edit Profile
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEVELOP\PHP\employee-management\resources\views/auth/profile.blade.php ENDPATH**/ ?>