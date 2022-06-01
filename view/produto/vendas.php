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
       require_once '../../dao/CarrinhoDAO.php';
       require_once '../../dao/ClienteDAO.php';

    $produtoDAO = new ProdutoDAO();  
    $carrinhoDAO = new CarrinhoDAO();
    $clienteDAO = new ClienteDAO();
    $carrinhos = $carrinhoDAO->findAll();
    $pedidos = $carrinhoDAO->findAllPedidos();

    echo "<main class='containerVendas'>";
    echo "<div class='conteudoVendas'>";
    echo "<h1>Listar Pedidos</h1>";   
   
   foreach ($carrinhos as $carrinho){  
        echo "<table class='tableVendas' border='1'>";
        // echo "<tr><th>Cliente</th>"; 
        // echo "<th>Valor</th>";
        // echo "<th>Produtos</th>"; 
        // echo "<th>Foto</th>";    
        // echo "<th>Data</th>";

        $cliente = $clienteDAO->findById($carrinho['cliente_id']);      
        echo "<tr><th class='tableVendas' width='20%'>Cliente</th>";
        echo "<td class='nome-lista'>{$cliente["nome"]}</td></tr>";     
        //echo "<td class='nome-lista'>";
     
            foreach($pedidos as $pedido){
                if($pedido['pedido_id'] == $carrinho['id']){
                    echo "<tr><th>Valor</th>";
                    echo "<td>", number_format(($pedido["preco"]), 2, ",", "." ), "</td></tr>";
                    $produto = $produtoDAO->findById($pedido['produto_id']);
                    echo "<tr><th>Produto:</th>"; 
                    echo "<td> {$produto['nome']} </td>";
                    echo "<tr><th>Quantidade</th>"; 
                    echo "<td> {$pedido['quantidade']} </td></tr>";
                    echo "<tr><th>Imagem</th>"; 
                    echo "<td><div class='img_produto'>";
                    echo "<p> <img src='/img/produto/foto/{$produto['foto']}' width='112' /></p>";
                    echo "</div>";
                    echo "</td>";
                }
            }  
    ?>   
        <!-- <td><div class='img_produto'>
                <p> <img src="/img/produto/foto/<?php echo $produto["foto"] ?>" width="112" /></p>
            </div>
        </td>
        </tr> -->
    <?php
        echo "<tr>";
        echo "<th>Data</th>";
        echo "<td class='nome-lista'>{$carrinho["data"]}</td>"; 
        echo "</tr>";
        echo "<tr>";
        echo "<th>Valor total:</th>";
        echo "<td class='total-lista'>", number_format(($carrinho["valor_total"]), 2, ",", "." ), "</td>"; 
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