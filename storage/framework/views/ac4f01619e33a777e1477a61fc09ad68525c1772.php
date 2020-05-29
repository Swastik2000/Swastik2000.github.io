

<?php $__env->startSection('title', __('Academic Settings')); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" id="side-navbar">
                <?php echo $__env->make('layouts.leftside-menubar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-md-10" id="main-container">
                <div class="panel panel-default">
                    <div class="page-panel-title"><?php echo app('translator')->get('Academic Settings'); ?></div>
                    <div class="panel-body table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th scope="col"><?php echo app('translator')->get('Name'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Code'); ?></th>
                                </tr>
                                <tr>
                                    <td><?php echo e($school->name); ?></td>
                                    <td><?php echo e($school->code); ?></td>
                                </tr>
                                <tr>
                                    <th scope="col"><?php echo app('translator')->get('Department'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Classes'); ?></th>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#departmentModal">+ <?php echo app('translator')->get('Create Department'); ?></button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="departmentModal" tabindex="-1" role="dialog" aria-labelledby="departmentModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title" id="departmentModalLabel"><?php echo app('translator')->get('Create Department'); ?></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-horizontal" action="<?php echo e(url('school/add-department')); ?>" method="post">
                                                            <?php echo e(csrf_field()); ?>

                                                            <div class="form-group">
                                                                <label for="department_name" class="col-sm-2 control-label"><?php echo app('translator')->get('Department Name'); ?></label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="department_name" name="department_name" placeholder="<?php echo app('translator')->get('English, Mathematics,...'); ?>">
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
                                    </td>
                                    <td>
                                        <a href="#collapse" role="button" class="btn btn-danger btn-sm" data-toggle="collapse" aria-expanded="false" aria-controls="collapse">
                                            <i class="material-icons">class</i> <?php echo app('translator')->get('Manage Class, Section'); ?>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="collapse" id="collapse" aria-labelledby="heading" aria-expanded="false">
                                    <td colspan="12">
                                        <?php echo $__env->make('layouts.master.add-class-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <div><small><?php echo app('translator')->get('Click Class to View All Sections'); ?></small></div>
                                        <div class="row">
                                            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($class->school_id == $school->id): ?>
                                                    <div class="col-sm-3">
                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal<?php echo e($class->id); ?>" style="margin-top: 5%;"><?php echo app('translator')->get('Manage'); ?> <?php echo e($class->class_number); ?> <?php echo e(!empty($class->group)? '- '.$class->group:''); ?></button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="myModal<?php echo e($class->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                        <h4 class="modal-title" id="myModalLabel"><?php echo app('translator')->get('All Sections of Class'); ?> <?php echo e($class->class_number); ?></h4>
                                                                    </div>
                                                                    <div class="modal-body">
																		<div class="form-check">
																			<?php 
																				$checked = Session::has('ignoreSessions') ? (Session::get('ignoreSessions') == "true" ? "checked='checked'" : "") : "";
																			?>
																			<input class="form-check-input position-static" type="checkbox" name="ignoreSessionsCheck" id="ignoreSessionsId" <?php echo $checked ?>>
																			<?php echo app('translator')->get("Ignore Sessions when listing students for promoting"); ?>
																		</div>
                                                                        <ul class="list-group">
                                                                            <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php if($section->class_id == $class->id): ?>
                                                                                    <li class="list-group-item"><?php echo app('translator')->get('Section'); ?> <?php echo e($section->section_number); ?> &nbsp;
                                                                                        <a class="btn btn-xs btn-warning" href="<?php echo e(url('courses/0/'.$section->id)); ?>"><?php echo app('translator')->get('View All Assigned Courses'); ?></a>
                                                                                        <span class="pull-right"> &nbsp;&nbsp;
                                                                                            <a  class="btn btn-xs btn-success" href="<?php echo e(url('school/promote-students/'.$section->id)); ?>">+ <?php echo app('translator')->get('Promote Students'); ?></a>
                                                                                            
                                                                                        </span>
                                                                                        <?php echo $__env->make('layouts.master.add-course-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                                    </li>
                                                                                <?php endif; ?>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </ul>
                                                                        <?php echo $__env->make('layouts.master.create-section-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>

                        <h4><?php echo app('translator')->get('Add Users'); ?></h4>
                        <table class="table table-condensed" style="width:600px">
                            <thead>
                                <tr>
                                    <th scope="col">+<?php echo app('translator')->get('Student'); ?></th>
                                    <th scope="col">+<?php echo app('translator')->get('Teacher'); ?></th>
                                    <th scope="col">+<?php echo app('translator')->get('Accountant'); ?></th>
                                    <th scope="col">+<?php echo app('translator')->get('Librarian'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="<?php echo e(url('register/student')); ?>">+ <?php echo app('translator')->get('Add Student'); ?></a>
                                        <br>
                                        <h5><?php echo app('translator')->get('Or, Mass upload Excel'); ?></h5>
                                        <?php $__env->startComponent('components.excel-upload-form', ['type'=>'student']); ?>
                                        <?php if (isset($__componentOriginal6e5988e6fbcbff44989f46c5158956cde68b61d3)): ?>
<?php $component = $__componentOriginal6e5988e6fbcbff44989f46c5158956cde68b61d3; ?>
<?php unset($__componentOriginal6e5988e6fbcbff44989f46c5158956cde68b61d3); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="<?php echo e(url('register/teacher')); ?>">+ <?php echo app('translator')->get('Add Teacher'); ?></a>
                                        <br>
                                        <h5><?php echo app('translator')->get('Or, Mass upload Excel'); ?></h5>
                                        <?php $__env->startComponent('components.excel-upload-form', ['type'=>'teacher']); ?>
                                        <?php if (isset($__componentOriginal6e5988e6fbcbff44989f46c5158956cde68b61d3)): ?>
<?php $component = $__componentOriginal6e5988e6fbcbff44989f46c5158956cde68b61d3; ?>
<?php unset($__componentOriginal6e5988e6fbcbff44989f46c5158956cde68b61d3); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-default btn-sm" href="<?php echo e(url('register/accountant')); ?>">+ <?php echo app('translator')->get('Add Accountant'); ?></a>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="<?php echo e(url('register/librarian')); ?>">+ <?php echo app('translator')->get('Add Librarian'); ?></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <h4><?php echo app('translator')->get('Upload'); ?></h4>
                        <table class="table table-condensed" style="width:400px">
                            <thead>
                                <tr>
                                    <th scope="col">+<?php echo app('translator')->get('Notice'); ?></th>
                                    <th scope="col">+<?php echo app('translator')->get('Event'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="<?php echo e(url('academic/notice')); ?>">
                                            <i class="material-icons">developer_board</i> <?php echo app('translator')->get('Upload Notice'); ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="<?php echo e(url('academic/event')); ?>">
                                            <i class="material-icons">developer_board</i> <?php echo app('translator')->get('Upload Event'); ?>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<script>
		$(document).ready(function(){
		  $("#ignoreSessionsId").change(function() {
			var ignoreSessions = $("#ignoreSessionsId").is(":checked");

			$.ajax({
					type:'POST',
					url:'/school/set-ignore-sessions',
					headers: {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>' },
					data: { "ignoreSessions" : ignoreSessions },
					success: function(data){
					  if(data.data.success){
						  console.log("Result = " + data.data.success);
					  }
					}
				});
			});
		});	
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\dev\Unifiedtransform\resources\views/settings/index.blade.php ENDPATH**/ ?>