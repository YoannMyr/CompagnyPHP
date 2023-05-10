<?php

//* ****************Modifier un enregistrement de la table "employee" (UPDATE)****************

// ! Connexion à la base de données
require_once('connect.php');

if (isset($_POST)) {
    if (
        isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['first_name']) && !empty($_POST['first_name'])
        && isset($_POST['last_name']) && !empty($_POST['last_name'])
        && isset($_POST['birth_day']) && !empty($_POST['birth_day'])
    ) {
        $id = strip_tags($_GET['id']);
        $first_name = strip_tags($_POST['first_name']);
        $last_name = strip_tags($_POST['last_name']);
        $birth_day = strip_tags($_POST['birth_day']);
        $sex = strip_tags($_POST['sex']);

        $sql = "UPDATE `employee` SET `first_name`=:first_name, `last_name`=:last_name, `birth_day`=:birth_day, `sex`=:sex WHERE `emp_id`=:id;";

        $query = $db->prepare($sql);

        $query->bindValue(':first_name', $first_name);
        $query->bindValue(':last_name', $last_name);
        $query->bindValue(':birth_day', $birth_day);
        $query->bindValue(':sex', $sex);
        $query->bindValue(':id', $id,);

        $query->execute();

        header('Location: index.php');
    }
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM `employee` WHERE `emp_id`=:id;";

    $query = $db->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    $employee = $query->fetch();
}

require_once('close.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification Employé</title>
</head>

<body>
    <h1>Modification d'un employé</h1>
    <form method="post">
        <p>
            <label for="first_name">Prénom</label>
            <input type="text" name="first_name" id="first_name" value="<?= $employee['first_name'] ?>">
        </p>
        <p>
            <label for="last_name">Nom</label>
            <input type="text" name="last_name" id="last_name" value="<?= $employee['last_name'] ?>">
        </p>
        <p>
            <label for="birth_day">Date de naissance</label>
            <input type="date" name="birth_day" id="birth_day" value="<?= $employee['birth_day'] ?>">
        </p>
        <p>
            <label for="sex">Sexe</label>
            <input type="text" name="sex" id="sex" value="<?= $employee['sex'] ?>">
        </p>
        <p>
            <button>Enregistrer</button>
        </p>
        <input type="hidden" name="id" value="<?= $employee['id'] ?>">
    </form>
</body>

</html>