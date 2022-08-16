
<?php $__env->startSection('title', 'Thanh toán'); ?>
<?php $__env->startSection('content'); ?>
<div class="cartpage">
	<div class="container">
		<div class="title">
			<h3>Thanh toán</h3>
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
		<form action="<?php echo e(route('cart.order')); ?>" method="POST">
			<?php echo csrf_field(); ?>
			<div class="row">
				<div class="col-lg-6 col-md-6 col-xs-6">
					<div class="info">
						<div class="title">
							<h4>Thông tin vận chuyển</h4>
						</div>
						<div class="info--input">
							<input name="name" type="text" class="form-control" placeholder="Họ tên (*)" value="<?php echo e(old('name')); ?>">
							<input name="phone" type="tel" pattern="[0-9]{10}" class="form-control" placeholder="Số điện thoại (*)" value="<?php echo e(old('phone')); ?>">
							<input name="email" type="email" class="form-control" placeholder="Email" value="<?php echo e(old('email')); ?>">
							<input name="address" type="text" class="form-control" placeholder="Địa chỉ (*)" value="<?php echo e(old('address')); ?>">
						</div>
						<div class="info--select">
							<select class="form-control" name="province" id="province">
								<option value="0">Chọn Tỉnh/Thành</option>
								<?php $__currentLoopData = $listProvince; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($item->id); ?>"><?php echo e($item->_name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
							<select class="form-control" name="district" id="district">
								<option value="0">Chọn Quận/Huyện</option>
							</select>
							<select class="form-control" name="ward" id="ward">
								<option value="0">Chọn Phường/Xã</option>
							</select>
						</div>
						<div class="info-textarea">
							<textarea rows="5" name="note" class="form-control" placeholder="Ghi chú"><?php echo e(old('note')); ?></textarea>
						</div>
					</div>
					<div class="ship">
						<div class="title">
							<h4>Hình thức thanh toán</h4>
						</div>
						<div class="ship-item <?php echo e(old('pay_method') != '' ? (old('pay_method') == 1 ? 'active' : '') : 'active'); ?>">
							<input class="form-check-input pay--method" type="radio" value="1" name="pay_method" <?php echo e(old('pay_method') != '' ? (old('pay_method') == 1 ? 'checked' : '') : 'checked'); ?>>
							<img src="/storage/uploads/logo/Laravel_logo_wordmark_logotype.png" alt="cod">
							<div>
								<p>COD</p>
								<span>Thanh toán khi nhận hàng</span>
							</div>
						</div>
						<div class="ship-item <?php echo e(old('pay_method') != '' ? (old('pay_method') == 2 ? 'active' : '') : ''); ?>">
							<input class="form-check-input pay--method" type="radio" value="2" name="pay_method" <?php echo e(old('pay_method') != '' ? (old('pay_method') == 2 ? 'checked' : '') : ''); ?>>
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
							<?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="cart--item">
								<div class="cart--item__image">
									<a href="<?php echo e(route('front.items', $item->options->subject)); ?>">
										<img src="<?php echo e($item->options->image); ?>" alt="<?php echo e($item->name); ?>">
									</a>
								</div>
								<div class="cart--item__name">
									<p><a href="<?php echo e(route('front.items', $item->options->subject)); ?>"><?php echo e($item->name); ?></a></p>
									<span>x<?php echo e($item->qty); ?></span>
								</div>
								<div class="cart--item__price">
									<?php echo e(number_format($item->total, 0, '.', '.').getMoney()); ?>

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
									<?php echo e(Cart::total().getMoney()); ?>

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
									<?php echo e(Cart::total().getMoney()); ?>

								</div>
							</div>
						</div>
					</div>
					<div class="checkout">
						<a class="btn btn-danger" href="<?php echo e(route('cart.show')); ?>">Giỏ hàng</a>
						<button name="checkout" type="submit" class="btn btn-checkout btn-primary">Thanh toán</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
	$('.ship-item').click(function(){
		$('.ship-item').removeClass('active');
		$(this).find('input').prop('checked', true);
		$(this).addClass('active');
	});
	$('#province').change(()=>{
		$('#district option').remove();
		$('#ward option').remove();
		$.ajax({
			url: '<?php echo e(route("cart.district")); ?>',
			type: 'POST',
			data: {
				'id': $('#province').val(),
			},
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		}).done((res)=>{
			$('#district').append(res);
			$('#ward').append('<option value="0">Chọn Phường/Xã</option>');
		})
	});

	$('#district').change(()=>{
		$('#ward option').remove();
		$.ajax({
			url: '<?php echo e(route("cart.ward")); ?>',
			type: 'POST',
			data: {
				'id': $('#district').val(),
			},
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		}).done((res)=>{
			$('#ward').append(res);
		})
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Documents\GitHub\BlackMoon\resources\views/frontend/page/paycart.blade.php ENDPATH**/ ?>