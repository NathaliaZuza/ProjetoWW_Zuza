<?php

require_once 'conexao/Conexao.php';

class ComentarioDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function salvar( ComentarioDTO $comentarioDTO ) {
        try {
            $sql = "INSERT INTO comentario "
                . "(comentario, cliente_id) "
                . "VALUES(?,?)";

            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $comentarioDTO->getComent() );
            $stmt->bindValue( 2, $comentarioDTO->getClienteId() );
            return $stmt->execute();
        } catch ( PDOException $e ) {
            echo $e->getMessage();
        }
    }
    public function findAll() {
        try {
            $sql  = "SELECT * FROM comentario";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->execute();
            $comentarios = $stmt->fetchAll( PDO::FETCH_ASSOC );
            return $comentarios;
        } catch ( PDOException $e ) {
            echo "erro ao listar comentarios: ", $e->getMessage();
        }
    }
    public function deleteById( $idComentario ) {
        try {
            $sql  = "DELETE FROM comentario WHERE id = ?";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $idComentario );
            return $stmt->execute();
        } catch ( PDOException $e ) {
            echo "Erro ao excluir", $e->getMessage();
        }
    }

    public function findById( $id ) {
        try {
            $sql  = "SELECT * FROM comentario WHERE id = ?";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $id );
            $stmt->execute();
            $comentario = $stmt->fetch( PDO::FETCH_ASSOC );
            return $comentario;
        } catch ( PDOException $e ) {
            echo "Erro ao listar o comentario: ", $e->getMessage();
        }
    }

    public function update( ComentarioDTO $comentarioDTO ) {
        try {
            $sql = "UPDATE comentario SET "
                . "comentario=? "
                . "WHERE id=?";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $comentarioDTO->getComent() );
            $stmt->bindValue( 2, $comentarioDTO->getId() );
            return $stmt->execute();

        } catch ( PDOException $e ) {
            echo "Erro ao comentar: ", $e->getMessage();
        }
    }

}

?>