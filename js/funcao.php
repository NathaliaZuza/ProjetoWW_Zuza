<?php

function formatarCpfCnpj($cnpj_cpf){  
    if (strlen(trim($cnpj_cpf)) === 11) {
      return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
    }else if (strlen(trim($cnpj_cpf)) === 14) {
       return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
    }
}

function removerFormatoCpfCnpj($cnpj_cpf){
    return preg_replace('/[^0-9]/', '', $cnpj_cpf);
}