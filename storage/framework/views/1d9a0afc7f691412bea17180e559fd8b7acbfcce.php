<form class="form-horizontal" action="<?php echo e(url('exams/create')); ?>" method="post">
    <?php echo e(csrf_field()); ?>

    <div class="form-group<?php echo e($errors->has('term') ? ' has-error' : ''); ?>">
        <label for="term" class="col-md-4 control-label"><?php echo app('translator')->get('Terms'); ?></label>

        <div class="col-md-6">
            <select id="term" class="form-control" name="term">
               <option value="1"><?php echo app('translator')->get('1st Term'); ?></option>
               <option value="2"><?php echo app('translator')->get('2nd Term'); ?></option>
               <option value="3"><?php echo app('translator')->get('3rd Term'); ?></option>
            </select>

            <?php if($errors->has('term')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('term')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group<?php echo e($errors->has('exam_name') ? ' has-error' : ''); ?>">
        <label for="exam_name" class="col-md-4 control-label"><?php echo app('translator')->get('Examination Name'); ?></label>

        <div class="col-md-6">
            <input id="exam_name" type="text" class="form-control" name="exam_name" value="<?php echo e(old('exam_name')); ?>" placeholder="<?php echo app('translator')->get('Semester 1 Exam 2018, Final Exam 2019, ...'); ?>" required>

            <?php if($errors->has('exam_name')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('exam_name')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group<?php echo e($errors->has('start_date') ? ' has-error' : ''); ?>">
        <label for="start_date" class="col-md-4 control-label"><?php echo app('translator')->get('Start Date'); ?></label>

        <div class="col-md-6">
            <input id="start_date" type="text" class="form-control" name="start_date" value="<?php echo e(old('start_date')); ?>" placeholder="<?php echo app('translator')->get('5th April...'); ?>" required>

            <?php if($errors->has('start_date')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('start_date')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group<?php echo e($errors->has('end_date') ? ' has-error' : ''); ?>">
        <label for="end_date" class="col-md-4 control-label"><?php echo app('translator')->get('End Date'); ?></label>

        <div class="col-md-6">
            <input id="end_date" type="text" class="form-control" name="end_date" value="<?php echo e(old('end_date')); ?>" placeholder="<?php echo app('translator')->get('20th April...'); ?>" required>

            <?php if($errors->has('end_date')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('end_date')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group<?php echo e($errors->has('classes') ? ' has-error' : ''); ?>">
        <label for="classes" class="col-md-4 control-label"><?php echo app('translator')->get('For Class'); ?></label>

        <div class="col-md-6">
            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(in_array($class->id, $assigned_classes->pluck('class_id')->toArray())): ?>
                    <div class="checkbox">
                        <?php echo e($class->class_number); ?> <?php echo app('translator')->get('already assigned to Exam'); ?> <b>
                        <?php $__currentLoopData = $assigned_classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assigned_class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($assigned_class->class_id == $class->id): ?>
                                <?php echo e($assigned_class->exam->exam_name); ?>

                                <?php break; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </b>
                    </div>
                <?php else: ?>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="classes[]" value="<?php echo e($class->id); ?>"> <?php echo e($class->class_number); ?>

                    </label>
                </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($errors->has('classes')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('classes')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            <a href="javascript:history.back()" class="btn btn-danger" style="margin-right: 2%;" role="button"><?php echo app('translator')->get('Cancel'); ?></a>
            <button type="submit" class="btn btn-success"><?php echo app('translator')->get('Save'); ?></button>
        </div>
    </div>
</form>
<?php /**PATH C:\dev\Unifiedtransform\resources\views/components/add-exam-form.blade.php ENDPATH**/ ?>