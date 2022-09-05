
<?php $__env->startSection('title', 'Thông tin'); ?>
<?php $__env->startPush('styles'); ?>
<style>
	.profile{
		padding: 30px 0;
	}
	.page-heading{
		text-align: center;
		margin-bottom: 15px;
	}
	.profile button{
		cursor: pointer;
	}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<div class="profile">
	<div class="container">
		<div class="content">
			<div class="bg-gray-lighter">
				<div class="items-push">
					<h1 class="page-heading">Thông tin</h1>
				</div>
			</div>
			<div class="error-section">
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
			<?php if(session('alert')): ?>
			<div class="error-section">
				 <div class='alert alert-success'><?php echo e(session('alert')); ?></div>
			</div>
			<?php endif; ?>
			<div class="row">
				<div class="block-content col-md-12">
					<form action="<?php echo e(route('front.savechangeprofile')); ?>" method="POST">
						<?php echo csrf_field(); ?>
						<div class="form-group">
							<label for="">Họ tên</label>
							<input type="text" name="name" class="form-control" value="<?php echo e(old('name') != '' ? old('name') : $login->name); ?>">
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input type="text" name="email" class="form-control" value="<?php echo e(old('email') != '' ? old('email') : $login->email); ?>" disabled>
						</div>
						<div class="form-group">
							<label for="">Số điện thoại</label>
							<input type="text" name="phone" class="form-control" value="<?php echo e(old('phone') != '' ? old('phone') : $login->phone); ?>">
						</div>
						<div class="form-group">
							<label for="">Địa chỉ</label>
							<input type="text" name="address" class="form-control" value="<?php echo e(old('address') != '' ? old('address') : $login->address); ?>">
						</div>
						<div class="form-group">
							<button class="btn btn-primary pull-right" name="save" type="submit">Lưu</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Documents\GitHub\BlackMoon\resources\views/auth/user/profile.blade.php ENDPATH**/ ?>