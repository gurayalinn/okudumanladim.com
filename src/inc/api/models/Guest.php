<?php
defined('BASE_PATH') or exit('No direct script access allowed');

require_once __DIR__.'/../core/Database.php';

class Guest extends Database
{

    public function userArray()
    {
        $this->prepare('SELECT * FROM `guests` ORDER BY uid ASC');
        $this->statement->execute();
        return $this->statement->fetchAll();
    }

    public function questionsArray()
    {
        $this->prepare('SELECT * FROM `questions` ORDER BY id ASC');
        $this->statement->execute();
        return $this->statement->fetchAll();
    }

        public function answersArray()
    {
        $this->prepare('SELECT * FROM `answers` ORDER BY id ASC');
        $this->statement->execute();
        return $this->statement->fetchAll();
    }

    public function insertAnswer($uid, $answer, $quid): bool
    {
        $this->prepare('INSERT INTO `answers` (`uid`, `answer`, `quid`) VALUES (?, ?, ?)');
        $this->statement->execute([$uid, $answer, $quid]);
        return true;
    }


    public function register($username, $session, $result): bool
    {
        $row = $this->getByUsername($username);
        if ($row) {
            return false;
        }

        $this->prepare('INSERT INTO `guests` (`username`, `session`, `result`) VALUES (?, ?, ?)');
        // If user registered
        $this->statement->execute([$username, $session, $result]);
        $this->getByUsername($username);
        return true;
    }


    public function login($username, $session): bool|object
    {
        // Get user by username
        $row = $this->getByUsername($username);
        // If username is correct
        return $row && ($row->session > 1) ? $row : false;
    }


       public function loginGet($username): bool | object
    {

        $row = $this->getByGuest($username);

       return  $row && ($row->username > 1) ? $row : false;
    }


    public function getByGuest($username): bool | stdClass
    {
        $this->prepare('SELECT * FROM `guests` WHERE `username` = ? LIMIT 1');
        $this->statement->execute([$username]);
        return $this->statement->fetch();
    }


    public function getByUsername($username): bool | stdClass
    {
        $this->prepare('SELECT * FROM `guests` WHERE `username` = ? LIMIT 1');
        $this->statement->execute([$username]);
        return $this->statement->fetch();
    }

    public function getNew()
    {
        $this->prepare('SELECT `username` FROM `guests` ORDER BY `uid` DESC LIMIT 1');
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
            $this->prepare('UPDATE `guests` SET `password` = ? WHERE `username` = ?');
            $this->statement->execute([$hashedPassword, $username]);
            return 'Password changed successfully.';
        } else {
            return 'Failed to change password.';
        }
    }

}