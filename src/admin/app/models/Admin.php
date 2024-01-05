<?php
defined('BASE_PATH') or exit('No direct script access allowed');

require_once __DIR__.'/../core/Database.php';

class Admin extends Database
{
    public function userArray()
    {
        $this->prepare('SELECT * FROM `users` ORDER BY uid ASC');
        $this->statement->execute();
        return $this->statement->fetchAll();
    }
    // Set user admin / non admin
    public function administrator($uid)
    {
        $this->prepare('SELECT `admin` FROM `users` WHERE `uid` = ?');
        $this->statement->execute([$uid]);
        $result = $this->statement->fetch();
        if ((int) $result->admin === 0) {
            $this->prepare('UPDATE `users` SET `admin` = 1 WHERE `uid` = ?');
        } else {
            $this->prepare('UPDATE `users` SET `admin` = 0 WHERE `uid` = ?');
        }
        $this->statement->execute([$uid]);
    }

}