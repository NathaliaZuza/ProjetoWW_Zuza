<?php
require_once '../../dao/ProdutoDAO.php';
require_once '../../dto/ProdutoDTO.php';
require_once '../../dao/CategoriaDAO.php';
require_once '../../dto/CategoriaDTO.php';
require_once '../../dao/ClienteDAO.php';
require_once '../../dto/ClienteDTO.php';
require_once '../../dto/ComentarioDTO.php';
require_once '../../dao/ComentarioDAO.php';

$comentarioDTO = new ComentarioDTO();
$comentarioDTO->setClienteId( $clienteId );
$comentarioDTO->setComent( $comentario );

$clienteId = $_POST["cliente_id"];
$comentario        = $_POST["comentario"];
$idComentario = $_POST["idComentario"];

$comentarioDAO = new ComentarioDAO();
if ( $comentarioDAO->salvar( $comentarioDTO ) ) {
    $msg = true;
    header( "Location: ../../index.php?sucesso=$msg" );
} else {
    $msg2 = false;
    header( "Location: ../../index.php?sucesso=$msg2" );
}
?>
