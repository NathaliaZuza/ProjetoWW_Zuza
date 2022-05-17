<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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