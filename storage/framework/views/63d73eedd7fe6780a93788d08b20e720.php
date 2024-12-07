<?php $__env->startSection('title', 'users'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                    <h6 class="text-white text-capitalize p-2 mb-0">Users</h6>
                    <a href="<?php echo e(route('users.create')); ?>" class="badge badge-sm bg-gradient-success me-2">Add User</a>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="table-users">
                    <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">SL NO</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Full Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm"><?php echo e($index + 1); ?></h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-3 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm"><?php echo e($user->name); ?></h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-1 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm"><?php echo e($user->email); ?></h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-1 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm"><?php if($user->active == 1): ?>
                                    <span class="badge badge-sm bg-gradient-success">Enabled</span>
                                    <?php else: ?>
                                    <span class="badge badge-sm bg-gradient-secondary">Disabled</span>
                                    <?php endif; ?></h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-1 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm"><?php echo e(ucfirst($user->role)); ?></h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-1 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="text-primary me-2" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="<?php echo e(route('users.delete', $user->id)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" style="border:none; background:none;" title="Delete" onclick="return confirm('Are you sure you want to delete this classroom?')">
                                        <i class="fa fa-trash text-primary" aria-hidden="true"></i>
                                    </button>
                                </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel12.loc/resources/views/users/index.blade.php ENDPATH**/ ?>