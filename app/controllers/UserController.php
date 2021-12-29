<?php

namespace app\controllers;

use app\models\Users;
use app\src\Validate; 

class UserController extends Controller {

    private $user;

    public function __construct() {
        $this->user = new Users;
    }

    public function edit($request, $response, $args) {
        $user = $this->user->select()->where('id', $args['id'])->first();

        $this->view('user', [
            'title' => 'Editar Usuário',
            'user' => $user
        ]);
    }

    public function update($request, $response, $args) {
        $validate = new Validate;

        $data = $validate->validate([
            'name' => 'required:max@40',
            'email' => 'required:email',
            'phone' => 'required:phone'
        ]);

        if($validate->hasErrors()) {
            return back();
        }

        $updated = $this->user->find('id', $args['id'])->update((array) $data);

        if($updated) {
            return redirect('/');
        }

        return back();
    }

    public function destroy($request, $response, $args) {
        $deleted = $this->user->find('id', $args['id'])->delete();

        if($deleted) {
            return redirect('/');
        }
    }

}