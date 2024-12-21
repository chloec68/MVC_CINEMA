<?php ob_start();?>

<table class="uk-table uk-table-striped">
    <thead>
    </thead>

    <tbody>
        <?php 
            foreach($requete->fetchAll() as $acteur){ 
        ?>
            <tr>
                <td><?= $acteur["person_surname"],$acteur["person_name"] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php

$titre = "Actors";
$contenu = ob_get_clean();
$titre_secondaire = "Search by Actor";
require "view/template.php";



