<div id="right-panel" class="right-panel">
<?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if($view_name == 'admin-index'): ?>
<?php else: ?>
<h3 align="center" class="mt-3 pt-3"><?php echo e(__('This page is permission denied')); ?></h3>
<?php endif; ?>
</div><?php /**PATH C:\xampp\htdocs\fickrr\resources\views/admin/denied.blade.php ENDPATH**/ ?>