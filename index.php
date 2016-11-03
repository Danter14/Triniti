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

define('ROOT', $_SERVER["DOCUMENT_ROOT"]);
define('DEBUG', true);
require ROOT . '/app/App.php';
App::load();

if(isset($_GET['pages'])) {
    $page = $_GET['pages'];
} else {
    $page = 'login.accueil.index';
}

$page = explode('.', $page);

function erreur($controller, $action, $debug) {
	if(!method_exists($controller, $action) && !$debug){
		header('HTTP/1.0 404 Not Found');
    	die('Cette Page est introuvable');
	}
} 

if($page[0] == 'admin' && file_exists(ROOT . '/app/Controller/Admin/' . ucfirst($page[1]) . 'Controller.php')) {
    $controller = '\App\Controller\Admin\\' . ucfirst($page[1]) . 'Controller';
    $action = $page[2];
    erreur($controller, $action, DEBUG);
} elseif($page[0] == 'game' && file_exists(ROOT . '/app/Controller/Game/' . ucfirst($page[1]) . 'Controller.php')) {
    $controller = '\App\Controller\Game\\' . ucfirst($page[1]) . 'Controller';
    $action = $page[2];
    erreur($controller, $action, DEBUG);
} elseif($page[0] == 'login' && file_exists(ROOT . '/app/Controller/Login/' . ucfirst($page[1]) . 'Controller.php')) {
    $controller = '\App\Controller\Login\\' . ucfirst($page[1]) . 'Controller';
    $action = $page[2];
    erreur($controller, $action, DEBUG);
} else {
	header('HTTP/1.0 404 Not Found');
    die('Cette Page est introuvable');
}

$controller = new $controller();
$controller->$action();