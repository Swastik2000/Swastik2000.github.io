

<?php $__env->startSection('title', __('Edit')); ?>

<?php $__env->startSection('content'); ?>
<div class="container<?php echo e((\Auth::user()->role == 'master')? '' : '-fluid'); ?>">
    <div class="row">
        <?php if(\Auth::user()->role != 'master'): ?>
        <div class="col-md-2" id="side-navbar">
            <?php echo $__env->make('layouts.leftside-menubar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php endif; ?>
        <div class="col-md-<?php echo e((\Auth::user()->role == 'master')? 12 : 8); ?>" id="main-container">
            <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>
            <?php if(session('status')): ?>
            <div class="alert alert-success">
                <?php echo e(session('status')); ?>

            </div>
            <?php endif; ?>
            <div class="panel panel-default">
                <div class="page-panel-title"><?php echo app('translator')->get('Edit'); ?></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="<?php echo e(url('edit/user')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                        <input type="hidden" name="user_role" value="<?php echo e($user->role); ?>">
                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">* <?php echo app('translator')->get('Full Name'); ?></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e($user->name); ?>"
                                    required>

                                <?php if($errors->has('name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label"><?php echo app('translator')->get('E-Mail Address'); ?></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"
                                    value="<?php echo e($user->email); ?>">

                                <?php if($errors->has('email')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('phone_number') ? ' has-error' : ''); ?>">
                            <label for="phone_number" class="col-md-4 control-label">* <?php echo app('translator')->get('Phone Number'); ?></label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control" name="phone_number"
                                    value="<?php echo e($user->phone_number); ?>">

                                <?php if($errors->has('phone_number')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('phone_number')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php if($user->role == 'teacher'): ?>
                        <div class="form-group<?php echo e($errors->has('department') ? ' has-error' : ''); ?>">
                            <label for="department" class="col-md-4 control-label"><?php echo app('translator')->get('Department'); ?></label>

                            <div class="col-md-6">
                                <select id="department" class="form-control" name="department_id">
                                    <?php if(count($departments)): ?> > 0)
                                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($d->id); ?>" <?php if($d->id == old('department_id', $user->department_id)): ?>
											selected="selected"
										<?php endif; ?>
										><?php echo e($d->department_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>

                                <?php if($errors->has('department')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('department')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('class_teacher') ? ' has-error' : ''); ?>">
                            <label for="class_teacher" class="col-md-4 control-label"><?php echo app('translator')->get('Class Teacher'); ?></label>

                            <div class="col-md-6">
                                <select id="class_teacher" class="form-control" name="class_teacher_section_id">
                                    <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($section->id); ?>" <?php if($section->id == old('class_teacher_section_id', $user->section_id)): ?>
											selected="selected"
										<?php endif; ?>
										><?php echo app('translator')->get('Section'); ?>: <?php echo e($section->section_number); ?> <?php echo app('translator')->get('Class'); ?>:
                                        <?php echo e($section->class->class_number); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <?php if($errors->has('class_teacher')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('class_teacher')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                            <label for="address" class="col-md-4 control-label"><?php echo app('translator')->get('address'); ?></label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address"
                                    value="<?php echo e($user->address); ?>">

                                <?php if($errors->has('address')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('address')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('about') ? ' has-error' : ''); ?>">
                            <label for="about" class="col-md-4 control-label"><?php echo app('translator')->get('About'); ?></label>

                            <div class="col-md-6">
                                <textarea id="about" class="form-control" name="about"><?php echo e($user->about); ?></textarea>

                                <?php if($errors->has('about')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('about')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <?php if($user->role == 'student'): ?>

                        <div class="form-group<?php echo e($errors->has('birthday') ? ' has-error' : ''); ?>">
                            <label for="birthday" class="col-md-4 control-label">* <?php echo app('translator')->get('Birthday'); ?></label>

                            <div class="col-md-6">
                                <input id="birthday" type="text" class="form-control" name="birthday" required>

                                <?php if($errors->has('birthday')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('birthday')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('session') ? ' has-error' : ''); ?>">
                            <label for="session" class="col-md-4 control-label">* <?php echo app('translator')->get('Session'); ?></label>

                            <div class="col-md-6">
                                <input id="session" type="text" class="form-control" name="session" required>

                                <?php if($errors->has('session')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('session')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('group') ? ' has-error' : ''); ?>">
                            <label for="group" class="col-md-4 control-label"><?php echo app('translator')->get('Group'); ?></label>

                            <div class="col-md-6">
                                <input id="group" type="text" class="form-control" name="group"
                                    value="<?php if(isset($user->studentInfo['group'])){echo $user->studentInfo['group'];} ?>"
                                    placeholder="<?php echo app('translator')->get('Science, Arts, Commerce,etc.'); ?>">

                                <?php if($errors->has('group')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('group')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('father_name') ? ' has-error' : ''); ?>">
                            <label for="father_name" class="col-md-4 control-label">* <?php echo app('translator')->get('Father\'s Name'); ?></label>

                            <div class="col-md-6">
                                <input id="father_name" type="text" class="form-control" name="father_name"
                                    value="<?php if(isset($user->studentInfo['group'])){echo $user->studentInfo['father_name'];} ?>" required>

                                <?php if($errors->has('father_name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('father_name')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('father_phone_number') ? ' has-error' : ''); ?>">
                            <label for="father_phone_number" class="col-md-4 control-label"><?php echo app('translator')->get('Father\'s Phone Number'); ?></label>

                            <div class="col-md-6">
                                <input id="father_phone_number" type="text" class="form-control"
                                    name="father_phone_number" value="<?php if(isset($user->studentInfo['group'])){echo $user->studentInfo['father_phone_number'];} ?>">

                                <?php if($errors->has('father_phone_number')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('father_phone_number')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('father_national_id') ? ' has-error' : ''); ?>">
                            <label for="father_national_id" class="col-md-4 control-label"><?php echo app('translator')->get('Father\'s National ID'); ?></label>

                            <div class="col-md-6">
                                <input id="father_national_id" type="text" class="form-control"
                                    name="father_national_id" value="<?php if(isset($user->studentInfo['group'])){echo $user->studentInfo['father_national_id'];} ?>">

                                <?php if($errors->has('father_national_id')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('father_national_id')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('father_occupation') ? ' has-error' : ''); ?>">
                            <label for="father_occupation" class="col-md-4 control-label"><?php echo app('translator')->get('Father\'s Occupation'); ?></label>

                            <div class="col-md-6">
                                <input id="father_occupation" type="text" class="form-control" name="father_occupation"
                                    value="<?php if(isset($user->studentInfo['group'])){echo $user->studentInfo['father_occupation'];} ?>">

                                <?php if($errors->has('father_occupation')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('father_occupation')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('father_designation') ? ' has-error' : ''); ?>">
                            <label for="father_designation" class="col-md-4 control-label"><?php echo app('translator')->get('Father\'s Designation'); ?></label>

                            <div class="col-md-6">
                                <input id="father_designation" type="text" class="form-control"
                                    name="father_designation" value="<?php if(isset($user->studentInfo['group'])){echo $user->studentInfo['father_designation'];} ?>">

                                <?php if($errors->has('father_designation')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('father_designation')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('father_annual_income') ? ' has-error' : ''); ?>">
                            <label for="father_annual_income" class="col-md-4 control-label"><?php echo app('translator')->get('Father\'s Annual Income'); ?></label>

                            <div class="col-md-6">
                                <input id="father_annual_income" type="text" class="form-control"
                                    name="father_annual_income"
                                    value="<?php if(isset($user->studentInfo['group'])){echo $user->studentInfo['father_annual_income'];} ?>">

                                <?php if($errors->has('father_annual_income')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('father_annual_income')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('mother_name') ? ' has-error' : ''); ?>">
                            <label for="mother_name" class="col-md-4 control-label">* <?php echo app('translator')->get('Mother\'s Name'); ?></label>

                            <div class="col-md-6">
                                <input id="mother_name" type="text" class="form-control" name="mother_name"
                                    value="<?php if(isset($user->studentInfo['group'])){echo $user->studentInfo['mother_name'];} ?>" required>

                                <?php if($errors->has('mother_name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('mother_name')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('mother_phone_number') ? ' has-error' : ''); ?>">
                            <label for="mother_phone_number" class="col-md-4 control-label"><?php echo app('translator')->get('Mother\'s Phone Number'); ?></label>

                            <div class="col-md-6">
                                <input id="mother_phone_number" type="text" class="form-control"
                                    name="mother_phone_number" value="<?php if(isset($user->studentInfo['group'])){echo $user->studentInfo['mother_phone_number'];} ?>">

                                <?php if($errors->has('mother_phone_number')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('mother_phone_number')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('mother_national_id') ? ' has-error' : ''); ?>">
                            <label for="mother_national_id" class="col-md-4 control-label"><?php echo app('translator')->get('Mother\'s National ID'); ?></label>

                            <div class="col-md-6">
                                <input id="mother_national_id" type="text" class="form-control"
                                    name="mother_national_id" value="<?php if(isset($user->studentInfo['group'])){echo $user->studentInfo['mother_national_id'];} ?>">

                                <?php if($errors->has('mother_national_id')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('mother_national_id')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('mother_occupation') ? ' has-error' : ''); ?>">
                            <label for="mother_occupation" class="col-md-4 control-label"><?php echo app('translator')->get('Mother\'s Occupation'); ?></label>

                            <div class="col-md-6">
                                <input id="mother_occupation" type="text" class="form-control" name="mother_occupation"
                                    value="<?php if(isset($user->studentInfo['group'])){echo $user->studentInfo['mother_occupation'];} ?>">

                                <?php if($errors->has('mother_occupation')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('mother_occupation')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('mother_designation') ? ' has-error' : ''); ?>">
                            <label for="mother_designation" class="col-md-4 control-label"><?php echo app('translator')->get('Mother\'s Designation'); ?></label>

                            <div class="col-md-6">
                                <input id="mother_designation" type="text" class="form-control"
                                    name="mother_designation" value="<?php if(isset($user->studentInfo['group'])){echo $user->studentInfo['mother_designation'];} ?>">

                                <?php if($errors->has('mother_designation')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('mother_designation')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('mother_annual_income') ? ' has-error' : ''); ?>">
                            <label for="mother_annual_income" class="col-md-4 control-label"><?php echo app('translator')->get('Mother\'s Annual Income'); ?></label>

                            <div class="col-md-6">
                                <input id="mother_annual_income" type="text" class="form-control"
                                    name="mother_annual_income"
                                    value="<?php if(isset($user->studentInfo['group'])){echo $user->studentInfo['mother_annual_income'];} ?>">

                                <?php if($errors->has('mother_annual_income')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('mother_annual_income')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="javascript:history.back()" class="btn btn-danger" style="margin-right: 2%;"
                                    role="button"><?php echo app('translator')->get('Cancel'); ?></a>
                                <input type="submit" role="button" class="btn btn-success" value="<?php echo app('translator')->get('Save'); ?>">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css"
    rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script>
    $(function () {
        $('#birthday').datepicker({
            format: "yyyy-mm-dd",
        });
        $('#birthday').datepicker('setDate',
            "<?php if(isset($user->studentInfo['birthday'])){echo Carbon\Carbon::parse($user->studentInfo['birthday'])->format('Y-d-m');} ?>
");
        $('#session').datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
        });
        $('#session').datepicker('setDate',
            "<?php if(isset($user->studentInfo['session'])){echo Carbon\Carbon::parse($user->studentInfo['session'])->format('Y');} ?>
");
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\dev\Unifiedtransform\resources\views/profile/edit.blade.php ENDPATH**/ ?>