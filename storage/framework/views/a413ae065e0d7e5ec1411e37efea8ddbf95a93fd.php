
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
<section class="product">
	<div class="container">
		<?php if(count($itemCateHot) > 0): ?>
		<?php $__currentLoopData = $itemCateHot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="list--item">
			<div class="title">
				<h3><?php echo e($i->name); ?></h3>
			</div>
			<?php if(count($listItem[$i->code]) > 0): ?>
			<div class="list--item__product">
				<div class="row">
					<?php $__currentLoopData = $listItem[$i->code]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="item col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<a href="/items/<?php echo e($j->subject); ?>.html">
							<div class="item__img">
								<img src="<?php echo e(getFirstImage($j->image)); ?>" alt="<?php echo e($j->name); ?>">
							</div>
							<span class="item__detail">
								<h4><?php echo e($j->name); ?></h4>
								<div>
									<?php echo e($j->detail_short); ?>

								</div>
							</span>
						</a>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
			<?php endif; ?>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endif; ?>
	</div>
</section>
<section class="news">
	<div class="container">
		<?php if(count($newsCateHot) > 0): ?>
		<?php $__currentLoopData = $newsCateHot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="list--news">
			<div class="title">
				<h3><?php echo e($i->name); ?></h3>
			</div>
			<?php if(count($listNews[$i->code]) > 0): ?>
			<div class="list--news__product">
				<div class="row">
					<?php $__currentLoopData = $listNews[$i->code]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="news col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<a href="/news/<?php echo e($j->subject); ?>.html">
							<div class="news__img">
								<img src="<?php echo e($j->image); ?>" alt="<?php echo e($j->name); ?>">
							</div>
							<span class="news__detail">
								<h4><?php echo e($j->name); ?></h4>
								<div>
									<?php echo e($j->detail_short); ?>

								</div>
							</span>
						</a>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
			<?php endif; ?>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endif; ?>
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