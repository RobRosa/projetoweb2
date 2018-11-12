@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	{{ __('Checkout') }}
					<p>Total: <strong>{{ $total }}</strong></p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('checkout') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="card" class="col-md-4 col-form-label text-md-right">{{ __('Card') }}</label>

                            <div class="col-md-6">
                                <input id="card" type="number" class="form-control" name="card" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cvc" class="col-md-4 col-form-label text-md-right">{{ __('CVC') }}</label>

                            <div class="col-md-6">
                                <input id="cvc" type="number" class="form-control" name="cvc" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Expiration date') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="number" class="form-control" name="date" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Expiration date') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="number" class="form-control" name="date" required>
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