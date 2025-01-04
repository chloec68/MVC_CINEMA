<?php ob_start();
?>

<form class="form_addMovie" action="index.php?action=addMovie" method="post">
    <label for="newMovie">Title : </label>
    <input type="text" name="movieTitle" id="newTitle" required><br> 
    <label for="newMovie">Release year : </label>
    <input type="number" name="movieRelease" id="newMovie" min="1900"><br> 
    <label for="newMovie">Duration : </label>
    <input type="number" name="movieDuration" id="newDuration" required min="1"><br> 
    <label for="newMovie">Synopsis : </label>
    <input type="text" name="movieSynopsis" id="newSynopsis" required><br> 
    <label for="newMovie">Directors id : </label>
    <input type="number" name="idDirector" id="newSynopsis" required min="1"><br> 
    <label for="newMovie">Poster : </label>
    <input type="url" name="moviePoster" id="newPoster" required><br> 
    <!-- <input type="text" name="director" id="newMovie"><br>  -->
    <input type="submit" name="submit" value="Submit" id="submit">
</form>

<?php

$titre="Add a movie";
$titre_secondaire = "Add a movie";
$contenu = ob_get_clean();
require "view/template.php";
