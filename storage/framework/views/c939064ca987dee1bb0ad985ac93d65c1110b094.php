
<?php $__env->startSection('title', $category->name); ?>
<?php $__env->startSection('content'); ?>
<div class="newscategory">
	<div class="container">
		<div class="list--news">
			<div class="title">
				<h1><?php echo e($category->name); ?></h1>
			</div>
			<div class="content">
				<div class="row">
				<?php $__currentLoopData = $listNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="news col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="news__content">
							<a href="/news/<?php echo e($value->subject); ?>.html">
								<div class="news__img">
									<img src="<?php echo e($value->image); ?>" alt="<?php echo e($value->name); ?>">
								</div>
								<div class="news__detail">
									<h4 class="news__name"><?php echo e($value->name); ?></h4>
									<div class="news__">
										<?php echo e($value->detail_short); ?>

									</div>
								</div>
							</a>
						</div>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BlackMoon\Documents\Github\BlackMoon\resources\views/frontend/page/newscategory.blade.php ENDPATH**/ ?>