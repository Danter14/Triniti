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

namespace Core;
/**
 * Class Autoloader
 * @package Tutoriel
 */
class Autoloader{

    /**
     * Enregistre notre autoloader
     */
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Inclue le fichier correspondant à notre classe
     * @param $class string Le nom de la classe à charger
     */
    static function autoload($class){
        if (strpos($class, __NAMESPACE__ . '\\') === 0){
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            require __DIR__ . '/' . $class . '.php';
        }
    }

}