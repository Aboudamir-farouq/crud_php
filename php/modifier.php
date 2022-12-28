<?php
    session_start();
    require "connexion.class.php";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crud_database";

    function valider_donnee($donnee){
        $donnee = trim($donnee);
        $donnee = stripslashes($donnee);
        $donnee = htmlspecialchars($donnee);

        return $donnee;
    }

    $id = intVal(valider_donnee($_POST["id"]));
    $nom = valider_donnee($_POST["nom"]);
    $genre = valider_donnee($_POST["genre"]);
    $ville = valider_donnee($_POST["ville"]);

    $conn = new Connexion($servername, $dbname, $username, $password);
    $conn->modifyData($id, $nom, $genre, $ville);

    $_SESSION["modifier"] = false;

    header("Location:../index.php");