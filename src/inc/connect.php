<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
define('BASE_PATH', dirname(dirname(__FILE__)));
define('APP_FOLDER', 'mysql');
define('CURRENT_PAGE', basename($_SERVER['REQUEST_URI']));

require_once BASE_PATH . '/inc/utils/helper.php';


class connect_pdo
{
    protected $dbh;

    public function __construct()
    {
        try {
            require_once ('config.php');
            $con = new PDO($dsn, $user, $pass);
            $con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // set error mode
            $con->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);  // set fetch mode
            $con->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );  //  set false for security reasons
            $con->setAttribute( PDO::ATTR_PERSISTENT, true );  //  set true for persistent connection
            $con->setAttribute( PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true );  //  set true for buffered queries
            $con->setAttribute( PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");  //  set default connection charset utf-8
            $con->setAttribute( PDO::MYSQL_ATTR_INIT_COMMAND, "SET CHARACTER SET utf8");  //  set default connection charset utf-8
            $con->setAttribute( PDO::MYSQL_ATTR_INIT_COMMAND, "SET COLLATION_CONNECTION = 'utf8_general_ci'");  //  set default connection collation utf-8
            $con->setAttribute( PDO::MYSQL_ATTR_INIT_COMMAND, "SET SQL_MODE = NO_AUTO_VALUE_ON_ZERO");
            $con->setAttribute( PDO::MYSQL_ATTR_INIT_COMMAND, "SET AUTOCOMMIT = 0"); //  set autocommit to off
            $con->setAttribute( PDO::MYSQL_ATTR_INIT_COMMAND, "SET time_zone = '+00:00'");  //  set default connection timezone
            $con->setAttribute( PDO::MYSQL_ATTR_INIT_COMMAND, "SET @@global.max_connections = 100");
            $con->setAttribute( PDO::MYSQL_ATTR_INIT_COMMAND, "SET @@global.max_user_connections = 2");
            $con->setAttribute( PDO::MYSQL_ATTR_INIT_COMMAND, "SET @@global.net_read_timeout = 3600");
            $con->setAttribute( PDO::MYSQL_ATTR_INIT_COMMAND, "SET @@global.net_write_timeout = 3600");
            $con->setAttribute( PDO::MYSQL_ATTR_INIT_COMMAND, "SET @@global.wait_timeout = 3600");
            $con->setAttribute( PDO::MYSQL_ATTR_INIT_COMMAND, "SET @@global.connect_timeout = 3600");
            $con->setAttribute( PDO::MYSQL_ATTR_INIT_COMMAND, "SET @@global.max_allowed_packet = 268435456");
            $con->setAttribute( PDO::MYSQL_ATTR_INIT_COMMAND, "SET @@global.sql_mode = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");
            }
        catch (PDOException $err) {
            echo "harmless error message if the connection fails";
            $err->getMessage() . "<br/>";
            // file_put_contents('PDOErrors.txt',$err, FILE_APPEND);  // write some details to an error-log outside public_html
            die();  //  terminate connection
            exit;
        }
    }

    public function dbh()
    {
        return $this->dbh;
    }
}
#   put database handler into a var for easier access
    $con = new connect_pdo();
    $con = $con->dbh();
//

class StructureFactory
{
    protected $provider = null;
    protected $connection = null;

    public function __construct( callable $provider )
    {
        $this->provider = $provider;
    }

    public function create( $name)
    {
        if ( $this->connection === null )
        {
            $this->connection = call_user_func( $this->provider );
        }
        return new $name( $this->connection );
    }

}

$provider = function()
{
    $instance = $con->dbh();
    return $instance;
};

$factory = new StructureFactory( $provider );