<?php ob_start(); 
$id = $_GET['id'];
?>
    <form action="index.php?action=addCasting&id=<?=$id?>" method="post">

        <label for="actor">Select an actor : </label>
        <select id="actor" name="actor">
        <?php
        if ($actors = $requestActors->fetchAll()) {
            foreach ($actors as $actor) {
        ?>
                <option value=<?=($actor['id_actor'])?>><?= htmlspecialchars($actor['person_surname']) ?> <?= htmlspecialchars($actor['person_name'])?></option>
        <?php
            }
        }
        ?>
        </select>    
        
        <label for="role">As (role) : </label>
        <input type="text" name="roleName" id="roleName"><br> 
        <br> 
        <input type="submit" name="submit" value="Submit" id="submit">
    </form>
<?php

$titre="Add a casting";
$titre_secondaire = "Add a casting";
$contenu = ob_get_clean();
require "view/template.php";



