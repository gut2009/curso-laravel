@extends('index')

@section('content')
<div class="row mt-3">
  <div class="col-1"></div>
  <div class="col-10">
    <div class="container mt-2 mb-2 fundo">
      <form class="form" method="POST" action="{{ route('livro.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="pt-1 pb-1"></div>
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-1 pb-1 mb-2 border-bottom btnPages">
          <h2 class="th2">Cadastrar novo Livro</h2>
        </div>
        <div class="row">
          <div class="col-6">
            <label class="form-label">Nome do Livro</label>
            <input type="text" value="{{ old('nome')}}" class="form-control @error('nome') is-invalid @enderror" name="nome">
            @if ($errors->has('nome'))
            <div class="invalid-feedback"> {{ $errors->first('nome')}}</div>
            @endif
          </div>
          <div class="col-6">
            <label class="form-label">Complemento do Livro</label>
            <input type="text" value="{{ old('complemento')}}" class="form-control @error('complemento') is-invalid @enderror" name="complemento">
            @if ($errors->has('complemento'))
            <div class="invalid-feedback"> {{ $errors->first('complemento')}}</div>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-2">
            <label class="form-label">Editora</label>
            <select class="form-select" name="editora_id">
              <option selected>Clique para selecionar</option>
              @foreach ($findEditora as $editora)
              <option value="{{ $editora->id }}"> {{ $editora->id }} - {{ $editora->nome }} </option>
              @endforeach
            </select>
          </div>
          <div class="col-2">
            <label class="form-label">Autor</label>
            <select class="form-select" name="autor_id">
              <option selected>Clique para selecionar</option>
              @foreach ($findAutor as $autor)
              <option value="{{ $autor->id }}"> {{ $autor->id }} - {{ $autor->nome }} </option>
              @endforeach
            </select>
          </div>
          <div class="col-2">
            <label class="form-label">Autor Espiritual</label>
            <select class="form-select" name="espirito_id">
              <option selected>Clique para selecionar</option>
              @foreach ($findEspirito as $espirito)
              <option value="{{ $espirito->id }}"> {{ $espirito->id }} - {{ $espirito->nome }} </option>
              @endforeach
            </select>
          </div>
          <div class="col-6">
            <label class="form-label">Outros autores</label>
            <input type="text" value="{{ old('outros_autores')}}" class="form-control @error('outros_autores') is-invalid @enderror" name="outros_autores">
            @if ($errors->has('outros_autores'))
            <div class="invalid-feedback"> {{ $errors->first('outros_autores')}}</div>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-5">
            <label class="form-label">Tradutor</label>
            <input type="text" value="{{ old('tradutor')}}" class="form-control @error('tradutor') is-invalid @enderror" name="tradutor">
            @if ($errors->has('tradutor'))
            <div class="invalid-feedback"> {{ $errors->first('tradutor')}}</div>
            @endif
          </div>
          <div class="col-5">
            <label class="form-label">Capa</label>
            <input type="file" value="{{ old('imagem')}}" class="form-control-file @error('imagem') is-invalid @enderror" name="imagem">
            @if ($errors->has('imagem'))
            <div class="invalid-feedback"> {{ $errors->first('imagem')}}</div>
            @endif
          </div>
          <div class="col-1">
            <label class="form-label">Edição</label>
            <input type="text" value="{{ old('edicao')}}" class="form-control @error('edicao') is-invalid @enderror" name="edicao">
            @if ($errors->has('edicao'))
            <div class="invalid-feedback"> {{ $errors->first('edicao')}}</div>
            @endif
          </div>
          <div class="col-1">
            <label class="form-label">Paginas</label>
            <input type="text" value="{{ old('paginas')}}" class="form-control @error('paginas') is-invalid @enderror" name="paginas">
            @if ($errors->has('paginas'))
            <div class="invalid-feedback"> {{ $errors->first('paginas')}}</div>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <label class="form-label">Sinopse</label>
            <textarea type="text" value="{{ old('sinopse')}}" class="form-control textarea @error('sinopse') is-invalid @enderror" name="sinopse" placeholder="Escreva no máximo 1200 caracteres"></textarea>
            @if ($errors->has('sinopse'))
            <div class="invalid-feedback"> {{ $errors->first('sinopse')}}</div>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-3">
            <label class="form-label">Categoria</label>
            <select class="form-select" name="categoria_id">
              <option selected>Clique para selecionar</option>
              @foreach ($findCategoria as $categoria)
              <option value="{{ $categoria->id }}"> {{ $categoria->id }} - {{ $categoria->nome }} </option>
              @endforeach
            </select>
          </div>
          <div class="col-3">
            <label class="form-label">Assunto</label>
            <select class="form-select" name="assunto_id">
              <option selected>Clique para selecionar</option>
              @foreach ($findAssunto as $assunto)
              <option value="{{ $assunto->id }}"> {{ $assunto->id }} - {{ $assunto->nome }} / {{ $assunto->detalhe }} </option>
              @endforeach
            </select>
          </div>
          <div class="col-3">
            <label class="form-label">Tipo</label>
            <select class="form-select" name="tipo_id">
              <option selected>Clique para selecionar</option>
              @foreach ($findTipo as $tipo)
              <option value="{{ $tipo->id }}"> {{ $tipo->id }} - {{ $tipo->nome }} </option>
              @endforeach
            </select>
          </div>
          <div class="col-3">
            <label class="form-label">Local</label>
            <select class="form-select" name="local_id">
              <option selected>Clique para selecionar</option>
              @foreach ($findLocal as $local)
              <option value="{{ $local->id }}"> {{ $local->id }} - {{ $local->ambiente }}/{{ $local->estante }}/{{ $local->prateleira }} </option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-5">
            <label class="form-label">Cidade</label>
            <input type="text" value="{{ old('cidade')}}" class="form-control @error('cidade') is-invalid @enderror" name="cidade">
            @if ($errors->has('cidade'))
            <div class="invalid-feedback"> {{ $errors->first('cidade')}}</div>
            @endif
          </div>
          <div class="col-2">
            <label class="form-label">Estado</label>
            <input type="text" value="{{ old('uf')}}" class="form-control @error('uf') is-invalid @enderror" name="uf">
            @if ($errors->has('uf'))
            <div class="invalid-feedback"> {{ $errors->first('uf')}}</div>
            @endif
          </div>
          <div class="col-3">
            <label class="form-label">ISBN</label>
            <input type="text" value="{{ old('isbn')}}" class="form-control @error('isbn') is-invalid @enderror" name="isbn">
            @if ($errors->has('isbn'))
            <div class="invalid-feedback"> {{ $errors->first('isbn')}}</div>
            @endif
          </div>
          <div class="col-2">
            <label class="form-label">Existência</label>
            <select class="form-select" name="status">
              <option value="1" disable> Sim </option>
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
