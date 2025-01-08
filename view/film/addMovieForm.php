<?php ob_start(); 
?>

    <form action="index.php?action=addMovie" method="post" enctype="multipart/form-data">
        <label for="title">Title : </label>
        <input type="text" name="movieTitle" id="title" required><br> 
        <label for="release">Release : </label>
        <input type="number" name="releaseYear" id="release" min="1895"><br> 
        <label for="duration">Duration : </label>
        <input type="number" name="movieDuration" id="duration" required min="1"><br> 
        <label for="synopsis">Synopsis : </label>
        <input type="text" name="movieSynopsis" id="synopsis" required><br> 
        <label for="rating">Rating : </label>
        <input type="number" name="rating" id="rating" required max="5"><br>
        <label for="poster">Poster : </label>
        <input type="file" name="file" id="poster" accept="image/*"><br> 


        <label for="director">Select director : </label>
        <select id="director" name="director">
            <option value="">Select an option</option>
            <?php
            foreach($requestDirectors->fetchAll(PDO::FETCH_ASSOC) as $director) {
            ?>
            <option value=<?= $director['id_director'] ?>><?= $director['person_surname'] ?> <?=$director['person_name']?></option>
            <?php
            }
            ?>
        </select><br>


        <label for="category">Select category : </label>
        <select id="type" name="types">
            <?php
            foreach($requestTypes->fetchAll(PDO::FETCH_ASSOC) as $type) {
            ?>
                <option value=<?=$type['id_type']?>> <?= $type['type_name'] ?> </option>
            <?php
            }
            ?>
        </select><br> 
       

     
       
        <input type="submit" name="submit" value="Submit" id="submit">
    </form>

<?php

$titre="Add a movie";
$titre_secondaire = "Add a movie";
$contenu = ob_get_clean();
require "view/template.php";




