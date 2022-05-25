<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/jquery.mask.min.js"></script>
    <script src="/js/jquery-validation-1.19.3/dist/jquery.validate.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/ca14b9e588.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/cadastro.css">
    <link rel="shortcut icon" href="/img/lg-03.png"/>
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/headerMenu.css">
    <title>Cadastro | WWZ</title>
</head>

<body>

<div class="box">
        <ul class="nav-logar">
            <li>
                <a href="/index.php">
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
            <a href="login.php">
                <img id="img-account" src="/img/my account-02.png" alt="">
                Minha conta</a>
        </div>
        <div class="btn-logar">
            <a href="loginADM.php">
                Página do Funcionário</a>
        </div>
        <div class="btn-logar2"><a href="/view/cliente/formCadastrarCliente.php"><p id="cadastro">É novo por aqui? </p>Cadastre-se</a></div>
    </div>

    <!------------MENU----------->

    <div class="menu">
        <ul class="nav-list">
            <li>
                <a href="/index.php">
                    <i class='bx bxs-store'></i>
                    <span class="nomelink" id="home">Todos os produtos</span>
                </a>
            </li>

            <li class="produtoshover">
                <a href="/view/produto/tipoproduto.php?categoria_id=1">
                    <span class="nomelink">Panfleto</span>
                </a>
            </li>
            <li class="produtoshover">
                <a href="/view/produto/tipoproduto.php?categoria_id=2">
                    <span class="nomelink">Cartão de visita</span>
                </a>
            </li>
            <li class="produtoshover">
                <a href="/view/produto/tipoproduto.php?categoria_id=3">
                    <span class="nomelink">Cardápio</span>
                </a>
            </li>
            <li class="produtoshover">
                <a href="/view/produto/tipoproduto.php?categoria_id=4">
                    <span class="nomelink">Banner</span>
                </a>
            </li>
            <li class="produtoshover">
                <a href="/view/produto/tipoproduto.php?categoria_id=5">
                    <span class="nomelink">Papel timbrado</span>
                </a>
            </li>
            <li class="carrinho">
                <a href="../carrinho.php">
                    <i class='bx bx-cart'></i>
                </a>
            </li>

        </ul>
    </div>

    <!-----------LOGIN---------> 
    <h1>Login Administrativo</h1>
    <div class="img-login1">
        <img src="/img/adm-01.png">
    </div>
   
    <div class="pag">
         
        <div class="login">
           <div id="img-login"> <img  src="/img/login-03.png" width="90px" alt=""></div>
           
           <form action="../controller/loginAdmController.php" method="post">
            <input type="text" name="email" placeholder="Email" class="nome">
            <br><br>
            <input type="password" name="senha" placeholder="Senha" class="senha">
            <br><br>
            <input class="botão-adm" type="submit" name="submit" value="Entrar">
            </form>
        </div>
    </div>

    <footer>
        <div class="social">
            <p><span class="logo">WW.ZUZA</span></p>
            <div class="socialcirc">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-whatsapp"></a>
                <p>Copyright © 2022 Todos os <br> direitos reservados</p>
            </div>
        </div>
      <!--   <div class="pagamento">
            <p>Formas de pagamento:</p>
            <p>
                <img src="./img/pagamento-07.png" width="70x">
                <img src="./img/pagamento-08.png" width="70px">
            </p>
        </div> -->
        <div class="criacao">
            <p id="criado">Criado por: <span id="autores">Nathália Zuza, Weskley Borges e Wendel Daniel</span></p>
        </div>
    </footer>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</html>
