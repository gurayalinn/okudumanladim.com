<?php
defined('BASE_PATH') or exit('No direct script access allowed');

class Database
{

protected mixed $statement;
private string $host;
private string $user;
private string $pass;
private string $db;
private string $charset;
private string $dsn;

protected function __construct() {

if($_SERVER['HTTP_HOST'] === 'localhost:'. $_ENV['APACHE_PORT'] && $_SERVER['SERVER_PORT'] === $_ENV['APACHE_PORT']) {
// DEVELOPMENT
  error_reporting(E_ALL);
  ini_set('display_errors', 'On');
  ini_set('display_startup_errors', 'On');
  ini_set('html_errors', 'On');
  ini_set('log_errors', 'On');
  ini_set('error_log', BASE_PATH . '/logs/php_error.log');
  define('BASE_URL', 'http://localhost:' . $_ENV['APACHE_PORT']);
  define('APP_FOLDER', 'src');
  define('DEV_MODE', true);
  $_ENV["DEV_MODE"] = 'true';
$this->host = getenv('MYSQL_HOST');
$this->user = getenv('MYSQL_USER');
$this->pass = getenv('MYSQL_PASSWORD');
$this->db = getenv('MYSQL_DATABASE');
$this->charset = 'UTF8';
$this->dsn = "mysql:host=$host;dbname=$db;charset=$charset";
} else {
// PRODUCTION
  error_reporting(0);
  ini_set('display_errors', 'Off');
  ini_set('display_startup_errors', 'Off');
  ini_set('html_errors', 'Off');
  ini_set('log_errors', 'On');
  ini_set('error_log', BASE_PATH . '/logs/php_error.log');
  define('BASE_URL', 'http://okudumanladim.com');
  define('APP_FOLDER', 'public_html');
  define('DEV_MODE', false);
  $_ENV["DEV_MODE"] = 'false';
$this->host = "localhost";
$this->user = "oku323anladicom_mysql";
$this->pass = "~WjRt2%35qmL1gunE!,PrW&A";
$this->db = "oku323anladicom_db";
$this->charset = 'UTF8';
$this->dsn = "mysql:host=$host;dbname=$db;charset=$charset";
}
}


    protected function query($sql)
    {
        $this->statement = $this->connect()->query($sql);
    }

    protected function connect()
    {

        try {
            $dsn = 'mysql:host='.$this->host.';dbname='.$this->db.';charset='.$this->$charset;
            $pdo = new PDO($dsn, $this->user, $this->pass);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
            $pdo->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_NATURAL);
            $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
            $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
            $pdo->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
            $pdo->setAttribute(PDO::ATTR_TIMEOUT, 3600);
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET CHARACTER SET utf8");
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET COLLATION_CONNECTION = 'utf8_general_ci'");
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET SQL_MODE = NO_AUTO_VALUE_ON_ZERO");
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET AUTOCOMMIT = 0");
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET time_zone = '+00:00'");
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET @@global.max_user_connections = 2");
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET @@global.net_read_timeout = 3600");
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET @@global.net_write_timeout = 3600");
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET @@global.wait_timeout = 3600");
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET @@global.connect_timeout = 3600");

            return $pdo;
        } catch (PDOException $e) {
            print ("Error!: ".$e->getMessage()."<br/>");
            echo "PDOException: ".$e->getCode()."<br/>";
            $e->getLine() . "<br/>";
            $e->getFile() . "<br/>";
            die();
        }

    }

    protected function prepare($sql)
    {
        $this->statement = $this->connect()->prepare($sql);
    }

}