<?php
require_once '../dto/ProdutoDTO.php';
require_once '../dao/ProdutoDAO.php';
require_once '../util/Upload.php';

define( 'DIR_FOTO', $_SERVER['DOCUMENT_ROOT'] . "/img/produto/foto/" );

$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
$cores = $_POST["cores"];
$material = $_POST["material"];
$tamanho = $_POST["tamanho"];
$prazo = $_POST["prazo"];
$qtd = $_POST["qtd"];

$idProduto = $_POST["idProduto"];

$produtoDTO = new ProdutoDTO();
$produtoDTO->setNome($nome);
$produtoDTO->setDesc( $descricao );
$produtoDTO-> setPreco($preco);
$produtoDTO->setCores($cores);
$produtoDTO->setMaterial($material);
$produtoDTO-> setTamanho($tamanho);
$produtoDTO-> setPrazo($prazo);
$produtoDTO-> setQtd($qtd);
$produtoDTO->setId($idProduto);

$upload = new Upload($_FILES["foto"]);
$produtoDTO->setFoto(isset($_FILES["foto"]["name"]) && $_FILES["foto"]["error"] == 0 ? $upload->getNome($_FILES["foto"]) : $_POST["fotoOriginal"]);

/* echo "<pre>";
print_r($produtoDTO);
echo "</pre>";
exit(); */

$produtoDAO = new ProdutoDAO();

if ( $produtoDAO->update( $produtoDTO ) ) {
    $upload->salvar($_FILES["foto"], DIR_FOTO);
    header( "Location: ../view/Produtos.php" );
}

?>