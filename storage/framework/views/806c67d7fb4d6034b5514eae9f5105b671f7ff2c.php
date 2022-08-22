
<!DOCTYPE html>
<html>
<head>
	<?php echo $__env->make('frontend.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/frontend/plugin/bootstrap/css/bootstrap.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/frontend/css/main.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/frontend/css/owl.carousel.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/frontend/fonts/font-awesome-4.7.0/css/font-awesome.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/frontend/plugin/fancybox/jquery.fancybox.min.css')); ?>">
	<?php echo $__env->yieldPushContent('styles'); ?>
	<?php echo $__env->yieldPushContent('schema'); ?>
</head>
<body>
	<div class="wrapper">
		<nav id='menu-main'>
			<div class="container">
				<div class="content-menu">
					<div class="logo">
						<a href="/">
							<img src="<?php echo e($config->logo); ?>" alt="<?php echo e($config->name); ?>">
						</a>
					</div>
					<ul class="item-menu">
						<?php if($menu->content != null) echo getMenuFront(json_decode($menu->content), $itemcategory, $newscategory, $listitem) ?>
						<li>
							<div class="btn-search" data-toggle="modal" data-target="#search">
								<i class="fa fa-search"></i>
							</div>
						</li>
						<li>
							<a href="<?php echo e(route('cart.show')); ?>" class="show-cart">
								<span class="count-cart"><?php echo e($countCart); ?></span>
								<i class="fa fa-shopping-cart"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<main id='main-content'>
			<?php echo $__env->yieldContent('content'); ?>
		</main>
		<div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="searchLabel" aria-hidden="true">
			<form action="<?php echo e(route('search')); ?>" method="POST">
				<?php echo csrf_field(); ?>
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="searchLabel">Tìm kiếm</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<input class="form-control" type="text" placeholder="Từ khóa..." name="key">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
							<button type="submit" class="btn btn-primary">Tìm kiếm</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		<footer id="main-footer">
			<?php echo $__env->make('frontend.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</footer>
	</div>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v14.0" nonce="Cmb2Jlle"></script>
	<script src="<?php echo e(asset('assets/frontend/js/jquery-1.10.2.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/frontend/js/popper.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/frontend/js/bootstrap.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/frontend/js/owl.carousel.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/frontend/plugin/fancybox/jquery.fancybox.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/frontend/js/elevatezoomPlus.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/frontend/js/main.js')); ?>"></script>
	<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH C:\Users\ADMIN\Documents\GitHub\BlackMoon\resources\views/frontend/index.blade.php ENDPATH**/ ?>