<?php

//* ****************Afficher un seul enregistrement de la table "employee" (READ)****************

//! Connexion à la base de données
require_once('connect.php');


if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `employee` WHERE `emp_id` = :id;';

    //? Préparation de la requête
    $query = $db->prepare($sql);

    //? Attachement des valeurs
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    //? Exécution de la requête
    $query->execute();

    //? Récupération des résultats
    $employee = $query->fetch();

    if (!$employee) {
        header('location: index.php');
    }
} else {
    header('location: index.php');
}

require_once('close.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Détails de l'employé</title>
</head>

<body>
    <div class="add-centre">
        <div class="add-centre2">
            <h1>Détails de l'employé</h1>
            <p class="p-details">ID : <?= $employee['emp_id'] ?></p>
            <p class="p-details">Prénom : <?= $employee['first_name'] ?></p>
            <p class="p-details">Nom : <?= $employee['last_name'] ?></p>
            <p class="p-details">Date de naissance : <?= $employee['birth_day'] ?></p>
            <p class="p-details">Sexe : <?= $employee['sex'] ?></p>
            <p class="p-details">Salaire en $ : <?= $employee['salary'] ?></p>
            <p class="p-details"><a class="a-details" href="edit.php?id=<?= $employee['emp_id'] ?>">Modifier</a> <a class="a-details" href="delete.php?id=<?= $employee['emp_id'] ?>">Supprimer</a></p>
        </div>
    </div>
</body>

</html>