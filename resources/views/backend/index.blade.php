<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<link rel="shortcut icon" type="image/x-icon" href="" />
	<meta http-equiv="Content-Language"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<base href="http://127.0.0.1:8000/" />
	<meta name="language" content="vi" />
	<meta name="description" content="" />
	<meta name="robots" content="noodp,index,follow" />
	<meta name="revisit-after" content="1 days" />
	<meta name="copyright" content="Copyright © 2022-<?=date('Y')?> by BlackMoon" />
	<meta name="csrf-token" content="{{ csrf_token() }}">

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

	<!-- <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/plugin/bootstrap/css/bootstrap.min.css')}}"> -->

	<!-- Login css -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/backend/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/backend/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/backend/vendor/animate/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/backend/vendor/css-hamburgers/hamburgers.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/backend/vendor/select2/select2.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/backend/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/backend/css/main.css')}}">

	<!-- Main css -->
	<link rel="stylesheet" href="{{asset('assets/backend/css/materialdesignicons.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/backend/css/vendor.bundle.base.css')}}">
	<link rel="stylesheet" href="{{asset('assets/backend/css/jquery-jvectormap.css')}}">
	<link rel="stylesheet" href="{{asset('assets/backend/css/flag-icon.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/backend/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/backend/css/nestable.css')}}">
	<link rel="stylesheet" href="{{asset('assets/backend/plugin/fancybox/source/jquery.fancybox.css')}}">
	<link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>
	<link rel="stylesheet" href="{{asset('assets/backend/css/owl.theme.default.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/backend/plugin/select2/select2.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/backend/css/style.css')}}">
	<!-- <link rel="stylesheet" href="{{asset('assets/backend/plugin/tinymce/js/tinymce/skins/ui/oxide/content.min.css')}}"> -->
	<!-- <link rel="stylesheet" href="{{asset('assets/backend/plugin/tinymce/js/tinymce/skins/ui/tinymce-5-dark/skin.min.css')}}"> -->

	@stack('styles')

