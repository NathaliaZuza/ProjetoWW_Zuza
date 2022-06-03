<?php
require_once '../../dao/loginDAO.php';

session_start();

$email = $_POST["email"];
$senha = md5( $_POST["senha"] );

$loginDAO = new LoginDAO();
$login    = $loginDAO->findByEmailSenha( $email, $senha );
if ( !empty( $login ) ) {
    header( "Location: ../../../../view/cliente/sidebarCliente.php" );
} else {
    header( "Location: ../../../../view/pagsCentral/login.php" );
};