<div class="container">
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="footer-logo">
				<a href="/">
					<img src="<?php echo e($config->logo); ?>" alt="<?php echo e($config->name); ?>">
				</a>
			</div>
			<div class="content--footer">
				<p><span>Hotline:</span> <?php echo e($config->hotline); ?></p>
				<p><span>Email:</span> <?php echo e($config->email); ?></p>
				<p><span>Địa chỉ:</span> <?php echo e($config->address); ?></p>
				<p><span>Website:</span> <?php echo e($config->domain); ?></p>
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<h3 class="title">Map</h3>
			<?=$map->detail ?>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<h3 class="title">Fanpage</h3>
			<?=$fanpage->detail ?>
		</div>
	</div>
</div><?php /**PATH C:\Users\ADMIN\Documents\GitHub\BlackMoon\resources\views/frontend/layout/footer.blade.php ENDPATH**/ ?>