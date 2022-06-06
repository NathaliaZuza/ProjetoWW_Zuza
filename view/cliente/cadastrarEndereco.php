<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../js/jquery-validation-1.19.3/dist/jquery.validate.min.js"></script>
    <script src="../../js/jquery-3.6.0.min.js"></script>
    <script src="../../js/jquery.mask.min.js"></script>
    <script src="https://kit.fontawesome.com/ca14b9e588.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/headerMenu.css">
    <link rel="stylesheet" href="/css/minhaConta.css">
    <link rel="stylesheet" href="/css/alterarDadosCliente.css">
    <title>Document</title>
</head>

<body>
        <h1 style="text-align: center; margin-top: 40px; margin-bottom: -10px;">Adicionar endereço</h1>

    <div class="container">
    
        <form id="formCadastroCliente" action="../../controller/cliente/cadastrarEnderecoController.php"
            method="post">
            <input type="hidden" name="cliente_id" value="<?=$_GET['id'];?>">

            <div class="inputbox">
                <input type="text" name="cep" id="cep">
                <label for="cep" class="labelInput">CEP</label>
            </div>
            <div class="inputbox">
                <input type="text" name="endereco" id="endereco">
                <label for="endereco" class="labelInput">Endereço</label>
            </div>
            <div class="inputbox">
                <input type="text" name="numero_casa" id="numero_casa">
                <label for="numero_casa" class="labelInput">N° casa</label>
            </div>
            <div class="inputbox">
                <input type="text" name="complemento" id="complemento">
                <label for="complemento" class="labelInput">Complemento</label>
            </div>
            <div class="inputbox">
                <input type="text" name="cidade" id="cidade">
                <label for="cidade" class="labelInput">Cidade</label>
            </div>
            <div class="inputbox">
                <input type="text" name="uf" id="uf">
                <label for="uf" class="labelInput">UF</label>
            </div>
            <br><br>
            <button type="submit" class="botão">Enviar</button>
        </form>
    </div>
    <script>
    $(document).ready(function() {
        $('#cep').mask('00000-000');
        
    });
    </script>
</body>

</html>