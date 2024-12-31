<?php

include_once('../functions/functions.php');
session_start();
$dbConnect = dbLink();
if ($dbConnect) {
    echo '<!--Connection established--->';
}

showMem();
$id = $_GET['id'];

$result = deleteWomens($dbConnect, $id);
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