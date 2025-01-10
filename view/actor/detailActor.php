<?php ob_start();
?>
<div class="actor_container">
<div class="actorCard">
<img class="actorPortrait" src="<?=$actorDetails["portrait"]?>" alt="">
<!-- <p id="actor_name"> <?= $actorDetails["person_surname"]." "?><?= $actorDetails["person_name"] ?></p> -->
<p>Born : <?= $actorDetails["dateOfBirth"] ?></p>
<p>Gender : <?= $actorDetails["gender"] ?></p>
<p>Starred in :</p>
<?php if($actorFilmography){
    foreach($actorFilmography as $film){
?>
         <p id="actor_movie"><?= $film["movie_title"]?></p>
    <?php
    }
}?>


</div>
</div>

<?php

$titre = "Actors";
$contenu = ob_get_clean();
$titre_secondaire = $actorDetails["person_surname"]." ".$actorDetails["person_name"];
require "view/template.php";
