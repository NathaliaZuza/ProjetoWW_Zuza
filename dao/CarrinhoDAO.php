<?php

require_once 'usuarioDAO.php';
require_once 'ProdutoDAO.php';
require_once 'conexao/Conexao.php';

class CarrinhoDAO {
    private $pdo;
    private $produtoDAO;

    public function __construct() {
        $this->pdo        = Conexao::getInstance();
        $this->produtoDAO = new ProdutoDAO();
    }

    public function finalizarCarrinho( $produtos, $idcliente, $total ) {
        try {
            $this->pdo->beginTransaction();
            $sql = 'INSERT INTO '
                . 'pedido(cliente_id,valor) '
                . 'VALUES(?,?)';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $idcliente );
            $stmt->bindValue( 2, $total );
            $stmt->execute();
            $idPedido = $this->pdo->lastInsertId();

            $sql = 'INSERT INTO '
                . 'pedido_tem_produto(produto_id,pedido_id,quantidade,preco) '
                . 'VALUES(?,?,?,?)';

            foreach ( $produtos as $key => $quantidade ) {
                $produto = $this->produtoDAO->findById( $key );
                $stmt    = $this->pdo->prepare( $sql );
                $stmt->bindValue( 1, $produto["id"] );
                $stmt->bindValue( 2, $idPedido );
                $stmt->bindValue( 3, $quantidade );
                $stmt->bindValue( 4, $produto["preco"] );
                $stmt->execute();
            }

            return $this->pdo->commit();

        } catch ( PDOException $e ) {
            echo 'Erro ao finalizar a compra: ', $e->getMessage();
        }
    }
}
?>