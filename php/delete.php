<?php

include "database.php";

$id = $_GET['id'];

$delete = mysqli_query($mysqli, "DELETE FROM user where id = '$id'");

if ($delete) {
    mysqli_close($mysqli);
    header("Location: ../html/index.html");
    exit;
} else {
    echo "Error deleting the account";
}
?>