<?php ob_start();
?>


<form class="add-form" action="index.php?action=addActor" method="post" enctype="multipart/form-data">
    <label for="lastname">Last name : </label>
    <input type="text" name="lastname" id="name" required><br> 
    <label for="firstname">First name : </label>
    <input type="text" name="firstname" id="firstname"><br> 
    <label for="actor">Gender : </label>
    <select id="gender" name="gender">
        <option value="">Select gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select><br> 
    <label for="dob">Date of birth : </label>
    <input type="date" name="dob" id="dob" required><br> 
    <label for="picture">Picture : </label>
    <input type="file" name="file" id="picture" accept="image/*"><br> 
    <input type="submit" name="submit" value="Submit" id="submit">
</form>

<?php

$titre="Add an actor";
$titre_secondaire = "Add an actor";
$contenu = ob_get_clean();
require "view/template.php";
