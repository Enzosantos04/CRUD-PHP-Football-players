<?php

function dbLink() // function connects to the database
{
    $db_user = "mri";
    $db_pass = "password";
    $db_host = "localhost";
    $db = "players";

    try {
        $db = new PDO("mysql:host=$db_host; dbname=$db", $db_user, $db_pass);
    } catch (Exception $e) {
        echo 'Unable to connect to database';
        exit;
    }
    error_reporting(0);
    return $db;
}

function showMem()
{
    echo '<div class="mem">';
    echo '<pre>';
    echo '<h3>Post</h3>';
    print_r($_POST);
    echo '<h3>Get</h3>';
    print_r($_GET);
    echo '<h3>Session</h3>';
    print_r($_SESSION);
    echo '</pre>';
    echo '</div>';
}

function auth($dbConnect, $username, $password)
{
    $sql = "SELECT * FROM users WHERE username = :username";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(':username', $username);
    $query->execute();

    if ($query->rowCount() > 0) {
        $row = $query->fetch(PDO::FETCH_ASSOC);
        if ($row['password'] == $password) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['authenticate'] = 'yes';
            return true;
        } else {
            return false;
        }
    }

    return false;
}

function navigation()
{
    if ($_SESSION['authenticate'] == 'yes') {
        echo '   <div class="mini-nav">
        <h1>Football Legends</h1>
        <a href="index.php"><img src="img/logo.png" alt="" id="logoNav"></a>
    </div>
    <header>

        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="pages/mens.php">Mens</a></li>
                <li><a href="pages/womens.php">Womens</a></li>
                <li><a href="pages/dashboard.php">admin</a></li>
                <li><a href="pages/login.php?logout=logout">logout</a></li>
            </ul>
        </nav>
    </header>';
    } else {
        echo '   <div class="mini-nav">
        <h1>Football Legends</h1>
        <a href="index.php"><img src="img/logo.png" alt="" id="logoNav"></a>
    </div>
    <header>

        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="pages/mens.php">Mens</a></li>
                <li><a href="pages/womens.php">Womens</a></li>
                <li><a href="pages/login.php">admin</a></li>
            </ul>
        </nav>
    </header>';
    }
}
function navigationTwo()
{

    if ($_SESSION['authenticate'] == 'yes') {
        echo '   <div class="mini-nav">
        <h1>Football Legends</h1>
        <a href="../index.php"><img src="../img/logo.png" alt="" id="logoNav"></a>
    </div>
    <header>

        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="mens.php">Mens</a></li>
                <li><a href="womens.php">Womens</a></li>
                <li><a href="dashboard.php">Admin</a></li>
                <li><a href="login.php?logout=logout">logout</a></li>
                
            </ul>
        </nav>
    </header>';
    } else {
        echo '   <div class="mini-nav">
        <h1>Football Legends</h1>
        <a href="../index.php"><img src="../img/logo.png" alt="" id="logoNav"></a>
    </div>
    <header>

        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="mens.php">Mens</a></li>
                <li><a href="womens.php">Womens</a></li>
                <li><a href="login.php">Admin</a></li>                
            </ul>
        </nav>
    </header>';
    }
}

function addMens($dbConnect, $name, $birth_date, $nationality, $goals, $assists, $titles, $position, $biography, $image_main, $image_details, $mini_bio)
{
    $sql = "INSERT INTO mens(name, birth_date, nationality, goals, assists, titles, position, biography, image_main, image_details, mini_bio)  
            VALUES(:name, :birth_date, :nationality, :goals, :assists, :titles, :position, :biography, :image_main, :image_details, :mini_bio)";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':birth_date', $birth_date, PDO::PARAM_STR);
    $query->bindParam(':nationality', $nationality, PDO::PARAM_STR);
    $query->bindParam(':goals', $goals, PDO::PARAM_INT);
    $query->bindParam(':assists', $assists, PDO::PARAM_INT);
    $query->bindParam(':titles', $titles, PDO::PARAM_INT);
    $query->bindParam(':position', $position, PDO::PARAM_STR);
    $query->bindParam(':biography', $biography, PDO::PARAM_STR);
    $query->bindParam(':image_main', $image_main, PDO::PARAM_STR);
    $query->bindParam(':image_details', $image_details, PDO::PARAM_STR);
    $query->bindParam(':mini_bio', $mini_bio, PDO::PARAM_STR);
    $result = $query->execute();
    return $result;
}




function listMensUpdateDelete($dbConnect)
{
    echo '<table class="player-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>';

    $sql = "SELECT * FROM mens";
    foreach ($dbConnect->query($sql) as $row) {
        echo '<tr>
                <td>' . $row['name'] . '</td>
                <td>
                    <a href="updateMens.php?id=' . $row['id'] . '"> <i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="actionDeleteMens.php?id=' . $row['id'] . '"><i class="fa-solid fa-trash"></i></a>
                </td>
              </tr>';
    }

    echo '</tbody></table>';
}

function returnMensDetails($dbConnect, $id, $fieldName)
{

    $sql = "SELECT * FROM mens WHERE id = :id";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $movie = $query->fetch(PDO::FETCH_ASSOC);
    if ($movie) {
        return $movie[$fieldName];
    }
}


