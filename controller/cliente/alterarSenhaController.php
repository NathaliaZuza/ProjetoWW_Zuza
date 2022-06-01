<?php
require_once '../../dao/usuarioDAO.php';


$id = $_POST["id"];
$email = $_POST["email"];
$senha = md5( $_POST["senha"] );

$usuarioDAO = new UsuarioDAO();

if ( $usuarioDAO->update( $email, $senha, $id  ) ) {
    header( "Location: ../../view/cliente/AtualizarDadosCLiente.php" );
}