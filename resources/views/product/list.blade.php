@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="section-product border ronded px-3 pb-3">
			<h2 class="text-center py-3">Categoria: {{ $category }} </h2>
			<div class="row">
				@foreach ($products as $product)
				<div class="col-lg-3 col-md-6 mb-2">
					<div class="card">
						<a class="link-no-style" href="/product/{{ $product->id }}">
							<img class="card-img-top" src="{{ $product->image_name ? asset('storage/products/'. $product->image_name) : asset('storage/imagem_indisponivel.jpg') }}" alt="Card image cap">
						</a>
						<div class="card-body">
							<a class="link-no-style" href="/product/{{ $product->id }}">
								<h2 class="card-title-product">{{ $product->name }}</h2>
								<p class="card-text">R$ {{ $product->price }}</p>
							</a>
							<div class="button-group">
								<a href="{{ route('cart.add', ['id' => $product->id]) }}" class="btn btn-success d-block rounded-0 my-1">+ Carrinho</a>
								<a href="/product/{{ $product->id }}" class="btn btn-primary d-block rounded-0 my-1">Detalhes</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		{!! $products->links() !!}
	</div>
@endsection