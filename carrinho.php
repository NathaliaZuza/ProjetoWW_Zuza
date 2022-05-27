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

    <?php include './view/pagsCentral/headerMenu.php';
    include_once './DAO/ProdutoDAO.php';
    include_once './DAO/CategoriaDAO.php';
    include_once './DTO/ProdutoDTO.php';
    include_once './DTO/CategoriaDTO.php';
    ?>


    <?php
    session_start();
    ?>


<!------------ENDERECO----------->

<div class='container'>
    <div class="endereco">
        <h2> <i class='bx bxs-map'></i>SELECIONE O ENDEREÇO</h2>
        <div class="linha"></div>
        <div class="dados-endereco">
            <span id="principal"><p>Endereço principal</p></span>
            <p>QNM 05 conj P 06</p>
            <p>CEP 72215066 - Brasília, DF</p>
        </div>
        <div class="editar-endereco">
            <div class="editar">EDITAR</div>
            <div class="editar">NOVO ENDEREÇO</div> 
        </div>
    </div>

<!------------CARRINHO----------->   

<?php
    require_once './dao/ProdutoDAO.php';
    $produtoDAO = new ProdutoDAO();
    $produtos   = $produtoDAO->findAll();
    $total      = 0;

    if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {

        foreach ($_SESSION['carrinho'] as $key => $qtde) {
            $produto = $produtoDAO->findById($key);
            $total += $produto["preco"] * $qtde;
        
        echo "<div class='itens'>";
        echo "<div class='item1'>";
        echo "  <div class='div-img'>";
        echo "      <p><img src='../img/produto/foto/{$produto["foto"]}' width='112'/></p>";
        echo "  </div>";
        echo "  </div>";

        echo "<div class='item2'>";
        echo "      <div class='nome_produto'>
                        {$produto["nome"]}
                    </div>";
                    
        echo "  <div class='menos1_carrinho'>
                    <a href='/controller/produto/carrinhoController.php?id={$produto["id"]}&acao=del1'>
                        - 
                    </a>
                </div>";

        echo "  <div class='qtd'> 
                    {$qtde}
                </div>";

        echo    "<div class='menos1_carrinho'>
                    <a href='/controller/produto/carrinhoController.php?id={$produto["id"]}&acao=add'>
                        +
                    </a>
                 </div>";

        echo "      <div class='desc_produto'>
                        {$produto["descricao"]}
                    </div>";

        echo        "<div class='preco'>
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
                    <a onclick='return confirmarExcluir();' href='/controller/produto/carrinhoController.php?id={$produto["id"]}&acao=del'>
                        REMOVER ITEM <i class='bx bx-trash'></i>
                    </a>";           
        echo    "</div>";

        echo "</div>";
        echo "</div>";
    
        }  ?>

    <script>
          function confirmarExcluir(){
            return confirm("Você tem certeza que deseja remover esse produto do carrinho?");
        } 
    </script>
<!------------TOTAL-----------> 

        <?php
        echo "  <div class='total_carrinho'>
                    Total: R$ ", number_format($total, 2, ",", "."),
             "  </div>";
        ?>

<!------------RESUMO----------->   
        <div class="resumo">
            <h3 class="resum"><i class='bx bxs-notepad'></i>RESUMO</h3>
            <?php
                        echo "  <div class='total_resumo'>
                        <span class='totalresum'>Total:</span> R$ ", number_format($total, 2, ",", "."),
                 "  </div>";
            ?>
            <p class='resumoFrete'> <span >Frete:</span> R$ 0,00</p>

            <div class="pagamento-btn"><p><a href="/controller/produto/finalizarCompraController.php">Ir para o pagamento</p></a></div>
            <div class="continuarComprando-btn"><p><a href="index.php">Continuar comprando</a></p></div>
        </div>
    <?php   

//<!------------SE NÃO EXISTIR PRODUTOS----------->  
    } else {
        echo "<div class='vazio'>";
        echo "<p id='vazio'>O seu carrinho está vazio!</p>";
        echo "<div class='continuarComprando-btn'><p><a href='index.php'>Continuar comprando</a></p></div>";
        echo "</div>";
    }
    ?>
</div>


<!---------FOOTER---------->

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
        <div class="criacao">
            <p id="criado">Criado por: <span id="autores">Nathália Zuza, Weskley Borges e Wendel Barbosa</span></p>
        </div>
    </footer>
</body>
</html>