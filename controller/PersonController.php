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

            $pdo = Connect:: seConnecter();

            $personName = filter_input(INPUT_POST,"personName",FILTER_SANITIZE_SPECIAL_CHARS);
            $personSurname = filter_INPUT(INPUT_POST,"personSurname",FILTER_SANITIZE_SPECIAL_CHARS);
            $gender = filter_INPUT(INPUT_POST,"gender",FILTER_SANITIZE_SPECIAL_CHARS);
            $dob = preg_replace("([^0-9/])", "", $_POST['dob']);
            // $portraitUrl = filter_INPUT(INPUT_POST,"portraitUrl",FILTER_SANITIZE_URL);

            if (isset($_FILES['file'])) {
                $tmpName = $_FILES['file']['tmp_name'];
                $name = $_FILES['file']['name'];
                $size = $_FILES['file']['size'];
                $error = $_FILES['file']['error'];
                $type = $_FILES['file']['type'];

                $tabExtension = explode('.', $name);
                $extension = strtolower(end($tabExtension));

                // Tableau des extensions qu'on autorise
                $allowedExtensions = ['jpg', 'png', 'jpeg', 'webp'];
                $maxSize = 100000000;

                if (in_array($extension, $allowedExtensions) && $size <= $maxSize && $error == 0) {

                    $uniqueName = uniqid('', true);
                    $file = $uniqueName . '.' . $extension;

                    move_uploaded_file($tmpName, "public/img/actors/" . $file);

                    // Conversion en webp
                    // Création de mon image en doublon en chaine de caractères
                    $posterSource = imagecreatefromstring(file_get_contents("public/img/actors/" . $file));
                    // Récupération du chemin de l'image
                    $webpPath = "public/img/actors/" . $uniqueName . ".webp";
                    // Conversion en format webp
                    imagewebp($posterSource, $webpPath);
                    // Suppression de l'ancienne image
                    unlink("public/img/actors/" . $file);
                } else {
                    echo "Wrong extension or file size too large or error !";
                }
            }

            $portrait = isset($webpPath) ? $webpPath : "public/img/actors/default.webp";


            $details = $pdo->prepare("
                INSERT INTO PERSON(person_name,person_surname,gender,dateOfBirth,portrait)
                VALUES(:personName,:personSurname,:gender,:dob,:portrait)
            ");

            $details->execute(["personName"=>$personName,
                            "personSurname"=>$personSurname,
                            "gender"=>$gender,
                            "dob"=>$dob,
                            "portrait"=>$portrait]);

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


