<?php
require_once '../../dao/ClienteDAO.php';
require_once '../../dto/ClienteDTO.php';

$id = $_POST["id"];
$email = $_POST["email"];
$senha = md5( $_POST["senha"] );

$clienteDTO = new ClienteDTO();
$clienteDTO->setId( $id );
$clienteDTO->setSenha( $senha );
$clienteDTO->setEmail($email);

$clienteDAO = new ClienteDAO();

if ( $clienteDAO->updateSenha( $clienteDTO ) ) {
    header( "Location: ../../view/cliente/AtualizarDadosCLiente.php" );
}