<!DOCTYPE html>
<html lang="en">
<head>
    <title>Crud PHP</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app.css"/>
</head>
<body>
    <form>
        <table id="tb_form">
            <tr>
                <td><label for="nom">Nom : </label></td>
                <td><input id="nom" type="text" name="nom"/></td>
            </tr>
            <tr>
                <td><label for="prenom">Prénom : </label></td>
                <td><input id="prenom" type="text" name="prenom"/></td>
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
                    <select>
                        <option>Choisir une ville</option>
                        <option>Ouarzazate</option>
                        <option>Marrakech</option>
                        <option>Casablanca</option>
                        <option>Rabat</option>
                        <option>Autre</option>
                    </select>
                    <input type="text" disabled/>
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
                <th>Nom</td>
                <th>Prénom</th>
                <th>Genre</th>
                <th>Ville</th>
                <th>Action</th>
            </tr>
        </table>
    </div>
</body>
</html>