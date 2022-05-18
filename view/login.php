<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/cadastro.css">

    <title>login |WWZ</title>
</head>
<body>


    <!---HEADER--->

    <div class="box">
        <ul class="nav-logar">
            <li>
                <a href="../index.php">
                    <span class="logo">WW.ZUZA</span>
                </a>
            </li>
            <li>
                <div class="inputSearch">
                    <i class='bx bx-search'></i>
                    <input type="text" name="pesquisar" placeholder="Pesquise um produto...">
                </div>
            </li>
        </ul>
        <div class="btn-logar">
            <a href="../view/login.php">
                <img id="img-account" src="../img/my account-02.png" alt="">
                Minha conta</a>
        </div>
        <div class="btn-logar">
            <a href="../view/loginADM.php">
                Página do Funcionário</a>
        </div>
        
        <div class="btn-logar2"><a href="../view/formCadastrarCliente.php"><p id="cadastro">É novo por aqui? </p>Cadastre-se</a></div>
    </div>


    <!------------MENU----------->

    <div class="menu">
        <ul class="nav-list">
            <li>
                <a href="../index.php">
                    <i class='bx bxs-store'></i>
                    <span class="nomelink" id="home">Todos os produtos</span>
                </a>
            </li>

            <li class="produtoshover">
                <a href="#">
                    <span class="nomelink">Panfleto</span>
                </a>
            </li>
            <li class="produtoshover">
                <a href="#">
                    <span class="nomelink">Cartão de visita</span>
                </a>
            </li>
            <li class="produtoshover">
                <a href="#">
                    <span class="nomelink">Cardápio</span>
                </a>
            </li>
            <li class="produtoshover">
                <a href="#">
                    <span class="nomelink">Banner</span>
                </a>
            </li>
            <li class="produtoshover">
                <a href="#">
                    <span class="nomelink">Papel timbrado</span>
                </a>
            </li>
            <li class="carrinho">
                <a href="../carrinho.php">
                    <i class='bx bx-cart'></i>
                    <span>Carrinho</span>
                </a>
            </li>
        </ul>


    <!-----------LOGIN---------> 
    <h1>Login</h1>
    <div class="img-login1">
        <img src="../img/login1-01.png">
    </div>
   
    <div class="pag">
         
        <div class="login">
           <div id="img-login"> <img  src="../img/login-03.png" alt=""></div>
           
           <form action="../controller/loginController.php" method="post">
            <input type="text" name="email" placeholder="Email" class="nome">
            <br><br>
            <input type="password" name="senha" placeholder="Senha" class="senha">
            <br><br>
            <input class="botão2" type="submit" name="submit" value="Entrar">
            </form>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../js/chat.js"></script>
<script src="../js/responses.js"></script>
</html>



<!-- <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<main class="form-signin">
    <form action="../controller/loginController.php" method="post">
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
</html> -->