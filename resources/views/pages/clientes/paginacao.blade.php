@extends('index')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Clientes</h1>
  </div>
  <div>
    <form action="{{ route('cliente.index') }}" method="get">
      <input type="text" name="pesquisar" placeholder="Digite o nome"/>
      <button class="btn btn-success">Pesquisar</button>
      <a type="button" href="{{ route('cadastrar.cliente') }}" class=" btn btn-success float-end">Incluir Cliente</a>
    </form>
    <div class="table-responsive mt-4 small">
      @if ($findCliente->isEmpty())
        <p> Não existe dados</p>
      @else
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Cod</th>
              <th>Nome</th>
              <th>Logradouro</th>
              <th>Criação</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach($findCliente as $cliente)
            
            <tr>
              <td>{{ $cliente->id }}</td>
              <td>{{ $cliente->nome }}</td>
              <td>{{ $cliente->logradouro }}</td>
              <td>{{  date_format($cliente->created_at, "d/m/Y") }}</td>
              <td>
                <a href="{{ route('atualizar.cliente', $cliente->id) }}" class="btn btn-warning btn-sm">Editar</a>

                <meta name='csrf-token' content=" {{ csrf_token() }}"/>
                <a onclick="deleteRegistroPaginacao( '{{ route('cliente.delete') }} ', {{ $cliente->id }}  )" class="btn btn-danger btn-sm">Excluir</a>

                <a href="{{ route('visualizar.cliente', $cliente->id) }}" class="btn btn-primary btn-sm">Visualizar</a>

              
              </td>
            </tr>

            @endforeach

            
          </tbody>
        </table>
      @endif
    </div>
  </div>
@endsection