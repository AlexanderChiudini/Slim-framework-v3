<?php

namespace app\traits;

use app\src\load;

trait View {

    protected $twig;

    /**
     * Instância o Twig
     */
    protected function twig() {
        $loader = new \Twig\Loader\FilesystemLoader('../app/views');
        $this->twig = new \Twig\Environment($loader, [
            'debug' => true
        ]);
    }

    /**
     * Realzia o carregamento das functions utilizadas pelo Twig
     */
    protected function functions() {
        $functions = Load::file('/app/functions/twig.php');

        foreach($functions as $function) {
            $this->twig->addFunction($function);
        }
    }

    /**
     * carrega o Twig e suas funções
     * @see twig
     * @see functions
     */
    protected function load() {
        $this->twig();
        $this->functions();
    }

    /**
     * Faz o display dos dados em tela
     * @return \View
     */
    protected function view($view, $data) {
        $this->load();

        $template = $this->twig->load(str_replace('.', '/', $view).'.html');

        return $template->display($data);
    }
}