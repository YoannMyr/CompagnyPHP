<form method="post">
    <label for="first_name">Prénom</label>
    <input type="text" name="first_name" id="first_name">
    <label for="last_name">Nom</label>
    <input type="text" name="last_name" id="last_name">
    <label for="birth_day">Date de naissance</label>
    <input type="date" name="birth_day" id="birth_day">
    <label for="sex">Sexe</label>
    <input type="text" name="sex" id="sex">
    <button>Enregistrer</button>
</form>

<?php

//! Connexion à la base de données
require_once('connect.php');
//* Ajouter un enregistrement à la base de données  (CREATE)


if (isset($_POST)) {
    if (
        isset($_POST['first_name']) && !empty($_POST['first_name'])
        && isset($_POST['last_name']) && !empty($_POST['last_name'])
        && isset($_POST['birth_day']) && !empty($_POST['birth_day'])
        && isset($_POST['sex']) && !empty($_POST['sex'])
    ) {
        $first_name = strip_tags($_POST['first_name']);
        $last_name = strip_tags($_POST['last_name']);
        $birth_day = strip_tags($_POST['birth_day']);
        $sex = strip_tags($post['sex']);

        $sql = "INSERT INTO `employee` (`first_name`, `last_name`, `birth_day`, `sex`) VALUES (:first_name, :last_name, :birth_day, :sex);";

        $query = $db->prepare($sql);

        $query->bindValue(':first_name', $first_name);
        $query->bindValue(':last_name', $last_name);
        $query->bindValue(':birth_day', $birth_day);
        $query->bindValue(':sex', $sex);

        $query->execute();
        $_SESSION['message'] = "Produit ajouté avec succès !";
        header('Location: index.php');
    }
}

require_once('close.php');
