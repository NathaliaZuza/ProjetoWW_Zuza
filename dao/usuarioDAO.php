<?php
require_once 'conexao/Conexao.php';

class UsuarioDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function findByEmailSenha( $email, $senha ) {
        try {
            $sql = "SELECT * FROM usuario " .
                "WHERE email =? AND senha = ?";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $email );
            $stmt->bindValue( 2, $senha );
            $stmt->execute();
            $usuario = $stmt->fetch( PDO::FETCH_ASSOC );
            return $usuario;
        } catch ( PDOException $e ) {
            $e->getMessage();
        }
    }

    public function deleteById($idUsuario){
        try {
            $sql = 'DELETE FROM usuario WHERE id = ?';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $idUsuario );
            return $stmt->execute();
        } catch ( PDOException $e ) {
            echo 'Erro ao excluir o Usuario ', $e->getMessage();
        }
    }
    public function update( $email, $senha, $idUsuario ) {
        try {
            $sql = 'UPDATE usuario SET '
                . 'email=?, senha=? '
                . 'WHERE id=?';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $email );
            $stmt->bindValue( 2, $senha );
            $stmt->bindValue( 3, $idUsuario );
            return $stmt->execute();

        } catch ( PDOException $e ) {
            echo 'Erro ao atualizar o usuario: ', $e->getMessage();
        }
    }
    public function findById( $id ) {
        try {
            $sql  = 'SELECT * FROM usuario WHERE id = ?';
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