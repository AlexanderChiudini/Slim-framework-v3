<?php

namespace app\src;

class Flash {

    /**
     * Adiciona uma mensagem da sessão
     */
    public static function add($index, $message) {
        if(!isset($_SESSION[$index])) {
            $_SESSION[$index] = $message;
        }
    }

    /**
     * verifica se a sessão possui mensagem, atibui o seu valor em uma variável, remove a sessão e retorna a variável
     * @return String retorna a mensagem contida na sessão ou então vazio
     */
    public static function get($index) {
        if(isset($_SESSION[$index])) {
            $message = $_SESSION[$index];
        }

        unset($_SESSION[$index]);

        return $message ?? '';
    }

}