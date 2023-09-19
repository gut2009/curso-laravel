@extends('index')

@section('content')
<div class="row mt-4">
  <div class="col-1"></div>
  <div class="col-10">
    <div class="container mt-2 mb-2 fundo">
      <form>
        <div class="pt-1 pb-1"></div>
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-1 pb-1 mb-2 border-bottom btnPages">
          <h3 class="th2">Contato {{ $findContato->id}} do Leitor {{ $findContato->leitor_id}} / {{ $findContato->leitor->nome}}</h3>
        </div>
        <div class="row">
          <div class="row">
            <div class="col-3 mb-1 d-flex align-items-center justify-content-center btnLogo" enctype="multipart/form-data">
              <img class="form-control-file" id="InputImagem" src=" {{ asset('storage/'.$findContato->leitor->imagem) }}" width=" 60" height="60">
            </div>
            <div class="col-2 mb-1">
              <label for="InputId" class="form-label">Cód Contato</label>
              <input type="text" class="form-control" id="InputId" value="{{ $findContato->id}}">
            </div>
            <div class="col-1 mb-1">
              <label for="InputLeitorId" class="form-label">Cód</label>
              <input type="text" class="form-control" id="InputLeitorId" value="{{ $findContato->leitor_id}}">
            </div>
            <div class="col-6 mb-1">
              <label for="InputNome" class="form-label">Nome do Leitor</label>
              <input type="text" class="form-control" id="InputNome" value="{{ $findContato->leitor->nome}}">
            </div>
          </div>
          <div class="row">
            <div class="col-12 mb-1">
              <label for="InputMenssagem" class="form-label">Mensagem</label>
              <textarea class="form-control textarea" rows="4">{{ $findContato->mensagem}}</textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-4 mb-1">
              <label for="InputDC" class="form-label">Situação</label>
              @if($findContato->status == 1)
              <input type="text" class="form-control" id="InputStatus" value="{{ "Em andamento" }}">
              @elseif($findContato->status == 2)
              <input style="color: red;" type="text" class="form-control" id="InputStatus" value="{{ "Respondido "}}">
              @else
              <input type="text" class="form-control" id="InputStatus" value="{{ "Encerrado" }}">
              @endif
            </div>
            <div class="col-4 mb-1">
              <label for="InputDC" class="form-label">Data do registro</label>
              <input type="text" class="form-control" id="InputDC" value="{{ date_format($findContato->created_at, "d/m/Y") }}">
            </div>
            <div class="col-4 mb-1">
              <label for="InputDA" class="form-label">Data da atualização</label>
              <input type="text" class="form-control" id="InputDA" value="{{ date_format($findContato->updated_at, "d/m/Y") }}">
            </div>
          </div>
          <div class="row">
            <div class="col-12 d-flex justify-content-center mb-2 mt-2">
              <a type="button" class="btn mb-2 btnPages" href="{{ route('contato.index') }}" role="button">Fechar visualização</a>
            </div>
          </div>
      </form>
    </div>
  </div>
  <div class="col-1"></div>
</div>
@endsection
