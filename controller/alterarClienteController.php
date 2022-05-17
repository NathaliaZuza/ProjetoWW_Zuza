<?php
require_once '../dto/ClienteDTO.php';
require_once '../dao/ClienteDAO.php';

$idCliente = $_POST["idCliente"];
$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$telefone = $_POST["telefone"];
$cep = $_POST["cep"];
$estado = $_POST["estado"];
$cidade = $_POST["cidade"];
$endereco = $_POST["endereco"];
$numero_casa = $_POST["numero_casa"];


$clienteDTO = new ClienteDTO();
$clienteDTO->setId( $idCliente );
$clienteDTO->setNome( $nome );
$clienteDTO->setCpf( $cpf );
$clienteDTO->setTelefone( $telefone );
$clienteDTO->setCep($cep);
$clienteDTO->setEstado($estado);
$clienteDTO->setCidade($cidade);
$clienteDTO->setEndereco($endereco);
$clienteDTO->setNumero_casa($numero_casa);



$clienteDAO = new ClienteDAO();

if ( $clienteDAO->update( $clienteDTO ) ) {
    header( "Location: ../view/listarTodosClientes.php" );
}

// Wendel