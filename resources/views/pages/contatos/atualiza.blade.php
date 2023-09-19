@extends('index')

@section('content')
<div class="row mt-4">
  <div class="col-1"></div>
  <div class="col-10">
    <div class="container mt-2 mb-2 fundo">
      <form class="form" method="POST" {{ route('contato.edit', $findContato->id) }}>
        @csrf
        @method('PUT')
        <div class="pt-1 pb-1"></div>
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-1 pb-1 mb-2 border-bottom btnPages">
          <h3 class="th2">Atualizar Contato {{$findContato->id}} do Leitor: {{$findContato->leitor->nome}}</h3>
        </div>
        <div class="row">
          <div class="col-6 mb-2">
            <label for="{{ $findLeitor }}" class="form-label">Nome do Leitor</label>
            <select class="form-select" name="leitor_id">
              <option selected>Clique para selecionar</option>
              @foreach ($findLeitor as $leitor)
              <option value="{{ $leitor->id }}"> {{ $leitor->id }} - {{ $leitor->nome }} </option>
              @endforeach
            </select>
          </div>
          <div class="col-6">
            <label class="form-label">Situação do Contato</label>
            <select class="form-select" name="status">
              <option value="1"> Em andamento </option>
              <option value="2"> Respondido </option>
              <option value="3"> Encerrado </option>
            </select>
          </div>
          <div class="row">
            <div class="col-12 mb-2">
              <label class="form-label">Mensagem do Leitor</label>
              <input type="textarea" value=" {{ isset($findContato->mensagem) ? $findContato->mensagem : old('mensagem') }}" class="form-control textarea @error('mensagem') is-invalid @enderror" name="mensagem">
              @if ($errors->has('mensagem'))
              <div class="invalid-feedback"> {{ $errors->first('mensagem') }}</div>
              @endif
            </div>
          </div>
          <div class="col-12 d-flex justify-content-center mt-2 mb-2">
            <button type="submit" class="btn mb-2 btnPages">Atualizar Mensagem</button>
          </div>
      </form>
    </div>
    <div class="col-1"></div>
  </div>
</div>
@endsection
