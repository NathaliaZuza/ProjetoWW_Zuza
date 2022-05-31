<?php
require_once '../../dao/enderecoDAO.php';
require_once '../../dto/EnderecoDTO.php';

$idEndereco = $_POST["idEndereco"];
$cep = $_POST["cep"];
$endereco = $_POST["endereco"];
$numero_casa = $_POST["numero-casa"];
$cliente_id = $_POST["cliente_id"];
$complemento = $_POST["complemento"];
$cidade = $_POST["cidade"];
$uf = $_POST["uf"];
$idCliente = $_POST["idCliente"];

$enderecoDTO = new EnderecoDTO();
$enderecoDTO->setId( $idEndereco );
$enderecoDTO->setCep( $cep );
$enderecoDTO->setEndereco( $endereco );
$enderecoDTO->setNumero_casa( $numero_casa );
$enderecoDTO->setCliente_id( $cliente_id );
$enderecoDTO->setComplemento( $complemento );
$enderecoDTO->setCidade( $cidade );
$enderecoDTO->setUf( $uf );
$enderecoDTO->setCliente_id( $cliente_id );

$enderecoDAO = new EnderecoDAO();

if ( $enderecoDAO->update( $enderecoDTO ) ) {
    header( "Location: ../view/listarTodosClientes.php" );
}