<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'login_db';

// The port number in the following line should be changed to 3306 (if using a non-default port enter that number instead)

$mysqli = new mysqli($host, $username, $password, $dbname, 4306);

if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;

?>