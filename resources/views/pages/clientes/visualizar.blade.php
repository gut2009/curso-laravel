@extends('index')

@section('content')

<div class='container mt-3 border'>
  <div class="row bg-success-subtle text-center "><h3>Cliente: {{ $findCliente->nome}}</h3></div>
</div>
<div class='container mt-2 border'>
  <form>
    <div class="row">  
      <div class="col-2 mb-1">
        <label for="InputId" class="form-label">Cód</label>
        <input type="text" class="form-control" id="InputId" value="{{ $findCliente->id}}">
      </div>
      <div class="col-5 mb-1">
        <label for="InputNome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="InputNome" value="{{ $findCliente->nome}}">
      </div>
      <div class="col-5 mb-1">
        <label for="InputEmail" class="form-label">Email</label>
        <input type="email" class="form-control" id="InputEmail" value="{{ $findCliente->email}}">
      </div>
    </div>
    <div class="row">  
      <div class="col-6 mb-1">
        <label for="InputEnd" class="form-label">Endereço</label>
        <input type="text" class="form-control" id="InputEnd" value="{{ $findCliente->endereco}}">
      </div>
      <div class="col-6 mb-1">
        <label for="InputBairro" class="form-label">Bairro</label>
        <input type="text" class="form-control" id="InputBairro" value="{{ $findCliente->bairro}}">
      </div>
    </div>

    <div class="row">  
      <div class="col-6 mb-1">
        <label for="InputCidade" class="form-label">Cidade UF</label>
        <input type="text" class="form-control" id="InputCidade" value="{{ $findCliente->logradouro}}">
      </div>
      <div class="col-6 mb-1">
        <label for="InputCEP" class="form-label">CEP</label>
        <input type="text" class="form-control" id="InputCEP" value="{{ $findCliente->cep}}">
      </div>
    </div>
    <div class="row">  
      <div class="col-6 mb-1">
        <label for="InputDC" class="form-label">Data do registro</label>
        <input type="text" class="form-control" id="InputDC" value="{{ $findCliente->created_at}}">
      </div>
      <div class="col-6 mb-1">
        <label for="InputDA" class="form-label">Data da atualização</label>
        <input type="text" class="form-control" id="InputDA" value="{{ $findCliente->updated_at}}">
      </div>
    </div>

    <div class="row">
      <div class="col-12 d-flex justify-content-center mb-2">
        <a type="button" class="btn btn-primary" href="{{ route('cliente.index') }}" role="button">Fechar</a>
      </div>
    </div>
  </form>
</div>

@endsection