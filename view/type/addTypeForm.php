<?php ob_start();

?>

<form action="index.php?action=addType" method="post">
    <label for="newType">New category : </label>
    <input type="text" name="typeName" id="newType"><br> 
    <input type="submit" name="submit" value="Submit" id="submit">
</form>

<?=

$contenu = ob_get_clean();
$titre="Add a category";
$titre_secondaire = "Add a category";
require "view/template.php";
