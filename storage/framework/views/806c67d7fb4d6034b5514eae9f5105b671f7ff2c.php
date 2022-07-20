<!DOCTYPE html>
<html>
<head>
  
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/frontend/plugin/bootstrap/css/bootstrap.min.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/frontend//css/main.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/frontend/css/owl.carousel.min.css')); ?>">
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
          </ul>
        </div>
      </div>
    </nav>
    <main id='main-content'>
      <?php echo $__env->yieldContent('content'); ?>
    </main>
    <footer id="main-footer">
      
    </footer>
  </div>
  <script src="<?php echo e(asset('assets/frontend/js/jquery-1.10.2.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/frontend/js/popper.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/frontend/js/bootstrap.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/frontend/js/owl.carousel.min.js')); ?>"></script>
  <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php echo $__env->make('frontend.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Documents\GitHub\BlackMoon\resources\views/frontend/index.blade.php ENDPATH**/ ?>