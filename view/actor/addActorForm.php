<?php ob_start();
?>

<form class="form_addActor" action="index.php?action=addActor" method="post" enctype="multipart/form-data">
    <label for="newActor">Name : </label>
    <input type="text" name="personName" id="personName" required><br> 
    <label for="newActor">Surname : </label>
    <input type="text" name="personSurname" id="personSurname"><br> 
    <label for="newActor">Select gender : </label>
    <!-- <input type="text" name="gender" id="gender" required><br>  -->
    <select id="gender" name="gender">
        <option value="">&nbsp;</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select><br> 
    <label for="newActor">Date of birth : </label>
    <input type="date" name="dob" id="dob" required><br> 
    <label for="newActor">Picture : </label>
    <input type="file" name="file" id="file" accept="image/*"><br> 
    <input type="submit" name="submit" value="Submit" id="submit">
</form>

<?php

$titre="Add an actor";
$titre_secondaire = "Add an actor";
$contenu = ob_get_clean();
require "view/template.php";
