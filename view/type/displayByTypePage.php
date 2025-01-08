<?php ob_start();
?>

<p class="count">There are <?= $requete->rowCount() ?> films in this category</p>

<div class="movie_grid">
<?php 
        foreach($requete->fetchAll() as $film){ 
?>
        <div class="container">
                <img class="poster"  src="<?=$film["poster"]?>" alt="<?= $film["movie_title"]?>">
                <div class="middle">
                <div class="link"><a href="index.php?action=detailFilm&id=<?= $film['id_movie']?>"><i class="fa-solid fa-circle-arrow-right"></i></a></div>
                </div>
                </div>
        <?php } ?>
        </div>
<?php

$titre = "By type";
$titre_secondaire = "Movies";
$contenu = ob_get_clean();
require "view/template.php";