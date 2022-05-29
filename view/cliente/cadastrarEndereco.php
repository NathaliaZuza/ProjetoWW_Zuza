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
        
    
    <div class="formContainer">
       
        <form id="formCadastroCliente" action="/controller/cliente/cadastrarClienteController.php" method="post">
                    <div class="inputBox">
                        <input type="text" name="nome" id="nome" class="inputUser" required>
                        <label for="nome" class="labelInput">Nome Completo</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="text" name="cpf" id="cpf" class="inputUser" required>
                        <label for="cpf" class="labelInput">Cpf</label> <br>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="text" name="telefone" id="telefone" class="inputUser" required>
                        <label for="telefone" class="labelInput">Telefone</label> <br>
                    </div>
                    <br><br>
                    <div class="inputBox">
                    <input type="text" name="email" id=email class="inputUser" required>
                        <label for="email" class="labelInput">E-mail</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="password" name="senha" id="senha" class="inputUser" required>
                        <label for="senha" class="labelInput">Senha</label><br>
                    <br><br>
                    </div>
                    <div class="inputBox">
                        <input type="password" name="senhaC" id="senhaC" class="inputUser" required>
                        <label for="senha" class="labelInput">Confirmar Senha</label>
                    </div>
                    <br><br>
                    <button type="submit" onclick="return validarSenha()" class="botão">Enviar</button>
                        </td>
            </form>
    </div>
</div>
</body>
</html>