<?php ob_start();
?>
<!-- <div id="overlay" onclick="off()"></div> -->
<p class="count">There are <?= $requete->rowCount() ?> films </p>
<div class="movieDisplay">
        <?php 
            foreach($requete->fetchAll() as $film){ 
        ?>
               <img class="poster"  src="<?=$film["poster"]?>" alt="<?= $film["movie_title"]?>">
               
                  <a href="index.php?action=detailFilm&id=<?= $film['id_movie']?>">See details</a>
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






