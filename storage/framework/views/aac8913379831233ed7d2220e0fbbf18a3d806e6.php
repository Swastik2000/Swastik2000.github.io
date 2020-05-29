<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addClassModal<?php echo e($school->id); ?>">+<?php echo app('translator')->get('Add New Class'); ?></button>

<!-- Modal -->
<div class="modal fade" id="addClassModal<?php echo e($school->id); ?>" tabindex="-1" role="dialog" aria-labelledby="addClassModal<?php echo e($school->id); ?>Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel"><?php echo app('translator')->get('Add New Class'); ?></h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" action="<?php echo e(url('school/add-class')); ?>" method="post">
          <?php echo e(csrf_field()); ?>

          <div class="form-group">
            <label for="classNumber<?php echo e($school->id); ?>" class="col-sm-4 control-label"><?php echo app('translator')->get('Class Number/Name'); ?></label>
            <div class="col-sm-8">
              <input type="text" name="class_number" class="form-control" id="classNumber<?php echo e($school->id); ?>" placeholder="<?php echo app('translator')->get('Class Number/Name'); ?>" required>
            </div>
          </div>
          
          <div class="form-group">
            <label for="classRoomNumber<?php echo e($school->id); ?>" class="col-sm-4 control-label"><?php echo app('translator')->get('Class Group (If Any)'); ?></label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="group" id="classRoomNumber<?php echo e($school->id); ?>" placeholder="<?php echo app('translator')->get('Science, Commerce, Arts, etc.'); ?>">
              <span id="helpBlock" class="help-block"><?php echo app('translator')->get('Leave Empty if this Class belongs to no Group'); ?></span>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-danger btn-sm"><?php echo app('translator')->get('Submit'); ?></button>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
      </div>
    </div>
  </div>
</div>
<?php /**PATH C:\dev\Unifiedtransform\resources\views/layouts/master/add-class-form.blade.php ENDPATH**/ ?>