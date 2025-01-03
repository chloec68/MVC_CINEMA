<?php ob_start();
?>

<!-- <p class="uk-label uk-label-warning"> <?= $requete->rowCount() ?> directors </p> -->
<table class="directors">
    <thead>
        <tr>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php

            foreach($requete->fetchAll() as $director){ 
        ?>
                <tr>
                    <td class="directors tableDataPortrait"><img class="portrait" src=" <?=$director["portrait"]?>" alt=""></td>
                    <td class="directors "><?= $director["person_surname"],$director["person_name"] ?></td>
                </tr>
            <?php
            }
            ?>

      
    </tbody>
</table>

 <!-- *************************** LE RENVOI AU TEMPLATE ("squelette") -->
<?php

$titre = "Directors";
$titre_secondaire = "Directors List";
$contenu = ob_get_clean();
require "view/template.php";
$img[1]="public/img/CNolan.jpg";


// Tout ce qui se trouve entre la fonction ob_start() et la fonction ob_clean() est temporairement stocké dans la variable $contenu
// = temporisation de sortie

//Le require de fin permet d'injecter le contenu dans le template "squelette"/de base -> template.php
// Dans template.php on aura des variables qui vont accueillir les éléments provenant des vues 
// C'est pourquoi dans chaque vue, il faut toujours donner une valeur à $titre, $contenu et $titre_secondaire






