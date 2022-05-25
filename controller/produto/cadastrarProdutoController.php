<?php
require_once '/Documentos/GitHub/ProjetoWW_Zuza/dao/ProdutoDAO.php';
require_once '/Documentos/GitHub/ProjetoWW_Zuza/dto/ProdutoDTO.php';
require_once '/Documentos/GitHub/ProjetoWW_Zuza/dto/CategoriaDTO.php';
require_once '/Documentos/GitHub/ProjetoWW_Zuza/dao/CategoriaDAO.php';
require_once '/Documentos/GitHub/ProjetoWW_Zuza/util/Upload.php';

define( 'DIR_FOTO', $_SERVER['DOCUMENT_ROOT'] . "/img/produto/foto/" );

$categoriaId = $_POST["categoria"];
$nome        = $_POST["nome"];
$descricao   = $_POST["descricao"];
$preco       = $_POST["preco"];
$cores       = $_POST["cores"];
$material    = $_POST["material"];
$tamanho     = $_POST["tamanho"];
$prazo       = $_POST["prazo"];
$qtd         = $_POST["qtd"];
$foto        = $_FILES["foto"];

$upload = new Upload( $foto );

$produtoDTO = new ProdutoDTO();
$produtoDTO->setCategoriaId( $categoriaId );
$produtoDTO->setNome( $nome );
$produtoDTO->setDesc( $descricao );
$produtoDTO->setPreco( $preco );
$produtoDTO->setCores( $cores );
$produtoDTO->setMaterial( $material );
$produtoDTO->setTamanho( $tamanho );
$produtoDTO->setPrazo( $prazo );
$produtoDTO->setQtd( $qtd );
$produtoDTO->setFoto( isset( $foto ) && $foto["error"] == 0 ? $upload->getNome( $foto ) : null );

$produtoDAO = new ProdutoDAO();
if ( $produtoDAO->salvar( $produtoDTO ) ) {
    $msg = true;
    $upload->salvar( $foto, DIR_FOTO );
    header( "Location: /view/produto/formCadastrarProduto.php?sucesso=$msg" );
} else {
    $msg2 = false;
    header( "Location: /view/produto/formCadastrarProduto.php?sucesso=$msg2" );
}
?>
