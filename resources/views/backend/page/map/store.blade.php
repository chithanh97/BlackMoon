@extends('backend.index')
@section('title', 'Thêm Map')
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
			<h1 class="page-heading">Map <small>Thêm mới Map</small></h1>
		</div>
		<div class="col-sm-5 text-right hidden-xs">
			<ol class="breadcrumb push-10-t">
				<li><a href="{{ route('dashboard') }}">Quản trị</a>
				</li>
				<li><a href="{{ route('map') }}">Map</a>
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
					<div class="col-sm-12">
						<div class="panel panel-default panel-light">
							<div class="panel-body">
								<div class="form-group">
									<label class="control-label">
										Tên Map <font color="red">*</font>
									</label>
									<input type="text" name="name" class="form-control" value="{{old('name')}}" />
								</div>
								<div class="form-group">
									<label class="control-label">Bản đồ</label>
									<textarea name="detail" class="form-control tinymce-editor">{{old('detail')}}</textarea>
								</div>
								<div class="form-group">
									<label class="control-label">Thứ tự</label>
									<input type="text" name="sort" class="form-control" value="{{old('sort') == '' ? 0 : old('sort')}}" />
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
								<button onclick="javascript:window.location.href = '{{ route('map') }}' " type="button" name="goback" class="btn btn-sm btn-danger">Quay lại</button>
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
	$('select#parent').select2({
		placeholder: '-- Chọn --'
	});
	checkKeyword();
</script>
@endpush