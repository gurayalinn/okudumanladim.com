<?php

// Database configuration
if(!isset($_ENV["DEV_MODE"])) {
$host = "localhost";
$user = "oku1f5anladicom_mysql";
$pass = "I+%bi$.O#aMT,rCYWh";
$db = "oku1f5anladicom_db";
$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

} else {
$host = $_ENV["MYSQL_HOST"];
$user = $_ENV["MYSQL_USER"];
$pass = $_ENV["MYSQL_PASSWORD"];
$db = $_ENV["MYSQL_DATABASE"];
$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
};