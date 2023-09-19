@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Usuários</h1>
</div>
<div>
  <form action="{{ route('usuario.index') }}" method="get">
    <input type="text" name="pesquisar" placeholder="Digite o nome" />
    <button class="btn btn-success">Pesquisar</button>
    <a type="button" href="{{ route('usuario.store') }}" class=" btn btn-success float-end">Incluir Usuário</a>
  </form>
  <div class="table-responsive mt-4 small">
    @if ($user->isEmpty())
    <p> Não existe dados</p>
    @else
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>Cod</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Foto</th>
          <th>Criação</th>
          <th>Alteração</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach($user as $users)
        <tr>
          <td>{{ $users->id }}</td>
          <td>{{ $users->name }}</td>
          <td>{{ $users->email }}</td>
          <td><img src=" {{ asset('storage/'.$users->imagem) }}" width=" 40" height="40"></td>
          <td>{{ date_format($users->created_at, "d/m/Y") }}</td>
          <td>{{ date_format($users->updated_at, "d/m/Y") }}</td>
          <td>
            <a href="{{ route('usuario.edit', $users->id) }}" data-toggle="tooltip" data-placement="bottom" title="Atualizar Usuário"><img src="img/editar.png" width=" 30" height="30"> </a>

            <meta name='csrf-token' content=" {{ csrf_token() }}" />
            <input type="hidden" name="_method" value="DELETE">
            <a onclick="return confirm('Tem certeza que deseja deletar este registro? Ele não poderá mais ser recuperado')" href="{{ route('usuario.destroy', $users->id) }}" data-toggle="tooltip" data-placement="bottom" title="Excluir Item"><img src="img/excluir.png" width=" 30" height="30"></a>

            <a href="{{ route('usuario.show', $users->id) }}" data-toggle="tooltip" data-placement="bottom" title="Ver Usuário Compleo"><img src="img/ver.png" width=" 30" height="30"> </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
  </div>
</div>
@endsection
