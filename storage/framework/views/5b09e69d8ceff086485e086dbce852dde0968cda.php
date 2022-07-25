
<?php $__env->startSection('title', 'Thêm sản phẩm'); ?>
<?php $__env->startSection('content'); ?>
<div class="content bg-gray-lighter">
	<div class="row items-push">
		<div class="col-sm-7">
			<h1 class="page-heading">Sản phẩm <small>Thêm mới Sản phẩm</small></h1>
		</div>
		<div class="col-sm-5 text-right hidden-xs">
			<ol class="breadcrumb push-10-t">
				<li><a href="<?php echo e(route('dashboard')); ?>">Quản trị</a>
				</li>
				<li><a href="<?php echo e(route('news')); ?>">Sản phẩm</a>
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
						<div id="wrap_all_image">
							<input type="hidden" id="all_image_child">
							<input id="image_child_add_tmp" type="hidden" value="" />
							<ul id="sortable_grid" class="list-inline sortable-grid ui-sortable">
							</ul>
							<ul class="list-inline sortable-grid clearfix">
								<li class="">
									<div class="inner">
										<a href="/storage/filemanager/dialog.php?field_id=image_child_add_tmp&amp;fldr=product" class="iframe-btn text-center">
											<div>
												<p>+</p>
											</div>
											<div style="margin-top: -20px">Thêm hình ảnh</div>
										</a>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-sm-9">
						<div class="panel panel-default panel-light">
							<div class="panel-body">
								<div class="form-group">
									<label class="control-label">
										Tên sản phẩm <font color="red">*</font>
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
									<label class="control-label">
										Giá sản phẩm
									</label>
									<input type="text" name="price" class="form-control get-subject" data-table='news' value="<?php echo e(old('price')); ?>" />
								</div>
								<div class="form-group">
									<label class="control-label">
										Giá giảm
									</label>
									<input type="text" name="sell-price" class="form-control get-subject" data-table='news' value="<?php echo e(old('sell_price')); ?>" />
								</div>
								<div class="form-group">
									<label class="control-label">
										Giá giảm % (* ưu tiên nếu có 2 giá giảm)
									</label>
									<input type="text" name="sell_percent" class="form-control get-subject" data-table='news' value="<?php echo e(old('sell_percent')); ?>" />
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
<script src="<?php echo e(asset('assets/backend/js/sortable.js')); ?>"></script>
<script>
	$('select#parent').select2({
		placeholder: '-- Chọn --'
	});
	checkKeyword();

	function responsive_filemanager_callback(field_id){
		var myJsonString = '',
		imgs_array = [],
		array_tmp = [],
		i = 0,
		is_edit = false;
		var url=jQuery('#'+field_id).val();

		if(field_id == 'image_child_add_tmp'){
			myJsonString = jQuery('#all_image_child').val();
			imgs_array = [];
			if(myJsonString !== ''){
				imgs_array = JSON.parse(myJsonString);
			}
			var d = new Date();
			array_tmp = ['IMGS_OTHER_'+(d.getTime()), url];
			imgs_array.push(array_tmp);

		} else {
			myJsonString = jQuery('#all_image_child').val();
			imgs_array = JSON.parse(myJsonString);
			imgs_array.forEach(function(val, key){
				if(val[0] == field_id){
					imgs_array[key][1] = url;
				}
			});

		}
		if(imgs_array.length > 0){
			myJsonString = JSON.stringify(imgs_array);
		}else{
			myJsonString = '';
		}
		$('#all_image_child').val(myJsonString);

		load_all_image();
	}

	function load_all_image(){

		let value = JSON.parse($('#all_image_child').val());
		$('#sortable_grid li').remove();
		let index = 1;
		value.forEach(function(v){
			let html = '<li id="'+v[0]+'" class="ui-sortable-handle"><div class="inner"><div class=""><div class="img-thumbnail"><img class="img-responsive" src="'+v[1]+'"></div><div class="cmd"><div class=""><a href="/storage/filemanager/dialog.php?field_id='+v[0]+'&amp;fldr=product" class="iframe-btn btn btn-info">Đổi</a></div><div class=""><a href="javascript:;" onclick="delete_img_product_thumbnail(\''+v[0]+'\')" class="btn btn-danger">Xóa</a></div></div></div><div class="lst-btn-change"><button type="button" class="btn btn-default" onclick="changeLeft(this)"><i class="fa fa-chevron-left"></i></button><button type="button" class="btn btn-default" onclick="changeRight(this)"><i class="fa fa-chevron-right"></i></button></div></div></li>';

			$('#sortable_grid').append(html);
			index++;
		});

		$('.iframe-btn').fancybox({
			'width'   : 1024,
			'height'  : 570,
			'type'    : 'iframe',
			'autoScale'   : false
		});

	}

	function delete_img_product_thumbnail(id){
		let value = '/storage/uploads/default/default.png';
		$('#'+id).find('img').attr('src', value);
	}

	function changeLeft(el){
		let value = JSON.parse($('#all_image_child').val());
		let k = $(el).parents('li').attr('id');
		value.forEach(function(val, key){
			if(key > 0 && val[0] == k){
				let temp = val;
				value[key] = value[key-1];
				value[key-1] = temp;
			}
		});
		$('#all_image_child').val(JSON.stringify(value));
		load_all_image();
	}

	function changeData(){
		let arr = [];
		$('#sortable_grid li').each(function(index, el){
			arr.push([$(el).attr('id'), $(el).find('img').attr('src')]);
		});
		$('#all_image_child').val(JSON.stringify(arr));
	}

	function changeRight(el){
		let value = JSON.parse($('#all_image_child').val());
		let k = $(el).parents('li').attr('id');
		value.forEach(function(val, key){
			if(key < value.length - 1 && val[0] == k){
				let temp = val;
				value[key] = value[key+1];
				value[key+1] = temp;
			}
		});
		// console.log(value.length);
		$('#all_image_child').val(JSON.stringify(value));
		load_all_image();
	}

	new Sortable(sortable_grid, {
		swapThreshold: 0.43,
		animation: 150,
		onEnd: function(){
			changeData();
		}
	});
