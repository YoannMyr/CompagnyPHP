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
    <link rel="stylesheet" href="style.css">
    <title>Liste des employés</title>
</head>

<body>
    <!--Mise en forme du tableau qui contiendra les données employés -->
    <section>
        <h1>Liste des employés</h1>
        <div class="tbl-header">
            <table>
                <thead>
                    <th>ID</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Date de naissance</th>
                    <th>Sexe</th>
                    <th>Salaire en $</th>
                    <th>Actions</th>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table>
                <tbody>
                    <?php
                    foreach ($result as $employee) {
                    ?>
                        <tr>
                            <td><?= $employee['emp_id'] ?></td>
                            <td><?= $employee['first_name'] ?></td>
                            <td><?= $employee['last_name'] ?></td>
                            <td><?= $employee['birth_day'] ?></td>
                            <td><?= $employee['sex'] ?></td>
                            <td><?= $employee['salary'] ?></td>
                            <td class="action"><a href="details.php?id=<?= $employee['emp_id'] ?>">Voir</a> <a href="edit.php?id=<?= $employee['emp_id'] ?>">Modifier</a> <a href="delete.php?id=<?= $employee['emp_id'] ?>">Supprimer</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <a class="add" href="add.php">Ajouter</a>
    </section>
</body>

</html>