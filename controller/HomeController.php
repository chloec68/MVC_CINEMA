<?php
namespace Controller;
use Model\Connect;
// utilisation du "use" pour accéder à la classe Connect située dans le namespace "Model"

// class CinemaController {

    /**
     * Lister les acteurs
     */

//     public function detActeur($id){

//         $pdo = Connect :: seConnecter();
//         $requete = $pdo->prepare("
//             SELECT *
//             FROM acteur
//             WHERE id_acteur = :id");
//         $requete->execute(["id" -> $id]);

//         require "view/acteur/detailActeur.php";
//     }
// }

// on se connecte
// on exécute la requête de notre choix
// on relie par un "require" la vue qui nous intéresse (située dans le dossier "view")