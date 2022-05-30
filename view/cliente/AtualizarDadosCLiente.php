<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/jquery.mask.min.js"></script>
    <link rel="shortcut icon" href="/img/lg-03.png" />
    <script src="../js/jquery-validation-1.19.3/dist/jquery.validate.min.js"></script>
    <script src="https://kit.fontawesome.com/ca14b9e588.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/css/cadastro.css">
    <link rel="stylesheet" href="/css/headerMenu.css">
    <title>Cadastro | WWZ</title>
</head>

<body>
    <?php
        session_start();
        require_once '../../dao/ClienteDAO.php';
        require_once '../../dao/enderecoDAO.php';
        
        $idCliente = $_SESSION["idCliente"];
        echo "id", $idCliente;
        $clienteDAO = new ClienteDAO();
        $cliente    = $clienteDAO->findById( $idCliente );
        $enderecoDAO = new EnderecoDAO();
        $endereco    = $enderecoDAO->findById( $Cliente_id );
    ?>
    <!-- ENDEREÇO -->
    <form id="formCadastroCliente" action="/controller/cliente/alterarEnderecoController.php" method="post">
        <input type="hidden" name="idEndereco" value="<?php echo $endereco["id"] ?>">
        <div class="inputbox">
            <input type="text" name="cep" id="cep" value="<?php echo $endereco["cep"] ?>">
            <label for="cep">Cep</label>
        </div>
        <br><br>
        <div class="inputbox">
            <input type="text" name="endereco" id="endereco" value="<?php echo $endereco["endereco"] ?>">
            <label for="endereco">Endereço</label>
        </div>
        <br><br>
        <div class="inputbox">
            <input type="text" name="numero_casa" id="numero_casa" value="<?php echo $endereco["numero_casa"] ?>">
            <label for="numero_casa">N° casa</label>
        </div>
        <br><br>
        <div class="inputbox">
            <input type="text" name="complemento" id="complemento" value="<?php echo $endereco["complemento"] ?>">
            <label for="complemento">complemento</label>
        </div>
        <br><br>
        <div class="inputbox">
            <input type="text" name="cidade" id="cidade" value="<?php echo $endereco["cidade"] ?>">
            <label for="cidade">Cidade</label>
        </div>
        <br><br>
        <div class="inputbox">
            <input type="text" name="uf" id="uf" value="<?php echo $endereco["uf"] ?>">
            <label for="uf">UF</label>
        </div>
        <br><br>
        <button type="submit" class="botão">Enviar</button>
        </td>


    </form>

    <!-- LOGIN -->

    <form id="formCadastroCliente" action="/controller/cliente/alterarClienteController.php" method="post">
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

    <div style="text-align: center;">
        <?php
            if ( isset( $_GET["sucesso"] ) && $_GET["sucesso"] == true ) {
                echo "Cadastro com sucesso!!!!";
            }
        ?>
    </div>
    <script>
    $(document).ready(function() {
        $('#cep').mask('00000-000');
    });
    </script>
</body>

</html>