function updateMens($dbConnect, $id, $name, $birth_date, $nationality, $goals, $assists, $position, $titles, $biography, $image_main, $image_details, $mini_bio)
{
    $sql = "UPDATE mens SET name = :name, birth_date = :birth_date, nationality = :nationality, goals = :goals, assists = :assists, titles = :titles, position = :position, biography = :biography, image_main = :image_main, image_details = :image_details, mini_bio = :mini_bio WHERE id = :id";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':birth_date', $birth_date, PDO::PARAM_STR);
    $query->bindParam(':nationality', $nationality, PDO::PARAM_STR);
    $query->bindParam(':goals', $goals, PDO::PARAM_INT);
    $query->bindParam(':assists', $assists, PDO::PARAM_INT);
    $query->bindParam(':titles', $titles, PDO::PARAM_INT);
    $query->bindParam(':position', $position, PDO::PARAM_STR);
    $query->bindParam(':biography', $biography, PDO::PARAM_STR);
    $query->bindParam(':image_main', $image_main, PDO::PARAM_STR);
    $query->bindParam(':image_details', $image_details, PDO::PARAM_STR);
    $query->bindParam(':mini_bio', $mini_bio, PDO::PARAM_STR);
    $result = $query->execute();
    return $result;
}

function deleteMens($dbConnect, $id)
{
    $sql = "DELETE FROM mens WHERE id = :id";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $result = $query->execute();
    return $result;
}

function addWomens($dbConnect, $name, $birth_date, $nationality, $goals, $assists, $position, $titles, $biography, $image_main, $image_details, $mini_bio)
{
    $sql = "INSERT INTO womens(name, birth_date, nationality, goals, assists, titles, position, biography, image_main, image_details, mini_bio)  
            VALUES(:name, :birth_date, :nationality, :goals, :assists, :titles, :position, :biography, :image_main, :image_details, :mini_bio)";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(':name', $name);
    $query->bindParam(':birth_date', $birth_date);
    $query->bindParam(':nationality', $nationality);
    $query->bindParam(':goals', $goals);
    $query->bindParam(':assists', $assists);
    $query->bindParam(':titles', $titles);
    $query->bindParam(':position', $position);
    $query->bindParam(':biography', $biography);
    $query->bindParam(':image_main', $image_main);
    $query->bindParam(':image_details', $image_details);
    $query->bindParam(':mini_bio', $mini_bio);
    $result = $query->execute();
    return $result;
}

function listWomensUpdateDelete($dbConnect)
{
    echo '<table class="player-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>';

    $sql = "SELECT * FROM womens";
    foreach ($dbConnect->query($sql) as $row) {
        echo '<tr>
                <td>' . $row['name'] . '</td>
                <td>
                    <a href="updateWomens.php?id=' . $row['id'] . '"> <i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="actionDeleteWomens.php?id=' . $row['id'] . '"><i class="fa-solid fa-trash"></i></a>
                </td>
              </tr>';
    }

    echo '</tbody></table>';
}

function returnWomensDetails($dbConnect, $id, $fieldName)
{

    $sql = "SELECT * FROM womens WHERE id = :id";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $movie = $query->fetch(PDO::FETCH_ASSOC);
    if ($movie) {
        return $movie[$fieldName];
    }
}

function updateWomens($dbConnect, $id, $name, $birth_date, $nationality, $goals, $assists, $position, $titles, $biography, $image_main, $image_details, $mini_bio)
{
    $sql = "UPDATE womens SET name = :name, birth_date = :birth_date, nationality = :nationality, goals = :goals, assists = :assists, titles = :titles, position = :position, biography = :biography, image_main = :image_main, image_details = :image_details, mini_bio = :mini_bio WHERE id = :id";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':birth_date', $birth_date, PDO::PARAM_STR);
    $query->bindParam(':nationality', $nationality, PDO::PARAM_STR);
    $query->bindParam(':goals', $goals, PDO::PARAM_INT);
    $query->bindParam(':assists', $assists, PDO::PARAM_INT);
    $query->bindParam(':titles', $titles, PDO::PARAM_INT);
    $query->bindParam(':position', $position, PDO::PARAM_STR);
    $query->bindParam(':biography', $biography, PDO::PARAM_STR);
    $query->bindParam(':image_main', $image_main, PDO::PARAM_STR);
    $query->bindParam(':image_details', $image_details, PDO::PARAM_STR);
    $query->bindParam(':mini_bio', $mini_bio, PDO::PARAM_STR);
    $result = $query->execute();
    return $result;
}

function deleteWomens($dbConnect, $id)
{
    $sql = "DELETE FROM womens WHERE id = :id";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $result = $query->execute();
    return $result;
}

function displayMensPlayers($dbConnect)
{
    $sql = "SELECT * FROM mens";
    foreach ($dbConnect->query($sql) as $row) {
        echo '<div class="card">
            <img src="../img/' . $row['image_main'] . '" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">' . $row['name'] . '</h5>
                <div class="card-text">
                <p class="card-text">' . $row['mini_bio'] . '</p>
                 </div>
                <a href="mensDetails.php?id=' . $row['id'] . '" class="btn">Biography</a>
            </div>
         </div>';
    }
}
function displayWomensPlayers($dbConnect)
{
    $sql = "SELECT * FROM womens";
    foreach ($dbConnect->query($sql) as $row) {
        echo ' <div class="card">
            <img src="../img/' . $row['image_main'] . '" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">' . $row['name'] . '</h5>
                <p class="card-text">' . $row['mini_bio'] . '</p>
                <a href="womensDetails.php?id=' . $row['id'] . '" class="btn">Biography</a>
            </div>
            </div>';
    }
}

function returnMensDetail($dbConnect, $id, $fieldName)
{

    $sql = "SELECT * FROM mens WHERE id = :id";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $force = $query->fetch(PDO::FETCH_ASSOC);
    if ($force) {
        return $force[$fieldName];
    }
}
