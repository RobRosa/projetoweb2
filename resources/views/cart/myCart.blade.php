@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            	<div class="card-header">
            		<div class="row">
	            		<div class="col-md-8">
	            			{{ __('Carrinho') }}
	            		</div>
	            		<div class="col-md-4">
	            			<strong>Total: {{ $totalPrice }}</strong>
	            		</div>
	            	</div>
            	</div>
				@if (Session::has('cart'))
            	<div class="card-body">
					<div class="row">
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
				</div>
				<div class="card-footer">
					<div class="row">
						<a href="#comprou" class="btn btn-success" title="compre agora">Comprar Agora</a>
					</div>
				</div>
				@else
            	<div class="card-body">
					<div class="row">
						<h1>Nada</h1>
					</div>
				</div>
				@endif
				</div>
            </div>
        </div>
    </div>
</div>
@endsection