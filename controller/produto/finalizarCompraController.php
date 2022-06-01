<?php

require_once '../../dao/ProdutoDAO.php';
require_once '../../dao/CarrinhoDAO.php';

session_start();

$produtos = $_SESSION['carrinho'];
$idCliente = $_SESSION["idCliente"];

$produtoDAO = new ProdutoDAO();

$total = 0;

foreach ($produtos as $key => $quantidade){
    $produto = $produtoDAO->findById($key);
    $total += $produto["preco"] * $quantidade;
}

$carrinhoDAO = new CarrinhoDAO();

if ($carrinhoDAO->finalizarCarrinho($produtos, $idCliente, $total)) {
    unset($_SESSION['carrinho']);
    header("Location: ../../carrinho.php");
}
?>