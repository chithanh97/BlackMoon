
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
					<?php $__currentLoopData = $listItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="item col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="item__content">
							<a href="/items/<?php echo e($value->subject); ?>.html">
								<div class="item__img">
									<img src="<?php echo e(getFirstImage($value->image)); ?>" alt="<?php echo e($value->name); ?>">
								</div>
							</a>
							<div class="item__detail">
								<h4 class="item__name"><a href="/items/<?php echo e($value->subject); ?>.html"><?php echo e($value->name); ?></a></h4>
								<?=getPrice($value) ?>
								<button class="btn-buy button-buy"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Mua ngay</button>
							</div>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BlackMoon\Documents\Github\BlackMoon\resources\views/frontend/page/itemcategory.blade.php ENDPATH**/ ?>