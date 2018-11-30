@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <div class="card">
				<div class="row">
					<div class="col-md-12">
						<div class="card-header">
	            			{{ __('Carrinho') }}
		            	</div>
	            	</div>
	            </div>
	            <div class="row">
				@if (Session::has('cart'))
					@foreach($products as $key => $product)
					<div class="col-md-12">
						<div class="row p-3 border-bottom no-gutters">
							<div class="col-md-2">
								<img src="{{ $product['item']['image_name'] ? asset('storage/products/' . $product['item']['image_name']) : asset('storage/imagem_indisponivel.jpg') }}" style="max-width: 100%;">
							</div>
							<div class="col-md-8">
								<h4>{{ $product['item']['name'] }}</h4>
								<p>Preço: 
									<strong>R$ {{ number_format($product['item']->price, 2) }}</strong>
								</p>
							</div>
							<div class="col-md-1 align-content-sm-center text-center">
								<p>Qtd: 
									<strong>{{ $product['amount'] }}</strong>
								</p>
							</div>
							<div class="col-md-1 align-content-sm-center text-center">
								<a class="d-block my-2" href="{{ route('cart.add', $product['item']->id) }}" title="Adicionar mais um item">
									<i class="fas fa-plus text-primary"></i>
								</a>
								<a class="d-block my-2" href="{{ route('cart.remove', $product['item']->id) }}" title="Remover um item">
									<i class="fas fa-minus text-danger"></i>
								</a>
								<a class="d-block my-2" href="{{ route('cart.removeItem', $product['item']->id) }}" title="Remover do carrinho">
									<i class="far fa-trash-alt text-danger"></i>
								</a>
							</div>
						</div>
					</div>
					@endforeach
					<div class="col-md-12">
						<div class="card-footer">
							<div class="row">
								<div class="col-md-6">
			            			<strong>Total: R$ {{ number_format($totalPrice, 2) }}</strong>
			            		</div>
			            		<div class="col-md-6 text-right">
									<a href="{{ route('checkout.index') }}" class="btn btn-success" title="compre agora">Continuar para pagamento</a>
			            		</div>
							</div>
						</div>
					</div>
				@else
            		<div class="col-md-12">
		            	<div class="card-body">
							<p>Você não tem nenhum produto adicionado no carrinho, clique no botão abaixo para voltar a comprar.</p>
						</div>
						<div class="card-footer">
							<a href="{{ route('product.index') }}" class="btn btn-success" title="voltar">Voltar</a>
						</div>
					</div>
				@endif
            </div>
        </div>
    </div>
</div>
@endsection