@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row my-5">
			<div class="col-md-4">
				<img src="{{ $product->image_name ? asset('storage/products/' . $product->image_name) : asset('storage/imagem_indisponivel.jpg') }}" width="100%">
			</div>
			<div class="col-md-8">
				<h1>{{ $product->name }}</h1>
				<p><b>Descrição do produto</b><br>{{ $product->description }}</p>
				<div><b>Marca </b><br>{{ $product->brand }}</div>
				<div><b>Cor </b><br>{{ $product->color }}</div>
				<div>R$ {{ $product->price }}</div>
				<div>
					<a href="{{ route('cart.add', ['id' => $product->id, 'goToCart' => true]) }}" class="btn btn-success btn-lg rounded-0 my-1">Comprar</a>
				</div>
			</div>
		</div>
	</div>
@endsection