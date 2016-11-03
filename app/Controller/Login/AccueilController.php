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

namespace App\Controller\Login;

use Core\Controller\Controller;

class AccueilController extends AppController {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->render('login.index');
    }
}