@extends('layouts.app')
@section('content')
	<div class="container my-5">
		<div class="row">
			<div class="col-md-8 offset-2">
				<h2>Criação de Produtos</h2>
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
		<form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-md-8 offset-2 bg-white p-3">
					<label>{{ __('Name') }}</label>
					<input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Playstation" autofocus>
					@if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
				
					<label>{{ __('Description') }}</label>
					<textarea type="text" name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="Quero Playstation" rows="8" cols="80"></textarea>
					@if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
				
					<label>{{ __('Brand') }}</label>
					<input type="text" name="brand" class="form-control {{ $errors->has('brand') ? ' is-invalid' : '' }}" placeholder="Sony">
					@if ($errors->has('brand'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('brand') }}</strong>
						</span>
					@endif
				
					<label>{{ __('Color') }}</label>
					<input type="text" name="color" class="form-control {{ $errors->has('color') ? ' is-invalid' : '' }}" placeholder="Black">
					@if ($errors->has('color'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('color') }}</strong>
						</span>
					@endif
				
					<label>{{ __('Price') }}</label>
					<input type="text" name="price" class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="1200">
					@if ($errors->has('price'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('price') }}</strong>
						</span>
					@endif
				
					<label>{{ __('Amount') }}</label>
					<input type="text" name="amount" class="form-control {{ $errors->has('amount') ? ' is-invalid' : '' }}" placeholder="100">
					@if ($errors->has('amount'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('amount') }}</strong>
						</span>
					@endif
				
					<label>{{ __('Category') }}</label>
					<select name="category" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}">
						<option>Escolha uma categoria</option>
						<option value="Eletrônicos">Eletrônicos</option>
						<option value="Brinquedos">Brinquedos</option>
						<option value="Roupas">Roupas</option>
						<option value="Livros">Livros</option>
						<option value="Eletrodomésticos">Eletrodomésticos</option>
						<option value="Esportes">Esportes</option>
					</select>
					@if ($errors->has('category'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('category') }}</strong>
						</span>
					@endif
				
					<label>{{ __('Image') }}</label>
					<input type="file" name="image" class="form-control-file {{ $errors->has('amount') ? ' is-invalid' : '' }}" accept="image/jpg, image/jpeg, image/png">
					@if ($errors->has('image'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('image') }}</strong>
						</span>
					@endif
					<br>
					<input type="submit" value="Submit" class="btn btn-success">
				</div>
			</div>
		</form>
	</div>
@endsection