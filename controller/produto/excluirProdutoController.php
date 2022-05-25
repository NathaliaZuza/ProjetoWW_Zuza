<?php
require_once '/Documentos/GitHub/ProjetoWW_Zuza/dao/ProdutoDAO.php';
define( 'DIR_FOTO', $_SERVER['DOCUMENT_ROOT'] . "/img/produto/foto/" );

$idProduto = $_GET['excluirId'];
$nomeFoto = $_GET['foto'];

$produtoDAO = new ProdutoDAO();
if ($produtoDAO->deleteById($idProduto)){
    unlink(DIR_FOTO . $nomeFoto);
    header ("Location: /view/produto/Produtos.php");
}