<!DOCTYPE html>
<html>
<head>
	<title><?php echo $__env->yieldContent('title'); ?></title>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<link rel="shortcut icon" type="image/x-icon" href="" />
	<meta http-equiv="Content-Language"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="language" content="vi" />
	<meta name="description" content="" />
	<meta name="robots" content="noodp,index,follow" />
	<meta name="revisit-after" content="1 days" />
	<meta name="copyright" content="Copyright © 2022-<?=date('Y')?> by BlackMoon" />
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<link rel="icon" type="image/x-icon" href="<?php echo e($config->logo); ?>">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="canonical" href="">
	<meta property="og:title" content="">
	<meta property="og:image" content=""/>
	<meta property="og:type" content="" />
	<meta property="og:url" content="" />
	<meta property="og:description" content="">
	<meta property ="og:locale" content ="vi" />

	<!-- Dublin Core-->
	<link rel="schema.DC" href="https://purl.org/dc/elements/1.1/" />
	<meta name="DC.title" content="" />
	<meta name="DC.identifier" content="" />
	<meta name="DC.description" content="" />
	<meta name="DC.subject" content="" />
	<meta name="DC.language" scheme="UTF-8" content="" />

	<!-- Geo Meta Tags -->
	<meta name="geo.region" content="VN" />
	<meta name="geo.placename" content="Ho Chi Minh City" />
	<meta name="geo.position" content="10.806105;106.63668" />
	<meta name="ICBM" content="10.806105, 106.63668" />

	<!-- Login css -->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/frontend/fonts/font-awesome-4.7.0/css/font-awesome.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/backend/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/backend/vendor/animate/animate.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/backend/vendor/css-hamburgers/hamburgers.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/backend/vendor/select2/select2.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/backend/css/util.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/backend/css/main.css')); ?>">

	<!-- Main css -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/materialdesignicons.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/vendor.bundle.base.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/jquery-jvectormap.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/flag-icon.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/owl.carousel.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/nestable.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/backend/plugin/fancybox/source/jquery.fancybox.css')); ?>">
	<link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>
	<link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/owl.theme.default.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/backend/plugin/select2/select2.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/style.css')); ?>">

	<?php echo $__env->yieldPushContent('styles'); ?>

