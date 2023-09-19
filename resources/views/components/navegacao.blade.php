<nav id="sidebar-menu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
  <div class="position-sticky pt-3 sidebar">
    <ul class="nav flex-column" id="nav_acordion">
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{ route('dashboard.index') }}">
          <span data-feather="home" class="align-text-bottom"></span>
          Dashboard
        </a>
      </li>
      <hr class="my-3">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('leitor.index') }}">
          <span data-feather="file" class="align-text-bottom"></span>
          Leitores
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('livro.index') }}">
          <span data-feather="file" class="align-text-bottom"></span>
          Livros
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('emprestimo.index') }}">
          <span data-feather="file" class="align-text-bottom"></span>
          Empréstimos
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('contato.index') }}">
          <span data-feather="file" class="align-text-bottom"></span>
          Contatos
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('usuario.index') }}">
          <span data-feather="file" class="align-text-bottom"></span>
          Usuários
        </a>
      </li>
      <hr class="my-3">
      <li class="nav-item has-submenu sidebar">
        <a class="dropdown-btn nav-link" href="#">Detalhes do livro</a>
        <div class="dropdown-container sidebar">
          <a class="nav-link" href="{{ route('assunto.index') }}">Assuntos</a>
          <a class="nav-link" href="{{ route('autor.index') }}">Autores</a>
          <a class="nav-link" href="{{ route('espirito.index') }}">Autores Espirituais</a>
          <a class="nav-link" href="{{ route('categoria.index') }}">Categorias</a>
          <a class="nav-link" href="{{ route('editora.index') }}">Editoras</a>
          <a class="nav-link" href="{{ route('local.index') }}">Local</a>
          <a class="nav-link" href="{{ route('tipo.index') }}">Tipos</a>
      </li>
    </ul>
  </div>
  <hr class="my-3">
</nav>
