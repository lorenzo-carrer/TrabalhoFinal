<!doctype html>
<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Jquery -->
  <script src="jquery-3.5.1.min.js"></script>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>@yield('title')</title>



</head>

<body class="bg-light">
  <header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

        <ul class="nav col-12 col-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="{{route('inverno')}}" class="nav-link px-2 link-dark">Roupas de Inverno</a></li>
          <li><a href="{{route('verao')}}" class="nav-link px-2 link-dark">Roupas de Verão</a></li>
          <li><a href="{{route('calcados')}}" class="nav-link px-2 link-dark">Calçados</a></li>
          <li><a href="{{route('diversos')}}" class="nav-link px-2 link-dark">Diversos</a></li>
        </ul>

      
        <a href="{{route('home')}}" class="mx-auto" ><img src="img/logo.png" height="70px" alt="logo"></a>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
        @csrf
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>


        @if (session('usuario'))
         <a href="carrinho.html"><button type="button" class="btn m-2"><svg xmlns="http://www.w3.org/2000/svg"
              height="30" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
              <path
                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </svg></button></a>

        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
            data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="perfil.html">Meu perfil</a></li>
            <li><a class="dropdown-item" href="{{route('produtos.meusProdutos')}}">Meus produtos</a></li>
            <li><a class="dropdown-item" href="{{route('produtos.inserir')}}">Novo produto</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
           
            <li><a href="{{ route('logout') }}" role="button" class="dropdown-item">Sair</a>
        </li>
          </ul>
        </div>
            
        @else
            <a href="{{ route('login') }}" role="button" class="btn btn-warning me-2">Login</a>
            <a href="{{ route('usuarios.inserir') }}" role="button" class="btn btn-warning">Cadastro</a>
        @endif
       
      </div>
    </div>
  </header>
  <div class="container">
    <div class="row m-3">
      <h1>@yield('h1')</h1>
    </div>
    <div class="row p-3">
        @yield('content')
    </div>
  </div>
  
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>
@stack('scripts')
</html>