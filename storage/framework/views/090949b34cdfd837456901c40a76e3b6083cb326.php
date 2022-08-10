
<?php $__env->startSection('title', 'Giỏ hàng'); ?>
<?php $__env->startSection('content'); ?>
<div class="cartpage">
	<div class="container">
		<div class="title">
			<h3>Giỏ hàng</h3>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<?php if(Cart::count() > 0): ?>
				<table class="table table-striped table-bordered">
					<thead>
						<td width="5%"></td>
						<td width="18%">Hình ảnh</td>
						<td width="23%">Tên sản phẩm</td>
						<td width="15%">Số lượng</td>
						<td width="20%">Đơn giá</td>
						<td width="20%">Thành tiền</td>
					</thead>
					<tbody>
						<?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td>
								<a title="Xóa" href="<?php echo e(route('cart.delete', $value->rowId)); ?>"><i class="fa fa-trash"></i></a>
							</td>
							<td>
								<a href="<?php echo e(route('front.items', $value->options->subject)); ?>" title="Xem sản phấm">
									<img src="<?php echo e($value->options->image); ?>" alt="<?php echo e($value->name); ?>">
								</a>
							</td>
							<td><?php echo e($value->name); ?></td>
							<td>
								<div id="update-quantity">
									<div class="quantity">
										<input id="qty" name="qty" type="number" min="1" max="100" step="1" value="<?php echo e($value->qty); ?>">
									</div>
									<button data-id="<?php echo e($value->rowId); ?>" class="btn btn-primary btn-update-quantity"><i class="fa fa-refresh"></i></button>
								</div>
							</td>
							<td><?php echo e(number_format($value->price, 0, '.', '.').getMoney()); ?></td>
							<td><?php echo e(number_format($value->price * $value->qty, 0, '.', '.').getMoney()); ?></td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
					<tfoot>
						<tr>
							<td>
								<a title="Xóa giỏ hàng" href="<?php echo e(route('cart.delete.all')); ?>"><i class="fa fa-trash"></i></a>
							</td>
							<td colspan="4">
								<p>
									Tổng tiền
								</p>
							</td>
							<td>
								<p class="count-price"><?php echo e(Cart::total().getMoney()); ?></p>
							</td>
						</tr>
					</tfoot>
				</table>
				<?php else: ?>
				<div class="empty-data">
					Không có sản phẩm nào trong giỏ hàng
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Documents\GitHub\BlackMoon\resources\views/frontend/page/cart.blade.php ENDPATH**/ ?>