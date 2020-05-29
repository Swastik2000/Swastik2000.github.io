

<?php $__env->startSection('title', __('Admins')); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2" id="side-navbar">
            <?php if(session('status')): ?>
            <div class="alert alert-success">
                <?php echo e(session('status')); ?>

            </div>
            <?php endif; ?>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('schools.index')); ?>"><i class="material-icons">gamepad</i> <?php echo app('translator')->get('Manage School'); ?></a>
                </li>
            </ul>
        </div>
        <div class="col-md-10" id="main-container">
            <h2>Admins</h2>
            <div class="panel panel-default">
                <?php if(count($admins) > 0): ?>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th><?php echo app('translator')->get('Action'); ?></th>
                            <th><?php echo app('translator')->get('Action'); ?></th>
                            <th><?php echo app('translator')->get('Name'); ?></th>
                            <th><?php echo app('translator')->get('Code'); ?></th>
                            <th><?php echo app('translator')->get('Email'); ?></th>
                            <th><?php echo app('translator')->get('Phone Number'); ?></th>
                            <th><?php echo app('translator')->get('Address'); ?></th>
                            <th><?php echo app('translator')->get('About'); ?></th>
                        </tr>
                        <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php if($admin->active == 0): ?>
                                <a href="<?php echo e(url('master/activate-admin/'.$admin->id)); ?>" class="btn btn-xs btn-success"
                                    role="button"><i class="material-icons">
                                        done
                                    </i><?php echo app('translator')->get('Activate'); ?></a>
                                <?php else: ?>
                                <a href="<?php echo e(url('master/deactivate-admin/'.$admin->id)); ?>" class="btn btn-xs btn-danger"
                                    role="button"><i class="material-icons">
                                        clear
                                    </i><?php echo app('translator')->get('Deactivate'); ?></a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo e(url('edit/user/'.$admin->id)); ?>" class="btn btn-xs btn-info"
                                    role="button"><i class="material-icons">
                                        edit
                                    </i> <?php echo app('translator')->get('Edit'); ?></a>
                            </td>
                            <td>
                                <?php echo e($admin->name); ?>

                            </td>
                            <td><?php echo e($admin->student_code); ?></td>
                            <td><?php echo e($admin->email); ?></td>
                            <td><?php echo e($admin->phone_number); ?></td>
                            <td><?php echo e($admin->address); ?></td>
                            <td><?php echo e($admin->about); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
                <?php else: ?>
                <div class="panel-body">
                    <?php echo app('translator')->get('No Related Data Found.'); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\dev\Unifiedtransform\resources\views/school/admin-list.blade.php ENDPATH**/ ?>