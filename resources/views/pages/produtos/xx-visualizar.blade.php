@extends('index')


@section('content')

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Dados completos do Produto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="form-group">

          <div class="row">
            <div class="col-2">
              <label class="form-label">Cód</label>
                <div> {{ $findProduto->id }}</div>
            </div>
            <div class="col-5">
              <label class="form-label">Nome</label>
                <div>{{ $findProduto->nome }}</div>
            </div>
              <label class="form-label">Valor</label>
            <div class="col-5">
              {{ $findProduto->valor }}
            </div>
          </div>
          <div class="row">
            <div class="col-6">Data Criação</div>
            <div class="col-6">Data Atualização</div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection