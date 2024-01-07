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


    //
    public function setAdmin($uid)
    {
        return $this->administrator($uid);
    }

}