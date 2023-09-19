@extends('index')

@section('content')

<div class="row mt-4">
  <div class="col-1"></div>
  <div class="col-10">
    <div class="container mt-2 mb-2 fundo">
      <form class="form" method="POST" action="{{ route('emprestimo.store') }}">
        @csrf
        <div class="pt-1 pb-1"></div>
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-1 pb-1 mb-2 border-bottom btnPages">
          <h2 class="th2">Cadastrar novo Empréstimo</h2>
        </div>
        <div class="row">
          <div class="col-4">
            <label class=" form-label">Código do Leitor</label>
            <select class="form-select" name="leitor_id">
              <option selected>Clique para selecionar</option>
              @foreach ($findLeitor as $leitor)
              <option value="{{ $leitor->id }}"> {{ $leitor->id }} - {{ $leitor->nome }} </option>
              @endforeach
            </select>
          </div>
          <div class="col-4">
            <label class="form-label">Código do Livro</label>
            <select class="form-select" name="livro_id">
              <option selected>Clique para selecionar</option>
              @foreach ($findLivro as $livro)
              <option value="{{ $livro->id }}"> {{ $livro->id }} - {{ $livro->nome }} </option>
              @endforeach
            </select>

          </div>
          <div class="col-4">
            <label class="form-label">Data do Empréstimo</label>
            <input type="date" value="{{ old('dt_inicio')}}" class="form-control @error('dt_inicio') is-invalid @enderror" name="dt_inicio">
            @if ($errors->has('dt_inicio'))
            <div class="invalid-feedback"> {{ $errors->first('dt_inicio')}}</div>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <label class="form-label">Data para devolução</label>
            <input type="date" value="{{ old('dt_devolucao')}}" class="form-control @error('dt_devolucao') is-invalid @enderror" name="dt_devolucao">
            @if ($errors->has('dt_devolucao'))
            <div class="invalid-feedback"> {{ $errors->first('dt_devolucao')}}</div>
            @endif
          </div>
          <div class="col-4">
            <label class="form-label">Situação do Empréstimo</label>
            <select class="form-select" name="status">
              <option selected>Clique para selecionar</option>
              <option value="1"> Em andamento </option>
              <option value="2"> Vencido </option>
              <option value="3"> Encerrado </option>
              <option value="4"> Cancelado </option>
            </select>
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
