<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes | WWZUZA</title>
    <link rel="stylesheet" href="/css/cadastroProduto.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="styleSheet" href="/css/listaProdutos.css">
    <link rel="shortcut icon" href="/img/lg-03.png"/>
    <link rel="stylesheet" href="/css/cadastroProduto.css"> 

 
    <script src="../lib/fontawesome-free-6.1.1-web/js/all.min.js"></script>
</head>

<body>  

    <?php
       require_once '../../dao/ClienteDAO.php';

    $clienteDAO = new ClienteDAO();
    $clientes = $clienteDAO->findAll();
    echo "<main class='container'>";
    echo "<div class='conteudo'>";
    echo "<h1>Listar clientes</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Nome</th>";   
    echo "<th>CPF</th>";
    echo "<th>Telefone</th>";
    echo "<th>Excluir</th>";
   
   foreach ($clientes as $cliente){        
        echo "<tr>";
        echo "<td >{$cliente["nome"]}</td>";
        echo "<td >{$cliente["cpf"]}</td>";
        echo "<td >{$cliente["telefone"]}</td>";
        echo "<td align=center><a onclick='return confirmarExcluir();'href='../../controller/cliente/excluirClienteController.php?excluirId={$cliente["id"]}'><i class='bx bxs-trash lixo'></a></i></td>";
        echo "</tr>";
        echo "</main>";
        echo "</div>";
    }
    ?>

</body>

</html>