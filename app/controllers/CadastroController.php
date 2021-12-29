<?php

namespace app\controllers;

use app\src\Validate;
use app\models\Users;

class CadastroController extends Controller {

    /**
     * Exibe o html da rota /cadastro
     */
    public function create() {
        $this->view('cadastro', [
            'title' => 'Cadastro'
        ]);
    }

    /**
     * Valida e insere um novo contato
     * @return Function redireciona para a mesma página com a mensagem de sucesso/erro, tendo em vista que o cadastro é feito em uma página adiante
     */
    public function store() {
        $validate = new Validate;

        $data = $validate->validate([
            'name' => 'required:unique@users:max@40',
            'email' => 'required:email:unique@users',
            'phone' => 'required:phone'
        ]);

        if($validate->hasErrors()) {
            return back();
        }

        $user = new Users;
        if($user->create((array) $data)) {
            flash('message', success('Registro inserido com sucesso! Parabéns PAPAI!'));
            return back();
        }
    }

}