@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<h2>Product create</h2>
			</div>
			<div class="col-md-2">
				<a class="btn btn-primary" href="{{ route('product.index') }}" title="back">back</a>
			</div>
		</div>
		@if ($errors->any())
			<div class="alert alert-danger">
				<strong>Algo de errado não está certo</strong>
				<ul>
					@foreach ($errors as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<form action="{{ route('product.store') }}" method="post">
			@csrf
			<div class="row">
				<div class="col-md-12">
					<label>{{ __('Name') }}</label>
					<input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Playstation" autofocus>
					@if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
				</div>
				<div class="col-md-12">
					<label>{{ __('Description') }}</label>
					<textarea type="text" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="Quero Playstation" rows="8" cols="80"></textarea>
					@if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
				</div>
				<div class="col-md-12">
					<label>{{ __('Brand') }}</label>
					<input type="text" name="brand" class="form-control{{ $errors->has('brand') ? ' is-invalid' : '' }}" placeholder="Sony">
					@if ($errors->has('brand'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('brand') }}</strong>
						</span>
					@endif
				</div>
				<div class="col-md-12">
					<label>{{ __('Color') }}</label>
					<input type="text" name="color" class="form-control{{ $errors->has('color') ? ' is-invalid' : '' }}" placeholder="Black">
					@if ($errors->has('color'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('color') }}</strong>
						</span>
					@endif
				</div>
				<div class="col-md-12">
					<label>{{ __('Price') }}</label>
					<input type="text" name="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="1200">
					@if ($errors->has('price'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('price') }}</strong>
						</span>
					@endif
				</div>
				<div class="col-md-12">
					<label>Amount {{ __('Amount') }}</label>
					<input type="text" name="amount" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" placeholder="100">
					@if ($errors->has('amount'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('amount') }}</strong>
						</span>
					@endif
				</div>
				<div class="col-md-12">
					<input type="submit" value="Submit" class="btn btn-success">
				</div>
			</div>
		</form>
	</div>
@endsection