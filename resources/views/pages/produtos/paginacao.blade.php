@extends('index')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Produtos</h1>
  </div>
  <div>
    <form action="{{ route('produto.index') }}" method="get">
      <input type="text" name="pesquisar" placeholder="Digite o nome"/>
      <button class="btn btn-success">Pesquisar</button>
      <a type="button" href="" class=" btn btn-success float-end">Incluir Produto</a>
    </form>
    <div class="table-responsive mt-4 small">
      @if ($findProduto->isEmpty())
        <p> Não existe dados</p>
      @else
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Cod</th>
              <th>Nome</th>
              <th>Valor</th>
              <th>Criação</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach($findProduto as $produto)
            
            <tr>
              <td>{{ $produto->id }}</td>
              <td>{{ $produto->nome }}</td>
              <td>{{ 'R$' . ' ' . number_format($produto->valor, 2, ',', '.') }}</td>
              <td>{{  date_format($produto->created_at, "d/m/Y") }}</td>
              <td>
                <a href="" class="btn btn-light btn-sm">Editar</a>
                <a href="{{ route('produto.delete')}}" class="btn btn-danger btn-sm">Excluir</a>
                <a href="" class="btn btn-primary btn-sm">Vizualizar</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      @endif
    </div>
  </div>
@endsection