<?php
    $categoria_id = $_GET['categoria_id'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/ca14b9e588.js" crossorigin="anonymous"></script>
    <title>WWZ | Serviços gráficos pra você.</title>
    <link rel="styleSheet" href="../css/panfleto.css">
    <link rel="stylesheet" href="../css/headerMenu.css">

</head>

<body>

<div class="box">
        <ul class="nav-logar">
            <li>
                <a href="/index.php">
                    <span class="logo">WW.ZUZA</span>
                </a>
            </li>
            <li>
                <div class="inputSearch">
                    <i class='bx bx-search'></i>
                    <input type="text" name="pesquisar" placeholder="Pesquise um produto...">
                </div>
            </li>
        </ul>
        <div class="btn-logar">
            <a href="../view/login.php">
                <img id="img-account" src="../img/my account-02.png" alt="">
                Minha conta</a>
        </div>
        <div class="btn-logar2"><a href="../view/cadastro.php"><p id="cadastro">É novo por aqui? </p>Cadastre-se</a></div>
    </div>


    <!------------MENU----------->

    <div class="menu">
        <ul class="nav-list">
            <li>
                <a href="/index.php">
                    <i class='bx bxs-store'></i>
                    <span class="nomelink" id="home">Todos os produtos</span>
                </a>
            </li>

            <li class="produtoshover">
                <a href="#">
                    <span class="nomelink">Panfleto</span>
                </a>
            </li>
            <li class="produtoshover">
                <a href="#">
                    <span class="nomelink">Cartão de visita</span>
                </a>
            </li>
            <li class="produtoshover">
                <a href="#">
                    <span class="nomelink">Cardápio</span>
                </a>
            </li>
            <li class="produtoshover">
                <a href="#">
                    <span class="nomelink">Banner</span>
                </a>
            </li>
            <li class="produtoshover">
                <a href="#">
                    <span class="nomelink">Papel timbrado</span>
                </a>
            </li>
            <li class="carrinho">
                <a href="carrinho.php">
                    <i class='bx bx-cart'></i>
                    <span>Carrinho</span>
                </a>
            </li>

        </ul>
    </div>
    <!------------PRODUTOS----------->

    <div class="pai">

        <?php
            require_once '../dao/ProdutoDAO.php';
            $produtoDAO = new ProdutoDAO();
            $produtos   = $produtoDAO->findByCategoria( $categoria_id );

            //var_dump( $produtos );
            //[0]=> array(10) { ["id"]=> string(1) "1" ["nome"]=> string(12) "Panfleto 4x1" ["preco"]=> string(5) "70,00" ["cores"]=> string(3) "4x0" ["material"]=> string(13) "Papel Couchê" ["tamanho"]=> string(11) "15cm x 10cm" ["prazo"]=> string(13) "3 dias úteis" ["qtd"]=> string(6) "5000un" ["foto"]=> string(17) "627bfb295a9a0.png" ["categoria_id"]=> string(1) "1" }
            if ( !empty( $produtos ) ) {
                foreach ( $produtos as $produto ) {
                    echo "<div id='produtos'>";
                    echo "  <div class='produto-single'>";
                    echo "      <div class='img_produto'>";
                    echo "          <p><img src='../img/produto/foto/{$produto["foto"]}' width='112'/></p>";
                    echo "      </div>";
                    echo "      <div class='nome_produto'> {$produto["nome"]} </div>";
                    echo "      <div class='preco'> R$ {$produto["preco"]} </div>";
                    echo "  </div>";
                    echo "</div>";

                }
            } else {
                echo "Não existe produtos cadastrados";
            }
        ?>

    </div>

</html>