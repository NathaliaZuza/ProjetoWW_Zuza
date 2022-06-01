<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendas | WWZUZA</title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="styleSheet" href="/css/listaProdutos.css">
    <link rel="shortcut icon" href="/img/lg-03.png"/>
    <script src="../lib/fontawesome-free-6.1.1-web/js/all.min.js"></script>
</head>

<body>  
    <?php
       require_once '../../dao/ProdutoDAO.php';

    $carrinhoDAO = new CarrinhoDAO();
    $pedidos = $pedidoDAO->findAll();

    echo "<main class='container2'>";
    echo "<div class='conteudo2'>";
    echo "<table border='1'>";
    echo "<tr><th>Nome</th>"; 
    echo "<th>Foto</th>";    
    echo "<th>Descrição</th>";  
   
   foreach ($produtos as $produto){        
        echo "<tr>";
        echo "<td class='nome-lista'>{$produto["nome"]}</td>";     
    ?>   
        <td><div class='img_produto'>
                <p> <img src="/img/produto/foto/<?php echo $produto["foto"] ?>" width="112" /></p>
            </div>
        </td>
    <?php
        echo "<td >{$produto["descricao"]}</td>";

        echo "</tr>";
        echo "</main>";
        echo "</div>";
   }
    ?>

    <script>
          function confirmarExcluir(){
            return confirm("Você está apagando um produto do catálogo. Tem certeza que deseja excluir?");
        } 
    </script>


</body>

</html>