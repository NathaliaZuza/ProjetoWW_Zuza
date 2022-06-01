<?php
require_once '../../dao/loginDAO.php';

session_start();

$email = $_POST["email"];
$senha = md5( $_POST["senha"] );

$loginDAO = new LoginDAO();
$login    = $loginDAO->findByEmailSenha( $email, $senha );
if ( !empty( $login ) ) {

    $_SESSION["idCliente"] = $login['idCliente'];
    $_SESSION["perfil"] = $login["perfil"];

    if ( $login['perfil'] == 'Administrador' ) {
        header( "Location: /view/pagsCentral/sidebar.php" );
    } else if ( $login['perfil'] == 'Cliente' ) {
        header( "Location: /view/cliente/sidebarCliente.php" );
    }

} else {
    echo "Senha e/ou email incorreto!";
}