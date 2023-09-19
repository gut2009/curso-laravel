<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.112.5">
  <title>Biblioteca</title>

  <!-- Custom styles for this template -->

  <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
  <link href="{{ asset('css/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('css/projeto.css')}}" rel="stylesheet">
  {{-- <link href="{{ asset('css/bemvindo.css')}}" rel="stylesheet"> --}}

  <!-- Favicons -->
  <meta name="theme-color" content="#712cf9">
</head>
<body>
  <header class="navbar sticky-top flex-md-nowrap p-0 shadow navTop">
    <div class="row">
      <div class="text-center col-8 ml-5 mt-1">
        <img src="{{ asset('img/pilha_livos.png')}}" class="img-fluid ml-5" alt="logo" style="width: 50px; height: 50px;">
      </div>
      <div class="col-4">

        <h3 class="navbar text-nowrap col-md-4 col-lg-2 px-3" href="#">Biblioteca - Família Gutierrez</h3>

      </div>
    </div>
    <div class="navbar-nav navTop">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3 subTitulo" href="{{ route('dashboard.index')}}">Dashboard</a>
      </div>
    </div>
    {{-- <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link nav-link-icon" href="../examples/login.html">
          <i class="ni ni-key-25"></i>
          <span class="nav-link-inner--text">Login</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link nav-link-icon" href="../examples/profile.html">
          <i class="ni ni-single-02"></i>
          <span class="nav-link-inner--text">Profile</span>
        </a>
      </li>
    </ul> --}}
  </header>
  {{--
  <div class="collapse navbar-collapse" id="navbarSupportedContent"> --}}

  {{--
    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
      <!-- Authentication Links -->
      @guest
      <li class="nav-item">
        <a class="nav-link" style="cursor: pointer" data-toggle="modal" data-target="#loginModal">{{ __('Login') }}</a>
  </li>
  @if (Route::has('register'))
  <li class="nav-item">
    <a class="nav-link" style="cursor: pointer" data-toggle="modal" data-target="#registerModal">{{ __('Register') }}</a>
  </li>
  @endif
  @else
  <li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
      {{ Auth::user()->name }} <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </div>
  </li>
  @endguest
  </ul> --}}
  {{-- </div> --}}

  <div class="container-fluid px-5">
    <div class="d-flex pt-3 pb-2 mb-3 border-bottom"></div>
    <div class="row px-2 pt-3">
      <div class="d-flex justify-content-center  pt-1 pb-1 mb-2 border-bottom navTop">
        <h5 class="card-title">Quer conhecer nosso site?</h5>
        <a class="nav-link px-3 btn-botao" href="{{ route('leitor.store')}}">
          <h5>Faça seu cadastro<h5>
        </a>
      </div>
    </div>
    <div class="row px-2 pt-3">
      <div class="d-flex justify-content-center  pt-1 pb-1 mb-2 border-bottom navTop">
        <h5 class="card-title">Já possue cadastro de Leitor?</h5>
        <a class="nav-link px-3 btn-botao" href="{{ route('dashboard.index')}}">
          <h5> Faça login aqui!<h5>
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4 mb-3 mb-sm-0">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Visite a Biblioteca</h5>
            <p class="card-text">Trata-se de controle dos livros da Família</p>
            <a href="#" class="btn btn-primary btn-botao">Quantidade</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Receitas</h5>
            <p class="card-text">Um pequeno conjunto de receitas</p>
            <a href="#" class="btn btn-primary btn-botao">Em Construção</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4 pt-2">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Agenda Financeira da Família</h5>
            <p class="card-text">Controle e arquivo dos pagamentos mensais</p>
            <a href="#" class="btn btn-primary btn-botao">Em Construção</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row px-2 pt-3">
      <div class="d-flex justify-content-center  pt-1 pb-1 mb-2 border-bottom  navTop">
        <h5 class="card-title">Fotos dos pets amigos da família</h5>
      </div>
    </div>
    <div class="row mt-3">
      <div class="text-center col-3 mb-3 mb-sm-0" style="width: 315px; height: 315px;">
        <img src="{{ asset('img/July_Meghan.jpg')}}" class="img-fluid img-thumbnail rounded-5" alt="July-2" style="width: 100%; height: 100%;">
      </div>
      <div class="text-center col-3 mb-3 mb-sm-0" style="width: 315px; height: 315px;">
        <img src="{{ asset('img/July-1.jpg')}}" class="img-fluid img-thumbnail rounded-5 " alt="July-2" style="width: 100%; height: 100%;">
      </div>
      <div class="text-center col-3 mb-3 mb-sm-0" style="width: 315px; height: 315px;">
        <img src="{{ asset('img/Meghan-1.jpg')}}" class="img-fluid img-thumbnail rounded-5 " alt="July-2" style="width: 100%; height: 100%;">
      </div>
      <div class="text-center col-3 mb-3 mb-sm-0" style="width: 315px; height: 315px;">
        <img src="{{ asset('img/July-2.jpg')}}" class="img-fluid img-thumbnail rounded-5 " alt="July-2" style="width: 100%; height: 100%;">
      </div>
    </div>
    <div class="row mt-3">
      <div class="text-center col-4 mb-3 mb-sm-0" style="width: 420px; height: 420px;">
        <img src="{{ asset('img/Tete-1.jpg')}}" class="img-fluid img-thumbnail rounded-5" alt="July-2" style="width: 100%; height: 100%;">
      </div>
      <div class="text-center col-4 mb-3 mb-sm-0" style="width: 420px; height: 420px;">
        <img src="{{ asset('img/Tete-2.jpg')}}" class="img-fluid img-thumbnail rounded-5 " alt="July-2" style="width: 100%; height: 100%;">
      </div>
      <div class="text-center col-4 mb-3 mb-sm-0" style="width: 420px; height: 420px;">
        <img src="{{ asset('img/Tete-3.jpg')}}" class="img-fluid img-thumbnail rounded-5 " alt="July-2" style="width: 100%; height: 100%;">
      </div>
      <div class="row mt-3">
        <div class="text-center col-4 mb-3 mb-sm-0" style="width: 415px; height: 420px;">
          <img src="{{ asset('img/Meghan-2.jpg')}}" class="img-fluid img-thumbnail rounded-5" alt="July-2" style="width: 100%; height: 100%;">
        </div>
        <div class="text-center col-4 mb-3 mb-sm-0" style="width: 415px; height: 420px;">
          <img src="{{ asset('img/July-3.jpg')}}" class="img-fluid img-thumbnail rounded-5 " alt="July-2" style="width: 100%; height: 100%;">
        </div>
        <div class="text-center col-4 mb-3 mb-sm-0" style="width: 415px; height: 420px;">
          <img src="{{ asset('img/Meghan-3.jpg')}}" class="img-fluid img-thumbnail rounded-5 " alt="July-2" style="width: 100%; height: 100%;">
        </div>
      </div>
    </div>
    <div class="container-fluid navTop my-2 pt-2">
      <div class="row">
        <div class="text-center navTop col-2">
          <h6>2023</h6>
        </div>
        <div class="text-center navTop col-7">
          <h6>Estudos Gutierrez - Desenvolvimento da Biblioteca 02/09/2023 (EM ESTUDO)</h6>
        </div>
        <div class="text-center navTop col-3">
          <h6>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</h6>
        </div>
      </div>
    </div>
</body>
</html>
