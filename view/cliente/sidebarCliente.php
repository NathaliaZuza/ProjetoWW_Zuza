<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/sidebarCliente.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="/img/lg-03.png"/>
    <link rel="stylesheet" href="/css/headerMenuCliente.css">
    <title>Minha Conta | WWZUZA</title>
</head>
<body>


<div class="box">
        <ul class="nav-logar">
            <li>
                <a href="index.php">
                    <span class="logoIndex">WW.ZUZA</span>
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
            <a href="/view/pagsCentral/login.php">
                <img id="img-account" src="/img/my account-02.png" alt="">
                Minha conta</a>
        </div>
        <div class="btn-logar2"><a href="/view/cliente/formCadastrarCliente.php">
                <p id="cadastro">É novo por aqui? </p>Cadastre-se
            </a></div>
    </div>

<!------------MENU----------->

    <div class="menu">
        <ul class="nav-list-menu">
            <li>
                <a href="index.php">
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
                <a href="carrinho.php">
                    <i class='bx bxs-cart'></i>
                </a>
            </li>

        </ul>
    </div>

<!------------SIDEBAR----------->

<?php 

  session_start();
        require_once '../../dao/ClienteDAO.php';
        $idCliente = $_SESSION["idCliente"];
        $clienteDAO = new ClienteDAO();
        $cliente    = $clienteDAO->findById( $idCliente );

        require_once '../../dao/enderecoDAO.php';
        $enderecoDAO = new EnderecoDAO();
        $endereco    = $enderecoDAO->findById( $idCliente );

        require_once '../../dao/PagamentoDAO.php';
        $pagamentoDAO = new PagamentoDAO();
        $pagamento    = $pagamentoDAO->findById( $idCliente );


?>
<div class="sidebar">
        <div class="logo_conteudo">
            <div class="logo">
           
            <i class='bx bxs-user-circle'></i>
                
               <div class="logo_nome">Olá, <?php  echo "{$cliente["nome"]}";  ?> </div>
            
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
                <a onclick="AtualizarCadastro()">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Atualizar Cadastro</span>
                </a>
               <span class="tooltip">Atualizar Cadastro</span>
            </li>
            <li>
                <a onclick="compras()">
                    <i class='bx bxs-shopping-bags'></i>
                    <span class="links_name">Compras</span>
                </a>
               <span class="tooltip">Compras</span>
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
               <a href="/index.php"><i class='bx bx-log-out' id="log_out" onclick="log_out()"></i></a>
                
            </div>
        </div>
    </div>

    <iframe src="" frameborder="0" class="iframe"></iframe>

    <script>
        let btn = document.querySelector("#btn");
        let sidebar = document.querySelector(".sidebar");
        const iframe = document.querySelector(".iframe");
        btn.onclick = function(){
            sidebar.classList.toggle("active")
            iframe.classList.toggle("activeFrame")
        }
        function confirmarExcluir(){
            return confirm("Você está apagando um produto do catálogo. Tem certeza que deseja excluir?");
        } 
        function home(){
            iframe.src="/view/cliente/sidebarCliente.php"
        }
        function AtualizarCadastro(){
            iframe.src="/view/cliente/AtualizarDadosCliente.php"
        }
        function geral(){
            iframe.src="/view/cliente/minhaConta.php"
        }
        function compras(){
            iframe.src="/view/cliente/compras.php"
        }
        function log_out(){
            return confirm("Você está saindo da sua conta. Tem certeza que deseja sair?");
        }
    </script>
</body>
</html>