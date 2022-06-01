<?php
require_once '../../dao/EnderecoDAO.php';
require_once '../../dto/EnderecoDTO.php';

$id = $_POST["id"];
$cep = $_POST["cep"];
$endereco = $_POST["endereco"];
$numero_casa = $_POST["numero_casa"];
$complemento = $_POST["complemento"];
$cidade = $_POST["cidade"];
$uf = $_POST["uf"];
$cliente_id = $_POST["cliente_id"];

$enderecoDTO = new EnderecoDTO();
$enderecoDTO->setId( $id );
$enderecoDTO->setCep( $cep );
$enderecoDTO->setEndereco( $endereco );
$enderecoDTO->setNumero_casa( $numero_casa );
$enderecoDTO->setComplemento( $complemento );
$enderecoDTO->setCidade( $cidade );
$enderecoDTO->setUf( $uf );
$enderecoDTO->setCliente_id( $cliente_id );

$enderecoDAO = new EnderecoDAO();

if ( $enderecoDAO->update( $enderecoDTO ) ) {
    header( "Location: ../../view/cliente/listarTodosClientes.php" );
}