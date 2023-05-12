<?php

$mysqli = require __DIR__ . "/database.php";

$name = $_POST["fullName"];
$email = $_POST["email"];
$about = $_POST["about"];
$pass = $_POST["password"];
$conf = $_POST["confirm"];

if (empty($name)) {
    die("Enter your full name.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Please provide a valid email.");
}

if (strlen($pass) < 8) {
    die("Provided password under 8 characters.");
}

if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $pass)) {
    die("Password requires characters in both cases and a number.");
}

if ($pass !== $conf) {
    die("Both passwords must match.");
}

$hashed = password_hash($pass, PASSWORD_DEFAULT);

if (isset($_POST)) {
    $target_path = "../images/";
    $target_path = $target_path . basename($_FILES['picture']['name']);
    if (move_uploaded_file($_FILES['picture']['tmp_name'], $target_path)) {
        $sql = "Insert into user(`name`, `email`, `hash`, `about`, `path`) values('$name', '$email', '$hashed', '$about', '$target_path')";
        if ($mysqli->query($sql) == TRUE) {
            echo "Signup successfull<br><br>";
            header("Location: ../html/success.html");
            exit;
        } else {
            echo "Error:" . $sql . $mysqli->error;
        }
        $mysqli->close();
    }
}
?>