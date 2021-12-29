<?php

namespace app\traits;

trait Update {

    public function update($attributes) {
        if(!isset($this->field) || !isset($this->value)) {
            throw new \Exception('Antes de fazer o UPDATE, utilize a função find');
        }

        $sql = "UPDATE {$this->table} SET";

        foreach ($attributes as $field => $value) {
            $sql .= " {$field} = :{$field},";
        }

        $sql = rtrim($sql, ',');

        $sql .= " WHERE {$this->field} = :{$this->field}";
        
        $attributes['id'] = $this->value;

        $update = $this->connect->prepare($sql);
        $update->execute($attributes);

        return $update->rowCount();
    }
}