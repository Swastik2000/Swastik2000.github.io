<div class="table-responsive">
  <table class="table table-bordered table-data-div table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col"><?php echo app('translator')->get('File Name'); ?></th>
        <?php if($upload_type == 'syllabus' && $parent == 'class'): ?>
          <th scope="col"><?php echo app('translator')->get('Class'); ?></th>
        <?php elseif($upload_type == 'routine' && $parent == 'section'): ?>
          <th scope="col"><?php echo app('translator')->get('section'); ?></th>
        <?php endif; ?>
        <th scope="col"><?php echo app('translator')->get('Is Active'); ?></th>
        <th scope="col"><?php echo app('translator')->get('Action'); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e(($loop->index + 1)); ?></td>
        <td><a href="<?php echo e(url($file->file_path)); ?>" target="_blank"><?php echo e($file->title); ?></a></td>
        <?php if($upload_type == 'syllabus' && $parent == 'class'): ?>
          <td><?php echo e($file->myclass->class_number); ?></td>
        <?php elseif($upload_type == 'routine' && $parent == 'section'): ?>
          <td><?php echo e($file->section->section_number); ?></td>
        <?php endif; ?>
        <td><?php echo e(($file->active === 1)?'Yes':'No'); ?></td>
        <td>
          <a href="<?php echo e(url('academic/remove/'.$upload_type.'/'.$file->id)); ?>" class="btn btn-danger btn-sm" role="button"><i class="material-icons">delete</i> <?php echo app('translator')->get('Remove'); ?></a>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
</div>
<?php /**PATH C:\dev\Unifiedtransform\resources\views/components/uploaded-files-list.blade.php ENDPATH**/ ?>