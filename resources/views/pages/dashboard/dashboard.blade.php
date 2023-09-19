@extends('index')


@section('content')

<div class="modalDashboard">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom" tabindex="-2">
    <h1 class=" h2">Dashboard</h1>
  </div>

  <div class="row elementoDash">
    <div class="col-sm-6 mb-3 mb-sm-0">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-8">
              <h5 class="card-title">Livros Cadastrados</h5>
              <p class="card-text">Total de livros cadastrados</p>
              <a href="#" class="btn total">{{ $totalLivroCadastrado }}</a>
            </div>
            <div class="col-4">
              <div>
                <img src="{{ asset('img/estante-de-livros 3.png')}}" class="img-fluid  rounded-5 imagem" alt="estante-de-livros 3">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-8">
              <h5 class="card-title">Leitores Cadastrados</h5>
              <p class="card-text">Total de leitores cadastrados</p>
              <a href="#" class="btn total">{{ $totalLeitorCadastrado }}</a>
            </div>
            <div class="col-4">
              <div>
                <img src="{{ asset('img/livros_passaro.png')}}" class="img-fluid rounded-5 imagem" alt="livros_passaro">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-sm-6 mb-3 mb-sm-0">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-8">
                <h5 class="card-title">Empréstimos Cadastradas</h5>
                <p class="card-text">Total de empréstimos cadastrados</p>
                <a href="#" class="btn total">{{ $totalEmprestimoCadastrado }}</a>
              </div>
              <div class="col-4">
                <div>
                  <img src="{{ asset('img/livros_empre.png')}}" class="img-fluid rounded-5 imagem" alt="livros_empre">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-8">
                <h5 class="card-title">Usuários Cadastrados</h5>
                <p class="card-text">Total de usuários cadastrados</p>
                <a href="#" class="btn total">{{ $totalUsuarioCadastrado }}</a>
              </div>
              <div class="col-4">
                <div>
                  <img src="{{ asset('img/livros-garota.png')}}" class="img-fluid rounded-5 imagem" alt="livros-garota">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection


  {{--
  <div class="modalLogin elementoLogin">
    @include('components.login')
  </div> --}}
