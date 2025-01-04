<?php ob_start();

$film = $details->fetch(PDO::FETCH_ASSOC);

if($film === false){
        echo "Movie not found.";
        exit;
    }

?>
        <div class="poster_wrapper"><img class="poster-detail" src="<?=$film["poster"]?>" alt="<?= $film["movie_title"]?>"></div>
        <div class="movieDetails">
                <p><?= $film["synopsis"]?></p>
                <p>Release : <?= $film["releaseYear"]?></p>
                <p>Duration : <?= $film["ROUND(duration/60,2)"]?></p>
                <p>Director : <?= $film["person_surname"]?> <?$film["person_name"]?></p>
                <p>Casting : 

                <?php
                foreach($casting->fetchAll(PDO::FETCH_ASSOC) as $cast){
                ?>
                <?=
                 $cast["person_surname"],$cast["person_name"]?> as <?= $cast["role_name"]?></p>
                <?php
                }
                ?>
        </div>

        <div id="deleteOption"><p>Delete this movie</p><a href="index.php?action=deleteMovie&id=<?=$id?>"><i class="fa-solid fa-trash"></i></a></div>
 <!-- *************************** LE RENVOI AU TEMPLATE ("squelette") -->
<?php

$titre = "Movie details";
$titre_secondaire = $film["movie_title"];
$contenu = ob_get_clean();
require "view/template.php";


// Tout ce qui se trouve entre la fonction ob_start() et la fonction ob_clean() est temporairement stocké dans la variable $contenu
// = temporisation de sortie

//Le require de fin permet d'injecter le contenu dans le template "squelette"/de base -> template.php
// Dans template.php on aura des variables qui vont accueillir les éléments provenant des vues 
// C'est pourquoi dans chaque vue, il faut toujours donner une valeur à $titre, $contenu et $titre_secondaire

