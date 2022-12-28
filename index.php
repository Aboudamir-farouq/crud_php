<?php session_start()?>
<?php require "php/connexion.class.php";?>
<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crud_database";
    if(isset($_SESSION['modifier'])){
        if($_SESSION['modifier']){
            $action = "php/modifier?id=" . $_GET['id'] . "&nom=" . $_GET['nom'] . "&genre=" . $_GET['genre'] . "&ville=" . $_GET['ville'];
        }else{
            $action = "php/traitement_form.php";
        }
    }else{
        $action = "php/traitement_form.php";
    }
    $conn = new Connexion($servername, $dbname, $username, $password);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Crud PHP</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="app1.css"/>
</head>
<body>
    <form id="form" action=<?php echo $action?> method="post">
        <table id="tb_form">
            <tr>
                <td><label for="id">Id : </label></td>
                <td><input id="id" type="text" value=<?php echo isset($_GET['id']) ? $_GET['id'] : strVal($conn->getMaxId());?> name="id" readonly/></td>
            </tr>
            <tr>
                <td><label for="nom">Nom : </label></td>
                <td><input id="nom" type="text" name="nom" value="<?php echo isset($_GET['nom'])? $_GET['nom']: "";?>" /></td>
            </tr>
            <tr>
                <td><label>Genre : </label></td>
                <td>
                    <input id="homme" type="radio" value="homme" name="genre"/>
                    <label for="homme">homme</label>
                    <span></span>
                    <!-- echo isset($_GET['genre']) && $_GET['genre'] == "femme" ? "yes": "no";-->
                    <input id="femme" type="radio" value="femme" name="genre"/>
                    <label for="femme">femme</label>
                </td>
            </tr>
            <tr>
                <td><label>Ville :</label></td>
                <td>
                    <select id="select" name="ville" value="<?php echo isset($_GET['ville'])? $_GET['ville']: "ok";?>">
                        <option>Choisir une ville</option>
                        <option>Ouarzazate</option>
                        <option>Marrakech</option>
                        <option>Casablanca</option>
                        <option>Rabat</option>
                        <option>Autre</option>
                    </select>
                    <input id="txt_ville" type="text" name="ville" required disabled/>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Enregistrer"/></td>
            </tr>
        </table>
    </form>
    <div id="db">
        <table id="tb_db">
            <tr>
                <th>Id</td>
                <th>Nom</th>
                <th>Genre</th>
                <th>Ville</th>
                <th>Action</th>
            </tr>
            <?php
            if($conn->getDataPersonne()){
                $data = $conn->getDataPersonne();
            }else{
                $data = [];
            }
            foreach($data as $key => $value):;
            ?>
            <tr>
                <td> <?php echo $value['id'];?> </td>
                <td> <?php echo $value['nom'];?> </td>
                <td> <?php echo $value['genre'];?> </td>
                <td> <?php echo $value['ville'];?> </td>
                <td>
                    <a class='link-danger' href='php/traitement_supprimer?id=<?php echo $value['id']?>'>Supprimer</a><br>
                    <a class='link-primary' href='php/traitement_modifier?id=<?php echo $value['id']?>&nom=<?php echo $value['nom']?>&genre=<?php echo $value['genre']?>&ville=<?php echo $value['ville']?>'>Modifier</a>
                </td>
            </tr>   
            <?php endforeach;?>
        </table>
    </div>
    <?php
    if(isset($_GET["genre"])){
        if($_GET["genre"] == "homme"){
            echo "<script>let homme = document.getElementById('homme'); homme.checked=true;</script>";
        }else if($_GET["genre"] == "femme"){
            echo "<script>let femme = document.getElementById('femme'); femme.checked=true;</script>";
        }
    }

    if(isset($_GET["ville"])){
        echo "<script>let txt_ville = document.getElementById('txt_ville'), select = document.getElementById('select'); txt_ville.value='". $_GET["ville"] . "'; txt_ville.disabled=false; select.disabled=true</script>";
    }
    ?>
    <script src="app2.js"></script>
</body>
</html>