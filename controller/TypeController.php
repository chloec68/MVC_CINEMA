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

    public function addType($newType){
        $pdo = Connect :: seConnecter();
        $addType = $pdo->prepare("
            ALTER TABLE TYPE
            ADD :newType VARCHAR(255)
        ");

        $addType->execute(["newType"=>$newType]);

        require "view/type/listTypes.php";
    }

}








