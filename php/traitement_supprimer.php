<?php
    header("Location:../index.php");
    require "connexion.class.php";
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

    //les données qui vont être supprimer
    $id = valider_donnee($_GET["id"]);

    $conn = new Connexion($servername, $dbname, $username, $password);
    $conn->delete($id);