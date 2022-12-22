<?php
    header("Location:../index.php");
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

    try{
        $con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "CALL supprimer(?)";

        $sth = $con->prepare($sql);
        $sth->bindParam(1, $id);

        $sth->execute();
        
    }catch(PDOException $e){
        $con = null;
    }