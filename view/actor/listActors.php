<?php ob_start();?>
<a class="add-button" href="index.php?action=addActorForm">Add an actor <i class="fa-solid fa-circle-plus"></i></a>
<table class="persons">
    <thead>
    </thead>

    <tbody>
        <?php 
            foreach($requete->fetchAll() as $actor){ 
        ?>
            <tr>
                <td class="persons tableDataPortrait"><img class="portrait" src=" <?=$actor["portrait"]?>" alt=""></td>
                <td><?= $actor["person_surname"],$actor["person_name"] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php

$titre = "Actors";
$contenu = ob_get_clean();
$titre_secondaire = "Search by Actor";
require "view/template.php";



