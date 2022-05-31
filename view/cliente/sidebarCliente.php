<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/sidebarCliente.css">

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="/img/lg-03.png"/>
    <title>Minha Conta | WWZUZA</title>
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

    <!-- <a onclick="geral()"><div class="opcoes">Seus dados</div></a>
    <a onclick="AtualizarCadastro()"><div class="opcoes">Adiicionar cartões/endereços</div></a>
    <a onclick="compras()"><div class="opcoes">Seus pedidos</div></a>
   <a href=""><div class="opcoes">Comentários</div></a> -->


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