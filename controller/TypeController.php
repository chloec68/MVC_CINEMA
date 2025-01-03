<?php
namespace Controller;
use Model\Connect;

class TypeController {

    public function listTypes(){
        $pdo = Connect :: seConnecter();
        $requete = $pdo->query("
            SELECT type_name,id_type
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
                header("Location:index.php?action=listTypes");
            }
        }
        require "view/type/listTypes.php";
    }

    public function deleteTypeForm(){
        require "view/type/deleteTypeForm.php";
    }

    public function deleteType($id){

            $id = $_GET['id'] ?? null;
            $pdo = Connect :: seConnecter();
            $deleteType = $pdo->prepare("
                DELETE FROM type 
                WHERE id_type= :id
            ");

            $deleteType->execute(["id"=>$id]);

            header("Location:index.php?action=listTypes");

            require "view/type/listTypes.php";
        }
        
    }
    








