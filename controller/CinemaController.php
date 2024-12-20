<?php
namespace Controller;
use Model\Connect;
// utilisation du "use" pour accéder à la classe Connect située dans le namespace "Model"

class CinemaController {

    /**
     * Lister les films
     */

    public function listFilms(){
        

        $pdo = Connect :: seConnecter();
        $requete = $pdo->query("
            SELECT movie_title, releaseYear
            FROM movie
        ");


        require "view/film/listFilms.php";
    }
}

// on se connecte
// on exécute la requête de notre choix
// on relie par un "require" la vue qui nous intéresse (située dans le dossier "view")