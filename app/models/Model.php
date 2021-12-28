<?php

namespace app\models;

use app\models\Connection;

class Model {

    protected $connect;

    public function __construct() {
        $this->connect = Connection::connect();
    }

    /**
     * Realiza um select geral (all) de uma determinada tabela
     * @return \Object retorna um objeto com todos os dados salvos na tabela pesquisada
     */
    public function all() {
        $sql = "select * from {$this->table}";
        $all = $this->connect->query($sql);
        $all->execute();

        return $all->fetchAll();
    }

}