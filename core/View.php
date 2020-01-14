<?php
/**
 * Created by PhpStorm.
 * User: t
 * Date: 12-10-18
 * Time: 18:42
 */

namespace MVC;

class View
{
    public $type;
    public $class;
    /**
     * Render view function to call certain page]
     * @var $view defines view page
     * @var $data collective data
     */

    public function render($view, $data = [])
    {
        if(strpos($view, '.')){
            $view = str_replace('.', '/', $view);
        }
        // expose data to be used in view
        extract($data);
        $viewDir = 'views/';
        $pagePath = $viewDir . $view . '.view.php';

        require($viewDir . 'partials' . '/' . 'default.php');
        return false;

    }

    /**
     * Redirect same page
     */


    public function Redirect() : void
    {
        header("Location: $_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
    }

    /**
     * return to given page
     * @var $url defines view page
     */
    public function to($url = '')
    {
        if(strpos($url, '.')){
            $url = str_replace('.', '_', $url);
        }
        return  header('Location: /~s1131670/P1_OOAPP_Opdracht/' . $url);

    }


}