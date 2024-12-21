<?php ob_start();?>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>ACTEUR</th>
        </tr>
    </thead>

    <tbody>
        <?php 
            foreach($requete->fetchAll() as $acteur){ 
        ?>
            <tr>
                <td><?= $acteur["person_name"] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des acteurs";
$contenu = ob_get_clean();
$titre_secondaire = "liste des acteurs";
require "view/template.php";



