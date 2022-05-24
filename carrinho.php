<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu carrinho | WWZ</title>
    <link rel="styleSheet" href="./css/carrinho.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="shortcut icon" href="/img/lg-03.png" />
    <link rel="stylesheet" href="../css/headerMenu.css">
</head>

<body>

    <?php include './view/headerMenu.php';
    include_once './DAO/ProdutoDAO.php';
    include_once './DAO/CategoriaDAO.php';
    include_once './DTO/ProdutoDTO.php';
    include_once './DTO/CategoriaDTO.php';
    ?>

<!------------CARRINHO----------->
    <?php
    session_start();
    ?>
<div class='pai'>
    <div class="endereco">
        <h2> <i class='bx bxs-map'></i>SELECIONE O ENDEREÇO</h2>
        <p>Endereço 1</p>
        <p>NOME COMPLETO</p>
        <p>ENDEREÇO/RUA</p>
        <p>BAIRRO/CIDADE</p>
        <p>ESTADO/CEP</p>
        <div class="linha"></div>
        <p>Endereço 2</p>
        <p>NOME COMPLETO</p>
        <p>ENDEREÇO/RUA</p>
        <p>BAIRRO/CIDADE</p>
        <p>ESTADO/CEP</p>
        <div class="linha"></div>
    </div>
    
<?php
    require_once './dao/ProdutoDAO.php';
    $produtoDAO = new ProdutoDAO();
    $produtos   = $produtoDAO->findAll();
    $total      = 0;

    if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {

        foreach ($_SESSION['carrinho'] as $key => $qtde) {
            $produto = $produtoDAO->findById($key);
            $total += $produto["preco"] * $qtde;
            
             echo "<div class='container'>";
?>
    
<?php

        echo "  <div class='div-img'>";
        echo "      <p><img src='../img/produto/foto/{$produto["foto"]}' width='112'/></p>";
        echo "  </div>";

        echo "  <div class='div-info'>";
        echo "      <div class='nome_produto'>
                        {$produto["nome"]}
                    </div>";
                    
        echo "  <div class='menos1_carrinho'>
                    <a href='../controller/carrinhoController.php?id={$produto["id"]}&acao=del1'>
                        - 
                    </a>
                </div>";

        echo "  <div class='qtd'> 
                    {$qtde}
                </div>";

        echo    "<div class='menos1_carrinho'>
                    <a href='./controller/carrinhoController.php?id={$produto["id"]}&acao=add'>
                        +
                    </a>
                </div>";

        echo "      <div class='desc_produto'>
                        {$produto["descricao"]}
                    </div>";

        echo    "<div class='preco'>
                        <p>R$ ", number_format(($produto["preco"]), 2, ",", "." ), "<span id='undIndex'></span></p>
                    </div>";
        echo "      <div class='info'>
                        <p>Cores: <span class='descricao'>{$produto["cores"]}</span></p>
                    </div>";

        echo        "<div class='info'>
                        <p>Material: <span class='descricao'>{$produto['material']}</span></p>
                    </div>";

        echo        "<div class='info'>
                        <p>Tamanho final: <span class='descricao'> {$produto["tamanho"]}</span></p>
                    </div>";

        echo        "<div class='info'>
                        <p>Quantidade: <span class='descricao'>{$produto["qtd"]}</span></p>
                    </div>";

        echo        "<div class='info'>
                        <p>Prazo de produção: <span class='descricao'>{$produto["prazo"]}</span></p>
                    </div>";
                    echo "  <div class='subtotal_carrinho'>
                    Subtotal: R$ ", number_format(($produto["preco"] * $qtde), 2, ",", "."),
        "       </div>";

        echo "  <div class='remover_carrinho'>
                    <a href='../controller/carrinhoController.php?id={$produto["id"]}&acao=del'>
                        Remover item <i class='bx bx-trash'></i>
                    </a>";           
        echo    "</div>";
        echo "</div>";
        
        }  ?>
        
        <div class="resumo">
            <h3><i class='bx bxs-notepad'></i>RESUMO</h3>
        </div>
    <?php    
        echo "  <div class='total_carrinho'>
                    Total R$ ", number_format($total, 2, ",", "."),
             "  </div>";
    } else {
        echo "Não existe produtos no carrinho!";
    }
    ?>
</div>


<!---------FOOTER---------->

    <!--  <div class="imgCarrrinho">
            <img src="../img/carrinho-01.png">
        </div> -->

    <footer>
        <div class="social">
            <p><span class="logo">WW.ZUZA</span></p>
            <div class="socialcirc">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-whatsapp"></a>
                <p>Copyright © 2022 Todos os <br> direitos reservados</p>
            </div>
        </div>
        <!--   <div class="pagamento">
            <p>Formas de pagamento:</p>
            <p>
                <img src="./img/pagamento-07.png" width="70x">
                <img src="./img/pagamento-08.png" width="70px">
            </p>
        </div> -->
        <div class="criacao">
            <p id="criado">Criado por: <span id="autores">Nathália Zuza, Weskley Borges e Wendel Barbosa</span></p>
        </div>
    </footer>
</body>

</html>