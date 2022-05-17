<?php
require_once '../dao/ClienteDAO.php';

$clienteDAO = new ClienteDAO();
$clientes = $clienteDAO->findAll();

foreach ( $clientes as $cliente ) {
    echo $cliente["nome"];
    echo $cliente["cpf"];
    echo $cliente["telefone"];
    echo $cliente["cep"];
    echo $cliente["estado"];
    echo $cliente["cidade"];
    echo $cliente["endereco"];
    echo $cliente["numero_casa"];
}
