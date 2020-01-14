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

class AuthenticationController extends \MVC\View
{
    /*
        * show login view
   * */
    public function showLogin(Request $req)
    {
        // check if user is loged in then return the correct page
        if(!Authentification::Auth()) {
            View::render('login');
        }else{
            return View::to('home');
        }
    }

    /*
        * show register view
        * @var $req given request parameters
   * */

    public function showRegister(Request $req)
    {
        // check if user is loged in then return the correct page
        if(!Authentification::Auth()) {
            View::render('register', ['request' => $req->params]);
        }else{
            return View::to('home');
        }
    }

    /*
        * collects user data and send to \Authentification
        * @var $req gets post request data
   * */

    public function register(Request $req)
    {
        // Check if email, username is correct and is already in use
        $checkUser = self::checkUser($req->params);
        $email = $req->params['email'];
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            switch ($checkUser){
                case '';
                    // generete random hash for verify table
                    $hashed = Authentification::generateRandomHash();
                    $mailer = Authentification::setupMailer($req->params['nickname'], $req->params['email'], $hashed, 'activate');
                    if($mailer){
                        QueryBuilder::create('verify', ['email' => $email, 'hash' => $hashed]);
                        // register user to database if mail is send and verify table is create
                        $register = Authentification::register($req->params);
                        if($register){
                            Helper::with('alert-success', 'Email has been send to you');
                            return View::to('home');
                        }else{
                            return View::render('register', ['request' => $req->params]);
                        }
                    }
                    break;
                case 'email';
                    Helper::with('alert-danger', "Email already exist. Please enter a new email");
                    break;
                case 'nickname';
                    Helper::with('alert-danger', "Nickname already in use. Please enter a new email");
                    break;
            }
        }
        return View::render('register', ['request' => $req->params]);

    }

    /*
        * collect user post login data to send to Authentification for verifiation
        * @var $req gets post request data
   * */

    public function login(Request $req)
    {
        // sends request data to Authentification
        $loginAttempt = Authentification::login($req->params);
        if($loginAttempt){
            View::to('home');
        }else{
            Helper::with('alert-danger', 'Entered credentials are incorrect. Please try again');
            View::render('login');
        }




    }
    /*
        * verify function to verify registred users
        * @var $req defines al the REQUEST of GET or POST
   * */
    public function verify(Request $req)
    {
        try{
            // check if hash exist
            if(isset($_GET['code']) && !empty($_GET['code'])) {
                $code = $req->params['code'];
                // check if hash match
                $match = self::checkHash($req->params);

                if($match){
                    $columnsValues = ['verified' => 1];
                    $valuesConditions = ['email' => $match[0]['email']];
                    // set user verifation on true then delete verify table based on hash value
                    $veriefied = QueryBuilder::update('users', $columnsValues, $valuesConditions);
                    if($veriefied) QueryBuilder::delete('verify', ['hash' => $code]);
                    return View::to('login');
                }else{
                    Helper::with('alert-warning','It looks lijk your aacount has been verified' );
                    return View::to('login');
                }
            }else{
                return View::render('404');
            }
        }catch (\Exception $exception) {
            return false;
        }

    }
    /*
    * check hash Request GET and hash of the database match
    * @var $param defines al the REQUEST of GET or POST
    * */

    public function checkHash($param)
    {
        // return true if hash match
        $columnConditions = ['hash' => $param['code']];
        $check = QueryBuilder::selectWhere("email, hash" ,'verify', $columnConditions);
        if($check) return $check;
        else return false;
    }

    /*
    * log out request
    * @var $ress defines al the REQUEST of GET or POST
    * */

    public function logout(Request $req)
    {
        // send reguest to Authentification logout function
        $logout = Authentification::logout($req);
        // return to hoem if $logout is true
        if($logout) View::to('home');

    }
    /*
    * send user email to verify account
    * @var $req defines al the REQUEST of GET or POST
    * */

    public function addPlayer(Request $req)
    {
        // check if email is unique
        $checkUser = self::checkUser($req->params);
        $email = $req->params['email'];
        if(filter_var($email, FILTER_VALIDATE_EMAIL) ){
            // check if email is unique and username is already in user
            switch ($checkUser){
                case '';
                    $code = Authentification::generateRandomHash();
                    // setup mail to send to user
                    Authentification::setupMailer($req->params['nickname'], $email, $code, 'add_player');
                    // creates hash and email to verify table in database
                    $createVerify = QueryBuilder::create('verify', ['email' => $email, 'hash' => $code]);
                    if($createVerify) {
                        Helper::with('alert-success', "Your email: {$email} is succesfully send");
                    }
                break;
                case 'email';
                    Helper::with('alert-danger', "Email already exist. Please enter a new email");
                break;
                case 'nickname';
                    Helper::with('alert-danger', "Nickname already in use. Please enter a new email");
                break;
            }
        }else{
               Helper::with('alert-danger', "Email is entered incorrect Please enter a new email");
        }
        return View::to('home');

    }

    /*
    * check username and email is unique or not
    * @var $param defines al the REQUEST of GET or POST
    * */

    public function checkUser($param)
    {
        $check = '';
        $email = $param['email'];
        $nickname = $param['nickname'];
        // get data from table user with join on table player
        $users = QueryBuilder:: execute("SELECT email, nickname FROM users INNER JOIN player ON users.id = player.id", 'Users');
        if($users){
            // check if email and nickname is in table user and player
            foreach ($users as $item){
                if($item->email == $email){
                    $check = 'email';
                }elseif($item->nickname == $nickname){
                    $check = 'nickname';
                }
            }
        }
        // return string or empty string
        return $check;
    }

    /*
    * show register page
    * @var $req defines al the REQUEST of GET or POST
    * */

    public function showVerifyPlayer(Request $req)
    {
        try {
            // check if hash parameter and nickname parameter exist
            if (isset($_GET['code']) && !empty($_GET['code'] && isset($_GET['nickname']) && !empty($_GET['nickname']))){
                // check if hash match
                    $match = self::checkHash($req->params);
                    if($match){
                        // collect user  unique email and nickname
                        $req->params['email'] = $match[0]['email'];
                        $req->params['nickname'] = $_GET['nickname'];
                        // return register pages
                        return View::render('add-register', ['request' => $req->params]);
                    }else{
                        // return novalid page
                        return View::render('novalid');
                    }
            }else{
                // return error page
                return View::render('404');
            }
        } catch (\Exception $exception) {
            return false;
        }
    }

    /*
      * verify user request
      * @var $req defines al the REQUEST of GET or POST
      * */

    public function verifyPlayer(Request $req)
    {
        // register user and sets verified on true
        $req->params['verified'] = 1;
        $registered = Authentification::register($req->params);
        if($registered){
            // delete old hash from verify table
            QueryBuilder::delete('verify', ['email' => $req->params['email']]);
            // return login page when true
            return View::render('login');
        }else{
            // redirect to page when false
            Helper::with('alert-danger', 'Something went wrong. please fill in all required values');
            return View::render('add-register', ['request' => $req->params]);
        }
    }

    /*
      * show page with forget pasword form
      * @var $req defines al the REQUEST of GET or POST
      * */


    public function showPasswordForget(Request $req)
    {
        return View::render('forgetPassword', ['request' => $req->params]);
    }

    /*
      * show page with enter email form
      * */


    public function showMailPassword()
    {
        return View::render('mailme');
    }

    /*
      * setup mail send to user with hash
      * @var $req defines al the REQUEST of GET or POST
      * */


    public function mailPassword(Request $req)
    {
        // check if email inout is filled correctly
        $email = $req->params['email'];
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // create hash and setup mail in Authentification
            $mailed = Authentification::mailPassword($email);
            if($mailed){
                // return notofication an to home page if true
                Helper::with('alert-success', "Email: {$email} has been send to you to change password");
                return View::to('home');
            }else{
                return View::to('mailme');
            }
        }
    }

    /*
      * save user new password
      * @var $req defines al the REQUEST of GET or POST
      * */

    public function makeNewPassword(Request $req)
    {
        // check if password input is set and isn't empty
        if(isset($req->params['password']) && !empty($req->params['password'])){
            // Update user password with \Authentification
            $updated = Authentification::updateNewPassword($req->params);
            if($updated){
                // return true if new password is stored
                Helper::with('alert-success', 'new password has been made');
            }
            return View::render('login');

        }else{
            View::Redirect();
        }

    }


}