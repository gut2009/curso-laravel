@extends('index')

@section('content')
<div class="row mt-4">
  <div class="col-1"></div>
  <div class="col-10">
    <div class="container mt-2 mb-2 fundo">
      <form>
        <div class="pt-1 pb-1"></div>
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-1 pb-1 mb-2 border-bottom btnPages">
          <h3 class="th2">Livro: {{ $findLivro->id}} // {{ $findLivro->nome}}</h3>
        </div>
        <div class="row">
          <div class="col-2 mb-1 d-flex align-items-center justify-content-center btnLogo" enctype="multipart/form-data">
            <img class="form-control-file" id="InputImagem" src=" {{ asset('storage/'.$findLivro->imagem) }}" width=" 80" height="80">
          </div>
          <div class="col-5 mb-1">
            <label for="InputNome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="InputNome" value="{{ $findLivro->nome}}">
          </div>
          <div class="col-5 mb-1">
            <label for="InputDetalhe" class="form-label">Complemento</label>
            <input type="text" class="form-control" id="InputDetalhe" value="{{ $findLivro->complemento}}">
          </div>
        </div>
        <div class="row">
          <div class="col-4 mb-1">
            <label for="InputAutor" class="form-label">Autor</label>
            <input type="text" class="form-control" id="InputAutor" value="{{ $findLivro->autor->nome}}">
          </div>
          <div class="col-4 mb-1">
            <label for="InputEspirito" class="form-label">Autor Espiritual</label>
            <input type="text" class="form-control" id="InputEspirito" value="{{ $findLivro->espirito->nome}}">
          </div>
          <div class="col-4 mb-1">
            <label for="InputOutros" class="form-label">Outros Autores</label>
            <input type="text" class="form-control" id="InputOutros" value="{{ $findLivro->outros_autores}}">
          </div>
        </div>
        <div class="row">
          <div class="col-5 mb-1">
            <label for="InputTradutor" class="form-label">Tradutor</label>
            <input type="text" class="form-control" id="InputTradutor" value="{{ $findLivro->tradutor}}">
          </div>
          <div class="col-5 mb-1">
            <label for="InputEditora" class="form-label">Editora</label>
            <input type="text" class="form-control" id="InputEditora" value="{{ $findLivro->editora->nome}}">
          </div>
          <div class="col-2 mb-1">
            <label for="InputSigla" class="form-label">Sigla Editora</label>
            <input type="text" class="form-control" id="InputSigla" value="{{ $findLivro->editora->sigla}}">
          </div>
        </div>
        <div class="row">
          <div class="col-12 mb-1">
            <label for="InputSinopse" class="form-label">Sinopse</label>
            <textarea class="form-control textarea" rows="6">{{ $findLivro->sinopse}}</textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-3 mb-1">
            <label for="InputCategoria" class="form-label">Categoria</label>
            <input type="text" class="form-control" id="InputCategoria" value="{{ $findLivro->categoria->nome}}">
          </div>
          <div class="col-3 mb-1">
            <label for="InputAssunto" class="form-label">Assunto</label>
            <input type="text" class="form-control" id="InputAssunto" value="{{ $findLivro->assunto->nome}}">
          </div>
          <div class="col-4 mb-1">
            <label for="InputAssunto" class="form-label">Detalhe</label>
            <input type="text" class="form-control" id="InputAssunto" value="{{ $findLivro->assunto->detalhe}}">
          </div>
          <div class="col-2 mb-1">
            <label for="InputTipo" class="form-label">Tipo</label>
            <input type="text" class="form-control" id="InputTipo" value="{{ $findLivro->tipo->nome}}">
          </div>
        </div>
        <div class="row">
          <div class="col-3 mb-1">
            <label for="InputLocal" class="form-label">Ambiente</label>
            <input type="text" class="form-control" id="InputLocal" value="{{ $findLivro->local->ambiente}}">
          </div>
          <div class="col-3 mb-1">
            <label for="InputLocal" class="form-label">Estante</label>
            <input type="text" class="form-control" id="InputLocal" value="{{ $findLivro->local->estante}}">
          </div>
          <div class="col-2 mb-1">
            <label for="InputLocal" class="form-label">Prateleira</label>
            <input type="text" class="form-control" id="InputLocal" value="{{ $findLivro->local->prateleira}}">
          </div>
          <div class="col-2 mb-1">
            <label for="InputEdicao" class="form-label">Edicao</label>
            <input type="text" class="form-control" id="InputEdicao" value="{{ $findLivro->edicao}}">
          </div>
          <div class="col-2 mb-1">
            <label for="InputPaginas" class="form-label">Páginas</label>
            <input type="text" class="form-control" id="InputPaginas" value="{{ $findLivro->paginas}}">
          </div>
        </div>
        <div class="row">
          <div class="col-6 mb-1">
            <label for="InputCidade" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="InputCidade" value="{{ $findLivro->cidade}}">
          </div>
          <div class="col-1 mb-1">
            <label for="InputUF" class="form-label">Estado</label>
            <input type="text" class="form-control" id="InputUF" value="{{ $findLivro->uf}}">
          </div>
          <div class="col-3 mb-1">
            <label for="InputIsbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="InputIsbn" value="{{ $findLivro->isbn}}">
          </div>
          <div class="col-2 mb-1">
            <label for="InputStatus" class="form-label">Existência</label>
            @if($findLivro->status == 1)
            <input type="text" class="form-control" id="InputStatus" value="{{ "Sim" }}">
            @elseif($findLivro->status == 2)
            <input type="text" class="form-control" id="InputStatus" value="{{ "emprestado "}}">
            @elseif($findLivro->status == 2)
            <input style="color: red;" type="text" class="form-control" id="InputStatus" value="{{ "Não temos "}}">
            @else
            <input style="color: red;" type="text" class="form-control" id="InputStatus" value="{{ "Perdido" }}">
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-6 mb-1">
            <label for="InputDC" class="form-label">Data do registro</label>
            <input type="text" class="form-control" id="InputDC" value="{{ date_format($findLivro->created_at, "d/m/Y") }}">
          </div>
          <div class="col-6 mb-1">
            <label for="InputDA" class="form-label">Data da atualização</label>
            <input type="text" class="form-control" id="InputDA" value="{{ date_format($findLivro->updated_at, "d/m/Y") }}">
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-12 d-flex justify-content-center mb-2">
            <a type="button" class="btn mb-2 btnPages" href="{{ route('livro.index') }}" role="button">Fechar</a>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="col-1"></div>
</div>
@endsection
