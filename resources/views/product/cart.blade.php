@extends('layouts.app')

@section('content')
	@if(Session::has('cart'))
		<div class="container">
			<div class="col-md-6">
				<ul class="list-group">
					@foreach($products as row)
					<li class="list-group-item">
						<p>Quantidade: 
							<strong>{{ $row['qty'] }}</strong>
						</p>
						<p>Nome: 
							<strong>{{ $row['item']['title'] }}</strong>
						</p>
						<p>Preço: 
							<strong>{{ $row['price'] }}</strong>
						</p>
					</li>
				</ul>
			</div>
		</div>
	@else

	@endif
@endsection