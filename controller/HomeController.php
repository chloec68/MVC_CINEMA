<?php
namespace Controller;
use Model\Connect;


class HomeController {
    public function index(){

        $pdo = Connect:: seConnecter();

        $bestRating = $pdo->query("
        SELECT movie.poster,movie.movie_title,movie.id_movie
        FROM movie
        WHERE movie.rating = '5'
        ");

        require "view/home/index.php";
    }

    public function search(){
        $pdo = Connect:: seConnecter();
        $search = $_POST['search'];
        $search = htmlspecialchars($search);
        $search = trim($search);
        $search = strip_tags($search);
        $search = strtolower($search);
        $search = "%".$search."%";
        $search = $pdo->query("
        SELECT movie.movie_title,movie.id_movie
        FROM movie
        WHERE movie.movie_title LIKE '$search'
        ");
        require "view/film/detailFilms.php";
    }

   
}



