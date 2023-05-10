<?php
//* ****************Ajouter un enregistrement à la base de données  (CREATE)****************

//! Connexion à la base de données
require_once('connect.php');



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
        $sex = strip_tags($_POST['sex']);

        $sql = "INSERT INTO `employee` (`first_name`, `last_name`, `birth_day`, `sex`) VALUES (:first_name, :last_name, :birth_day, :sex);";

        $query = $db->prepare($sql);

        $query->bindValue(':first_name', $first_name);
        $query->bindValue(':last_name', $last_name);
        $query->bindValue(':birth_day', $birth_day);
        $query->bindValue(':sex', $sex);

        $query->execute();
        $_SESSION['message'] = "Employé ajouté avec succès !";
        header('Location: index.php');
    }
}

require_once('close.php');

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ajouter Employé</title>
</head>

<body>
    <div class="add-centre">
        <div class="add-centre2">
            <h1>Ajouter un employé</h1>
            <form class="form-add" method="post">
                <div class="div-form-add">
                    <div class="div-add"><label class="label-add" for="first_name">Prénom</label>
                        <input class="input-add" type="text" name="first_name" id="first_name">
                    </div>
                    <div class="div-add"><label class="label-add" for="last_name">Nom</label>
                        <input class="input-add" type="text" name="last_name" id="last_name">
                    </div>
                    <div class="div-add"><label class="label-add" for="birth_day">Date de naissance</label>
                        <input class="input-add" type="date" name="birth_day" id="birth_day">
                    </div>
                    <div class="div-add"><label class="label-add" for="sex">Sexe</label>
                        <input class="input-add" type="radio" name="sex" id="sex" value="H">Homme
                        <input class="input-add" type="radio" name="sex" id="sex" value="F">Femme
                    </div>
                </div>
                <button>Enregistrer</button>

            </form>
        </div>
    </div>
</body>

</html>