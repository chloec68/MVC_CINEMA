<!--*************************************************** STRUCTURE D'UNE VUE -->

<?php ob_start();
// $newType=$addType->fetch();?>
<!-- <p class="uk-label uk-label-warning">There is <?= $requete->rowCount() ?> categories </p> -->
<table class="typeTable">
    <thead>
        <tr>
            <th></th>
        </tr>
    </thead>
    <tbody class="flexTBody">
        <?php 
             
            foreach($requete->fetchAll() as $genre){ 
        ?>
            <tr>
                <td class="typeTd"><p><?= $genre["type_name"]?></p></td>
            </tr>
        <?php } 
        ?>




            <form action="addType" method="post">
                <label for="newType"></label>Add a type: </label><br>
                <input type="text" name="newType" id="newType"><br> 
                <input type="submit" value="Submit">
            </form>
    </tbody>
</table>

 <!-- *************************** LE RENVOI AU TEMPLATE ("squelette") -->

<?php

$titre = "Categories";
$titre_secondaire = "Pick a category :";
$contenu = ob_get_clean();
require "view/template.php";




// Tout ce qui se trouve entre la fonction ob_start() et la fonction ob_clean() est temporairement stocké dans la variable $contenu
// = temporisation de sortie

//Le require de fin permet d'injecter le contenu dans le template "squelette"/de base -> template.php
// Dans template.php on aura des variables qui vont accueillir les éléments provenant des vues 
// C'est pourquoi dans chaque vue, il faut toujours donner une valeur à $titre, $contenu et $titre_secondaire






