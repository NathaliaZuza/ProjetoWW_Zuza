<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de produtos | WWZUZA</title>
    <link rel="stylesheet" href="../css/cadastroProduto.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="styleSheet" href="../css/listaProdutos.css">
    <script src="../lib/fontawesome-free-6.1.1-web/js/all.min.js"></script>

</head>

<body>  

    <?php
    require_once '../dao/ProdutoDAO.php';

    $produtoDAO = new ProdutoDAO();
    $produtos = $produtoDAO->findAll();
    echo "<main class='container'>";
    echo "<div class='conteudo'>";
    echo "<h1>Listar produtos</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Nome</th>";   
    echo "<th>Preço</th>";
    echo "<th>Cores</th>";
    echo "<th>Material</th>";
    echo "<th>Tamanho</th>";
    echo "<th>Quantidade</th>";
    echo "<th>Prazo</th>";
    echo "<th>Excluir</th>";
    echo "<th>Editar</th></tr>";
   
   foreach ($produtos as $produto){        
        echo "<tr>";
        echo "<td >{$produto["nome"]}</td>";
        echo "<td >{$produto["preco"]}</td>";
        echo "<td>{$produto["cores"]}</td>";
        echo "<td>{$produto["material"]}</td>";
        echo "<td>{$produto["tamanho"]}</td>";
        echo "<td>{$produto["qtd"]}</td>";
        echo "<td>{$produto["prazo"]}</td>";
        echo "<td align=center><a onclick='return confirmarExcluir();'href='../controller/excluirProdutoController.php?excluirId={$produto["id"]}'><i class='fa-solid fa-trash iconelixo'></a></i></td>";
        echo "  <td align='center'><a href='formAlterarProduto.php?id={$produto["id"]}'><i class='fa-solid fa-pen-to-square icone'></a></i></td>";
        echo "</tr>";
        echo "</main>";
        echo "</div>";
    }
    ?>


</body>

</html>