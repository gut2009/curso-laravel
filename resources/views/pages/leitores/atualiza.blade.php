@extends('index')

@section('content')
<div class="row mt-4">
  <div class="col-1"></div>
  <div class="col-10">
    <div class="container mt-2 mb-2 fundo">
      <form class="form" method="POST" {{ route('leitor.update', $leitor->id) }} enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="pt-1 pb-1"></div>
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-1 pb-1 mb-2 border-bottom btnPages">
          <h1 class="h2">Atualizar: {{$leitor->id}} / {{$leitor->nome}}</h1>
        </div>
        <div class="row">
          <div class="col-5 mb-2">
            <label class="form-label">Nome</label>
            <input type="text" value=" {{ isset($leitor->nome) ? $leitor->nome : old('nome') }}" class="form-control @error('nome') is-invalid @enderror" name="nome">
            @if ($errors->has('nome'))
            <div class="invalid-feedback"> {{ $errors->first('nome') }}</div>
            @endif
          </div>
          <div class="col-4 mb-2">
            <label class="form-label">E-mail</label>
            <input type="email" value=" {{ isset($leitor->email) ? $leitor->email : old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email">
            @if ($errors->has('email'))
            <div class="invalid-feedback"> {{ $errors->first('email') }}</div>
            @endif
          </div>
          <div class="col-3 mb-2">
            <label for="imagem" class="form-label">Foto</label>
            <input type="file" value="{{ $leitor->imagem }}" class="form-control-file @error('imagem') is-invalid @enderror" name="imagem">
            @if ($errors->has('imagem'))
            <div class="invalid-feedback"> {{ $errors->first('imagem') }}</div>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-2 mb-2">
            <label class="form-label">CEP</label>
            <input id="cep" type="text" value=" {{ isset($leitor->cep) ? $leitor->cep : old('cep') }}" class="form-control @error('cep') is-invalid @enderror" name="cep">
            @if ($errors->has('cep'))
            <div class="invalid-feedback"> {{ $errors->first('cep') }}</div>
            @endif
          </div>
          <div class="col-5 mb-2">
            <label class="form-label">Endereco</label>
            <input id="endereco" type="text" value=" {{ isset($leitor->endereco) ? $leitor->endereco : old('endereco') }}" class="form-control @error('endereco') is-invalid @enderror" name="endereco">
            @if ($errors->has('endereco'))
            <div class="invalid-feedback"> {{ $errors->first('endereco') }}</div>
            @endif
          </div>
          <div class="col-5 mb-2">
            <label class="form-label">Complemento</label>
            <input id="complemento" type="text" value=" {{ isset($leitor->complemento) ? $leitor->complemento : old('complemento') }}" class="form-control @error('complemento') is-invalid @enderror" name="complemento">
            @if ($errors->has('complemento'))
            <div class="invalid-feedback"> {{ $errors->first('complemento') }}</div>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-4 mb-2">
            <label class="form-label">Bairro</label>
            <input id="bairro" type="text" value=" {{ isset($leitor->bairro) ? $leitor->bairro : old('bairro') }}" class="form-control @error('bairro') is-invalid @enderror" name="bairro">
            @if ($errors->has('bairro'))
            <div class="invalid-feedback"> {{ $errors->first('bairro') }}</div>
            @endif
          </div>
          <div class="col-4 mb-2">
            <label class="form-label">Cidade</label>
            <input id="cidade" type="text" value=" {{ isset($leitor->cidade) ? $leitor->cidade : old('cidade') }}" class="form-control @error('cidade') is-invalid @enderror" name="cidade">
            @if ($errors->has('cidade'))
            <div class="invalid-feedback"> {{ $errors->first('cidade') }}</div>
            @endif
          </div>
          <div class="col-4 mb-2">
            <label class="form-label">UF</label>
            <input id="uf" type="text" value=" {{ isset($leitor->uf) ? $leitor->uf : old('uf') }}" class="form-control @error('uf') is-invalid @enderror" name="uf">
            @if ($errors->has('uf'))
            <div class="invalid-feedback"> {{ $errors->first('uf') }}</div>
            @endif
          </div>
        </div>
        <div class="col-12 d-flex justify-content-center mt-2 mb-2">
          <button type="submit" class="btn mb-2 btnPages">Atualizar Leitor</button>
        </div>
      </form>
    </div>
  </div>
  <div class="col-1"></div>
</div>
@endsection
