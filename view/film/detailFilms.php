<?php ob_start();

$film = $details->fetch();

?>
        <div class="poster_wrapper"><img class="poster-detail" src="<?=$film["poster"]?>" alt="<?= $film["movie_title"]?>"></div>
        <div class="movieDetails">
                <p class="otherInfo"><?= $film["synopsis"]?></p>
                <p class="otherInfo">Release : <?= $film["release"]?></p>
                <p class="otherInfo">Duration : <?= $film["ROUND(duration/60,2)"]?></p>
                <p class="otherInfo">Director : <?= $film["person_surname"],$film["person_name"]?></p>
                <p class="otherInfo">Casting : 

                <?php
                foreach($casting->fetchAll() as $cast){
                ?>
                <?=
                 $cast["person_surname"],$cast["person_name"]?> as <?= $cast["role_name"]?></p>
                <?php
                }
                ?>
        </div>
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

