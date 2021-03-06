<?php
session_start();
    if ( $_SESSION["perfil"] != 'Administrador' ) {
        
        header( "Location: /view/cliente/sidebarCliente.php" );
    }
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="/img/lg-03.png"/>
    <title>Administrativo | WWZUZA</title>
</head>
<body>
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
                <a onclick="vendas()">
                    <i class='bx bxs-shopping-bags'></i>
                    <span class="links_name">Vendas</span>
                </a>
               <span class="tooltip">Vendas</span>
            </li>
            <li>
                <a href="../../index.php">
                    <i class='bx bxs-store-alt'></i>
                    <span class="links_name">P??gina inicial</span>
                </a>
                <span class="tooltip">P??gina inicial</span> 
            </li>
        </ul>
        <div class="profile_content">
            <div class="profile">
                <div class="profile_details">
                   <!-- <img src="" alt=""> -->
                   <div class="name_job">
                       <div class="name">WWZUZA</div>
                       <div class="job">Servi??os gr??ficos</div>
                   </div>
                </div>
                <a href="../../controller/cliente/sairController.php"><i class='bx bx-log-out' id="log_out" onclick="log_out()"></i></a>
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
            return confirm("Voc?? est?? apagando um produto do cat??logo. Tem certeza que deseja excluir?");
        } 
        function home(){
            iframe.src="/view/pagsCentral/sidebar.php"
        }
        function produtosCadastro(){
            iframe.src="/view/produto/formCadastrarProduto.php"
        }
        function produtosLista(){
            iframe.src="/view/produto/Produtos.php"
        }
        function ListarClientes(){
            iframe.src="/view/cliente/listarTodosClientes.php"
        }
        function geral(){
            iframe.src="/view/pagsCentral/painelAdministrativo.php"
        }
        function vendas(){
            iframe.src="/view/produto/vendas.php"
        }
        function log_out(){
            return confirm("Voc?? est?? saindo da p??gina do administrador. Tem certeza que deseja sair?");
        }
    </script>
</body>
</html>