<?php 
session_start();
if (!isset($_SESSION['carrinho'])){
    $_SESSION['carrinho'] =  [];
}
$idProduto = $_GET["id"];
$acao = $_GET["acao"];

if ( $acao == "add" ) {
    if ( !isset($_SESSION['carrinho'][$idProduto])){
        $_SESSION['carrinho'][$idProduto] = 1;
    } else{
        $_SESSION['carrinho'][$idProduto] += 1;
    }
    header ("Location: /carrinho.php");
}
if ( $acao == "del1") {
    if ( !isset($_SESSION['carrinho'][$idProduto])){
        $_SESSION['carrinho'][$idProduto] = 1;
    } else if (($_SESSION['carrinho'][$idProduto].$qtde == 1)){ 
        unset($_SESSION['carrinho'][$idProduto]);
    }else{
        $_SESSION['carrinho'][$idProduto] -= 1;
    }
    header ("Location: /carrinho.php");
}  
// echo print_r('($_SESSION["carrinho"][$qtde])') ;
// die();

if ( $acao == "del" ) {
    if ( isset($_SESSION['carrinho'][$idProduto])){
        unset($_SESSION['carrinho'][$idProduto]);
    } else{
        $_SESSION['carrinho'][$idProduto] += 1;
    }
    header ("Location: /carrinho.php");
}


?>