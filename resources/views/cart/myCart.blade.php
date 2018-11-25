@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <div class="card">
				@if (Session::has('cart'))
            		<div class="row">
						@foreach($products as $product)
						<div class="col-md-12">
							<div class="row p-3 border-bottom no-gutters">
								<div class="col-md-2">
									<img src="{{ $product['item']['image_name'] ? asset('storage/products/' . $product['item']['image_name']) : asset('storage/imagem_indisponivel.jpg') }}" style="max-width: 100%;">
								</div>
								<div class="col-md-8">
									<h4>{{ $product['item']['name'] }}</h4>
									<p>Preço: 
										<strong>R$ {{ $product['price'] }}</strong>
									</p>
								</div>
								<div class="col-md-1 align-content-sm-center text-center">
									<p>Qtd: 
										<strong>{{ $product['amount'] }}</strong>
									</p>
								</div>
								<div class="col-md-1 align-content-sm-center text-center">
									<p>Qtd: 
										<strong>{{ $product['amount'] }}</strong>
									</p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card-footer">
								<div class="row">
									<div class="col-md-6">
				            			<strong>Total: R$ {{ $totalPrice }}</strong>
				            		</div>
				            		<div class="col-md-6 text-right">
										<a href="{{ route('checkout.index') }}" class="btn btn-success" title="compre agora">Continuar para pagamento</a>
				            		</div>
								</div>
							</div>
						</div>
					</div>
				@else
				<div class="row">
					<div class="card-header">
	            		<div class="row">
		            		<div class="col-md-12">
		            			{{ __('Carrinho') }}
		            		</div>
		            	</div>
	            	</div>
	            	<div class="card-body">
						<div class="row">
							<p>Você não tem nenhum produto adicionado no carrinho, clique no botão abaixo para voltar a comprar.</p>
						</div>
					</div>
					<div class="card-footer">
						<div class="row">
							<a href="{{ route('product.index') }}" class="btn btn-success" title="voltar">Voltar</a>
						</div>
					</div>
				</div>
				@endif
            </div>
        </div>
    </div>
</div>
@endsection