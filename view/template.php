<!--***************************** BASE DE L'ENSEMBLE DES VUES ***************************-->
<!-- on déclare le DOCTYPE, les links css et les links JS une seule fois ICI -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="public/styles/styles.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Erica+One&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Blinker:wght@100;200;300;400;600;700;800;900&display=swap" rel="stylesheet">
        <script src="script.js"></script>
        <title><?= $titre ?></title>
    </head>

    <body>

    <header>
        <img class ="logo" src="public/img/WikiMovieSVG.svg" alt="Wiki Movie Logo">
        <h1 id="slogan">Your Movie Library</h1>
    </header>

    <nav>
        <div>RELEASE YEAR <i class="fa-solid fa-play"></i></div>
        <div>CATEGORY <i class="fa-solid fa-play"></i></div>
        <div>DIRECTOR <i class="fa-solid fa-play"></i></div>
        <div>ACTOR <i class="fa-solid fa-play"></i></div>
        <div>DURATION <i class="fa-solid fa-play"></i></div>
    </nav>

    <div class="searchBarContainer">
    <input type="text" value="Find your movie" class="searchBar margin20px"></input>
    <div class="searchButton margin20px"><i class="fa-solid fa-magnifying-glass"></i></div>
    </div>
    

    <div id="wrapper">
        <div id="contenu">
            <h2> <?= $titre_secondaire ?> </h2>
            <?= $contenu ?>
        </div>
    </div>

    <div>
   
    </div>

    </body>
</html>


