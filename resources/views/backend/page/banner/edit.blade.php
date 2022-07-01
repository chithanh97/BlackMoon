@extends('backend.index')
@section('title', 'Chỉnh sửa Banner')
@push('styles')
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
@endpush
@section('content')
<div class="content bg-gray-lighter">
	<div class="row items-push">
		<div class="col-sm-7">
			<h1 class="page-heading">Bài Banner <small>Thêm mới Bài Banner</small></h1>
		</div>
		<div class="col-sm-5 text-right hidden-xs">
			<ol class="breadcrumb push-10-t">
				<li><a href="{{ route('dashboard') }}">Quản trị</a>
				</li>
				<li><a href="{{ route('banner') }}">Banner</a>
				</li>
				<li>Thêm mới</li>
			</ol>
		</div>
	</div>
</div>
<div class="error-section">
	@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
</div>
<div class="content" style="min-height: 530px;">
	<div class="bs-example bs-example-bg-classes">
	</div>
	<div class="block">
		<div class="block-content">
			<form method="post" name="frmForm" enctype="multipart/form-data" class="">
				@csrf
				<div class="row">
					<div class="col-sm-3">
						<div class="input-group">
							<div id="img_preview_main" class="wrap-img-product-thumbnail">
								<div class="img-thumbnail img-product-thumbnail pull-left">
									<img class="img-responsive" src="{{ old('image') == '' ? $item->image : old('image') }}" style="width: 120px; height: 120px;" />
								</div>
								<div class="pull-left">
									<div style="margin: 0 10px 10px;">
										<a class="btn btn-info iframe-btn" href="/storage/filemanager/dialog.php?field_id=fieldID&type=1&fldr=banner">
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
							<input id="fieldID" type="hidden" name="image" value="{{ old('image') == '' ? $item->image : old('image') }}" class="form-control thumbnail">
						</div>
						<br/>
						<p class="text-muted">
							Chọn ảnh đại diện
							<br/> Lưu ý:
							<br/> + Kích thước tối thiểu 200x200
							<br/> + Dung lượng tối đa 500kb
						</p>
					</div>
					<div class="col-sm-9">
						<div class="panel panel-default panel-light">
							<div class="panel-body">
								<div class="form-group">
									<label class="control-label">
										Tên bài Banner <font color="red">*</font>
									</label>
									<input type="text" name="name" class="form-control" value="{{ old('name') == '' ? $item->name : old('name') }}" />
								</div>
								<div class="form-group">
									<label class="control-label">Link</label>
									<input type="text" name="link" class="form-control" value="{{ old('name') == '' ? $item->link : old('name') }}" />
								</div>
								<div class="form-group">
									<label class="control-label">Loại banner</label>
									<select name="type" id="type" class="form-control">
										@if(old('type') == '')
										@foreach(getTypeBanner() as $key => $val)
										<option value="{{ $key }}" {{ $key == $item->type ? "selected" : "" }}>{{ $val }}</option>
										@endforeach
										@endif
										@if(old('type') != '')
										@foreach(getTypeBanner() as $key => $val)
										<option value="{{ $key }}" {{ $key == old('type') ? "selected" : "" }}>{{ $val }}</option>
										@endforeach
										@endif
									</select>
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
								<button onclick="javascript:window.location.href = '{{ route('banner') }}' " type="button" name="goback" class="btn btn-sm btn-danger">Quay lại</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
@push('scripts')
<script>
	$('#parent').select2({
		placeholder: '-- Chọn --'
	});
	checkKeyword();
</script>
@endpush