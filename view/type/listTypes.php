<!--*************************************************** STRUCTURE D'UNE VUE -->

<?php ob_start();

// $newType=$addType->fetch();?>
<!-- <p class="uk-label uk-label-warning">There is <?= $requete->rowCount() ?> categories </p> -->

<div>
        <?php    
            foreach($requete->fetchAll() as $genre){ 
                $id=$genre["id_type"];
        ?>
            <div class="category_wrapper"><div class="category_container"><?= $genre["type_name"]?></div><a href="index.php?action=deleteType&id=<?=$id?>"><i class="fa-solid fa-trash"></i></a></div>
            
        <?php } 
        ?>
</div>

<a class="add-button" href="index.php?action=addTypeForm">Add a category <i class="fa-solid fa-circle-plus"></i></a>

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






