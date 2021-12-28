<?php

namespace app\src;

class Load {

    /**
     * Realiza o carregamento de um arquivo caso ele exista
     * @throw exibe uma exception caso o arquivo não exista
     * @return mixed retorna o require do arrquivo
     */
    public static function file($file) {
        $file = path().$file;

        if(!file_exists($file)) {
            throw new \Exception('O arquivo não existe');
        }

        return require $file;
    }

}