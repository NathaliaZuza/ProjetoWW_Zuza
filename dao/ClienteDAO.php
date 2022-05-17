<?php
require_once 'conexao/Conexao.php';
require_once 'UsuarioDAO.php';

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
            $sql = 'INSERT INTO '
                . 'cliente(nome,cpf,telefone,cep,estado,cidade,endereco,numero_casa,usuario_id) '
                . 'VALUES(:nome,:cpf,:tel,:cep,:estado,:cidade,:endereco,:n_casa,:usuario_id)';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( ":nome", $clienteDTO->getNome() );
            $stmt->bindValue( ":cpf", $clienteDTO->getCpf() );
            $stmt->bindValue( ":tel", $clienteDTO->getTelefone() );
            $stmt->bindValue( ":cep", $clienteDTO->getCep() );
            $stmt->bindValue( ":estado", $clienteDTO->getEstado() );
            $stmt->bindValue( ":cidade", $clienteDTO->getCidade() );
            $stmt->bindValue( ":endereco", $clienteDTO->getEndereco() );
            $stmt->bindValue( ":n_casa", $clienteDTO->getNumero_casa() );
            $stmt->bindValue( ":usuario_id", $usuario_id );
            return $stmt->execute();

        } catch ( PDOException $e ) {
            echo "Erro ao cadastrar: ", $e->getMessage();
        }
    }

    public function findAll() {
        try {
            $sql = "SELECT * FROM cliente";
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
                $this->pdo->beginTransaction();
                $cliente = $this->findById( $idCliente );
    
                $sql = 'DELETE FROM tb_cliente WHERE id = ?';
                $stmt = $this->pdo->prepare( $sql );
                $stmt->bindValue( 1, $idCliente );
                $stmt->execute();
    
                $this->usuarioDAO->deleteById( $cliente["usuario"] );
                return $this->pdo->commit();
    
            } catch ( PDOException $e ) {
                $this->pdo->rollBack();
                echo 'Erro ao excluir um cliente ', $e->getMessage();
            }
        }
        
    public function findByEmail( $email ) {
    try {
        $sql = 'SELECT * FROM usuario WHERE email = ?';
        $stmt = $this->pdo->prepare( $sql );
        $stmt->bindValue( 1, $email );
        $stmt->execute();
        $cliente = $stmt->fetch( PDO::FETCH_ASSOC );
        return $cliente;
    } catch ( PDOException $e ) {
        echo 'Erro ao listar o cliente pelo email: ', $e->getMessage();
    }
}


public function findById( $id ) {
    try {
        $sql  = "SELECT * FROM cliente WHERE id = ?";
        $stmt = $this->pdo->prepare( $sql );
        $stmt->bindValue( 1, $id );
        $stmt->execute();
        $cliente = $stmt->fetch( PDO::FETCH_ASSOC );
        return $cliente;
    } catch ( PDOException $e ) {
        echo "Erro ao listar o cliente: ", $e->getMessage();
    }
}
}