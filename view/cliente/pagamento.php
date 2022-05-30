<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../js/jquery-validation-1.19.3/dist/jquery.validate.min.js"></script>
    <script src="../../js/jquery-3.6.0.min.js"></script>
    <script src="../../js/jquery.mask.min.js"></script>
    <script src="https://kit.fontawesome.com/ca14b9e588.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/cadastroProduto.css">
    <title>pagamento</title>
</head>

<body>
    <main class="container">
        <div class="conteudo">
            <h1>Novo cartão de crédito</h1>

            <form id="pagamento" action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="inputbox">
                        <input type="text" name="nome_cartao" id="nome_cartao" required>
                        <label for="nome_cartao">Nome impresso no cartão</label>
                    </div>
                    <div class="inputbox">
                        <input type="text" name="n_cartão" id="n_cartao" required>
                        <label for="n_cartao">Número do cartão</label>
                    </div>
                </div>
                <div class="row">
                    <div class="inputbox">
                        <input type="text" name="validade" id="validade" required>
                        <label for="validade">validade</label>
                    </div>
                    <div class="inputbox">
                        <input type="text" name="verificacao" id="verificacao" placeholder="CVV" required>
                        <label for="verificacao">Código de verificação</label>
                    </div>
                </div>
                <div class="row">
                    <div class="inputbox">
                        <input type="text" name="cpf" id="cpf" required>
                        <label for="cpf">CPF do titular do cartão</label>
                    </div>
                    <div class="inputbox">
                        <input type="text" name="data_nasc" id="data_nasc" required>
                        <label for="data_nasc">Data de nascimento</label>
                    </div>
                </div>
                <div class="row">
                    <div class="inputbox">
                        <input type="text" name="parcelamento" id="parcelamento" required>
                        <label for="parcelamento">Forma de pagamento</label>
                    </div>
                </div>
                <div class="row">
                    <input type="submit" value="Pagar com cartão" id="cadastrar">
                </div>
            </form>
        </div>
    </main>

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
        $('#verificacao').mask('000');
        $('#n_cartao').mask('0000 0000 0000 0000 000');
        $('#validade').mask('00/00');
        $('#data_nasc').mask('00/00/0000');
    });
    </script>

    <script>
    $("#pagamento").validate({
        rules: {
            nome_cartao: {
                required: true,
            },
            n_cartao: {
                required: true,
                minlength: 11
            },
            validade: {
                required: true,
            },
            verificacao: {
                required: true,
            },
            cpf: {
                required: true,
                minlength: 11,
            },
            data_nasc: {
                required: true,
            },

        },
        messages: {
            cpf: {
                required: "Campo obrigatório",
                minlength: jQuery.validator.format("At least {0} characters required!"),
            },
            nome_cartao: {
                required: "Campo obrigatório",
            },
            n_cartao: {
                required: "Campo obrigatório",
            },
            validade: {
                required: "Campo obrigatório",
            },
            verificacao: {
                required: "Campo obrigatório"
            },
            data_nasc: {
                required: "Campo obrigatório"
            }

        }
    });
    </script>
</body>

</html>