<?php
defined('BASE_PATH') or exit('No direct script access allowed');

require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../helpers/ValidatorHelper.php';

if (!Session::get('login')) {
    http_response_code(403);
    exit();
}

class userController
{

    public string $username;

    public function __construct()
    {
        $this->username = Session::get('username');
    }


    public function getNew()
    {
        // Init models
        $User = new User();
        return $User->getNew();
    }

    public function updatePassword($data): string
    {
        // Init models
        $User = new User();

        // Bind login data
        $currentPassword = (string) $data['currentPassword'];
        $newPassword = (string) $data['newPassword'];
        $confirmPassword = (string) $data['confirmPassword'];

        // Validate data
        $validationError = Validator::updatePasswordForm($currentPassword, $newPassword, $confirmPassword);
        if ($validationError) {
            return $validationError;
        }

        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        return $User->updatePassword($currentPassword, $hashedPassword, $this->username);
    }



}