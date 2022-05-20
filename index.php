<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/ca14b9e588.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="shortcut icon" href="/img/lg-03.png"/>
    <title>WWZ | Serviços gráficos pra você.</title>
    <link rel="styleSheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/headerMenu.css">
</head>

<body>

    <?php include './view/headerMenu.php' ?>

    <!------------CARROSSEL DE IMAGENS----------->

    <div class="slide">
        <div class="slides">
            <div class="btn" id="voltar">
                <i class="fas fa-chevron-left"></i>
            </div>
            <div class="btn" id="next">
                <i class="fas fa-chevron-right"></i>
            </div>

            <div class="image" id="atual">
                <img src="../img/bannerteste-01.png" alt="">
            </div>
            <div class="image">
                <img src="../img/1.png" alt="">
            </div>
            <!-- <div class="image">
                <img src="../img/3.jpg" alt="">
            </div>
            <div class="image">
                <img src="../img/0.jpg" alt="">
            </div> -->
        </div>
        <div class="balls">
            <div class="imgAtual" id="0"></div>
            <div id="1"></div>
            <!-- <div id="2"></div>
            <div id="3"></div> -->
        </div>
    </div>

    <script src="js/scripts.js"></script>

    <!------------PRODUTOS----------->

    <h3>Todos os produtos</h3>


    <div class="pai">

        <?php
        require_once './dao/ProdutoDAO.php';
        $produtoDAO = new ProdutoDAO();
        $produtos   = $produtoDAO->findAll();
        

        foreach ($produtos as $produto) {
            echo "<div id='produtos'>";
            echo    "<div class='produto-single'>";

        ?>
            <div class='img_produto'>
                <p> <img src="../img/produto/foto/<?php echo $produto["foto"] ?>" width="112" /></p>
            </div>
        <?php
            echo
            "<div class='nome_produto'>
                            {$produto["nome"]}
                     </div>";

            echo   "<div class='preco'>
                        <p>A partir de: </p>R$ {$produto["preco"]}<span id='undIndex'>/{$produto["qtd"]}</span>
                     </div>";

            echo    "<div class='btn-info'>
                   <a href='view/itemProduto.php?id={$produto["id"]}'><p>Mais informações</p></a>
                    </div>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>

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
</html>
