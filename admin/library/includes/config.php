<?php 
// DB credentials.
define('DB_HOST','185.185.40.33');
define('DB_USER','root');
define('DB_PASS','root');
define('DB_NAME','esdm_db');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>