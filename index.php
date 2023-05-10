<?php

//! Connexion à la base de données
require_once('connect.php');


//? Afficher sous forme de tableau la liste des enregistrements de la table employee
$sql = "SELECT * FROM employee";

//? Préparation de la requête
$query = $db->prepare($sql);

//? Exécution de la requête
$query->execute();

//? Récupération des résultats
$result = $query->fetchAll(PDO::FETCH_ASSOC);

require_once('close.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des employés</title>
</head>
<body>
    <!--Mise en forme du tableau qui contiendra les données employés -->
    <h1>Liste des employés</h1>
    <table>
        <thead>
            <th>ID</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Date de naissance</th>
            <th>Sexe</th>
            <th>Salaire</th>
        </thead>
        <tbody>
        <?php
        foreach($result as $employee){
            ?>
            <tr>
                <td><?= $employee['emp_id'] ?></td>
                <td><?= $employee['first_name'] ?></td>
                <td><?= $employee['last_name'] ?></td>
                <td><?= $employee['birth_day'] ?></td>
                <td><?= $employee['sex'] ?></td>
                <td><?= $employee['salary'] ?></td>
                <td><a href="details.php?id=<?= $employee['emp_id'] ?>">Voir</a>  <a href="edit.php?id=<?= $employee['emp_id'] ?>">Modifier</a>  <a href="delete.php?id=<?= $employee['emp_id'] ?>">Supprimer</a></td>
            </tr>
            <?php
        }
        ?> 
        </tbody>
    </table>
    <a href="add.php">Ajouter</a>
</body>
</html>


    




