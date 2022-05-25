<?php
require_once 'conexao/Conexao.php';

class ClienteDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function salvar( EnderecoDTO $enderecoDTO ) {
        try {
            $sql = "INSERT INTO endereco_cliente "
                . "(cep, endereco, numero_casa, complemento, cidade, uf, cliente_id) "
                . "VALUES(:cep,:endereco,:numero_casa,:complemento,:cidade,:uf,:cliente_id)";
            $cliente_id = $this->pdo->lastInsertId();
            $stmt       = $this->pdo->prepare( $sql );
            $stmt->bindValue( ":cep", $enderecoDTO->getCep() );
            $stmt->bindValue( ":endereco", $enderecoDTO->getEndereco() );
            $stmt->bindValue( ":numero_casa", $enderecoDTO->getNumero_casa() );
            $stmt->bindValue( ":complemento", $enderecoDTO->getComplemento() );
            $stmt->bindValue( ":cidade", $enderecoDTO->getCidade() );
            $stmt->bindValue( ":uf", $enderecoDTO->getUf() );
            $stmt->bindValue( ":cliente_id", $cliente_id );
            return $stmt->execute();
        } catch ( PDOException $e ) {
            echo $e->getMessage();
        }
    }

    public function findById( $id ) {
        try {
            $sql  = 'SELECT * FROM endereco_cliente WHERE id = ?';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $id );
            $stmt->execute();
            $cliente = $stmt->fetch( PDO::FETCH_ASSOC );
            return $cliente;
        } catch ( PDOException $e ) {
            echo 'Erro ao listar um cliente: ', $e->getMessage();
        }
    }
}