<?php
require_once '../dao/ClienteDAO.php';
$idCliente = $_GET['excluirId'];
$clienteDAO = new ClienteDAO();
if ( $clienteDAO->deleteById( $idCliente ) ) {
     header( "Location: ../view/listarTodosClientes.php" );
}