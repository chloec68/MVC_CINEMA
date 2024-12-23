<?php ob_start();

$film = $details->fetch();





// $cast = isset($cast? $cast:"no")



?>

        <div class="movieDisplay">
        
                <div class="movieDetails">
                        <p class="otherInfo"><?= $film["movie_title"]?></p>
                        <p class="otherInfo"><?= $film["synopsis"]?></p>
                        <p class="otherInfo">Release : <?= $film["releaseYear"]?></p>
                        <p class="otherInfo">Duration : <?= $film["ROUND(duration/60,2)"]?></p>
                        <p class="otherInfo">Director : <?= $film["person_surname"],$film["person_name"]?></p>
                        <p class="otherInfo">Casting : </p>
                <?php
                foreach($casting->fetchAll() as $cast){
                ?>
                        <p class="otherInfo"><?= $cast["person_surname"],$cast["person_name"]?> as <?= $cast["role_name"]?></p>
                <?php
                }
                ?>
                </div>
                
        </div>
 <!-- *************************** LE RENVOI AU TEMPLATE ("squelette") -->
<?php

$titre = "Movie details";
$titre_secondaire = "id du film";
$contenu = ob_get_clean();
require "view/template.php";


// Tout ce qui se trouve entre la fonction ob_start() et la fonction ob_clean() est temporairement stocké dans la variable $contenu
// = temporisation de sortie

//Le require de fin permet d'injecter le contenu dans le template "squelette"/de base -> template.php
// Dans template.php on aura des variables qui vont accueillir les éléments provenant des vues 
// C'est pourquoi dans chaque vue, il faut toujours donner une valeur à $titre, $contenu et $titre_secondaire

