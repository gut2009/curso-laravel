@extends('index')

@section('content')
<div class="row mt-4">
  <div class="col-1"></div>
  <div class="col-10">
    <div class="container mt-2 mb-2 fundo">
      <form>
        <div class="pt-1 pb-1"></div>
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-1 pb-1 mb-2 border-bottom btnPages">
          <div class="row align-items-baseline">
            <h4 class="th2">Editora {{ $findEditora->id }} // {{ $findEditora->nome }}</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-3 mb-1 d-flex align-items-center justify-content-center btnLogo" enctype="multipart/form-data">
            <img class="form-control-file" id="InputImagem" src=" {{ asset('storage/'.$findEditora->imagem) }}" width=" 60" height="60">
          </div>
          <div class="col-3 mb-1">
            <label for="InputSigla" class="form-label">Sigla</label>
            <input type="text" class="form-control" id="InputSigla" value="{{ $findEditora->sigla }}">
          </div>
          <div class="col-6 mb-1">
            <label for="InputNome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="InputNome" value="{{ $findEditora->nome }}">
          </div>
        </div>
        <div class="row">
          <div class="col-5 mb-1">
            <label for="InputCidade" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="InputCidade" value="{{ $findEditora->cidade }}">
          </div>
          <div class="col-2 mb-1">
            <label for="InputUF" class="form-label">Estado</label>
            <input type="text" class="form-control" id="InputUF" value="{{ $findEditora->uf }}">
          </div>
          <div class="col-5 mb-1">
            <label for="InputPais" class="form-label">Pais</label>
            <input type="text" class="form-control" id="InputPais" value="{{ $findEditora->pais }}">
          </div>
        </div>
        <div class="row">
          <div class="col-6 mb-1">
            <label for="InputDC" class="form-label">Data do registro</label>
            <input type="text" class="form-control" id="InputDC" value="{{ date_format($findEditora->created_at, "d/m/Y") }}">
          </div>
          <div class="col-6 mb-1">
            <label for="InputDA" class="form-label">Data da atualização</label>
            <input type="text" class="form-control" id="InputDA" value="{{ date_format($findEditora->updated_at, "d/m/Y") }}">
          </div>
        </div>
        <div class="row">
          <div class="col-12 d-flex justify-content-center mb-2">
            <a type="button" class="btn mb-2 btnPages" href="{{ route('editora.index') }}" role="button">Fechar</a>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="col-1"></div>
</div>
@endsection
