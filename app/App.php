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

use Core\Config;
use Core\Database\MysqlDatabase;

class App{

    public $title = "Triniti";
    private $db_instance;
    private static $_instance;

    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public static function load(){
        session_start();
        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();
    }

    public function getTable($name){
        $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDb());
    }

    public function getDb(){
        $config = Config::getInstance(ROOT . '/config/config.php');
        if(is_null($this->db_instance)){
            $this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
        }
        return $this->db_instance;
    }

}