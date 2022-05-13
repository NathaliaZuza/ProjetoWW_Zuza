<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/ca14b9e588.js" crossorigin="anonymous"></script>
    <title>WWZ | Serviços gráficos pra você.</title>
    <link rel="styleSheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/headerMenu.css">
</head>

<body>

  <?php include './view/headerMenu.php'?>

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
                <img src="../img/2.png" alt="">
            </div>
            <div class="image">
                <img src="../img/3.jpg" alt="">
            </div>
            <div class="image">
                <img src="../img/0.jpg" alt="">
            </div>
        </div>
        <div class="balls">
            <div class="imgAtual" id="0"></div>
            <div id="1"></div>
            <div id="2"></div>
            <div id="3"></div>
        </div>
    </div>

    <script src="js/scripts.js"></script>
    <!------------PRODUTOS----------->

    <h3>Produtos em destaque</h3>


    <div class="pai">

        <?php
            require_once './dao/ProdutoDAO.php';
            $produtoDAO = new ProdutoDAO();
            $produtos   = $produtoDAO->findAll();

            foreach ( $produtos as $produto ) {
                echo "<div id='produtos'>";
                echo "<div class='produto-single'>";

            ?>
                            <div class='img_produto'>
                            <p> <img src="../img/produto/foto/<?php echo $produto["foto"] ?>" width="112"/></p>
                            </div>
<?php
    echo
            "<div class='nome_produto'>
                            {$produto["nome"]}
                            </div>";

        echo "<div class='preco'>
                            <p>A partir de: </p>R$ {$produto["preco"]}<span id='undIndex'>/{$produto["qtd"]}</span>
                            </div>";

        echo "<div class='btn-info'>
                                <p>Mais informações</p>
                            </div>";
        echo "</div>";
        echo "</div>";
    }
?>

    </div>

</html>sadas