<?php
define('BASE_PATH', dirname(dirname(__FILE__)));
define('CURRENT_PAGE', basename($_SERVER['REQUEST_URI']));
define('CURRENT_PAGE_ARRAY', explode('/', CURRENT_PAGE));

if($_SERVER['HTTP_HOST'] === 'localhost:'. $_ENV['APACHE_PORT'] && $_SERVER['SERVER_PORT'] === $_ENV['APACHE_PORT']) {
  define('DEV_MODE', true);
  $_ENV["DEV_MODE"] = 'true';
  error_reporting(E_ALL);
  ini_set('display_errors', 'On');
  ini_set('display_startup_errors', 'On');
  ini_set('html_errors', 'On');
  ini_set('log_errors', 'On');
  ini_set('error_log', BASE_PATH . '/logs/php_error.log');
  define('BASE_URL', 'http://localhost:' . $_ENV['APACHE_PORT']);
  define('APP_FOLDER', 'src');
  $driver = "mysqli";
  $host = $_ENV["MYSQL_HOST"];
  $user = $_ENV["MYSQL_USER"];
  $pass = $_ENV["MYSQL_PASSWORD"];
  $db = $_ENV["MYSQL_DATABASE"];
  $charset = 'UTF8';
  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
}
else {
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
  $driver = "pdo";
  $host = "localhost";
  $user = "oku1f5anladicom_mysql";
  $pass = "I+%bi$.O#aMT,rCYWh";
  $db = "oku1f5anladicom_db";
  $charset = 'UTF8';
  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
}


require_once 'helper.php';

class connect_pdo
{
  protected $dbh;
  public function __construct()
  {
    try {
            $driver = $GLOBALS['driver'];
            $host = $GLOBALS['host'];
            $db = $GLOBALS['db'];
            $user = $GLOBALS['user'];
            $pass = $GLOBALS['pass'];
            $charset = $GLOBALS['charset'];
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

            if ($driver === "mysqli") {
              $options = mysqli_init();
              mysqli_options($options, MYSQLI_OPT_CONNECT_TIMEOUT, 5);
              mysqli_options($options, MYSQLI_INIT_COMMAND, "SET NAMES utf8");
              mysqli_options($options, MYSQLI_INIT_COMMAND, "SET CHARACTER SET utf8");
              mysqli_options($options, MYSQLI_INIT_COMMAND, "SET COLLATION_CONNECTION = 'utf8_general_ci'");
              mysqli_options($options, MYSQLI_INIT_COMMAND, "SET SQL_MODE = NO_AUTO_VALUE_ON_ZERO");
              mysqli_options($options, MYSQLI_INIT_COMMAND, "SET AUTOCOMMIT = 0");
              mysqli_options($options, MYSQLI_INIT_COMMAND, "SET time_zone = '+00:00'");
              mysqli_options($options, MYSQLI_INIT_COMMAND, "SET @@global.max_user_connections = 2");
              mysqli_options($options, MYSQLI_INIT_COMMAND, "SET @@global.net_read_timeout = 3600");
              mysqli_options($options, MYSQLI_INIT_COMMAND, "SET @@global.net_write_timeout = 3600");
              mysqli_options($options, MYSQLI_INIT_COMMAND, "SET @@global.wait_timeout = 3600");
              mysqli_options($options, MYSQLI_INIT_COMMAND, "SET @@global.connect_timeout = 3600");
              mysqli_options($options, MYSQLI_OPT_CONNECT_TIMEOUT, 5);
              $con = new mysqli($host, $user, $pass, $db);
              if (!$con) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
              }
              else {
                $t_id = mysqli_thread_id($con);
                if (!$t_id) {
                echo "Errorcode: " . mysqli_connect_errno() . PHP_EOL;
                echo "Errormessage: " . mysqli_connect_error() . PHP_EOL;
                exit();
              }
                debug_console("MySQLi successfull connection : " . $t_id);
                $this->dbh = $con;
            }
              return false;
            } else {
            $con = new PDO($dsn, $user, $pass);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $con->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
            $con->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_NATURAL);
            $con->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
            $con->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
            $con->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
            $con->setAttribute(PDO::ATTR_TIMEOUT, 3600);
            $con->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
            $con->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET CHARACTER SET utf8");
            $con->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET COLLATION_CONNECTION = 'utf8_general_ci'");
            $con->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET SQL_MODE = NO_AUTO_VALUE_ON_ZERO");
            $con->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET AUTOCOMMIT = 0");
            $con->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET time_zone = '+00:00'");
            $con->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET @@global.max_user_connections = 2");
            $con->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET @@global.net_read_timeout = 3600");
            $con->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET @@global.net_write_timeout = 3600");
            $con->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET @@global.wait_timeout = 3600");
            $con->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET @@global.connect_timeout = 3600");
            $this->dbh = $con;
            }
            }
              catch (PDOException $err) {
            echo "PDOException: ".$err->getCode()."<br/>";
            $err->getMessage() . "<br/>";
            $err->getLine() . "<br/>";
            $err->getFile() . "<br/>";
            die();
        }
    }

    public function dbh()
    {
        return $this->dbh;
    }

    public function __destruct()
    {
        $this->dbh = null;
    }
}


$con = new connect_pdo();
$con = $con->dbh();