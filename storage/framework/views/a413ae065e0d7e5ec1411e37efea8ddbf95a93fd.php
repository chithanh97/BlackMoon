
<?php $__env->startSection('title', 'Trang chủ'); ?>
<?php $__env->startSection('content'); ?>
<section class="slide">
	<div class="list--item__slide owl-carousel">
		<?php $__currentLoopData = $slide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="item-slide">
			<img src="<?php echo e($item->image); ?>" alt="<?php echo e($item->name); ?>">
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
	$('.list--item__slide').owlCarousel({
		loop: true,
		margin: 10,
		nav: false,
		items: 1,
		autoplay: true,
		lazyLoad: true,
		autoplaySpeed: 1000,
		autoplayHoverPause: true
	})
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Documents\GitHub\BlackMoon\resources\views/frontend/page/home.blade.php ENDPATH**/ ?>