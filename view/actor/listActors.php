<?php ob_start();?>

<p class="count">There are <?= $requete->rowCount() ?> actors </p>

<a class="add-button" href="index.php?action=addActorForm">Add an actor <i class="fa-solid fa-circle-plus"></i></a>

<div class="persons_grid">
        <?php 
        foreach($requete->fetchAll() as $actor){ 
        ?>
            <div class="persons_container">
                <a href="index.php?action=detailActor&id=<?= $actor["id_person"]?>">
                <img class="portrait" src="
                <?php
                if ($actor["portrait"] == null){
                    echo "public/img/persons/default.jpg";
                }else{
                    echo $actor["portrait"]?>
                <?php
                }
                ?>
                "alt="Portrait of <?=$actor["person_firstname"]." ",$actor["person_lastname"]?>">
                </a>
                <p><?= $actor["person_firstname"]." ", $actor["person_lastname"]?></p>
            </div>
        <?php
    }
        ?>
</div>

<?php
$titre = "Actors";
$contenu = ob_get_clean();
$titre_secondaire = "Search by Actor";
require "view/template.php";


