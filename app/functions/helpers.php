<?php

use app\src\Flash;
use app\src\Redirect;

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

/**
 * Adiciona uma mensagem ao Flash, essas mensagens são usadas para validação dos campos do crud
 */
function flash($index, $message) {
    Flash::add($index, $message);
}

/**
 * Formatação da mensagem de erro
 */
function error($message) {
    return "<span class='alert alert-danger'>* {$message}</span>";
}

/**
 * Formatação da mensagem de sucesso
 */
function success($message) {
    return "<span class='alert alert-success'>{$message}</span>";
}

/**
 * Redireciona para uma página desejada
 */
function redirect($target) {
    Redirect::redirect($target);

    die();
}

/**
 * Redireciona a página atual para a página anterior
 */
function back() {
    Redirect::back();

    die();
}