<?php
require_once '../dto/ClienteDTO.php';
require_once '../dao/ClienteDAO.php';

$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$telefone = $_POST["tel"];
$email = $_POST["email"];
$senha = md5( $_POST["senha"] );
$cep = $_POST["cep"];
$estado = $_POST["estado"];
$cidade = $_POST["cidade"];
$endereco = $_POST["endereco"];
$numero_casa = $_POST["numero_casa"];
$usuario_id = $_POST["usuario_id"];

$clienteDTO = new ClienteDTO();
$clienteDTO->setNome( $nome );
$clienteDTO->setCpf( $cpf );
$clienteDTO->setTelefone( $telefone );
$clienteDTO->setEmail( $email );
$clienteDTO->setSenha( $senha );
$clienteDTO->setCep( $cep );
$clienteDTO->setEstado( $estado );
$clienteDTO->setCidade( $cidade );
$clienteDTO->setEndereco( $endereco );
$clienteDTO->setNumero_casa( $numero_casa );
$clienteDTO->setUsuario_id( $usuario_id );

$clienteDAO = new ClienteDAO();
$cliente = $clienteDAO->findByEmail( $email );

$error[1] = "Cadastrado com suceso!";
$error[2] = "Já existe um cliente cadastro com o email " . $email ;

if ( empty( $cliente ) ) {
    if ( $clienteDAO->salvar( $clienteDTO, $email, $senha ) ) {
        header( "Location: ../view/formCadastrarCliente.php?msg={$error[1]}" );
    }
} else {
    header( "Location: ../view/formCadastrarCliente.php?msg={$error[2]}" );
}


?>