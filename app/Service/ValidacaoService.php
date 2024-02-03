<?php

namespace App\Service;

class ValidacaoService {
    public static function validarEmail($email) {
        if (strlen($email)>10 && strlen($email) < 35) {
            foreach (str_split($email) as $char) {
                if ($char == ',') {
                    abort(400, "Email com caractere inválido");
                }
            }
            return true;
        }
        if (strpos($email, '@') === false) {
            abort(400, "Email sem caractere @");
        }
        else{
            return true;
        }
        abort(400,"Email fora do tamanho permetido!");
    }
}
