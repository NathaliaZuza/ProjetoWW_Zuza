<?php

require_once 'conexao/Conexao.php';

class PagamentoDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function salvar( PagamentoDTO $pagamentoDTO ) {
        try {
            $sql = "INSERT INTO pagamento "
                . "(n_cartao, pedido_id, nome_cartao, validade, verificacao, cpf, data_nasc, parcelamento, cliente_id) "
                . "VALUES(?,?,?,?,?,?,?,?,?)";

            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $pagamentoDTO->getN_cartao() );
            $stmt->bindValue( 2, $pagamentoDTO->getPedido_id() );
            $stmt->bindValue( 3, $pagamentoDTO->getNome_cartao() );
            $stmt->bindValue( 4, $pagamentoDTO->getValidade() );
            $stmt->bindValue( 5, $pagamentoDTO->getVerificacao() );
            $stmt->bindValue( 6, $pagamentoDTO->getCpf() );
            $stmt->bindValue( 7, $pagamentoDTO->getData_nasc() );
            $stmt->bindValue( 8, $pagamentoDTO->getParcelamento() );
            $stmt->bindValue( 9, $pagamentoDTO->getCliente_id() );
            
            return $stmt->execute();
        } catch ( PDOException $e ) {
            echo $e->getMessage();
        }
    }
    public function findById( $id ) {
        try {
            $sql  = 'SELECT * FROM pagamento WHERE cliente_id = ?';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $id );
            $stmt->execute();
            $pagamento = $stmt->fetch( PDO::FETCH_ASSOC );
            return $pagamento;
        } catch ( PDOException $e ) {
            echo 'Erro ao listar um cartão: ', $e->getMessage();
        }
    }

}