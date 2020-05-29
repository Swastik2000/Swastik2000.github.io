<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse"
                aria-expanded="false">
                <span class="sr-only"><?php echo app('translator')->get('Toggle Navigation'); ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="<?php echo e(url('/home')); ?>" style="color: #000;">
                <?php echo e((Auth::check() && (Auth::user()->role == 'student' || Auth::user()->role == 'teacher' ||
                Auth::user()->role == 'admin' || Auth::user()->role == 'accountant' || Auth::user()->role ==
                'librarian'))?Auth::user()->school->name:config('app.name')); ?>

            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                <?php if(auth()->guard()->guest()): ?>
                <li><a href="<?php echo e(route('login')); ?>" style="color: #000;"><?php echo app('translator')->get('Login'); ?></a></li>
                <?php else: ?>
                <?php if(\Auth::user()->role == 'student'): ?>
                <li class="nav-item">
                    <a href="<?php echo e(url('user/'.\Auth::user()->id.'/notifications')); ?>" class="nav-link nav-link-align-btn"
                        role="button">
                        <i class="material-icons text-muted"><?php echo app('translator')->get('email'); ?></i>
                        <?php
                            $mc = \App\Notification::where('student_id',\Auth::user()->id)->where('active',1)->count();
                        ?>
                        <?php if($mc > 0): ?>
                        <span class="label label-danger" style="vertical-align: middle;border-style: none;border-radius: 50%;width: 30px;height: 30px;"><?php echo e($mc); ?></span>
                        <?php endif; ?>
                    </a>
                </li>
                <?php endif; ?>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle nav-link-align-btn" data-toggle="dropdown" role="button"
                        aria-expanded="false" aria-haspopup="true">
                        <span class="label label-danger">
                            <?php echo e(ucfirst(\Auth::user()->role)); ?>

                        </span>&nbsp;&nbsp;
                        <?php if(!empty(Auth::user()->pic_path)): ?>
                        <img src="<?php echo e(asset('01-progress.gif')); ?>" data-src="<?php echo e(url(Auth::user()->pic_path)); ?>" alt="Profile Picture"
                            style="vertical-align: middle;border-style: none;border-radius: 50%;width: 30px;height: 30px;">
                        <?php else: ?>
                        <?php if(strtolower(Auth::user()->gender) == 'male'): ?>
                        <img src="<?php echo e(asset('01-progress.gif')); ?>" data-src="https://img.icons8.com/color/48/000000/architect.png"
                            alt="Profile Picture" style="vertical-align: middle;border-style: none;border-radius: 50%;width: 30px;height: 30px;">
                        <?php else: ?>
                        <img src="<?php echo e(asset('01-progress.gif')); ?>" data-src="https://img.icons8.com/color/48/000000/architect-female.png"
                            alt="Profile Picture" style="vertical-align: middle;border-style: none;border-radius: 50%;width: 30px;height: 30px;">
                        <?php endif; ?>
                        <?php endif; ?>
                        &nbsp;&nbsp;<?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <?php if(Auth::user()->role != 'master'): ?>
                        <li>
                            <a href="<?php echo e(url('user/'.Auth::user()->student_code)); ?>"><?php echo app('translator')->get('Profile'); ?></a>
                        </li>
                        <?php endif; ?>
                        <li>
                            <a href="<?php echo e(url('user/config/change_password')); ?>"><?php echo app('translator')->get('Change Password'); ?></a>
                        </li>
                        <?php if(env('APP_ENV') != 'production'): ?>
                        <li>
                            <a href="<?php echo e(url('user/config/impersonate')); ?>">
                                <?php echo e(app('impersonate')->isImpersonating() ? __('Leave Impersonation') : __('Impersonate')); ?>

                            </a>                                
                        </li>
                        <?php endif; ?>
                        <li>
                            <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                <?php echo app('translator')->get('Logout'); ?>
                            </a>

                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo e(csrf_field()); ?>

                            </form>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav><?php /**PATH C:\dev\Unifiedtransform\resources\views/components/navbar-top.blade.php ENDPATH**/ ?>