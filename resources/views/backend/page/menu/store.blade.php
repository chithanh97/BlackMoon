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
	<div class="container-fluid p-0">
		<div class="row">
			<div class="col-md-12">
				Select a menu to edit:
				<form action="{{url('manage-menus')}}" class="form-inline">
					<select name="id">
						@foreach($menus as $menu)
						@if($desiredMenu != '')
						<option value="{{$menu->id}}" @if($menu->id == $desiredMenu->id) selected @endif>{{$menu->title}}</option>
						@else
						<option value="{{$menu->id}}">{{$menu->title}}</option>
						@endif
						@endforeach
					</select>
					<button class="btn btn-sm btn-default btn-menu-select">Select</button>
				</form>
				or
				<a href="{{url('manage-menus?id=new')}}">Create a new menu</a>.
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
			<h3><span>Menu Structure</span></h3>
			@if(count($menus)== 0)
			<h4>Create New Menu</h4>
			<form method="post" action="{{url('create-menu')}}">
				{{csrf_field()}}
				<div class="row">
					<div class="col-sm-12">
						<label>Name</label>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" name="title" class="form-control">
						</div>
					</div>
					<div class="col-sm-6 text-right">
						<button class="btn btn-sm btn-primary">Create Menu</button>
					</div>
				</div>
			</form>
			@endif
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
@endpush
@push('scripts')
@endpush