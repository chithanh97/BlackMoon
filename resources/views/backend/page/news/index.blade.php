@extends('backend.index')
@section('title', 'Danh sách bài viết')
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
							<li class="breadcrumb-item"><a href="javascript:void(0);">Bài viết</a></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div>
	@if(session('alert'))
	    <div class='alert alert-success'>{{session('alert')}}</div>
	@endif
	<div>
		<div class="">
			<div class="white_card card_height_100 mb_30 QA_section">
				<div class="white_card_header">
					<div class="box_header m-0">
						<div class="main-title">
							<h3 class="m-0">Danh sách bài viết</h3>
						</div>
						<div>
						</div>
						<div class="header_more_tool">
							<div class="dropdown">
								<span class="" id="">
									<button class="btn btn-primary add-button"><a href="{{ route('news.add') }}" class='text-light'><i class="fa fa-plus-circle text-light" aria-hidden="true"></i> Thêm</a></button>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="white_card_body card">
					<div class="QA_table table-responsive ">
						<!-- table-responsive -->
						<table class="table pt-0 table-striped" id='tableData'>
							<thead>
								<tr>
									<th scope="col">
										<input type="checkbox" name='delete-all' id="delete-all" class="form-check-input">
									</th>
									<th scope="col">ID</th>
									<th scope="col">Hình ảnh</th>
									<th scope="col">Tên</th>
									<th scope="col">Danh mục cha</th>
									<th scope="col">Thứ tự</th>
									<th scope="col">Hot</th>
									<th scope="col">Trạng thái</th>
									<th scope="col">Tùy chọn</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($list as $value)
								<tr>
									<td>
										<input type="checkbox" name='delete-item' value="{{ $value->id }}" class="form-check-input delete-item">
									</td>
									<td>{{ $value->id }}</td>
									<td>
										<img class="thumbnail" src="{{ $value->image == '' ? getImageDefault() : $value->image }}" alt="">
									</td>
									<td>{{ $value->name }}</td>
									<td>
										@foreach ( explode(',', $value->parent) as $val)
										<button class="btn btn-info">
											{{ getParentCate($parent, $val) }}
										</button>
										@endforeach
									</td>
									<td>{{ $value->sort == '' ? 0 : $value->sort}}</td>
									<td>
										<div class="{{ $value->hot == 1 ? 'active' : ''}} field-status changestatus" data-table='news' data-field='hot' data-id='{{ $value->id }}'></div>
									</td>
									<td>
										<div class="{{ $value->status == 1 ? 'active' : ''}} status changestatus" data-table='news' data-field='status' data-id='{{ $value->id }}'></div>
									</td>
									<td class="column-action">
										<a href="{{ route('news.edit', $value->id) }}" class="btn-edit">
											<i class="fa fa-pencil"></i>
										</a>
										<a href="javascript:if(confirm('Bạn chắc chắn muốn xóa?')) window.location.href = '{{ route('news.delete', $value->id) }}' ;
											" class="btn-delete">
											<i class="fa fa-trash"></i>
										</a>
									</td>
								</tr>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<td>
										<a href="javascript:deleteAll();" class="btn-delete-all">
											<i class="fa fa-trash"></i>
										</a>
									</td>
									<td colspan="8"></td>
								</tr>
							</tfoot>
						</table>
						<div class="navigation">
							{{ $list->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('styles')
<style>
	.status{
		width: 25px;
		height: 25px;
		background: url(/storage/uploads/default/anhien_0.png);
		background-repeat: no-repeat;
		margin: 0 auto;
		cursor: pointer;
	}
	.status.active{
		width: 25px;
		height: 25px;
		background: url(/storage/uploads/default/anhien_1.png);
		background-repeat: no-repeat;
		margin: 0 auto;
	}
	.field-status{
		width: 25px;
		height: 25px;
		background: url(/storage/uploads/default/noibat_0.png);
		background-repeat: no-repeat;
		margin: 0 auto;
		cursor: pointer;
	}
	.field-status.active{
		width: 25px;
		height: 25px;
		background: url(/storage/uploads/default/noibat_1.png);
		background-repeat: no-repeat;
		margin: 0 auto;
	}
	table thead th{
		text-align: center;
	}
	table tbody td{
		text-align: center;
	}
	table td, table th, table, table tbody, table thead, table tfoot {
		text-align: center;
		border: 1px solid #6c7293!important;
	}
	.column-action a{
		display: inline-flex;
		width: 30px;
		height: 30px;
		background: rgb(107,78,224);
		align-items: center;
		justify-content: center;
		color: #fff;
	}
	.column-action a.btn-delete{
		background: red;
	}
	.navigation{
		margin: 15px 0;
		text-align: right
	}
	.navigation svg{
		width: 20px;
	}
	.navigation div:first-child{
		display: none;
	}
	.navigation div:last-child > spn{
		display: flex;
	}
	.navigation span span span,
	.navigation a{
		color: #000;
		padding: 7px 10px!important;
		display: inline-block;
	}
	.btn-delete-all{
		padding: 7px 10px;
		background: #ed1d05;
		border-radius: 5px;
	}
	.btn-delete-all i{
		color: #fff;
	}
</style>
@endpush
@push('scripts')
<script>
	$('#delete-all').change(() => {
		$('.delete-item').prop('checked', $('#delete-all').prop('checked'));
	});

	function deleteAll(){
		if(confirm('Bạn chắc chắn muốn xóa?')) {
			let value = [];

			$('.delete-item').each(function() {
				if($(this).is(':checked')) {
					value.push($(this).val());
				}
			});

			window.location.href = '{{ route("news.deleteall") }}?value=' + JSON.stringify(value);
		}
	}
</script>
@endpush
