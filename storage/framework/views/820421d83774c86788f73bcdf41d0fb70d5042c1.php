
<?php $__env->startSection('title', $news->name); ?>
<?php $__env->startSection('content'); ?>
<div class="newsdetail">
	<div class="container">
		<div class="news--title">
			<h1><?php echo e($news->name); ?></h1>
		</div>
		<div class="news-content">
			<?=$news->detail ?>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BlackMoon\Documents\Github\BlackMoon\resources\views/frontend/page/news.blade.php ENDPATH**/ ?>