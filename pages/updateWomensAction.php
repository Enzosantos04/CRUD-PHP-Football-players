<?php
include_once('../functions/functions.php');
session_start();
$dbConnect = dbLink();
if ($dbConnect) {
    echo '<!--Connection established--->';
}

showMem();

$id = $_POST['id'];
$name = $_POST['name'];
$birth_date = $_POST['birth_date'];
$nationality = $_POST['nationality'];
$goals = $_POST['goals'];
$assists = $_POST['assists'];
$titles = $_POST['titles'];
$position = $_POST['position'];
$biography = $_POST['biography'];
$image_main = $_POST['image_main'];
$image_details = $_POST['image_details'];
$mini_bio = $_POST['mini_bio'];

$result = updateWomens($dbConnect, $id, $name, $birth_date, $nationality, $goals, $assists, $position, $titles, $biography, $image_main, $image_details, $mini_bio);

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
    }
    ?>
</body>

</html>