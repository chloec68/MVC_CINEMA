<?php ob_start();
?>
<div class="home_container"><a href="index.php?action=index"><i class="fa-solid fa-circle-arrow-left"></i> Home page</a></div>

<p class="count">There are <?= $requete->rowCount() ?> films </p>
<a class="add-button" href="index.php?action=addMovieForm">Add a movie <i class="fa-solid fa-circle-plus"></i></a>
<div class="movie_grid">
<?php 
        foreach($requete->fetchAll() as $film){ 
?>
        <div class="container">
                <img class="poster"  src="<?=$film["poster"]?>" alt="<?= $film["movie_title"]?>">
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






