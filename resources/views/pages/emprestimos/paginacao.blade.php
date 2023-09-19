@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Empréstimos</h1>
</div>
<div>
  <form action="{{ route('emprestimo.index') }}" method="get">
    <input type="text" name="pesquisar" placeholder="Digite parte do nome" />
    <button class="btn btn-success">Pesquisar</button>
    <a type="button" href="{{ route('emprestimo.store') }}" class=" btn btn-success float-end">Incluir Empréstimo</a>
  </form>
  <div class="table-responsive mt-4 small">
    @if ($findEmprestimo->isEmpty())
    <p> Não existe dados</p>
    @else
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>Cód</th>
          <th>Nome Leitor</th>
          <th>Nome Livro</th>
          <th>Situação</th>
          <th>Data Empréstimo</th>
          <th>Data Vencimento</th>
          <th>Data Entrega</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach($findEmprestimo as $emprestimo)
        <tr>
          <td>{{ $emprestimo->id }}</td>
          <td>{{ $emprestimo->leitor->nome }}</td>
          <td>{{ $emprestimo->livro->nome }}</td>
          <td>
            @if($emprestimo->status === 1)
            <span>Em andamento</span>
            @elseif($emprestimo->status === 2)
            <span style="color: red;">Vencido</span>
            @elseif($emprestimo->status === 3)
            <span>Encerrado</span>
            @endif
          </td>
          <td>{{ $emprestimo->dt_inicio }}</td>
          <td>{{ $emprestimo->dt_devolucao }}</td>
          <td>{{ $emprestimo->dt_final }}</td>
          <td>
            <a href="{{ route('emprestimo.edit', $emprestimo->id) }}" data-toggle="tooltip" data-placement="bottom" title="Atualizar Item"><img src="img/editar.png" width=" 30" height="30"></a>

            <meta name='csrf-token' content=" {{ csrf_token() }}" />
            <input type="hidden" name="_method" value="DELETE">
            <a onclick="return confirm('Tem certeza que deseja deletar este registro? Ele não poderá mais ser recuperado')" href="{{ route('emprestimo.destroy', $emprestimo->id) }}" data-toggle="tooltip" data-placement="bottom" title="Excluir Item"><img src="img/excluir.png" width=" 30" height="30"></a>

            <a href="{{ route('emprestimo.show', $emprestimo->id) }}" data-toggle="tooltip" data-placement="bottom" title="Visualizar Item Completo"><img src="img/ver.png" id="passarMouse" width=" 25" height="25"></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
  </div>
</div>
@endsection
