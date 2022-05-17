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
    <fieldset>
        <legend>Cadastro de cliente</legend>
        <form action="../controller/alterarClienteController.php" method="post">
            <table>
                <tr>
                    <td>Nome:</td>
                    <td><input type="text" name="nome"></td>
                </tr>
                <tr>
                    <td><label for="cpf">Cpf:</label></td>
                    <td><input type="text" name="cpf" id="cpf"></td>
                </tr>
                
                <tr>
                    <td><label for="tel">Telefone:</label></td>
                    <td><input type="text" name="tel" id=tel></td>
                </tr>
                <tr>
                    <td>cep:</td>
                    <td><input type="text" name="cep"></td>
                </tr>
                <tr>
                    <td>Estado:</td>
                    <td><input type="text" name="estado"></td>
                </tr>
                <tr>
                    <td>cidade:</td>
                    <td><input type="text" name="cidade"></td>
                </tr>
                <tr>
                    <td>Endereço:</td>
                    <td><input type="text" name="endereco"></td>
                </tr>
                <tr>
                    <td>N° da casa:</td>
                    <td><input type="text" name="numero_casa"></td>
                </tr>
                <tr>
                    <td colspan="2">
                    <button type="submit">Enviar</button>
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>
    <div style="text-align: center;">
    <?php
if ( isset( $_GET["sucesso"] ) && $_GET["sucesso"] == true ) {
    echo "Alterado com sucesso!!!!";
}
?>
    </div>
    
</body>

</html>