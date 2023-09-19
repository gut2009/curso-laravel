@extends('index')

@section('content')
<div class="row mt-4">
  <div class="col-1"></div>
  <div class="col-10">
    <div class="container mt-2 mb-2 fundo">
      <form class="form" method="POST" {{ route('livro.edit', $findLivro->id) }} enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="pt-1 pb-1"></div>
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-1 pb-1 mb-2 border-bottom btnPages">
          <h2 class="th2">Atualizar dados do Livro: {{$findLivro->id}} / {{$findLivro->nome}}</h2>
        </div>
        <div class="row">
          <div class="col-6 mb-2">
            <label class="form-label">Nome</label>
            <input type="text" value=" {{ isset($findLivro->nome) ? $findLivro->nome : old('nome') }}" class="form-control @error('nome') is-invalid @enderror" name="nome">
            @if ($errors->has('nome'))
            <div class="invalid-feedback"> {{ $errors->first('nome') }}</div>
            @endif
          </div>
          <div class="col-6 mb-2">
            <label class="form-label">Complemento</label>
            <input type="text" value=" {{ isset($findLivro->complemento) ? $findLivro->complemento : old('complemento') }}" class="form-control @error('complemento') is-invalid @enderror" name="complemento">
            @if ($errors->has('complemento'))
            <div class="invalid-feedback"> {{ $errors->first('complemento') }}</div>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-6 mb-1">
            <label class="form-label">Editora</label>
            <input type="text" class="form-control" value="{{ $findLivro->editora->nome}}" disabled>
          </div>
          <div class="col-6 mb-2">
            <label class="form-label">Atualizar Editora</label>
            <select class="form-select" name="editora_id">
              <option selected>Clique para selecionar</option>
              @foreach ($findEditora as $editora)
              <option value="{{ $editora->id }}"> {{ $editora->nome }} </option>
              @if ($errors->has('editora_id'))
              <div class="invalid-feedback"> {{ $errors->first('editora_id') }}</div>
              @endif
              @endforeach
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-6 mb-1">
            <label class="form-label">Autor</label>
            <input type="text" class="form-control" value="{{ $findLivro->autor->nome}}" disabled>
          </div>
          <div class="col-6 mb-2">
            <label class="form-label">Atualizar Autor</label>
            <select class="form-select" name="autor_id">
              <option selected>Clique para selecionar</option>
              @foreach ($findAutor as $autor)
              <option value="{{ $autor->id }}"> {{ $autor->nome }} </option>
              @if ($errors->has('autor_id'))
              <div class="invalid-feedback"> {{ $errors->first('autor_id') }}</div>
              @endif
              @endforeach
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-6 mb-1">
            <label class="form-label">Autor Espiritual</label>
            <input type="text" class="form-control" value="{{ $findLivro->espirito->nome}}" disabled>
          </div>
          <div class="col-6 mb-2">
            <label class="form-label">Atualizar Autor Espiritual</label>
            <select class="form-select" name="espirito_id">
              <option selected>Clique para selecionar</option>
              @foreach ($findEspirito as $espirito)
              <option value="{{ $espirito->id }}"> {{ $espirito->nome }} </option>
              @if ($errors->has('espirito_id'))
              <div class="invalid-feedback"> {{ $errors->first('espirito_id') }}</div>
              @endif
              @endforeach
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-3 mb-2">
            <label class="form-label">Outros Autores</label>
            <input type="text" value=" {{ isset($findLivro->outros_autores) ? $findLivro->outros_autores : old('outros_autores') }}" class="form-control @error('outros_autores') is-invalid @enderror" name="outros_autores">
            @if ($errors->has('outros_autores'))
            <div class="invalid-feedback"> {{ $errors->first('outros_autores') }}</div>
            @endif
          </div>
          <div class="col-3 mb-2">
            <label class="form-label">Tradutor</label>
            <input type="text" value=" {{ isset($findLivro->tradutor) ? $findLivro->tradutor : old('tradutor') }}" class="form-control @error('tradutor') is-invalid @enderror" name="tradutor">
            @if ($errors->has('tradutor'))
            <div class="invalid-feedback"> {{ $errors->first('tradutor') }}</div>
            @endif
          </div>
          <div class="col-3 mb-2">
            <label class="form-label">Capa</label>
            <input type="file" value=" {{ isset($findLivro->imagem) ? $findLivro->imagem : old('imagem') }}" class="form-control-file @error('imagem') is-invalid @enderror" name="imagem">
            @if ($errors->has('imagem'))
            <div class="invalid-feedback"> {{ $errors->first('imagem') }}</div>
            @endif
          </div>
          <div class="col-1 mb-2">
            <label class="form-label">Edição</label>
            <input type="text" value=" {{ isset($findLivro->edicao) ? $findLivro->edicao : old('edicao') }}" class="form-control @error('edicao') is-invalid @enderror" name="edicao">
            @if ($errors->has('edicao'))
            <div class="invalid-feedback"> {{ $errors->first('edicao') }}</div>
            @endif
          </div>
          <div class="col-2 mb-2">
            <label class="form-label">Paginas</label>
            <input type="text" value=" {{ isset($findLivro->paginas) ? $findLivro->paginas : old('paginas') }}" class="form-control @error('paginas') is-invalid @enderror" name="paginas">
            @if ($errors->has('paginas'))
            <div class="invalid-feedback"> {{ $errors->first('paginas') }}</div>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-12 mb-2">
            <label class="form-label">Sinopse</label>
            <input type="text" value=" {{ isset($findLivro->sinopse) ? $findLivro->sinopse : old('sinopse') }}" class="form-control @error('sinopse') is-invalid @enderror" name="sinopse">
            @if ($errors->has('sinopse'))
            <div class="invalid-feedback"> {{ $errors->first('sinopse') }}</div>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-4 mb-1">
            <label class="form-label">Categoria</label>
            <input type="text" class="form-control" value="{{ $findLivro->categoria->nome}}" disabled>
          </div>
          <div class="col-4 mb-2">
            <label class="form-label">Atualizar Categoria</label>
            <select class="form-select" name="categoria_id">
              <option selected>Clique para selecionar</option>
              @foreach ($findCategoria as $categoria)
              <option value="{{ $categoria->id }}"> {{ $categoria->nome }} </option>
              @if ($errors->has('categoria_id'))
              <div class="invalid-feedback"> {{ $errors->first('categoria_id') }}</div>
              @endif
              @endforeach
            </select>
          </div>
          <div class="col-2 mb-1">
            <label class="form-label">Tipo</label>
            <input type="text" class="form-control" value="{{ $findLivro->tipo->nome}}" disabled>
          </div>
          <div class="col-2 mb-2">
            <label class="form-label">AtualizarTipo</label>
            <select class="form-select" name="tipo_id">
              <option selected>Clique para selecionar</option>
              @foreach ($findTipo as $tipo)
              <option value="{{ $tipo->id }}"> {{ $tipo->nome }} </option>
              @if ($errors->has('tipo_id'))
              <div class="invalid-feedback"> {{ $errors->first('tipo_id') }}</div>
              @endif
              @endforeach
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-6 mb-1">
            <label class="form-label">Assunto / detalhe</label>
            <input type="text" class="form-control" value="{{ $findLivro->assunto->nome}}/{{ $findLivro->assunto->detalhe}}" disabled>
          </div>
          <div class="col-6 mb-2">
            <label class="form-label">Atualizar Assunto</label>
            <select class="form-select" name="assunto_id">
              <option selected>Clique para selecionar</option>
              @foreach ($findAssunto as $assunto)
              <option value="{{ $assunto->id }}"> {{ $assunto->nome }} / {{ $assunto->detalhe }} </option>
              @if ($errors->has('assunto_id'))
              <div class="invalid-feedback"> {{ $errors->first('assunto_id') }}</div>
              @endif
              @endforeach
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-6 mb-1">
            <label class="form-label">Local</label>
            <input type="text" class="form-control" value="{{ $findLivro->local->ambiente}} / {{ $findLivro->local->estante }} / {{ $findLivro->local->prateleira }}" disabled>
          </div>
          <div class="col-6 mb-1">
            <label class="form-label">Atualizar Local</label>
            <select class="form-select" name="local_id">
              <option selected>Clique para selecionar</option>
              @foreach ($findLocal as $local)
              <option value="{{ $local->id }}"> {{ $local->ambiente }} / {{ $local->estante }} / {{ $local->prateleira }} </option>
              @if ($errors->has('local_id'))
              <div class="invalid-feedback"> {{ $errors->first('local_id') }}</div>
              @endif
              @endforeach
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-5 mb-2">
            <label class="form-label">Cidade</label>
            <input type="text" value=" {{ isset($findLivro->cidade) ? $findLivro->cidade : old('cidade') }}" class="form-control @error('cidade') is-invalid @enderror" name="cidade">
            @if ($errors->has('cidade'))
            <div class="invalid-feedback"> {{ $errors->first('cidade') }}</div>
            @endif
          </div>
          <div class="col-2 mb-2">
            <label class="form-label">Estado</label>
            <input type="text" value=" {{ isset($findLivro->uf) ? $findLivro->uf : old('uf') }}" class="form-control @error('uf') is-invalid @enderror" name="uf">
            @if ($errors->has('uf'))
            <div class="invalid-feedback"> {{ $errors->first('uf') }}</div>
            @endif
          </div>
          <div class="col-3 mb-2">
            <label class="form-label">ISBN</label>
            <input type="text" value=" {{ isset($findLivro->status) ? $findLivro->status : old('status') }}" class="form-control @error('status') is-invalid @enderror" name="status">
            @if ($errors->has('status'))
            <div class="invalid-feedback"> {{ $errors->first('status') }}</div>
            @endif
          </div>
          <div class="col-2 mb-2">
            <label class="form-label">Existência</label>
            <select class="form-select" name="status">
              <option value="1"> Sim </option>
              <option value="2"> Emprestado </option>
              <option value="3"> Não Temos </option>
              <option value="4"> Perdido </option>
            </select>
          </div>
        </div>
        <div class="col-12 d-flex justify-content-center mt-2 mb-2">
          <button type="submit" class="btn mb-2 btnPages">Atualizar Livro</button>
        </div>
      </form>
    </div>
    <div class="col-1"></div>
  </div>
  @endsection
