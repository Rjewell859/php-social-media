<?php

$servername = "localhost";
$username = "root";
$password = "";
$port = 4306;

// Creating a connection
$conn = new mysqli($servername, $username, $password, '', $port);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($conn->query("DROP DATABASE IF EXISTS login_db")) {
    echo ("Database login_db dropped successfully.<br />");
}
if ($conn->errno) {
    echo ("Could not drop database does not exist. %s<br />");
}

$sql = "CREATE DATABASE login_db";

if (mysqli_query($conn, $sql)) {
    echo "login_db created successfully<br />";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
$sql = "USE login_db";
if (mysqli_query($conn, $sql)) {
    echo "login_db selected<br />";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

$sql2 = "
CREATE TABLE user
(
id INT(11) AUTO_INCREMENT PRIMARY KEY,
name varchar(60) NOT NULL,
email varchar(150) UNIQUE NOT NULL,
hash varchar(255) NOT NULL,
about varchar(255),
path varchar(150)    
)";

if (mysqli_query($conn, $sql2)) {
    echo "User table created successfully. To begin the user experience navigate to the <a href='../html/index.html'>signup page</a>";
} else {
    echo "ERROR: Could not able to execute $sql2. " . mysqli_error($conn);
}

$conn->close();
?>