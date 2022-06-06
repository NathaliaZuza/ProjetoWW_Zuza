<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/cadastro.css">
    <link rel="stylesheet" href="/css/alterarDadosCliente.css">
    <link rel="stylesheet" href="/css/headerMenu.css">
    <link rel="stylesheet" href="/css/minhaConta.css">
    <title>Document</title>
</head>
<body>
<?php
    session_start();
    require_once '../../dao/usuarioDAO.php';
    require_once '../../dao/ClienteDAO.php';

    $idCliente  = $_SESSION["idCliente"];
    $clienteDAO = new ClienteDAO();
    $cliente    = $clienteDAO->findById( $idCliente );

?>
    <h1 style="text-align: center; margin-top: 30px ;">Alterar senha</h1>

    <div class="container">

  
    <form id="formCadastroCliente" action="../../controller/cliente/alterarSenhaController.php" method="post">
    <input type="hidden" name="id" value="<?php echo $cliente["id"] ?>">
    <div class="inputbox">
                <input type="text" name="email" id="email" value="<?php echo $cliente["email"] ?>">
                <label for="email">Email</label>
            </div>
            <div class="inputbox">
                <input type="password" name="senha" id="senha">
                <label for="senha">Senha</label>
            </div>
            <br>
            <button type="submit" class="botão">Alterar</button>  
        </div>
</body>
</html>