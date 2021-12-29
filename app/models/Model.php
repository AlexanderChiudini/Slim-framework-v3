<?php

namespace app\models;

use app\models\Connection;
use app\traits\Create;
use app\traits\Read;
use app\traits\Update;
use app\traits\Delete;

class Model {

    use Create, Read, Update, Delete;

    protected $connect;

    protected $field;

    protected $value;

    public function __construct() {
        $this->connect = Connection::connect();
    }

    /**
     * Realiza um select geral (all) de uma determinada tabela
     * @return \Object retorna um objeto com todos os dados salvos na tabela pesquisada
     */
    public function all() {
        $sql = "SELECT * FROM {$this->table}";
        $all = $this->connect->query($sql);
        $all->execute();

        return $all->fetchAll();
    }

    /**
     * Faz uma consulta ao banco para verificar se um valor existe
     */
    public function find($field, $value) {
        $this->field = $field;
        $this->value = $value;

        return $this;
    }

}