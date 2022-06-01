<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="containerpai">
        <h1>Cadastro</h1>
        <button><a href="../cliente/minhaConta.php">Adicionar cartão.</a></button>

        <div class="formContainer">

            <form id="formCadastroCliente" action="../../controller/cliente/cadastrarEnderecoController.php"
                method="post">
                
                <input type="hidden" name="cliente_id" value="<?=$_GET['id'];?>">
                <div class="inputBox">
                    <input type="text" name="cep" id="cep" class="inputUser" required>
                    <label for="cep" class="labelInput">Cep</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelInput">Endereço</label> <br>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="numero_casa" id="numero_casa" class="inputUser" required>
                    <label for="numero_casa" class="labelInput">N° casa</label> <br>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="complemento" id="complemento" class="inputUser" required>
                    <label for="complemento" class="labelInput">Complemento</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelInput">Cidade</label><br>
                    <br><br>
                </div>
                <div class="inputBox">
                    <input type="text" name="uf" id="uf" class="inputUser" required>
                    <label for="uf" class="labelInput">UF</label>
                </div>
                <br><br>
                <button type="submit" class="botão">Enviar</button>
                </td>
            </form>
        </div>
    </div>
</body>

</html>