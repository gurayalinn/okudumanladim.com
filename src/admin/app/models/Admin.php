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
    public function guestArray()
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

    public function deleteQuestion($id)
    {
        $this->prepare('DELETE FROM `questions` WHERE `id` = ?');
        $this->statement->execute([$id]);
    }

       public function deleteGuest($uid)
    {
        $this->prepare('DELETE FROM `guests` WHERE `uid` = ?');
        $this->statement->execute([$uid]);
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

    public function insertQuestion($question_text, $option_a, $option_b, $option_c, $option_d, $category, $correct_answer)

    {


        $this->prepare('INSERT INTO `questions` ( `question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `category`, `correct_answer`) VALUES ( ?, ?, ?, ?, ?, ?, ?)');


        switch ($category) {
            case '1':
                $category = 'Siber Güvenlik';
                break;
            case '2':
                $category = 'Şifre Güvenliği';
                break;
            case '3':
                $category = 'Bilisim Hukuku';
                break;
            case '4':
                $category = 'Dijital Okuryazarlık';
                break;
            case '5':
                $category = 'Sosyal Mühendislik';
                break;
            case '6':
                $category = 'Mahremiyet ve Gizlilik';
                break;
            case '7':
                $category = 'Kişisel Verilerin Korunması';
                break;
            case '8':
                $category = 'Dijital Lisanslar';
                break;
            case '9':
                $category = 'KVKK ve Veri Güvenliği';
                break;
            case '10':
                $category = 'Siber Zorbalık';
                break;
            default:
                $category = 'Genel';
                break;
        }

        if ($correct_answer == 'a' || $correct_answer == 'A') {
            $correct_answer = $option_a;
        } elseif ($correct_answer == 'b' || $correct_answer == 'B') {
            $correct_answer = $option_b;
        } elseif ($correct_answer == 'c' || $correct_answer == 'C') {
            $correct_answer = $option_c;
        } elseif ($correct_answer == 'd' || $correct_answer == 'D') {
            $correct_answer = $option_d;
        } else {
            $correct_answer = $option_a;
        }

        $this->statement->execute([$question_text, $option_a, $option_b, $option_c, $option_d, $category, $correct_answer]);

        if ($this->statement->execute([$question_text, $option_a, $option_b, $option_c, $option_d, $category, $correct_answer])) {
            return true;
        } else {
            return false;
        }

    }

}