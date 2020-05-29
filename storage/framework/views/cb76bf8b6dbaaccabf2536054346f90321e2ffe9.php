

<?php $__env->startSection('title', __('Register')); ?>

<?php $__env->startSection('content'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet">
<div class="container<?php echo e((\Auth::user()->role == 'master')? '' : '-fluid'); ?>">
    <div class="row">
        <?php if(\Auth::user()->role != 'master'): ?>
        <div class="col-md-2" id="side-navbar">
            <?php echo $__env->make('layouts.leftside-menubar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php else: ?>
        <div class="col-md-3" id="side-navbar">
            <ul class="nav flex-column">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo e(route('schools.index')); ?>"><i class="material-icons">gamepad</i> <span class="nav-link-text"><?php echo app('translator')->get('Back to Manage School'); ?></span></a>
                </li>
            </ul>
        </div>
        <?php endif; ?>
        <div class="col-md-8" id="main-container">
            <?php if(session('status')): ?>
            <div class="alert alert-success">
                <?php echo e(session('status')); ?>

                
                <?php if(session('register_school_id')): ?>
                    <a href="<?php echo e(url('school/admin-list/' . session('register_school_id'))); ?>" target="_blank" class="text-white pull-right"><?php echo app('translator')->get('View Admins'); ?></a>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <div class="panel panel-default">
                <div class="page-panel-title"><?php echo app('translator')->get('Register'); ?> <?php echo e(ucfirst(session('register_role'))); ?></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" id="registerForm" action="<?php echo e(url('register/'.session('register_role'))); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">* <?php echo app('translator')->get('Full Name'); ?></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>"
                                    required>

                                <?php if($errors->has('name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">* <?php echo app('translator')->get('E-Mail Address'); ?></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

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
                                <input id="phone_number" type="text" class="form-control" name="phone_number" value="<?php echo e(old('phone_number')); ?>">

                                <?php if($errors->has('phone_number')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('phone_number')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label">* <?php echo app('translator')->get('Password'); ?></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?php if($errors->has('password')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">* <?php echo app('translator')->get('Confirm Password'); ?></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                    required>
                            </div>
                        </div>
                        <?php if(session('register_role', 'student') == 'student'): ?>
                        <div class="form-group<?php echo e($errors->has('section') ? ' has-error' : ''); ?>">
                            <label for="section" class="col-md-4 control-label">* <?php echo app('translator')->get('Class and Section'); ?></label>

                            <div class="col-md-6">
                                <select id="section" class="form-control" name="section" required>
                                    <?php $__currentLoopData = session('register_sections'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($section->id); ?>"><?php echo app('translator')->get('Section'); ?>: <?php echo e($section->section_number); ?> <?php echo app('translator')->get('Class'); ?>:
                                        <?php echo e($section->class->class_number); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <?php if($errors->has('section')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('section')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('birthday') ? ' has-error' : ''); ?>">
                            <label for="birthday" class="col-md-4 control-label">* <?php echo app('translator')->get('Birthday'); ?></label>

                            <div class="col-md-6">
                                <input id="birthday" type="text" class="form-control" name="birthday" value="<?php echo e(old('birthday')); ?>"
                                    required>

                                <?php if($errors->has('birthday')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('birthday')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if(session('register_role', 'teacher') == 'teacher'): ?>
                        <div class="form-group<?php echo e($errors->has('department') ? ' has-error' : ''); ?>">
                            <label for="department" class="col-md-4 control-label">* <?php echo app('translator')->get('Department'); ?></label>

                            <div class="col-md-6">
                                <select id="department" class="form-control" name="department_id" required>
                                    <?php if(count(session('departments')) > 0): ?>
                                        <?php $__currentLoopData = session('departments'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($d->id); ?>"><?php echo e($d->department_name); ?></option>
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
                                    <option selected="selected" value="0"><?php echo app('translator')->get('Not Class Teacher'); ?></option>
                                    <?php $__currentLoopData = session('register_sections'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($section->id); ?>"><?php echo app('translator')->get('Section'); ?>: <?php echo e($section->section_number); ?> <?php echo app('translator')->get('Class'); ?>:
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
                        <div class="form-group<?php echo e($errors->has('blood_group') ? ' has-error' : ''); ?>">
                            <label for="blood_group" class="col-md-4 control-label"><?php echo app('translator')->get('Blood Group'); ?></label>

                            <div class="col-md-6">
                                <select id="blood_group" class="form-control" name="blood_group">
                                    <option selected="selected">A+</option>
                                    <option>A-</option>
                                    <option>B+</option>
                                    <option>B-</option>
                                    <option>AB+</option>
                                    <option>AB-</option>
                                    <option>O+</option>
                                    <option>O-</option>
                                </select>

                                <?php if($errors->has('blood_group')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('blood_group')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('nationality') ? ' has-error' : ''); ?>">
                            <label for="nationality" class="col-md-4 control-label">* <?php echo app('translator')->get('Nationality'); ?></label>

                            <div class="col-md-6">
                                <input id="nationality" type="text" class="form-control" name="nationality" value="<?php echo e(old('nationality')); ?>"
                                    required>

                                <?php if($errors->has('nationality')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('nationality')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('gender') ? ' has-error' : ''); ?>">
                            <label for="gender" class="col-md-4 control-label"><?php echo app('translator')->get('Gender'); ?></label>

                            <div class="col-md-6">
                                <select id="gender" class="form-control" name="gender">
                                    <option selected="selected"><?php echo app('translator')->get('Male'); ?></option>
                                    <option><?php echo app('translator')->get('Female'); ?></option>
                                </select>

                                <?php if($errors->has('gender')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('gender')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if(session('register_role', 'student') == 'student'): ?>
                        <div class="form-group<?php echo e($errors->has('version') ? ' has-error' : ''); ?>">
                            <label for="version" class="col-md-4 control-label">* <?php echo app('translator')->get('Version'); ?></label>

                            <div class="col-md-6">
                                <select id="version" class="form-control" name="version">
                                    <option selected="selected"><?php echo app('translator')->get('Bangla'); ?></option>
                                    <option><?php echo app('translator')->get('English'); ?></option>
									<option><?php echo app('translator')->get('Spanish'); ?></option>
                                </select>

                                <?php if($errors->has('version')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('version')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('session') ? ' has-error' : ''); ?>">
                            <label for="session" class="col-md-4 control-label">* <?php echo app('translator')->get('Session'); ?></label>

                            <div class="col-md-6">
                                <input id="session" type="text" class="form-control" name="session" value="<?php echo e(old('session')); ?>"
                                    required>

                                <?php if($errors->has('session')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('session')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('group') ? ' has-error' : ''); ?>">
                            <label for="group" class="col-md-4 control-label"><?php echo app('translator')->get('Group (Optional)'); ?></label>

                            <div class="col-md-6">
                                <input id="group" type="text" class="form-control" name="group" value="<?php echo e(old('group')); ?>"
                                    placeholder="<?php echo app('translator')->get('Science, Arts, Commerce,etc.'); ?>">

                                <?php if($errors->has('group')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('group')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('religion') ? ' has-error' : ''); ?>">
                            <label for="religion" class="col-md-4 control-label"><?php echo app('translator')->get('Religion'); ?></label>

                            <div class="col-md-6">
                                <select id="religion" class="form-control" name="religion">
                                    <option selected="selected"><?php echo app('translator')->get('Islam'); ?></option>
                                    <option><?php echo app('translator')->get('Hinduism'); ?></option>
                                    <option><?php echo app('translator')->get('Christianism'); ?></option>
                                    <option><?php echo app('translator')->get('Buddhism'); ?></option>
									<option><?php echo app('translator')->get('Catholic'); ?></option>
                                    <option><?php echo app('translator')->get('Other'); ?></option>
                                </select>

                                <?php if($errors->has('religion')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('religion')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                            <label for="address" class="col-md-4 control-label">* <?php echo app('translator')->get('address'); ?></label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="<?php echo e(old('address')); ?>"
                                    required>

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
                                <textarea id="about" class="form-control" name="about"><?php echo e(old('about')); ?></textarea>

                                <?php if($errors->has('about')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('about')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('father_name') ? ' has-error' : ''); ?>">
                            <label for="father_name" class="col-md-4 control-label">* <?php echo app('translator')->get('Father\'s Name'); ?></label>

                            <div class="col-md-6">
                                <input id="father_name" type="text" class="form-control" name="father_name" value="<?php echo e(old('father_name')); ?>"
                                    required>

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
                                <input id="father_phone_number" type="text" class="form-control" name="father_phone_number"
                                    value="<?php echo e(old('father_phone_number')); ?>">

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
                                <input id="father_national_id" type="text" class="form-control" name="father_national_id"
                                    value="<?php echo e(old('father_national_id')); ?>">

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
                                    value="<?php echo e(old('father_occupation')); ?>">

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
                                <input id="father_designation" type="text" class="form-control" name="father_designation"
                                    value="<?php echo e(old('father_designation')); ?>">

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
                                <input id="father_annual_income" type="text" class="form-control" name="father_annual_income"
                                    value="<?php echo e(old('father_annual_income')); ?>">

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
                                <input id="mother_name" type="text" class="form-control" name="mother_name" value="<?php echo e(old('mother_name')); ?>"
                                    required>

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
                                <input id="mother_phone_number" type="text" class="form-control" name="mother_phone_number"
                                    value="<?php echo e(old('mother_phone_number')); ?>">

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
                                <input id="mother_national_id" type="text" class="form-control" name="mother_national_id"
                                    value="<?php echo e(old('mother_national_id')); ?>">

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
                                    value="<?php echo e(old('mother_occupation')); ?>">

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
                                <input id="mother_designation" type="text" class="form-control" name="mother_designation"
                                    value="<?php echo e(old('mother_designation')); ?>">

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
                                <input id="mother_annual_income" type="text" class="form-control" name="mother_annual_income"
                                    value="<?php echo e(old('mother_annual_income')); ?>">

                                <?php if($errors->has('mother_annual_income')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('mother_annual_income')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <label class="col-md-4 control-label"><?php echo app('translator')->get('Upload Profile Picture'); ?></label>
                            <div class="col-md-6">
                                <input type="hidden" id="picPath" name="pic_path">
                                <?php $__env->startComponent('components.file-uploader',['upload_type'=>'profile']); ?>
                                <?php if (isset($__componentOriginal1e90512e9353b27ea22fa15aa0057aab987fcfe7)): ?>
<?php $component = $__componentOriginal1e90512e9353b27ea22fa15aa0057aab987fcfe7; ?>
<?php unset($__componentOriginal1e90512e9353b27ea22fa15aa0057aab987fcfe7); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" id="registerBtn" class="btn btn-primary">
                                    <?php echo app('translator')->get('Register'); ?>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script>
    $(function () {
        $('#birthday').datepicker({
            format: "yyyy-mm-dd",
        });
        $('#session').datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
        });
    });
    $('#registerBtn').click(function () {
        $("#registerForm").submit();
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\dev\Unifiedtransform\resources\views/auth/register.blade.php ENDPATH**/ ?>