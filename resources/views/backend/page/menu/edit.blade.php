@extends('backend.index')
@section('title', 'Menu')
@section('content')
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
		<div class="col-md-4">
			<div class="accordion" id="accordion-menu" role="tablist">
				@if($itemcategory->count() > 0)
				<div class="panel-group" id="menu-items">
					<div class="panel panel-default">
						<div class="panel-heading">
							<a href="#itemcategory-list" data-toggle="collapse" data-parent="#menu-items">Danh mục sản phẩm <span class="caret pull-right"></span></a>
						</div>
						<div class="panel-collapse collapse in" id="itemcategory-list">
							<div class="panel-body">
								<div class="item-list-body">
									@foreach($itemcategory as $cat)
									<div class="form-check">
										<input type="checkbox" class="form-check-input" id="itemcate{{$cat->id}}" name="select-category[]" value="{{$cat->id}}">
										<label for="itemcate{{$cat->id}}">{{$cat->name}}</label>
									</div>
									@endforeach
								</div>
								<div class="item-list-footer">
									<div class="form-check">
										<input type="checkbox" class="form-check-input select-all" id="select-all-itemcategory">
										<label for="select-all-itemcategory" class="btn btn-sm btn-default">Chọn tất cả</label>
									</div>
									<button type="button" class="pull-right btn btn-default btn-sm add-menu" id="add-itemcategory">Thêm vào Menu</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br/>
				@endif
				@if($newscategory->count() > 0)
				<div class="panel-group" id="menu-news">
					<div class="panel panel-default">
						<div class="panel-heading">
							<a href="#newscategory-list" data-toggle="collapse" data-parent="#menu-news">Danh mục bài viết <span class="caret pull-right"></span></a>
						</div>
						<div class="panel-collapse collapse in" id="newscategory-list">
							<div class="panel-body">
								<div class="item-list-body">
									@foreach($newscategory as $cat)
									<div class="form-check">
										<input type="checkbox" class="form-check-input" id="newscate{{$cat->id}}" name="select-category[]" value="{{$cat->id}}">
										<label for="newscate{{$cat->id}}">{{$cat->name}}</label>
									</div>
									@endforeach
								</div>
								<div class="item-list-footer">
									<div class="form-check">
										<input type="checkbox" class="form-check-input select-all" id="select-all-newscategory">
										<label for='select-all-newscategory' class="btn btn-sm btn-default">Chọn tất cả</label>
									</div>
									<button type="button" class="pull-right btn btn-default btn-sm add-link" id="add-newscategory">Thêm vào Menu</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br/>
				@endif
				<div class="panel-group" id="menu-links">
					<div class="panel panel-default">
						<div class="panel-heading">
							<a href="#custom-links" data-toggle="collapse" data-parent="#menu-links">Liên kết tùy chỉnh <span class="caret pull-right"></span></a>
						</div>
						<div class="panel-collapse collapse in" id="custom-links">
							<div class="panel-body">
								<div class="item-list-body">
									<div class="form-group">
										<label>URL (đường dẫn)</label>
										<input type="url" id="url" class="form-control" placeholder="https://">
									</div>
									<div class="form-group">
										<label>Tiêu đề</label>
										<input type="text" id="linktext" class="form-control" placeholder="">
									</div>
								</div>
								<div class="item-list-footer">
									<div class="form-check">
									</div>
									<button type="button" class="pull-right btn btn-default btn-sm add-menu" id="add-newscategory">Thêm vào Menu</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="dd">
				<ol class="dd-list">
				</ol>
			</div>
			<form action="" id="menu-form">
				<div class="form-group">
					<input type="hidden" name='value-menu' id='value-menu'>
					<button class="btn btn-primary">Lưu Menu</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
@push('styles')
<style>
	#accordion-menu .panel-group {
		background: #191c24;
		border-radius: 5px;
		overflow: hidden;
	}
	#accordion-menu .item-list-footer{
		margin-top: -15px;
	}
	#accordion-menu .panel-heading a{
		display: block;
		color: #fff;
		padding: 7px 15px;
		border-bottom: 1px solid #ccc;
		background: #6c7293;
	}
	#accordion-menu{
		overflow: hidden
	}
	#accordion-menu input{
		background-color: #191c24;
		border: 1px solid #fff!important;
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
	#accordion-menu .form-group input{
		margin-left: 0;
	}
	#accordion-menu #custom-links .item-list-body{
		padding: 15px 1rem 0 1rem;
	}
	.dd-item{
		position: relative;
	}
	.dd-item i{
		color: #000;
		padding: 7px;
		margin: 7px 0;
		cursor: pointer;
		background: #fff;
	}
	.dd-item{
		position: relative;
	}
	.dd-item i{
		position: absolute;
		top: 0;
		right: 0;
	}
	.label-menu{
		font-style: italic;
		font-weight: inherit;
		font-size: 10px;
	}
	form#menu-form{
		background: #191c24;
		padding: 5px;
		text-align: center;
	}
</style>
@endpush
@push('scripts')
<script>
	var temp = $('.dd').nestable();
	console.log(typeof $('.dd').nestable('serialize'));
	function removeItem(el) {
		let id = $(el).data('id');

		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url: "{{route('menu.delete.items')}}",
			type: 'POST',
			data: {
				'id': id,
			},
		}).done((res) => {
			let reponse = JSON.parse(res);
			if(reponse['code'] == 1) {
				$(el).parent().remove();
			}
		});

	}

	$('.select-all').change(function(){
		if($(this).is(':checked')){
			eachCheck($(this), true);
		} else {
			eachCheck($(this), false);
		}
	});

	function eachCheck(item, check){
		$(item).parents('.panel-body').find('.item-list-body input').each((index, el)=>{
			$(el).prop('checked', check);
		})
	}

	$('#add-itemcategory').click(() => {
		$('#itemcategory-list .item-list-body input').each(function(){
			if($(this).is(':checked')){
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url: "{{route('menu.add.item')}}",
					type: 'POST',
					data: {
						'target': $(this).val(),
						'menu_id': '{{ $item->id }}',
					},
				}).done((res) => {
					let reponse = JSON.parse(res);
					if(reponse['code'] == 1) {
						$('.dd > .dd-list').append('<li class="dd-item" data-id="'+reponse['id']+'"><div class="dd-handle">'+reponse['name']+' <span class="label-menu">Danh mục sản phẩm</span></div><i class="fa fa-times" onclick="removeItem(this)"></i></li>');
					}
					$('#value-menu').val(JSON.stringify($('.dd').nestable('serialize')));
					$(this).prop('checked', false);
				});
			}
		});
	});

	$('.dd').on('change', function() {
		$('#value-menu').val(JSON.stringify($('.dd').nestable('serialize')));
	});
</script>
@endpush