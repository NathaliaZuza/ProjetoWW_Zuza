<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/cadastro.css">
    <link rel="stylesheet" href="/css/headerMenu.css">
    <link rel="stylesheet" href="/css/minhaConta.css">
    <link rel="stylesheet" href="/css/listaProdutosCliente.css">
    <title>Meus pedidos | WWZUZA</title>
</head>
<body>


<?php
   require_once '../../dao/ProdutoDAO.php';
   require_once '../../dao/CarrinhoDAO.php';
   require_once '../../dao/ClienteDAO.php';
   session_start();
   $idCliente = $_SESSION["idCliente"];
$produtoDAO = new ProdutoDAO();  
$carrinhoDAO = new CarrinhoDAO();
$clienteDAO = new ClienteDAO();
$carrinhos = $carrinhoDAO->findAll();
$pedidos = $carrinhoDAO->findAllPedidos();


echo "<main class='container'>";
echo "<div class='conteudo'>";
  echo "<h1>Meus pedidos</h1>";
foreach ($carrinhos as $carrinho){
    if($carrinho['cliente_id'] == $idCliente){
        echo "<table border='1'>";

        $cliente = $clienteDAO->findById($idCliente);      
    
        foreach($pedidos as $pedido){
            if($pedido['pedido_id'] == $carrinho['id']){
               
                $produto = $produtoDAO->findById($pedido['produto_id']);
                echo "<tr><th>Produto:</th>"; 
                echo "<td> {$produto['nome']} </td>";
                echo "<td><img src='../../img/produto/foto/{$produto['foto']}' width='112' /></tr>"; 
                echo "<tr><th>Valor</th>";
                echo "<td>" , number_format(($pedido["preco"]), 2, ",", "." ), "</td></tr>";
                echo "<tr><th>Quantidade</th>"; 
                echo "<td> {$pedido['quantidade']} </td></tr>";
                echo "</td>";
            }
        }
    

?>   

<?php
        echo "<tr>";
        echo "<th>Data</th>";
        echo "<td class='nome-lista'>{$carrinho["data"]}</td>"; 
        echo "</tr>";
        echo "<tr>";
        echo "<th>Valor total:</th>";
        echo "<td class='nome-lista'>" , number_format(($carrinho["valor_total"]), 2, ",", "." ), "</td>"; 
        echo "</tr>";
        echo "</main>";
        echo "</div>";
    } else{
        echo "<div class='vazio'>";
        echo "<p id='vazio'>Você nao possui nenhum pedido finalizado</p>";
        echo "<div class='continuarComprando-btn'><p><a href='../../index.php'>Continuar comprando</a></p></div>";
        echo "</div>";
    }
}
?>
</body>
</html>