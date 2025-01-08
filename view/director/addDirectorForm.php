<?php ob_start();
?>

<form class="form_addDirector" action="index.php?action=addDirector" method="post" enctype="multipart/form-data">
    <label for="name">Name : </label>
    <input type="text" name="personName" id="personName" required><br> 
    <label for="surname">Surname : </label>
    <input type="text" name="personSurname" id="personSurname"><br> 
    <label for="gender">Select gender : </label>
    <!-- <input type="text" name="gender" id="gender" required><br>  -->
    <select id="gender" name="gender">
        <option value="">&nbsp;</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select><br> 
    <label for="dob">Date of birth : </label>
    <input type="date" name="dob" id="dob" required><br> 
    <label for="portrait">Picture : </label>
    <input type="file" name="file" id="file" accept="image/*"><br> 
    <input type="submit" name="submit" value="Submit" id="submit">
</form>

<?php

$titre="Add a director";
$titre_secondaire = "Add a director";
$contenu = ob_get_clean();
require "view/template.php";
