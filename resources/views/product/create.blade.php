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
					<label>Name:</label>
					<input type="text" name="name" class="form-control" placeholder="Playstation">
				</div>
				<div class="col-md-12">
					<label>Description:</label>
					<textarea type="text" name="description" class="form-control" placeholder="Quero Playstation" rows="8" cols="80"></textarea>
				</div>
				<div class="col-md-12">
					<input type="submit" value="Submit" class="btn btn-success">
				</div>
			</div>
		</form>
	</div>
@endsection