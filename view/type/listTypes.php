<?php ob_start();
?>
<!-- <p class="uk-label uk-label-warning">There is <?= $requete->rowCount() ?> categories </p> -->

<div class="category_wrapper">
        <?php    
            foreach($requete->fetchAll() as $genre){
                $id=$genre["id_type"]; 
        ?>
            <div class="wrapper-trash-a">
                <a href="index.php?action=displayByType&id_type=<?=$id?>"><div class="category_container"><?= $genre["type_name"]?></div></a>
                <a href="index.php?action=deleteType&id=<?=$id?>"><i class="fa-solid fa-trash"></i></a>
            </div>
            
        <?php } 
        ?>
</div>

<form class="delete-form" action="index.php?action=deleteType&id=<?=$id?>" method="post">
    <label for="delete-category">Delete a category: </label>
    <select name="category" id="delete-category">
                    <?php    
                    if ($categories = $getTypes->fetchAll()) {
                        foreach ($categories as $category) { 
                    ?>
                <option value="<?= $category["id_type"] ?>"><?= $category["type_name"] ?></option>
                <?php
                        }
                    }
                ?>
    </select>
</form>

<a class="add-button button" href="index.php?action=addTypeForm">Add a category <i class="fa-solid fa-circle-plus"></i></a>

<?php

$titre = "Categories";
$titre_secondaire = "Pick a category :";
$contenu = ob_get_clean();
require "view/template.php";






