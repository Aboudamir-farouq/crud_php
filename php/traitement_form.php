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

    //les données reçus via le formulaire
    $nom = valider_donnee($_POST["nom"]);
    $genre = valider_donnee($_POST["genre"]);

    if($_POST["ville"] == "choisir une ville" || empty($_POST["ville"])){
        $_SESSION["error"] = "merci de choisir une ville";
        $ville = "";
    }else{
        $ville = valider_donnee($_POST["ville"]);
    }
    

    try{
        $con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "call ajouter(?, ?, ?)";

        $sth = $con->prepare($sql);
        $sth->bindParam(1, $nom);
        $sth->bindParam(2, $genre);
        $sth->bindParam(3, $ville);

        $sth->execute();
        
    }catch(PDOException $e){
        $con = null;
    }
