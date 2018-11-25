@extends('layouts.app')

@section('content')
	<div class="header-product">
		<div class="header-background">
			<div class="header-description">
				<h1>Evite tranqueiras</h1>
				<p>Compre online sem se estressar com o transito.</p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="section-product">
			<div class="row">
				@foreach ($products as $row)
				<div class="col-lg-3 col-md-6 mb-5">
					<div class="card">
						<a class="link-no-style" href="/product/{{ $row->id }}">
							<img class="card-img-top" src="{{ $row->image_name ? asset('storage/products/'. $row->image_name) : asset('storage/imagem_indisponivel.jpg') }}" alt="Card image cap">
						</a>
						<div class="card-body">
							<a class="link-no-style" href="/product/{{ $row->id }}">
								<h2 class="card-title-product">{{ $row->name }}</h2>
								<p class="card-text">R$ {{ $row->price }}</p>
							</a>
							<div class="button-group">
								<a href="{{ route('cart.add', ['id' => $row->id]) }}" class="btn btn-success d-block rounded-0 my-1">+ Carrinho</a>
								<a href="/product/{{ $row->id }}" class="btn btn-primary d-block rounded-0 my-1">Detalhes</a>
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