<?php
require_once '/Documentos/GitHub/ProjetoWW_Zuza/dao/ClienteDAO.php';
require_once '/Documentos/GitHub/ProjetoWW_Zuza/dao/ClienteDTO.php';

$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
 $telefone = $_POST["telefone"];
$email = $_POST["email"];
$senha = md5( $_POST["senha"] );
$usuario_id = $_POST["usuario_id"];

$clienteDTO = new ClienteDTO();
$clienteDTO->setNome( $nome );
$clienteDTO->setCpf( $cpf );
$clienteDTO->setTelefone( $telefone );
$clienteDTO->setEmail( $email );
$clienteDTO->setSenha( $senha );
$clienteDTO->setUsuario_id( $usuario_id );

$clienteDAO = new ClienteDAO();
$cliente = $clienteDAO->findByEmail( $email );

$error[1] = "Cadastrado com suceso!";
$error[2] = "Já existe um cliente cadastro com o email " . $email ;

if ( empty( $cliente ) ) {
    if ( $clienteDAO->salvar( $clienteDTO, $email, $senha ) ) {
        header( "Location: /view/cliente/formCadastrarCliente.php?msg={$error[1]}" );
    }
} else {
    header( "Location: /view/cliente/formCadastrarCliente.php?msg={$error[2]}" );
}

?>