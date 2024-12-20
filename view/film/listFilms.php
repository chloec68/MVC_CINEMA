<!--*************************************************** STRUCTURE D'UNE VUE -->

<!-- *************************** LE CONTENU -->

<?php ob_start();
?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> films </p>
<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>TITRE</th>
            <th>ANNEE SORTIE</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach($requete->fetchAll() as $film){ 
        ?>
            <tr>
                <td><?= $film["movie_title"] ?></td>
                <td><?= $film["releaseYear"] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

 <!-- *************************** LE RENVOI AU TEMPLATE ("squelette") -->
<?php

$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";


// Tout ce qui se trouve entre la fonction ob_start() et la fonction ob_clean() est temporairement stocké dans la variable $contenu
// = temporisation de sortie

//Le require de fin permet d'injecter le contenu dans le template "squelette"/de base -> template.php
// Dans template.php on aura des variables qui vont accueillir les éléments provenant des vues 
// C'est pourquoi dans chaque vue, il faut toujours donner une valeur à $titre, $contenu et $titre_secondaire






