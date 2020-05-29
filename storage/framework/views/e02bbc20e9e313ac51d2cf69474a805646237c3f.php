

<?php $__env->startSection('content'); ?>
<style>
    .badge-download {
        background-color: transparent !important;
        color: #464443 !important;
    }
    .list-group-item-text{
      font-size: 12px;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2" id="side-navbar">
            <?php echo $__env->make('layouts.leftside-menubar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-10" id="main-container">
            <div class="panel panel-default" style="border-top: 0px;">
                <div class="panel-body">
                    <?php if(session('status')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('status')); ?>

                    </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="page-panel-title"><?php echo app('translator')->get('Dashboard'); ?></div>
                        <div class="col-sm-2">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-header"><?php echo app('translator')->get('Students'); ?> - <b><?php echo e($totalStudents); ?></b></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="card text-white bg-success mb-3">
                                <div class="card-header"><?php echo app('translator')->get('Teachers'); ?> - <b><?php echo e($totalTeachers); ?></b></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card text-white bg-dark mb-3">
                                <div class="card-header"><?php echo app('translator')->get('Types of Books In Library'); ?> - <b><?php echo e($totalBooks); ?></b></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="card text-white bg-danger mb-3">
                                <div class="card-header"><?php echo app('translator')->get('Classes'); ?> - <b><?php echo e($totalClasses); ?></b></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="card text-white bg-info mb-3">
                                <div class="card-header"><?php echo app('translator')->get('Sections'); ?> - <b><?php echo e($totalSections); ?></b></div>
                            </div>
                        </div>
                    </div>
                    <p></p>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="panel panel-default" style="background-color: rgba(242,245,245,0.8);">
                                <div class="panel-body">
                                    <h3><?php echo app('translator')->get('Welcome to'); ?> <?php echo e(Auth::user()->school->name); ?></h3>
                                    <?php echo app('translator')->get('Your presence and cooperation will help us to improve the education system of our organization.'); ?>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="page-panel-title"><?php echo app('translator')->get('Active Exams'); ?></div>
                                <div class="panel-body">
                                    <?php if(count($exams) > 0): ?>
                                    <table class="table">
                                        <tr>
                                            <th><?php echo app('translator')->get('Exam Name'); ?></th>
                                            <th><?php echo app('translator')->get('Notice Published'); ?></th>
                                            <th><?php echo app('translator')->get('Result Published'); ?></th>
                                        </tr>
                                        <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($exam->exam_name); ?></td>
                                            <td><?php echo e(($exam->notice_published === 1)?__('Yes'):__('No')); ?></td>
                                            <td><?php echo e(($exam->result_published === 1)?__('Yes'):__('No')); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                    <?php else: ?>
                                    <?php echo app('translator')->get('No Active Examination'); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="panel panel-default">
                                <div class="page-panel-title"><?php echo app('translator')->get('Notices'); ?></div>
                                <div class="panel-body pre-scrollable">
                                    <?php if(count($notices) > 0): ?>
                                    <div class="list-group">
                                        <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e(url($notice->file_path)); ?>" class="list-group-item" download>
                                            <i class="badge badge-download material-icons">
                                                get_app
                                            </i>
                                            <h5 class="list-group-item-heading"><?php echo e($notice->title); ?></h5>
                                            <p class="list-group-item-text"><?php echo app('translator')->get('Published at'); ?>:
                                                <?php echo e($notice->created_at->format('M d Y h:i:sa')); ?></p>
                                        </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <?php else: ?>
                                    <?php echo app('translator')->get('No New Notice'); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="panel panel-default">
                                <div class="page-panel-title"><?php echo app('translator')->get('Events'); ?></div>
                                <div class="panel-body pre-scrollable">
                                    <?php if(count($events) > 0): ?>
                                    <div class="list-group">
                                        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e(url($event->file_path)); ?>" class="list-group-item" download>
                                            <i class="badge badge-download material-icons">
                                                get_app
                                            </i>
                                            <h5 class="list-group-item-heading"><?php echo e($event->title); ?></h5>
                                            <p class="list-group-item-text"><?php echo app('translator')->get('Published at'); ?>:
                                                <?php echo e($event->created_at->format('M d Y')); ?></p>
                                        </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <?php else: ?>
                                    <?php echo app('translator')->get('No New Event'); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="panel panel-default">
                                <div class="page-panel-title"><?php echo app('translator')->get('Routines'); ?></div>
                                <div class="panel-body pre-scrollable">
                                    <?php if(count($routines) > 0): ?>
                                    <div class="list-group">
                                        <?php $__currentLoopData = $routines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $routine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e(url($routine->file_path)); ?>" class="list-group-item" download>
                                            <i class="badge badge-download material-icons">
                                                get_app
                                            </i>
                                            <h5 class="list-group-item-heading"><?php echo e($routine->title); ?></h5>
                                            <p class="list-group-item-text"><?php echo app('translator')->get('Published at'); ?>:
                                                <?php echo e($routine->created_at->format('M d Y')); ?></p>
                                        </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <?php else: ?>
                                    <?php echo app('translator')->get('No New Routine'); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="panel panel-default">
                                <div class="page-panel-title"><?php echo app('translator')->get('Syllabus'); ?></div>
                                <div class="panel-body pre-scrollable">
                                    <?php if(count($syllabuses) > 0): ?>
                                    <div class="list-group">
                                        <?php $__currentLoopData = $syllabuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $syllabus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e(url($syllabus->file_path)); ?>" class="list-group-item" download>
                                            <i class="badge badge-download material-icons">
                                                get_app
                                            </i>
                                            <h5 class="list-group-item-heading"><?php echo e($syllabus->title); ?></h5>
                                            <p class="list-group-item-text"><?php echo app('translator')->get('Published at'); ?>:
                                                <?php echo e($syllabus->created_at->format('M d Y')); ?></p>
                                        </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <?php else: ?>
                                    <?php echo app('translator')->get('No New Syllabus'); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\dev\Unifiedtransform\resources\views/home.blade.php ENDPATH**/ ?>