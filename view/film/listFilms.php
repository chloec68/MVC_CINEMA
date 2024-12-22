<?php ob_start();
?>
<div id="overlay" onclick="off()"></div>
<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> films </p>
<div class="movieDisplay">
        <?php 
            foreach($requete->fetchAll() as $film){ 
        ?>
                <div class="poster" onclick="on()"><img class="poster" src="<?=$film["poster"] ?>" alt=""></div>
                <div id="movieInfo">
                        <p class="movieTitle"> : <?= $film["movie_title"]?></p>
                        <p><?= $film["synopsis"]?></p>
                        <p>Release : <?= $film["releaseYear"]?></p>
                        <p>Duration : <?= $film["duration"]?></p>
                </div>
        <?php } ?>
</div>
 <!-- *************************** LE RENVOI AU TEMPLATE ("squelette") -->
<?php

$titre = "All Movies";
$titre_secondaire = "Movies";
$contenu = ob_get_clean();
require "view/template.php";


// Tout ce qui se trouve entre la fonction ob_start() et la fonction ob_clean() est temporairement stocké dans la variable $contenu
// = temporisation de sortie

//Le require de fin permet d'injecter le contenu dans le template "squelette"/de base -> template.php
// Dans template.php on aura des variables qui vont accueillir les éléments provenant des vues 
// C'est pourquoi dans chaque vue, il faut toujours donner une valeur à $titre, $contenu et $titre_secondaire






