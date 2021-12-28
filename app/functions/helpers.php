<?php

/**
 * Formata uma variável e a printa na tela para fins de debug
 */
function dd($data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    die();
}

/**
 * Retorna o diretório do projeto
 */
function path() {
    $sDir = dirname(dirname(__FILE__));
    return dirname($sDir);
}