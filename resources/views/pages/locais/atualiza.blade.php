@extends('index')

@section('content')
<div class="row mt-4">
  <div class="col-1"></div>
  <div class="col-10">
    <div class="container mt-2 mb-2 fundo">
      <form class="form" method="POST" {{ route('local.update', $findLocal->id) }}>
        @csrf
        @method('PUT')
        <div class="pt-1 pb-1"></div>
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-1 pb-1 mb-2 border-bottom btnPages">
          <h3 class="th2">Atualizar dados de: {{$findLocal->id}} / {{$findLocal->ambiente}} / {{$findLocal->estante}} / {{$findLocal->prateleira}}</h3>
        </div>
        <div class="row">
          <div class="col-4 mb-2">
            <label class="form-label">Localização da Estante</label>
            <input type="text" value=" {{ isset($findLocal->ambiente) ? $findLocal->ambiente : old('ambiente') }}" class="form-control @error('ambiente') is-invalid @enderror" name="ambiente">
            @if ($errors->has('ambiente'))
            <div class="invalid-feedback"> {{ $errors->first('ambiente') }}</div>
            @endif
          </div>
          <div class="col-4 mb-2">
            <label class="form-label">Estante</label>
            <input type="text" value=" {{ isset($findLocal->estante) ? $findLocal->estante : old('estante') }}" class="form-control @error('estante') is-invalid @enderror" name="estante">
            @if ($errors->has('estante'))
            <div class="invalid-feedback"> {{ $errors->first('estante') }}</div>
            @endif
          </div>
          <div class="col-4 mb-2">
            <label class="form-label">Prateleira</label>
            <input type="text" value=" {{ isset($findLocal->prateleira) ? $findLocal->prateleira : old('prateleira') }}" class="form-control @error('prateleira') is-invalid @enderror" name="prateleira">
            @if ($errors->has('prateleira'))
            <div class="invalid-feedback"> {{ $errors->first('prateleira') }}</div>
            @endif
          </div>
        </div>
        <div class="col-12 d-flex justify-content-center mt-2 mb-2">
          <button type="submit" class="btn mb-2 btnPages">Atualizar Local</button>
        </div>
      </form>
    </div>
    <div class="col-1"></div>
  </div>

  @endsection
