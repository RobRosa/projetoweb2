@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	<h1>{{ __('Checkout') }}</h1>
					<p>Total: <strong>{{ $total }}</strong></p>
                </div>
                @if (!empty($warning))
                    <div class="alert alert-danger text-center"> {{ $warning }} <b><a href="{{ route('atualizarPerfil') }}">Atualizar Dados</a></b></div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('checkout.validation') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="card" class="col-md-4 col-form-label text-md-right">{{ __('Card') }}</label>

                            <div class="col-md-6">
                                <input id="card" type="number" class="form-control{{ $errors->has('card') ? ' is-invalid' : '' }}" name="card" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cvc" class="col-md-4 col-form-label text-md-right">{{ __('CVC') }}</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Expiration date') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control{{ $errors->has('expiration') ? ' is-invalid' : '' }}" name="expiration" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Comprar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection