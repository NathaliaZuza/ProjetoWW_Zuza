<?php
require_once '../dto/EnderecoDTO.php';
require_once '../dao/enderecoDAO.php';

$cep = $_POST["cep"];
$endereco = $_POST["endereco"];
$numero_casa = $_POST["numero_casa"];
$complemento = $_POST["complemento"];
$cidade = $_POST["cidade"];
$uf = $_POST["uf"];
$cliente_id = $_POST["cliente_id"];

$enderecoDTO = new EnderecoDTO();
$enderecoDTO->setCep( $cep );
$enderecoDTO->setEndereco( $endereco );
$enderecoDTO->setNumero_casa( $numero_casa );
$enderecoDTO->setComplemento( $complemento );
$enderecoDTO->setCidade( $cidade );
$enderecoDTO->setUf( $uf );
$enderecoDTO->setCliente_id( $cliente_id );

$clienteDAO = new ClienteDAO();

if ( empty( $cliente ) ) {
    if ( $clienteDAO->salvar( $clienteDTO ) ) {
        header( "Location: ../view/formCadastrarCliente.php?msg={$error[1]}" );
    }
} else {
    header( "Location: ../view/formCadastrarCliente.php?msg={$error[2]}" );
}
?>