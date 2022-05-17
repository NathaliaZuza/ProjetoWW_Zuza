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
    <link rel="stylesheet" href="../css/cadastro.css">
    <title>Cadastro | WWZ</title>

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
        <div class="btn-logar2"><a href="../view/cadastro.php"><p id="cadastro">É novo por aqui? </p>Cadastre-se</a></div>
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

<!----------CADASTRO---------->

<h1>Cadastro</h1>
    <div class="img-login1">
        <img src="../img/cadastro-02.png">
    </div>
  

<div class="formContainer">
    <div id="img-login"> <img  src="../img/cadastro-05.png" alt=""></div>
    <form id="formCadastroCliente" action="../controller/cadastrarClienteController.php" method="post">
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome Completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cpf" id="cpf" class="inputUser" required>
                    <label for="cidade" class="labelInput">Cpf</label> <br>
                </div>
                <br><br>
                <div class="inputBox">
                <input type="text" name="email" id=email class="inputUser" required>
                    <label for="email" class="labelInput">E-mail</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                    <br><br>
                </div>
                <div class="inputBox">
                    <input type="password" name="senhaC" id="senhaC" class="inputUser" required>
                    <label for="senha" class="labelInput">Confirmar Senha</label>
                </div>
                <br><br>
                 <button type="submit" onclick="return validarSenha()" class="botão">Enviar</button>
                    </td>
                

        </form>
 </div>


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
            $('#tel').mask('(00) 00000-0000');
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
                    minlength: jQuery.validator.format("At least {0} characters required!"),
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