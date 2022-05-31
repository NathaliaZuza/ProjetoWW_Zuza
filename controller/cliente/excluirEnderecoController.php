<?php
require_once '../../dao/EnderecoDAO.php';
$idCliente = $_GET['excluirId'];
$enderecoDAO = new EnderecoDAO();

if ( $enderecoDAO->deleteById( $idCliente ) ) {
     header( "Location: ../../view/cliente/minhaConta.php" );
}