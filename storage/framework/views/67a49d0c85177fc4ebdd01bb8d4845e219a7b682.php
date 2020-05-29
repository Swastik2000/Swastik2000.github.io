

<?php $__env->startSection('title', __('Manage Schools')); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="col-md-12" id="main-container">
            <div class="panel panel-default">
                <div class="panel-body table-responsive">
                    <?php echo $__env->make('schools.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <h2><?php echo app('translator')->get('School List'); ?></h2>
                    <h4><?php echo app('translator')->get('Manage Departments, Classs, Sections, Student Promotion, Course'); ?></h4>
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"><?php echo app('translator')->get('Name'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Code'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('About'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Edit'); ?></th>
                                <th scope="col">+<?php echo app('translator')->get('Admin'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('View Admins'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(($loop->index + 1)); ?></td>
                                    <td><small><?php echo e($school->name); ?></small></td>
                                    <td><small><?php echo e($school->code); ?></small></td>
                                    <td><small><?php echo e($school->about); ?></small></td>
                                    <td>
                                        <a class="btn btn-success btn-sm" role="button" href="<?php echo e(route('schools.edit', $school)); ?>" dusk="edit-school-link">
                                            <small><?php echo app('translator')->get('Edit School'); ?></small>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger btn-sm" role="button" href="<?php echo e(url('register/admin/'.$school->id.'/'.$school->code)); ?>">
                                            <small>+ <?php echo app('translator')->get('Create Admin'); ?></small>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-success btn-sm" role="button" href="<?php echo e(url('school/admin-list/'.$school->id)); ?>">
                                            <small><?php echo app('translator')->get('View Admins'); ?></small>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($schools->links()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\dev\Unifiedtransform\resources\views/schools/index.blade.php ENDPATH**/ ?>