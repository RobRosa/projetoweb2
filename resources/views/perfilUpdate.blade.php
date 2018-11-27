@extends('layouts.app')

@section('content')

<div class="container">
    <form method="post" action="{{ route('salvaAtualizacao') }}" enctype="multipart/form-data">
        <div class="row">
            @csrf
            <div class="col-md-4">
                <label>
                    Alterar a foto
                    <input type="file" name="imageUp">
                </label>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered" style="width:auto; background-color: white">
                    <tr>
                        <td><b>Nome: </b></td>
                        <td><input class="form-control" type="" name="name" value="{{ $userInfo['name'] }}"></td>
                    </tr>
                    <tr>
                        <td><b>Email: </b></td>
                        <td><input class="form-control" type="" name="email" value="{{ $userInfo['email'] }}"></td>
                    </tr> 
                    <tr>
                        <td><b>CPF: </b></td>
                        <td><input class="form-control" type="" name="cpf" value="{{ $userInfo['cpf'] }}" disabled></td>
                    </tr> 
                    <tr>
                        <td><b>Data de nascimento: </b></td>
                        <td><input class="form-control" type="" name="nascimento" value="{{ $userInfo['nascimento'] }}"></td>
                    </tr> 
                    <tr>
                        <td><b>Sexo: </b></td>
                        <td>
                            <div id="sexo_m" class="form-check form-check-inline col-form-label ">
                                <input class="form-check-input" type="radio" name="sexo" value="M" {{ $userInfo['sexo'] === 'M' ? 'checked' : '' }}>
                                <label for="sexo_m" class="form-check-label">Masculino</label>
                            </div>
                            <div class="form-check form-check-inline col-form-label ">
                                <input id="sexo_f" class="form-check-input" type="radio" name="sexo" value="F" {{ $userInfo['sexo'] === 'F' ? 'checked' : '' }}>
                                <label for="sexo_f" class="form-check-label">Feminino</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Telefones: </b></td>
                        <td>
                            <div class="row">
                            @foreach ($userInfo['telephones'] as $telefone)
                                <div class="col-md-3">
                                    <input id="ddd" type="text" class="form-control {{ $errors->has('ddd') ? ' is-invalid' : '' }}" name="ddd" value="{{ $telefone->ddd }}" required>
                                </div>
                                <div class="col-md-9">
                                    <input id="telephone" type="text" class="form-control {{ $errors->has('telephone') ? ' is-invalid' : '' }}" name="telephone" value="{{ $telefone->telephone }}" required>
                                </div>
                            @endforeach
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Endereço:</b></td>
                        <td>
                            @if(!$userInfo['address'])
                                <p class="alert alert-warning">* Por favor, registre um endereço em seu perfil</p>
                            @endif
                            <div><b>CEP:</b> <input class="form-control" type="" name="cep" value="{{ $userInfo['address']->cep ?? '' }}"></div>
                            <div><b>Endereço:</b> <input class="form-control" type="" name="address" value="{{ $userInfo['address']->endereco ?? '' }}"> 
                                 <b>Nº:</b><input class="form-control" type="" name="numero" value="{{ $userInfo['address']->numero ?? '' }}"></div>
                            <div><b>Bairro:</b> <input class="form-control" type="" name="bairro" value="{{ $userInfo['address']->bairro ?? '' }}"></div>
                            <div><b>Cidade:</b> <input class="form-control" type="" name="cidade" value="{{ $userInfo['address']->cidade ?? '' }}"></div>
                            <div><b>Estado:</b> <input class="form-control" type="" name="estado" value="{{ $userInfo['address']->estado ?? '' }}"></div>
                            <div><b>Complemento:</b> <input class="form-control" type="" name="complemento" value="{{ $userInfo['address']->complemento ?? '' }}"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-right">
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </form> 
</div>
@endsection
