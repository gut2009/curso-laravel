@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Livros</h1>
</div>
<div>
  <form action="{{ route('livro.index') }}" method="get">
    <input type="text" name="pesquisar" placeholder="Digite parte do nome" />
    <button class="btn btn-success">Pesquisar</button>
    <a type="button" href="{{ route('livro.store') }}" class=" btn btn-success float-end">Incluir Livro</a>
  </form>
  <div class="table-responsive mt-4 small">
    @if ($findLivro->isEmpty())
    <p> Não existe dados</p>
    @else
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>Cod</th>
          <th>Nome</th>
          <th>Autor</th>
          <th>Capa</th>
          <th>Existência</th>
          <th>Criação</th>
          <th>Atualização</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach($findLivro as $livro)
        <tr>
          <td>{{ $livro->id }}</td>
          <td>{{ $livro->nome }}</td>
          <td>{{ $livro->autor->nome }}</td>
          <td><img src=" {{ asset('storage/'.$livro->imagem) }}" width=" 40" height="40"></td>
          <td>
            @if($livro->status === 1)
            <span>Sim</span>
            @elseif($livro->status === 2)
            <span>Emprestado</span>
            @elseif($livro->status === 3)
            <span style="color: red;">Não temos</span>
            @elseif($livro->status === 4)
            <span style="color: red;">Perdido</span>
            @endif
          </td>
          <td>{{ date_format($livro->created_at, "d/m/Y") }}</td>
          <td>{{ date_format($livro->updated_at, "d/m/Y") }}</td>
          <td>
            <a href="{{ route('livro.edit', $livro->id) }}" data-toggle="tooltip" data-placement="bottom" title="Atualizar Item"><img src="img/editar.png" width=" 30" height="30"></a>

            <meta name='csrf-token' content=" {{ csrf_token() }}" />
            <input type="hidden" name="_method" value="DELETE">
            <a onclick="return confirm('Tem certeza que deseja deletar este registro? Ele não poderá mais ser recuperado')" href="{{ route('livro.destroy', $livro->id) }}" data-toggle="tooltip" data-placement="bottom" title="Excluir Item"><img src="img/excluir.png" id="passarMouse" width=" 30" height="30"></a>

            <a href="{{ route('livro.show', $livro->id) }}" data-toggle="tooltip" data-placement="bottom" title="Visualizar Item Completo"><img src="img/ver.png" id="passarMouse" width=" 25" height="25"></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
  </div>
</div>
@endsection
