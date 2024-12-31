<?php

include_once('../functions/functions.php');
session_start();
$dbConnect = dbLink();
if ($dbConnect) {
    echo '<!--Connection established--->';
}

$id = $_GET['id'];
$name = returnMensDetail($dbConnect, $id, 'name');
$birth_date = returnMensDetail($dbConnect, $id, 'birth_date');
$nationality = returnMensDetail($dbConnect, $id, 'nationality');
$goals = returnMensDetail($dbConnect, $id, 'goals');
$assists = returnMensDetail($dbConnect, $id, 'assists');
$titles = returnMensDetail($dbConnect, $id, 'titles');
$position = returnMensDetail($dbConnect, $id, 'position');
$image_details = returnMensDetail($dbConnect, $id, 'image_details');
$biography = returnMensDetail($dbConnect, $id, 'biography');
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

<body id="bgindex">
    <?php
    navigationTwo();
    ?>

    <div class="title-player-detail">
        <h1><?php echo $name ?></h1>
    </div>

    <div class="main-box-details">
        <div class="box-content-players">
            <img src="../img/<?php echo $image_details; ?>" alt="" id="detailsImg">
        </div>

        <div class="text-bio-details">
            <p><?php echo $biography ?></p>
        </div>
    </div>


    <div class="box-info-players">
        <h4> Birth Date: <?php echo $birth_date  ?></h4>
        <hr>
        <h4>Position: <?php echo $position ?></h4>
        <hr>
        <h4>Nationality: <?php echo $nationality ?></h4>
        <hr>
        <h4>Goals: <?php echo $goals ?></h4>
        <hr>
        <h4>Assists: <?php echo $assists ?></h4>
        <hr>
        <h4>Titles: <?php echo $titles ?></h4>


    </div>


    <footer>
        <p> &#169 Enzo Santos | All rights reserved. <br>

        </p>
    </footer>
</body>

</html>