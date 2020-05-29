
<?php $__env->startSection('title', __('Add Examination')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2" id="side-navbar">
            <?php echo $__env->make('layouts.leftside-menubar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-8" id="main-container">
            <div class="panel panel-default">
                <div class="page-panel-title"><?php echo app('translator')->get('Add Examination'); ?></div>

                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <?php $__env->startComponent('components.add-exam-form',['classes'=>$classes,'assigned_classes'=>$already_assigned_classes,]); ?>
                    <?php if (isset($__componentOriginal530c232d8d2b37d31dc3b7ea8fe3412d058e065d)): ?>
<?php $component = $__componentOriginal530c232d8d2b37d31dc3b7ea8fe3412d058e065d; ?>
<?php unset($__componentOriginal530c232d8d2b37d31dc3b7ea8fe3412d058e065d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\dev\Unifiedtransform\resources\views/exams/add.blade.php ENDPATH**/ ?>