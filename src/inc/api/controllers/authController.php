<?php
defined('BASE_PATH') or exit('No direct script access allowed');

require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Guest.php';
require_once __DIR__.'/../helpers/SessionHelper.php';
require_once __DIR__.'/../helpers/ValidatorHelper.php';

class authController
{
    public function register($data): string
    {
        // Init models
        $User = new User();

        // Bind login data
        $username = trim($data['username']);
        $password = (string) $data['password'];
        $confirmPassword = (string) $data['confirmPassword'];

        // Validate data
        $validationError = Validator::registerForm($username, $password, $confirmPassword);
        if ($validationError) {
            return $validationError;
        }


        // Check if username exists
        $userExists = $User->getByUsername($username);
        if ($userExists) {
            return "Username already exists, try another.";
        }

        // Hashing the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $response = $User->register($username, $hashedPassword);

        return ($response) ? 'Registered successfully.' : 'Something went wrong.';
    }

    public function login($data): null|string
    {
        // Init models
        $User = new User();

        // Bind login data
        $username = trim($data['username']);
        $password = (string) $data['password'];

        // Validate data
        $validationError = Validator::loginForm($username, $password);
        if ($validationError) {
            return $validationError;
        }

        $response = $User->login($username, $password);
        if ($response) {
            Session::createUserSession($response);
            Util::redirect('/');

        } else {
            return 'Username/Password is wrong.';
        }

    }
    public function registerGuest($data): string
    {
        // Init models
        $User = new Guest();

        // Bind login data
        $username = trim($data['username']);
        $session = (string) $data['session'];
        $result = (int) $data['result'];

        //$answerArr = $data['answer'];
        //$answerArr = json_decode($answerArr, true); // cevaplar array olarak geliyor
        //$answers = array_map('trim', $answerArr); // cevapların başındaki ve sonundaki boşlukları sil
        //$answers = array_filter($answers); // boş cevapları filtrele
        //$answer = array_values($answers); // db'ye kaydedilecek cevaplar
        //$quid = array_values($answers); // db'ye kaydedilecek soru id'leri
        //$quid = array_keys($quid); // db'ye kaydedilecek soru id'leri
        //$quid = array_map('intval', $quid); // soru id'lerini int'e çevir
        // soru sayisi kadar cevap var mi kontrol et
        //if (count($quid) !== count($answer)) {
         // Util::debug_console("Soru sayısı ile cevap sayısı eşit değil.");
          //return "Soru sayısı ile cevap sayısı eşit değil.";
       // }

        // Validate data
        $validationError = Validator::registerFormGuest($username);
        if ($validationError) {
            return $validationError;
        }

        if ($result === null || $result === "")
        {
          $result = 0;
        }

        // Check if username exists
        $userExists = $User->getByUsername($username);
        if ($userExists) {
            return "Kullanıcı adı zaten var, başka bir tane deneyin.";
        }


        $response = $User->register($username, $session, $result);

        //$uid = $User->getByUsername($username)->uid; // db'ye kaydedilecek kullanıcı id'si


        // if ($uid && $response === true) {
        // foreach ($answers as $quid => $answer) {

        //   Util::debug_console('answer= ' .$answer . ' quid= ' . $quid . ' uid= ' . $uid);

        //   $insertAnswer = $User->insertAnswer($uid, $answer, $quid); // cevapları db'ye kayde
        // }
        //     return ($response) ? 'Başarıyla gönderildi.' : 'Bir şeyler ters gitti.';
        // } else {
        //     return 'Bir şeyler ters gitti.';
        // }

        if ($response === true) {
            $response = $User->login($username, $session);
            Session::createGuestSession($response);
            return ($response) ? 'Başarıyla gönderildi.' : 'Bir şeyler ters gitti.';
        } else {
            return 'Bir şeyler ters gitti.';
        }

    }



        public function loginGuest($data): null|string
    {
        // Init models
        $User = new Guest();

        // Bind login data
        $username = trim($data['username']);
        $session = (string) $data['session'];


        // Validate data
        $validationError = Validator::loginFormGuest($username);
        if ($validationError) {
            return $validationError;
        }

        $response = $User->login($username, $session);

        if ($response) {
            Session::createGuestSession($response);
        } else {
            return 'Bir şeyler ters gitti.';
        }

    }

        public function getGuest($username): null | string
    {
        // Init models
        $User = new Guest();

        // Bind login data
        $username = Util::xss_clean(($_GET['username']));

        $username = $User->loginGet($username);

        if ($username) {
          Session::createRequestSession($username);
          return ($username) ? '200' : '404';
          Util::debug_console($username);
        } else {
            return '404';
        }
    }



    public function logout()
    {
        session_unset();
        $_SESSION = array();
        session_destroy();
    }
}