</head>
<body>
	<div class="container-scroller">
		<!-- partial:partials/_sidebar.html -->
		<nav class="sidebar sidebar-offcanvas" id="sidebar">
			<div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
				<a class="sidebar-brand brand-logo" href="index.html"><img src="assets/images/logo.svg" alt="logo" /></a>
				<a class="sidebar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
			</div>
			<ul class="nav">
				<li class="nav-item profile">
					<div class="profile-desc">
						<div class="profile-pic">
							<div class="count-indicator">
								<img class="img-xs rounded-circle " src="assets/images/faces/face15.jpg" alt="">
								<span class="count bg-success"></span>
							</div>
							<div class="profile-name">
								<h5 class="mb-0 font-weight-normal">Henry Klein</h5>
								<span>Gold Member</span>
							</div>
						</div>
						<a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
						<div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
							<a href="#" class="dropdown-item preview-item">
								<div class="preview-thumbnail">
									<div class="preview-icon bg-dark rounded-circle">
										<i class="mdi mdi-settings text-primary"></i>
									</div>
								</div>
								<div class="preview-item-content">
									<p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
								</div>
							</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item preview-item">
								<div class="preview-thumbnail">
									<div class="preview-icon bg-dark rounded-circle">
										<i class="mdi mdi-onepassword  text-info"></i>
									</div>
								</div>
								<div class="preview-item-content">
									<p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
								</div>
							</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item preview-item">
								<div class="preview-thumbnail">
									<div class="preview-icon bg-dark rounded-circle">
										<i class="mdi mdi-calendar-today text-success"></i>
									</div>
								</div>
								<div class="preview-item-content">
									<p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
								</div>
							</a>
						</div>
					</div>
				</li>
				<li class="nav-item nav-category">
					<span class="nav-link">Navigation</span>
				</li>
				<li class="nav-item menu-items">
					<a class="nav-link" href="index.html">
						<span class="menu-icon">
							<i class="mdi mdi-speedometer"></i>
						</span>
						<span class="menu-title">Dashboard</span>
					</a>
				</li>
				<li class="nav-item menu-items">
					<a class="nav-link" data-toggle="collapse" href="#products" aria-expanded="false" aria-controls="products">
						<span class="menu-icon">
							<i class="mdi mdi-laptop"></i>
						</span>
						<span class="menu-title">Sản phẩm</span>
						<i class="menu-arrow"></i>
					</a>
					<div class="collapse" id="products">
						<ul class="nav flex-column sub-menu">
							<li class="nav-item"> <a class="nav-link" href="{{ route('itemcategory') }}">Danh mục</a></li>
							<li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Danh sách</a></li>
						</ul>
					</div>
				</li>
				<li class="nav-item menu-items">
					<a class="nav-link" data-toggle="collapse" href="#news" aria-expanded="false" aria-controls="news">
						<span class="menu-icon">
							<i class="mdi mdi-laptop"></i>
						</span>
						<span class="menu-title">Bài viết</span>
						<i class="menu-arrow"></i>
					</a>
					<div class="collapse" id="news">
						<ul class="nav flex-column sub-menu">
							<li class="nav-item"> <a class="nav-link" href="{{ route('newscategory') }}">Danh mục</a></li>
							<li class="nav-item"> <a class="nav-link" href="{{ route('news') }}">Bài viết</a></li>
						</ul>
					</div>
				</li>
				<li class="nav-item menu-items">
					<a class="nav-link" data-toggle="collapse" href="#option" aria-expanded="false" aria-controls="option">
						<span class="menu-icon">
							<i class="mdi mdi-laptop"></i>
						</span>
						<span class="menu-title">Tính năng</span>
						<i class="menu-arrow"></i>
					</a>
					<div class="collapse" id="option">
						<ul class="nav flex-column sub-menu">
							<li class="nav-item"> <a class="nav-link" href="{{ route('slide') }}">Slide</a></li>
							<li class="nav-item"> <a class="nav-link" href="{{ route('banner') }}">Banner</a></li>
							<li class="nav-item"> <a class="nav-link" href="{{ route('video') }}">Video</a></li>
							<li class="nav-item"> <a class="nav-link" href="{{ route('map') }}">Bản đồ</a></li>
							<li class="nav-item"> <a class="nav-link" href="{{ route('banner') }}">Phân quyền</a></li>
							<li class="nav-item"> <a class="nav-link" href="{{ route('fanpage') }}">Fanpage Facebook</a></li>
							<li class="nav-item"> <a class="nav-link" href="{{ route('social') }}">Liên kết MXH</a></li>
							<li class="nav-item"> <a class="nav-link" href="{{ route('banner') }}">Thư viện ảnh</a></li>
							<li class="nav-item"> <a class="nav-link" href="{{ route('banner') }}">Watermark</a></li>
							<li class="nav-item"> <a class="nav-link" href="{{ route('menu') }}">Menu</a></li>
						</ul>
					</div>
				</li>
				<li class="nav-item menu-items">
					<a class="nav-link" href="{{ route('config.edit') }}">
						<span class="menu-icon">
							<i class="mdi mdi-playlist-play"></i>
						</span>
						<span class="menu-title">Cấu hình website</span>
					</a>
				</li>
				<li class="nav-item menu-items">
					<a class="nav-link" href="{{ route('language') }}">
						<span class="menu-icon">
							<i class="mdi mdi-playlist-play"></i>
						</span>
						<span class="menu-title">Ngôn ngữ</span>
					</a>
				</li>
				<li class="nav-item menu-items">
					<a class="nav-link iframe-btn" href="/storage/filemanager/dialog.php">
						<span class="menu-icon">
							<i class="mdi mdi-file-document"></i>
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
					<a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
				</div>
				<div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
					<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
						<span class="mdi mdi-menu"></span>
					</button>
					<ul class="navbar-nav w-100">
						<li class="nav-item w-100">
							<form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
								<input type="text" class="form-control" placeholder="Search products">
							</form>
						</li>
					</ul>
					<ul class="navbar-nav navbar-nav-right">
						<li class="nav-item dropdown d-none d-lg-block">
							<a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" data-toggle="dropdown" aria-expanded="false" href="#">+ Create New Project</a>
							<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="createbuttonDropdown">
								<h6 class="p-3 mb-0">Projects</h6>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item preview-item">
									<div class="preview-thumbnail">
										<div class="preview-icon bg-dark rounded-circle">
											<i class="mdi mdi-file-outline text-primary"></i>
										</div>
									</div>
									<div class="preview-item-content">
										<p class="preview-subject ellipsis mb-1">Software Development</p>
									</div>
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item preview-item">
									<div class="preview-thumbnail">
										<div class="preview-icon bg-dark rounded-circle">
											<i class="mdi mdi-web text-info"></i>
										</div>
									</div>
									<div class="preview-item-content">
										<p class="preview-subject ellipsis mb-1">UI Development</p>
									</div>
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item preview-item">
									<div class="preview-thumbnail">
										<div class="preview-icon bg-dark rounded-circle">
											<i class="mdi mdi-layers text-danger"></i>
										</div>
									</div>
									<div class="preview-item-content">
										<p class="preview-subject ellipsis mb-1">Software Testing</p>
									</div>
								</a>
								<div class="dropdown-divider"></div>
								<p class="p-3 mb-0 text-center">See all projects</p>
							</div>
						</li>
						<li class="nav-item nav-settings d-none d-lg-block">
							<a class="nav-link" href="#">
								<i class="mdi mdi-view-grid"></i>
							</a>
						</li>
						<li class="nav-item dropdown border-left">
							<a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
								<i class="mdi mdi-email"></i>
								<span class="count bg-success"></span>
							</a>
							<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
								<h6 class="p-3 mb-0">Messages</h6>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item preview-item">
									<div class="preview-thumbnail">
										<img src="assets/images/faces/face4.jpg" alt="image" class="rounded-circle profile-pic">
									</div>
									<div class="preview-item-content">
										<p class="preview-subject ellipsis mb-1">Mark send you a message</p>
										<p class="text-muted mb-0"> 1 Minutes ago </p>
									</div>
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item preview-item">
									<div class="preview-thumbnail">
										<img src="assets/images/faces/face2.jpg" alt="image" class="rounded-circle profile-pic">
									</div>
									<div class="preview-item-content">
										<p class="preview-subject ellipsis mb-1">Cregh send you a message</p>
										<p class="text-muted mb-0"> 15 Minutes ago </p>
									</div>
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item preview-item">
									<div class="preview-thumbnail">
										<img src="assets/images/faces/face3.jpg" alt="image" class="rounded-circle profile-pic">
									</div>
									<div class="preview-item-content">
										<p class="preview-subject ellipsis mb-1">Profile picture updated</p>
										<p class="text-muted mb-0"> 18 Minutes ago </p>
									</div>
								</a>
								<div class="dropdown-divider"></div>
								<p class="p-3 mb-0 text-center">4 new messages</p>
							</div>
						</li>
						<li class="nav-item dropdown border-left">
							<a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
								<i class="mdi mdi-bell"></i>
								<span class="count bg-danger"></span>
							</a>
							<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
								<h6 class="p-3 mb-0">Notifications</h6>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item preview-item">
									<div class="preview-thumbnail">
										<div class="preview-icon bg-dark rounded-circle">
											<i class="mdi mdi-calendar text-success"></i>
										</div>
									</div>
									<div class="preview-item-content">
										<p class="preview-subject mb-1">Event today</p>
										<p class="text-muted ellipsis mb-0"> Just a reminder that you have an event today </p>
									</div>
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item preview-item">
									<div class="preview-thumbnail">
										<div class="preview-icon bg-dark rounded-circle">
											<i class="mdi mdi-settings text-danger"></i>
										</div>
									</div>
									<div class="preview-item-content">
										<p class="preview-subject mb-1">Settings</p>
										<p class="text-muted ellipsis mb-0"> Update dashboard </p>
									</div>
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item preview-item">
									<div class="preview-thumbnail">
										<div class="preview-icon bg-dark rounded-circle">
											<i class="mdi mdi-link-variant text-warning"></i>
										</div>
									</div>
									<div class="preview-item-content">
										<p class="preview-subject mb-1">Launch Admin</p>
										<p class="text-muted ellipsis mb-0"> New admin wow! </p>
									</div>
								</a>
								<div class="dropdown-divider"></div>
								<p class="p-3 mb-0 text-center">See all notifications</p>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
								<div class="navbar-profile">
									<img class="img-xs rounded-circle" src="assets/images/faces/face15.jpg" alt="">
									<p class="mb-0 d-none d-sm-block navbar-profile-name">Henry Klein</p>
									<i class="mdi mdi-menu-down d-none d-sm-block"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
								<h6 class="p-3 mb-0">Profile</h6>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item preview-item">
									<div class="preview-thumbnail">
										<div class="preview-icon bg-dark rounded-circle">
											<i class="mdi mdi-settings text-success"></i>
										</div>
									</div>
									<div class="preview-item-content">
										<p class="preview-subject mb-1">Settings</p>
									</div>
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item preview-item" href="/admin/logout">
									<div class="preview-thumbnail">
										<div class="preview-icon bg-dark rounded-circle">
											<i class="mdi mdi-logout text-danger"></i>
										</div>
									</div>
									<div class="preview-item-content">
										<p class="preview-subject mb-1">Log out</p>
									</div>
								</a>
								<div class="dropdown-divider"></div>
								<p class="p-3 mb-0 text-center">Advanced settings</p>
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
					@yield('content')
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
	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
	<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	<script src="{{asset('assets/backend/js/vendor.bundle.base.js')}}"></script>
	<script src="{{asset('assets/backend/js/Chart.min.js')}}"></script>
	<script src="{{asset('assets/backend/js/progressbar.min.js')}}"></script>
	<script src="{{asset('assets/backend/js/nestable.js')}}"></script>
	<script src="{{asset('assets/backend/js/jquery-jvectormap.min.js')}}"></script>
	<script src="{{asset('assets/backend/js/jquery-jvectormap-world-mill-en.js')}}"></script>
	<!-- <script src="{{asset('assets/backend/plugin/bootstrap/js/bootstrap.min.js')}} "></script> -->
	<script src="{{asset('assets/backend/js/off-canvas.js')}}"></script>
	<script src="{{asset('assets/backend/js/hoverable-collapse.js')}}"></script>
	<script src="{{asset('assets/backend/js/settings.js')}}"></script>
	<script src="{{asset('assets/backend/js/todolist.js')}}"></script>
	<script src="{{asset('assets/backend/plugin/fancybox/source/jquery.fancybox.js')}}"></script>
	<script src="{{asset('assets/backend/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('assets/backend/js/jquery.cookie.js')}}"></script>
	<script src="{{asset('assets/backend/js/dashboard.js')}}"></script>
	<script src="{{asset('assets/backend/plugin/select2/select2.min.js')}}"></script>
	<script src="{{asset('storage/filemanager/js/tinymce/js/tinymce/tinymce.min.js')}}"></script>
	<script src="{{asset('storage/filemanager/js/tinymce/js/tinymce/tinymce.config.js')}}"></script>
	<script src="{{asset('assets/backend/js/main.js')}}"></script>
	<script src="{{asset('assets/backend/js/custom.js')}}"></script>
	@stack('scripts')
</body>
</html>