</head>
<body>
	<div class="container-scroller">
		<!-- partial:partials/_sidebar.html -->
		<nav class="sidebar sidebar-offcanvas" id="sidebar">
			<div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
				<a class="sidebar-brand brand-logo" href="/"><img src="/storage/uploads/logo/Laravel_logo_wordmark_logotype.png" alt="logo" /></a>
			</div>
			<ul class="nav">
				<li class="nav-item profile">
					<div class="profile-desc">
						<div class="profile-pic">
							<div class="count-indicator">
								<img class="img-xs rounded-circle " src="<?php echo e($admin->image); ?>" alt="">
								<span class="count bg-success"></span>
							</div>
							<div class="profile-name">
								<h5 class="mb-0 font-weight-normal"><?php echo e($admin->name); ?></h5>
							</div>
						</div>
					</div>
				</li>
				<li class="nav-item nav-category">
					<span class="nav-link"></span>
				</li>
				<li class="nav-item menu-items">
					<a class="nav-link" href="<?php echo e(route('dashboard')); ?>">
						<span class="menu-icon">
							<i class="mdi mdi-speedometer"></i>
						</span>
						<span class="menu-title">Dashboard</span>
					</a>
				</li>
				<li class="nav-item menu-items">
					<a class="nav-link" href="<?php echo e(route('order')); ?>">
						<span class="menu-icon">
							<i class="mdi mdi-cart"></i>
						</span>
						<span class="menu-title">Đơn hàng</span>
					</a>
				</li>
				<li class="nav-item menu-items">
					<a class="nav-link" data-toggle="collapse" href="#products" aria-expanded="false" aria-controls="products">
						<span class="menu-icon">
							<i class="mdi mdi-image-filter"></i>
						</span>
						<span class="menu-title">Sản phẩm</span>
						<i class="menu-arrow"></i>
					</a>
					<div class="collapse" id="products">
						<ul class="nav flex-column sub-menu">
							<li class="nav-item"> <a class="nav-link" href="<?php echo e(route('itemcategory')); ?>">Danh mục</a></li>
							<li class="nav-item"> <a class="nav-link" href="<?php echo e(route('items')); ?>">Sản phẩm</a></li>
						</ul>
					</div>
				</li>
				<li class="nav-item menu-items">
					<a class="nav-link" data-toggle="collapse" href="#news" aria-expanded="false" aria-controls="news">
						<span class="menu-icon">
							<i class="mdi mdi mdi-clipboard-text"></i>
						</span>
						<span class="menu-title">Bài viết</span>
						<i class="menu-arrow"></i>
					</a>
					<div class="collapse" id="news">
						<ul class="nav flex-column sub-menu">
							<li class="nav-item"> <a class="nav-link" href="<?php echo e(route('newscategory')); ?>">Danh mục</a></li>
							<li class="nav-item"> <a class="nav-link" href="<?php echo e(route('news')); ?>">Bài viết</a></li>
						</ul>
					</div>
				</li>
				<li class="nav-item menu-items">
					<a class="nav-link" data-toggle="collapse" href="#option" aria-expanded="false" aria-controls="option">
						<span class="menu-icon">
							<i class="mdi mdi-windows"></i>
						</span>
						<span class="menu-title">Tính năng</span>
						<i class="menu-arrow"></i>
					</a>
					<div class="collapse" id="option">
						<ul class="nav flex-column sub-menu">
							<li class="nav-item"> <a class="nav-link" href="<?php echo e(route('slide')); ?>">Slide</a></li>
							<li class="nav-item"> <a class="nav-link" href="<?php echo e(route('banner')); ?>">Banner</a></li>
							<li class="nav-item"> <a class="nav-link" href="<?php echo e(route('video')); ?>">Video</a></li>
							<li class="nav-item"> <a class="nav-link" href="<?php echo e(route('map')); ?>">Bản đồ</a></li>
							<li class="nav-item"> <a class="nav-link" href="<?php echo e(route('banner')); ?>">Phân quyền</a></li>
							<li class="nav-item"> <a class="nav-link" href="<?php echo e(route('fanpage')); ?>">Fanpage Facebook</a></li>
							<li class="nav-item"> <a class="nav-link" href="<?php echo e(route('social')); ?>">Liên kết MXH</a></li>
							<li class="nav-item"> <a class="nav-link" href="<?php echo e(route('banner')); ?>">Thư viện ảnh</a></li>
							<li class="nav-item"> <a class="nav-link" href="<?php echo e(route('banner')); ?>">Watermark</a></li>
							<li class="nav-item"> <a class="nav-link" href="<?php echo e(route('menu')); ?>">Menu</a></li>
						</ul>
					</div>
				</li>
				<li class="nav-item menu-items">
					<a class="nav-link" href="<?php echo e(route('config.edit')); ?>">
						<span class="menu-icon">
							<i class="mdi mdi-settings"></i>
						</span>
						<span class="menu-title">Cấu hình website</span>
					</a>
				</li>
				<li class="nav-item menu-items">
					<a class="nav-link" href="<?php echo e(route('language')); ?>">
						<span class="menu-icon">
							<i class="mdi mdi-flag"></i>
						</span>
						<span class="menu-title">Ngôn ngữ</span>
					</a>
				</li>
				<li class="nav-item menu-items">
					<a class="nav-link iframe-btn" href="/storage/filemanager/dialog.php">
						<span class="menu-icon">
							<i class="mdi mdi-file-image"></i>
						</span>
						<span class="menu-title">Media</span>
					</a>
				</li>
			</ul>
		</nav>
		<!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<!-- partial:partials/_navbar.html -->
			<nav class="navbar p-0 fixed-top d-flex flex-row">
				<div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
				</div>
				<div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
					<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
						<span class="mdi mdi-menu"></span>
					</button>
					<ul class="navbar-nav navbar-nav-right">
						<li class="nav-item dropdown">
							<a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
								<div class="navbar-profile">
									<img class="img-xs rounded-circle" src="<?php echo e($admin->image); ?>" alt="">
									<p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo e($admin->name); ?></p>
									<i class="mdi mdi-menu-down d-none d-sm-block"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
								<div class="dropdown-divider"></div>
								<a class="dropdown-item preview-item" href="<?php echo e(route('admin.changepass')); ?>">
									<div class="preview-thumbnail">
										<div class="preview-icon bg-dark rounded-circle">
											<i class="mdi mdi-account-key text-success"></i>
										</div>
									</div>
									<div class="preview-item-content">
										<p class="preview-subject mb-1">Đổi mật khẩu</p>
									</div>
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item preview-item" href="<?php echo e(route('admin.logout')); ?>">
									<div class="preview-thumbnail">
										<div class="preview-icon bg-dark rounded-circle">
											<i class="mdi mdi-logout text-danger"></i>
										</div>
									</div>
									<div class="preview-item-content">
										<p class="preview-subject mb-1">Log out</p>
									</div>
								</a>
							</div>
						</li>
					</ul>
					<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
						<span class="mdi mdi-format-line-spacing"></span>
					</button>
				</div>
			</nav>
			<!-- partial -->
			<div class="main-panel">
				<div class="content-wrapper">
					<?php echo $__env->yieldContent('content'); ?>
				</div>
				<!-- content-wrapper ends -->
				<!-- partial:partials/_footer.html -->
				<footer class="footer">
					<div class="d-sm-flex justify-content-center justify-content-sm-between">
						<span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
						<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
					</div>
				</footer>
				<!-- partial -->
			</div>
			<!-- main-panel ends -->
		</div>
		<!-- page-body-wrapper ends -->
	</div>
	<!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> -->
	<script src="<?php echo e(asset('assets/backend/js/vendor.bundle.base.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/backend/js/popper.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/backend/js/bootstrap.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/backend/js/Chart.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/backend/js/progressbar.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/backend/js/nestable.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/backend/js/jquery-jvectormap.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/backend/js/jquery-jvectormap-world-mill-en.js')); ?>"></script>
	<!-- <script src="<?php echo e(asset('assets/backend/plugin/bootstrap/js/bootstrap.min.js')); ?> "></script> -->
	<script src="<?php echo e(asset('assets/backend/js/off-canvas.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/backend/js/hoverable-collapse.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/backend/js/settings.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/backend/js/todolist.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/backend/plugin/fancybox/source/jquery.fancybox.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/backend/js/owl.carousel.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/backend/js/jquery.cookie.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/backend/js/dashboard.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/backend/js/number.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/backend/plugin/select2/select2.min.js')); ?>"></script>
	<script src="<?php echo e(asset('storage/filemanager/js/tinymce/js/tinymce/tinymce.min.js')); ?>"></script>
	<script src="<?php echo e(asset('storage/filemanager/js/tinymce/js/tinymce/tinymce.config.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/backend/js/main.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/backend/js/custom.js')); ?>"></script>
	<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH C:\Users\ADMIN\Documents\GitHub\BlackMoon\resources\views/backend/index.blade.php ENDPATH**/ ?>