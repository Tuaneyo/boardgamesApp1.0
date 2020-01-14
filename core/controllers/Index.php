<?php
/**
 * get class
 * @Player
 * @Users
 */


namespace MVC\controllers;

use MVC\database\QueryBuilder;
use MVC\View;
use MVC\model\Battle;

class index extends  View
{

    public function showIndex()
    {
        /**
         * @internal view index.php
         */
        /**
         * @var $results database query for landing page
         */
        //SELECT * FROM battles INNER JOIN player ON battles.wonby = player.id INNER JOIN users ON player.id = users.id
        $results = QueryBuilder::execute("SELECT * FROM battles INNER JOIN player ON player.id = battles.wonby");
        $game = QueryBuilder::execute("SELECT * FROM games order by id desc limit 1");

        $counts = array_count_values(
            array_column($results, 'nickname')
        );
        // sort associate array of player winners
        arsort($counts);

        View::render('index', compact('counts', 'game'));

    }
}

