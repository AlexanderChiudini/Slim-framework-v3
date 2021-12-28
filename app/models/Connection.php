<?php

namespace app\models;

use PDO;

class Connection {

    /**
     * Realiza a conexão com o DB
     * @return \PDO retorna um objeto com a conexão realizada
     */
    public static function connect() {
        $pdo = new PDO("mysql:host=localhost;dbname=slim_framework;charset=utf8", "root", "");

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        return $pdo;
    }
}