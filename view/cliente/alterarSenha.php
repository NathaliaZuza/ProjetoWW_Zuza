<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        session_start();
        require_once '../../dao/ClienteDAO.php';

        $idCliente = $_SESSION["idCliente"];
        $clienteDAO = new ClienteDAO();
        $cliente    = $clienteDAO->findById( $idCliente );
        
        ?>
    <h1>alterar senha</h1>

    <form id="formCadastroCliente" action="../../controller/cliente/alterarSenhaController.php" method="post">
    <input type="hidden" name="id" value="<?php echo $cliente["id"] ?>">
    <div class="inputbox">
                <input type="text" name="email" id="email" value="<?php echo $cliente["email"] ?>">
                <label for="email">email</label>
            </div>
            <div class="inputbox">
                <input type="password" name="senha" id="senha" value="<?php echo $cliente["senha"] ?>">
                <label for="senha">Senha</label>
            </div>
            <button type="submit" class="botão">Enviar</button>
</body>
</html>