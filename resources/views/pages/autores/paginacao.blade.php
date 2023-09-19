@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Autores</h1>
</div>
<div>
  <form action="{{ route('autor.index') }}" method="get">
    <input type="text" name="pesquisar" placeholder="Digite o nome" />
    <button class="btn btn-success">Pesquisar</button>
    <a type="button" href="{{ route('autor.store') }}" class=" btn btn-success float-end">Incluir Autor</a>
  </form>
  <div class="table-responsive mt-4 small">
    @if ($findAutor->isEmpty())
    <p> Não existe dados</p>
    @else
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>Cod</th>
          <th>Nome</th>
          <th>Nacionalidade</th>
          <th>Criação</th>
          <th>Atualização</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach($findAutor as $autor)
        <tr>
          <td>{{ $autor->id }}</td>
          <td>{{ $autor->nome }}</td>
          <td>{{ $autor->nacionalidade }}</td>
          <td>{{ date_format($autor->created_at, "d/m/Y") }}</td>
          <td>{{ date_format($autor->updated_at, "d/m/Y") }}</td>
          <td>
            <a href="{{ route('autor.update', $autor->id) }}" data-toggle="tooltip" data-placement="bottom" title="Atualizar Item"><img src="img/editar.png" width=" 30" height="30"></a>

            <meta name='csrf-token' content=" {{ csrf_token() }}" />
            <input type="hidden" name="_method" value="DELETE">
            <a onclick="return confirm('Tem certeza que deseja deletar este registro? Ele não poderá mais ser recuperado')" href="{{ route('autor.destroy', $autor->id) }}" data-toggle="tooltip" data-placement="bottom" title="Excluir Item"><img src="img/excluir.png" width=" 30" height="30"></a>

            <a href="{{ route('autor.show', $autor->id) }}" data-toggle="tooltip" data-placement="bottom" title="Visualizar Item Completo"><img src="img/ver.png" id="passarMouse" width=" 25" height="25"></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
  </div>
</div>
@endsection
