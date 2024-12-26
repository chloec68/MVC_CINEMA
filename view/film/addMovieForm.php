<?php ob_start();
?>

<form action="index.php?action=addMovie" method="post">
    <label for="newMovie">Title : </label>
    <input type="text" name="movieTitle" id="newMovie"><br> 
    <label for="newMovie">Release : </label>
    <input type="text" name="movieRelease" id="newMovie"><br> 
    <label for="newMovie">Duration : </label>
    <input type="text" name="movieDuration" id="newMovie"><br> 
    <label for="newMovie">Synopsis : </label>
    <input type="text" name="movieSynopsis" id="newMovie"><br> 
    <label for="newMovie">Poster : </label>
    <input type="text" name="moviePoster" id="newMovie"><br> 
    <!-- <input type="text" name="director" id="newMovie"><br>  -->
    <input type="submit" name="submit" value="Submit" id="submit">
</form>

<?php

$titre="Add a movie";
$titre_secondaire = "Add a movie";
$contenu = ob_get_clean();
require "view/template.php";
