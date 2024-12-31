<?php
include_once('../functions/functions.php');
session_start();
$dbConnect = dbLink();
if ($dbConnect) {
    echo '<!--Connection established--->';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username && $password) {
        $auth = auth($dbConnect, $username, $password);
        if ($auth) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header('Location: dashboard.php');
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/af867aa7fa.js" crossorigin="anonymous"></script>
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


    <?php
    if ($_SESSION['authenticate'] == 'yes') {
        echo '
    <section id="banner-dash">
        <div class="text-banner">
            <h1>Football Legends Dashboard.</h1>
            <p>Manage all Player\'s content.</p>
        </div>
    </section>
    <div class="title-dash">
        <h2>Welcome, ' . $_SESSION['username'] . '!</h2>
        <p></p>
    </div>
    <div class="dashboard-controls">
        <div class="form-dash-add">
            <form action="addMens.php" method="post">
                <h4>Add Mens Players</h4>
                <label>Name:</label>
                <input type="text" placeholder="Player\'s Name" name="name">
                <label>Birth:</label>
                <input type="date" placeholder="Birth Date" name="birth_date">
                <label>Nationality:</label>
                <input type="text" placeholder="Nationality" name="nationality">
                <label>Position:</label>
                <input type="text" placeholder="Position" name="position">
                <label>Goals:</label>
                <input type="number" placeholder="Goals" name="goals">
                <label>Assists:</label>
                <input type="number" placeholder="Assists" name="assists">
                <label>Titles:</label>
                <input type="number" placeholder="Titles" name="titles">
                <label>Image:</label>
                <input type="text" placeholder="e.g., image.jpg" name="image_main">
                <label>Image Details:</label>
                <input type="text" placeholder="e.g., image.jpg" name="image_details">
                <label>Small Biography for cards:</label>
                <textarea name="mini_bio" maxlength="72" placeholder="Maximum 72 characters."></textarea>
                <label>Biography:</label>
                <textarea name="biography" maxlength="2800" placeholder="Maximum 2800 characters."></textarea>
                <input type="submit" value="Add">
            </form>
        </div>
        <div class="box-mens">
            <h4>Manage Mens Players</h4>';
        listMensUpdateDelete($dbConnect);
        echo '
        </div>
        <div class="form-dash-add">
            <form action="addWomens.php" method="post">
                <h4>Add Womens Players</h4>
                <label>Name:</label>
                <input type="text" placeholder="Player\'s Name" name="name">
                <label>Birth:</label>
                <input type="date" placeholder="Birth Date" name="birth_date">
                <label>Nationality:</label>
                <input type="text" placeholder="Nationality" name="nationality"> 
                <label>Position:</label>
                <input type="text" placeholder="Position" name="position">
                <label>Goals:</label>
                <input type="number" placeholder="Goals" name="goals">
                <label>Assists:</label>
                <input type="number" placeholder="Assists" name="assists">
                <label>Titles:</label>
                <input type="number" placeholder="Titles" name="titles">
                <label>Image:</label>
                <input type="text" placeholder="e.g., image.jpg" name="image_main">
                <label>Image Details:</label>
                <input type="text" placeholder="e.g., image.jpg" name="image_details">
                <label>Small Biography for cards:</label>
                <textarea name="mini_bio" maxlength="80" placeholder="Maximum 72 characters."></textarea>
                <label>Biography:</label>
                <textarea name="biography" maxlength="2800" placeholder="Maximum 2800 characters."></textarea>
                <input type="submit" value="Add">
            </form>
        </div>
        <div class="box-womens">
            <h4>Manage Womens Players</h4>';
        listWomensUpdateDelete($dbConnect);
        echo '
        </div>
    </div>';
    } else {
        echo ' <div class="login-box">
        <div class="form-login">
            <form action="dashboard.php" method="post">
                <h4>Access the dashboard</h4>
                <label>Username:</label>
                <input type="text" placeholder="Enter Username" name="username" required value="' . $_SESSION['username'] . '">
                <label>Password:</label>
                <input type="password" placeholder="Enter Password" name="password" required value="' . $_SESSION['password'] . '">
                <small style="color: red">Incorrect username or password. Please check your details and try again.</small>
                <input type="submit" value="Log In">
        </div>
        </form>
    </div>
';
    }
    ?>



    <footer>
        <p>&copy; 2024 Football Legends. All rights reserved. | Created by Enzo Santos.</p>

    </footer>
</body>


</html>