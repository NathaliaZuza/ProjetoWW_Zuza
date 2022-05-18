<?php
require_once '../dao/ClienteDAO.php';
$id = $_GET['id'];
$clienteDAO = new ClienteDAO();
if ( $clienteDAO->deleteById( $id ) ) {
    // header( "Location: ../view/listarTodosClientes.php" );
}