<?php ob_start();

?>
<!-- <p class="uk-label uk-label-warning">There is <?= $requete->rowCount() ?> categories </p> -->

<div class="category_wrapper">
        <?php    
            foreach($genres as $genre){
                $id=$genre["id_type"]; 
        ?>
            <div class="wrapper-trash-a">
                <a href="index.php?action=displayByType&id_type=<?=$id?>"><div class="category_container"><?= $genre["type_name"]?></div></a>
            </div>
            
        <?php } 
        ?>
</div>
<div class="options">
    <a class="add-button" href="index.php?action=addTypeForm">Add a category <i class="fa-solid fa-circle-plus"></i></a>

    <form class="delete-form" action="index.php?action=deleteType&id=<?=$id?>" method="post">
        <label for="type">Delete a category: </label>
        <select name="typeName" id="type">
            <option value="select">Select</option>
                    <?php    
                    foreach($genres as $genre){
                    ?>
                    <option value="<?= $genre["id_type"] ?>"><?= $genre["type_name"] ?></option>
                    <?php
                    }       
                    ?>
        </select>
        <input type="submit" name="submit" value="Submit" id="submit">
    </form>
</div>


<?php

$titre = "Categories";
$titre_secondaire = "Pick a category :";
$contenu = ob_get_clean();
require "view/template.php";






