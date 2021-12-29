<?php

namespace app\src;

class Redirect {

    /**
     * Redireciona para uma página escolhida
     */
    public static function redirect($target) {
        return header("location:{$target}");
    }

    /**
     * Redireciona para a última página
     */
    public static function back() {
        $previous = "javascript:history.go(-1)";

        if(isset($_SERVER['HTTP_REFERER'])) {
            $previous = $_SERVER['HTTP_REFERER'];
        }

        return header("location:{$previous}");
    }
}