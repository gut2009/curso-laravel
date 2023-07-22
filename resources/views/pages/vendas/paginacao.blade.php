@extends('index')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Vendas</h1>
  </div>
  <div>
    <form action="{{ route('venda.index') }}" method="get">
      <input type="text" name="pesquisar" placeholder="Digite Número da Venda"/>
      <button class="btn btn-success">Pesquisar</button>
      <a type="button" href="{{ route('cadastrar.venda') }}" class=" btn btn-success float-end">Incluir Venda</a>
    </form>
    <div class="table-responsive mt-4 small">
      @if ($findVendas->isEmpty())
        <p> Não existe dados</p>
      @else
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>ID</th>
              <th>Venda</th>
              <th>Cod Cli</th>
              <th>Cliente</th>
              <th>Cod Prod</th>
              <th>Produto</th>
              <th>Criação</th>
              <th>Atualização</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach($findVendas as $venda)
            <tr>
              <td>{{ $venda->id }}</td>
              <td>{{ $venda->numero_da_venda }}</td>
              <td>{{ $venda->cliente_id }}</td>
              <td>{{ $venda->cliente_nome }}</td>
              <td>{{ $venda->produto_id }}</td>
              <td>{{ $venda->produto_nome }}</td>
              <td>{{ date_format($venda->created_at, "d/m/Y") }}</td>
              <td>{{ date_format($venda->updated_at, "d/m/Y") }}</td>
              <td>
                <a href="{{ route('atualizar.venda', $venda->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <a href="{{ route('visualizar.venda', $venda->id) }}" class="btn btn-primary btn-sm">Visualizar</a>
                <a href="" class="btn btn-secondary btn-sm">Enviar Email</a>

              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      @endif
    </div>
  </div>
@endsection