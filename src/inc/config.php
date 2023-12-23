<?php

// Database configuration
if(!isset($_ENV["DEV_MODE"])) {
$host = "localhost";
$user = "oku1f5anladicom_mysql";
$pass = "I+%bi$.O#aMT,rCYWh";
$db = "oku1f5anladicom_db";
$charset = 'UTF8';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

} else {
$host = $_ENV["MYSQL_HOST"];
$user = $_ENV["MYSQL_USER"];
$pass = $_ENV["MYSQL_PASSWORD"];
$db = $_ENV["MYSQL_DATABASE"];
$charset = 'UTF8';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
};

$domain = "https://okudumanladim.com"; // on production