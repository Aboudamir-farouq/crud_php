<?php
    session_start();
    $_SESSION["modifier"] = true;

    //une fonction qui permet de sécuriser les données reçus via le formulaire
    function valider_donnee($donnee){
        $donnee = trim($donnee);
        $donnee = stripslashes($donnee);
        $donnee = htmlspecialchars($donnee);

        return $donnee;
    }

    //les données qui vont être supprimer
    $id = valider_donnee($_GET["id"]);
    $nom = valider_donnee($_GET["nom"]);
    $genre = valider_donnee($_GET["genre"]);
    $ville = valider_donnee($_GET["ville"]);

    header("Location:../index.php?id=$id&nom=$nom&genre=$genre&ville=$ville");
 