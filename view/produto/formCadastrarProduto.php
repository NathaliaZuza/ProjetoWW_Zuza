<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar produto | WWZUZA</title>
    <link rel="shortcut icon" href="/img/lg-03.png"/>
    <link rel="stylesheet" href="/css/cadastroProduto.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

    <?php
        require_once '/Documentos/GitHub/ProjetoWW_Zuza/dao/ProdutoDAO.php';
        $produtoDAO = new ProdutoDAO();
        require_once '/Documentos/GitHub/ProjetoWW_Zuza/dao/CategoriaDAO.php';
        $categoriaDAO = new CategoriaDAO();
        $categorias   = $categoriaDAO->findAll();
        // var_dump($categorias);
        // die();

    ?>

    <main class="container">
        <div class="conteudo">
            <h1>Cadastrando produto</h1>

            <form action="../controller/cadastrarProdutoController.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="categoriadiv">
                        <label for="nome">Categoria do produto</label>
                        <select class="categoria" name="categoria">
                            <option value="0" class="option-cat">Escolha a categoria</option>
                            <?php foreach ( $categorias as $cat ) {?>
                                <option class="option-cat" value="<?=$cat['id']?>"><?=$cat['nome']?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="inputbox">
                        <input type="text" name="nome" id="nome">
                        <label for="nome">Nome do produto</label>
                    </div>
                    <div class="inputbox">
                        <input type="text" name="preco" id="preco">
                        <label for="preco">Preço do produto</label>
                    </div>
                    <div class="inputbox">
                        <input type="text" name="cores" id="cores" placeholder="Ex: 4x0 ou 4x4">
                        <label for="cores">Cores</label>
                    </div>
                </div>
                <div class="row">
                    <div class="inputbox">
                        <input type="text" name="material" id="material" placeholder="Tipo de papel ou material">
                        <label for="material">Papel / Material</label>
                    </div>
                    <div class="inputbox">
                        <input type="text" name="tamanho" class="tamanho" id="tamanho" placeholder="Ex: 15cm x 9cm">
                        <label for="tamanho">Tamanho</label>
                    </div>
                    <div class="inputbox">
                        <input type="text" name="prazo" class="prazo" id="prazo" placeholder="Ex: 3 dias úteis">
                        <label for="prazo">Prazo de produção</label>
                    </div>
                </div>
                <div class="row">
                    <div class="inputbox">
                        <input type="text" name="qtd" class="qtd" id="qtd" placeholder="Ex: 1000un">
                        <label for="qtd">Quantidade</label>
                    </div>
                    <div class="inputbox">
                        <input type="file" name="foto" id="foto">
                        <label for="foto">Imagem produto</label>
                    </div>
                </div>
                <div class="row">
                    <div class="inputbox">
                        <input type="textarea" name="descricao" class="desc" id="desc" placeholder="Escreva aqui a descrição do produto...">
                        <label for="descricao">Descrição do produto</label>
                    </div>
                </div>
                <div class="row">
                    <input type="submit" value="Cadastrar produto" id="cadastrar">
                </div>
            </form>
        </div>
    </main>

</body>

</html>