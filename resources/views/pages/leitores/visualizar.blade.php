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
            <h4 class="th2">Leitor: {{ $findLeitor->id}} / {{ $findLeitor->nome}}</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-3 mb-1 d-flex align-items-center justify-content-center btnLogo" enctype="multipart/form-data">
            <img class="form-control-file" id="InputImagem" src=" {{ asset('storage/'.$findLeitor->imagem) }}" width=" 60" height="60">
          </div>
          <div class="col-5 mb-1">
            <label for="InputNome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="InputNome" value="{{ $findLeitor->nome}}">
          </div>
          <div class="col-4 mb-1">
            <label for="InputEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="InputEmail" value="{{ $findLeitor->email}}">
          </div>
        </div>
        <div class="row">
          <div class="col-6 mb-1">
            <label for="InputEnd" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="InputEnd" value="{{ $findLeitor->endereco}}">
          </div>
          <div class="col-6 mb-1">
            <label for="InputCompl" class="form-label">Complemento</label>
            <input type="text" class="form-control" id="InputCompl" value="{{ $findLeitor->complemento}}">
          </div>
        </div>
        <div class="row">
          <div class="col-4 mb-1">
            <label for="InputBairro" class="form-label">Bairro</label>
            <input type="text" class="form-control" id="InputBairro" value="{{ $findLeitor->bairro}}">
          </div>
          <div class="col-5 mb-1">
            <label for="InputCidade" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="InputCidade" value="{{ $findLeitor->cidade}}">
          </div>
          <div class="col-1 mb-1">
            <label for="InputUF" class="form-label">Estado</label>
            <input type="text" class="form-control" id="InputUF" value="{{ $findLeitor->uf}}">
          </div>
          <div class="col-2 mb-1">
            <label for="InputCEP" class="form-label">CEP</label>
            <input type="text" class="form-control" id="InputCEP" value="{{ $findLeitor->cep}}">
          </div>
        </div>
        <div class="row">
          <div class="col-6 mb-1">
            <label for="InputDC" class="form-label">Data do registro</label>
            <input type="text" class="form-control" id="InputDC" value="{{ date_format($findLeitor->created_at, "d/m/Y") }}">
          </div>
          <div class="col-6 mb-2">
            <label for="InputDA" class="form-label">Data da atualização</label>
            <input type="text" class="form-control" id="InputDA" value="{{ date_format($findLeitor->updated_at, "d/m/Y") }}">
          </div>
        </div>
        <div class="row">
          <div class="col-12 d-flex justify-content-center mb-2">
            <a type="button" class="btn mb-2 btnPages" href="{{ route('leitor.index') }}" role="button">Fechar</a>
          </div>
        </div>
    </div>
    </form>
  </div>
</div>
<div class="col-1"></div>
</div>
@endsection
