
<?php $__env->startSection('title', 'Danh sách đơn đặt hàng'); ?>
<?php $__env->startSection('content'); ?>
<div class="main_content_iner ">
	<div class="container-fluid p-0">
		<!-- page title  -->
		<div class="row">
			<div class="col-12">
				<div class="page_title_box d-flex align-items-center justify-content-between">
					<div class="page_title_left">
						<h3 class="f_s_30 f_w_700 text_white" >Quản trị</h3>
						<ol class="t-breadcrumb page_bradcam mb-0">
							<li class="breadcrumb-item"><a href="javascript:void(0);">Quản trị</a></li>
							<li class="breadcrumb-item"><a href="javascript:void(0);">Order</a></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php if(session('alert')): ?>
	    <div class='alert alert-success'><?php echo e(session('alert')); ?></div>
	<?php endif; ?>
	<div>
		<div class="">
			<div class="white_card card_height_100 mb_30 QA_section">
				<div class="white_card_header">
					<div class="box_header m-0">
						<div class="main-title">
							<h3 class="m-0">Danh sách Order</h3>
						</div>
						<div>
						</div>
					</div>
				</div>
				<div class="white_card_body card">
					<div class="QA_table table-responsive ">
						<!-- table-responsive -->
						<table class="table pt-0 table-striped" id='tableData'>
							<thead>
								<tr>
									<th scope="col">Mã đơn hàng</th>
									<th scope="col">Thông tin</th>
									<th scope="col">Trạng thái</th>
									<th scope="col">Phương thức thanh toán</th>
									<th scope="col">Tùy chọn</th>
								</tr>
							</thead>
							<tbody>
								<?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($value->order_code); ?></td>
									<td>
										<p>Khách hàng: <?php echo e($value->name); ?></p>
										<p>Số điện thoại: <?php echo e($value->phone); ?></p>
									</td>
									<td>
										<select name="status" id="status" class="form-control" data-id="<?php echo e($value->id); ?>">
											<?php $__currentLoopData = getStatusOrder(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option class="" <?php echo e($k == $value->status ? 'selected' : ''); ?> value="<?php echo e($k); ?>"><?php echo e($v); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</td>
									<td>
										<button class="btn btn-primary">
											<?php echo e(getPayMethod()[$value->pay_method]); ?>

										</button>
									</td>
									<td class="column-action">
										<a href="<?php echo e(route('order.view', $value->id)); ?>" class="btn-edit">
											<i class="fa fa-eye"></i>
										</a>
									</td>
								</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
						<div class="navigation">
							<?php echo e($list->links()); ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
<style>
	.status{
		width: 25px;
		height: 25px;
		background: url(/storage/uploads/default/anhien_0.png);
		background-repeat: no-repeat;
		margin: 0 auto;
		cursor: pointer;
	}
	.status.active{
		width: 25px;
		height: 25px;
		background: url(/storage/uploads/default/anhien_1.png);
		background-repeat: no-repeat;
		margin: 0 auto;
	}
	.field-status{
		width: 25px;
		height: 25px;
		background: url(/storage/uploads/default/noibat_0.png);
		background-repeat: no-repeat;
		margin: 0 auto;
		cursor: pointer;
	}
	.field-status.active{
		width: 25px;
		height: 25px;
		background: url(/storage/uploads/default/noibat_1.png);
		background-repeat: no-repeat;
		margin: 0 auto;
	}
	table thead th{
		text-align: center;
	}
	table tbody td{
		text-align: center;
	}
	table td, table th, table, table tbody, table thead, table tfoot {
		text-align: center;
		border: 1px solid #6c7293!important;
	}
	.column-action a{
		display: inline-flex;
		width: 30px;
		height: 30px;
		background: rgb(107,78,224);
		align-items: center;
		justify-content: center;
		color: #fff;
	}
	.column-action a.btn-delete{
		background: red;
	}
	.navigation{
		margin: 15px 0;
		text-align: right
	}
	.navigation svg{
		width: 20px;
	}
	.navigation div:first-child{
		display: none;
	}
	.navigation div:last-child > spn{
		display: flex;
	}
	.navigation span span span,
	.navigation a{
		color: #000;
		padding: 7px 10px!important;
		display: inline-block;
	}
	.btn-delete-all{
		padding: 7px 10px;
		background: #00d25b;
		border-radius: 5px;
	}
	.btn-delete-all i{
		color: #fff;
	}
	#tableData p{
		margin-bottom: 0;
		color: #fff;
	}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
	$('#status').change(function(e){
		if(confirm('Bạn chắc chắn muốn thay đổi trạng thái đơn hàng?')) {
			$.ajax({
				'url': '<?php echo e(route('order.changestatus')); ?>',
				'type': 'POST',
				'data': {
					'id': $(this).data('id'),
					'status': $(this).val(),
				},
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			}).done((res) => {
				alert(res);
			});
		}
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BlackMoon\Documents\Github\BlackMoon\resources\views/backend/page/order/index.blade.php ENDPATH**/ ?>