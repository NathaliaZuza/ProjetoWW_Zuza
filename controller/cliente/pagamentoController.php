<?php
require_once '../../dto/PagamentoDTO.php';
require_once '../../dao/PagamentoDAO.php';

$n_cartao = $_POST["n_cartao"];
$pedido_id = $_POST["pedido_id"];

$nome_cartao = $_POST["nome_cartao"];
$validade = $_POST["validade"];
$verificacao = $_POST["verificacao"];
$cpf = $_POST["cpf"];
$data_nasc = $_POST["data_nasc"];
$parcelamento = $_POST["parcelamento"];
$cliente_id = $_POST["cliente_id"];

$pagamentoDTO = new PagamentoDTO();
$pagamentoDTO->setN_cartao( $n_cartao );
$pagamentoDTO->setPedido_id( $pedido_id );
$pagamentoDTO->setNome_cartao( $nome_cartao );
$pagamentoDTO->setValidade( $validade );
$pagamentoDTO->setVerificacao( $verificacao );
$pagamentoDTO->setCpf( $cpf );
$pagamentoDTO->setData_nasc( $data_nasc );
$pagamentoDTO->setParcelamento( $parcelamento );
$pagamentoDTO->setCliente_id( $cliente_id );

$pagamentoDAO = new PagamentoDAO();

if ( $pagamentoDAO->salvar( $pagamentoDTO ) ) {
    header( "Location: ../../carrinho.php" );
} 
?>