@extends('index')

@section('content')
<div class="row mt-4">
  <div class="col-1"></div>
  <div class="col-10">
    <div class="container mt-2 mb-2 fundo">
      <form class="form" method="POST" action="{{ route('leitor.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="pt-1 pb-1"></div>
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-1 pb-1 mb-2 border-bottom btnPages">
          <h1 class="h2" style="color: white">Cadastrar novo leitor</h1>
        </div>

        <div class="row">
          <div class="col-4">
            <label class="form-label">Nome do leitor</label>
            <input type="text" value="{{ old('nome')}}" class="form-control @error('nome') is-invalid @enderror" name="nome">
            @if ($errors->has('nome'))
            <div class="invalid-feedback"> {{ $errors->first('nome')}}</div>
            @endif
          </div>
          <div class="col-2">
            <label class="form-label">Data Nascimento</label>
            <input type="date" value="{{ old('nascimento')}}" class="form-control @error('nome') is-invalid @enderror" name="nascimento">
            @if ($errors->has('nascimento'))
            <div class="invalid-feedback"> {{ $errors->first('nascimento')}}</div>
            @endif
          </div>
          <div class="col-4">
            <label class="form-label">Email</label>
            <input type="text" value="{{ old('email')}}" class="form-control @error('email') is-invalid @enderror" name="email">
            @if ($errors->has('email'))
            <div class="invalid-feedback"> {{ $errors->first('email')}}</div>
            @endif
          </div>
          <div class="col-2">
            <label for="imagem" class="form-label">Foto</label>
            <input type="file" value="{{ old('imagem')}}" class="form-control-file @error('imagem') is-invalid @enderror" name="imagem">
            @if ($errors->has('imagem'))
            <div class="invalid-feedback"> {{ $errors->first('imagem')}}</div>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-2">
            <label class="form-label">CEP</label>
            <input id="cep" type="text" value="{{ old('cep')}}" class="form-control @error('cep') is-invalid @enderror" name="cep">
            @if ($errors->has('cep'))
            <div class="invalid-feedback"> {{ $errors->first('cep')}}</div>
            @endif
          </div>
          <div class="col-5">
            <label class="form-label">Endereço</label>
            <input id="endereco" type="text" value="{{ old('endereco')}}" class="form-control @error('endereco') is-invalid @enderror" name="endereco">
            @if ($errors->has('endereco'))
            <div class="invalid-feedback"> {{ $errors->first('endereco')}}</div>
            @endif
          </div>
          <div class="col-5">
            <label class="form-label">Complemento</label>
            <input id="complemento" type="text" value="{{ old('complemento')}}" class="form-control @error('complemento') is-invalid @enderror" name="complemento">
            @if ($errors->has('complemento'))
            <div class="invalid-feedback"> {{ $errors->first('complemento')}}</div>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-5">
            <label class="form-label">Bairro</label>
            <input id="bairro" type="text" value="{{ old('bairro')}}" class="form-control @error('bairro') is-invalid @enderror" name="bairro">
            @if ($errors->has('bairro'))
            <div class="invalid-feedback"> {{ $errors->first('bairro')}}</div>
            @endif
          </div>
          <div class="col-6">
            <label class="form-label">Cidade</label>
            <input id="cidade" type="text" value="{{ old('cidade')}}" class="form-control @error('cidade') is-invalid @enderror" name="cidade">
            @if ($errors->has('cidade'))
            <div class="invalid-feedback"> {{ $errors->first('cidade')}}</div>
            @endif
          </div>
          <div class="col-1 mb-2">
            <label class="form-label">UF</label>
            <input id="uf" type="text" value="{{ old('uf')}}" class="form-control @error('uf') is-invalid @enderror" name="uf">
            @if ($errors->has('uf'))
            <div class="invalid-feedback"> {{ $errors->first('uf')}}</div>
            @endif
          </div>
        </div>
        <div class="col-12 d-flex justify-content-center mt-2 mb-2">
          <button type="submit" class="btn mb-2 btnPages">Cadastrar
          </button>
        </div>
      </form>
    </div>
  </div>
  <div class="col-1"></div>
</div>
@endsection
