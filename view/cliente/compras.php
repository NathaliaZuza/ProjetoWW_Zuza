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
                echo "<div class='pedido-foto'>";
                echo    "<div class='nome-lista'>{$produto['nome']}</div>";  
                echo    "<div class='qtd'>{$pedido['quantidade']} </div></tr>";
                echo    "<div class='foto'><img src='../../img/produto/foto/{$produto['foto']}' width='200'/></div>"; 
                echo    "<div class='preco'> R$ " , number_format(($produto["preco"] * $pedido['quantidade'] ), 2, ",", "." ), "</div></tr>";
                echo "</div>";
            }
        }
    
?>   

<?php
        $dataCompra = new DateTime($carrinho["data"]);
        $diaCompra = $dataCompra->format('d');
        $mesCompra = $dataCompra->format('m') - 1;
        $anoCompra = $dataCompra->format('Y');
        $horaCompra = $dataCompra->format('H:i:s');

        $arrayAno = array('Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
        
        $dataExtenso = "{$diaCompra} de {$arrayAno[$mesCompra]} de {$anoCompra} as {$horaCompra}";
        echo "<div class='pedido'>";
        echo "<div class='realizado'>PEDIDO REALIZADO</div>";
        echo "<div class='nome-lista'>{$dataExtenso}</div>"; 
        echo "<div class='data' style='display: inline-block;'>VALOR TOTAL:</div>";
        echo "<div class='total-lista' style='font-size: 19px; display: inline-block; margin-left:7px;'>" , number_format(($carrinho["valor_total"]), 2, ",", "." ), "</div>"; 
        echo "</main>";
        echo "</div>";
        echo "</div>";
    } 
}
?>
</body>
</html>