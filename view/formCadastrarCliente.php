<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/jquery.mask.min.js"></script>
    <script src="../js/jquery-validation-1.19.3/dist/jquery.validate.min.js"></script>
    <title></title>
</head>

<body>
    <fieldset>
        <legend>Cadastro de cliente</legend>
        <form id="formCadastroCliente" action="../controller/cadastrarClienteController.php" method="post">
            <table>
                <tr>
                    <td>Nome:</td>
                    <td><input type="text" name="nome"></td>
                </tr>
                <tr>
                    <td><label for="cpf">Cpf:</label></td>
                    <td><input type="text" name="cpf" id="cpf"></td>
                </tr>
                
                <tr>
                    <td><label for="tel">Telefone:</label></td>
                    <td><input type="text" name="tel" id=tel></td>
                </tr>
                <tr>
                    <td>email:</td>
                    <td><input type="email" name="email"></td>
                </tr>
                <tr>
                    <td>senha:</td>
                    <td><input  type="password" name="senha" id="senha" placeholder="Senha"></td>
                </tr>
                <tr>
                    <td>Confirmar senha:</td>
                    <td><input  type="password" name="senhaC" id="senhaC" placeholder="Confirmar Senha"></td>
                </tr>
                <tr>
                    <td>cep:</td>
                    <td><input type="text" name="cep"></td>
                </tr>
                <tr>
                    <td>Estado:</td>
                    <td><input type="text" name="estado"></td>
                </tr>
                <tr>
                    <td>cidade:</td>
                    <td><input type="text" name="cidade"></td>
                </tr>
                <tr>
                    <td>Endereço:</td>
                    <td><input type="text" name="endereco"></td>
                </tr>
                <tr>
                    <td>N° da casa:</td>
                    <td><input type="text" name="numero_casa"></td>
                </tr>
                <tr>
                    <td colspan="2">
                    <button type="submit" onclick="return validarSenha()">Enviar</button>
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>
    <div style="text-align: center;">
        <?php
if ( isset( $_GET["sucesso"] ) && $_GET["sucesso"] == true ) {
    echo "Cadastro com sucesso!!!!";
}
?>
    </div>
    <script>
        $(document).ready(function() {
            $('#cpf').mask('000.000.000-00');
            $('#tel').mask('(00) 00000-0000');
        });
    </script>
    <script>
        $("#formCadastroCliente").validate({
            rules: {
                nome: {
                    required: true,
                },
                cpf: {
                    required: true,
                    minlength: 11
                },
                email: {
                    required: true,
                },
                senha: {
                    required: true,
                },
                senhaC: {
                    equalTo: "#senha"
                },
            },
            messages: {
                cpf: {
                    required: "Campo obrigatório",
                    minlength: jQuery.validator.format("At least {0} characters required!"),
                },
                nome: {
                    required: "Campo obrigatório",
                },
                email: {
                    required: "Campo obrigatório",
                },
                senha: {
                    required: "Campo obrigatório",
                },
                senhaC: {
                    equalTo: "senha nao bate",
                }

            }
        });
    </script>

    
</body>

</html>