<?php ob_start();
// var_dump($requete->fetchAll()); 
// L'objet PDOStatement contenu dans $requete renvoie par défaut PDO:FETCH_ASSOC_BOTH un tableau associatif et un tableau indexé numériquement 
// Pour poster on peut donc y accéder par l'utilisateur du nom de la clé : $film["poster"] ou par l'utilisation de l'index $film[1]
?>

<p class="count">There are <?= $requete->rowCount() ?> films </p>
<a class="add-button" href="index.php?action=addMovieForm">Add a movie <i class="fa-solid fa-circle-plus"></i></a>
<div class="movie_grid">
<?php 
        foreach($requete->fetchAll() as $film){ 
?>
        <div class="container">
                <img class="poster"  src="<?=$film[1]?>" alt="<?= $film["movie_title"]?>">
                <div class="middle">
                <div class="link"><a href="index.php?action=detailFilm&id=<?= $film['id_movie']?>"><i class="fa-regular fa-eye"></i></a></div>
                </div>
                </div>
        <?php } ?>
        </div>

<?php

$titre = "All Movies";
$titre_secondaire = "Movies";
$contenu = ob_get_clean();
require "view/template.php";






