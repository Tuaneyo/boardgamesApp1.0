<?php
/**
 * Created by PhpStorm.
 * User: t
 * Date: 12-10-18
 * Time: 18:48
 */
namespace MVC\controllers;

use MVC\Authentification;
use MVC\database\QueryBuilder;
use MVC\Helper;
use MVC\Request;
use MVC\View;

class Games extends View
{
    /*
    * Index function show the home page of games
* */

    public function index()
    {
        $auth = Authentification::getAuth();
        $games = QueryBuilder::execute("SELECT * FROM player INNER JOIN games ON player.id = games.publisherid", 'Player');

        return View::render('games.show', ['games' => $games]);
    }

    /*
        * showCreate function show create form of games
   * */
    public function showCreate()
    {
        // Check if user is login
        $username = Authentification::getAuth();
        if($username){
            $userid = QueryBuilder::selectWhere('id', 'player', ['nickname' => $username]);
        }else{
            Helper::with('alert-danger', 'Need to be loggin to add this');
            return View::to('home');
        }
        return View::render('games.create', ['userid' => $userid[0]['id'], 'username' => $username]);
    }

    /*
        * create function to call create action query
        * @var $req to get all post values

   * */
    public function create(Request $req)
    {
        $created = QueryBuilder::create('games', $req->params);
        if(!$created){
            Helper::with('alert-danger', 'Games no created. Pleas try again and check you input data');
            return View::to('games_create');
        }else{
            Helper::with('alert-success', 'Game succesfull created');
        }

        return View::to('games');
    }

    /*
    * showUpdate show update form of selected game
    * @var $req get the url param

* */

    public function showUpdate(Request $req)
    {

        $id = $req->params['id'];
        $game = QueryBuilder::selectWhere('*', 'games', ['id' => $id]);
        $user = QueryBuilder::selectWhere('id, nickname', 'player', ['id' => $game[0]['id']]);
        if($game){
            return View::render('games.update', ['request' => $game[0], 'user' => $user]);
        }

    }

    /*
    * update to call update query an execute update
    * @var $req get the url param

* */

    public function update(Request $req)
    {
        $id = $req->params['id'];
        $updated = QueryBuilder::update('games', $req->params, ['id' => $id]);
        if($updated){
            Helper::with('alert-success', 'Game succesfully updated');
            return View::to('games');
        }else{
            Helper::with('alert-danger', 'Something went wrong. Please check you input values');
            return View::to("games_update?id={$id}");
        }
    }

    /*
    * delete to call delelete query and execute it
    * @var $req gets the value of url param

* */

    public function delete(Request $req)
    {
        $id = $req->params['id'];
        $delGame = QueryBuilder::delete('games', ['id' => $id]);
        if($delGame){
            Helper::with('alert-success', 'Game has ben successfully deleted');
        }
        return View::to('games');
    }


}