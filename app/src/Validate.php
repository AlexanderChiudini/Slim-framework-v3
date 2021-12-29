<?php

namespace app\src;

use app\traits\Validations;
use app\traits\Sanitize;

class Validate {

    use Validations, Sanitize;

    /**
     * Faz a chamada aos métodos de validação de cada campo e por fim trata os campos para evitar ataques de usuários mal-intencionados
     * @return Object retorna os campos tratados
     */
    public function validate(array $rules) {
        foreach ($rules as $field => $validation) {
            $validations = explode(':', $validation);
            foreach ($validations as $validate) {
                if(substr_count($validate, '@') > 0) {
                    list($validationWithParameter, $parameter) = explode('@', $validate);
                    $this->$validationWithParameter($field, $parameter);
                }
                else {
                    $this->$validate($field);
                }
            }
        }

        return (object) $this->sanitize();
    }
}