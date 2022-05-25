<?php
require_once 'conexao/Conexao.php';

class LoginDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function findByEmailSenha( $email, $senha ) {
        try {
            $sql = "SELECT u.email, c.id as idCliente, u.perfil FROM usuario u " .
                "INNER JOIN cliente c ON (c.usuario_id = u.id) " .
                "WHERE u.email = ? AND u.senha = ?";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $email );
            $stmt->bindValue( 2, $senha );
            $stmt->execute();
            $login = $stmt->fetch( PDO::FETCH_ASSOC );
            return $login;
        } catch ( PDOException $e ) {
            echo "Erro ao buscar o login {$e->getMessage()}";
        }
    }

}