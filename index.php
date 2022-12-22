<!DOCTYPE html>
<html lang="en">
<head>
    <title>Crud PHP</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css"/>
</head>
<body>
    <form action="php/traitement_form.php" method="post">
        <table id="tb_form">
            <tr>
                <td><label for="id">Id : </label></td>
                <td><input id="id" type="number" name="id" disabled/></td>
            </tr>
            <tr>
                <td><label for="nom">Nom : </label></td>
                <td><input id="nom" type="text" name="nom"/></td>
            </tr>
            <tr>
                <td><label>Genre : </label></td>
                <td>
                    <input id="homme" type="radio" value="homme" name="genre"/>
                    <label for="homme">homme</label>
                    <span></span>
                    <input id="femme" type="radio" value="femme" name="genre"/>
                    <label for="femme">femme</label>
                </td>
            </tr>
            <tr>
                <td><label>Ville :</label></td>
                <td>
                    <select id="select" name="ville">
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
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "crud_database";
            
                try{
                    $con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                    $sql = "SELECT * FROM personne";
                    $sth = $con->prepare($sql);
                    $sth->execute();
                    $data = $sth->fetchAll();

                    foreach($data as $key => $value){
                        echo "<tr>";
                        echo "<td>" . $value['id'] . "</td>";
                        echo "<td>" . $value['nom'] . "</td>";
                        echo "<td>" . $value['genre'] . "</td>";
                        echo "<td>" . $value['ville'] . "</td>";
                        echo "<td>";
                        echo "<a class='link-danger' href='php/traitement_supprimer?id=" . $value['id'] . " '>Supprimer</a><br>";
                        echo "<a class='link-primary' href='#'>Modifier</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                }catch(PDOException $e){
                    $con = null;
                }
            ?>
        </table>
    </div>
    <script src="app.js"></script>
</body>
</html>