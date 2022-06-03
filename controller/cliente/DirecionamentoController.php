<?php
session_start();
if (!isset($_SESSION['idCliente'])) {
    header( "Location: ../../../../view/pagsCentral/login.php" );
    
} else {
    $_SESSION['idCliente']++;
    header( "Location: /view/cliente/sidebarCliente.php" );
}
?>