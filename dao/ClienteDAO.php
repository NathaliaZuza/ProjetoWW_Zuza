<?php
require_once 'conexao/Conexao.php';

class ClienteDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function salvar( ClienteDTO $clienteDTO, $email, $senha ) {
        try {
            $sql = 'INSERT INTO '
                . 'usuario(email,senha) '
                . 'VALUES(:email,:senha)';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( ':email', $email );
            $stmt->bindValue( ':senha', $senha );
            $stmt->execute();
            $usuario_id = $this->pdo->lastInsertId();
            $sql        = 'INSERT INTO '
                . 'cliente(nome,cpf,telefone,usuario_id) '
                . 'VALUES(:nome,:cpf,:telefone,:usuario_id)';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( ":nome", $clienteDTO->getNome() );
            $stmt->bindValue( ":cpf", $clienteDTO->getCpf() );
            $stmt->bindValue( ":telefone", $clienteDTO->getTelefone() );
            $stmt->bindValue( ":usuario_id", $usuario_id );
            return $stmt->execute();

        } catch ( PDOException $e ) {
            echo "Erro ao cadastrar: ", $e->getMessage();
        }
    }

    public function findAll() {
        try {
            $sql  = "SELECT * FROM cliente";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->execute();
            $clientes = $stmt->fetchAll( PDO::FETCH_ASSOC );
            return $clientes;
        } catch ( PDOException $e ) {
            echo "Erro ao listar os clientes: ", $e->getMessage();
        }
    }

    public function deleteById( $idCliente ) {
        try {
            $cliente = $this->findById($idCliente);

            $sql  = 'DELETE FROM cliente WHERE id = ?';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $cliente["id"] );
            $stmt->execute();

            $sql = 'DELETE FROM usuario WHERE id = ?';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $cliente["usuario_id"] );
            return $stmt->execute();

        } catch ( PDOException $e ) {
            echo 'Erro ao excluir um cliente ', $e->getMessage();
        }
    }
     
    public function findById( $id ) {
        try {
            $sql  = 'SELECT c.id,c.nome,c.cpf,c.telefone,c.usuario_id,u.email,u.senha,u.perfil FROM cliente c INNER JOIN usuario u ON c.usuario_id = u.id WHERE c.id = ?';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $id );
            $stmt->execute();
            $cliente = $stmt->fetch( PDO::FETCH_ASSOC );
            return $cliente;
        } catch ( PDOException $e ) {
            echo 'Erro ao listar um cliente: ', $e->getMessage();
        }
    }

    public function update( ClienteDTO $clienteDTO ) {
        try {
            $sql = 'UPDATE cliente SET '
                . 'nome=?, cpf=?, telefone=? '
                . 'WHERE id=?';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $clienteDTO->getNome() );
            $stmt->bindValue( 2, $clienteDTO->getCpf() );
            $stmt->bindValue( 3, $clienteDTO->getTelefone() );
            $stmt->bindValue( 4, $clienteDTO->getId() );
            return $stmt->execute();

        } catch ( PDOException $e ) {
            echo 'Erro ao atualizar o cliente: ', $e->getMessage();
        }
    }

    public function updateSenha(ClienteDTO $clienteDTO) {
        $cliente = $this->findById($clienteDTO->getId());
        try {

            $sql = 'UPDATE usuario SET '
                . 'email=?, senha=? '
                . 'WHERE id=?';
             $stmt = $this->pdo->prepare( $sql );
             $stmt->bindValue( 1, $clienteDTO->getEmail() );
             $stmt->bindValue( 2, $clienteDTO->getSenha() );
             $stmt->bindValue( 3, $cliente["usuario_id"]);
             return $stmt->execute();

        } catch ( PDOException $e ) {
        }
        
        
    }

    public function findByEmail( $email ) {
        try {
            $sql  = 'SELECT * FROM usuario WHERE email = ?';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $email );
            $stmt->execute();
            $cliente = $stmt->fetch( PDO::FETCH_ASSOC );
            return $cliente;
        } catch ( PDOException $e ) {
            echo 'Erro ao listar o cliente pelo email: ', $e->getMessage();
        }
    }
}
?>