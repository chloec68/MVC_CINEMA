<!-- ******************************** FRONT CONTROLLER ************************* -->

<?php

use Controller\CinemaController;
use Controller\GenreController;

use Controller\PersonneController;

//autochargement des classes du projet 
spl_autoload_register(function ($class_name){
    include $class_name . '.php';
});

//instancie controller Cinema
$ctrlCinema = new CinemaController();
$ctrlGenre = new GenreController();

$ctrlPersonne = new PersonneController();


//
$id = (isset($_GET["id"])) ? $_GET["id"] : null;

//en fonction de l'action détectée dans l'URL via la propriété "action", on interagit avec la bonne méthode du controller
if(isset($_GET["action"])){
    switch ($_GET["action"]){
        case "listFilms" : $ctrlCinema->listFilms();break;
        case "detailFilm":$ctrlCinema->detailFilm($id);break;
        case "listeGenres" : $ctrlGenre->listTypes(); break;

        case "listActeurs":$ctrlPersonne->listActeurs();break;
    }
}

// INDEX.PHP fait office de FRONT CONTROLLER -> porte d'entrée de l'application 
// -> assemble les vues nécessaires à la demande du visiteur
// -> dispose du LAYOUT (= éléments communs à toutes les pages : logo, menu, pied de page, etc)
//  -> route les demandes
// -> appel les vues adéquates 


