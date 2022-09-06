
<?php $__env->startSection('title', 'Quên mật khẩu'); ?>
<?php $__env->startPush('styles'); ?>
<style>
	.page-heading{
		text-align: center;
		margin-bottom: 15px;
	}
	.forgotpass button{
		cursor: pointer;
	}
	.forgotpass .container{
		min-height: 50vh;
		display: flex;
		align-items: center;
	}
	.forgotpass .content{
		width: 100%;
	}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<div class="forgotpass">
	<div class="container">
		<div class="content">
			<div class="bg-gray-lighter">
				<div class="items-push">
					<h1 class="page-heading">Quên mật khẩu</h1>
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
					<form action="<?php echo e(route('front.renewpass')); ?>" method="POST">
						<?php echo csrf_field(); ?>
						<div class="form-group">
							<label for="">Email đăng ký tài khoản</label>
							<input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" placeholder="">
						</div>
						<div class="form-group">
							<button class="btn btn-primary pull-right" name="save" type="submit">Khôi phục</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Documents\GitHub\BlackMoon\resources\views/auth/user/forgotpass.blade.php ENDPATH**/ ?>