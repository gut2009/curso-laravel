@extends('index')

@section('content')

<div class='container mt-3 border'>
  <div class="row bg-success-subtle text-center "><h3>Venda: {{ $verVendas->numero_da_venda}}</h3></div>
</div>
  
<div class='container mt-2 border'>

  <form>
    <div class="row">  
      <div class="col-2 mb-1">
        <label for="InputId" class="form-label">Cód</label>
        <input type="text" class="form-control" id="InputId" value="{{ $verVendas->id}}">
      </div>
      <div class="col-5 mb-1">
        <label for="InputClienteId" class="form-label">Cod Cli</label>
        <input type="text" class="form-control" id="InputClienteId" value="{{ $verVendas->cliente_id}}">
      </div>
      <div class="col-5 mb-1">
        <label for="InputClienteNome" class="form-label">Nome do Cliente</label>
        <input type="text" class="form-control" id="InputClienteNome" value="{{ $verVendas->cliente_nome}}">
      </div>
    </div>
    <div class="row">  
      <div class="col-4 mb-1">
        <label for="InputProdutoId" class="form-label">Cod Produto</label>
        <input type="text" class="form-control" id="InputProdutoId" value="{{ $verVendas->produto_id}}">
      </div>
      <div class="col-8 mb-1">
        <label for="InputProdutoNome" class="form-label">Nome do Produto</label>
        <input type="text" class="form-control" id="InputProdutoNome" value="{{ $verVendas->produto_nome}}">
      </div>
    </div>


    <div class="row">  
      <div class="col-6 mb-1">
        <label for="InputDC" class="form-label">Data do registro</label>
        <input type="text" class="form-control" id="InputDC" value="{{ date_format($verVendas->created_at, "d/m/Y") }}">
      </div>
      <div class="col-6 mb-1">
        <label for="InputDA" class="form-label">Data da atualização</label>
        <input type="text" class="form-control" id="InputDA" value="{{ date_format($verVendas->updated_at, "d/m/Y") }}">
      </div>
    </div>
       <div class="row">
      <div class="col-12 d-flex justify-content-center mb-2">
        <a type="button" class="btn btn-primary" href="{{ route('venda.index') }}" role="button">Fechar</a>
      </div>
    </div>
  </form>
</div>

@endsection