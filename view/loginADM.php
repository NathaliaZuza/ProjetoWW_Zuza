<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<main class="form-signin">
    <form action="../controller/loginAdmController.php" method="post">
      <h1 class="h3 mb-3 fw-normal">Login</h1>

      <div class="form-floating">
        <input type="email" name="email" class="form-control" id="floatingInput">
        <label for="floatingInput">Email</label>
      </div>
      <div class="form-floating">
        <input type="password" name="senha" class="form-control" id="floatingPassword">
        <label for="floatingPassword">Senha</label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
      <p class="mt-3 mb-3 text-muted">&copy; 2022</p>
    </form>
  </main>
</body>
</html>