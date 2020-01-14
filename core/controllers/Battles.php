<?php
/**
 * Created by PhpStorm.
 * User: t
 * Date: 28-10-18
 * Time: 20:06
 */

namespace MVC\controllers;
use MVC\Authentification;
use MVC\database\QueryBuilder;
use MVC\Request;
use MVC\View;
use MVC\Helper;

class Battles extends View
{

    /*
    * Index function show the home page of battle
    * */

    public function index()
    {
        $battles = QueryBuilder::execute("SELECT * FROM player INNER JOIN battles ON player.id = battles.wonby", 'Player');

        return View::render('battles.show', compact('battles'));
    }

    /*
         * showCreate function show create form of battle
    * */

    public function showCreate(Request $req)
    {
        if(Authentification::Auth()){
            $games = QueryBuilder::selectAll('games', 'Games');
            $players = QueryBuilder::selectAll('player', 'Player');

            if($req->ajax()){
                $gameid = $req->params['gameid'];
                if($gameid){
                    $data = [];
                    $data[0] = QueryBuilder::selectWhere('nop', 'games', ['id' => $gameid]);
                    $data[1] = QueryBuilder::selectAll('player', 'Player');
                    echo json_encode($data);
                    die();
                }
            }
            return View::render('battles.create', compact('games', 'players'));
        }else{
            Helper::with('alert-warning','First login please');
        }

        return View::to('home');


    }

    /*
        * create function to call create action query
        * @var $req to get all post values

   * */
    public function create(Request $req)
    {
        $req->params['players'] = json_encode($req->params['players']);
        $created = QueryBuilder::create('battles', $req->params);
        if($created){
            Helper::with('alert-success', 'Battle is succesfully created');
            return View::to('battles');
        }else{
            Helper::with('alert-danger', 'Battle cannot be created. Check your form');
            View::to('battles.create');
        }
    }

    /*
     * showUpdate show update form of selected game
     * @var $req get the url param

    * */

    public function showupdate(Request $req)
    {
        if($id = $req->params['id']){
            $battle = QueryBuilder::selectWhere('*', 'battles', ['id' => $id]);
            if(!$battle){
                Helper::with('alert-danger', "Request couln't be found." );
                return View::to('battles');
            }
            $game = QueryBuilder::selectWhere('id, name', 'games', ['id' => $battle[0]['gameid']]);
            $decode_players = json_decode($battle[0]['players']);
            $setPlayers = implode(', ', $decode_players);
            $players = QueryBuilder::execute("SELECT id, nickname FROM player WHERE id IN ({$setPlayers})");
            //$players[0]['id']
            return View::render('battles.update', compact('game', 'players', 'battle'));
        }else{
            Helper::with('alert-danger', "Your request can't be executed");
        }
        return View::to('battles');

    }

    /*
    * update to call update query an execute update
    * @var $req get the url param

    * */


    public function update(Request $req)
    {
        $id = $req->params['id'];
        $updated = QueryBuilder::update('battles',$req->params, ['id' => $id] );
        if($updated){
            Helper::with('alert-success', 'Your battle is succesfully updated');
            return View::to('battles');
        }else{
            Helper::with('alert-danger', 'Something went wrong. Please check you input values');
            return View::to("battles_update?id={$id}");
        }
    }

    /*
    * delete to call delete query and execute it
    * @var $req gets the value of url param

    * */

    public function delete(Request $req)
    {
        $id = $req->params['id'];
        $delBattle = QueryBuilder::delete('battles', ['id' => $id]);
        if($delBattle){
            Helper::with('alert-success', 'Battle has ben successfully deleted');
        }
        return View::to('battles');
    }

}