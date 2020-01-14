<?php
/**
 * Created by: Tuan Nguyen 2018
 * phpoop
 */


namespace MVC\controllers;

use MVC\database\QueryBuilder;
use MVC\View;
use MVC\Request;
use MVC\Authentification;

class users extends View
{

    public function index(Request $req)
    {
        View::render('users');
    }




}