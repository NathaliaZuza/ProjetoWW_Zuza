<?php

require_once '../../dao/ProdutoDAO.php';
require_once '../../dao/CarrinhoDAO.php';
require_once '../../dao/PagamentoDAO.php';
require_once '../../dto/PagamentoDTO.php';

session_start();

$produtos = $_SESSION['carrinho'];
$idCliente = $_SESSION["idCliente"];

$produtoDAO = new ProdutoDAO();

$total = 0;

foreach ($produtos as $key => $quantidade){
    $produto = $produtoDAO->findById($key);
    $total += $produto["preco"] * $quantidade;
}

$carrinhoDAO = new CarrinhoDAO();

$pedido_id = $carrinhoDAO->finalizarCarrinho($produtos, $idCliente, $total);

if ($pedido_id != "0") {
    $n_cartao = $_POST["n_cartao"];
    $nome_cartao = $_POST["nome_cartao"];
    $validade = $_POST["validade"];
    $verificacao = $_POST["verificacao"];
    $cpf = $_POST["cpf"];
    $data_nasc = $_POST["data_nasc"];
    $parcelamento = $_POST["parcelamento"];
    
    $pagamentoDTO = new PagamentoDTO();
    $pagamentoDTO->setN_cartao( $n_cartao );
    $pagamentoDTO->setPedido_id( $pedido_id );
    $pagamentoDTO->setNome_cartao( $nome_cartao );
    $pagamentoDTO->setValidade( $validade );
    $pagamentoDTO->setVerificacao( $verificacao );
    $pagamentoDTO->setCpf( $cpf );
    $pagamentoDTO->setData_nasc( $data_nasc );
    $pagamentoDTO->setParcelamento( $parcelamento );
    $pagamentoDTO->setCliente_id( $idCliente );

    $pagamentoDAO = new PagamentoDAO();

    $pagamentoDAO->salvar( $pagamentoDTO ) ;
    unset($_SESSION['carrinho']);
    header("Location: ../../carrinho.php");
} 
?>