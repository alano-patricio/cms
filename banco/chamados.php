<?php

define('DB_HOSTNAME','localhost'); // database host name
define('DB_USERNAME', 'cpd');     // database user name
define('DB_PASSWORD', 'ca013976'); // database password
define('DB_NAME', 'chamados'); // database name
 
$dsn = 'mysql:host='.DB_HOSTNAME.';dbname='.DB_NAME;
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
$pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD, $options);

?>