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
    <link rel="stylesheet" href="/css/minhaConta.css">

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

        require_once '../../dao/PagamentoDAO.php';
        $pagamentoDAO = new PagamentoDAO();
        $pagamento    = $pagamentoDAO->findById( $idCliente );

    ?>

    <div class="containerpai">

        <main class='container'>
            <div class='conteudo'>
                <h1>Listar os dados do cliente</h1>                       
        <?php
            echo "<div class='div1'>";
            echo "<div class='nome'>{$cliente["nome"]}</div>";
            echo   "<div class='light'>Telefone: {$cliente["telefone"]} </div>";
            echo   "<div class='light'>{$cliente["cpf"]} </div>";

            echo "<div class='atualizar'>";
                echo   "<div class='atualizar2'><td align=center class='lixo'><a onclick='return confirmarExcluir();'href='../../controller/cliente/excluirClienteController.php?excluirId={$cliente["id"]}'>Excluir </a></div>";
                echo   "<div class='atualizar'><td align='center' class='icone'><a href='../cliente/AtualizarDadosCLiente.php?id={$cliente["id"]}'>Alterar</a></div>"; 
            echo   "</div>";
            echo   "</div>";
            // echo   "<div><td align='center' class='icone'><a href='../cliente/AtualizarDadosCLiente.php?id={$cliente["id"]}'><i class='bx bx-edit'></a></i></div>";
            echo "<div class='endereco'><a href='../cliente/cadastrarEndereco.php?id=" . $cliente["id"] . "'><div class='mais'>+</div>
            Adicionar endereço</a></div>";
            echo "<div>{$endereco["cep"]}</div>";
            echo   "<div>{$endereco["endereco"]}</div>";
            echo   "<div>{$endereco["numero_casa"]}</div>";
            echo   "<div>{$endereco["complemento"]}</div>";
            echo   "<div>{$endereco["cidade"]}</div>";
            echo   "<div>{$endereco["uf"]}</div>";       
            echo   "<div align=center class='lixo'><a onclick='return confirmarExcluir();'href=/controller/cliente/excluirEnderecoController.php?excluirId={$cliente["id"]}'><i  class='bx bxs-trash lixo'></a></i></div>";
            echo   "<div align='center' class='icone'><a href='../../view/cliente/AtualizarDadosCliente.php?id={$cliente["id"]}'><i class='bx bx-edit'></a></i></div>";
            echo   "</main>";
            echo   "</div>";
           
        ?>
            </div>
        </main>
</body>

</html>