
<?php $__env->startSection('title', 'Chỉnh sửa Fanpage'); ?>
<?php $__env->startPush('styles'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<div class="profile">
	<div class="title">
		<h4>Hồ sơ</h4>
	</div>
	<div class="content-profile">
		<div class="avatar">
			<img src="<?php echo e($login->image); ?>" alt="" />
		</div>
		<h1> <?php echo e($login->name); ?>

			<small>Admin</small>
		</h1>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Documents\GitHub\BlackMoon\resources\views/auth/admin/profile.blade.php ENDPATH**/ ?>