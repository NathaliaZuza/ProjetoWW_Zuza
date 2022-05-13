<?php

require_once 'conexao/Conexao.php';

class CategoriaDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function salvar( CategoriaDTO $categoriaDTO ) {
        try {
            $sql = "INSERT INTO categoria"
                . "(nome)"
                . "VALUES(?)";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $categoriaDTO->getNome() );
            return $stmt->execute();
        } catch ( PDOException $e ) {
            echo $e->getMessage();
        }
    }
    public function findAll() {
        try {
            $sql  = "SELECT * FROM categoria";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->execute();
            $categorias = $stmt->fetchAll( PDO::FETCH_ASSOC );
            return $categorias;
        } catch ( PDOException $e ) {
            echo "erro ao listar categorias: ", $e->getMessage();
        }
    }
    public function deleteById( $idCategoria ) {
        try {
            $sql  = "DELETE FROM categoria WHERE id = ?";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $idCategoria );
            return $stmt->execute();
        } catch ( PDOException $e ) {
            echo "Erro ao excluir", $e->getMessage();
        }
    }

    public function findById( $id ) {
        try {
            $sql  = "SELECT * FROM categoria WHERE id = ?";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $id );
            $stmt->execute();
            $categoria = $stmt->fetch( PDO::FETCH_ASSOC );
            return $categoria;
        } catch ( PDOException $e ) {
            echo "Erro ao listar o categoria: ", $e->getMessage();
        }
    }
    public function update( CategoriaDTO $categoriaDTO ) {
        try {
            $sql = "UPDATE categoria SET "
                . "nome=? "
                . "WHERE id=?";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $categoriaDTO->getNome() );
            $stmt->bindValue( 2, $categoriaDTO->getId() );
            return $stmt->execute();

        } catch ( PDOException $e ) {
            echo "Erro ao cadastrar: ", $e->getMessage();
        }
    }

}

?>