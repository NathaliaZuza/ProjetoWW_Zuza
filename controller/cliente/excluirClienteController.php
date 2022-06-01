<?php
require_once '../../dao/ClienteDAO.php';

session_start();
$perfil['perfil'] = $_SESSION['perfil'];

$idCliente = $_GET['excluirId'];

$clienteDAO = new ClienteDAO();

if ( $clienteDAO->deleteById( $idCliente ) ) {
     if ( $perfil['perfil'] == 'Administrador' ) {
     header( "Location: ../../view/cliente/listarTodosClientes.php" );
 } else if ( $perfil['perfil'] == 'Cliente' ) {
     echo '<script> parent.window.location.href = "../../index.php"; </script>';
 }}

?>
