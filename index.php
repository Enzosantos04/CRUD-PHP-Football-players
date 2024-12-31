<?php
include_once('functions/functions.php');
session_start();
$dbConnect = dbLink();
if ($dbConnect) {
    echo '<!--Connection established--->';
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@300..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="icon" href="img/logo.png">
    <title>Football Legends</title>
</head>

<body>
    <?php
    navigation();
    ?>

    <section id="banner-index">
        <div class="text-banner">
            <h1>Legends who shaped the game.</h1>
            <p>Discover the incredible talents and achievements of the most famous football players around the world.
            </p>
        </div>
    </section>
    <div class="main-text">
        <h4>Celebrating the Greatest Players in Football History</h4>
        <p>Football is far more than just a game it’s a global phenomenon that unites millions of passionate fans,
            transcending borders, cultures, and generations. It’s a sport that sparks emotions, builds communities, and
            inspires dreams. At Football Legends, we celebrate the extraordinary players who have left an indelible mark
            on the beautiful game, shaping its history and captivating audiences with their unmatched skills and
            unforgettable performances.

            These icons are more than athletes—they are symbols of determination, resilience, and excellence. From
            scoring jaw-dropping goals that defy imagination to delivering match-winning performances under pressure,
            they have redefined what it means to be a legend. Their influence extends far beyond the pitch, as they
            inspire fans with their leadership, sportsmanship, and unwavering dedication to their craft.

            Whether it’s the elegance of a perfectly executed free-kick, the drama of a last-minute winner, or the
            unyielding spirit of a captain rallying their team to victory, the stories of these football legends
            continue to echo through time. They remind us that greatness isn’t just about talent but also about hard
            work, perseverance, and the ability to rise to the occasion when it matters most.

            At Football Legends, we honor these timeless heroes by sharing their journeys, achievements, and impact on
            the sport. Join us as we relive iconic moments, celebrate historic victories, and pay tribute to the players
            who have made football more than just a game it’s a way of life.</p>
    </div>
    <section id="second-banner">
        <div class="text-banner">
            <h1>Top plays</h1>
            <p>
                Relive legendary moments! Watch highlights of the greatest players and their iconic performances.
            </p>
        </div>
    </section>
    <div class="text-plays">
        <h4>Highlights of the greatest players</h4>
        <p>
            Watch the most iconic moments from legendary players around the world, including footballing giants like
            Pelé, Maradona, and Marta. Relive their unforgettable performances that have shaped the history of the
            sport.
        </p>
    </div>
    <div class="plays-section">
        <div class="plays-video">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/kVBFXwIKhug?si=PAY2AKvWTXHJSP5I"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            <p>Maradona: A genius whose skills transcended the game, creating magic on the field.</p>
        </div>
        <div class="plays-video"> <iframe width="560" height="315"
                src="https://www.youtube.com/embed/WXg8P0u9W9I?si=fd6gu1YANHL1tu2x&amp;start=6"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            <p>Pelé: The King of Football, a legend whose legacy is etched in the heart of the sport.</p>
        </div>
        <div class="plays-video"> <iframe width="560" height="315"
                src="https://www.youtube.com/embed/8R1y2fgUcic?si=XmA_XLPM6kFy65bm&amp;start=12"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            <p>Marta: The Queen of Football, a legend whose impact resonates worldwide.</p>
        </div>

    </div>

    <footer>
        <p>&copy; 2024 Football Legends. All rights reserved. | Created by Enzo Santos.</p>
    </footer>
</body>

</html>