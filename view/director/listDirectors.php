<?php ob_start();
 $directors = $requete->fetchAll();
?>

<p class="count">There are <?= $requete->rowCount() ?> directors </p>

<a class="add-button" href="index.php?action=addDirectorForm">Add a director <i class="fa-solid fa-circle-plus"></i></a>

<div class="persons_grid">
    <?php
    foreach($directors as $director){ 
    ?>
        <div class="persons_container">

            <a href="index.php?action=detailDirector&id=<?= $director["id_director"] ?>">
            <img class="portrait" src=" <?=$director["portrait"]?>" alt="">
            </a>
            <p><?= $director["person_firstname"]." ".$director["person_lastname"] ?></p>
        </div>
    <?php
    }
    ?>
</div>

<?php

$titre = "Directors";
$titre_secondaire = "Directors List";
$contenu = ob_get_clean();
require "view/template.php";


// Tout ce qui se trouve entre la fonction ob_start() et la fonction ob_clean() est temporairement stocké dans la variable $contenu
// = temporisation de sortie

//Le require de fin permet d'injecter le contenu dans le template "squelette"/de base -> template.php
// Dans template.php on aura des variables qui vont accueillir les éléments provenant des vues 
// C'est pourquoi dans chaque vue, il faut toujours donner une valeur à $titre, $contenu et $titre_secondaire






