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
    <link rel="styleSheet" href="../css/tipoProduto.css">
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
        <div class="btn-logar2"><a href="../view/cadastro.php">
                <p id="cadastro">É novo por aqui? </p>Cadastre-se
            </a></div>
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
                <a href="/view/tipoproduto.php?categoria_id=1">
                    <span class="nomelink">Panfleto</span>
                </a>
            </li>
            <li class="produtoshover">
                <a href="/view/tipoproduto.php?categoria_id=2">
                    <span class="nomelink">Cartão de visita</span>
                </a>
            </li>
            <li class="produtoshover">
                <a href="/view/tipoproduto.php?categoria_id=3">
                    <span class="nomelink">Cardápio</span>
                </a>
            </li>
            <li class="produtoshover">
                <a href="/view/tipoproduto.php?categoria_id=4">
                    <span class="nomelink">Banner</span>
                </a>
            </li>
            <li class="produtoshover">
                <a href="/view/tipoproduto.php?categoria_id=5">
                    <span class="nomelink">Papel timbrado</span>
                </a>
            </li>
            <li class="carrinho">
                <a href="../carrinho.php">
                    <i class='bx bx-cart'></i>
                    <span>Carrinho</span>
                </a>
            </li>

        </ul>
    </div>
    <!------------PRODUTOS----------->
    <div class="div1">
    <div class="img-banner">
    <img src='../img/banner-panfleto-04.png'/>
    </div>
    <div class="pai">
  
        <?php
        require_once '../dao/ProdutoDAO.php';
        $produtoDAO = new ProdutoDAO();
        $produtos   = $produtoDAO->findByCategoria($categoria_id);

        if (!empty($produtos)) {
            foreach ($produtos as $produto) {
                echo "<div id='produtos'>";
                echo "  <div class='produto-single'>";
                                echo "      <div class='nome_produto'> {$produto["nome"]} </div>";
                echo "      <div class='img_produto'>";
                echo "          <p><img src='../img/produto/foto/{$produto["foto"]}' width='112'/></p>";
                echo "      </div>";

                echo "      <div class='preco'> R$ {$produto["preco"]} </div>";
                echo "<div class='info'>
                         <p>Cores: <span class='descricao'>{$produto["cores"]}</span></p>
                      </div>";

                echo    "<div class='info'>
                    <p>Material: <span class='descricao'>{$produto['material']}</span></p>
                    </div>";

                echo    "<div class='info'>
                    <p>Tamanho final: <span class='descricao'> {$produto["tamanho"]}</span></p>
                    </div>";

                echo    "<div class='info'>
                    <p>Quantidade: <span class='descricao'>{$produto["qtd"]}</span></p>
                    </div>";

                echo    "<div class='info'>
                    <p>Prazo de produção: <span class='descricao'>{$produto["prazo"]}</span></p>
                    </div>";

                echo    "<div class='btn-info'>
                        <a href='../carrinho.php'><p>Adicionar ao carrinho</p></a>
                    </div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "Não existe produtos cadastrados";
        }
        ?>

   
        </div> 
    </div>
</html>