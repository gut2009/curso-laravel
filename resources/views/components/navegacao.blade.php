<nav id="sidebar-menu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
  <div class="position-sticky pt-3 sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">
          <span data-feather="home" class="align-text-bottom"></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('venda.index') }}">
          <span data-feather="file" class="align-text-bottom"></span>
          Venda
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('produto.index') }}">
          <span data-feather="file" class="align-text-bottom"></span>
          Produto
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('cliente.index') }}">
          <span data-feather="file" class="align-text-bottom"></span>
          Cliente
        </a>
      </li>
    </ul>

    <hr class="my-3">
  </div>
</nav>