<?php ob_start();
?>

<form class="add-form" action="index.php?action=addType" method="post">
    <label for="newType">New category : </label>
    <input type="text" name="typeName" id="newType"><br> 
    <input type="submit" name="submit" value="Submit" id="submit">
</form>

<?php


$titre="Add a category";
$titre_secondaire = "Add a category";
$contenu = ob_get_clean();
require "view/template.php";
