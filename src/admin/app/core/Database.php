<?php
defined('BASE_PATH') or exit('No direct script access allowed');

class Database
{
    // PRODUCTION
    protected mixed $statement;
    private string $dbHost = "localhost";
    private string $dbUser = "oku323anladicom_mysql";
    private string $dbPass = "~WjRt2%35qmL1gunE!,PrW&A";
    private string $dbName = "oku323anladicom_db";


    // protected mixed $statement;
    // private string $dbHost = "mysql";
    // private string $dbUser = "root";
    // private string $dbPass = "password";
    // private string $dbName = "db";


    protected function query($sql)
    {
        $this->statement = $this->connect()->query($sql);
    }

    protected function connect()
    {

        try {
            $dsn = 'mysql:host='.$this->dbHost.';dbname='.$this->dbName;
            $pdo = new PDO($dsn, $this->dbUser, $this->dbPass);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            return $pdo;
        } catch (PDOException $e) {
            print ("Error!: ".$e->getMessage()."<br/>");
            die();
        }

    }

    protected function prepare($sql)
    {
        $this->statement = $this->connect()->prepare($sql);
    }

}