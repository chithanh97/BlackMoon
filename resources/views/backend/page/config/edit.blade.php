@extends('backend.index')
@section('title', 'Chỉnh sửa Cài đặt')
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
	.form-group input, .form-group textarea {
		color: #fff!important;
	}
</style>
@endpush
@section('content')
<div class="content bg-gray-lighter">
	<div class="row items-push">
		<div class="col-sm-7">
			<h1 class="page-heading">Cài đặt <small>Chỉnh sửa Cài đặt</small></h1>
		</div>
		<div class="col-sm-5 text-right hidden-xs">
			<ol class="breadcrumb push-10-t">
				<li><a href="{{ route('dashboard') }}">Quản trị</a>
				</li>
				<li><a href="{{ route('config.edit') }}">Cài đặt</a>
				</li>
				<li>Chỉnh sửa</li>
			</ol>
		</div>
	</div>
</div>
<div class="error-section">
	<div class="alert alert-danger">
		<ul>
			<li>{{session('alert')}}</li>
		</ul>
	</div>
</div>
<div class="content" style="min-height: 530px;">
	<div class="bs-example bs-example-bg-classes">
	</div>
	<div class="block">
		<div class="block-content">
			<form method="post" name="frmForm" enctype="multipart/form-data" class="">
				@csrf
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">
								Tên website
							</label>
							<input type="text" name="name" class="form-control" value="{{ old('name') == '' ? $item->name : old('name') }}" />
						</div>
						<div class="form-group">
							<label class="control-label">
								Tên miền
							</label>
							<input type="text" name="domain" class="form-control" value="{{ old('domain') == '' ? $item->domain : old('domain') }}" />
						</div>
						<div class="form-group">
							<label class="control-label">
								Tiền tệ
							</label>
							<input type="text" name="monney" class="form-control" value="{{ old('monney') == '' ? $item->monney : old('monney') }}" />
						</div>
						<div class="form-group">
							<label class="control-label">
								Title mặc định
							</label>
							<input type="text" name="title" class="form-control" value="{{ old('title') == '' ? $item->title : old('title') }}" />
						</div>
						<div class="form-group">
							<label class="control-label">
								Description mặc định
							</label>
							<input type="text" name="description" class="form-control" value="{{ old('description') == '' ? $item->description : old('description') }}" />
						</div>
						<div class="form-group">
							<label class="control-label">
								Keyword mặc định
							</label>
							<input type="text" name="keyword" class="form-control" value="{{ old('keyword') == '' ? $item->keyword : old('keyword') }}" />
						</div>
						<div class="form-group">
							<label class="control-label">
								Mã google analytics
							</label>
							<input type="text" name="ua" class="form-control" value="{{ old('ua') == '' ? $item->ua : old('ua') }}" />
						</div>
						<div class="form-group">
							<label class="control-label">
								Mã google tag manager
							</label>
							<input type="text" name="ga" class="form-control" value="{{ old('ga') == '' ? $item->ga : old('ga') }}" />
						</div>
						<div class="form-group">
							<label class="control-label">
								Mã facebook pixcel
							</label>
							<input type="text" name="pixcel" class="form-control" value="{{ old('pixcel') == '' ? $item->pixcel : old('pixcel') }}" />
						</div>
						<div class="form-group">
							<label class="control-label">
								Email server
							</label>
							<input type="text" name="emailserver" class="form-control" value="{{ old('emailserver') == '' ? $item->emailserver : old('emailserver') }}" />
						</div>
						<div class="form-group">
							<label class="control-label">
								Pass mail server
							</label>
							<input type="text" name="passserver" class="form-control" value="{{ old('passserver') == '' ? $item->passserver : old('passserver') }}" />
						</div>
						<div class="form-group">
							<label class="control-label">
								Mã số thuế
							</label>
							<input type="text" name="certificate" class="form-control" value="{{ old('certificate') == '' ? $item->certificate : old('certificate') }}" />
						</div>
						<div class="form-group">
							<label class="control-label">
								Số điện thoại
							</label>
							<input type="text" name="phone" class="form-control" value="{{ old('phone') == '' ? $item->phone : old('phone') }}" />
						</div>
						<div class="form-group">
							<label class="control-label">
								Hotline
							</label>
							<input type="text" name="hotline" class="form-control" value="{{ old('hotline') == '' ? $item->hotline : old('hotline') }}" />
						</div>
						<div class="form-group">
							<label class="control-label">
								Email
							</label>
							<input type="text" name="email" class="form-control" value="{{ old('email') == '' ? $item->email : old('email') }}" />
						</div>
						<div class="form-group">
							<label class="control-label">
								Địa chỉ
							</label>
							<input type="text" name="address" class="form-control" value="{{ old('address') == '' ? $item->address : old('address') }}" />
						</div>
					</div>
					<div class="col-sm-6">
						<div class="panel panel-default panel-light">
							<div class="panel-body">
								<div class="form-group">
									<label class="control-label">
										Logo
									</label>
									<div class="input-group">
										<div id="img_preview_main" class="wrap-img-product-thumbnail">
											<div class="img-thumbnail img-product-thumbnail pull-left">
												<img class="img-responsive" src="{{ old('logo') == '' ? $item->logo : old('logo') }}" style="width: 120px; height: 120px;" />
											</div>
											<div class="pull-left">
												<div style="margin: 0 10px 10px;">
													<a class="btn btn-info iframe-btn" href="/storage/filemanager/dialog.php?field_id=fieldID1&type=1&fldr=category">
														<i class="fa fa-pencil"></i>
													</a>
												</div>
												<div style="margin: 0 10px 10px;">
													<a class="btn btn-danger" href="javascript:;" onclick="delete_img_product_thumbnail('fieldID1')">
														<i class="fa fa-trash"></i>
													</a>
												</div>
											</div>
										</div>
										<input id="fieldID1" type="hidden" name="logo" value="{{ old('logo') == '' ? $item->logo : old('logo') }}" class="form-control thumbnail">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label">
										Favicon
									</label>
									<div class="input-group">
										<div id="img_preview_main" class="wrap-img-product-thumbnail">
											<div class="img-thumbnail img-product-thumbnail pull-left">
												<img class="img-responsive" src="{{ old('favicon') == '' ? $item->favicon : old('favicon') }}" style="width: 120px; height: 120px;" />
											</div>
											<div class="pull-left">
												<div style="margin: 0 10px 10px;">
													<a class="btn btn-info iframe-btn" href="/storage/filemanager/dialog.php?field_id=fieldID2&type=1&fldr=category">
														<i class="fa fa-pencil"></i>
													</a>
												</div>
												<div style="margin: 0 10px 10px;">
													<a class="btn btn-danger" href="javascript:;" onclick="delete_img_product_thumbnail('fieldID2')">
														<i class="fa fa-trash"></i>
													</a>
												</div>
											</div>
										</div>
										<input id="fieldID2" type="hidden" name="favicon" value="{{ old('favicon') == '' ? $item->favicon : old('favicon') }}" class="form-control thumbnail">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label">
										Script header
									</label>
									<textarea name="headcode" class="form-control tinymce-editor">{{ old('headcode') == '' ? $item->headcode : old('headcode') }}</textarea>
								</div>
								<div class="form-group">
									<label class="control-label">Script body</label>
									<textarea name="bodycode" class="form-control tinymce-editor">{{ old('bodycode') == '' ? $item->bodycode : old('bodycode') }}</textarea>
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
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection