<?php

namespace app\traits;

trait Sanitize {

    /**
     * Utiliza a função nativa filter_var para que os dados digitados nos campos sejam sanitizados
     * @see filter_var
     * @return Array Os valores já sanitizados
     */
    protected function sanitize() {
        $sanitized = [];

        foreach ($_POST as $field => $value) {
            $sanitized[$field] = filter_var($value, FILTER_SANITIZE_STRING);
        }

        return $sanitized;
    }
}