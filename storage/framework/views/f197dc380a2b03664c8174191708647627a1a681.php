
<?php $__env->startSection('title', $item->name); ?>
<?php $__env->startSection('content'); ?>
<div class="items">
	<div class="container">
		<div class="news--title">
			<h1><?php echo e($item->name); ?></h1>
		</div>
		<div class="item-content">
			<div class="row">
				<div class="com-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="thumbnail">
						<img id="proimage" class="img-responsive" itemprop="image" src="<?php echo e(getFirstImage($item->image)); ?>" alt="<?php echo e($item->name); ?>" data-zoom-image="<?php echo e(getFirstImage($item->image)); ?>" />
					</div>
					<div class="list-thumbs owl-carousel">
						<?php $__currentLoopData = json_decode( $item->image ); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div id="thumbnail_<?php echo e($key); ?>" class="thumb_item" data-src="<?php echo e($v[1]); ?>">
							<a href="javascript:void(0)" data-imageid="<?php echo e($item->id); ?>" data-image="<?php echo e($v[1]); ?>" data-zoom-image="<?php echo e($v[1]); ?>" title="<?php echo e($item->name); ?>">
								<img class="img-responsive" id="thumb_<?php echo e($key); ?>" itemprop="image" data-id="img<?php echo e($key); ?>" src="<?php echo e($v[1]); ?>" alt="<?php echo e($item->name); ?>">
							</a>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
	// $('#img0').removeClass('hidden');
	// $('.list-thumbs img').click(function(){
	// 	let id = $(this).data('id');
	// 	$('.thumbnail a').addClass('hidden');
	// 	$('#'+id).removeClass('hidden');
	// });
	var loadIcon = "//cdn.shopify.com/s/files/1/0928/4804/t/2/assets/loading.gif?2264549637723899300";
	$("#proimage").ezPlus({

		zoomType: "inner",
		cursor: 'crosshair',

		gallery: 'thumbs_list',
		galleryActiveClass: 'active',
		imageCrossfade: true,
		scrollZoom: true,
		onImageSwapComplete: function() {
			$(".zoomWrapper div").hide()
		},
		loadingIcon: loadIcon
	});
	$("#proimage").bind("click", function(e) {
		var ez = $('#proimage').data('elevateZoom');
		$.fancybox(ez.getGalleryList());
		return false;
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Documents\GitHub\BlackMoon\resources\views/frontend/page/item.blade.php ENDPATH**/ ?>