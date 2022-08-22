
<?php $__env->startSection('title', 'Đổi mật khẩu'); ?>
<?php $__env->startPush('styles'); ?>
<style>
	.content .row{
		background: #191c24
	}
	.block-content{
		padding-top: 15px;
	}
	button[name=save]{
		margin-bottom: 15px;
	}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<div class="content bg-gray-lighter">
	<div class="row items-push">
		<div class="col-sm-7">
			<h1 class="page-heading">Đổi mật khẩu</h1>
		</div>
	</div>
</div>
<div class="error-section">
	<div class="row">
		<?php if($errors->any()): ?>
		<div class="alert alert-danger">
			<ul>
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li><?php echo e($error); ?></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
		</div>
		<?php endif; ?>
	</div>
</div>
<?php if(session('alert')): ?>
<div class="error-section">
	<div class="row">
		    <div class='alert alert-success'><?php echo e(session('alert')); ?></div>
	</div>
</div>
<?php endif; ?>
<div class="content" style="min-height: 530px;">
	<div class="row">
		<div class="block-content col-md-12">
			<form action="<?php echo e(route('admin.savechangepass')); ?>" method="POST">
				<?php echo csrf_field(); ?>
				<div class="form-group">
					<label for="">Mật khẩu cũ</label>
					<input type="password" name="old_pass" class="form-control" value="<?php echo e(old('old_pass')); ?>">
				</div>
				<div class="form-group">
					<label for="">Mật khẩu mơi</label>
					<input type="password" name="new_pass" class="form-control" value="<?php echo e(old('new_pass')); ?>">
				</div>
				<div class="form-group">
					<label for="">Nhập lại mật khẩu</label>
					<input type="password" name="re_pass" class="form-control" value="<?php echo e(old('re_pass')); ?>">
				</div>
				<div class="form-group">
					<button class="btn btn-primary pull-right" name="save" type="submit">Lưu</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Documents\GitHub\BlackMoon\resources\views/auth/admin/changepassword.blade.php ENDPATH**/ ?>