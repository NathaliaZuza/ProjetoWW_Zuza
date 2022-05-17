<?php
require_once '../dao/ClienteDAO.php'; //excluirClienteController.php
$idCliente = $_GET['id'];
$clienteDAO = new ClienteDAO();
if ( $clienteDAO->deleteById( $idCliente ) ) {
    header( "Location: ../view/listarTodosClientes.php" );
}