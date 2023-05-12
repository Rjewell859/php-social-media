<?php

$isValid = true;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = require __DIR__ . "/database.php";
    $sql = sprintf("SELECT * FROM user
        WHERE email = '%s'",
        $mysqli->real_escape_string($_POST["email"])
    );
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();

    if ($user) {
        if (password_verify($_POST["password"], $user['hash'])) {
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $user["id"];
            header("Location: ./index.php");
            exit;
        }
    }
    $isValid = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Page</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/styles.css" />
</head>
<header>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" href="../html/index.html">Signup</a>
        </li>
</header>

<body>
    <div class="card">
        <h1 class="card-header">Login</h1>
        <form id='login' method="post">
            <div class="form-group">
                <label class='control-label col-sm-2' for='email'>Email:</label>
                <div class="col-sm-10">
                    <input class="form-control" type="email" name="email" id="email"
                        value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                </div>
            </div>
            <div class="form-group">
                <label class='control-label col-sm-2' for='password'>Password:</label>
                <div class="col-sm-10">
                    <input class="form-control" type="password" name="password" id="password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button class='btn btn-primary'>Log in</button>
                </div>
                <?php
                if (!$isValid): ?>
                    <em id='error-login'>Invalid login</em>
                <?php endif; ?>
            </div>
        </form>
</body>

</html>