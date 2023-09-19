@extends('index')

@section('content')
<div class="row mt-4">
  <div class="col-1"></div>
  <div class="col-10 px-5">
    <div class="container mt-2 mb-2 fundo">
      <form>
        <div class="pt-1 pb-1"></div>
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-1 pb-1 mb-2 border-bottom btnPages">
          <h3 class="th2">Empréstimo => Código: {{ $findEmprestimo->id}} - Leitor: {{ $findEmprestimo->leitor->nome}}</h3>
        </div>
        <div class="row">
          <div class="col-3 mb-1 d-flex align-items-center justify-content-center btnLogo" enctype="multipart/form-data">
            <img class="form-control-file" id="InputImagem" src=" {{ asset('storage/'.$findEmprestimo->leitor->imagem) }}" width=" 60" height="60">
          </div>
          <div class="col-2 mb-1">
            <label for="InputCodLeitor" class="form-label">Código Leitor</label>
            <input type="text" class="form-control" id="InputCodLeitor" value="{{ $findEmprestimo->leitor->id}}">
          </div>
          <div class="col-7 mb-1">
            <label for="InputNomeLeitor" class="form-label">Nome do Leitor</label>
            <input type="text" class="form-control" id="InputNomeLeitor" value="{{ $findEmprestimo->leitor->nome}}">
          </div>
        </div>
        <div class="row">
          <div class="col-2 mb-1">
            <label for="InputIdLivro" class="form-label">Código Livro</label>
            <input type="text" class="form-control" id="InputIdLivro" value="{{ $findEmprestimo->livro->id}}">
          </div>
          <div class="col-5 mb-1">
            <label for="InputLivro" class="form-label">Nome do Livro</label>
            <input type="text" class="form-control" id="InputLivro" value="{{ $findEmprestimo->livro->nome}}">
          </div>
          <div class="col-5 mb-1">
            <label for="InputLivroAutor" class="form-label">Autor do Livro</label>
            <input type="text" class="form-control" id="InputLivroAutor" value="{{ $findEmprestimo->livro->autor->nome}}">
          </div>
        </div>
        <div class="row">
          <div class="col-4 mb-1">
            <label for="InputDtInicio" class="form-label">Data do Empréstimo</label>
            <input type="date" class="form-control" id="InputDtInicio" value="{{ $findEmprestimo->dt_inicio }}">
          </div>
          <div class="col-4 mb-1">
            <label for="InputDtDevolucao" class="form-label">Data para Devolução</label>
            <input type="date" class="form-control" id="InputDtDevolucao" value="{{ $findEmprestimo->dt_devolucao }}">
          </div>
          <div class="col-4 mb-1">
            <label for="InputDtFinal" class="form-label">Data da Efetiva Devolução</label>
            <input type="date" class="form-control" id="InputDtFinal" value="{{ $findEmprestimo->dt_final }}">
          </div>
        </div>
        <div class="row">
          <div class="col-4 mb-1">
            <label for="InputStatus" class="form-label">Estado do Empréstimo</label>
            @if($findEmprestimo->status == 1)
            <input type="text" class="form-control" id="InputStatus" value="{{ "Em andamento"}}">
            @elseif($findEmprestimo->status == 2)
            <input style="color: red;" type="text" class="form-control" id="InputStatus" value="{{ "Vencido"}}">
            @elseif($findEmprestimo->status == 3)
            <input type="text" class="form-control" id="InputStatus" value="{{ "Encerrado"}}">
            @else
            <input type="text" class="form-control" id="InputStatus" value="{{ "Cancelado"}}">
            @endif
          </div>
          <div class="col-4 mb-1">
            <label for="InputDC" class="form-label">Data do registro</label>
            <input type="text" class="form-control" id="InputDC" value="{{ date_format($findEmprestimo->created_at, "d/m/Y" ) }}">
          </div>
          <div class="col-4 mb-1">
            <label for="InputDA" class="form-label">Data da atualização</label>
            <input type="text" class="form-control" id="InputDA" value="{{ date_format($findEmprestimo->updated_at, "d/m/Y" ) }}">
          </div>
        </div>
        <div class="row">
          <div class="col-12 d-flex justify-content-center mb-2 mt-2">
            <a type="button" class="btn mb-2 btnPages" href="{{ route('emprestimo.index') }}" role="button">Fechar visualização</a>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="col-1 px-5"></div>
</div>
@endsection
