<?php

include_once('../functions/functions.php');
session_start();
$dbConnect = dbLink();
if ($dbConnect) {
    echo '<!--Connection established--->';
}

// showMem();
$id = $_GET['id'];
$name = returnWomensDetails($dbConnect, $id, 'name');
$birth_date = returnWomensDetails($dbConnect, $id, 'birth_date');
$nationality = returnWomensDetails($dbConnect, $id, 'nationality');
$goals = returnWomensDetails($dbConnect, $id, 'goals');
$assists = returnWomensDetails($dbConnect, $id, 'assists');
$titles = returnWomensDetails($dbConnect, $id, 'titles');
$biography = returnWomensDetails($dbConnect, $id, 'biography');
$position = returnWomensDetails($dbConnect, $id, 'position');
$image_main = returnWomensDetails($dbConnect, $id, 'image_main');
$image_details = returnWomensDetails($dbConnect, $id, 'image_details');
$mini_bio = returnWomensDetails($dbConnect, $id, 'mini_bio');



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

    <section id="banner-dash">
        <div class="text-banner">
            <h1> Football Legends Dashboard.</h1>
            <p>Manage all website content.</p>
        </div>
    </section>
    <div class="title-dash">
        <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        <p></p>
    </div>

    <?php
    echo ' <div class="dashboard-controls">
        <div class="form-dash-add">
            <form action="updateWomensAction.php" method="post">
                <h4>Update Womens Players</h4>
                <label>Name:</label>
                <input type="text" placeholder="Players Name" name="name" value="' . $name . '">
                <label>Birth:</label>
                <input type="date" placeholder="Birth Date" name="birth_date" value="' . $birth_date . '">
                <label>Natitonality:</label>
                <input type="text" placeholder="Nationality" name="nationality" value="' . $nationality . '">
                <label>Position:</label>
                <input type="text" placeholder="Position" name="position" value="' . $position . '">
                <label>Goals:</label>
                <input type="number" placeholder="Goals" name="goals" value="' . $goals . '">
                <label>Assists:</label>
                <input type="number" placeholder="Assists" name="assists" value="' . $assists . '">
                <label>Titles:</label>
                <input type="number" placeholder="Titles" name="titles" value="' . $titles . '">
                <label>Image:</label>
                <input type="text" placeholder="e.g., image.jpg" name="image_main" value="' . $image_main . '">
                <label>Image Details:</label>
                <input type="text" placeholder="e.g., image.jpg" name="image_details" value="' . $image_details . '">
                 <label>Small Biography for Cards:</label>
                <textarea name="mini_bio" maxlength="80" placeholder="Maximum 72 characters.">' . htmlspecialchars($mini_bio) . '</textarea>
                <label>Biography:</label>
                <textarea name="biography"  maxlength="2800" placeholder="Maximum 2800 characters.">' . htmlspecialchars($biography) . '</textarea>
                <input type="hidden" name="id" value="' . $id . '">
                <input type="submit" value="UPDATE">
            </form>
        </div>'
    ?>


    </div>
    <footer>
        <p>&copy; 2024 Football Legends. All rights reserved. | Created by Enzo Santos.</p>
    </footer>

</body>

</html>