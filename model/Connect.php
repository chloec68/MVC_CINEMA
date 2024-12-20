<?php

namespace Model;
// la classe est abstraite car on n'instanciera jamais la classe Connect -> on a seulement besoin d'accéder à la méthode seConnecter()
abstract class Connect {
    const HOST = "localhost";
    const DB = "cinema_chloe"; 
    const USER = "root";
    const PASS ="";

    public static function seConnecter(){
        try{
            return new \PDO(
                "mysql:host=".self::HOST.";dbname=".self::DB.";charset=utf8", self::USER, self::PASS);
        }catch(\PDOException $ex){
            return $ex->getMessage();
        }
    }
}

// le backslash devant PDO : \PDO - indique au framework que PDO (PHP DATA OBJECT est une extension, un framework pour accéder aux bases de 
// données en PHP) est une classe native et non une classe du projet



// définir classe abstraite "Abstraction de classe"

    // une classe abstraite est déclarée avec le modififacteur abstract. 
    // une classe abstraite est une classe qui ne peut pas être instanciée directement, mais qui sert uniquement de modèle à d'autres classes.
    
    // ses sous-classes / classes dérivées / classes filles non abstraites peuvent être instanciée directement.  
    // ses sous-classes devront implémenter certaines méthodes definies abstraites dans la classe parente. 

    // toute classe contenant une méthode abstraite doit être abstraite 

    // une METHODE abstraite est une méthode qui n'a pas de corps/d'implémentation dans la classe abstraite = la méthode abstraite
    // ne peut pas définir l'implémentation et se contente de déclarer la signature de la méthode et d'indiquer si elle est publique
    // ou protégée

    // Toutes les méthodes marquées comme abstraites dans la déclaration de la classe parente DOIVENT être définies par la classe enfant 

    // La finalité d'une classe abstraite est de servir de modèle à d'autres classes, tout en définissant des comportements généraux 

    // In fine, cela permet de garantir que les classes dérivées respectent une architecture spécifique 



// définir fonction statique

    // en PHP une fonction statique est une fonction qui peut être appelée sans avoir à créer une instance de la classe : elle est accessible
    // directement via le nom de la classe. 

    // le fait de déclarer des propriétés ou méthodes comme statiques (fonction statique) permet d'y accéder sans avoir besoin d'instancier
    // la classe 
    // => elles peuvent être accédées statiquement depuis une instance d'objet
    // => la pseudo-variable $this n'est donc pas disponible dans les méthodes déclarées comme statiques 

    // APPELER UNE FONCTION STATIQUE : 
    // les propriétés statiques sont accédées en utilisant l'opérateur de résolution de portée (::) et ne peuvent PAS être accédé à travers
    // l'opératuer d'objet (->)
    // ex : NomClasse::fonctionStatique(); 

    // Il est possible de référencer la classe en utilisant une variable. La valeur de la variable ne peut être un mot-clé
    // (par exemple self, parent et static).

// définir PDO 

    // PDO = PHP Date Objects 
    // => extension définissant l'interface pour accéder à une base de données en PHP
    // => c'est une couche d'abstraction qui intervient entre l'application PHP et le système de gestion de base de données (SGBD) tel que
    // MySql, MariaDB,etc 
    // L'intérêt de PDO est de séparer le traitement de la base de données, de sorte que la migration vers un autre SGBD soit possible 
    // sans changement de l'entiereté code développé, seuls quelques arguments de la méthode envoyés au constructeur

    // Un autre intérêt est la réduction du temps de traitement : alors que la procédure PHP classique consiste à parcourir une table ligne par
    //ligne en procédant à des allers-retours entre l'appli PHP et le SGBD, PDO corrige ce problème en permettant de récupérer en une seule
    // reprise tous les enregistrements de la table sous la forme d'une variable PHP (de type array à deux dimensions)
    
// Pourquoi utiliser PDO au lieu de mySQLi

    //mySQLimproved = extension PHP permettant d'accéder aux bases de données MySQL (qui fait partie des SGBD)
    // PDO et mySQLi sont deux deux méthodes permettant d'interagir avec les bases de données en PHP, c'est à dire à exécuter des requêtes SQL.

    //La méthode PDO aurait l'avantage d'être plus sécurisée et d'être compatible avec plusieurs SGBD
    //La méthode mySQLi serait moins sécurisée en matière d'injections SQL et limitée à MySQL 
