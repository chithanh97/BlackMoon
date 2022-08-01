<div class="container">
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="footer-logo">
				<a href="/">
					<img src="<?php echo e($config->logo); ?>" alt="<?php echo e($config->name); ?>">
				</a>
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<ul>
				<li></li>
			</ul>
			<?php if(count($listNews[$i->code]) > 0): ?>
			<ul>
				<?php $__currentLoopData = $listNews[$i->code]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li><a href="/news/<?php echo e($j->subject); ?>.html"><?php echo e($j->name); ?></a></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
			<?php endif; ?>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"></div>
	</div>
</div><?php /**PATH C:\Users\ADMIN\Documents\GitHub\BlackMoon\resources\views/frontend/layout/footer.blade.php ENDPATH**/ ?>