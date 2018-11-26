@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row my-5 bg-white py-5 border">
			<div class="col-md-4">
				<img src="{{ $product->image_name ? asset('storage/products/' . $product->image_name) : asset('storage/imagem_indisponivel.jpg') }}" width="100%">
			</div>
			<div class="col-md-8 pl-5">
				<h1>{{ $product->name }}</h1>
				<span class="badge badge-primary p-2 mb-2 text-uppercase">{{ $product->category }}</span>
				<div>
					<h5><b>Descrição do produto</b></h5>
					<p>					
						{{ $product->description }}
					</p>
				</div>
				<div>
					<h5><b>Marca</b></h5>
					<p>
						{{ $product->brand }}
					</p>
				</div>
				<div>
					<h5><b>Cor</b></h5>
					<p>
						{{ $product->color }}						
					</p>
				</div>
				<div style="font-size: 1.6rem; font-weight: bold;">
					R$ {{ $product->price }}
				</div>
				<div>
					<a href="{{ route('cart.add', ['id' => $product->id, 'goToCart' => true]) }}" class="btn btn-success btn-lg rounded-0 my-1">Comprar</a>
				</div>
			</div>
		</div>
	</div>
@endsection