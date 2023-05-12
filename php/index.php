<?php

session_start();

if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/database.php";
    $sql = "SELECT * FROM user
    WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/styles.css" />
</head>
<header>
    <div class="jumbotron">
        <h1 class="display-4">Home Page</h1>
        <p class="lead"><em>You may view your profile here, change sign in status or create a new account.</em></p>
        <hr class="my-4" />
        <p class="lead">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="../php/login.php">Log in</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="../php/logout.php">Log out</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="../html/index.html">Sign up</a>
            </li>
            </p>
    </div>
</header>

<body>
    <?php if (isset($user)): ?>
        <div id='profile' class="card">
            <h1 class="card-header">
                <?= htmlspecialchars($user["name"]) ?>'s Profile
            </h1>
            <div class="card-body">
                <p>Hello
                    <?= htmlspecialchars($user["name"]) ?>, you are now succesfully logged in. Welcome to your account page!
                </p>
                <ul>
                    <li>
                        <strong>Email:</strong>
                        <?= htmlspecialchars($user["email"]) ?>
                    </li>
                    <li>
                        <strong>About:</strong>
                        <?= htmlspecialchars($user["about"]) ?>
                    </li>
                </ul>
                <img src=<?= htmlspecialchars($user["path"]) ?> height='350'>

                <!-- This is just a functional example of user account deletion, however it is susceptible to SQL injection. -->

                <a id='delete' class='btn btn-danger'
                    onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone.')"
                    href="delete.php?id=<?php echo $user['id']; ?>">Delete Account</a>
            </div>
        </div>
    <?php else: ?>
        <div class="card">
            <h1 class="card-header">Logged out</h1>
            <p class="card-body">You are currently logged out.</p>
        </div>
    <?php endif; ?>
</body>

</html>