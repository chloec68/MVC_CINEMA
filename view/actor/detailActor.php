<?php ob_start();
?>

<div class="person_container">
    <div class="personCard">
        <img class="personPortrait" src="
        <?php 
        if($actorDetails["portrait"]==null){
            echo "public/img/persons/default.jpg";
        }else{
            echo $actorDetails["portrait"];
        }
        ?>
        " alt="Portrait of <?= $actorDetails["person_firstname"]." ".$actorDetails["person_lastname"]?>">
        <p> First name : <?= $actorDetails["person_firstname"]?></p>
        <p> Last name : <?= $actorDetails["person_lastname"] ?></p>
        <p>Born : <?= $actorDetails["dateOfBirth"] ?></p>
        <p>Gender : <?= $actorDetails["gender"] ?></p>
        <p>Starred in :</p>
        <?php if($actorFilmography){
            foreach($actorFilmography as $film){
        ?>
         <p id="personMovie"><?= $film["movie_title"]?></p>
        <?php
        }
        }?>
    </div>
</div>

<?php

$titre = "Actor";
$contenu = ob_get_clean();
$titre_secondaire = $actorDetails["person_firstname"]." ".$actorDetails["person_lastname"];
require "view/template.php";
