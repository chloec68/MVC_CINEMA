<?php
namespace Controller;
use Model\Connect;
// utilisation du "use" pour accéder à la classe Connect située dans le namespace "Model"

class PersonController {

    public function listActors(){

        $pdo = Connect :: seConnecter();
        $requete = $pdo->query(
            "SELECT person.id_person,person_firstname,person_lastname,portrait FROM person
            INNER JOIN actor ON person.id_person = actor.id_person"
           );

            // "SELECT person.id_person,person_firstname,person_lastname,portrait FROM actor 
            // INNER JOIN person ON actor.id_person = person.id_person"

        require "view/actor/listActors.php";
    }


    public function listDirectors(){
        $pdo = Connect :: seConnecter();
        $requete = $pdo->query(
            "SELECT person_firstname,person_lastname,dateOfBirth,portrait FROM PERSON
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

            $lastname = filter_input(INPUT_POST,"lastname",FILTER_SANITIZE_SPECIAL_CHARS);
            $firstname = filter_INPUT(INPUT_POST,"firstname",FILTER_SANITIZE_SPECIAL_CHARS);
            $gender = filter_INPUT(INPUT_POST,"gender",FILTER_SANITIZE_SPECIAL_CHARS);
            $dob = preg_replace("([^0-9/])", "", $_POST['dob']);

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

                    move_uploaded_file($tmpName, "public/img/persons/" . $file);

                    // Conversion en webp
                    // Création de mon image en doublon en chaine de caractères
                    $posterSource = imagecreatefromstring(file_get_contents("public/img/persons/" . $file));
                    // Récupération du chemin de l'image
                    $webpPath = "public/img/persons/" . $uniqueName . ".webp";
                    // Conversion en format webp
                    imagewebp($posterSource, $webpPath);
                    // Suppression de l'ancienne image
                    unlink("public/img/persons/" . $file);
                } else {
                    echo "Wrong extension or file size too large or error !";
                }
            }

            $portrait = isset($webpPath) ? $webpPath : "public/img/persons/default.jpg";


            $details = $pdo->prepare("
                INSERT INTO PERSON(person_lastname,person_firstname,gender,dateOfBirth,portrait)
                VALUES(:lastname,:firstname,:gender,:dob,:portrait)
            ");

            $details->execute(["lastname"=>$lastname,
                            "firstname"=>$firstname,
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


    public function detailActor($id){
        $pdo = Connect:: seConnecter();
        $requete = $pdo->prepare(
            "SELECT person.person_firstname,person.person_lastname,person.gender,person.dateOfBirth,person.portrait,actor.id_person
            FROM person
            INNER JOIN actor ON person.id_person = actor.id_person
            WHERE actor.id_person = :id"
        );

        $requete->execute(["id"=>$id]);

        $actorDetails = $requete->fetch();
        if (!$actorDetails) {
            echo "Actor not found.";
            return;
        } 

        $filmography = $pdo->prepare(
            "SELECT movie_title 
            FROM movie
            INNER JOIN casting ON movie.id_movie = casting.id_movie 
            INNER JOIN role ON casting.id_role = role.id_role
            INNER JOIN actor ON actor.id_actor = CASTING.id_actor
            WHERE actor.id_person = :id
            "
        );

        $filmography->execute(["id"=>$id]);

        $actorFilmography = $filmography->fetchAll();

        require "view/actor/detailActor.php";
    }



    public function addDirectorForm(){
        require "view/director/addDirectorForm.php";
    }

    public function addDirector(){
        if(isset($_POST['submit'])){

            $pdo = Connect:: seConnecter();
            $lastname = filter_input(INPUT_POST,"lastname",FILTER_SANITIZE_SPECIAL_CHARS);
            $firstname = filter_INPUT(INPUT_POST,"firstname",FILTER_SANITIZE_SPECIAL_CHARS);
            $gender = filter_INPUT(INPUT_POST,"gender",FILTER_SANITIZE_SPECIAL_CHARS);
            $dob = preg_replace("([^0-9/])", "", $_POST['dob']);

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

                    move_uploaded_file($tmpName, "public/img/persons/" . $file);

                    // Conversion en webp
                    // Création de mon image en doublon en chaine de caractères
                    $posterSource = imagecreatefromstring(file_get_contents("public/img/persons/" . $file));
                    // Récupération du chemin de l'image
                    $webpPath = "public/img/persons/" . $uniqueName . ".webp";
                    // Conversion en format webp
                    imagewebp($posterSource, $webpPath);
                    // Suppression de l'ancienne image
                    unlink("public/img/persons/" . $file);
                } else {
                    echo "Wrong extension or file size too large or error !";
                }
            }

            $portrait = isset($webpPath) ? $webpPath : "public/img/persons/default.jpg";


            $details = $pdo->prepare("
                INSERT INTO PERSON(person_lastname,person_firstname,gender,dateOfBirth,portrait)
                VALUES(:lastname,:firstname,:gender,:dob,:portrait)
            ");

            $details->execute(["lastname"=>$lastname,
                            "firstname"=>$firstname,
                            "gender"=>$gender,
                            "dob"=>$dob,
                            "portrait"=>$portrait]);

            $idPerson = $pdo->lastInsertId();

            $addActor = $pdo->prepare("
                INSERT INTO DIRECTOR(id_person)
                VALUES(:idPerson)
            ");

            $addActor->execute([
                "idPerson"=>$idPerson
            ]);

            header("Location:index.php?action=listDirectors");
            exit();

        }

        require "view/director/addDirectorForm.php";
    }

    public function detailDirector($id){
        $pdo = Connect:: seConnecter();
        $requete = $pdo->prepare(
            "SELECT DIRECTOR.id_director,DIRECTOR.id_person,PERSON.person_firstname,PERSON.person_lastname,PERSON.gender,PERSON.dateOfBirth,PERSON.portrait from DIRECTOR
            INNER JOIN person on DIRECTOR.id_person = person.id_person
            WHERE DIRECTOR.id_director = :id
            "
        );

        $requete->execute(["id"=>$id]);

        $filmography = $pdo->prepare(
            "SELECT movie_title 
            FROM movie
            WHERE movie.id_director = :id
            "
        );

        $filmography->execute(["id"=>$id]);

        $directorFilmography = $filmography->fetchAll();

        require "view/director/detailDirector.php";
    }

}
// Certaines requêtes avec query, certaines requêtes avec prepare et execute : c'est quoi la différence ?


