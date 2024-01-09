<?php
defined('BASE_PATH') or exit('No direct script access allowed');

class Database
{
// (devolopment) ortamında

protected mixed $statement;
// private string $host = 'mysql';
// private string $user = 'root';
// private string $pass = 'password';
// private string $db = 'db';
// private string $charset = 'utf8';

// (production) ortamında

// protected mixed $statement;
private string $host = 'localhost';
private string $user = 'oku323anladicom_mysql';
private string $pass = '~WjRt2%35qmL1gunE!,PrW&A';
private string $db = 'oku323anladicom_db';
private string $charset = 'utf8';

    protected function connect()
    {
        try {
            $dsn = 'mysql:host='.$this->host.';dbname='.$this->db;
            $pdo = new PDO($dsn, $this->user, $this->pass);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
            $pdo->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_NATURAL);
            $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
            $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
            $pdo->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
            $pdo->setAttribute(PDO::ATTR_TIMEOUT, 3600);
            $pdo->setAttribute(PDO::ATTR_PERSISTENT, true);
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET CHARACTER SET utf8");
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET COLLATION_CONNECTION = 'utf8_general_ci'");
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET SQL_MODE = NO_AUTO_VALUE_ON_ZERO");
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET AUTOCOMMIT = 0");
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET time_zone = '+00:00'");

            return $pdo;

        } catch (PDOException $e) {
            print ("Error!: ".$e->getMessage()."<br/>");
            echo "PDOException: ".$e->getCode()."<br/>";
            error_log("PDOException: " . $e->getMessage() . " in " . $e->getFile() . " on line " . $e->getLine());
            throw $e;
            die();
        }


    }

    protected function prepare($sql)
    {
        $this->statement = $this->connect()->prepare($sql);
    }

    protected function query($sql)
    {
        $this->statement = $this->connect()->query($sql);
    }

}