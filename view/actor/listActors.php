<?php ob_start();?>

<div class="home_container"><a href="index.php?action=index"><i class="fa-solid fa-circle-arrow-left"></i> Home page</a></div>

<p class="count">There are <?= $requete->rowCount() ?> actors </p>

<a class="add-button" href="index.php?action=addActorForm">Add an actor <i class="fa-solid fa-circle-plus"></i></a>

<div class="persons_grid">
        <?php 
            foreach($requete->fetchAll() as $actor){ 
        ?>
            <div class="persons_container">
                <img class="portrait" src=" <?=$actor["portrait"]?>" alt="">
                <p><?= $actor["person_surname"]." ", $actor["person_name"]?></p>
                </div>
        <?php } ?>
</div>

<?php

$titre = "Actors";
$contenu = ob_get_clean();
$titre_secondaire = "Search by Actor";
require "view/template.php";


