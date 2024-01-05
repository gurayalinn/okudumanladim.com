<?php
defined('BASE_PATH') or exit('No direct script access allowed');

require_once __DIR__.'/../core/Database.php';

class User extends Database
{
    public function register($username, $password): bool|object
    {
        // Check if username already exists
        $row = $this->getByUsername($username);
        if ($row) {
            return false;
        }
        // Insert new user
        $this->prepare('INSERT INTO `users` (`username`, `password`) VALUES (?, ?)');
        $this->statement->execute([$username, $password]);
        return $this->getByUsername($username);
    }
    public function login($username, $password): bool|object
    {
        // Get user by username
        $row = $this->getByUsername($username);
        // If username is correct
        return $row && password_verify($password, $row->password) ? $row : false;
    }

    public function getByUsername($username): bool|stdClass
    {
        $this->prepare('SELECT * FROM `users` WHERE `username` = ? LIMIT 1');
        $this->statement->execute([$username]);
        return $this->statement->fetch();
    }


    public function getNew()
    {
        $this->prepare('SELECT `username` FROM `users` ORDER BY `uid` DESC LIMIT 1');
        $this->statement->execute();
        $result = $this->statement->fetch();
        return $result->username;
    }

    public function updatePassword($currentPassword, $hashedPassword, $username): string
    {
        // Get user by username
        $row = $this->getByUsername($username);
        // Fetch current password from database
        if (password_verify($currentPassword, $row->password)) {
            $this->prepare('UPDATE `users` SET `password` = ? WHERE `username` = ?');
            $this->statement->execute([$hashedPassword, $username]);
            return 'Password changed successfully.';
        } else {
            return 'Failed to change password.';
        }
    }

}