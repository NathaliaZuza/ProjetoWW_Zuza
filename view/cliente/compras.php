<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listar compras</h1>

    <?php
       require_once '../../dao/ProdutoDAO.php';
       require_once '../../dao/CarrinhoDAO.php';
       require_once '../../dao/ClienteDAO.php';
       session_start();
       $idCliente = $_SESSION["idCliente"];
    $produtoDAO = new ProdutoDAO();  
    $carrinhoDAO = new CarrinhoDAO();
    $clienteDAO = new ClienteDAO();
    $carrinhos = $carrinhoDAO->findById($idCliente);
    $pedidos = $carrinhoDAO->findAllPedidos();
    

    echo "<main class='container2'>";
    echo "<div class='conteudo2'>";
      

   foreach ($carrinhos as $carrinho){  
        echo "<table border='1'>";
        // echo "<tr><th>Cliente</th>"; 
        // echo "<th>Valor</th>";
        // echo "<th>Produtos</th>"; 
        // echo "<th>Foto</th>";    
        // echo "<th>Data</th>";

        $cliente = $clienteDAO->findById($idCliente);      
        echo "<tr><th>Cliente</th>";
        echo "<td class='nome-lista'>{$cliente["nome"]}</td></tr>";     
        //echo "<td class='nome-lista'>";
     
            foreach($pedidos as $pedido){
                if($pedido['pedido_id'] == $carrinho['id']){
                    echo "<tr><th>Valor</th>";
                    echo "<td> {$pedido['preco']}</td></tr>";
                    $produto = $produtoDAO->findById($pedido['produto_id']);
                    echo "<tr><th>Produto:</th>"; 
                    echo "<td> {$produto['nome']} </td>";
                    echo "<tr><th>Quantidade</th>"; 
                    echo "<td> {$pedido['quantidade']} </td></tr>";
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
        echo "<td class='nome-lista'>{$carrinho["valor_total"]}</td>"; 
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