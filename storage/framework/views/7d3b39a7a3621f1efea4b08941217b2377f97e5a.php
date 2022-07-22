
<?php $__env->startSection('title', 'Thêm bài viết'); ?>
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
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<div class="content bg-gray-lighter">
	<div class="row items-push">
		<div class="col-sm-7">
			<h1 class="page-heading">Bài viết <small>Thêm mới Bài viết</small></h1>
		</div>
		<div class="col-sm-5 text-right hidden-xs">
			<ol class="breadcrumb push-10-t">
				<li><a href="<?php echo e(route('dashboard')); ?>">Quản trị</a>
				</li>
				<li><a href="<?php echo e(route('news')); ?>">Bài viết</a>
				</li>
				<li>Thêm mới</li>
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
			<form method="post" name="frmForm" enctype="multipart/form-data" class="">
				<?php echo csrf_field(); ?>
				<div class="row">
					<div class="col-sm-3">
						<h4>Nội dung danh mục</h4>
						<p class="text-muted">
							Chọn ảnh đại diện
							<br> Lưu ý:
							<br> + Kích thước tối thiểu 200x200
							<br> + Dung lượng tối đa 500kb
						</p>

						<div class="input-group">
							<div id="img_preview_main" class="wrap-img-product-thumbnail">
								<div class="img-thumbnail img-product-thumbnail pull-left">
									<img class="img-responsive" src="<?php echo e(old('image') == '' ? '/storage/uploads/default/default.png' : old('image')); ?>" style="width: 120px; height: 120px;" />
								</div>
								<div class="pull-left">
									<div style="margin: 0 10px 10px;">
										<a class="btn btn-info iframe-btn" href="/storage/filemanager/dialog.php?field_id=fieldID&type=1&fldr=news">
											<i class="fa fa-pencil"></i>
										</a>
									</div>
									<div style="margin: 0 10px 10px;">
										<a class="btn btn-danger" href="javascript:;" onclick="delete_img_product_thumbnail('fieldID')">
											<i class="fa fa-trash"></i>
										</a>
									</div>
								</div>
							</div>

							<input id="fieldID" type="hidden" name="image" value="<?php echo e(old('image') == '' ? '/storage/uploads/default/default.png' : old('image')); ?>" class="form-control thumbnail">
						</div>
					</div>
					<div class="col-sm-9">
						<div class="panel panel-default panel-light">
							<div class="panel-body">
								<div class="form-group">
									<label class="control-label">
										Tên bài viết <font color="red">*</font>
									</label>
									<input type="text" name="name" class="form-control get-subject" data-table='news' value="<?php echo e(old('name')); ?>" />
								</div>
								<div class="form-group">
									<label class="control-label">
										Danh mục
									</label>
									<select name="parent[]" id="parent" class="form-control" multiple>
										<option value='0'>-- Chọn --</option>
										<?php
										echo getMenuParent($parent, 0) ?>
									</select>
								</div>
								<div class="form-group">
									<label class="control-label">Mô tả</label>
									<textarea rows="5" name="detail_short" class="form-control"><?php echo e(old('detail_short')); ?></textarea>
								</div>
								<div class="form-group">
									<label class="control-label">Chi tiết</label>
									<textarea name="detail" class="form-control tinymce-editor"><?php echo e(old('detail')); ?></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- row -->
				<div class="row">
					<div class="col-sm-3">
						<h4>Tối ưu SEO</h4>
						<p class="text-muted">
							Thiết lập thẻ tiêu đề, thẻ mô tả, đường dẫn. Những thông tin này xác định cách danh mục xuất hiện trên công cụ tìm kiếm.
						</p>
					</div>
					<div class="col-sm-9">
						<div class="panel panel-default panel-light">
							<div class="panel-body">
								<div class="form-group">
									<div>
										<label class="control-label">Tiêu đề trang (tối đa 70 ký tự)</label>
										<span class="pull-right">Số ký tự đã dùng <b class="elcount">0</b>/70</span>
									</div>
									<input type="text" name="title" class="form-control countW" id="seo_title" value="<?php echo e(old('title')); ?>" maxlength="70" />
								</div>
								<div class="form-group">
									<div>
										<label class="control-label">Thẻ mô tả (tối đa 160 ký tự)</label>
										<span class="pull-right">Số ký tự đã dùng <b class="elcount">0</b>/160</span>
									</div>
									<input type="text" name="description" class="form-control countW" id="seo_description" value="<?php echo e(old('description')); ?>" maxlength="160" />
								</div>
								<div class="form-group">
									<div>
										<label class="control-label">Từ khóa</label>
									</div>
									<input type="text" name="keyword" class="form-control" id="seo_keyword" value="<?php echo e(old('keyword')); ?>" />

									<div class="alert alert-info" role="alert">
										<b>Sử dụng từ khóa mục tiêu</b>
										<div>Từ khóa mục tiêu được tìm thấy trong:</div>
										<ul class="" style="list-style-type: square;">
											<li class="page_title">Tiêu đề trang: <b style="color: red;">Không</b>
											</li>
											<li class="meta_description">Meta Description: <b style="color: red;">Không</b>
											</li>
										</ul>
									</div>
								</div>
								<div class="form-group">
									<label class="label-control">
										Đường dẫn / Alias <font color="red">*</font> (<a href="javascript:void(0);" data-action="default-alias">Mặc định</a>)
									</label>
									<div class="input-group">
										<span class="input-group-addon" id="basic-addon3">/</span>
										<input type="text" name="subject" class="form-control" value="<?php echo e(old('subject')); ?>" />
									</div>
								</div>
								<div class="form-group">
									<label class="label-control">Link khác</label>
									<input type="text" name="link" class="form-control" value="<?php echo e(old('link')); ?>" />
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- row -->
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-9">
						<div class="panel panel-default panel-light">
							<div class="panel-body">
								<div class="form-group">
									<label class="control-label">Thứ tự</label>
									<input type="text" name="sort" class="form-control" value="<?php echo e(old('sort') == '' ? 0 : old('sort')); ?>" />
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- row -->
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-9">
						<div class="form-group" style="margin-bottom: 0;">
							<div class="btn-gr">
								<button type="submit" name="btnSave" class="btn btn-sm btn-primary">Lưu</button>
								<button onclick="javascript:window.location.href = '<?php echo e(route('news')); ?>' " type="button" name="goback" class="btn btn-sm btn-danger">Quay lại</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
	$('select#parent').select2({
		placeholder: '-- Chọn --'
	});
	checkKeyword();
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Documents\GitHub\BlackMoon\resources\views/backend/page/news/store.blade.php ENDPATH**/ ?>