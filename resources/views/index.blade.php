<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.112.5">
  <title>Biblioteca</title>

  @yield('styles')
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
  <link href="{{ asset('css/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('css/projeto.css')}}" rel="stylesheet">

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="{{ asset('icones/apple-touch-icon.png') }}" sizes="180x180">
  <link rel="icon" href="{{ asset('icones/favicon-32x32.png') }}" sizes="32x32" type="image/png">
  <link rel="icon" href="{{ asset('icones/favicon-16x16.png') }}" sizes="16x16" type="image/png">
  <link rel="manifest" href="{{ asset('icones/manifest.json') }}">
  <link rel="mask-icon" href="{{ asset('icones/safari-pinned-tab.svg') }}" color="#2f9de7">
  <link rel="icon" href="{{ asset('icones/favicon.ico') }}">

  <!-- TOASTR -  Mensagem de sucesso -->
  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
  <meta name="theme-color" content="#2f9de7">

  <!-- ARGON _ LOGIN -->
  <!-- Favicon -->
  <link href="../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  {{-- <link href="/css/argon-dashboard.css" rel="stylesheet" /> --}}

</head>
<body>

  <header class="navbar sticky-top flex-md-nowrap p-0 shadow navTop">
    <div class="row">
      <div class="text-center col-8 ml-5 mt-1">
        <img src="{{ asset('img/pilha_livos.png')}}" class="img-fluid ml-5" alt="logo" style="width: 50px; height: 50px;">
      </div>
      <div class="col-4">

        <a class="nav-link px-3" href="/"><i>
            <h3 class="navbar text-nowrap col-md-4 col-lg-2 px-3" href="/">Biblioteca - Família Gutierrez</h3>
          </i>
        </a>
      </div>
    </div>
    <div class="navbar-nav navTop">
      <div class="nav-item text-nowrap white">
        <a class="nav-link px-3 subTitulo" href="{{ route('dashboard.index')}}">Dashboard</a>
      </div>
    </div>
  </header>

  <div class="container-fluid">
    <div class="row">
      @include('components.navegacao')

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @yield('content')

      </main>
    </div>
  </div>

  @yield('scripts')
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/:chart.js@4.2.1/dist/chart.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.js"></script>
  <script src="/js/bootstrap.bundle.min.js"></script>
  <script src="/js/dashboard.js"></script>
  <script src="/js/color-modes.js"></script>
  <script src="/js/projeto.js"></script>

  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

  {!! Toastr::message() !!}


  <!--   Core   -->
  <script src="/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="/js/argon-dashboard.min.js?v=1.1.0"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>

  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a"
        , application: "argon-dashboard-free"
      });

  </script>


</body>
</html>
