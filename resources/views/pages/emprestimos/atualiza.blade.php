@extends('index')

@section('content')
<div class="row mt-4">
  <div class="col-1"></div>
  <div class="col-10">
    <div class="container mt-2 mb-2 fundo">
      <form class="form" method="POST" {{ route('emprestimo.update', $findEmprestimo->id) }}>
        @csrf
        @method('PUT')
        <div class="pt-1 pb-1"></div>
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-1 pb-1 mb-2 border-bottom btnPages">
          <div class="row">
            <div class="row text-center">
              <h3 class="th2">Atualizar Empréstimo {{$findEmprestimo->id}}</h3>
            </div>
            <div class="row text-center">
              <h4>Leitor: {{$findEmprestimo->leitor_id }} - {{$findEmprestimo->leitor->nome}}</h4>
            </div>
            <div class="row text-center">
              <h4>Livro: {{$findEmprestimo->livro_id }} - {{$findEmprestimo->livro->nome}}</h4>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-3 mb-2">
            <label class="form-label">Cód Empre</label>
            <input type="text" value=" {{ isset($findEmprestimo->id) ? $findEmprestimo->id : old('id') }}" class="form-control" name="id">
          </div>
          <div class="col-3 mb-2">
            <label for="InputDtInicio" class="form-label">Data do Empréstimo</label>
            <input type="date" class="form-control" id="InputDtInicio" value="{{ $findEmprestimo->dt_inicio }}">
          </div>
          <div class="col-3 mb-2">
            <label class="form-label">Data para devolução</label>
            <input type="date" value="{{ isset($findEmprestimo->dt_devolucao) ? $findEmprestimo->dt_devolucao : old('dt_devolucao') }}" class="form-control @error('dt_devolucao') is-invalid @enderror" name="dt_devolucao">
            @if ($errors->has('dt_devolucao'))
            <div class="invalid-feedback"> {{ $errors->first('dt_devolucao')}}</div>
            @endif
          </div>
          <div class="col-3 mb-2">
            <label class="form-label">Situação do Empréstimo</label>
            <select class="form-select" name="status">
              <option selected value="1"> Em andamento </option>
              <option value="2"> Vencido </option>
              <option value="3"> Encerrado </option>
              <option value="4"> Cancelado </option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-3 mb-2">
            <label class="form-label">Cód Leitor</label>
            <input type="text" value=" {{ isset($findEmprestimo->leitor->id) ? $findEmprestimo->leitor->id : old('leitor_id') }}" class="form-control" name="leitor_id">
          </div>
          <div class="col-3 mb-2">
            <label class="form-label">Cód Livro</label>
            <input type="text" value=" {{ isset($findEmprestimo->livro->id) ? $findEmprestimo->livro->id : old('livro_id') }}" class="form-control" name="livro_id">
          </div>
          <div class="col-6 mb-2">
            <label class="form-label">Data Efetiva da Devolução</label>
            <input type="date" value="{{ isset($findEmprestimo->dt_final) ? $findEmprestimo->dt_final : old('dt_final') }}" class="form-control @error('dt_final') is-invalid @enderror" name="dt_final">
            @if ($errors->has('dt_final'))
            <div class="invalid-feedback"> {{ $errors->first('dt_final') }}</div>
            @endif
          </div>
        </div>
        <div class="col-12 d-flex justify-content-center mt-2 mb-2">
          <button type="submit" class="btn mb-2 btnPages">Atualizar Empréstimo</button>
        </div>
      </form>
    </div>
  </div>
  <div class="col-1"></div>
</div>
@endsection
