@extends('index')

@section('content')
<div class="row mt-4">
  <div class="col-1"></div>
  <div class="col-10">
    <div class="container mt-2 mb-2 fundo">
      <form class="form" method="POST" action="{{ route('contato.store') }}">
        @csrf
        <div class="pt-1 pb-1"></div>
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-1 pb-1 mb-2 border-bottom btnPages">
          <h2 class="th2">Cadastrar novo Contato</h2>
        </div>
        <div class="row">
          <div class="col-8">
            <label for="{{ $findLeitor }}" class="form-label">Nome do Leitor</label>
            <select class="form-select" name="leitor_id">
              <option selected>Clique para selecionar</option>
              @foreach ($findLeitor as $leitor)
              <option value="{{ $leitor->id }}"> {{ $leitor->id }} - {{ $leitor->nome }} </option>
              @endforeach
            </select>
          </div>
          <div class="col-4">
            <label class="form-label">Situação do Contato</label>
            <select class="form-select" name="status">
              <option value="1" disable> Em andamento </option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <label class="form-label">Mensagem do Leitor</label>
            <textarea type="text" value="{{ old('mensagem')}}" rows="3" class="form-control textarea @error('mensagem') is-invalid @enderror" name="mensagem" placeholder="Escreva no máximo 400 caracteres"></textarea>
          </div>
        </div>
        <div class="col-12 d-flex justify-content-center mt-2 mb-2">
          <button type="submit" class="btn mb-2 btnPages">Cadastrar</button>
          <a type="submit" class="btn mb-2 btnPages" href="{{ route('contato.index') }}">Voltar</a>
        </div>
      </form>
    </div>
  </div>
  <div class="col-1"></div>
</div>
@endsection
