
<?php $__env->startSection('title', 'Menu'); ?>
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
							<li class="breadcrumb-item"><a href="javascript:void(0);">Menu</a></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br/>
	<div class="row">
		<div class="col-md-3">
			<div class="accordion" id="accordion-menu" role="tablist">
				<div class="panel-group" id="menu-items">
					<div class="panel panel-default">
						<div class="panel-heading">
							<a href="#newscategory-list" data-toggle="collapse" data-parent="#menu-items">Danh mục sản phẩm <span class="caret pull-right"></span></a>
						</div>
						<div class="panel-collapse collapse in" id="itemcategory-list">
							<div class="panel-body">
								<div class="item-list-body">
									<?php $__currentLoopData = $itemcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="form-check">
										<input type="checkbox" class="form-check-input" name="select-category[]" value="<?php echo e($cat->id); ?>">
										<label><?php echo e($cat->name); ?></label>
									</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</div>
								<div class="item-list-footer">
									<div class="form-check">
										<input type="checkbox" class="form-check-input" id="select-all-itemcategory">
										<label class="btn btn-sm btn-default">Chọn tất cả</label>
									</div>
									<button type="button" class="pull-right btn btn-default btn-sm" id="add-itemcategory">Add to Menu</button>
								</div>
							</div>
						</div>
					</div>
					<div class="panel-group" id="menu-news">
						<div class="panel panel-default">
							<div class="panel-heading">
								<a href="#newscategory-list" data-toggle="collapse" data-parent="#menu-news">Danh mục bài viết <span class="caret pull-right"></span></a>
							</div>
							<div class="panel-collapse collapse in" id="newscategory-list">
								<div class="panel-body">
									<div class="item-list-body">
										<?php $__currentLoopData = $newscategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<div class="form-check">
											<input type="checkbox" class="form-check-input" name="select-category[]" value="<?php echo e($cat->id); ?>">
											<label><?php echo e($cat->name); ?></label>
										</div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</div>
									<div class="item-list-footer">
										<div class="form-check">
											<input type="checkbox" class="form-check-input" id="select-all-newscategory">
											<label class="btn btn-sm btn-default">Chọn tất cả</label>
										</div>
										<button type="button" class="pull-right btn btn-default btn-sm" id="add-newscategory">Add to Menu</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-9"></div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
<style>
	#accordion-menu .panel-heading {
	}
	#accordion-menu .panel-heading a{
		display: block;
		color: #fff;
		padding: 7px 15px;
		border-bottom: 1px solid #ccc;
		background: #6c7293;
	}
	#accordion-menu{
		background: #191c24;
		border-radius: 5px;
		overflow: hidden
	}
	#accordion-menu input{
		background-color: #191c24;
		border: 1px solid #fff;
		margin-left: -1.25rem;

	}
	#accordion-menu .item-list-body .form-check{
		padding: 0 2.25rem;
		border-bottom: 1px dashed #7e3838;
		margin-bottom: 15px;
	}
	#accordion-menu .item-list-body .form-check label{
		margin-left: 7px;
		margin-bottom: 15px;
	}
	#accordion-menu .item-list-body .form-check:last-child{
		border-bottom: 1px solid #fff;
	}
	#accordion-menu .item-list-footer{
		padding: 0 1rem;
		display: flex;
		justify-content: space-between;
		align-items: center;
	}
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BlackMoon\Documents\GitHub\BlackMoon\resources\views/backend/page/menu/index.blade.php ENDPATH**/ ?>