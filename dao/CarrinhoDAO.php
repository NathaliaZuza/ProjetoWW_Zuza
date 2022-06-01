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
                . 'pedido(cliente_id,valor_total) '
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
    public function findAll() {
            try {
                $sql  = "SELECT * FROM pedido";
                $stmt = $this->pdo->prepare( $sql );
                $stmt->execute();
                $pedidos = $stmt->fetchAll( PDO::FETCH_ASSOC );
                return $pedidos;
            } catch ( PDOException $e ) {
                echo "erro ao listar pedidos: ", $e->getMessage();
            }
        }
    public function findById( $id ) {
        try {
            $sql  = "SELECT * FROM pedido WHERE cliente_id=?";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $id );
            $stmt->execute();
            $pedido = $stmt->fetch( PDO::FETCH_ASSOC );
            return $pedido;
        } catch ( PDOException $e ) {
            echo "Erro ao listar o pedido: ", $e->getMessage();
        }
    }
    public function findAllPedidos() {
        try {
            $sql  = "SELECT * FROM pedido_tem_produto";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->execute();
            $pedidos = $stmt->fetchAll( PDO::FETCH_ASSOC );
            return $pedidos;
        } catch ( PDOException $e ) {
            echo "erro ao listar pedidos: ", $e->getMessage();
        }
    }
}
?>