@extends('index')

@section('content')

<div class='container mt-3 border'>
  <div class="row bg-success-subtle text-center "><h3>Cliente: {{ $findCliente->nome}}</h3></div>
</div>
<div class='container mt-2 border' style="background-color: antiquewhite">
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
        <label for="InputCompl" class="form-label">Complemento</label>
        <input type="text" class="form-control" id="InputCompl" value="{{ $findCliente->complemento}}">
      </div>
    </div>
    <div class="row">
      <div class="col-4 mb-1">
        <label for="InputBairro" class="form-label">Bairro</label>
        <input type="text" class="form-control" id="InputBairro" value="{{ $findCliente->bairro}}">
      </div>
      <div class="col-5 mb-1">
        <label for="InputCidade" class="form-label">Cidade</label>
        <input type="text" class="form-control" id="InputCidade" value="{{ $findCliente->cidade}}">
      </div>
      <div class="col-1 mb-1">
        <label for="InputUF" class="form-label">CEP</label>
        <input type="text" class="form-control" id="InputUF" value="{{ $findCliente->uf}}">
      </div>
      <div class="col-2 mb-1">
        <label for="InputCEP" class="form-label">CEP</label>
        <input type="text" class="form-control" id="InputCEP" value="{{ $findCliente->cep}}">
      </div>
    </div>
    <div class="row">  
      <div class="col-6 mb-1">
        <label for="InputDC" class="form-label">Data do registro</label>
        <input type="text" class="form-control" id="InputDC" value="{{ date_format($findCliente->created_at, "d/m/Y") }}">
      </div>
      <div class="col-6 mb-1">
        <label for="InputDA" class="form-label">Data da atualização</label>
        <input type="text" class="form-control" id="InputDA" value="{{ date_format($findCliente->updated_at, "d/m/Y") }}">
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