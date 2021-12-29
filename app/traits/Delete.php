<?php

namespace app\traits;

trait Delete {

    public function delete() {
        if(!isset($this->field) || !isset($this->value)) {
            throw new \Exception('Antes de fazer o DELETE, utilize a função find');
        }

        $sql = "DELETE FROM {$this->table} WHERE {$this->field} = :{$this->field}";

        $delete = $this->connect->prepare($sql);
        $delete->bindValue($this->field, $this->value);
        $delete->execute();

        return $delete->rowCount();
    }
}