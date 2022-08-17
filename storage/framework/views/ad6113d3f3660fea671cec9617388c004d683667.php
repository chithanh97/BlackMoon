
<?php $__env->startSection('title', 'Liên hệ'); ?>
<?php $__env->startPush('styles'); ?>
<script>
	function callbackThen(response){
		response.json().then(function(data) {
			if(!data.success || data.score <= 0.5){
				document.getElementById('contact-form').addEventListener('submit', function(event){
					event.preventDefault();
					alert('Lỗi capcha');
				})
			}
		});
	}
	function callbackCatch(error){
		console.log('Error: '+ error);
	}
</script>
<?php echo htmlScriptTagJsApi(['callback_then' => 'callbackThen','callback_catch' => 'callbackCatch']); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<div class="contact">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-md-12 col-xs-12">
				<form action="<?php echo e(route('front.contact')); ?>" method="POST" id="contact-form">
					<?php echo csrf_field(); ?>
					<div class="title">
						<h3>Liên hệ</h3>
					</div>
					<?php if(session('alert')): ?>
					    <div class='alert alert-success'><?php echo e(session('alert')); ?></div>
					<?php endif; ?>
					<div class="form-group">
						<label for="">Họ tên:</label>
						<input class="form-control" type="text" name='name' value="<?php echo e(old('name')); ?>">
					</div>
					<div class="form-group">
						<label for="">Địa chỉ:</label>
						<input class="form-control" type="text" name='address' value="<?php echo e(old('address')); ?>">
					</div>
					<div class="form-group">
						<label for="">Số điện thoại:</label>
						<input class="form-control" type="text" name='phone' value="<?php echo e(old('phone')); ?>">
					</div>
					<div class="form-group">
						<label for="">Email:</label>
						<input class="form-control" type="text" name='email' value="<?php echo e(old('email')); ?>">
					</div>
					<div class="form-group">
						<label for="">Lời nhắn:</label>
						<textarea class="form-control" rows="10" name="note"><?php echo e(old('note')); ?></textarea>
					</div>
					<div class="form-group">
						<input class="btn btn-primary" type="submit" name='submit' style="cursor: pointer;">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Documents\GitHub\BlackMoon\resources\views/frontend/page/contact.blade.php ENDPATH**/ ?>