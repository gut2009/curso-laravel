@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Leitores</h1>
</div>
<div>
  <form action="{{ route('leitor.index') }}" method="get" enctype="multipart/form-data">
    @csrf
    <input type="text" name="pesquisar" placeholder="Digite o nome" />
    <button class="btn btn-success">Pesquisar</button>
    <a type="button" method="POST" href="{{ route('leitor.store') }}" class=" btn btn-success float-end">Incluir Leitor</a>
  </form>

  <div class="table-responsive mt-4 small">
    @if ($findLeitor->isEmpty())
    <p> Não existe dados</p>
    @else
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>Cod</th>
          <th>Nome</th>
          <th>Cidade</th>
          <th>UF</th>
          <th>Foto</th>
          <th>Criação</th>
          <th>Atualização</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach($findLeitor as $leitor)
        <tr>
          <td>{{ $leitor->id }}</td>
          <td>{{ $leitor->nome }}</td>
          <td>{{ $leitor->cidade }}</td>
          <td>{{ $leitor->uf }}</td>
          <td><img src=" {{ asset('storage/'.$leitor->imagem) }}" width=" 40" height="40"></td>
          <td>{{ date_format($leitor->created_at, "d/m/Y") }}</td>
          <td>{{ date_format($leitor->updated_at, "d/m/Y") }}</td>
          <td>
            @method('put')
            <a href="{{ route('leitor.edit', $leitor->id) }}" data-toggle="tooltip" data-placement="bottom" title="Atualizar Item"><img src="img/editar.png" width=" 30" height="30"></a>

            <meta name='csrf-token' content=" {{ csrf_token() }}" />
            <input type="hidden" name="_method" value="DELETE">
            <a onclick="return confirm('Tem certeza que deseja deletar este registro? Ele não poderá mais ser recuperado')" href="{{ route('leitor.destroy', $leitor->id) }}" data-toggle="tooltip" data-placement="bottom" title="Excluir Item"><img src="img/excluir.png" width=" 30" height="30"></a>

            <a href=" {{ route('leitor.show', $leitor->id) }}" data-toggle="tooltip" data-placement="bottom" title="Visualizar Item Completo"><img src="img/ver.png" id="passarMouse" width=" 25" height="25"></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
  </div>
</div>


{{-- //ATENÇÃO ==> podemos usar com template --}}

{{-- <script>
  function modalDelete() {
    Swal.fire({
      title: '<strong><u>Deletar registro?</u></strong>'
      , icon: 'error'
      , html: 'Esta ação excluirá, <b>definitivamente</b>, o registro ' + '<br>' +
        '<a href="http://127.0.0.1:8001/leitores">{{ $leitor->id }}: {{ $leitor->nome }}</a> ' + '<br>' + 'CONFIRMA?'
, showCloseButton: true
, showCancelButton: true
, focusConfirm: true
, confirmButtonText: '<i class="fa fa-thumbs-up"></i> Delete!'
, confirmButtonAriaLabel: 'Thumbs up, Delete!'
, cancelButtonText: '<i class="fa fa-thumbs-up"></i> Delete'
, cancelButtonAriaLabel: 'Thumbs up, Delete!'
})
}

</script> --}}



{{-- @include('components.myModal') --}}

@endsection
