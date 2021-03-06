<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/ca14b9e588.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>WWZ | Serviços gráficos pra você.</title>
    <link rel="shortcut icon" href="/img/lg-03.png"/>
    <link rel="styleSheet" href="/css/itemProduto.css">
    <link rel="stylesheet" href="/css/headerMenu.css">
</head>

<body>
    <div class="box">
        <ul class="nav-logar">
            <li>
                <a href="/index.php">
                    <span class="logo">WW.ZUZA</span>
                </a>
            </li>
        </ul>
        <div class="btn-logar">
            <a href="/view/pagsCentral/login.php">
                <img id="img-account" src="/img/my account-02.png" alt="">
                Minha conta</a>
        </div>
        <div class="btn-logar2"><a href="/view/cliente/formCadastrarCliente.php">
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
                <a href="/view/produto/tipoproduto.php?categoria_id=1">
                    <span class="nomelink">Panfleto</span>
                </a>
            </li>
            <li class="produtoshover">
                <a href="/view/produto/tipoproduto.php?categoria_id=2">
                    <span class="nomelink">Cartão de visita</span>
                </a>
            </li>
            <li class="produtoshover">
                <a href="/view/produto/tipoproduto.php?categoria_id=3">
                    <span class="nomelink">Cardápio</span>
                </a>
            </li>
            <li class="produtoshover">
                <a href="/view/produto/tipoproduto.php?categoria_id=4">
                    <span class="nomelink">Banner</span>
                </a>
            </li>
            <li class="carrinho">
                <a href="/carrinho.php">
                    <i class='bx bx-cart'></i>
                </a>
            </li>
        </ul>
    </div>

    <div class="pai">

       <?php
       require_once '../../dao/ProdutoDAO.php';

       $produto_id = $_GET['id'];
       $produtoDAO = new ProdutoDAO();
       $produto   = $produtoDAO->findById($produto_id);

       if (!empty($produto)) {

        echo "<div class='container'>";
        echo "  <div class='div-img'>";
        echo "      <p><img src='/img/produto/foto/{$produto["foto"]}' width='112'/></p>";
        echo "  </div>";

        echo "  <div class='div-info'>";
        echo "      <div class='nome_produto'>
                        {$produto["nome"]}
                    </div>";

        echo "      <div class='desc_produto'>
                        {$produto["descricao"]}
                    </div>";

        echo    "<div class='preco'>
                        <p>A partir de: </p>R$ ", number_format(($produto["preco"]), 2, ",", "." ), "<span id='undIndex'>/{$produto["qtd"]}</span>
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

        echo        "<div class='btn-info'>
                        <a href='/controller/produto/carrinhoController.php?id={$produto["id"]}&acao=add'><p> <i class='bx bxs-cart'></i>ADICIONAR AO CARRINHO</p></a>
                    </div>";               
        echo    "</div>";
        echo "</div>";

       } else {
           echo "Não existe produtos cadastrados";
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
