@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Contatos</h1>
</div>
<div>
  <form action="{{ route('contato.index') }}" method="get">
    <input type="text" name="pesquisar" placeholder="Digite parte do nome" />
    <button class="btn btn-success">Pesquisar</button>
    <a type="button" href="{{ route('contato.store') }}" class=" btn btn-success float-end">Incluir Contato</a>
  </form>
  <div class="table-responsive mt-4 small">
    @if ($findContato->isEmpty())
    <p> Não existe dados</p>
    @else
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>Cód</th>
          <th>Nome do Leitor</th>
          <th>Foto</th>
          <th>Situação</th>
          <th>Mensagem</th>
          <th>Criação</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach($findContato as $contato)
        <tr>
          <td>{{ $contato->id }}</td>
          <td>{{ $contato->leitor->nome }}</td>
          <td><img src="{{ asset('storage/'.$contato->leitor->imagem) }}" width=" 40" height="40"></td>

          <td>
            @if($contato->status === 1)
            <span>Em andamento</span>
            @elseif($contato->status === 2)
            <span style="color: red;">Respondido</span>
            @elseif($contato->status === 3)
            <span>Encerrado</span>
            @endif
          </td>
          <td class="w-auto p-3 col-xs-6 col-sm-6 col-md-6 col-lg-6" style="max-width: 60px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $contato->mensagem }}</td>
          <td class="col-xs-1 col-sm-1 col-md-1 col-lg-1">{{ date_format($contato->created_at, "d/m/Y") }}</td>

          <td class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <a href="{{ route('contato.edit', $contato->id) }}" data-toggle="tooltip" data-placement="bottom" title="Atualizar Item"><img src="img/editar.png" width=" 30" height="30"></a>

            <meta name='csrf-token' content=" {{ csrf_token() }}" />
            <input type="hidden" name="_method" value="DELETE">
            <a onclick="return confirm('Tem certeza que deseja deletar este registro? Ele não poderá mais ser recuperado')" href="{{ route('contato.destroy', $contato->id) }}" data-toggle="tooltip" data-placement="bottom" title="Excluir Item"><img src="img/excluir.png" width=" 30" height="30"></a>

            <a href="{{ route('contato.show', $contato->id) }}" data-toggle="tooltip" data-placement="bottom" title="Visualizar Item Completo"><img src="img/ver.png" id="passarMouse" width=" 25" height="25"></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
  </div>
</div>
@endsection
