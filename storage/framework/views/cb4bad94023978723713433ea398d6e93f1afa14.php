<button class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#schoolModal" dusk="create-school-button">
    + <?php echo app('translator')->get('Create School'); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="schoolModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form class="form-horizontal" method="POST" action="<?php echo e(route('schools.store')); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo app('translator')->get('Create School'); ?></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group<?php echo e($errors->has('school_name') ? ' has-error' : ''); ?>">
                        <label for="name" class="col-md-4 control-label"><?php echo app('translator')->get('School Name'); ?></label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" placeholder="<?php echo app('translator')->get('School Name'); ?>" required>

                            <?php if($errors->has('name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('medium') ? ' has-error' : ''); ?>">
                        <label for="medium" class="col-md-4 control-label"><?php echo app('translator')->get('School Medium'); ?></label>

                        <div class="col-md-6">
                            <select id="medium" class="form-control" name="medium">
                                <option selected="selected"><?php echo app('translator')->get('Bangla'); ?></option>
                                <option><?php echo app('translator')->get('English'); ?></option>
                                <option><?php echo app('translator')->get('Hindi'); ?></option>
                                <option><?php echo app('translator')->get('Spanish'); ?></option>
                                <option><?php echo app('translator')->get('Chinese'); ?></option>
                                <option><?php echo app('translator')->get('Arabic'); ?></option>
                            </select>

                            <?php if($errors->has('medium')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('medium')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('established') ? ' has-error' : ''); ?>">
                        <label for="established" class="col-md-4 control-label"><?php echo app('translator')->get('School Established'); ?></label>

                        <div class="col-md-6">
                            <input id="established" type="text" class="form-control" name="established" value="<?php echo e(old('established')); ?>" placeholder="<?php echo app('translator')->get('School Established'); ?>" required>

                            <?php if($errors->has('established')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('established')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('about') ? ' has-error' : ''); ?>">
                        <label for="about" class="col-md-4 control-label"><?php echo app('translator')->get('About'); ?></label>

                        <div class="col-md-6">
                            <textarea id="about" class="form-control" rows="3" name="about" placeholder="<?php echo app('translator')->get('About School'); ?>" required><?php echo e(old('about')); ?></textarea>

                            <?php if($errors->has('about')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('about')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                    <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('Save changes'); ?></button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php /**PATH C:\dev\Unifiedtransform\resources\views/schools/form.blade.php ENDPATH**/ ?>