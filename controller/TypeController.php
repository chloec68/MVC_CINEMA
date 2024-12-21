<?php
namespace Controller;
use Model\Connect;
// utilisation du "use" pour accéder à la classe Connect située dans le namespace "Model"



class TypeController {

public function listTypes(){

    $pdo = Connect :: seConnecter();
    $requete = $pdo->query("
        SELECT type_name
        FROM type
    ");

    require "view/type/listTypes.php";
}

}