<?php

namespace app\controllers;

class SubscribeController {

    /**
     * Execução da chamada Ajax do botão 'subscribe' da rota inicial
     */
    public function store() {
        echo json_encode('subscribe user');
    }

}