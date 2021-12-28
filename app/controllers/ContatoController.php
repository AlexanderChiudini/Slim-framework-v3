<?php

namespace app\controllers;

class ContatoController extends Controller {

    /**
     * Exibição da rota /contato
     */
    public function index() {
        $this->view('contato', [
            'title' => 'contato',
            'nome' => 'Kamui'
        ]);
    }

}