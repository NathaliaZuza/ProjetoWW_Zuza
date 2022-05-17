<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes | WWZUZA</title>
    <link rel="stylesheet" href="../css/cadastroProduto.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="styleSheet" href="../css/listaProdutos.css">
    <link rel="stylesheet" href="../css/cadastroProduto.css"> 

 
    <script src="../lib/fontawesome-free-6.1.1-web/js/all.min.js"></script>
</head>

<body>  

<?php include 'sidebar.php'?>

    <?php
    require_once '../dao/ClienteDAO.php';

    $clienteDAO = new ClienteDAO();
    $clientes = $clienteDAO->findAll();
    echo "<main class='container'>";
    echo "<div class='conteudo'>";
    echo "<h1>Listar clientes</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Nome</th>";   
    echo "<th>CPF</th>";
    echo "<th>Telefone</th>";
    echo "<th>CEP</th>";
    echo "<th>Estado</th>";
    echo "<th>Endereco</th>";
    echo "<th>Casa</th>";
    echo "<th>Excluir</th>";
    echo "<th>Editar</th></tr>";
   
   foreach ($clientes as $cliente){        
        echo "<tr>";
        echo "<td >{$cliente["nome"]}</td>";
        echo "<td >{$cliente["cpf"]}</td>";
        echo "<td>{$cliente["telefone"]}</td>";
        echo "<td>{$cliente["endereco"]}</td>";
        echo "<td>{$cliente["estado"]}</td>";
        echo "<td>{$cliente["endereco"]}</td>";
        echo "<td>{$cliente["numero_casa"]}</td>";
        echo "<td align=center><a onclick='return confirmarExcluir();'href='../controller/excluirClienteController.php?excluirId={$cliente["id"]}'><i class='fa-solid fa-trash iconelixo'></a></i></td>";
        echo "  <td align='center'><a href='formAlterarCliente.php?id={$cliente["id"]}'><i class='fa-solid fa-pen-to-square icone'></a></i></td>";
        echo "</tr>";
        echo "</main>";
        echo "</div>";
    }
    ?>
<script>
        $(document).ready(function() {
            $('#cpf').mask('000.000.000-00');
            $('#tel').mask('(00) 00000-0000');
        });
    </script>

</body>

</html>