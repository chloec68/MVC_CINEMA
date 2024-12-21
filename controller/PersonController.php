<?php
namespace Controller;
use Model\Connect;
// utilisation du "use" pour accéder à la classe Connect située dans le namespace "Model"

class PersonController {

    public function listActors(){

        $pdo = Connect :: seConnecter();
        $requete = $pdo->query(
            "SELECT person_name FROM actor 
            INNER JOIN person ON actor.id_person = person.id_person"
           );

        require "view/acteur/listActors.php";
    }


    public function listDirectors(){
        $pdo = Connect :: seConnecter();
        $requete = $pdo->query(
            "SELECT person_surname,person_name,dateOfBirth FROM PERSON
            INNER JOIN DIRECTOR ON PERSON.id_person = DIRECTOR.id_person"
        );

        require "view/director/listDirectors.php";
    }
}

// Certaines requêtes avec query, certaines requêtes avec prepare et execute : c'est quoi la différence ?


