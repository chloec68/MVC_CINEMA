<!-- ******************************** FRONT CONTROLLER ************************* -->

<?php

//use Permet l'importation d'une classe, fonction ou alias de namespace 
// sans use : $personneController = new \Controller\PersonneController();
// But : simplification 
use Controller\CinemaController;
use Controller\TypeController;
use Controller\PersonController;
use Controller\HomeController;

//autochargement des classes du projet 
spl_autoload_register(function ($class_name){
    $class_name = str_replace("\\", "/", $class_name);
    include $class_name . '.php';
});

//instancie Controller
$ctrlCinema = new CinemaController();
$ctrlType = new TypeController();
$ctrlPerson = new PersonController();
$ctrlHome = new HomeController();


// utilisation de l'OPERATEUR TERNAIRE pour affecter une valeur à $id
// (condition) ? valeur_si_vrai : valeur_si_faux;
// $id = si existence d'un paramètre id dans l'URL alors la valeur du paramètre est assigné à $id ;  
// But : simplification du code (+ court qu'une structure if/else classique)
$id = (isset($_GET["id"])) ? $_GET["id"] : null;

// FILTRES 
// $id = filter_var($id,FILTER_VALIDATE_INT);
// $newType = filter_var($newType,FILTER_VALIDATE_STRING);

//en fonction de l'action détectée dans l'URL via la propriété "action", on interagit avec la bonne méthode du controller
if(isset($_GET["action"])){
    switch ($_GET["action"]){
        //HOME 
        case "index" : $ctrlHome->index();break;
        // MOVIES
        case "listFilms" : $ctrlCinema->listFilms();break;
        case "detailFilm":$ctrlCinema->detailFilm($id);break;
        case "addMovie":$ctrlCinema->addMovie();break;
        case "addMovieForm":$ctrlCinema->addMovieForm();break;
        case "deleteMovie":$ctrlCinema->deleteMovie($id);break;
        //TYPES
        case "listTypes" : $ctrlType->listTypes(); break;
        case "addTypeForm":$ctrlType->addTypeForm();break;
        case "addType":$ctrlType->addType();break;
        case "deleteType":$ctrlType->deleteType($id);break;
        case "deleteTypeForm":$ctrlType->deleteTypeForm();break;
        case "displayByType":$ctrlType->displayByType($id);break;
        case "displayByTypePage":$ctrlType->displayByTypePage();break;
        //ACTORS
        case "listActors":$ctrlPerson->listActors();break;
        case "addActor":$ctrlPerson->addActor();break;
        case "addActorForm":$ctrlPerson->addActorForm();break;
        case "detailActor":$ctrlPerson->detailActor($id);break;
        //DIRECTORS
        case "listDirectors":$ctrlPerson->listDirectors();break;
        case "addDirector":$ctrlPerson->addDirector();break;
        case "addDirectorForm":$ctrlPerson->addDirectorForm();break;
        //CASTING
        case "addCasting":$ctrlCinema->addCasting($id);break;
        case "addCastingForm":$ctrlCinema->addCastingForm();break;
    }

    // header("Location: index.php?action=listFilms");
}

// INDEX.PHP fait office de FRONT CONTROLLER -> porte d'entrée de l'application 
// -> assemble les vues nécessaires à la demande du visiteur
// -> dispose du LAYOUT (= éléments communs à toutes les pages : logo, menu, pied de page, etc)
// -> route les demandes
// -> appel les vues adéquates 
// -> AIGUILLEUR VERS LE BON CONTROLLER 


