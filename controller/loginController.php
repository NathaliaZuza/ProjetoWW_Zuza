<?php
require_once "../dao/LoginDAO.php";

$email = $_POST["email"];
$senha = md5( $_POST["senha"] );

$loginDAO = new LoginDAO();
$login = $loginDAO->findByEmailSenha( $email, $senha );
if ( !empty( $login ) ) {
    header ("Location: ../view/sidebarCliente.php");
} else {
    echo "Senha e/ou email incorreto!";
}