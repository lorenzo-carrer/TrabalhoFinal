<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        html,
        body {
        height: 100%;
        }

        body {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
        }

        .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
        }

        .form-signin .checkbox {
        font-weight: 400;
        }

        .form-signin .form-floating:focus-within {
        z-index: 2;
        }

        .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        }
    </style>
    <title>Registrar-se</title>
  </head>
  <body class="text-center">
    
    <main class="form-signin">
      <form  method="post" action="{{ route('usuarios.gravar')}}">
      @csrf
        <img class="mx-auto mb-5" width="300px" src="../img/logo.png" alt="" >
    
        <div class="form-floating">
          <input type="email" class="form-control" id="email" name="email"placeholder="nome@exemplo.com">
          <label for="email">Email</label>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="usuario">
            <label for="usuario">Usuario</label>
          </div>
          

        <div class="form-floating">
          <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
          <label for="senha">Senha</label>
        </div>
        <a href="{{route('login')}}" class="link-dark">Já está registrado? Logue-se</a>
        <button class="w-100 btn btn-lg btn-dark mt-3" type="submit">Registrar-se</button>
      </form>
    </main>
    




  </body>
</html>