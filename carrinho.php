<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu carrinho | WWZ</title>
    <link rel="styleSheet" href="./css/estilo.css">
    <link rel="styleSheet" href="./css/carrinho.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../lib/bootstrap-5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="shortcut icon" href="/img/lg-03.png"/>
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

<h2 id="carrinhotitle">Carrinho</h2>
<!-- . "(nome, preco, cores, material, tamanho, prazo, qtd, foto, categoria_id) " -->



<div class="pai">

    <?php
     session_start();
        require_once './dao/ProdutoDAO.php';
        $produtoDAO = new ProdutoDAO();
        $produtos   = $produtoDAO->findAll();


        foreach ($produtos as $produto) {
            echo "<div id='produtos'>";
            echo    "<div class='produto-single2'>";

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
                        R$ {$produto["preco"]}<span id='undIndex'>/{$produto["qtd"]}</span>
                    </div>";

            echo    "<div class='btn-carrinho'>
                        <a href='./controller/carrinhoController.php?id={$produto["id"]}&acao=add'><p>Adicionar ao carrinho</p></a>
                    </div>";
            echo "</div>";
            echo "</div>";
        }
    ?>
</div>

   
<!---------CARRINHO---------->

<div class="container mt-3">
        <?php
            require_once './dao/ProdutoDAO.php';
            $produtoDAO = new ProdutoDAO();
            $total      = 0;
        
            echo "<div>";
            if ( isset( $_SESSION['carrinho'] ) && !empty( $_SESSION['carrinho'] ) ) {

                foreach ( $_SESSION['carrinho'] as $key => $qtde ) {
                    $produto = $produtoDAO->findById( $key );
                    $total += $produto["preco"] * $qtde;
                    echo "<div class='carrinho'>";
                    
                    echo "  <div class='nomeCarrinho'>
                                {$produto["nome"]}
                            </div>";

                    echo "  <div class='qtde'> 
                                {$qtde}
                            </div>";

                    echo "  <div class='preco_carrinho'>  
                                R$ {$produto["preco"]}
                            </div>";

                    echo "  <div class='info_carrinho'>
                                <p>Cores: <span class='descricao'>{$produto["cores"]}</span></p>
                            </div>";
    
                    echo "  <div class='info_carrinho'>
                                <p>Material: <span class='descricao'>{$produto['material']}</span></p>
                            </div>";
        
                    echo "  <div class='info_carrinho'>
                                <p>Tamanho final: <span class='descricao'> {$produto["tamanho"]}</span></p>
                            </div>";
        
                    echo "  <div class='info_carrinho'>
                                <p>Quantidade: <span class='descricao'>{$produto["qtd"]}</span></p>
                            </div>";

                    echo "  <div class='info_carrinho'>
                                <p>Prazo de produção: <span class='descricao'>{$produto["prazo"]}</span></p>
                            </div>";

                    echo "  <div class='subtotal_carrinho'>
                                Subtotal: R$ ", number_format(($produto["preco"] * $qtde ), 2, ",", "." ), 
                         "   </div>";

                    echo "  <div class='menos1_carrinho'>
                                <a href='../controller/carrinhoController.php?id={$produto["id"]}&acao=del1'>
                                    -
                                </a>
                            </div>" ;

                    echo "  <div class='remover_carrinho'>
                                <a href='../controller/carrinhoController.php?id={$produto["id"]}&acao=del'>
                                    Remover item <i class='bx bx-trash'></i>
                                </a>
                            </div>";
                }
                    echo "</div>";
                    echo "  <div class='total_carrinho'>
                                Total R$ ", number_format( $total, 2, ",", "." ),
                            "</div>";
            } else {
                echo "Não existe produtos no carrinho!";
            }
        ?>
    </div>

<!---------FOOTER---------->

<div class="container">
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
            <p id="criado">Criado por: <span id="autores">Nathália Zuza, Weskley Borges e Wendel Daniel</span></p>
        </div>
    </footer>
</body>

</html>