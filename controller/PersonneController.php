<?php
namespace Controller;
use Model\Connect;
// utilisation du "use" pour accéder à la classe Connect située dans le namespace "Model"

class PersonneController {

    public function listActeurs(){

        $pdo = Connect :: seConnecter();
        $requete = $pdo->query("
            SELECT id_actor,ACTOR.id_person,person_name FROM actor 
            INNER JOIN person ON actor.id_person = person.id_person
           ");

        require "view/acteur/listActors.php";
    }
}

// Certaines requêtes avec query, certaines requêtes avec prepare et execute : c'est quoi la différence ?


