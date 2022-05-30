<?php
require_once 'conexao/Conexao.php';

class EnderecoDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function salvar( EnderecoDTO $enderecoDTO ) {
        try {
            $sql = "INSERT INTO endereco_cliente "
                . "(cep, endereco, numero_casa, complemento, cidade, uf, cliente_id) "
                . "VALUES(:cep,:endereco,:numero_casa,:complemento,:cidade,:uf,:cliente_id)";

                $stmt       = $this->pdo->prepare( $sql );
            $stmt->bindValue( ":cep", $enderecoDTO->getCep() );
            $stmt->bindValue( ":endereco", $enderecoDTO->getEndereco() );
            $stmt->bindValue( ":numero_casa", $enderecoDTO->getNumero_casa() );
            $stmt->bindValue( ":complemento", $enderecoDTO->getComplemento() );
            $stmt->bindValue( ":cidade", $enderecoDTO->getCidade() );
            $stmt->bindValue( ":uf", $enderecoDTO->getUf() );
            $stmt->bindValue( ":cliente_id", $enderecoDTO->getCliente_id() );
            return $stmt->execute();
        } catch ( PDOException $e ) {
            echo $e->getMessage();
        }
    }

    public function findById( $id ) {
        try {
            $sql  = 'SELECT * FROM endereco_cliente WHERE cliente_id = ?';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $id );
            $stmt->execute();
            $endereco = $stmt->fetch( PDO::FETCH_ASSOC );
            return $endereco;
        } catch ( PDOException $e ) {
            echo 'Erro ao listar um cliente: ', $e->getMessage();
        }
    }

    public function update( EnderecoDTO $enderecoDTO ) {
        try {
            $sql = 'UPDATE endereco_cliente SET '
                . 'cep=?, endereco=?, numero_casa=?, complemento=?, cidade-?, uf=?, '
                . 'WHERE cliente_id=?';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $enderecoDTO->getCep() );
            $stmt->bindValue( 2, $enderecoDTO->getEndereco() );
            $stmt->bindValue( 3, $enderecoDTO->getNumero_casa() );
            $stmt->bindValue( 4, $enderecoDTO->getComplemento() );
            $stmt->bindValue( 5, $enderecoDTO->getCidade() );
            $stmt->bindValue( 6, $enderecoDTO->getUf() );
            $stmt->bindValue( 7, $enderecoDTO->getCliente_id() );
            return $stmt->execute();

        } catch ( PDOException $e ) {
            echo 'Erro ao atualizar o endereço: ', $e->getMessage();
        }
    }
    
    public function deleteById( $idCliente ) {
        try {
            $sql  = 'DELETE FROM endereco_cliente WHERE cliente_id = ?';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $idCliente );
            return $stmt->execute();
        } catch ( PDOException $e ) {
            echo 'Erro ao excluir o endereço ', $e->getMessage();
        }
    }
}