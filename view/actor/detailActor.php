<?php ob_start();
?>
<div class="actor_container">
<div class="actorCard">
<img class="actorPortrait" src="<?=$actorDetails["portrait"]?>" alt="">
<p id="actor_name"> <?= $actorDetails["person_surname"]." "?><?= $actorDetails["person_name"] ?></p>
<p>Born : <?= $actorDetails["dateOfBirth"] ?></p>
<p>Gender : <?= $actorDetails["gender"] ?></p>

<?php if($actorFilmography){
    foreach($actorFilmography as $film){
?>
        <p>starred in : <?= $actorDetails["movie_title"]?></p><br>
    <?php}
}?>


</div>
</div>

<?php

$titre = "Actors";
$contenu = ob_get_clean();
$titre_secondaire = "Search by Actor";
require "view/template.php";
