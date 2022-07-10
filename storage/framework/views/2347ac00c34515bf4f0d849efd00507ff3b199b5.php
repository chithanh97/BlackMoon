
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
	<div class="row">
		<div class="col-md-3">
			<div class="accordion" id="accordion" role="tablist">
				<div class="card">
					<div class="card-header" role="tab" id="heading-1">
						<h6 class="mb-0">
							<a data-bs-toggle="collapse" href="#collapse-1" aria-expanded="false" aria-controls="collapse-1" class="collapsed"> How can I pay for an order I placed? </a>
						</h6>
					</div>
					<div id="collapse-1" class="collapse" role="tabpanel" aria-labelledby="heading-1" data-bs-parent="#accordion" style="">
						<div class="card-body">
							<div class="row">
								<div class="col-3">
									<img src="../../../assets/images/samples/300x300/10.jpg" class="mw-100">
								</div>
								<div class="col-9"> You can pay for the product you have purchased using credit cards, debit cards, or via online banking. We also provide cash-on-delivery services. </div>
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
<?php echo $__env->make('backend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BlackMoon\Documents\GitHub\BlackMoon\resources\views/backend/page/menu/index.blade.php ENDPATH**/ ?>