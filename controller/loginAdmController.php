<?php
require_once "../dao/LoginAdmDAO.php";

$email = $_POST["email"];
$senha = $_POST["senha"];

$loginDAO = new LoginDAO();
$login = $loginDAO->findByEmailSenha( $email, $senha );
if ( !empty( $login ) ) {
    echo "Logado com sucesso";
} else {
    echo "Senha e/ou email incorreto!";
}