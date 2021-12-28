<?php

namespace app\controllers;

class HomeController extends Controller {

    /**
     * Exibição da rota inicial
     */
    public function index() {
        $this->view('home', [
            'title' => 'Home'
        ]);
    }

}