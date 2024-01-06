<?php
defined('BASE_PATH') or exit('No direct script access allowed');

require_once __DIR__.'/../models/User.php';
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
            Util::redirect('/admin');

        } else {
            return 'Username/Password is wrong.';
        }

    }

    public function logout()
    {
        session_unset();
        $_SESSION = array();
        session_destroy();
    }
}