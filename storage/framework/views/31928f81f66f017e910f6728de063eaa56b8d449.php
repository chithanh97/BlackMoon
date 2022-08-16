
<?php $__env->startSection('title', 'Chi tiết đơn hàng'); ?>
<?php $__env->startSection('content'); ?>
<div class="content bg-gray-lighter">
	<div class="row items-push">
		<div class="col-sm-7">
			<h1 class="page-heading">Đơn hàng <small>Chi tiết đơn hàng</small></h1>
		</div>
		<div class="col-sm-5 text-right hidden-xs">
			<ol class="breadcrumb push-10-t">
				<li><a href="<?php echo e(route('dashboard')); ?>">Quản trị</a>
				</li>
				<li><a href="<?php echo e(route('order')); ?>">Đơn hàng</a>
				</li>
				<li>Chi tiết đơn hàng</li>
			</ol>
		</div>
	</div>
</div>
<div class="error-section">
	<?php if($errors->any()): ?>
	<div class="alert alert-danger">
		<ul>
			<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<li><?php echo e($error); ?></li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	</div>
	<?php endif; ?>
</div>
<div class="content" style="min-height: 530px;">
	<div class="bs-example bs-example-bg-classes">
	</div>
	<div class="block">
		<div class="block-content">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-xs-6">
					<div class="info">
						<div class="title">
							<h4>Thông tin vận chuyển</h4>
						</div>
						<div class="info--input">
							<p><span>Họ tên:</span> <?php echo e($item->name); ?></p>
							<p><span>Số điện thoại:</span> <?php echo e($item->phone); ?></p>
							<p><span>Email:</span> <?php echo e($item->mail); ?></p>
							<p><span>Địa chỉ:</span> <?php echo e($item->address); ?></p>
						</div>
						<div class="info--select">
							<p><span>Tỉnh/Thành:</span> <?php echo e($province != '' ? $province->_name : '_____'); ?>, <span>Quận/Huyện:</span> <?php echo e($district != '' ? $district->_name : '_____'); ?>, <span>Phường/Xã:</span> <?php echo e($ward != '' ? $ward->_name : '_____'); ?></p>
						</div>
						<div class="info-textarea">
							<p><span>Ghi chú:</span> <?php echo e($item->note); ?></p>
						</div>
					</div>
					<div class="ship">
						<div class="title">
							<h4>Phương thức thanh toán</h4>
						</div>
						<div class="ship-item <?php echo e($item->pay_method == 1 ? 'active' : ''); ?>">
							<input class="form-check-input pay--method" type="radio" value="1" name="pay_method" checked>
							<img src="/storage/uploads/logo/Laravel_logo_wordmark_logotype.png" alt="cod">
							<div>
								<p>COD</p>
								<span>Thanh toán khi nhận hàng</span>
							</div>
						</div>
						<div class="ship-item <?php echo e($item->pay_method == 2 ? 'active' : ''); ?>">
							<input class="form-check-input pay--method" type="radio" value="2" name="pay_method">
							<img src="/storage/uploads/logo/Laravel_logo_wordmark_logotype.png" alt="momo">
							<div>
								<p>momo</p>
								<span>Thanh toán qua app MoMo</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-xs-6">
					<div class="cart--box">
						<div class="title">
							<h4>Giỏ hàng</h4>
						</div>
						<div class="cart--view">
							<?php $__currentLoopData = $listItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="cart--item">
								<div class="cart--item__image">
									<a href="<?php echo e(route('front.items', $items->subject)); ?>">
										<img src="<?php echo e($items->image); ?>" alt="<?php echo e($items->name); ?>">
									</a>
								</div>
								<div class="cart--item__name">
									<p><a href="<?php echo e(route('front.items', $items->subject)); ?>"><?php echo e($items->name); ?></a></p>
									<span>x<?php echo e($items->qty); ?></span>
								</div>
								<div class="cart--item__price">
									<?php echo e(number_format($items->price, 0, '.', '.').getMoney()); ?>

									<?php $sell += $items->sell_price ?>
								</div>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
						<div class="cart--total">
							<div class="tamtinh">
								<div class="cart--total__label">
									Tạm tính:
								</div>
								<div class="cart--total__count">
									<?php echo e(number_format($item->total, 0, '.', '.').getMoney()); ?>

								</div>
							</div>
							<div class="giamgia">
								<div class="cart--total__label">
									Giảm giá:
								</div>
								<div class="cart--total__count">
									0đ
								</div>
							</div>
							<div class="giaohang">
								<div class="cart--total__label">
									Phí giao hàng:
								</div>
								<div class="cart--total__count">
									0đ
								</div>
							</div>
							<div class="tong">
								<div class="cart--total__label">
									Tổng:
								</div>
								<div class="cart--total__count">
									<?php echo e(number_format($item->total, 0, '.', '.').getMoney()); ?>

								</div>
							</div>
						</div>
					</div>
					<div class="checkout">
						<button onclick="javascript:window.location.href = '<?php echo e(route('order')); ?>' " type="button" name="goback" class="btn btn-sm btn-danger">Quay lại</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
<style>
	select option, select {
		color: #fff!important;
	}
	.error-section .alert-danger{
		margin: 0 -10px 15px -10px;
	}
	.error-section .alert-danger ul{
		margin-bottom: 0;
	}
	.block .row{
		background: #191c24;
		padding-top: 15px;
		padding-bottom: 15px;
	}
	.block .row > div:first-child{
		border-right: 1px solid;
	}
	.info{
		margin-bottom: 30px;
	}
	.title h4{
		font-size: 18px;
		font-weight: bold;
		margin-bottom: 25px;
		position: relative;
		width: max-content;
	}
	.title h4:before{
		content: '';
		position: absolute;
		width: 100%;
		height: 2px;
		background: #406314;
		bottom: -7px;
	}
	.info--input p,
	.info--select p,
	.info-textarea p{
		color: #ddd;
	}
	.info--input span,
	.info--select span,
	.info-textarea span{
		font-weight: bold;
	}
	.cart--box a{
		color: #fff;
		text-decoration: none;
	}
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Documents\GitHub\BlackMoon\resources\views/backend/page/order/view.blade.php ENDPATH**/ ?>