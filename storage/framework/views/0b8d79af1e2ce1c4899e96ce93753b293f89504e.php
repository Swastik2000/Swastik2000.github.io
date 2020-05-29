

<?php $__env->startSection('title', __('All Classes and Sections')); ?>

<?php $__env->startSection('content'); ?>
<style>
    #cls-sec .panel{
        margin-bottom: 0%;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2" id="side-navbar">
            <?php echo $__env->make('layouts.leftside-menubar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-10" id="main-container">
            <h2><?php echo app('translator')->get('All Classes and Sections'); ?></h2>
            <div class="panel panel-default" id="cls-sec">
              <?php if(count($classes) > 0): ?>
                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="panel panel-default">
                        <div class="page-panel-title" role="tab" id="heading<?php echo e($class->id); ?>">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a class="panel-title collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo e($class->id); ?>" aria-expanded="false" aria-controls="collapse<?php echo e($class->id); ?>"><?php echo e($class->class_number); ?> <?php echo e(ucfirst($class->group)); ?></a>
                                    </div>
                                    <div class="col-md-4">
                                        <a class="panel-title collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo e($class->id); ?>" aria-expanded="false" aria-controls="collapse<?php echo e($class->id); ?>"><small><b><?php echo app('translator')->get('Click to view all Sections under this Class'); ?> <i class="material-icons">keyboard_arrow_down</i></b></small></a>
                                    </div>
                                    <?php if(isset($_GET['course']) && $_GET['course'] == 1): ?>
                                    <div class="col-md-4">
                                        <a role="button" class="btn btn-info btn-xs" href="<?php echo e(url('academic/syllabus/'.$class->id)); ?>"><i class="material-icons">visibility</i> <?php echo app('translator')->get('View Syllabus for this Class'); ?></a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                        </div>
                        <div id="collapse<?php echo e($class->id); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo e($class->id); ?>">
                            <div class="panel-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><?php echo app('translator')->get('Section Name'); ?></th>
                                            <?php if(isset($_GET['att']) && $_GET['att'] == 1): ?>
                                            <th><?php echo app('translator')->get('View Today\'s Attendance'); ?></th>
                                            <th><?php echo app('translator')->get('View Each Student\'s Attendance'); ?></th>
                                            <th><?php echo app('translator')->get('Give Attendance'); ?></th>
                                            <?php endif; ?>
                                            <?php if(isset($_GET['course']) && $_GET['course'] == 1): ?>
                                            <th><?php echo app('translator')->get('View Courses'); ?></th>
                                            <th><?php echo app('translator')->get('View Students'); ?></th>
                                            <th><?php echo app('translator')->get('View Routines'); ?></th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($class->id == $section->class_id): ?>
                                            <tr>
                                            <td>
                                                <a href="<?php echo e(url('courses/0/'.$section->id)); ?>"><?php echo e($section->section_number); ?></a>
                                            </td>
                                            <?php if(isset($_GET['att']) && $_GET['att'] == 1): ?>
                                                <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ex): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($ex->class_id == $class->id): ?>
                                                        <td>
                                                            <a role="button" class="btn btn-primary btn-xs" href="<?php echo e(url('attendances/'.$section->id.'/0/'.$ex->exam_id)); ?>"><i class="material-icons">visibility</i> <?php echo app('translator')->get('View Today\'s Attendance'); ?></a>
                                                        </td>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <td>
                                                <a role="button" class="btn btn-danger btn-xs" href="<?php echo e(url('attendances/'.$section->id)); ?>"><i class="material-icons">visibility</i> <?php echo app('translator')->get('View Each Student\'s Attendance'); ?></a>
                                            </td>
                                            <td>
                                                <?php
                                                    $ce = 0;    
                                                ?>
                                                <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ex): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($ex->class_id == $class->id): ?>
                                                        <?php
                                                            $ce = 1;
                                                        ?>
                                                        <a role="button" class="btn btn-info btn-xs" href="<?php echo e(url('attendances/'.$section->id.'/0/'.$ex->exam_id)); ?>"><i class="material-icons">spellcheck</i> <?php echo app('translator')->get('Take Attendance'); ?></a>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($ce == 0): ?>
                                                    <?php echo app('translator')->get('Assign Class Under Exam'); ?>
                                                <?php endif; ?>
                                            </td>
                                            <?php endif; ?>
                                            <?php if(isset($_GET['course']) && $_GET['course'] == 1): ?>
                                            <td>
                                                <a role="button" class="btn btn-info btn-xs" href="<?php echo e(url('courses/0/'.$section->id)); ?>"><i class="material-icons">visibility</i> <?php echo app('translator')->get('View Courses under this section'); ?></a>
                                            </td>
                                            <td>
                                                <a role="button" class="btn btn-danger btn-xs" href="<?php echo e(url('section/students/'.$section->id.'?section=1')); ?>"><i class="material-icons">visibility</i> <?php echo app('translator')->get('View Students of this section'); ?></a>
                                            </td>
                                            <td>
                                                <a role="button" class="btn btn-primary btn-xs" href="<?php echo e(url('academic/routine/'.$section->id)); ?>"><i class="material-icons">visibility</i> <?php echo app('translator')->get('View Routines for this section'); ?></a>
                                            </td>
                                            <?php endif; ?>
                                            </tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\dev\Unifiedtransform\resources\views/school/sections.blade.php ENDPATH**/ ?>