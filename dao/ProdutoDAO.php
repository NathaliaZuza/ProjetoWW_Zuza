<?php

require_once 'conexao/Conexao.php';

class ProdutoDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function salvar( ProdutoDTO $produtoDTO ) {
        try {
            $sql = "INSERT INTO produto "
                . "(nome, descricao, preco, cores, material, tamanho, prazo, qtd, foto, categoria_id) "
                . "VALUES(?,?,?,?,?,?,?,?,?,?)";

            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $produtoDTO->getNome() );
            $stmt->bindValue( 2, $produtoDTO->getDesc() );
            $stmt->bindValue( 3, $produtoDTO->getPreco() );
            $stmt->bindValue( 4, $produtoDTO->getCores() );
            $stmt->bindValue( 5, $produtoDTO->getMaterial() );
            $stmt->bindValue( 6, $produtoDTO->getTamanho() );
            $stmt->bindValue( 7, $produtoDTO->getPrazo() );
            $stmt->bindValue( 8, $produtoDTO->getQtd() );
            $stmt->bindValue( 9, $produtoDTO->getFoto() );
            $stmt->bindValue( 10, $produtoDTO->getCategoriaId() );
            return $stmt->execute();
        } catch ( PDOException $e ) {
            echo $e->getMessage();
        }
    }
    public function findAll() {
        try {
            $sql  = "SELECT * FROM produto";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->execute();
            $produtos = $stmt->fetchAll( PDO::FETCH_ASSOC );
            return $produtos;
        } catch ( PDOException $e ) {
            echo "erro ao listar produtos: ", $e->getMessage();
        }
    }
    public function deleteById( $idProduto ) {
        try {
            $sql  = "DELETE FROM produto WHERE id = ?";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $idProduto );
            return $stmt->execute();
        } catch ( PDOException $e ) {
            echo "Erro ao excluir", $e->getMessage();
        }
    }

    public function findById( $id ) {
        try {
            $sql  = "SELECT * FROM produto WHERE id = ?";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $id );
            $stmt->execute();
            $produto = $stmt->fetch( PDO::FETCH_ASSOC );
            return $produto;
        } catch ( PDOException $e ) {
            echo "Erro ao listar o produto: ", $e->getMessage();
        }
    }

    public function findByCategoria( $id ) {
        try {
            $sql  = "SELECT * FROM produto WHERE categoria_id = ?";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $id );
            $stmt->execute();
            $produtos = $stmt->fetchAll( PDO::FETCH_ASSOC );
            return $produtos;
        } catch ( PDOException $e ) {
            echo "Erro ao listar o produto: ", $e->getMessage();
        }
    }

    public function update( ProdutoDTO $produtoDTO ) {
        try {
            $sql = "UPDATE produto SET "
                . "nome=?, descricao=?, preco=?, cores=?, material=?, tamanho=?, prazo=?, qtd=?, foto=? "
                . "WHERE id=?";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $produtoDTO->getNome() );
            $stmt->bindValue( 2, $produtoDTO->getDesc() );
            $stmt->bindValue( 3, $produtoDTO->getPreco() );
            $stmt->bindValue( 4, $produtoDTO->getCores() );
            $stmt->bindValue( 5, $produtoDTO->getMaterial() );
            $stmt->bindValue( 6, $produtoDTO->getTamanho() );
            $stmt->bindValue( 7, $produtoDTO->getPrazo() );
            $stmt->bindValue( 8, $produtoDTO->getQtd() );
            $stmt->bindValue( 9, $produtoDTO->getFoto() );
            $stmt->bindValue( 10, $produtoDTO->getId() );
            return $stmt->execute();

        } catch ( PDOException $e ) {
            echo "Erro ao cadastrar: ", $e->getMessage();
        }
    }

}

?>