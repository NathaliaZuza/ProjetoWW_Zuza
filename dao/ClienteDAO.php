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

    public function deleteById( $id ) {
        try {
            $sql = 'DELETE FROM cliente WHERE id = ?';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $id );
            return $stmt->execute();
        } catch ( PDOException $e ) {
            echo 'Erro ao excluir um cliente ', $e->getMessage();
        }
    }

    public function findById( $id ) {
        try {
            $sql = 'SELECT * FROM cliente WHERE id = ?';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $id );
            $stmt->execute();
            $cliente = $stmt->fetch( PDO::FETCH_ASSOC );
            return $cliente;
        } catch ( PDOException $e ) {
            echo 'Erro ao listar um cliente: ', $e->getMessage();
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
public function update( ClienteDTO $clienteDTO ) {
    try {
        $sql = 'UPDATE cliente SET '
            . 'nome=?, cpf=?, telefone=?, cep=?, estado=?, cidade=?, endereco=?, numero_casa=? '
            . 'WHERE id=?';
        $stmt = $this->pdo->prepare( $sql );
        $stmt->bindValue( 1, $clienteDTO->getNome() );
        $stmt->bindValue( 2, $clienteDTO->getCpf() );
        $stmt->bindValue( 3, $clienteDTO->getTelefone() );
        $stmt->bindValue( 4, $clienteDTO->getCep() );
        $stmt->bindValue( 5, $clienteDTO->getEstado() );
        $stmt->bindValue( 6, $clienteDTO->getCidade() );
        $stmt->bindValue( 7, $clienteDTO->getEndereco() );
        $stmt->bindValue( 8, $clienteDTO->getNumero_casa() );
        $stmt->bindValue( 9, $clienteDTO->getId() );
        return $stmt->execute();

    } catch ( PDOException $e ) {
        echo 'Erro ao atualizar o cliente: ', $e->getMessage();
    }
}
}