@extends('index')

@section('content')
    <form class="form" method="POST" action="{{ route('atualizar.cliente', $findCliente->id) }}">
        @csrf
        @method('PUT')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Atualizar dados de: {{$findCliente->id}} / {{$findCliente->nome}}</h1>
        </div>
        <div class="row">
            <div class="col-6 mb-2">
                <label class="form-label">Nome</label>
                <input type="text" value=" {{ isset($findCliente->nome) ? $findCliente->nome : old('nome') }}"
                    class="form-control @error('nome') is-invalid @enderror" name="nome">
                @if ($errors->has('nome'))
                    <div class="invalid-feedback"> {{ $errors->first('nome') }}</div>
                @endif
            </div>
            <div class="col-6 mb-2">
                <label class="form-label">email</label>
                <input type="email" value=" {{ isset($findCliente->email) ? $findCliente->email : old('email') }}"
                    class="form-control @error('email') is-invalid @enderror" name="email">
                @if ($errors->has('email'))
                    <div class="invalid-feedback"> {{ $errors->first('email') }}</div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-6 mb-2">
                <label class="form-label">Endereco</label>
                <input type="text" value=" {{ isset($findCliente->endereco) ? $findCliente->endereco : old('nome') }}"
                    class="form-control @error('endereco') is-invalid @enderror" name="endereco">
                @if ($errors->has('endereco'))
                    <div class="invalid-feedback"> {{ $errors->first('endereco') }}</div>
                @endif
            </div>
            <div class="col-6 mb-2">
                <label class="form-label">Bairro</label>
                <input type="text" value=" {{ isset($findCliente->bairro) ? $findCliente->bairro : old('bairro') }}"
                    class="form-control @error('email') is-invalid @enderror" name="bairro">
                @if ($errors->has('bairro'))
                    <div class="invalid-feedback"> {{ $errors->first('bairro') }}</div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-6 mb-2">
                <label class="form-label">Cidade UF</label>
                <input type="text" value=" {{ isset($findCliente->logradouro) ? $findCliente->nome : old('logradouro') }}"
                    class="form-control @error('logradouro') is-invalid @enderror" name="logradouro">
                @if ($errors->has('logradouro'))
                    <div class="invalid-feedback"> {{ $errors->first('logradouro') }}</div>
                @endif
            </div>
            <div class="col-6 mb-2">
                <label class="form-label">CEP</label>
                <input type="text" value=" {{ isset($findCliente->cep) ? $findCliente->cep : old('cep') }}"
                    class="form-control @error('cep') is-invalid @enderror" name="cep">
                @if ($errors->has('cep'))
                    <div class="invalid-feedback"> {{ $errors->first('cep') }}</div>
                @endif
            </div>
        </div>

        <button type="submit" class="btn btn-success">Gravar</button>
    </form>
@endsection
