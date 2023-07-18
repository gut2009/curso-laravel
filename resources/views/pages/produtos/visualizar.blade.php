@extends('index')

@section('content')


<div class='container mt-3 border'>
  <div class="row bg-success-subtle text-center "><h3>Produto: {{ $findProduto->nome}}</h3></div>
</div>
  
<div class='container mt-2 border'>

  <form>
    <div class="row">  
      <div class="col-2 mb-1">
        <label for="InputId" class="form-label">Cód</label>
        <input type="text" class="form-control" id="InputId" value="{{ $findProduto->id}}">
      </div>
      <div class="col-5 mb-1">
        <label for="InputNome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="InputNome" value="{{ $findProduto->nome}}">
      </div>
      <div class="col-5 mb-1">
        <label for="InputValor" class="form-label">Valor</label>
        <input id="mascara_valor" type="number" class="form-control" value="{{ $findProduto->valor}}">
      </div>
    </div>
    <div class="row">  
      <div class="col-6 mb-1">
        <label for="InputDC" class="form-label">Data do registro</label>
        <input type="text" class="form-control" id="InputDC" value="{{ $findProduto->created_at}}">
      </div>
      <div class="col-6 mb-1">
        <label for="InputDA" class="form-label">Data da atualização</label>
        <input type="text" class="form-control" id="InputDA" value="{{ $findProduto->updated_at}}">
      </div>
    </div>
    <div class="row">  
      <div class="col-2 mb-1">
        <label for="InputId" class="form-label">Outros</label>
        <input type="text" class="form-control" id="InputId">
      </div>
      <div class="col-5 mb-1">
        <label for="InputNome" class="form-label">Outros</label>
        <input type="text" class="form-control" id="InputNome">
      </div>
      <div class="col-5 mb-1">
        <label for="InputValor" class="form-label">Outros</label>
        <input type="number" class="form-control" id="InputValor">
      </div>
    </div>
    <div class="row">  
      <div class="col-2 mb-1">
        <label for="InputId" class="form-label">Outros</label>
        <input type="text" class="form-control" id="InputId">
      </div>
      <div class="col-5 mb-1">
        <label for="InputNome" class="form-label">Outros</label>
        <input type="text" class="form-control" id="InputNome">
      </div>
      <div class="col-5 mb-1">
        <label for="InputValor" class="form-label">Outros</label>
        <input type="number" class="form-control" id="InputValor">
      </div>
    </div>
    <div class="row">  
      <div class="col-2 mb-1">
        <label for="InputId" class="form-label">Outros</label>
        <input type="text" class="form-control" id="InputId">
      </div>
      <div class="col-5 mb-1">
        <label for="InputNome" class="form-label">Outros</label>
        <input type="text" class="form-control" id="InputNome">
      </div>
      <div class="col-5 mb-1">
        <label for="InputValor" class="form-label">Outros</label>
        <input type="number" class="form-control" id="InputValor">
      </div>
    </div>
    <div class="row">  
      <div class="col-2 mb-2">
        <label for="InputId" class="form-label">Outros</label>
        <input type="text" class="form-control" id="InputId">
      </div>
      <div class="col-5 mb-2">
        <label for="InputNome" class="form-label">Outros</label>
        <input type="text" class="form-control" id="InputNome">
      </div>
      <div class="col-5 mb-2">
        <label for="InputValor" class="form-label">Outros</label>
        <input type="number" class="form-control" id="InputValor">
      </div>
    </div>
    <div class="row">
      <div class="col-12 d-flex justify-content-center mb-2">
        <a type="button" class="btn btn-primary" href="{{ route('produto.index') }}" role="button">Fechar</a>
      </div>
    </div>
  </form>
</div>

@endsection