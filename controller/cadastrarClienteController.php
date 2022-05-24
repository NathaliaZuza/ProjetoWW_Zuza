<?php
require_once '../dto/ClienteDTO.php';
require_once '../dao/ClienteDAO.php';

$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$telefone = $_POST["telefone"];
$cep = $_POST["cep"];
$endereco = $_POST["endereco"];
$num_casa = $_POST["num_casa"];
$complemento = $_POST["complemento"];
$cidade = $_POST["cidade"];
$uf = $_POST["uf"];
$email = $_POST["email"];
$senha = md5( $_POST["senha"] );
$usuario_id = $_POST["usuario_id"];

$clienteDTO = new ClienteDTO();
$clienteDTO->setNome( $nome );
$clienteDTO->setCpf( $cpf );
$clienteDTO->setTelefone( $telefone );
$clienteDTO->setCep( $cep );
$clienteDTO->setEndereco( $endereco );
$clienteDTO->setNum_casa( $num_casa );
$clienteDTO->setComplemento( $complemento );
$clienteDTO->setCidade( $cidade );
$clienteDTO->setUf( $uf );
$clienteDTO->setEmail( $email );
$clienteDTO->setSenha( $senha );
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