<?php

namespace app\traits;

trait Create {

    /**
     * Realiza a inserção do registro no DB
     * @return integer retorna o id do registro inserido
     */
    public function create(array $attributes) {
        $sql = "INSERT INTO {$this->table} (";
        $sql .= implode(', ', array_keys($attributes)).") VALUES (";
        $sql .= ":".implode(', :', array_keys($attributes)).")";
        
        $create = $this->connect->prepare($sql);
        $create->execute($attributes);

        return $this->connect->lastInsertId();
    }
}