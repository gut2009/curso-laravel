@extends('index')

@section('content')
<div class="row mt-4">
  <div class="col-1"></div>
  <div class="col-10">
    <div class="container mt-2 mb-2 fundo">
      <form class="form" method="POST" {{ route('editora.update', $editora->id) }} enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="pt-1 pb-1"></div>
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-1 pb-1 mb-2 border-bottom btnPages">
          <h3 class="th2">Atualizar dados de: {{ $editora->id }} / {{ $editora->nome }}</h3>
        </div>
        <div class="row">
          <div class="col-6 mb-2">
            <label class="form-label">Nome</label>
            <input type="text" value=" {{ isset($editora->nome) ? $editora->nome : old('nome') }}" class="form-control @error('nome') is-invalid @enderror" name="nome">
            @if ($errors->has('nome'))
            <div class="invalid-feedback"> {{ $errors->first('nome') }}</div>
            @endif
          </div>
          <div class="col-2 mb-2">
            <label class="form-label">Sigla</label>
            <input type="text" value=" {{ isset($editora->sigla) ? $editora->sigla : old('sigla') }}" class="form-control @error('sigla') is-invalid @enderror" name="sigla">
            @if ($errors->has('sigla'))
            <div class="invalid-feedback"> {{ $errors->first('sigla') }}</div>
            @endif
          </div>
          <div class="col-4 mb-2">
            <label class="form-label">Logo Tipo</label>
            <label for="imagem" class="form-label">Foto</label>
            <input type="file" value="{{ $editora->imagem }}" class="form-control-file @error('imagem') is-invalid @enderror" name="imagem">
            @if ($errors->has('imagem'))
            <div class="invalid-feedback"> {{ $errors->first('imagem') }}</div>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-6 mb-2">
            <label class="form-label">Cidade</label>
            <input type="text" value=" {{ isset($editora->cidade) ? $editora->cidade : old('cidade') }}" class="form-control @error('cidade') is-invalid @enderror" name="cidade">
            @if ($errors->has('cidade'))
            <div class="invalid-feedback"> {{ $errors->first('cidade') }}</div>
            @endif
          </div>
          <div class="col-2 mb-2">
            <label class="form-label">Estado</label>
            <input type="text" value=" {{ isset($editora->uf) ? $editora->uf : old('uf') }}" class="form-control @error('uf') is-invalid @enderror" name="uf">
            @if ($errors->has('uf'))
            <div class="invalid-feedback"> {{ $errors->first('uf') }}</div>
            @endif
          </div>
          <div class="col-4 mb-2">
            <label class="form-label">Pais</label>
            <input type="text" value=" {{ isset($editora->pais) ? $editora->pais : old('pais') }}" class="form-control @error('pais') is-invalid @enderror" name="pais">
            @if ($errors->has('pais'))
            <div class="invalid-feedback"> {{ $errors->first('pais') }}</div>
            @endif
          </div>
        </div>
        <div class="col-12 d-flex justify-content-center mt-2 mb-2">
          <button type="submit" class="btn mb-2 btnPages">Atualizar Editora</button>
        </div>
      </form>
    </div>
    <div class="col-1"></div>
  </div>
  @endsection
