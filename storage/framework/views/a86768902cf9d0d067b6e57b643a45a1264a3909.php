<form action="<?php echo e(url('users/import/user-xlsx')); ?>" method="post" enctype="multipart/form-data">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="type" value="<?php echo e($type); ?>">
    <div class="form-group">
        <input type="file" name="file">
    </div>
    <input type="submit" class="btn btn-default btn-sm" value="<?php echo app('translator')->get('Upload'); ?>">
</form>
<?php /**PATH C:\dev\Unifiedtransform\resources\views/components/excel-upload-form.blade.php ENDPATH**/ ?>