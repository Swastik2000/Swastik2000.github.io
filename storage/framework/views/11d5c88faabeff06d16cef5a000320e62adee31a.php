<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e((Auth::check() && (Auth::user()->role == 'student' || Auth::user()->role == 'teacher'
        || Auth::user()->role == 'admin' || Auth::user()->role == 'accountant' || Auth::user()->role ==
        'librarian'))?Auth::user()->school->name:config('app.name')); ?></title>

    <link rel="stylesheet" href="<?php echo e(url('css/loader.css')); ?>">

    <script src="<?php echo e(url('js/vendors.js')); ?>"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script src="<?php echo e(url('js/application.js')); ?>"></script>
    <?php echo $__env->yieldContent('after_scripts'); ?>
</head>

<body>
    <?php echo $__env->make('components.loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div id="app">
        <?php echo $__env->make('components.navbar-top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons&style=normal&weight=400"
      rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(url('css/vendors.css')); ?>" id="bootswatch-print-id">
    <link rel="stylesheet" href="<?php echo e(url('css/application.css')); ?>">
</body>

</html>
<?php /**PATH C:\dev\Unifiedtransform\resources\views/layouts/app.blade.php ENDPATH**/ ?>