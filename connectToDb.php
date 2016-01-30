<?php
$host = 'localhost';
$user = 'root';
$pass = 'ltvmzyjd';
$db = 'wtj';

$connection = mysql_connect($host, $user, $pass);
mysql_set_charset('utf8', $connection);

if(!$connection || !mysql_select_db($db, $connection)){
    exit(mysql_error());
}


?>