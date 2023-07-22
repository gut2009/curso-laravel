@extends('index')

@section('content')
    <form class="form" method="POST" action="{{ route('atualizar.venda', $findVenda->id) }}">
        @csrf
        @method('PUT')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Atualizar Venda: {{ $findVenda->numero_da_venda }} / {{ $findVenda->cliente->nome }}</h1>
        </div>
        <div class="mb-3">
            <label class="form-label">Cliente</label>
            <select class="form-select" name="cliente_id">
                <option selected>Clique para selecionar</option>
                @foreach ($findCliente as $cliente)
                    <option value="{{ $cliente->id }}"> {{ $cliente->nome }} </option>
                @endforeach
            </select>
            @if ($errors->has('cliente_id'))
            <div class="invalid-feedback"> {{ $errors->first('cliente_id')}}</div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Produto</label>
            <select class="form-select" name="produto_id">
                <option selected>Clique para selecionar</option>
                @foreach ($findProduto as $produto)
                    <option value="{{ $produto->id }}"> {{ $produto->nome }} </option>
                @endforeach
            </select>
            @if ($errors->has('produto_id'))
            <div class="invalid-feedback"> {{ $errors->first('produto_id')}}</div>
            @endif
        </div>
        <button type="submit" class="btn btn-success">Gravar</button>
        <button type="submit" href="{{ route('venda.index') }}" class="btn btn-primary">Voltar</button>
    </form>
@endsection
