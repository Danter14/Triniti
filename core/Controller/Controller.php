<?php

/**
 * Triniti 
 * by Kévin (Danter14) 2016
 *
 * Pour l'information complète du droit d'auteur et de la licence, s'il vous plaît voir la LICENCE
 *
 * @package Triniti
 * @author 2016 Kévin (Danter14) <danter14000@gmail.com>
 * @copyright 2016 Kévin (Danter14) <danter14000@gmail.com>
 * @licence GPL-3.0
 * @version 1.0
 * @link https://github.com/Danter14/Jeu_Triniti_CMS
 */

namespace Core\Controller;

class Controller{

    protected $viewPath;
    protected $template;

    protected function render($view, $variables = []){
        ob_start();
        extract($variables);
        require($this->viewPath . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();
        require($this->viewPath . 'templates/' . $this->template . '.php');
    }

    protected function forbidden(){
        header('HTTP/1.0 403 Forbidden');
        die('Acces interdit');
    }

    protected function notFound(){
        header('HTTP/1.0 404 Not Found');
        die('Page introuvable');
    }

}