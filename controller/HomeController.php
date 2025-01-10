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

}



