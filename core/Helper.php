<?php
/**
 * Created by PhpStorm.
 * User: t
 * Date: 12-10-18
 * Time: 18:42
 */

namespace MVC;

class Helper
{

    /*
      * set session for notification
      * @var $type defines type of alert message
      * @var $msg defines the message to be displayed
      * */
    public static function with($type, $msg) :void
    {
        // set seission array alert
        $_SESSION['alert'] = array();
        $_SESSION['alert']['msg'] = $msg;
        $_SESSION['alert']['type'] = $type;
    }



}