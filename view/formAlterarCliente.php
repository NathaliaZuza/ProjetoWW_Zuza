<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/lg-03.png"/>
    <title></title>
</head>

<body>
<?php
require_once '../dao/ClienteDAO.php';
$idCliente = $_GET['id'];
$clienteDAO = new ClienteDAO();
$cliente = $clienteDAO->findById( $idCliente );
?>
    <div class="formContainer">
    <div id="img-login"> <img  src="../img/cadastro-05.png" alt=""></div>
    <form id="formCadastroCliente" action="../controller/alterarClienteController.php" method="post">
    <input type="hidden" name="idCliente" value="<?php echo $cliente["id"] ?>">
                    <div class="inputbox">
                        <input type="text" name="nome" id="nome" value="<?php echo $cliente["nome"] ?>">
                        <label for="nome">Nome Completo</label>
                    </div>
                <br><br>
                <div class="inputbox">
                        <input type="text" name="cpf" id="cpf" value="<?php echo $cliente["cpf"] ?>">
                        <label for="cpf">Cpf</label>
                    </div>
                <br><br>
                <div class="inputbox">
                        <input type="text" name="telefone" id="telefone" value="<?php echo $cliente["telefone"] ?>">
                        <label for="telefone">Telefone</label>
                    </div>
                <br><br>
                 <button type="submit" onclick="return validarSenha()" class="botão">Enviar</button>
                    </td>
                

        </form>
 </div>
    <div style="text-align: center;">
    <?php
if ( isset( $_GET["sucesso"] ) && $_GET["sucesso"] == true ) {
    echo "Alterado com sucesso!!!!";
}
?>
    </div>
    
</body>

</html>