<?php
use MVC\Authentification;
/**
 * GET routes
 */
$url_prefix_empty='~s1131670/P1_OOAPP_Opdracht';
$url_prefix=$url_prefix_empty.'/';
/**
 * GET routes Authentification
 */

if(Authentification::Auth()){
    /**
     * GET routes games
     */
    $router->get($url_prefix.'games_create', 'Games@showCreate');
    $router->get($url_prefix.'games_details', 'Games@showDetails');
    $router->get($url_prefix.'games_update', 'Games@showUpdate');

    $router->get($url_prefix.'logout', 'AuthenticationController@logout');

    /**
     * GET routes games
     */
    $router->get($url_prefix.'games_create', 'Games@showCreate');
    $router->get($url_prefix.'games_details', 'Games@showDetails');
    $router->get($url_prefix.'games_update', 'Games@showUpdate');

    /**
     * GET routes battles
     */
    $router->get($url_prefix.'battles_create', 'Battles@showCreate');
    $router->get($url_prefix.'battles_update', 'Battles@showUpdate');

    /**
     * POST routes
     */


    /**
     * post routes Games
     */
    $router->post($url_prefix.'create_games', 'Games@create');
    $router->post($url_prefix.'update_games', 'Games@update');

    /**
     * post routes battles
     */
    $router->post($url_prefix.'create_battles', 'Battles@create');
    $router->post($url_prefix.'update_battles', 'Battles@update');
    $router->post($url_prefix.'delete_battles', 'Battles@delete');


}
    /**
     * User not logged in
     */

    $router->get($url_prefix.'login', 'AuthenticationController@showLogin');
    $router->get($url_prefix.'register', 'AuthenticationController@showRegister');
    $router->get($url_prefix.'activate', 'AuthenticationController@verify');

    $router->get($url_prefix.'add_player', 'AuthenticationController@showVerifyPlayer');
    $router->get($url_prefix.'forget_password', 'AuthenticationController@showPasswordForget');
    $router->get($url_prefix.'mail_password', 'AuthenticationController@showMailPassword');

    $router->get($url_prefix.'players', 'Players@index');
    /**
     * GET routes games
     */
    $router->get($url_prefix.'games', 'Games@index');

    /**
     * GET routes battles
     */
    $router->get($url_prefix.'battles', 'Battles@index');

    $router->get('~s1131670/P1_OOAPP_Opdracht', 'Index@showIndex');
    $router->get($url_prefix, 'Index@showIndex');
    $router->get($url_prefix.'home', 'Index@showIndex');

    /**
     * POST routes Athentification
     */
    $router->post($url_prefix.'mail_add_player', 'AuthenticationController@addPlayer');
    $router->post($url_prefix.'register_add_player', 'AuthenticationController@verifyPlayer');
    $router->post($url_prefix.'mail_password', 'AuthenticationController@mailPassword');
    $router->post($url_prefix.'new_password', 'AuthenticationController@makeNewPassword');

    $router->post($url_prefix.'register', 'AuthenticationController@register');
    $router->post($url_prefix.'login', 'AuthenticationController@login');





