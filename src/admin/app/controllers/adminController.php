<?php
defined('BASE_PATH') or exit('No direct script access allowed');

require_once __DIR__.'/../models/Admin.php';

if (!Session::get('admin')) {
    http_response_code(403);
    exit();
}

class adminController extends Admin
{

    //
    public function getUserArray()
    {
        return $this->UserArray();
    }

     public function getGuestArray()
    {
        return $this->guestArray();
    }

    public function addQuestion ($question_text, $option_a, $option_b, $option_c, $option_d, $category, $correct_answer) {
        return $this->insertQuestion($question_text, $option_a, $option_b, $option_c, $option_d, $category, $correct_answer);
    }

    public function getQuestionsArray()
    {
        return $this->questionsArray();
    }

    //
    public function setAdmin($uid)
    {
        return $this->administrator($uid);
    }

    public function delQuestion($id)
    {
        return $this->deleteQuestion($id);
    }

        public function delGuest($uid)
    {
        return $this->deleteGuest($uid);
    }



}