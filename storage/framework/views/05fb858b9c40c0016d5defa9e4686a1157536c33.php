<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title><?php echo e($allsettings->site_title); ?> - <?php if(Auth::user()->id != 1): ?> <?php echo e(__('Profile Settings')); ?> <?php else: ?> <?php echo e(__('404 Not Found')); ?> <?php endif; ?></title>
<?php echo $__env->make('meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if($addition_settings->subscription_mode == 0): ?>
	<?php echo $__env->make('profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
	<?php if(Auth::user()->user_type == 'vendor'): ?>
        <?php echo $__env->make('profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php elseif(Auth::user()->user_type == 'customer'): ?>
        <?php echo $__env->make('profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php else: ?>
        <?php echo $__env->make('not-found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php endif; ?>
<?php endif; ?>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\fickrr\resources\views/profile-settings.blade.php ENDPATH**/ ?>