<?php ob_start();
$directorDetails = $requete->fetch();
?>

<div class="person_container">
    <div class="personCard">
        <img class="personPortrait" src="
        <?php 
        if($directorDetails["portrait"]==null){
            echo "public/img/persons/default.jpg";
        }else{
            echo $directorDetails["portrait"];
        }
        ?>
        " alt="Portrait of <?= $directorDetails["person_firstname"]." ".$directorDetails["person_lastname"]?>">
        <p id="personName"> First name : <?= $directorDetails["person_firstname"]?></p>
        <p> Last name : <?= $directorDetails["person_lastname"] ?></p>
        <p>Born : <?= $directorDetails["dateOfBirth"] ?></p>
        <p>Gender : <?= $directorDetails["gender"] ?></p>
        <p>Directed :</p>
        <?php if($directorFilmography){
            foreach($directorFilmography as $film){
        ?>
         <p id="personMovie"><?= $film["movie_title"]?></p>
        <?php
        }
        }?>
    </div>
</div>

<?php

$titre = "Director";
$contenu = ob_get_clean();
$titre_secondaire = $directorDetails["person_firstname"]." ".$directorDetails["person_lastname"];
require "view/template.php";