</script>
<?php $__env->stopPush(); ?>
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
	.list-inline {
		padding-left: 0;
		margin-left: -5px;
		list-style: none;
	}
	.sortable-grid > li {
		margin-top: 5px;
		margin-bottom: 5px;
	}
	.list-inline>li {
		display: inline-block;
		padding-right: 5px;
		padding-left: 5px;
	}
	.sortable-grid > li .inner {
		background: #000;
		padding: 3px;
		height: 143px;
	}
	.sortable-grid > li .inner a{
		display: block;
		width: 100%;
		height: 100%;
		text-decoration: none;
		display: flex;
		align-items: center;
		flex-wrap: wrap;
	}
	.sortable-grid > li .inner a p{
		font-size: 60px;
		border-radius: 50%;
		color: #6c7293;
		border: 2px solid #6c7293;
		margin: 15px auto;
		width: 70px;
		height: 70px;
		display: flex;
		align-items: center;
		justify-content: center;
		font-weight: 400;
	}
	.sortable-grid > li .inner a div{
		width: 100%;
		color: #6c7293;
		font-weight: 500;
	}
	.sortable-grid li{
		width: 100%;
	}
	#sortable_grid{
		display: flex;
		align-items: center;
		flex-wrap: wrap;
		margin-bottom: 0;
	}
	#sortable_grid li{
		width: 50%;
		cursor: pointer;
	}
	#sortable_grid li .inner{
		padding: 5px;
	}
	#sortable_grid li img{
		width: 100%;
	}
	.sortable-grid#sortable_grid > li .inner{
		height: auto;
	}
	.sortable-grid#sortable_grid > li .inner > div{
		width: 100%;
	}
	.img-thumbnail{
		padding: 0;
		position: relative;
		padding-bottom: 56.25%;
		border-radius: 0;
		margin-bottom: 5px;
	}
	.img-thumbnail img{
		position: absolute;
		width: 100%;
		height: 100%;
		object-fit: cover;
	}
	.inner .cmd{
		display: flex;
		width: 100%;
		align-items: center;
		justify-content: space-between;
	}
	.inner .cmd > div{
		width: 45%;
	}
	.inner .cmd > div a{
		justify-content: center;
	}
	.lst-btn-change{
		display: flex;
		margin-top: 5px;
		justify-content: space-between;
	}
	.lst-btn-change button{
		border: 1px solid #6c7293;
		width: 45%;
		color: #6c7293;
		transition: .3s;
	}
	.lst-btn-change button:hover{
		color: #fff;
		border: 1px solid #fff;
		transition: .3s;
	}
	.lst-btn-change i{
		margin-right: 0;
	}
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Documents\GitHub\BlackMoon\resources\views/backend/page/items/store.blade.php ENDPATH**/ ?>