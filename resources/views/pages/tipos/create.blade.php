@extends('index')

@section('content')
<div class="row mt-4">
  <div class="col-1"></div>
  <div class="col-10">
    <div class="container mt-2 mb-2 fundo">
      <form class="form" method="POST" action="{{ route('tipo.store') }}">
        @csrf
        <div class="pt-1 pb-1"></div>
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-1 pb-1 mb-2 border-bottom btnPages">
          <h2 class="th2">Cadastrar Tipo</h2>
        </div>
        <div class="row">
          <div class="col-12">
            <label class="form-label">Nome do Tipo</label>
            <input type="text" value="{{ old('nome')}}" class="form-control @error('nome') is-invalid @enderror" name="nome">
            @if ($errors->has('nome'))
            <div class="invalid-feedback"> {{ $errors->first('nome')}}</div>
            @endif
          </div>
        </div>
        <div class="col-12 d-flex justify-content-center mt-2 mb-2">
          <button type="submit" class="btn mb-2 btnPages">Cadastrar</button>
        </div>
      </form>
    </div>
  </div>
  <div class="col-1"></div>
</div>
@endsection
