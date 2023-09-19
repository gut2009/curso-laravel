@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Editoras</h1>
</div>
<div>
  <form action="{{ route('editora.index') }}" method="get" class="delete-form">
    <input type="text" name="pesquisar" placeholder="Digite parte do nome" />
    <button class="btn btn-success">Pesquisar</button>
    <a type="button" href="{{ route('editora.store') }}" class=" btn btn-success float-end">Incluir Editora</a>
  </form>
  <div class="table-responsive mt-4 small">
    @if ($findEditora->isEmpty())
    <p> Não existe dados</p>
    @else
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>Cod</th>
          <th>Nome</th>
          <th>Sigla</th>
          <th>Logo</th>
          <th>Cidade</th>
          <th>UF</th>
          <th>Pais</th>
          <th>Criação</th>
          <th>Atualização</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach($findEditora as $editora)
        <tr>
          <td>{{ $editora->id }}</td>
          <td>{{ $editora->nome }}</td>
          <td>{{ $editora->sigla }}</td>
          <td><img src=" {{ asset('storage/'.$editora->imagem) }}" width=" 40" height="40"></td>
          <td>{{ $editora->cidade }}</td>
          <td>{{ $editora->uf }}</td>
          <td>{{ $editora->pais }}</td>
          <td>{{ date_format($editora->created_at, "d/m/Y") }}</td>
          <td>{{ date_format($editora->updated_at, "d/m/Y") }}</td>
          <td>
            <a href="{{ route('editora.edit', $editora->id) }}" data-toggle="tooltip" data-placement="bottom" title="Atualizar Item"><img src="img/editar.png" width=" 27" height="27"></a>

            <meta name='csrf-token' content=" {{ csrf_token() }}" />
            <input type="hidden" name="_method" value="DELETE">
            <a onclick="return confirm('Tem certeza que deseja deletar este registro? Ele não poderá mais ser recuperado')" href="{{ route('editora.destroy', $editora->id) }}" data-toggle="tooltip" data-placement="bottom" title="Excluir Item"><img src="img/excluir.png" width=" 30" height="30"></a>

            <a href="{{ route('editora.show', $editora->id) }}" data-toggle="tooltip" data-placement="bottom" title="Visualizar Item Completo"><img src="img/ver.png" id="passarMouse" width=" 25" height="25"></a>

          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
  </div>
</div>
@endsection
