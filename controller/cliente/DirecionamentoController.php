<?php
session_start();
if ( !isset( $_SESSION['idCliente'] ) ) {
    header( "Location: ../../../../view/pagsCentral/login.php" );

} else if ( $_SESSION["perfil"] == "Administrador" ) {
    header( "Location: ../../view/pagsCentral/sidebar.php" );
} else {
    header( "Location: /view/cliente/sidebarCliente.php" );
}
?>