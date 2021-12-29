<?php

namespace app\traits;

trait Read {

    /**
     * Expessão SQL a ser executa no DB
     * @var String
     */
    private $sql;

    /**
     * Campos utilizados no WHERE
     * @var Array
     */
    private $binds;


    /**
     * Realiza um SELECT no DB
     * @param String $fields Campos que serão buscados no SQL
     * @return Read retorna o objeto da classe
     */
    public function select($fields = '*') {
        $this->sql = "SELECT {$fields} FROM {$this->table}";

        return $this;
    }

    /**
     * Adiciona uma cláusula WHERE ao SQL de busca
     * @param String $field     Campo que será utilizado como condicional
     * @param String $value     Valor que será utilizado para comparação do condicional
     * @param String $operator  Operador a ser utilizado na cláusula, por padrão será utilizado '='
     * @return Read retorna o objeto da classe
     */
    public function where($field, $value, $operator = '=') {
        if(empty($field) || empty($value)) {
            throw new \Exception('Argumentos inválidos');
        }

        $this->sql .= " WHERE {$field} {$operator} :{$field}";

        $this->binds = [
            $field => $value
        ];

        return $this;
    }

    /**
     * Retorna todos os registros encontrados pela expressão SQL montada pela classe
     * @return Array um array de objetos do DB
     */
    public function get() {
        return $this->bindAndExecute()->fetchAll();
    }

    /**
     * Retorna o primeiro registro encontrado pela expressão SQL montada pela classe
     * @return Object o primeiro objeto encontrado no DB
     */
    public function first() {
        return $this->bindAndExecute()->fetch();
    }

    /**
     * Adiciona o SQL à conexão e o executa passando os condicionais do WHERE (caso existam)
     * @return Object retorna o produto da execução do sql
     */
    private function bindAndExecute() {
        $select = $this->connect->prepare($this->sql);

        $select->execute($this->binds);

        return $select;
    }
}