<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/jquery.mask.min.js"></script>
    <script src="../js/jquery-validation-1.19.3/dist/jquery.validate.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/ca14b9e588.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../img/lg-03.png"/>
    <link rel="stylesheet" href="../css/menuConta.css">
    <!-- <link rel="stylesheet" href="../css/headerMenu.css"> -->
    <title>Minha conta | WWZ</title>
</head>

<body>
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
            <a href="login.php">
                <img id="img-account" src="../img/my account-02.png" alt="">
                Minha conta</a>
        </div>
        <div class="btn-logar">
            <a href="loginADM.php">
                Página do Funcionário</a>
        </div>
        <div class="btn-logar2"><a href="formCadastrarCliente.php"><p id="cadastro">É novo por aqui? </p>Cadastre-se</a></div>
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
                <a href="tipoproduto.php?categoria_id=1">
                    <span class="nomelink">Panfleto</span>
                </a>
            </li>
            <li class="produtoshover">
                <a href="tipoproduto.php?categoria_id=2">
                    <span class="nomelink">Cartão de visita</span>
                </a>
            </li>
            <li class="produtoshover">
                <a href="tipoproduto.php?categoria_id=3">
                    <span class="nomelink">Cardápio</span>
                </a>
            </li>
            <li class="produtoshover">
                <a href="tipoproduto.php?categoria_id=4">
                    <span class="nomelink">Banner</span>
                </a>
            </li>
            <li class="produtoshover">
                <a href="tipoproduto.php?categoria_id=5">
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
    </div>

  <!------------Minha conta----------->

  <div class="sidebar">
        <div class="logo_conteudo">
            <div class="logo">
            <i class='bx bxs-home-alt-2'></i>
               <div class="logo_nome">Home</div>
            </div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a onclick="geral()">
                    <i class='bx bxs-dashboard'></i>
                    <span class="links_name">Geral</span>
                </a>
               <span class="tooltip">Geral</span>
            </li>
            <li>
                <a onclick="ListarClientes()">
                    <i class='bx bxs-user-detail'></i>
                    <span class="links_name">Clientes</span>
                </a>
               <span class="tooltip">Clientes</span>
            </li>
            <li>
                <a onclick="produtosCadastro()">
                    <i class='bx bxs-edit'></i> 
                    <span class="links_name">Produtos cadastro</span>
                </a>
               <span class="tooltip">Produtos</span>
            </li>
            <li>
                <a onclick="produtosLista()">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Produtos lista</span>
                </a>
               <span class="tooltip">Produtos lista</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-shopping-bags'></i>
                    <span class="links_name">Vendas</span>
                </a>
               <span class="tooltip">Vendas</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-chat'></i>
                    <span class="links_name">Comentários</span>
                </a>
                <span class="tooltip">Comentários</span> 
            </li>
        </ul>
        <div class="profile_content">
            <div class="profile">
                <div class="profile_details">
                   <!-- <img src="" alt=""> -->
                   <div class="name_job">
                       <div class="name">WWZUZA</div>
                       <div class="job">Serviços gráficos</div>
                   </div>
                </div>
               <a href="../index.php"><i class='bx bx-log-out' id="log_out" onclick="log_out()"></i></a>
            </div>
        </div>
    </div>
    <iframe src="" frameborder="0" id="iframe"></iframe>

    <script>
        let btn = document.querySelector("#btn");
        let sidebar = document.querySelector(".sidebar");
        const iframe = document.querySelector("#iframe");
        btn.onclick = function(){
            sidebar.classList.toggle("active")
        }
        function confirmarExcluir(){
            return confirm("Você está apagando um produto do catálogo. Tem certeza que deseja excluir?");
        } 
        function produtosCadastro(){
            iframe.src="formCadastrarProduto.php"
        }
        function produtosLista(){
            iframe.src="Produtos.php"
        }
        function ListarClientes(){
            iframe.src="listarTodoscLientes.php"
        }
        function geral(){
            iframe.src="painelAdministrativo.php"
        }
        function log_out(){
            return confirm("Você está saindo da página do administrador. Tem certeza que deseja sair?");
        }
    </script>
