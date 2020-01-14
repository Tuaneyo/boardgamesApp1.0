<?php
/**
 * Created by PhpStorm.
 * User: t
 * Date: 31-10-18
 * Time: 11:22
 */

namespace MVC\controllers;


use MVC\Authentification;
use MVC\View;

class Players
{
    public function index()
    {
        $auth = Authentification::getAuth();
        return View::render('players', compact('auth'));
    }
}