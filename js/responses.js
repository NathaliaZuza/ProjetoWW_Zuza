function getBotResponse(input) {
    
    if (input == "1") {
        return "";
    } else if (input == "2") {
        return "";
    } else if (input == "3") {
        return "";
    }

    if (input == "bom dia") {
        return "Bom dia! tudo bem?";
    } else if (input == "obrigado") {
        return "Por nada!";
    } else if (input == "F"){
        return "Descanse em paz Thor.";
    }
     else {
        return "Para duvidas sobre Compras: digite 1; Para duvidas sobre cadastro: Digite 2; Para Duvidas sobre Pagamentos: Digite 3";
    }
}