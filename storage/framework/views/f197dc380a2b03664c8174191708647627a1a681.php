
<?php $__env->startSection('title', $item->name); ?>
<?php $__env->startSection('content'); ?>
<div class="items">
	<div class="container">
		<div class="news--title">
			<h1><?php echo e($item->name); ?></h1>
		</div>
		<div class="item-content">
			<div class="row">
				<div class="com-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="thumbnail">
						<img src="<?php echo e(getFirstImage($item->image)); ?>" alt="<?php echo e($item->name); ?>">
					</div>
					<div class="list-thumbs">
						<ul>
							<?php $__currentLoopData = json_decode( $item->image ); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li>
								<img src="<?php echo e($v[1]); ?>" alt="<?php echo e($item->name); ?>">
							</li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Documents\GitHub\BlackMoon\resources\views/frontend/page/item.blade.php ENDPATH**/ ?>