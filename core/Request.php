<?php
/**
 * Created by: tuan Nuyen 2018
 * phpoop
 */
namespace MVC;

class Request
{
    public $params;
    public $cookie;

    public function __construct()
    {
        $this->setParams();
        $this->setCookies();
    }

    /*
      * Get request parame POST and GET
      * */

    public function setParams()
    {
        $this->params = array_merge($_GET, $_POST);
    }

    /*
      * Get request cookie
      * */

    public function setCookies()
    {
        $this->cookie = $_COOKIE;

    }


    public static function uri()
    {
        /**
         * trim() delete first and trailing '/'
         * parse_url() gets a specific part of the 'REQUEST_URI'
        */
        return trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'
        );

    }

    public static function method()
    {
        /**
         * GET of POST method
         */

        return $_SERVER['REQUEST_METHOD'];
    }


    /**
     * check for ajax request return boolean
     */

    public function ajax()
    {
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
        {
            return true;
        }
        return false;
    }
}