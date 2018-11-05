@extends('layouts.app')

<style>
	.header-product {
		background-image: url('https://images.pexels.com/photos/262100/pexels-photo-262100.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');
		background-size: 100%;
		background-position: center;
		background-repeat: no-repeat;
		height: 600px;
		width: 100%;
		position: relative;
	}
	.header-product .header-background {
		background-color: rgba(31,31,31,.5);
		position: absolute;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		z-index: 1;
	}
	.header-product .header-background .header-description {
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);
		text-align: center;
		color: #fff;
	}

	.section-product {
		width: 100%;
		display: flex;
		flex-direction: row;
		flex-wrap: wrap;
		justify-content: space-between;
		padding: 46px 0;
	}
	.section-product .card {
		margin: 20px 0;
	}
	.section-product .card .card-body {
		display: flex;
		flex-direction: column;
		justify-content: space-between;
	}
	.section-product .card .card-body .card-title-product {
		font-size: 1.4em;
	}
</style>

@section('content')
	<div class="container">
		<div class="header-product">
			<div class="header-background">
				<div class="header-description">
					<h1>Evite tranqueiras</h1>
					<p>Compre online sem se estressar com o transito.</p>
				</div>
			</div>
		</div>
		<div class="section-product">
			@foreach ($products as $row)
			<div class="card" style="width: 14rem;">
				<img class="card-img-top" src="https://pbs.twimg.com/profile_images/717306100312383488/f38LU5Cu.jpg" alt="Card image cap">
				<div class="card-body">
					<h2 class="card-title-product">{{ $row->name }}</h2>
					<p class="card-text">R$ {{ $row->price }}</p>
					<a href="#" class="btn btn-success">Buy</a>
					<a href="{{ route('product.cart', ['id' => $row->id]) }}" class="btn btn-dark">Cart</a>
				</div>
			</div>
			@endforeach
		</div>
		{!! $products->links() !!}
@endsection