@extends('index')

@section('content')
<div class="row mt-4">
  <div class="col-1"></div>
  <div class="col-10">
    <div class="container mt-2 mb-2 fundo">
      <form>
        <div class="pt-1 pb-1"></div>
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-1 pb-1 mb-2 border-bottom btnPages">
          <h2 class="th2">Categoria: {{ $findCategoria->nome}}</h3>
        </div>
        <div class="row">
          <div class="col-1 mb-1">
            <label for="InputId" class="form-label">Cód</label>
            <input type="text" class="form-control" id="InputId" value="{{ $findCategoria->id}}">
          </div>
          <div class="col-5 mb-1">
            <label for="InputNome" class="form-label">Nome da Categoria</label>
            <input type="text" class="form-control" id="InputNome" value="{{ $findCategoria->nome}}">
          </div>
          <div class="col-3 mb-1">
            <label for="InputDC" class="form-label">Data do registro</label>
            <input type="text" class="form-control" id="InputDC" value="{{ date_format($findCategoria->created_at, "d/m/Y") }}">
          </div>
          <div class="col-3 mb-1">
            <label for="InputDA" class="form-label">Data da atualização</label>
            <input type="text" class="form-control" id="InputDA" value="{{ date_format($findCategoria->updated_at, "d/m/Y") }}">
          </div>
        </div>
        <div class="row">
          <div class="col-12 d-flex justify-content-center mb-2">
            <a type="button" class="btn mb-2 btnPages" href="{{ route('categoria.index') }}" role="button">Fechar</a>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="col-1"></div>
</div>
@endsection
