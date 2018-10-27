@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<h2>Product Detail</h2>
			</div>
			<div class="col-md-2">
				<a class="btn btn-primary" href="{{ route('product.index') }}" title="Back">Back</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<p><strong>Name:</strong> {{ $product->name }}</p>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<p><strong>Description:</strong> {{ $product->description }}</p>
				</div>
			</div>
		</div>
	</div>
@endsection