

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="page-panel-title"><?php echo app('translator')->get('Dashboard'); ?></div>

                <div class="panel-body">
                    <a class="btn btn-danger btn-lg btn-block" href="<?php echo e(route('schools.index')); ?>" role="button">
                        <?php echo app('translator')->get('Manage Schools'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\dev\Unifiedtransform\resources\views/masters/index.blade.php ENDPATH**/ ?>