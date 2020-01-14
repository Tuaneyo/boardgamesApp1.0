<?php
/**
 * Created by: stephanhoeksema 2018
 * phpoop
 */

namespace MVC\model;

use MVC\database\QueryBuilder;

class Users extends QueryBuilder
{
    public $fname;
    public $email;
    public $lname;

    public function getName()
    {
        return 'De naame van deze user is: ' . $this->fname;
    }


}