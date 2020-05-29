

<?php $__env->startSection('title', __('Add Notice')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2" id="side-navbar">
            <?php echo $__env->make('layouts.leftside-menubar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-10" id="main-container">
            <div class="panel panel-default">
                <div class="page-panel-title"><?php echo app('translator')->get('Add Notice'); ?></div>
                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <?php $__env->startComponent('components.file-uploader',['upload_type'=>'notice']); ?>
                    <?php if (isset($__componentOriginal1e90512e9353b27ea22fa15aa0057aab987fcfe7)): ?>
<?php $component = $__componentOriginal1e90512e9353b27ea22fa15aa0057aab987fcfe7; ?>
<?php unset($__componentOriginal1e90512e9353b27ea22fa15aa0057aab987fcfe7); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
                    <?php $__env->startComponent('components.uploaded-files-list',['files'=>$files,'upload_type'=>'notice']); ?>
                    <?php if (isset($__componentOriginal55ccef753718358ebaec0750c6d2c7a9c3e20831)): ?>
<?php $component = $__componentOriginal55ccef753718358ebaec0750c6d2c7a9c3e20831; ?>
<?php unset($__componentOriginal55ccef753718358ebaec0750c6d2c7a9c3e20831); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\dev\Unifiedtransform\resources\views/notices/create.blade.php ENDPATH**/ ?>