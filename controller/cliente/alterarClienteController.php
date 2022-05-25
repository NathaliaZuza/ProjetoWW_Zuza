<?php
require_once '/Documentos/GitHub/ProjetoWW_Zuza/dao/ClienteDAO.php';
require_once '/Documentos/GitHub/ProjetoWW_Zuza/dto/ClienteDTO.php';

$idCliente = $_POST["idCliente"];
$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$telefone = $_POST["telefone"];



$clienteDTO = new ClienteDTO();
$clienteDTO->setId( $idCliente );
$clienteDTO->setNome( $nome );
$clienteDTO->setCpf( $cpf );
$clienteDTO->setTelefone( $telefone );




$clienteDAO = new ClienteDAO();

if ( $clienteDAO->update( $clienteDTO ) ) {
    header( "Location: ../view/listarTodosClientes.php" );
}
