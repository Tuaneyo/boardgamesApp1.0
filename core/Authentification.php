<?php
/**
 * Created by PhpStorm.
 * User: t
 * Date: 19-10-18
 * Time: 19:39
 */

namespace MVC;
use MVC\database\QueryBuilder;
use MVC\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use MVC\Mailer;

class Authentification
{
    const HASHING_OPTIONS = [
            'cost' => 10
    ];

    //Generate a random string
    public static function generateRandomString()
    {
        return substr(str_shuffle(MD5(microtime())), 0, 50);
    }


    // Generate random hash
    public static function generateRandomHash()
    {
        $string = self::generateRandomString();
        return self::getHash($string);
    }

    public static function getHash($str)
    {
        return password_hash($str, PASSWORD_DEFAULT, Authentification::HASHING_OPTIONS  );
    }

    /*
        Register user
        @var $param data form
    */
    public static function register($param)
    {
        $spilt = ['nickname'];
        $userParam = [];
        $playerParam = ['id' => 0];
        // Split one array to two array for the correct columns and values
        foreach ($param as $key => $value)
        {
            if(in_array($key, $spilt)){
                $playerParam[$key] = $value;
            }else{
                $userParam[$key] = $value;
            }
        }

        try {
            // Create player table and user table with given params
            $password = self::getHash($param['password']);
            $userParam['password'] = $password;
            QueryBuilder::create('users', $userParam);
            // Get the just now added lastest id
            $latestAddId = QueryBuilder::execute("SELECT id FROM users order by id desc limit 1");
            $playerParam['id'] = $latestAddId[0]['id'];
            QueryBuilder::create('player', $playerParam);
            return true;
        } catch (\Exception $exception) {
            dd('Oops something went terrible wrong');
            return false;
        }

    }

    /*
      * setup mail send to user with hash
      * @var $name define name to send to
      * @var $hash is random hashed code
      * @var $email define email of user
      * @var $tempUrl define email template and path
      * */

    public static function setupMailer($name, $email, $hash, $tempUrl)
    {
        $link = 'https://adsd.clow.nl/~s1131670/P1_OOAPP_Opdracht/'.$tempUrl.'?nickname='.$name.'&code=' . $hash;
        //$link = 'http://localhost:8000/P1_OOAPP_Opdracht/'.$tempUrl.'?email='.$email.'&nickname='.$name.'&code=' . $hash;
        $subject = 'Boardgamesapp AVDL';
        // get all content for template email
        $body = file_get_contents(__DIR__ .  '../../' . 'views' .'/templates/'.$tempUrl.'.view.php');
        $body = str_replace('$name', $name, $body);
        $body = str_replace('$link', $link, $body);
        // sendmail based on setup in Mailer.php
        $mailer = Mailer::sendMail($email, $name, $body, $subject);
        return $mailer;
    }

    /*
      * login user and set a cookie and returns true or false
      * @var $param defines al the REQUEST of GET or POST
      * */

    public function login($param)
    {
        $match = false;
        // select data from user and player table
        $users = QueryBuilder::execute("SELECT lname, email, password, verified, nickname FROM users left outer join player ON player.id = users.id", 'Users');
        foreach ($users as $user){
            // check if user exist
            if(password_verify($param['password'], $user->password) && $param['email'] == $user->email && $user->verified == 1){
                // setcookie nickname
                setcookie('cookie', $user->nickname, time() + 60 * 60 * 24 * 7, '/');
                $match = true;
            }
        }
        return $match;
    }

    /*
      * logout user and set cookie on null return true
      * @var $req defines al the REQUEST of GET or POST
      * */

    public function logout($param)
    {
        $cookie = $param->cookie['cookie'];
        if($cookie){
            return setcookie('cookie', null, time() + 60 * 60 * 24 * 7, '/');
        }
        return true;

    }

    /*
      * send user new email to generate new password
      * @var $email defines user email input
      * */

    public function mailPassword($mail)
    {
        // select all data from user table and player table based on user email input
        $user = QueryBuilder::execute("SELECT * FROM users INNER JOIN player ON users.id = player.id WHERE email='{$mail}'");
        if($user){
            $name = $user[0]['nickname'];
            // generate random hash
            $code = self::generateRandomString();
            // send user mail
            self::setupMailer($name, $mail, $code, 'forget_password');
            $created = QueryBuilder::create('verify', ['email' => $mail, 'hash' => $code]);
            if($created){
                return true;
            }else{
                return false;
            }
        }

    }

    /*
      * update new password based on user request
      * @var $param defines al the REQUEST
      * */

    public function updateNewPassword($param)
    {
        $hash = $param['hash'];
        // select from verify table based on hash request
        $getEmail = QueryBuilder::selectWhere('email', 'verify', ['hash' => $hash]);
        if($getEmail){
            $email = $getEmail[0]['email'];
            $user = QueryBuilder::selectWhere('id, email', 'users', ['email' => $email]);
            // hash new password
            $newPassword = self::getHash($param['password']);
            // update new password
            $succes = QueryBuilder::update('users', ['password' => $newPassword], ['id' => $user[0]['id'], 'email' => $email] );
            if($succes){
                QueryBuilder::delete('verify', ['hash' => $hash]);
                return true;
            }
        }
        return false;
    }

    /*
      * check if user is loged in return boolean
      * */

    public static function Auth()
    {
        if(isset($_COOKIE['cookie'])){
            return true;
        }else{
            return false;
        }
    }

    /*
    * getAuth check if user is login then give unique value back
    * */
    public static function getAuth()
    {
        $auth = self::Auth();
        if($auth){
            return $_COOKIE['cookie'];
        }else{
            return false;
        }
    }



}