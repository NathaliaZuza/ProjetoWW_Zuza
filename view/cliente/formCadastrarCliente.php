<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/jquery.mask.min.js"></script>
    <link rel="shortcut icon" href="/img/lg-03.png" />
    <script src="/js/jquery-validation-1.19.3/dist/jquery.validate.min.js"></script>
    <script src="https://kit.fontawesome.com/ca14b9e588.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/css/cadastro.css">
    <link rel="stylesheet" href="/css/headerMenu.css">
    <title>Cadastro | WWZ</title>
</head>

<body>
<?php
session_start();
    if (isset($_SESSION['idCliente'])) {
        header( "Location: /view/cliente/sidebarCliente.php" );
    }
?>
    <div class="box">
        <ul class="nav-logar">
            <li>
                <a href="/index.php">
                    <span class="logo">WW.ZUZA</span>
                </a>
            </li>
        </ul>
        <div class="btn-logar">
            <a href="/view/pagsCentral/login.php">
                <img id="img-account" src="/img/my account-02.png" alt="">
                Minha conta</a>
        </div>
        <div class="btn-logar2"><a href="formCadastrarCliente.php">
                <p id="cadastro">É novo por aqui? </p>Cadastre-se
            </a></div>
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
            <li class="carrinho">
                <a href="/carrinho.php">
                    <i class='bx bx-cart'></i>

                </a>
            </li>
        </ul>
    </div>

    <!----------CADASTRO---------->
    <div class="containerpai">
        <h1>Cadastro</h1>
        <div class="img-login1">
            <img src="/img/cadastro-02.png">
        </div>

        <div class="formContainer">
            <div id="img-login"> <img src="/img/cadastro-05.png" alt=""></div>
            <form id="formCadastroCliente" action="/controller/cliente/cadastrarClienteController.php" method="post">
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome Completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cpf" id="cpf" class="inputUser" required>
                    <label for="cpf" class="labelInput">Cpf</label> <br>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label> <br>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id=email class="inputUser" required>
                    <label for="email" class="labelInput">E-mail</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label><br>
                    <br><br>
                </div>
                <div class="inputBox">
                    <input type="password" name="senhaC" id="senhaC" class="inputUser" required>
                    <label for="senha" class="labelInput">Confirmar Senha</label>
                </div>
                <br><br>
                <!-- <button type="submit" onclick="return validarSenha()" onclick="Cadastrado()" class="botão">Enviar</button> -->
                <button type="submit" class="botão">Enviar</button>

                </td>
            </form>
        </div>
    </div>
    <!---------FOOTER------------->

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


    <!---------------------------->

    <div style="text-align: center;">
        <?php
if ( isset( $_GET["sucesso"] ) && $_GET["sucesso"] == true ) {
    echo "Cadastro com sucesso!!!!";
}
?>
    </div>
    <script>

    $(document).ready(function() {
        $('#cpf').mask('000.000.000-00');
        $('#telefone').mask('(00) 00000-0000');
    });
    </script>
    <script>
    $("#formCadastroCliente").validate({
        rules: {
            nome: {
                required: true,
            },
            cpf: {
                required: true,
                minlength: 11
            },
            email: {
                required: true,
            },
            senha: {
                required: true,
            },
            senhaC: {
                required: true,
                equalTo: "#senha"
            },
        },
        messages: {
            cpf: {
                required: "Campo obrigatório",
                minlength: jQuery.validator.format("Pelo menos {0} caracteres obrigatórios!"),
            },
            nome: {
                required: "Campo obrigatório",
            },
            email: {
                required: "Campo obrigatório",
            },
            senha: {
                required: "Campo obrigatório",
            },
            senhaC: {
                equalTo: "Os campos não são iguais",
                required: "Campo obrigatório"
            }

        }
    });
    </script>


</body>

</html>