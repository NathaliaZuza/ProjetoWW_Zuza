<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/jquery.mask.min.js"></script>
    <link rel="shortcut icon" href="/img/lg-03.png" />
    <script src="../js/jquery-validation-1.19.3/dist/jquery.validate.min.js"></script>
    <script src="https://kit.fontawesome.com/ca14b9e588.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/css/cadastro.css">
    <link rel="styleSheet" href="/css/listaProdutos.css">
    <link rel="stylesheet" href="/css/headerMenu.css">

    <script>
        $(document).ready(function() {
            $('#cep').mask('00000-000');
        });
    </script>

    <title>Minha conta | WWZ</title>
</head>

<body>
    <?php
        session_start();
        require_once '../../dao/ClienteDAO.php';
        $idCliente = $_SESSION["idCliente"];
        $clienteDAO = new ClienteDAO();
        $cliente    = $clienteDAO->findById( $idCliente );

        require_once '../../dao/enderecoDAO.php';
        $enderecoDAO = new EnderecoDAO();
        $endereco    = $enderecoDAO->findById( $idCliente );
    ?>

    <div class="containerpai">

        <main class='container'>
        <div class='conteudo'>
        <h1>Listar os dados do cliente</h1>
        <table>
            <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>Excluir</th>
            <th>Editar</th></tr>
            <tr>

        <?php
        echo "<td>{$cliente["nome"]}</td>";
        echo   "<td>{$cliente["cpf"]}</td>";
        echo   "<td>{$cliente["telefone"]}</td>";
        echo   "<td align=center class='lixo'><a onclick='return confirmarExcluir();'href='../controller/excluirClienteController.php?excluirId={$cliente["id"]}'><i  class='bx bxs-trash lixo'></a></i></td>";
        echo   "<td align='center' class='icone'><a href='../cliente/AtualizarDadosCLiente.php?id={$cliente["id"]}'><i class='bx bx-edit'></a></i></td>";
        echo   "</tr>";
        echo   "</main>";
        echo   "</div>";
        ?>
    </div>

    <div class='conteudo'>

        <table>
            <tr>
            <th>CEP</th>
            <th>Endereço</th>
            <th>Nº casa</th>
            <th>Complemento</th>
            <th>Cidade</th>
            <th>UF</th>
            <th>Excluir</th>
            <th>Editar</th></tr>
            <tr>

        <?php
        echo "<td>{$endereco["cep"]}</td>";
        echo   "<td>{$endereco["endereco"]}</td>";
        echo   "<td>{$endereco["numero_casa"]}</td>";
        echo   "<td>{$endereco["complemento"]}</td>";
        echo   "<td>{$endereco["cidade"]}</td>";
        echo   "<td>{$endereco["uf"]}</td>";       
        echo   "<td align=center class='lixo'><a onclick='return confirmarExcluir();'href='../controller/excluirEnderecoController.php?excluirId={$endereco["id"]}'><i  class='bx bxs-trash lixo'></a></i></td>";
        echo   "<td align='center' class='icone'><a href='../cliente/AtualizarDadosendereco.php?id={$endereco["id"]}'><i class='bx bx-edit'></a></i></td>";
        echo   "</tr>";
        echo   "</main>";
        echo   "</div>";
        ?>
    </div>

    </main>
</body>

</html>