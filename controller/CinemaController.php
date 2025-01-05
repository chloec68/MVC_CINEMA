<?php
namespace Controller;
// déclaration "le fichier PHP fait partie du namespace Controller"
// un namespace permet d'éviter les conflits de nom : on peut utiliser plusieurs classes avec un nom identique et les classer dans des namespaces différents !
use Model\Connect;
// accès à la classe/importation de la classe Connect située dans le namespace "Model"

class CinemaController {

    public function listFilms(){
    // méthode de la classe appelée pour afficher la liste des films    
        $pdo = Connect :: seConnecter();
        // CONNEXION A LA BDD
        // méthode seConnecter() est appelée sur la classe Connect qui gère la connexion à la base de données
        // le résultat (=L'OBJET PDO RENVOYE) est affecté à la variable $pdo
        // l'objet PDO est nécessaire pour exécuter la requête qui suit (il sert de passerelle entre la BDD et l'application PHP) : 
        $requete = $pdo->query("
            SELECT id_movie,poster,movie_title
            FROM movie
    
        ");
        // la méthode $requete = $pdo->query est utilisée pour exécuter la requête SQL directement sur la base de donnée 
        // la méthode renvoie un objet de type PDOStatement 
        // L'objet PDOStatement permet de travailler avec les résultats de la requête SQL (fetch(),fetchColumn(),fetchAll(),rowCount())
        // Pour récupérer les résultats sous forme de tableau associatif, on utiliserait : fetchAll() + foreach loop 


        require "view/film/listFilms.php";
        //intégration de la Vue dans le flux d'exécution du code => mise en forme du résultat de la requête précédente
        // la vue reçoit les données demandées et préparées par le contrôleur
        // la vue ne peut pas accéder directemnet à l'objet PDOStatement, c'est pourquoi l'objet PDOStatement est stocké dans une variable 
        // -> la variable est passée à la vue 
    }


// 1- Déclaration du namespace auquel le fichier appartient ; 
// 2- Importation de la classe Connect 
// 3- Déclaration de la classe CinemaController 
// 4- Déclaration d'une méthode pour récupérer l'objet voulu 
// 5- Connection à la BDD et stockage de l'objet PDO renvoyé dans une variable 
// 6- Exécution d'une requête SQL sur la base de données via l'objet PDO
// 7- Inclusion de la Vue pour mise en forme du résultat de la requête 
// on se connecte
// on exécute la requête de notre choix
// on relie par un "require" la vue qui nous intéresse (située dans le dossier "view")


    public function addMovieForm(){
        $pdo = Connect:: seConnecter();
        $request = $pdo->query(
            "SELECT person_surname,person_name,id_director FROM PERSON
            INNER JOIN DIRECTOR ON PERSON.id_person = DIRECTOR.id_person"
        );
        require "view/film/addMovieForm.php";
        
    }
   

    public function addMovie(){
        
        if(isset($_POST['submit'])){
            $movieTitle = filter_input(INPUT_POST,"movieTitle",FILTER_SANITIZE_SPECIAL_CHARS);
            $movieDuration = filter_INPUT(INPUT_POST,"movieDuration",FILTER_SANITIZE_NUMBER_INT);
            $movieSynopsis = filter_INPUT(INPUT_POST,"movieSynopsis",FILTER_SANITIZE_SPECIAL_CHARS);
            $moviePoster = filter_INPUT(INPUT_POST,"moviePoster",FILTER_SANITIZE_URL); 
            $releaseYear = filter_INPUT(INPUT_POST,"releaseYear",FILTER_SANITIZE_NUMBER_INT);
            $directorId = filter_input(INPUT_POST, "director", FILTER_SANITIZE_NUMBER_INT);

                $pdo = Connect:: seConnecter();

                $addMovie = $pdo->prepare("
                    INSERT INTO movie (movie_title,duration,synopsis,poster,releaseYear,id_director)
                    VALUES (:movieTitle,:movieDuration,:movieSynopsis,:moviePoster,:releaseYear,:idDirector)
                ");

                $addMovie->execute([
                "movieTitle"=>$movieTitle,
                "movieDuration"=>$movieDuration,
                "movieSynopsis"=>$movieSynopsis,
                "moviePoster"=>$moviePoster,
                "releaseYear"=>$releaseYear,
                ":idDirector"=>$_POST['director']
                ]);

      
        header("Location: index.php?action=listFilms");
        exit;  
        }

        require "view/film/addMovieForm.php"; 
    }




    public function detailFilm($id){

        $pdo = Connect:: seConnecter();
      
        $details = $pdo->prepare("
                SELECT movie.id_movie, movie.poster, movie.movie_title ,movie.releaseYear,synopsis,ROUND(duration/60,2),person_surname,person_name
                FROM movie
                INNER JOIN director ON movie.id_director = director.id_director
                INNER JOIN person ON director.id_person = person.id_person
                WHERE movie.id_movie = :id
                ");

        $details->execute(["id"=>$id]);
        
        // CASTING 

        $casting = $pdo->prepare("
            SELECT * ,CONCAT(person.person_surname,person.person_name) AS identity,role.id_role
            FROM casting
            INNER JOIN ACTOR ON casting.id_actor = actor.id_actor
            INNER JOIN person ON actor.id_person = person.id_person
            INNER JOIN role ON casting.id_role = role.id_role
            WHERE id_movie= :id
        ");

        $casting->execute(["id"=>$id]);

        require "view/film/detailFilms.php";
    }



    public function deleteMovie($id){
        $id = $_GET['id'] ?? null;
        $pdo = Connect:: seConnecter();

        $request = $pdo->prepare("
                DELETE FROM movie
                WHERE id_movie= :id
        ");

        $request ->execute(["id"=>$id]);
      
        header("Location: index.php?action=listFilms");
        exit;  


        require "view/film/detailFilms.php";
    }





    public function addCastingForm(){
       
        $pdo = Connect:: seConnecter();
        $requestActors = $pdo->query("
            SELECT person_name,person_surname,actor.id_actor FROM ACTOR 
            inner join person on actor.id_person = person.id_person
            order by person_surname
        ");

        $requestRoles = $pdo->query("
            SELECT * from ROLE 
            order by role_name
        ");

        require "view/film/addCastingForm.php";
    }

    public function addCasting($id){

        $pdo = Connect::seConnecter();

        $createRole = $pdo->prepare("
        INSERT INTO role (role_name)
        VALUES (:roleName)
        ");

        $roleName = $_POST['roleName'];

        if ($roleName !== "") {
            $createRole->execute(["roleName" => $roleName]);
            $idRole = $pdo->lastInsertId();
        } else {
            $idRole = $_POST['roleSelect']; 
        }

        $createCasting = $pdo->prepare("
        INSERT INTO casting (id_actor,id_movie,id_role)
        VALUES (:idActor,:idMovie,:idRole)
        ");

        $id = $_GET['id'];
        $idActor = $_POST['idActor'];
        // $idRole=$pdo->lastInsertId();

        $createCasting ->execute([
            "idActor"=>$idActor,
            "idMovie"=>$id,
            "idRole"=>$idRole
        ]);


        header("Location: index.php?action=detailFilms&id=$id");
        exit;  

        require "view/film/addCastingForm.php";
    }
}
