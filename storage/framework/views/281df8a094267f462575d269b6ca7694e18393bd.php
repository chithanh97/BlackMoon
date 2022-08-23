	<meta http-equiv="Content-Language" content="vi" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $__env->yieldContent('title'); ?></title>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo e($config->favicon); ?>" />
	<meta http-equiv="Content-Language"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="language" content="vi" />
	<meta name="description" content="<?php echo $__env->yieldContent('description'); ?>" />
	<meta name="robots" content="noodp,index,follow" />
	<meta name="revisit-after" content="1 days" />
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<link rel="icon" type="image/x-icon" href="<?php echo e($config->logo); ?>">

	<link rel="canonical" href="<?php echo e($_SERVER['SERVER_NAME']); ?>">
	<meta property="og:title" content="<?php echo $__env->yieldContent('o_title'); ?>">
	<meta property="og:image" content="<?php echo $__env->yieldContent('image'); ?>"/>
	<meta property="og:type" content="<?php echo $__env->yieldContent('type'); ?>" />
	<meta property="og:url" content="<?php echo $__env->yieldContent('url'); ?>" />
	<meta property="og:description" content="<?php echo $__env->yieldContent('description'); ?>">
	<meta property ="og:locale" content ="vi" />

	<!-- Dublin Core-->
	<link rel="schema.DC" href="https://purl.org/dc/elements/1.1/" />
	<meta name="DC.title" content="<?php echo e($config->title); ?>" />
	<meta name="DC.identifier" content="<?php echo e($_SERVER['SERVER_NAME']); ?>" />
	<meta name="DC.description" content="<?php echo e($config->description); ?>" />
	<meta name="DC.subject" content="<?php echo e($config->keyword); ?>" />
	<meta name="DC.language" scheme="UTF-8" content="vi" />

	<!-- Geo Meta Tags -->
	<meta name="geo.region" content="VN" />
	<meta name="geo.placename" content="Ho Chi Minh City" />
	<meta name="geo.position" content="10.806105;106.63668" />
	<meta name="ICBM" content="10.806105, 106.63668" />
<?php /**PATH C:\Users\ADMIN\Documents\GitHub\BlackMoon\resources\views/frontend/layout/header.blade.php ENDPATH**/ ?>