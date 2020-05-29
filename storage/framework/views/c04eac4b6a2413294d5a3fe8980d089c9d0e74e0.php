

<?php $__env->startSection('title', __('Edit School')); ?>

<?php $__env->startSection('content'); ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <h2 class="text-center"><?php echo app('translator')->get('Edit'); ?> <?php echo e($school->name); ?></h2>

            <form class="form-horizontal" action="<?php echo e(route('schools.update', $school)); ?>" method="post">
                <input type="hidden" name="_method" value="PUT">
                <?php echo e(csrf_field()); ?>

                <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                    <label for="name" class="col-md-4 control-label"><?php echo app('translator')->get('School Name'); ?></label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="<?php echo e($school->name); ?>" placeholder="<?php echo app('translator')->get('School Name'); ?>" required>

                        <?php if($errors->has('name')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('name')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group<?php echo e($errors->has('about') ? ' has-error' : ''); ?>">
                    <label for="about" class="col-md-4 control-label"><?php echo app('translator')->get('About School'); ?></label>

                    <div class="col-md-6">
                        <textarea id="about" type="text" class="form-control" name="about"
                            placeholder="<?php echo app('translator')->get('About School'); ?>" required><?php echo e($school->about); ?></textarea>

                        <?php if($errors->has('about')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('about')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <a href="<?php echo e(route('schools.index')); ?>" class="btn btn-primary"><?php echo app('translator')->get('Back'); ?></a>
                        <button type="submit" class="btn btn-danger"><?php echo app('translator')->get('Save'); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\dev\Unifiedtransform\resources\views/schools/edit.blade.php ENDPATH**/ ?>