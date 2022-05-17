<?php
require_once '../dao/ClienteDAO.php';

$clienteDAO = new ClienteDAO();
$clientes = $clienteDAO->findAll();

foreach ( $clientes as $cliente ) {
    echo $cliente["nome"];
    echo $cliente["cpf"];
    echo $cliente["telefone"];
}
