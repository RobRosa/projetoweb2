@extends('layouts.app')

@section('content')
	<div class="container">
		@if (Session::has('cart'))
			<div class="col-md-6">
				<ul class="list-group">
					@foreach($products as $product)
					<li class="list-group-item">
						<p>Quantidade: 
							<strong>{{ $product['amount'] }}</strong>
						</p>
						<p>Nome: 
							<strong>{{ $product['item']['name'] }}</strong>
						</p>
						<p>Preço: 
							<strong>{{ $product['price'] }}</strong>
						</p>
					</li>
					@endforeach
				</ul>
			</div>
			<div class="col-md-6">
				<strong>Total: {{ $totalPrice }}</strong>
			</div>
		@else
			<h1>Nada</h1>
		@endif
	</div>
@endsection