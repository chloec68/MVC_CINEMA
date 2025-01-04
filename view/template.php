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
        <title><?= $titre ?></title>
    </head>

    <body>

    <header>
        <img class ="logo" src="public/img/WikiMovieSVG-svg.svg" alt="Wiki Movie Logo">
        <h1 id="slogan">Your Movie Library</h1>
    </header>

    <nav>
        
        <div class="flexBoxNav"><a href="index.php?action=listFilms"><p>ALL MOVIES</p></a><a href="index.php?action=listFilms"><i class="fa-solid fa-play"></i></a></div>
        <div class="flexBoxNav"><a href="index.php?action=listTypes"><p>CATEGORY</p></a><a href="index.php?action=listTypes"><i class="fa-solid fa-play"></i></a></div>
        <div class="flexBoxNav"><a href="index.php?action=listDirectors"><p>DIRECTOR</p></a><a href="index.php?action=listDirectors"><i class="fa-solid fa-play"></i></a></div>
        <div class="flexBoxNav"><a href="index.php?action=listActors"><p>ACTOR</p></a><a href="index.php?action=listActors"><i class="fa-solid fa-play"></i></a></div>
        <!-- <div class="flexBoxNav"><p>RELEASE</p><i class="fa-solid fa-play"></i></div> -->
    </nav>

    <div class="searchBarContainer">
    <input type="text" value="Find your movie" class="searchBar"></input>
    <div class="searchButton"><i class="fa-solid fa-magnifying-glass"></i></div>
    </div>
    

    <div id="wrapper">
        <div id="contenu">
            <h2> <?= $titre_secondaire ?> </h2>
            <?= $contenu ?>
        </div>
    </div>

    <footer>
        <div id="flexBox">
            <div class="section">
                <p class="sectionTitle">SOCIAL</p>
                <p>Contact us</p>
                <p>Facebook</p>
                <p>Twitter</p>
            </div>
            <div class="section">
                <p class="sectionTitle">GET INVOLVED</p>
                <p>Add a movie</p>
                <p>Make a report</p>
            </div>
            <div class="section">
                <p class="sectionTitle">LEGAL</p>
                <p>Use Policy</p>
                <p>Impressum</p>
                <p>Cookie Policy</p>
            </div>
        </div>
        <div class="small"><i class="fa-regular fa-copyright"></i> Wiki Movie. All Rights Reserved</div>
    </footer>

    </body>
</html>


