

<?php $__env->startSection('title', __('Grade')); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2" id="side-navbar">
            <?php echo $__env->make('layouts.leftside-menubar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-8" id="main-container">
            <h2><?php echo app('translator')->get('Marks and Grades of All Classes'); ?></h2>
            <div class="panel panel-default">
              <?php if(count($classes) > 0): ?>
                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="panel panel-default">
                            <div class="page-panel-title" role="tab" id="heading<?php echo e($class->id); ?>">
                            <a class="panel-title collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo e($class->id); ?>" aria-expanded="false" aria-controls="collapse<?php echo e($class->id); ?>">
                                <h5>
                                <?php echo e($class->class_number); ?> <?php echo e($class->group); ?> <span class="pull-right"><b><?php echo app('translator')->get('Click to view all Sections under this Class'); ?>+</b></span>
                                </h5>
                            </a>
                            </div>
                            <div id="collapse<?php echo e($class->id); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo e($class->id); ?>">
                                <div class="panel-body">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col"><?php echo app('translator')->get('Section Name'); ?></th>
                                                <th scope="col"><?php echo app('translator')->get('View Each Student\'s Grade History'); ?></th>
                                                <th scope="col"><?php echo app('translator')->get('View all Students Marks under this Section'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($class->id == $section->class_id): ?>
                                                <tr>
                                                <td>
                                                    <a href="<?php echo e(url('grades/section/'.$section->id)); ?>"><?php echo e($section->section_number); ?></a>
                                                </td>
                                                <td>
                                                    <a href="<?php echo e(url('section/students/'.$section->id)); ?>" class="btn btn-info btn-xs"><i class="material-icons">visibility</i> <?php echo app('translator')->get('View Each Student\'s Grade History'); ?></a>
                                                </td>
                                                <td>
                                                    <a href="<?php echo e(url('grades/section/'.$section->id)); ?>" role="button" class="btn btn-xs btn-danger"><i class="material-icons">visibility</i> <?php echo app('translator')->get('View all Students Marks under this Section'); ?></a>
                                                </td>
                                                </tr>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\dev\Unifiedtransform\resources\views/grade/all-exams-grade.blade.php ENDPATH**/ ?>