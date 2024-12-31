<?php
include_once('../functions/functions.php');
session_start();
$dbConnect = dbLink();
if ($dbConnect) {
    echo '<!--Connection established--->';
}
$logoutStatus = $_GET['logout'];
if ($logoutStatus == 'logout') {
    $_SESSION['usernname'] = NULL;
    $_SESSION['password'] = NULL;
    $_SESSION['authenticate'] = NULL;
    session_destroy();
    session_regenerate_id();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@300..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="icon" href="../img/logo.png">
    <title>Football Legends</title>
</head>

<body>
    <?php
    navigationTwo();
    ?>

    <div class="login-box">
        <div class="form-login">
            <form action="dashboard.php" method="post">
                <h4>Access the dashboard</h4>
                <label>Username:</label>
                <input type="text" placeholder="Enter Username" name="username" required>
                <label>Password:</label>
                <input type="password" placeholder="Enter Password" name="password" required>
                <input type="submit" value="Log In">
        </div>
        </form>
    </div>


    <footer>
        <p>&copy; 2024 Football Legends. All rights reserved. | Created by Enzo Santos.</p>
    </footer>
</body>

</html>