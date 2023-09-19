@extends('index')

@section('content')
<div class="row mt-4">
  <div class="col-3"></div>
  <div class="col-6">
    <div class="container mt-2 mb-2 fundo">
      <form class="form" method="POST" {{ route('usuario.update', $user->id) }} enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="pt-1 pb-1"></div>
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-1 pb-1 mb-2 border-bottom btnPages">
          <div class="row text-center">
            <h3 class="th2">Atualizar dados de: {{$user->id}} <br> {{$user->name}}</h3>
          </div>
        </div>
        <div class="col align-self-center mb-2">
          <label class="form-label">Nome</label>
          <input type="text" value=" {{ isset($user->name) ? $user->name : old('name') }}" class="text-center form-control @error('name') is-invalid @enderror" name="name">
          @if ($errors->has('name'))
          <div class="invalid-feedback"> {{ $errors->first('name') }}</div>
          @endif
        </div>
        <div class="col align-self-center mb-2">
          <label for="imagem" class="form-label">Foto</label>
          <input type="file" value="{{ $user->imagem }}" class="form-control-file @error('imagem') is-invalid @enderror" name="imagem">
          @if ($errors->has('imagem'))
          <div class="invalid-feedback"> {{ $errors->first('imagem') }}</div>
          @endif
        </div>
        <div class="col align-self-center mb-2">
          <label class="form-label">Email</label>
          <input type="email" value=" {{ isset($user->email) ? $user->email : old('email') }}" class="text-center form-control @error('email') is-invalid @enderror" name="email">
          @if ($errors->has('email'))
          <div class="invalid-feedback"> {{ $errors->first('email') }}</div>
          @endif
        </div>
        <div class="col align-self-center mb-2">
          <label class="form-label">Nova senha</label>
          <input type="password" class="text-center form-control @error('password') is-invalid @enderror" name="password">
          @if ($errors->has('password'))
          <div class="invalid-feedback"> {{ $errors->first('password') }}</div>
          @endif
        </div>
        <div class="col-12 d-flex justify-content-center mb-2">
          <button type="submit" class="btn mt-3 mb-1 btnPages"> Gravar </button>
        </div>
      </form>
    </div>
    <div class="col-3"></div>
  </div>
  @endsection
