<?php

namespace app\controllers;

use app\models\Users;

class HomeController extends Controller {

    /**
     * Exibição da rota inicial
     */
    public function index() {
        $users = new Users;
        $users = $users->select()->get();
        
        $this->view('home', [
            'users' => $users,
            'title' => 'Home'
        ]);
    }

}