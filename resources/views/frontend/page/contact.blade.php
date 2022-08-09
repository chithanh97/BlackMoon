@extends('frontend.index')
@section('title', 'Liên hệ')
@push('styles')
<script>
	function callbackThen(response){
		response.json().then(function(data) {
			if(!data.success || data.score <= 0.5){
				document.getElementById('contact-form').addEventListener('submit', function(event){
					event.preventDefault();
					alert('Lỗi capcha');
				})
			}
		});
	}
	function callbackCatch(error){
		console.log('Error: '+ error);
	}
</script>
{!! htmlScriptTagJsApi(['callback_then' => 'callbackThen','callback_catch' => 'callbackCatch']) !!}
@endpush
@section('content')
<div class="contact">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-md-12 col-xs-12">
				<form action="{{ route('front.contact') }}" method="POST" id="contact-form">
					@csrf
					<div class="title">
						<h3>Liên hệ</h3>
					</div>
					@if(session('alert'))
					    <div class='alert alert-success'>{{session('alert')}}</div>
					@endif
					<div class="form-group">
						<label for="">Họ tên:</label>
						<input class="form-control" type="text" name='name' value="{{ old('name') }}">
					</div>
					<div class="form-group">
						<label for="">Địa chỉ:</label>
						<input class="form-control" type="text" name='address' value="{{ old('address') }}">
					</div>
					<div class="form-group">
						<label for="">Số điện thoại:</label>
						<input class="form-control" type="text" name='phone' value="{{ old('phone') }}">
					</div>
					<div class="form-group">
						<label for="">Email:</label>
						<input class="form-control" type="text" name='email' value="{{ old('email') }}">
					</div>
					<div class="form-group">
						<label for="">Lời nhắn:</label>
						<textarea class="form-control" rows="10" name="note">{{ old('note') }}</textarea>
					</div>
					<div class="form-group">
						<input class="btn btn-primary" type="submit" name='submit' style="cursor: pointer;">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection