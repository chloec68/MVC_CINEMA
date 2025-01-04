<?php
namespace Controller;
use Model\Connect;
// utilisation du "use" pour accéder à la classe Connect située dans le namespace "Model"

class PersonController {

    public function listActors(){

        $pdo = Connect :: seConnecter();
        $requete = $pdo->query(
            "SELECT person_surname,person_name,portrait FROM actor 
            INNER JOIN person ON actor.id_person = person.id_person"
           );

        require "view/actor/listActors.php";
    }


    public function listDirectors(){
        $pdo = Connect :: seConnecter();
        $requete = $pdo->query(
            "SELECT person_surname,person_name,dateOfBirth,portrait FROM PERSON
            INNER JOIN DIRECTOR ON PERSON.id_person = DIRECTOR.id_person"
        );

        require "view/director/listDirectors.php";
    }

    public function addActorForm(){
        require "view/actor/addActorForm.php";
    }

    public function addActor(){

        if(isset($_POST['submit'])){
            $personName = filter_input(INPUT_POST,"personName",FILTER_SANITIZE_SPECIAL_CHARS);
            $personSurname = filter_INPUT(INPUT_POST,"personSurname",FILTER_SANITIZE_SPECIAL_CHARS);
            $gender = filter_INPUT(INPUT_POST,"gender",FILTER_SANITIZE_SPECIAL_CHARS);
            $dob = preg_replace("([^0-9/])", "", $_POST['dob']);
            $portraitUrl = filter_INPUT(INPUT_POST,"portraitUrl",FILTER_SANITIZE_URL);

            $pdo = Connect:: seConnecter();

            $details = $pdo->prepare("
                INSERT INTO PERSON(person_name,person_surname,gender,dateOfBirth,portrait)
                VALUES(:personName,:personSurname,:gender,:dob,:portraitUrl)
            ");

            $details->execute(["personName"=>$personName,
                            "personSurname"=>$personSurname,
                            "gender"=>$gender,
                            "dob"=>$dob,
                            "portraitUrl"=>$portraitUrl]);

            $idPerson = $pdo->lastInsertId();

            $addActor = $pdo->prepare("
                INSERT INTO ACTOR(id_person)
                VALUES(:idPerson)
            ");

            $addActor->execute([
                "idPerson"=>$idPerson
            ]);

            header("Location:index.php?action=listActors");
            exit();

        }

        require "view/actor/addActorForm.php";
        
    }

}
// Certaines requêtes avec query, certaines requêtes avec prepare et execute : c'est quoi la différence ?


