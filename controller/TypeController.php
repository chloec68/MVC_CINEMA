<?php
namespace Controller;
use Model\Connect;

class TypeController {

    public function listTypes(){

        $pdo = Connect :: seConnecter();
        $requete = $pdo->query("
            SELECT type_name
            FROM type
        ");

        require "view/type/listTypes.php";
    }


    public function addTypeForm(){

        require "view/type/addTypeForm.php";
    }

    public function addType(){

        if(isset($_POST['submit'])){

            $typeName = filter_input(INPUT_POST,"typeName",FILTER_SANITIZE_SPECIAL_CHARS);

            if($typeName){
                $pdo = Connect :: seConnecter();
                $addType = $pdo->prepare("
                    INSERT INTO type (type_name)
                    VALUES (:typeName)
                ");
            
                $addType->execute(["typeName"=>$typeName]);

                header("Location:index.php?action=listFilms");
            }
        }
        require "view/type/listTypes.php";
    }


}








