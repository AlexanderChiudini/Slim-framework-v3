<?php

namespace app\traits;

trait Validations {

    /**
     * Array com os erros encontrados em cada campo do formulário
     * @var Array
    */
    private $errors = [];

    /**
     * Campos com validação 'required', devem ter algum valor preenchido
     */
    protected function required($field) {
        if(empty($_POST[$field])) {
            $this->errors[$field][] = flash($field, error('Esse campo é obrigatório'));
        }
    }

    /**
     * Campos com validação 'e-mail', devem estar no formato e-mail, possui @ . após o arroba etc...
     */
    protected function email($field) {
        if(!filter_var($_POST[$field], FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field][] = flash($field, error('Esse campo não possui um E-mail válido'));
        }
    }

    /**
     * Campos com validação 'unique', não podem ser encontrados mais de uma vez no DB
     */
    protected function unique($field, $model) {
        if(!isset($_POST[$field]) || empty($_POST[$field])) {
            return;
        }

        $model = "app\\models\\" . ucfirst($model);
        $model = new $model();

        $find = $model->select()->where($field, $_POST[$field])->first();

        if($find && !empty($_POST[$field])) {
            $this->errors[$field][] = flash($field, error('Esse valor já está cadastrado no DB'));
        }
    }

    /**
     * Campos com validação 'phone', devem seguir o padrão XXXXX-XXXX
     */
    protected function phone($field) {
        if(!preg_match("/[0-9]{5}\-[0-9]{4}/", $_POST[$field])) {
            $this->errors[$field][] = flash($field, error('Esse campo não possui um formato de telefone válido'));
        }
    }

    /**
     * Campos com validação 'max', não podem ter mais de $max dígitos
     */
    protected function max($field, $max) {
        if(strlen($_POST[$field]) > $max) {
            $this->errors[$field][] = flash($field, error("O número de caracteres para esse campo não pode ser maior que {$max}"));
        }
    }

    /**
     * Verifica se foram setados erros para a variável geral
     * @return Boolean
     */
    public function hasErrors() {
        return !empty($this->errors);
    }
}