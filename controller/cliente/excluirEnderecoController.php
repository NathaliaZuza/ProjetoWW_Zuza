<?php
require_once '../../dao/enderecoDAO.php';
$idCliente = $_GET['excluirId'];
$enderecoDAO = new EnderecoDAO();

if ( $enderecoDAO->deleteById( $idCliente ) ) {
     header( "Location: ../../view/cliente/minhaConta.php" );
}