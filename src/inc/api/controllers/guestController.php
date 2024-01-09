<?php
defined('BASE_PATH') or exit('No direct script access allowed');

require_once __DIR__.'/../models/Guest.php';
require_once __DIR__.'/../helpers/ValidatorHelper.php';

if (!Session::get('login')) {

}

class guestController extends Guest
{

      public function getQuestionsArray()
    {
        return $this->questionsArray();
    }

      public function getAnswersArray()
    {
        return $this->answersArray();
    }

    public function getUsersArray()
    {
        return $this->UserArray();
    }

    public function getGuest($username)
    {
        return $this->loginGet($username);
    }

    public string $username;

    public function __construct()
    {
        $this->username = Session::get('username');
    }


    public function getNew()
    {
        // Init models
        $User = new Guest();
        return $User->getNew();
    }


}