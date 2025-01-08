<?php ob_start();

// $newType=$addType->fetch();?>
<!-- <p class="uk-label uk-label-warning">There is <?= $requete->rowCount() ?> categories </p> -->

<div>
        <?php    
            foreach($requete->fetchAll() as $genre){ 
                $id=$genre["id_type"];
        ?>
            <div class="category_wrapper">
                <a href="index.php?action=displayByType&id_type=<?=$id?>"><div class="category_container"><?= $genre["type_name"]?></div></a>
                <a href="index.php?action=deleteType&id=<?=$id?>"><i class="fa-solid fa-trash"></i></a>
            </div>
            
        <?php } 
        ?>
</div>

<a class="add-button" href="index.php?action=addTypeForm">Add a category <i class="fa-solid fa-circle-plus"></i></a>

<?php

$titre = "Categories";
$titre_secondaire = "Pick a category :";
$contenu = ob_get_clean();
require "view/template.php";






