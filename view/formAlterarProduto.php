<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar produto | WWZUZA</title>
    <link rel="stylesheet" href="../css/cadastroProduto.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

    <?php
    include 'sidebar.php';
    require_once '../dao/ProdutoDAO.php';
    $idProduto = $_GET["id"];
    $produtoDAO = new ProdutoDAO();
    $produto = $produtoDAO->findById($idProduto);
    ?>

    <main class="container">
        <div class="conteudo">
            <h1>Alterando produto</h1>

            <form action="../controller/alterarProdutoController.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="idProduto" value="<?php echo $produto["id"] ?>">
                <div class="row">
                    <div class="categoriadiv">
                        <label for="nome">Categoria do produto</label>
                        <select class="categoria">
                            <option value="0">Escolha a categoria</option>
                            <option value="1">Panfleto</option>
                            <option value="2">Cartão de Visita</option>
                            <option value="3">Cardápio</option>
                            <option value="4">Banner</option>
                            <option value="5">Papel timbrado</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="inputbox">
                        <input type="text" name="nome" id="nome" value="<?php echo $produto["nome"] ?>">
                        <label for="nome">Nome do produto</label>
                    </div>
                    <div class="inputbox">
                        <input type="text" name="preco" id="preco" value="<?php echo $produto["preco"] ?>">
                        <label for="preco">Preço do produto</label>
                    </div>
                    <div class="inputbox">
                        <input type="text" name="cores" id="cores" placeholder="Ex: 4x0 ou 4x4" value="<?php echo $produto["cores"] ?>">
                        <label for="cores">Cores</label>
                    </div>
                </div>
                <div class="row">
                    <div class="inputbox">
                        <input type="text" name="material" id="material" placeholder="Tipo de papel ou material" value="<?php echo $produto["material"] ?>">
                        <label for="material">Papel / Material</label>
                    </div>
                    <div class="inputbox">
                        <input type="text" name="tamanho" class="tamanho" id="tamanho" placeholder="Ex: 15cm x 9cm" value="<?php echo $produto["tamanho"] ?>">
                        <label for="tamanho">Tamanho</label>
                    </div>
                    <div class="inputbox">
                        <input type="text" name="prazo" class="prazo" id="prazo" placeholder="Ex: 3 dias úteis" value="<?php echo $produto["prazo"] ?>">
                        <label for="prazo">Prazo de produção</label>
                    </div>
                </div>
                <div class="row">
                    <div class="inputbox">
                        <input type="text" name="qtd" class="qtd" id="qtd" placeholder="Ex: 1000un" value="<?php echo $produto["qtd"] ?>">
                        <label for="qtd">Quantidade</label>
                    </div>
                    <div class="inputbox">
                        <img src="../img/produto/foto/<?php echo $produto["foto"] ?>" width="112" />
                        <input type="hidden" name="fotoOriginal" value="<?php echo $produto["foto"] ?>">
                        <input type="file" name="foto" id="foto">

                        <label for="foto">Imagem</label>
                    </div>
                </div>
                <div class="row">
                    <input type="submit" value="Alterar produto" id="cadastrar">
                </div>
            </form>
        </div>
    </main>
</body>

</html>