
<?php $__env->startSection('title', 'Thanh toán'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
	<div id="thankyou">
		<div class="thankyou">
			<div class="thankyou-title">
				<h1>Thank You!</h1>
			</div>
			<p>Đơn hàng <span><?php echo e($order->order_code); ?></span> của bạn đã được đặt hàng thành công</p>
			<p>Chúng tôi sẽ liên hệ trong thời gian sớm nhất</p>
			<p>Mọi thắc mắc vui lòng liên hệ hotline: <?php echo e($config->hotline); ?></p>
			<a href="/">Trang Chủ</a>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Documents\GitHub\BlackMoon\resources\views/frontend/page/thanks.blade.php ENDPATH**/ ?>