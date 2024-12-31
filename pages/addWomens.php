<?php
include_once('../functions/functions.php');
session_start();
$dbConnect = dbLink();
if ($dbConnect) {
    echo '<!--Connection established--->';
}

showMem();
$name = $_POST['name'];
$birth_date = $_POST['birth_date'];
$nationality = $_POST['nationality'];
$position = $_POST['position'];
$goals = $_POST['goals'];
$assists = $_POST['assists'];
$titles = $_POST['titles'];
$image_main = $_POST['image_main'];
$image_details = $_POST['image_details'];
$biography = $_POST['biography'];
$mini_bio = $_POST['mini_bio'];

$result = addWomens($dbConnect, $name, $birth_date, $nationality, $goals, $assists, $titles, $position, $biography, $image_main, $image_details, $mini_bio)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if ($result) {
        header('location: dashboard.php');
    } else {
        echo '<h1>Failed to add player</h1>';
    }
    ?>
</body>

</html>