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
		<div class="col-md-3">
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
										<input type="checkbox" class="form-check-input" name="select-category[]" value="{{$cat->id}}">
										<label>{{$cat->name}}</label>
									</div>
									@endforeach
								</div>
								<div class="item-list-footer">
									<div class="form-check">
										<input type="checkbox" class="form-check-input" id="select-all-itemcategory">
										<label class="btn btn-sm btn-default">Chọn tất cả</label>
									</div>
									<button type="button" class="pull-right btn btn-default btn-sm" id="add-itemcategory">Thêm vào Menu</button>
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
										<input type="checkbox" class="form-check-input" name="select-category[]" value="{{$cat->id}}">
										<label>{{$cat->name}}</label>
									</div>
									@endforeach
								</div>
								<div class="item-list-footer">
									<div class="form-check">
										<input type="checkbox" class="form-check-input" id="select-all-newscategory">
										<label class="btn btn-sm btn-default">Chọn tất cả</label>
									</div>
									<button type="button" class="pull-right btn btn-default btn-sm" id="add-newscategory">Thêm vào Menu</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endif
				<br/>
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
									<button type="button" class="pull-right btn btn-default btn-sm" id="add-newscategory">Thêm vào Menu</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<h2 class="text-center pb-3 pt-1">Learning drag and dropable - CodeCheef</h2>
			<div class="row">
				<div class="col-md-5 p-3 bg-dark offset-md-1">
					<ul class="list-group shadow-lg connectedSortable" id="padding-item-drop">

					</ul>
				</div>
				<div class="col-md-5 p-3 bg-dark offset-md-1 shadow-lg complete-item">
					<ul class="list-group  connectedSortable" id="complete-item-drop">

					</ul>
				</div>
			</div>
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
	#accordion-menu .form-group input{
		margin-left: 0;
	}
	#accordion-menu #custom-links .item-list-body{
		padding: 15px 1rem 0 1rem;
	}
</style>
<style>
	.item-list,.info-box{background: #fff;padding: 10px;}
	.item-list-body{max-height: 300px;overflow-y: scroll;}
	.panel-body p{margin-bottom: 5px;}
	.info-box{margin-bottom: 15px;}
	.item-list-footer{padding-top: 10px;}
	.panel-heading a{display: block;}
	.form-inline{display: inline;}
	.form-inline select{padding: 4px 10px;}
	.btn-menu-select{padding: 4px 10px}
	.disabled{pointer-events: none; opacity: 0.7;}
	.menu-item-bar{background: #eee;padding: 5px 10px;border:1px solid #d7d7d7;margin-bottom: 5px; width: 75%; cursor: move;display: block;}
	#serialize_output{display: block;}
	.menulocation label{font-weight: normal;display: block;}
	body.dragging, body.dragging * {cursor: move !important;}
	.dragged {position: absolute;z-index: 1;}
	ol.example li.placeholder {position: relative;}
	ol.example li.placeholder:before {position: absolute;}
	#menuitem{list-style: none;}
	#menuitem ul{list-style: none;}
	.input-box{width:75%;background:#fff;padding: 10px;box-sizing: border-box;margin-bottom: 5px;}
	.input-box .form-control{width: 50%}
</style>
@endpush
@push('scripts')
<script>
	$('#add-categories').click(function(){
		var menuid = <?=$desiredMenu->id?>;
		var n = $('input[name="select-category[]"]:checked').length;
		var array = $('input[name="select-category[]"]:checked');
		var ids = [];
		for(i=0;i<n;i++){
			ids[i] =  array.eq(i).val();
		}
		if(ids.length == 0){
			return false;
		}
		$.ajax({
			type:"get",
			data: {menuid:menuid,ids:ids},
			url: "{{url('add-categories-to-menu')}}",
			success:function(res){
				location.reload();
			}
		})
	})
	$('#add-posts').click(function(){
		var menuid = <?=$desiredMenu->id?>;
		var n = $('input[name="select-post[]"]:checked').length;
		var array = $('input[name="select-post[]"]:checked');
		var ids = [];
		for(i=0;i<n;i++){
			ids[i] =  array.eq(i).val();
		}
		if(ids.length == 0){
			return false;
		}
		$.ajax({
			type:"get",
			data: {menuid:menuid,ids:ids},
			url: "{{url('add-post-to-menu')}}",
			success:function(res){
				location.reload();
			}
		})
	})
	$("#add-custom-link").click(function(){
		var menuid = <?=$desiredMenu->id?>;
		var url = $('#url').val();
		var link = $('#linktext').val();
		if(url.length > 0 && link.length > 0){
			$.ajax({
				type:"get",
				data: {menuid:menuid,url:url,link:link},
				url: "{{url('add-custom-link')}}",
				success:function(res){
					location.reload();
				}
			})
		}
	})
</script>
<script>
	var group = $("#menuitems").sortable({
		group: 'serialization',
		onDrop: function ($item, container, _super) {
			var data = group.sortable("serialize").get();
			var jsonString = JSON.stringify(data, null, ' ');
			$('#serialize_output').text(jsonString);
			_super($item, container);
		}
	});
</script>
<script>
	$('#saveMenu').click(function(){
		var menuid = <?=$desiredMenu->id?>;
		var location = $('input[name="location"]:checked').val();
		var newText = $("#serialize_output").text();
		var data = JSON.parse($("#serialize_output").text());
		$.ajax({
			type:"get",
			data: {menuid:menuid,data:data,location:location},
			url: "{{url('update-menu')}}",
			success:function(res){
				window.location.reload();
			}
		})
	})
</script>
@endpush