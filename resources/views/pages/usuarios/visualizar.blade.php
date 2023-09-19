@extends('index')

@section('content')
<div class="row mt-4">
  <div class="col-1"></div>
  <div class="col-10">
    <div class="container mt-2 mb-2 fundo">
      <form enctype="multipart/form-data">
        <div class="pt-1 pb-1"></div>
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-1 pb-1 mb-2 border-bottom btnPages">
          <h2 class="th2">Usuário: {{ $user->id}} // {{ $user->name}}</h2>
        </div>
        <div class="row">
          <div class="col-3 mb-1 d-flex align-items-center justify-content-center btnLogo" enctype="multipart/form-data">
            <img class="form-control-file" id="InputImagem" src=" {{ asset('storage/'.$user->imagem) }}" width=" 60" height="60">
          </div>
          <div class="col-5 mb-1">
            <label for="InputNome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="InputNome" value="{{ $user->name}}">
          </div>
          <div class="col-4 mb-1">
            <label for="InputEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="InputEmail" value="{{ $user->email}}">
          </div>
        </div>
        <div class="row">
          <div class="col-6 mb-1">
            <label for="InputDA" class="form-label">Data da Criação</label>
            <input type="text" class="form-control" id="InputDA" value="{{ date_format($user->created_at, "d/m/Y") }}">
          </div>
          <div class="col-6 mb-1">
            <label for="InputDA" class="form-label">Data da atualização</label>
            <input type="text" class="form-control" id="InputDA" value="{{ date_format($user->updated_at, "d/m/Y") }}">
          </div>
        </div>
        <div class="row">
          <div class="col-12 d-flex justify-content-center mb-2">
            <a type="button" class="btn mb-2 btnPages" href="{{ route('usuario.index') }}" role="button">Fechar</a>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="col-1"></div>
</div>
@endsection
