<?php
    header("Location:../index.php");
    require "connexion.class.php";
    $_SESSION["modifier"] = false;

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crud_database";

    //une fonction qui permet de sécuriser les données reçus via le formulaire
    function valider_donnee($donnee){
        $donnee = trim($donnee);
        $donnee = stripslashes($donnee);
        $donnee = htmlspecialchars($donnee);

        return $donnee;
    }

    //les données reçus via le formulaire
    $nom = valider_donnee($_POST["nom"]);
    $genre = valider_donnee($_POST["genre"]);

    if($_POST["ville"] == "choisir une ville" || empty($_POST["ville"])){
        $_SESSION["error"] = "merci de choisir une ville";
        $ville = "";
    }else{
        $ville = valider_donnee($_POST["ville"]);
    }
    
    $conn = new Connexion($servername, $dbname, $username, $password);
    $conn->addData($nom, $genre, $ville);