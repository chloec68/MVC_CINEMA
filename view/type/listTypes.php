<!--*************************************************** STRUCTURE D'UNE VUE -->
<h2>list types</h2>

<?php ob_start();
?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> genres </p>
<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>Genre</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach($requete->fetchAll() as $genre){ 
        ?>
            <tr>
                <td><?= $genre["type_name"] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

 <!-- *************************** LE RENVOI AU TEMPLATE ("squelette") -->

<?php

$titre = "Liste des genres";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";


// Tout ce qui se trouve entre la fonction ob_start() et la fonction ob_clean() est temporairement stocké dans la variable $contenu
// = temporisation de sortie

//Le require de fin permet d'injecter le contenu dans le template "squelette"/de base -> template.php
// Dans template.php on aura des variables qui vont accueillir les éléments provenant des vues 
// C'est pourquoi dans chaque vue, il faut toujours donner une valeur à $titre, $contenu et $titre_secondaire






