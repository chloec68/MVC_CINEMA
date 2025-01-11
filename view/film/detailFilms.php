<?php ob_start();

$film = $details->fetch(PDO::FETCH_ASSOC);
$castingData = $casting->fetchAll(PDO::FETCH_ASSOC);
$movieCover = $film["cover"];

if($film === false){
        echo "Movie not found.";
        exit;
    }
?>
<style>
        .wrapper_movieDetails {
        position: relative;
        height: 50%; 
        background-size: cover;   
        background-position: center center ;  /* Centrer l'image horizontalement et verticalement */
        background-repeat: no-repeat;
        }

        .wrapper_movieDetails::after {
        content: ""; /* Nécessaire pour le pseudo-élément */
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: url('<?= htmlspecialchars($movieCover); ?>');
        background-size: cover;
        background-position: center center ;
        opacity: 30%; 
        z-index: -1;
        height:100%;
        background-attachment: fixed;
        }

</style>
<div class="wrapper_movieDetails">
        <!-- <div class="poster_wrapper"><img class="poster-detail" src="<?=$film["poster"]?>" alt="<?= $film["movie_title"]?>"></div> -->
        <div class="movieDetails">
                <p><?= $film["synopsis"]?></p>
                <p>Released in : <?= $film["releaseYear"]?></p>
                <p>Duration : <?= $film["ROUND(duration/60,2)"]?></p>
                <p>Director : <?= $film["person_surname"]?> <?= $film["person_name"]?></p>
                <p>Casting : 
                <?php
                if (empty($castingData)) {
                ?>
                <p>Not added yet</p>
                <?php
                } else {
                        foreach ($castingData as $cast) {
                        ?>
                        <p><?=$cast["person_surname"], $cast["person_name"]?> as <?=$cast["role_name"]?></p><br>
                        <?php
                        }
                }
                ?>
        </div>
        
        <a class="add-button" href="index.php?action=addCastingForm&id=<?=$id?>">Add casting <i class="fa-solid fa-circle-plus"></i></a>

        <div id="deleteOption"><p>Delete this movie</p><a href="index.php?action=deleteMovie&id=<?=$id?>"><i class="fa-solid fa-trash"></i></a></div>
        </div>
<?php

$titre = "Movie details";
$titre_secondaire = $film["movie_title"];
$contenu = ob_get_clean();
require "view/template.php";

