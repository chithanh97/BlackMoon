<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập quản trị</title>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/backend/fonts/font-awesome-4.7.0/css/font-awesome.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/backend/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/backend/vendor/animate/animate.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/backend/vendor/css-hamburgers/hamburgers.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/backend/vendor/select2/select2.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/backend/css/util.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/backend/css/main.css')); ?>">
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url(<?php echo e(asset('assets/backend/images/img-01.jpg')); ?>);">
			<div class="wrap-login100 p-b-30">
				<form class="login100-form validate-form" action="<?php echo e(route('admin.login')); ?>" method="post">

					<div class="login100-form-avatar">
						<img src="<?php echo e(asset('assets/backend/images/avatar-01.jpg')); ?>" alt="AVATAR">
					</div>
					<span class="login100-form-title p-t-20 p-b-45">
						John Doe
					</span>

					<?php if(Session::get('success')): ?>
					<div class="alert alert-success full-width">
						<?php echo e(Session::get('success')); ?>

					</div>
					<?php endif; ?>

					<?php if(Session::get('fail')): ?>
					<div class="alert alert-danger full-width">
						<?php echo e(Session::get('fail')); ?>

					</div>
					<?php endif; ?>
					<?php echo csrf_field(); ?>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<input class="input100" type="text" name="email" placeholder="Username" value="<?php echo e(old('email')); ?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>
					<span class="text-danger"><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password" value="<?php echo e(old('password')); ?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>
					<span class="text-danger"><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html><?php /**PATH C:\xampp\htdocs\matmado\resources\views/auth/admin/login.blade.php ENDPATH**/ ?>