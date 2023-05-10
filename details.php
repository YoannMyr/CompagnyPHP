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
    <title>Détails de l'employé</title>
</head>

<body>
    <h1>Détails de l'employé</h1>
    <p>ID : <?= $employee['emp_id'] ?></p>
    <p>Prénom : <?= $employee['first_name'] ?></p>
    <p>Nom : <?= $employee['last_name'] ?></p>
    <p>Date de naissance : <?= $employee['birth_day'] ?></p>
    <p>Sexe : <?= $employee['sex'] ?></p>
    <p>Salaire : <?= $employee['salary'] ?></p>
    <p><a href="edit.php?id=<?= $employee['emp_id'] ?>">Modifier</a> <a href="delete.php?id=<?= $employee['emp_id'] ?>">Supprimer</a></p>
</body>

</html>