<?php $__env->startComponent('mail::message'); ?>

# <?php echo app('translator')->get('Welcome to'); ?> <?php echo e(config('app.name')); ?>


<?php echo app('translator')->get('Hi'); ?> <?php echo e($name); ?>,

<?php echo app('translator')->get('We are glad to have you on board.'); ?>

<?php if(!is_null($password)): ?>
<?php echo app('translator')->get('Your login details are as follows:'); ?>

**<?php echo app('translator')->get('Email'); ?>**: <?php echo e($email); ?>


**<?php echo app('translator')->get('Password'); ?>**: <?php echo e($password); ?>


<?php echo app('translator')->get('You can change your password once logged-in.'); ?>
<?php else: ?>
<?php echo app('translator')->get('Please ask site administrator to know your login access.'); ?>
<?php endif; ?>

<?php $__env->startComponent('mail::button', ['url' => url('login')]); ?>
<?php echo app('translator')->get('Visit site'); ?>
<?php if (isset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e)): ?>
<?php $component = $__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e; ?>
<?php unset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

<?php echo app('translator')->get('Thanks'); ?>,<br>
<?php echo e(config('app.name')); ?>

<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH C:\dev\Unifiedtransform\resources\views/email/user/welcome.blade.php ENDPATH**/ ?>