@extends('layouts.app')

@section('content')

<div class="container bg-white py-5">
    <div class="row">
        <div class="col-md-3 my-5 bg-white py-3 border">
            <img src="{{ $userInfo['image'] ? asset('storage/user/' . $userInfo['image']) : '' }}">
        </div>
        <div class="col-md-9 my-5 bg-white py-3 border">
            <table class="table table-bordered">
                <tr>
                    <td><b>Nome: </b></td>
                    <td>{{ $userInfo['name'] }}</td>
                </tr>
                <tr>
                    <td><b>Email: </b></td>
                    <td>{{ $userInfo['email'] }}</td>
                </tr> 
                <tr>
                    <td><b>CPF: </b></td>
                    <td>{{ $userInfo['cpf'] }}</td>
                </tr> 
                <tr>
                    <td><b>Data de nascimento: </b></td>
                    <td>{{ $userInfo['nascimento'] }}</td>
                </tr> 
                <tr>
                    <td><b>Sexo: </b></td>
                    <td>{{ $userInfo['sexo'] }}</td>
                </tr>
                <tr>
                    <td><b>Telefones: </b></td>
                    <td>
                        @foreach ($userInfo['telephones'] as $telefone)
                            {{ '('.$telefone->ddd.') '.$telefone->telephone }} <br>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td><b>Endereço:</b></td>
                    <td>
                        @if($userInfo['address']):
                            <div><b>CEP:</b> {{ $userInfo['address']->cep }}</div>
                            <div><b>Endereço:</b> {{ $userInfo['address']->endereco }} <b>Nº:</b>{{ $userInfo['address']->numero }}</div>
                            <div><b>Bairro:</b> {{ $userInfo['address']->bairro }}</div>
                            <div><b>Cidade:</b> {{ $userInfo['address']->cidade }}</div>
                            <div><b>Estado:</b> {{ $userInfo['address']->estado }}</div>
                            <div><b>Complemento:</b> {{ $userInfo['address']->complemento }}</div>
                        @else
                            <p class="alert alert-warning">* Por favor, registre um endereço em seu perfil</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-right">
                        <a href="{{ route('atualizarPerfil') }}" class="btn btn-primary">Atualizar Dados</a>
                    </td>
                </tr>
            </table>
            
            
        </div>
    </div>
</div>
@endsection
