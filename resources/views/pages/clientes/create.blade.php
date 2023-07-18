@extends('index')

@section('content')

<form class="form" method="POST" action="{{ route('cadastrar.cliente') }}">
  @csrf
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Cadastrar novo cliente</h1>
  </div>
  <div class="mb-3">
    <label class="form-label">Nome do cliente</label>
    <input type="text" value="{{ old('nome')}}" class="form-control @error('nome') is-invalid @enderror" name="nome">
    @if ($errors->has('nome'))
    <div class="invalid-feedback"> {{ $errors->first('nome')}}</div>
    @endif
  </div>
  <div class="mb-3">
    <label class="form-label">Email</label>
    <input type="text" value="{{ old('email')}}" class="form-control @error('email') is-invalid @enderror" name="email">
    @if ($errors->has('email'))
    <div class="invalid-feedback"> {{ $errors->first('email')}}</div>
    @endif
  </div>
  <div class="mb-3">
    <label class="form-label">Endereço</label>
    <input id="endereco" type="text" value="{{ old('endereco')}}" class="form-control @error('endereco') is-invalid @enderror" name="endereco">
    @if ($errors->has('endereco'))
    <div class="invalid-feedback"> {{ $errors->first('endereco')}}</div>
    @endif
  </div>
  <div class="mb-3">
    <label class="form-label">Complemento</label>
    <input id="complemento" type="text" value="{{ old('complemento')}}" class="form-control @error('complemento') is-invalid @enderror" name="complemento">
    @if ($errors->has('complemento'))
    <div class="invalid-feedback"> {{ $errors->first('complemento')}}</div>
    @endif
  </div>
  <div class="mb-3">
    <label class="form-label">Bairro</label>
    <input id="bairro" type="text" value="{{ old('bairro')}}" class="form-control @error('bairro') is-invalid @enderror" name="bairro">
    @if ($errors->has('bairro'))
    <div class="invalid-feedback"> {{ $errors->first('bairro')}}</div>
    @endif
  </div>
  <div class="mb-3">
    <label class="form-label">Cidade</label>
    <input id="cidade" type="text" value="{{ old('cidade')}}" class="form-control @error('cidade') is-invalid @enderror" name="cidade">
    @if ($errors->has('cidade'))
    <div class="invalid-feedback"> {{ $errors->first('cidade')}}</div>
    @endif
  </div>
  <div class="mb-3">
    <label class="form-label">UF</label>
    <input id="uf" type="text" value="{{ old('uf')}}" class="form-control @error('uf') is-invalid @enderror" name="uf">
    @if ($errors->has('uf'))
    <div class="invalid-feedback"> {{ $errors->first('uf')}}</div>
    @endif
  </div>
  <div class="mb-3">
    <label class="form-label">CEP</label>
    <input id="cep" type="text" value="{{ old('cep')}}" class="form-control @error('cep') is-invalid @enderror" name="cep">
    @if ($errors->has('cep'))
    <div class="invalid-feedback"> {{ $errors->first('cep')}}</div>
    @endif
  </div>



  <button type="submit" class="btn btn-success">Cadastrar</button>
</form>
@endsection